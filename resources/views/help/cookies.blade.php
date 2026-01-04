@extends('layouts.app')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', 'Cookies Policy')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            Cookies Policy
        </h1>
    </div>

    <!-- Content Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-8">

        <!-- Intro -->
        <p class="text-gray-600 leading-relaxed">
            GetSplit uses cookies to improve your experience and ensure the website
            functions properly.
        </p>

        <!-- Section 1 -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                1. What Are Cookies?
            </h2>
            <p class="text-gray-600 leading-relaxed">
                Cookies are small text files stored on your device when you visit a website.
                They help the site remember your actions and preferences.
            </p>
        </div>

        <!-- Section 2 -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                2. Why We Use Cookies
            </h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>To keep you logged in securely</li>
                <li>To remember basic preferences</li>
                <li>To analyze how users interact with our website</li>
            </ul>
        </div>

        <!-- Section 3 -->
        <div>
            <h2 class="text-lg font-semibold text-gray-800 mb-3">
                3. Managing Cookies
            </h2>
            <p class="text-gray-600 leading-relaxed">
                You can control or disable cookies through your browser settings.
                Please note that disabling cookies may affect certain features
                of the website.
            </p>
        </div>

    </div>
</div>
@endsection
