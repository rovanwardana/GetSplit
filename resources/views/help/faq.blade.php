@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/faq.js'])

@section('title', 'Frequently Asked Questions')

@section('content')
<div class="max-w-4xl mx-auto mb-15 mt-8">
    
    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Frequently Asked Questions</h1>
        <p class="text-gray-600">Find answers to common questions about GetSplit</p>
    </div>

    <!-- FAQ Sections -->
    <div class="space-y-4" id="faq-container">
        
        <!-- Getting Started Section -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-blue-50 px-6 py-3 border-b border-blue-100">
                <h2 class="font-semibold text-blue-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    Getting Started
                </h2>
            </div>

            <!-- FAQ Item 1 -->
            <div class="faq-item border-b border-gray-100 last:border-b-0">
                <button class="faq-question w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors flex items-center justify-between gap-4">
                    <span class="font-medium text-gray-800">What is GetSplit?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform duration-200 faq-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-4">
                    <p class="text-gray-600 leading-relaxed">
                        GetSplit is a bill splitting application that helps you easily divide expenses with friends, family, or colleagues. 
                        Whether it's a dinner, trip, or shared household costs, GetSplit makes it simple to track who owes what and settle up fairly.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item border-b border-gray-100 last:border-b-0">
                <button class="faq-question w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors flex items-center justify-between gap-4">
                    <span class="font-medium text-gray-800">How do I create a new bill?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform duration-200 faq-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-4">
                    <div class="text-gray-600 leading-relaxed">
                        <p class="mb-2">To create a new bill, follow these steps:</p>
                        <ol class="list-decimal list-inside space-y-2 ml-2">
                            <li>Click on the <strong>"New Bill"</strong> button in the navigation menu</li>
                            <li>Fill in the bill details (name, type, date, and due date)</li>
                            <li>Add items with their quantities and prices</li>
                            <li>Add participants who will share the bill</li>
                            <li>Choose split method (Equal or Custom)</li>
                            <li>Add any tax or discount if applicable</li>
                            <li>Review the summary and click <strong>"Save Bill"</strong></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bill Management Section -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-green-50 px-6 py-3 border-b border-green-100">
                <h2 class="font-semibold text-green-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                    </svg>
                    Managing Bills
                </h2>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item border-b border-gray-100 last:border-b-0">
                <button class="faq-question w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors flex items-center justify-between gap-4">
                    <span class="font-medium text-gray-800">How do I split a bill equally?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform duration-200 faq-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-4">
                    <p class="text-gray-600 leading-relaxed">
                        When creating a bill, select <strong>"Equal"</strong> as the split method. The total amount will be automatically divided equally among all participants you add. 
                        Each person will owe the same amount, including their share of tax and discount.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item border-b border-gray-100 last:border-b-0">
                <button class="faq-question w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors flex items-center justify-between gap-4">
                    <span class="font-medium text-gray-800">How do I split a bill by items (custom split)?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform duration-200 faq-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-4">
                    <div class="text-gray-600 leading-relaxed">
                        <p class="mb-2">To split by items (custom split):</p>
                        <ol class="list-decimal list-inside space-y-2 ml-2">
                            <li>Select <strong>"Custom"</strong> as the split method</li>
                            <li>For each participant, specify which items they consumed</li>
                            <li>Enter the quantity of each item per participant</li>
                            <li>The system will calculate each person's share based on their items</li>
                            <li>Tax and discount are distributed proportionally</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item border-b border-gray-100 last:border-b-0">
                <button class="faq-question w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors flex items-center justify-between gap-4">
                    <span class="font-medium text-gray-800">How do I update payment status?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform duration-200 faq-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-4">
                    <div class="text-gray-600 leading-relaxed">
                        <p class="mb-2">To update payment status:</p>
                        <ol class="list-decimal list-inside space-y-2 ml-2">
                            <li>Go to the <strong>Transaction</strong> page</li>
                            <li>Click on a transaction to expand its details</li>
                            <li>Change the payment status dropdown for each participant (Pending or Paid)</li>
                            <li>Click <strong>"Save Changes"</strong> to update</li>
                            <li>The bill status will automatically update based on payment progress</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Troubleshooting Section -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-red-50 px-6 py-3 border-b border-red-100">
                <h2 class="font-semibold text-red-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    Troubleshooting
                </h2>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item border-b border-gray-100 last:border-b-0">
                <button class="faq-question w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors flex items-center justify-between gap-4">
                    <span class="font-medium text-gray-800">What should I do if I made a mistake in a bill?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform duration-200 faq-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-4">
                    <p class="text-gray-600 leading-relaxed">
                        Currently, you can delete a bill from the Transaction page by clicking on the bill details and selecting the <strong>"Delete Transaction"</strong> button. 
                        After deleting, you can create a new bill with the correct information. Make sure to inform all participants about the change.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 7 -->
            <div class="faq-item border-b border-gray-100 last:border-b-0">
                <button class="faq-question w-full px-6 py-4 text-left hover:bg-gray-50 transition-colors flex items-center justify-between gap-4">
                    <span class="font-medium text-gray-800">Can I delete a transaction?</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform transition-transform duration-200 faq-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="faq-answer hidden px-6 pb-4">
                    <p class="text-gray-600 leading-relaxed">
                        Yes, you can delete a transaction. Go to the Transaction page, expand the bill details, and click the <strong>"Delete Transaction"</strong> button. 
                        Please note that this action cannot be undone, so make sure you really want to delete it before confirming.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection