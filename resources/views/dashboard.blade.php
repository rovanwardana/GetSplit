@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto mt-8 mb-12">

        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}! 👋</h1>
            <p class="text-gray-600 mt-1">Here's your bill splitting overview</p>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <!-- Card 1: Total Bills -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Total Bills</h3>
                        <p class="text-3xl font-bold text-gray-800">{{ $totalBills }}</p>
                        <p class="text-xs text-gray-500 mt-1">Bills you've created</p>
                    </div>
                    <div class="bg-blue-100 rounded-lg p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 2: Pending Amount -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Pending Payments</h3>
                        <p class="text-3xl font-bold text-red-600">Rp
                            {{ number_format($totalPendingAmount, 0, ',', '.') }}</p>
                        <p class="text-xs text-gray-500 mt-1">Awaiting payment</p>
                    </div>
                    <div class="bg-red-100 rounded-lg p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card 3: Completed Amount -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Completed</h3>
                        <p class="text-3xl font-bold text-green-600">Rp
                            {{ number_format($totalCompletedAmount, 0, ',', '.') }}</p>
                        <p class="text-xs text-gray-500 mt-1">Fully settled bills</p>
                    </div>
                    <div class="bg-green-100 rounded-lg p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left Section: Bills Overview -->
            <div class="lg:col-span-2">

                <!-- Bills Waiting for Payment -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Partially Paid Bills</h2>
                        <a href="{{ route('transaction.index') }}"
                            class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                            View All →
                        </a>
                    </div>

                    @if ($waitingBills->count() > 0)
                        <div class="space-y-3">
                            @foreach ($waitingBills->take(5) as $bill)
                                <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-800">{{ $bill->name }}</h3>
                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $bill->pending_participants }} participant(s) still pending
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">
                                                Rp {{ number_format($bill->total_pending, 0, ',', '.') }}
                                            </p>
                                            <span
                                                class="inline-block mt-1 px-2 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded">
                                                Partial
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-3"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-gray-500">No partially paid bills</p>
                        </div>
                    @endif
                </div>

            </div>

            <!-- Right Section: CTA & Quick Info -->
            <div class="lg:col-span-1 space-y-6">

                <!-- CTA: Create New Bill -->
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="text-center">
                        <h3 class="text-xl font-bold mb-2">
                            Split a New Bill
                        </h3>

                        <p class="text-sm text-emerald-100 mb-6">
                            Easily divide expenses with friends
                        </p>

                        <a href="{{ route('bills.create') }}"
                            class="block w-full bg-white text-emerald-700 font-semibold py-3 px-6 rounded-lg
                  hover:bg-emerald-50 transition-colors">
                            Create New Bill
                        </a>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Stats</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Pending</span>
                            <span class="font-bold text-red-600">{{ $pendingCount }}</span>
                        </div>
                        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Completed</span>
                            <span class="font-bold text-green-600">{{ $completedCount }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">This Month</span>
                            <span class="font-bold text-blue-600">{{ $monthlyCount }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
