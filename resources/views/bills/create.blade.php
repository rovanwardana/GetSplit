@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/bills/create.js'])
@section('title', 'New Bill')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">New Bill</h1>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form id="new-bill-form" action="{{ route('bills.store') }}" method="POST">
            @csrf

            <!-- Bill Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="date"
                        class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        value="{{ date('Y-m-d') }}" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
                    <input type="date" name="due_date"
                        class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bill Name</label>
                    <input type="text" name="name" id="bill-name" placeholder="Enter bill name"
                        class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bill Type</label>
                    <select name="type"
                        class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
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
            </div>

            <!-- Items Section -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Items</h3>
                <div id="items-list" class="space-y-4">
                    <!-- Item rows will be added here by JS -->
                </div>
                <button type="button" id="add-item"
                    class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded hover:bg-blue-200">+ Add Item</button>
            </div>

            <!-- Split Method -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Split Method</label>
                <select name="split_method" id="split-method"
                    class="w-full sm:w-48 rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    <option value="equal">Equal</option>
                    <option value="custom">Custom</option>
                </select>
            </div>

            <!-- Participants Section -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Participants</h3>
                <div id="participants-list" class="space-y-4">
                    <!-- Participant rows will be added here by JS -->
                </div>
                <button type="button" id="add-participant"
                    class="mt-4 px-4 py-2 bg-blue-100 text-blue-700 rounded hover:bg-blue-200">+ Add
                    Participant</button>
                <div id="participant-items" class="space-y-4 mt-4 hidden"></div>
            </div>

            <!-- Additional Charges -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Additional Charges</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tax (%)</label>
                        <div class="flex items-center">
                            <input type="number" name="tax" id="tax-percentage" value="0"
                                min="0" max="100" step="0.1"
                                class="w-full sm:w-24 rounded border-gray-300 focus:ring-blue-500" />
                            <span class="ml-2 text-gray-500">%</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Discount</label>
                        <div class="flex items-center">
                            <span class="text-gray-500 mr-2">Rp.</span>
                            <input type="number" name="discount" id="discount" value="0" min="0"
                                step="0.01" class="w-full sm:w-32 rounded border-gray-300 focus:ring-blue-500" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bill Total -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Bill Total</h3>
                <div class="bg-gray-50 p-4 rounded-lg space-y-2">
                    <div class="flex justify-between">
                        <span class="text-sm">Subtotal:</span>
                        <span class="text-sm font-medium">Rp. <span id="subtotal">0</span></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm">Discount:</span>
                        <span class="text-sm font-medium">Rp. <span id="discount-amount">0</span></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm">Tax:</span>
                        <span class="text-sm font-medium">Rp. <span id="tax-amount">0</span></span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between">
                        <span class="text-base font-semibold">Total:</span>
                        <span class="text-base font-semibold">Rp. <span id="total-amount">0</span></span>
                    </div>
                </div>
            </div>

            <!-- Split Summary -->
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Split Summary</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <ul id="split-summary" class="list-disc pl-5 text-sm text-gray-700 space-y-2"></ul>
                </div>
            </div>

            <!-- Notes -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
                <textarea name="notes" rows="3" placeholder="Add additional notes here..."
                    class="w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-4">
                <a href="{{ route('transaction.index') }}"
                    class="px-6 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-center order-2 sm:order-1">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 order-1 sm:order-2">Save
                    Bill</button>
            </div>
        </form>
    </div>
@endsection