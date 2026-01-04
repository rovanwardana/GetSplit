@extends('layouts.app')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', 'Privacy Policy')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            Privacy Policy
        </h1>
    </div>

    <!-- Content Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-8">

        <!-- Intro -->
        <p class="text-gray-600 leading-relaxed">
            GetSplit values your privacy. This Privacy Policy explains how we collect,
            use, and protect your personal information when you use our services.
        </p>

        <!-- Section 1 -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                1. Information We Collect
            </h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Account information such as name, email, and password</li>
                <li>Bill, transaction, and split details</li>
            </ul>
        </div>

        <!-- Section 2 -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                2. How We Use Your Data
            </h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>To manage user accounts and split bills</li>
                <li>To improve features and user experience</li>
            </ul>
        </div>

        <!-- Section 3 -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                3. Data Sharing
            </h2>
            <p class="text-gray-600 leading-relaxed">
                GetSplit does not share your personal data with third parties,
                except when required by law or legal processes.
            </p>
        </div>

        <!-- Section 4 -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                4. Data Security
            </h2>
            <p class="text-gray-600 leading-relaxed">
                We apply reasonable technical and organizational security measures
                to protect your personal information from unauthorized access.
            </p>
        </div>

        <!-- Section 5 -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                5. Your Rights
            </h2>
            <p class="text-gray-600 leading-relaxed">
                You have the right to access, update, or request deletion of your
                personal data at any time through your account or by contacting us.
            </p>
        </div>

    </div>
</div>
@endsection
