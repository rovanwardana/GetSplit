@extends('layouts.app')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', 'Terms and Conditions')

@section('content')
<div class="max-w-4xl mx-auto mb-10 mt-8">
    
    <!-- Header Section -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Terms and Conditions</h1>
    </div>

    <!-- Introduction -->
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl shadow-md p-6 mb-6">
        <div class="flex items-start gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 flex-shrink-0 mt-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Welcome to GetSplit!</h2>
                <p class="text-gray-700">
                    By accessing or using our website and services, you agree to be bound by these Terms and Conditions. 
                    Please read them carefully before using GetSplit.
                </p>
            </div>
        </div>
    </div>

    <!-- Terms Content -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        
        <!-- Term 1 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                    1
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Acceptance of Terms</h3>
                    <p class="text-gray-600 leading-relaxed">
                        By registering and using GetSplit, you acknowledge that you have read, understood, and agree to comply with and be bound by these Terms and Conditions. 
                        If you do not agree with these terms, please do not use our service.
                    </p>
                </div>
            </div>
        </div>

        <!-- Term 2 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                    2
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Use of the Service</h3>
                    <p class="text-gray-600 leading-relaxed">
                        GetSplit is provided for the purpose of managing shared expenses, bill splitting, and personal tracking of payments among users. 
                        The service is designed to help you fairly divide costs and keep track of who owes what in group expenses.
                    </p>
                </div>
            </div>
        </div>

        <!-- Term 3 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                    3
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">User Accounts</h3>
                    <p class="text-gray-600 leading-relaxed mb-3">
                        You are responsible for:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-1 ml-4">
                        <li>Maintaining the confidentiality of your account credentials</li>
                        <li>All activities that occur under your account</li>
                        <li>Notifying us immediately of any unauthorized access</li>
                        <li>Ensuring your account information is accurate and up-to-date</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Term 4 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                    4
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Data Accuracy</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Users are responsible for entering accurate and truthful data related to transactions, amounts, participants, and payment statuses. 
                        GetSplit is not responsible for disputes arising from incorrect or fraudulent data entry.
                    </p>
                </div>
            </div>
        </div>

        <!-- Term 5 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                    5
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Payment Handling</h3>
                    <p class="text-gray-600 leading-relaxed">
                        <strong>Important:</strong> GetSplit does not process actual payments or handle money transactions. 
                        The platform only records and manages bill information for tracking purposes. 
                        All financial settlements must be handled directly between users outside of the platform.
                    </p>
                </div>
            </div>
        </div>

        <!-- Term 6 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                    6
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Privacy & Data Protection</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Your personal data and transaction information are stored securely and will not be shared with third parties without your consent, 
                        except as required by law. We take data protection seriously and implement appropriate security measures. 
                        Please refer to our Privacy Policy for more detailed information.
                    </p>
                </div>
            </div>
        </div>

        <!-- Term 7 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-red-100 text-red-700 rounded-full flex items-center justify-center font-bold">
                    7
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Prohibited Activities</h3>
                    <p class="text-gray-600 leading-relaxed mb-3">
                        You agree not to use GetSplit for:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-1 ml-4">
                        <li>Any illegal, fraudulent, or abusive purposes</li>
                        <li>Harassment or threatening other users</li>
                        <li>Attempting to gain unauthorized access to the system</li>
                        <li>Distributing malware or harmful code</li>
                        <li>Violating any applicable laws or regulations</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Term 8 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                    8
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Modifications to Terms</h3>
                    <p class="text-gray-600 leading-relaxed">
                        GetSplit reserves the right to modify these terms at any time. We will notify users of significant changes via email or platform notification. 
                        Continued use of the service after changes are posted constitutes acceptance of the revised terms.
                    </p>
                </div>
            </div>
        </div>

        <!-- Term 9 -->
        <div class="border-b border-gray-200 p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-red-100 text-red-700 rounded-full flex items-center justify-center font-bold">
                    9
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Termination</h3>
                    <p class="text-gray-600 leading-relaxed">
                        We reserve the right to suspend or terminate your access to GetSplit at any time if you violate these terms, 
                        engage in prohibited activities, or misuse the service. You may also terminate your account at any time by contacting our support team.
                    </p>
                </div>
            </div>
        </div>

        <!-- Term 10 -->
        <div class="p-6 hover:bg-gray-50 transition-colors">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">
                    10
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Limitation of Liability</h3>
                    <p class="text-gray-600 leading-relaxed">
                        GetSplit is provided "as is" without warranties of any kind. We are not liable for any damages arising from the use or inability to use the service, 
                        including disputes between users regarding payments or bill splits. Users acknowledge that they use the service at their own risk.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="mt-8 bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-xl shadow-md p-6">
        <div class="flex items-start gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600 flex-shrink-0 mt-1" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
            </svg>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Questions About These Terms?</h3>
                <p class="text-gray-700 mb-3">
                    If you have any questions or concerns about these Terms and Conditions, please don't hesitate to contact us.
                </p>
                <a href="mailto:legal@getsplit.com" class="inline-flex items-center gap-2 text-green-700 hover:text-green-800 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    legal@getsplit.com
                </a>
            </div>
        </div>
    </div>
</div>
@endsection