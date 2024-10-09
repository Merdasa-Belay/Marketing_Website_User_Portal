function toggleSelectAll(selectAllCheckbox) {
    const checkboxes = document.querySelectorAll('.transaction-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = selectAllCheckbox.checked;
    });
}