import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    const profileDropdownBtn = document.getElementById('profileDropdownBtn');
    const profileDropdown = document.getElementById('profileDropdown');
    const dropdownIcon = document.getElementById('dropdownIcon');

    if (profileDropdownBtn && profileDropdown && dropdownIcon) {
        profileDropdownBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
            dropdownIcon.style.transform =
                profileDropdown.classList.contains('hidden')
                    ? 'rotate(0deg)'
                    : 'rotate(180deg)';
        });

        document.addEventListener('click', (e) => {
            if (!profileDropdownBtn.contains(e.target) &&
                !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
                dropdownIcon.style.transform = 'rotate(0deg)';
            }
        });
    }

    const logoutBtn = document.getElementById('logoutBtn');
    const logoutPopup = document.getElementById('logoutPopup');
    const confirmLogout = document.getElementById('confirmLogout');
    const cancelLogout = document.getElementById('cancelLogout');
    const logoutForm = document.getElementById('logoutForm');

    if (logoutBtn && logoutPopup && confirmLogout && cancelLogout && logoutForm) {

        logoutBtn.addEventListener('click', () => {
            profileDropdown?.classList.add('hidden');
            dropdownIcon.style.transform = 'rotate(0deg)';
            logoutPopup.classList.remove('hidden');
        });

        cancelLogout.addEventListener('click', () => {
            logoutPopup.classList.add('hidden');
        });

        confirmLogout.addEventListener('click', () => {
            logoutForm.submit(); 
        });

        logoutPopup.addEventListener('click', (e) => {
            if (e.target === logoutPopup) {
                logoutPopup.classList.add('hidden');
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                logoutPopup.classList.add('hidden');
            }
        });
    }


    const blur = document.getElementById('scrollBlur');
    if (blur) {
        window.addEventListener('scroll', () => {
            blur.classList.toggle('opacity-100', window.scrollY > 10);
            blur.classList.toggle('opacity-0', window.scrollY <= 10);
        });
    }
});
