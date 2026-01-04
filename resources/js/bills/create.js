let itemCount = 0;
let participantCount = 0;
let itemsData = [];

document.addEventListener('DOMContentLoaded', () => {
    initializeForm();
    setupEventListeners();
    addItem();
});

function initializeForm() {
    itemCount = 0;
    participantCount = 0;
    itemsData = [];
}

function setupEventListeners() {
    document.getElementById('add-item').addEventListener('click', addItem);

    document.getElementById('add-participant').addEventListener('click', addParticipant);

    document.getElementById('split-method').addEventListener('change', updateParticipantItems);

    const taxInput = document.getElementById('tax-percentage');
    const discountInput = document.getElementById('discount');
    
    taxInput.addEventListener('input', calculateTotals);
    discountInput.addEventListener('input', calculateTotals);
    
    setupAutoClearInput(taxInput);
    setupAutoClearInput(discountInput);

    document.getElementById('new-bill-form').addEventListener('submit', validateForm);
}

function setupAutoClearInput(input) {
    input.addEventListener('focus', function() {
        if (this.value === '0' || this.value === '0.00') {
            this.value = '';
        }
    });
    
    input.addEventListener('blur', function() {
        if (this.value === '' || this.value === '.') {
            this.value = '0';
        }
    });
}


function addItem() {
    const itemsList = document.getElementById('items-list');
    const itemIndex = itemCount;

    const itemRow = document.createElement('div');
    itemRow.className = 'item-row bg-gray-50 p-4 rounded-lg flex flex-col gap-4';
    itemRow.dataset.itemIndex = itemIndex;
    
    itemRow.innerHTML = `
        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Item Name</label>
                <input type="text" name="items[${itemIndex}][name]" placeholder="Enter item name" 
                    class="w-full px-2 rounded item-name text-gray-700" required />
            </div>
            <div class="w-full sm:w-24">
                <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                <input type="number" name="items[${itemIndex}][qty]" value="1" min="1" 
                    class="w-full px-2 rounded item-qty text-gray-700" required />
            </div>
            <div class="w-full sm:w-32">
                <label class="block text-sm font-medium text-gray-700 mb-1">Unit Price</label>
                <div class="flex items-center">
                    <span class="text-gray-500 mr-2">Rp.</span>
                    <input type="number" name="items[${itemIndex}][price]" value="0" min="0" step="0.01" 
                        class="w-full px-2 rounded item-price text-gray-700" required />
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <span class="text-sm font-medium">Total: Rp. <span class="item-total">0</span></span>
            <button type="button" class="text-red-600 hover:text-red-700 remove-item">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
            </button>
        </div>
    `;

    itemsList.appendChild(itemRow);

    const nameInput = itemRow.querySelector('.item-name');
    const qtyInput = itemRow.querySelector('.item-qty');
    const priceInput = itemRow.querySelector('.item-price');
    
    nameInput.addEventListener('input', calculateTotals);
    qtyInput.addEventListener('input', calculateTotals);
    priceInput.addEventListener('input', calculateTotals);
    itemRow.querySelector('.remove-item').addEventListener('click', () => removeItem(itemRow));

    setupAutoClearInput(qtyInput);
    setupAutoClearInput(priceInput);

    itemCount++;
    calculateTotals();
}

function removeItem(itemRow) {
    itemRow.remove();
    calculateTotals();
    updateParticipantItems();
}

function addParticipant() {
    const participantsList = document.getElementById('participants-list');
    const participantIndex = participantCount;

    const participantRow = document.createElement('div');
    participantRow.className = 'participant-row bg-gray-50 p-4 rounded-lg flex flex-col sm:flex-row sm:items-center gap-4';
    participantRow.dataset.participantIndex = participantIndex;

    participantRow.innerHTML = `
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 mb-1">Participant Name</label>
            <input type="text" name="participants[${participantIndex}][name]" placeholder="Enter participant name" 
                class="w-full px-2 rounded participant-name text-gray-700" required />
        </div>
        <div class="w-full sm:w-12">
            <button type="button" class="text-red-600 hover:text-red-700 remove-participant mt-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
            </button>
        </div>
    `;

    participantsList.appendChild(participantRow);

    participantRow.querySelector('.participant-name').addEventListener('input', updateParticipantItems);
    participantRow.querySelector('.remove-participant').addEventListener('click', () => removeParticipant(participantRow));

    participantCount++;
    updateParticipantItems();
}

function removeParticipant(participantRow) {
    participantRow.remove();
    updateParticipantItems();
}

function calculateTotals() {
    // Collect items data
    itemsData = [];
    let subtotal = 0;

    document.querySelectorAll('.item-row').forEach((row) => {
        const itemIndex = row.dataset.itemIndex;
        const name = row.querySelector('.item-name').value;
        const qty = parseFloat(row.querySelector('.item-qty').value || 0);
        const price = parseFloat(row.querySelector('.item-price').value || 0);
        const total = qty * price;

        row.querySelector('.item-total').textContent = total.toLocaleString('id-ID');

        itemsData.push({
            index: itemIndex,
            name,
            qty,
            price,
            total
        });

        subtotal += total;
    });

    const discount = parseFloat(document.getElementById('discount').value || 0);
    const taxPercentage = parseFloat(document.getElementById('tax-percentage').value || 0);
    
    const taxAmount = ((subtotal - discount) * taxPercentage) / 100;
    
    const totalAmount = subtotal - discount + taxAmount;

    document.getElementById('subtotal').textContent = subtotal.toLocaleString('id-ID');
    document.getElementById('discount-amount').textContent = discount.toLocaleString('id-ID');
    document.getElementById('tax-amount').textContent = taxAmount.toLocaleString('id-ID');
    document.getElementById('total-amount').textContent = totalAmount.toLocaleString('id-ID');

    updateSplitSummary();
}

function updateParticipantItems() {
    const splitMethod = document.getElementById('split-method').value;
    const participantItemsContainer = document.getElementById('participant-items');

    if (splitMethod === 'equal') {
        participantItemsContainer.classList.add('hidden');
        updateSplitSummary();
        return;
    }

    participantItemsContainer.classList.remove('hidden');
    participantItemsContainer.innerHTML = '';

    const participants = [];
    document.querySelectorAll('.participant-row').forEach(row => {
        const participantIndex = row.dataset.participantIndex;
        const name = row.querySelector('.participant-name').value;
        if (name) {
            participants.push({ index: participantIndex, name });
        }
    });

    participants.forEach(participant => {
        const participantDiv = document.createElement('div');
        participantDiv.className = 'bg-gray-50 p-4 rounded-lg mb-4';

        let itemsHtml = `<h4 class="text-sm font-medium text-gray-800 mb-2">${participant.name}</h4>`;
        itemsHtml += '<div class="space-y-2">';

        itemsData.forEach(item => {
            const existingInput = document.querySelector(
                `input[name="participants[${participant.index}][items][${item.index}][qty]"]`
            );
            const prevQty = existingInput ? parseFloat(existingInput.value || 0) : 0;

            itemsHtml += `
                <div class="flex items-center justify-between">
                    <label class="text-sm text-gray-700">${item.name} (Max: ${item.qty}, Price: Rp. ${item.price.toLocaleString('id-ID')})</label>
                    <input type="number" 
                        name="participants[${participant.index}][items][${item.index}][qty]" 
                        value="${prevQty}" 
                        min="0" 
                        max="${item.qty}" 
                        step="1" 
                        class="w-20 px-2 rounded participant-item-qty text-gray-700" 
                        data-participant-index="${participant.index}"
                        data-item-index="${item.index}" />
                </div>
            `;
        });

        itemsHtml += '</div>';
        participantDiv.innerHTML = itemsHtml;
        participantItemsContainer.appendChild(participantDiv);
    });

    document.querySelectorAll('.participant-item-qty').forEach(input => {
        input.addEventListener('input', updateSplitSummary);
        setupAutoClearInput(input);
    });

    updateSplitSummary();
}

function updateSplitSummary() {
    const splitSummary = document.getElementById('split-summary');
    splitSummary.innerHTML = '';

    const splitMethod = document.getElementById('split-method').value;

    const participants = [];
    document.querySelectorAll('.participant-row').forEach(row => {
        const participantIndex = row.dataset.participantIndex;
        const name = row.querySelector('.participant-name').value;
        if (name) {
            participants.push({ index: participantIndex, name });
        }
    });

    if (participants.length === 0) {
        splitSummary.innerHTML = '<li class="text-gray-500">No participants added yet</li>';
        return;
    }

    const subtotal = itemsData.reduce((sum, item) => sum + item.total, 0);
    const discount = parseFloat(document.getElementById('discount').value || 0);
    const taxPercentage = parseFloat(document.getElementById('tax-percentage').value || 0);
    const taxAmount = ((subtotal - discount) * taxPercentage) / 100;
    const totalAmount = subtotal - discount + taxAmount;

    if (splitMethod === 'equal') {
        const perPerson = totalAmount / participants.length;

        participants.forEach(participant => {
            const li = document.createElement('li');
            li.textContent = `${participant.name}: Rp. ${perPerson.toLocaleString('id-ID')} (Equal Split)`;
            splitSummary.appendChild(li);
        });
    } else {
        const participantTotals = {};

        participants.forEach(participant => {
            participantTotals[participant.index] = {
                name: participant.name,
                subtotal: 0,
                items: []
            };

            itemsData.forEach(item => {
                const qtyInput = document.querySelector(
                    `input[name="participants[${participant.index}][items][${item.index}][qty]"]`
                );
                const qty = qtyInput ? parseFloat(qtyInput.value || 0) : 0;

                if (qty > 0) {
                    const itemTotal = qty * item.price;
                    participantTotals[participant.index].subtotal += itemTotal;
                    participantTotals[participant.index].items.push(
                        `${qty} x ${item.name} (Rp. ${itemTotal.toLocaleString('id-ID')})`
                    );
                }
            });
        });

        Object.values(participantTotals).forEach(participant => {
            const proportion = subtotal > 0 ? participant.subtotal / subtotal : 0;
            const taxShare = taxAmount * proportion;
            const discountShare = discount * proportion;
            const finalAmount = participant.subtotal - discountShare + taxShare;

            const li = document.createElement('li');
            li.innerHTML = `
                ${participant.name}: Rp. ${finalAmount.toLocaleString('id-ID')}
                ${participant.items.length > 0 ? `
                    <ul class="list-circle pl-6 mt-1">
                        ${participant.items.map(item => `<li>${item}</li>`).join('')}
                    </ul>
                ` : '<span class="text-gray-500 ml-2">(No items selected)</span>'}
            `;
            splitSummary.appendChild(li);
        });
    }
}

function validateForm(event) {
    // Check items
    const itemRows = document.querySelectorAll('.item-row');
    if (itemRows.length === 0) {
        event.preventDefault();
        alert('Please add at least one item');
        return false;
    }

    // Check participants
    const participantRows = document.querySelectorAll('.participant-row');
    if (participantRows.length === 0) {
        event.preventDefault();
        alert('Please add at least one participant');
        return false;
    }

    // Check custom split validation
    const splitMethod = document.getElementById('split-method').value;
    if (splitMethod === 'custom') {
        let validationError = false;

        itemsData.forEach(item => {
            let totalQtyUsed = 0;

            document.querySelectorAll(`input[data-item-index="${item.index}"]`).forEach(input => {
                totalQtyUsed += parseFloat(input.value || 0);
            });

            if (totalQtyUsed > item.qty) {
                validationError = true;
                alert(`Total quantity for "${item.name}" exceeds available quantity (${item.qty})`);
            }
        });

        if (validationError) {
            event.preventDefault();
            return false;
        }
    }

    return true;
}