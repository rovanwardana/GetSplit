@extends('layouts.app')

@vite(['resources/css/app.css', 'resources/js/transaction/index.js'])

@section('title', 'Transaction')

@section('content')
    <div class="max-w-6xl mx-auto mb-20 mt-8">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Transactions</h1>
            <p class="text-gray-600 mt-1">View and manage all your transactions</p>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 flex items-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Transactions List -->
        <div class="space-y-6">
            @forelse ($transactions as $transaction)
                @php
                    $creator = $transaction->bill?->user;
                    $bill = $transaction->bill;
                    $participants = $bill ? $bill->participants : collect();
                    $participantItems =
                        $bill && $bill->participantItems
                            ? $bill->participantItems->groupBy('bill_participant_id')
                            : collect();
                    $splitMethod = $bill->split_method ?? 'equal';

                    // Status badge styling
                    $statusClasses = [
                        'Pending' => 'bg-red-100 text-red-700',
                        'Partially' => 'bg-yellow-100 text-yellow-700',
                        'Paid' => 'bg-green-100 text-green-700',
                        'Completed' => 'bg-green-100 text-green-700',
                    ];
                @endphp

                <!-- Transaction Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-200 hover:shadow-lg"
                    data-transaction-id="{{ $transaction->id }}">

                    <!-- Card Header -->
                    <div class="p-5 cursor-pointer view-details" data-id="{{ $transaction->id }}">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                    {{ $transaction->bill->name ?? '-' }}
                                </h3>
                                <div class="flex items-center gap-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $creator?->name ?? 'Unknown' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusClasses[$transaction->status] ?? 'bg-gray-100 text-gray-700' }}">
                                    {{ $transaction->status }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-gray-400 transition-transform duration-200 chevron-icon"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Card Details (Hidden by default) -->
                    <div class="detail-content hidden border-t border-gray-200" id="detail-{{ $transaction->id }}">
                        <div class="p-5 bg-gray-50">

                            <!-- Participants Section -->
                            <div class="mb-6">
                                <h4 class="text-md font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                    </svg>
                                    Participants & Payment Status
                                </h4>

                                @if ($participants && $participants->count() > 0)
                                    <form class="status-form space-y-3" data-transaction-id="{{ $transaction->id }}">
                                        @csrf
                                        @foreach ($participants as $participant)
                                            @php
                                                $billParticipantId = $participant->id;
                                                $user = $participant->user;
                                                $userItems = $participantItems->get($billParticipantId, collect());
                                                $amountToPay = $participant->amount_to_pay ?? 0;
                                            @endphp

                                            <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
                                                <div class="flex items-start justify-between gap-4 mb-3">
                                                    <div class="flex-1">
                                                        <p class="font-semibold text-gray-800 mb-1">
                                                            {{ $participant->name }}</p>
                                                        <p class="text-sm text-gray-600">
                                                            Amount to pay:
                                                            <span class="font-bold text-blue-600">Rp
                                                                {{ number_format($amountToPay, 0, ',', '.') }}</span>
                                                        </p>
                                                    </div>

                                                    <div class="flex items-center gap-2">
                                                        <label class="text-sm text-gray-600 font-medium">Status:</label>
                                                        <select
                                                            class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:border-blue-500 focus:ring-blue-500 status-select"
                                                            name="statuses[{{ $billParticipantId }}]">
                                                            <option value="Pending"
                                                                {{ ($participant?->payment_status ?? 'Pending') === 'Pending' ? 'selected' : '' }}>
                                                                Pending
                                                            </option>
                                                            <option value="Paid"
                                                                {{ ($participant?->payment_status ?? 'Pending') === 'Paid' ? 'selected' : '' }}>
                                                                Paid
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                @if ($splitMethod === 'custom' && $userItems->isNotEmpty())
                                                    <div class="mt-3 pt-3 border-t border-gray-100">
                                                        <p class="text-xs font-semibold text-gray-600 mb-2">Items:</p>
                                                        <ul class="space-y-1">
                                                            @foreach ($userItems as $item)
                                                                <li class="text-xs text-gray-700 flex items-start gap-2">
                                                                    <span class="text-blue-600">•</span>
                                                                    <span>
                                                                        {{ $item->item->name ?? 'Unknown Item' }}
                                                                        ({{ $item->qty }}x)
                                                                        -
                                                                        Rp
                                                                        {{ number_format(($item->item->price ?? 0) * $item->qty, 0, ',', '.') }}
                                                                    </span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach

                                        <!-- Action Buttons -->
                                        <div class="flex gap-3 pt-3"
                                            style="display: flex !important; visibility: visible !important;">
                                            <button type="button"
                                                class="flex-1 bg-blue-600 text-white px-4 py-2.5 rounded-lg hover:bg-blue-700 transition-colors font-medium save-statuses"
                                                data-transaction-id="{{ $transaction->id }}"
                                                style="display: block !important; visibility: visible !important;">
                                                Save Changes
                                            </button>
                                            <button type="button"
                                                class="px-4 py-2.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors font-medium delete-transaction"
                                                data-id="{{ $transaction->id }}"
                                                style="display: block !important; visibility: visible !important;">
                                                Delete Transaction
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <div class="bg-white rounded-lg p-4 text-center text-gray-500">
                                        <p>No participants found</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl shadow-md p-12 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Transactions Yet</h3>
                    <p class="text-gray-500 mb-6">Start by creating your first bill</p>
                    <a href="{{ route('bills.create') }}"
                        class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        Create New Bill
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
