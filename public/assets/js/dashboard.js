function toggleDateInput() {
    const dateInput = document.getElementById('selectDate');
    if (dateInput.style.display === 'none' || dateInput.style.display === '') {
        dateInput.style.display = 'block';
        dateInput.focus(); // Optionally, focus the date input when it becomes visible
    } else {
        dateInput.style.display = 'none';
    }
}
