<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * Menyimpan perubahan profil pengguna
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'country_code' => 'nullable|string|max:5',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama lengkap maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
            'phone_number.max' => 'Nomor telepon maksimal 20 karakter.',
        ]);

        try {
            // Update data pengguna
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            
            // Gabungkan country code dan nomor telepon
            if (!empty($validated['phone_number'])) {
                $countryCode = $validated['country_code'] ?? '+62';
                $user->phone_number = $countryCode . ' ' . $validated['phone_number'];
            } else {
                $user->phone_number = null;
            }

            $user->save();

            return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
            
        } catch (\Exception $e) {
            return redirect()->route('profile')->with('error', 'Terjadi kesalahan saat memperbarui profil. Silakan coba lagi.');
        }
    }
}