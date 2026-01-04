@extends('layouts.app')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', 'Help & Support')

@section('content')
    <div style="max-width: 1000px; margin: 2rem auto; padding: 0 1rem;">

        <!-- Header -->
        <div style="text-align: center; margin-bottom: 3rem;">
            <div
                style="
        width: 96px;
        height: 96px;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #071739 0%, #4B6382 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 16px rgba(7, 23, 57, 0.25);
    ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 48px; height: 48px; color: #ffffff;"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
            </div>

            <h1 style="font-size: 2rem; font-weight: 700; color: #071739; margin-bottom: 0.5rem;">
                Help Center
            </h1>
            <p style="color: #6b7280; font-size: 1rem;">
                We’re here to help you anytime
            </p>
        </div>

        <!-- Support Resources -->
        <div
            style="background-color: #ffffff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); padding: 2rem; margin-bottom: 2rem;">
            <h2
                style="font-size: 1.5rem; font-weight: 600; color: #071739; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #3b82f6;" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>
                Support Resources
            </h2>
            <div style="display: grid; gap: 1rem;">
                <!-- Resource Item -->
                <a href="{{ route('faq') }}"
                    style="display: flex; align-items: center; justify-content: space-between; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 12px; transition: all 0.3s; text-decoration: none;"
                    onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f0f9ff'"
                    onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='transparent'">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div
                            style="width: 48px; height: 48px; background-color: #dbeafe; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #3b82f6;"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-weight: 600; color: #071739; margin-bottom: 0.25rem;">Frequently Asked Questions</h3>
                            <p style="font-size: 0.875rem; color: #6b7280;">Answers to common questions about our services</p>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; color: #9ca3af;"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Legal Information -->
        <div
            style="background-color: #ffffff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); padding: 2rem;">
            <h2
                style="font-size: 1.5rem; font-weight: 600; color: #071739; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #3b82f6;" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Legal Information
            </h2>
            <div style="display: grid; gap: 1rem;">
                <!-- Terms & Conditions -->
                <a href="{{ route('tnc') }}"
                    style="display: flex; align-items: center; justify-content: space-between; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 12px; transition: all 0.3s; text-decoration: none;"
                    onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f0f9ff'"
                    onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='transparent'">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div
                            style="width: 48px; height: 48px; background-color: #dbeafe; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #3b82f6;"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-weight: 600; color: #071739; margin-bottom: 0.25rem;">Terms & Conditions</h3>
                            <p style="font-size: 0.875rem; color: #6b7280;">Read the terms and conditions for using our services</p>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; color: #9ca3af;"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>

                <!-- Privacy Policy -->
                <a href="{{ route('privacy') }}"
                    style="display: flex; align-items: center; justify-content: space-between; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 12px; transition: all 0.3s; text-decoration: none;"
                    onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f0f9ff'"
                    onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='transparent'">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div
                            style="width: 48px; height: 48px; background-color: #dbeafe; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #3b82f6;"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-weight: 600; color: #071739; margin-bottom: 0.25rem;">Privacy Policy</h3>
                            <p style="font-size: 0.875rem; color: #6b7280;">Learn how we protect and manage your personal data</p>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; color: #9ca3af;"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>

                <!-- Cookies Policy -->
                <a href="{{ route('cookies') }}"
                    style="display: flex; align-items: center; justify-content: space-between; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 12px; transition: all 0.3s; text-decoration: none;"
                    onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f0f9ff'"
                    onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='transparent'">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div
                            style="width: 48px; height: 48px; background-color: #dbeafe; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px; color: #3b82f6;"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="3"></circle>
                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-weight: 600; color: #071739; margin-bottom: 0.25rem;">Cookies Policy</h3>
                            <p style="font-size: 0.875rem; color: #6b7280;">Understand how we use cookies on our website</p>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px; color: #9ca3af;"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
        </div>

    </div>


@endsection
