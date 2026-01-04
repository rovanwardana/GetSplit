@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', 'Profile')

@section('content')
    <div style="max-width: 800px; margin: 2rem auto; padding: 0 1rem;">
        <!-- Notifikasi -->
        @if (session('success'))
            <div
                style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div
                style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        <!-- Profile Card -->
        <div
            style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
            <!-- Header Section -->
            <div
                style="background: linear-gradient(135deg, #071739 0%, #4B6382 100%); padding: 2rem; text-align: center; position: relative;">
                <!-- Profile Icon -->
                <div
                    style="width: 120px; height: 120px; margin: 0 auto 1rem; background-color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 70px; height: 70px; color: #4B6382;"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                    </svg>
                </div>

                <h2 style="color: #ffffff; font-size: 1.75rem; font-weight: 600; margin-bottom: 0.5rem;">{{ $user->name }}
                </h2>
                <p style="color: rgba(255, 255, 255, 0.8); font-size: 0.875rem;">Member sejak
                    {{ $user->created_at->format('d M Y') }}</p>
            </div>

            <!-- Content Section -->
            <div style="padding: 2rem;">
                <!-- Mode Toggle -->
                <div
                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 2px solid #e5e7eb;">
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #071739;">Informasi Profil</h3>
                    <button id="toggleEditMode" onclick="toggleEditMode()"
                        style="padding: 0.5rem 1rem; background-color: #071739; color: #ffffff; border: none; border-radius: 6px; font-size: 0.875rem; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; transition: background-color 0.3s;">
                        <svg id="editIcon" xmlns="http://www.w3.org/2000/svg" style="width: 16px; height: 16px;"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                        <span id="editButtonText">Edit Profil</span>
                    </button>
                </div>

                <!-- View Mode -->
                <div id="viewMode">
                    <div style="display: grid; gap: 1.5rem;">
                        <!-- Nama -->
                        <div style="display: flex; padding: 1rem; background-color: #f9fafb; border-radius: 8px;">
                            <div style="flex: 0 0 140px; color: #6b7280; font-size: 0.875rem; font-weight: 500;">Nama
                                Lengkap</div>
                            <div style="flex: 1; color: #071739; font-weight: 500;">{{ $user->name }}</div>
                        </div>

                        <!-- Email -->
                        <div style="display: flex; padding: 1rem; background-color: #f9fafb; border-radius: 8px;">
                            <div style="flex: 0 0 140px; color: #6b7280; font-size: 0.875rem; font-weight: 500;">Email</div>
                            <div style="flex: 1; color: #071739; font-weight: 500;">{{ $user->email }}</div>
                        </div>

                        <!-- Phone -->
                        <div style="display: flex; padding: 1rem; background-color: #f9fafb; border-radius: 8px;">
                            <div style="flex: 0 0 140px; color: #6b7280; font-size: 0.875rem; font-weight: 500;">Nomor
                                Telepon</div>
                            <div style="flex: 1; color: #071739; font-weight: 500;">
                                {{ $user->phone_number ?? 'Belum diisi' }}</div>
                        </div>

                        <!-- Last Activity -->
                        <div style="display: flex; padding: 1rem; background-color: #f9fafb; border-radius: 8px;">
                            <div style="flex: 0 0 140px; color: #6b7280; font-size: 0.875rem; font-weight: 500;">Terakhir
                                Aktif</div>
                            <div style="flex: 1; color: #071739; font-weight: 500;">
                                {{ $user->updated_at->setTimezone('Asia/Makassar')->format('d M Y, H:i') }} WITA</div>
                        </div>
                    </div>
                </div>

                <!-- Edit Mode -->
                <div id="editMode" style="display: none;">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div style="display: grid; gap: 1.5rem;">
                            <!-- Nama -->
                            <div>
                                <label for="name"
                                    style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.5rem;">
                                    Nama Lengkap <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                    required
                                    style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; color: #071739; transition: border-color 0.3s;"
                                    onfocus="this.style.borderColor='#071739'" onblur="this.style.borderColor='#d1d5db'">
                                @error('name')
                                    <span
                                        style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email"
                                    style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.5rem;">
                                    Email <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required
                                    style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; color: #071739; transition: border-color 0.3s;"
                                    onfocus="this.style.borderColor='#071739'" onblur="this.style.borderColor='#d1d5db'">
                                @error('email')
                                    <span
                                        style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone_number"
                                    style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.5rem;">
                                    Nomor Telepon
                                </label>
                                <div style="display: flex; gap: 0.75rem;">
                                    @php
                                        $countryCode = '+62';
                                        $phoneNumber = '';

                                        if ($user->phone_number) {
                                            if (preg_match('/^(\+\d{1,3})\s*(.*)$/', $user->phone_number, $matches)) {
                                                $countryCode = $matches[1];
                                                $phoneNumber = $matches[2];
                                            } else {
                                                $phoneNumber = $user->phone_number;
                                            }
                                        }
                                    @endphp
                                    <select id="country_code" name="country_code"
                                        style="padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; color: #071739; background-color: #ffffff; min-width: 120px;">
                                        <option value="+62" {{ $countryCode == '+62' ? 'selected' : '' }}>🇮🇩 +62
                                        </option>
                                        <option value="+1" {{ $countryCode == '+1' ? 'selected' : '' }}>🇺🇸 +1
                                        </option>
                                        <option value="+60" {{ $countryCode == '+60' ? 'selected' : '' }}>🇲🇾 +60
                                        </option>
                                        <option value="+65" {{ $countryCode == '+65' ? 'selected' : '' }}>🇸🇬 +65
                                        </option>
                                    </select>
                                    <input type="text" id="phone_number" name="phone_number"
                                        value="{{ old('phone_number', $phoneNumber) }}" placeholder="Contoh: 81234567890"
                                        style="flex: 1; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; color: #071739; transition: border-color 0.3s;"
                                        onfocus="this.style.borderColor='#071739'"
                                        onblur="this.style.borderColor='#d1d5db'">
                                </div>
                                @error('phone_number')
                                    <span
                                        style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div style="display: flex; gap: 1rem; margin-top: 2rem; justify-content: flex-end;">
                            <button type="button" onclick="toggleEditMode()"
                                style="padding: 0.75rem 1.5rem; background-color: #f3f4f6; color: #374151; border: none; border-radius: 8px; font-size: 0.875rem; font-weight: 500; cursor: pointer; transition: background-color 0.3s;"
                                onmouseover="this.style.backgroundColor='#e5e7eb'"
                                onmouseout="this.style.backgroundColor='#f3f4f6'">
                                Batal
                            </button>
                            <button type="submit"
                                style="padding: 0.75rem 1.5rem; background-color: #071739; color: #ffffff; border: none; border-radius: 8px; font-size: 0.875rem; font-weight: 500; cursor: pointer; transition: background-color 0.3s;"
                                onmouseover="this.style.backgroundColor='#4B6382'"
                                onmouseout="this.style.backgroundColor='#071739'">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function toggleEditMode() {
                const viewMode = document.getElementById('viewMode');
                const editMode = document.getElementById('editMode');
                const editIcon = document.getElementById('editIcon');
                const editButtonText = document.getElementById('editButtonText');
                const toggleButton = document.getElementById('toggleEditMode');

                if (viewMode.style.display === 'none') {
                    // Switch to view mode
                    viewMode.style.display = 'block';
                    editMode.style.display = 'none';
                    editButtonText.textContent = 'Edit Profil';
                    editIcon.innerHTML =
                        '<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>';
                } else {
                    // Switch to edit mode
                    viewMode.style.display = 'none';
                    editMode.style.display = 'block';
                    editButtonText.textContent = 'Lihat Profil';
                    editIcon.innerHTML =
                        '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
                }
            }
        </script>
    @endpush
@endsection
