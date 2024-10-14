function toggleSubscription(event) {
    event.preventDefault(); // Prevent default anchor behavior

    const button = event.currentTarget; // Get the clicked button

    // Check if the button is currently 'Subscribe'
    if (button.innerText.trim() === 'Subscribe') {
        button.innerHTML = '<i class="fas fa-check"></i> Subscribed'; // Change text and icon
        button.classList.remove('btn-light'); // Optional: change button style if needed
        button.classList.add('btn-success'); // Change button color to success (or any other style)
    } else {
        button.innerHTML = '<i class="fas fa-bolt"></i> Subscribe'; // Revert back to original text
        button.classList.remove('btn-success'); // Revert style
        button.classList.add('btn-light'); // Revert to original style
    }
}




