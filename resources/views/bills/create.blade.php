@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/bills/create.js'])
@section('title', 'New Bill')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Create New Bill</h1>
            <p class="text-gray-600 mt-1">Fill in the details below to create a new bill</p>
        </div>

        <form id="new-bill-form" action="{{ route('bills.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Step 1: Basic Information -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold mr-3">
                        1
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Basic Information</h2>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bill Name *</label>
                        <input type="text" name="name" id="bill-name" placeholder="e.g., Team Dinner at Restaurant"
                            class="w-full px-2 rounded-lg bg-gray-50 text-gray-700" required />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bill Type *</label>
                            <select name="type"
                                class="w-full px-2 rounded-lg bg-gray-50 text-gray-700" required>
                                <option value="">Select bill type</option>
                                <option value="food">Food & Beverages</option>
                                <option value="transport">Transportation</option>
                                <option value="accommodation">Accommodation</option>
                                <option value="entertainment">Entertainment</option>
                                <option value="shopping">Shopping</option>
                                <option value="utilities">Utilities</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date *</label>
                            <input type="date" name="date"
                                class="w-full px-2 bg-gray-50 rounded-lg text-gray-700"
                                value="{{ date('Y-m-d') }}" required />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Due Date *</label>
                        <input type="date" name="due_date"
                            class="w-full px-2 bg-gray-50 rounded-lg text-gray-700" required />
                    </div>
                </div>
            </div>

            <!-- Step 2: Items -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold mr-3">
                        2
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Items</h2>
                </div>

                <div id="items-list" class="space-y-3 mb-4">
                    <!-- Item rows will be added here by JS -->
                </div>

                <button type="button" id="add-item"
                    class="w-full px-2 py-3 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors font-medium flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="M12 5v14"/>
                    </svg>
                    Add Item
                </button>
            </div>

            <!-- Step 3: Participants -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold mr-3">
                        3
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Participants</h2>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Split Method</label>
                    <select name="split_method" id="split-method"
                        class="w-full px-2 rounded-lg text-gray-700">
                        <option value="equal">Equal Split</option>
                        <option value="custom">Custom Split</option>
                    </select>
                </div>

                <div id="participants-list" class="space-y-3 mb-4">
                    <!-- Participant rows will be added here by JS -->
                </div>

                <button type="button" id="add-participant"
                    class="w-full px-2 py-3 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors font-medium flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="M12 5v14"/>
                    </svg>
                    Add Participant
                </button>

                <div id="participant-items" class="space-y-4 mt-4 hidden"></div>
            </div>

            <!-- Step 4: Additional Charges -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold mr-3">
                        4
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Additional Charges</h2>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tax (%)</label>
                        <div class="flex items-center gap-2">
                            <input type="number" name="tax" id="tax-percentage" value="0"
                                min="0" max="100" step="0.1"
                                class="w-24 px-2 rounded-lg   text-gray-700" />
                            <span class="text-gray-600 font-medium">%</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Discount</label>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600 font-medium">Rp</span>
                            <input type="number" name="discount" id="discount" value="0" min="0"
                                step="0.01" class="w-40 px-2 rounded-lg  text-gray-700" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5: Summary -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold mr-3">
                        5
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Summary</h2>
                </div>

                <!-- Bill Total -->
                <div class="bg-gray-50 rounded-lg p-5 mb-4">
                    <h3 class="font-semibold text-gray-800 mb-3 text-lg">Bill Total</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium text-gray-800">Rp <span id="subtotal">0</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Discount:</span>
                            <span class="font-medium text-gray-800">- Rp <span id="discount-amount">0</span></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Tax:</span>
                            <span class="font-medium text-gray-800">Rp <span id="tax-amount">0</span></span>
                        </div>
                        <hr class="my-3 border-gray-300">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-gray-800">Total:</span>
                            <span class="text-lg font-bold text-blue-600">Rp <span id="total-amount">0</span></span>
                        </div>
                    </div>
                </div>

                <!-- Split Summary -->
                <div class="bg-blue-50 rounded-lg p-5">
                    <h3 class="font-semibold text-gray-800 mb-3 text-lg">Split Summary</h3>
                    <ul id="split-summary" class="space-y-2 text-gray-700"></ul>
                </div>
            </div>

            <!-- Step 6: Notes (Optional) -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-gray-400 text-white rounded-full flex items-center justify-center font-bold mr-3">
                        6
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Notes <span class="text-sm text-gray-500 font-normal">(Optional)</span></h2>
                </div>

                <textarea name="notes" rows="4" placeholder="Add any additional notes or comments here..."
                    class="w-full px-2 py-1 rounded-lg bg-gray-100 text-gray-700"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 bg-white rounded-xl shadow-lg p-4 border border-gray-200 mb-10">
                <a href="{{ route('transaction.index') }}"
                    class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-center font-medium">
                    Cancel
                </a>
                <button type="submit" 
                    class="flex-1 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    Save Bill
                </button>
            </div>
        </form>
    </div>
@endsection