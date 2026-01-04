import '../bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    // Toggle detail view with animation
    document.querySelectorAll('.view-details').forEach(button => {
        button.addEventListener('click', function () {
            const transactionId = this.getAttribute('data-id');
            const detailContent = document.getElementById(`detail-${transactionId}`);
            const chevronIcon = this.querySelector('.chevron-icon');

            // Toggle detail content visibility
            detailContent.classList.toggle('hidden');

            // Rotate chevron icon
            if (detailContent.classList.contains('hidden')) {
                chevronIcon.style.transform = 'rotate(0deg)';
            } else {
                chevronIcon.style.transform = 'rotate(180deg)';
            }
        });
    });

    // Delete transaction
    document.querySelectorAll('.delete-transaction').forEach(button => {
        button.addEventListener('click', function () {
            const transactionId = this.getAttribute('data-id');

            // Show confirmation dialog
            if (confirm('Are you sure you want to delete this transaction? This action cannot be undone.')) {
                // Show loading state
                const originalText = this.textContent;
                this.textContent = 'Deleting...';
                this.disabled = true;

                // Send delete request
                fetch(`/transaction/${transactionId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Reload page to show updated list
                            location.reload();
                        } else {
                            alert('Failed to delete transaction. Please try again.');
                            this.textContent = originalText;
                            this.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the transaction.');
                        this.textContent = originalText;
                        this.disabled = false;
                    });
            }
        });
    });

    // Save payment statuses
    document.querySelectorAll('.save-statuses').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.status-form');
            const transactionId = this.getAttribute('data-transaction-id');
            const formData = new FormData(form);
            const statuses = {};

            // Collect all status values from form
            formData.forEach((value, key) => {
                const match = key.match(/^statuses\[(\d+)\]$/);
                if (match) {
                    const billParticipantId = match[1];
                    statuses[billParticipantId] = value;
                }
            });

            // Show loading state
            const originalText = this.textContent;
            this.textContent = 'Saving...';
            this.disabled = true;

            // Send update request
            fetch('/transaction/update-statuses', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    transaction_id: transactionId,
                    statuses: statuses,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message briefly before reload
                        this.textContent = 'Saved!';
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    } else {
                        alert('Failed to save status changes. Please try again.');
                        this.textContent = originalText;
                        this.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving status changes.');
                    this.textContent = originalText;
                    this.disabled = false;
                });
        });
    });

});