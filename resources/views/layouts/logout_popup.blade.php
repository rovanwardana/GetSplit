<!-- Logout Confirmation Popup -->
<div id="logoutPopup"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40">

    <div
        class="bg-white rounded-2xl shadow-xl p-6 w-[320px] text-gray-800">

        <h2 class="text-lg font-semibold mb-2">
            Confirm Logout
        </h2>

        <p class="text-sm text-gray-600 mb-6">
            Are you sure you want to log out?
        </p>

        <div class="flex justify-end gap-3">
            <button id="cancelLogout"
                class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700
                       hover:bg-gray-300 transition text-sm">
                Cancel
            </button>

            <button id="confirmLogout"
                class="px-4 py-2 rounded-lg bg-red-600 text-white
                       hover:bg-red-700 transition text-sm">
                Logout
            </button>
        </div>
    </div>
</div>

<!-- Hidden Logout Form -->
<form id="logoutForm" method="POST" action="{{ route('logout') }}" class="hidden">
    @csrf
</form>
