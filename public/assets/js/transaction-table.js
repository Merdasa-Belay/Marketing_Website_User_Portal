function toggleSubscription(event) {
    event.preventDefault();
    const button = event.target;
    const form = button.closest('form');

    // Send form data using AJAX
    fetch(form.action, {
        method: form.method,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'subscribed') {
            button.innerText = 'Unsubscribe';
        } else if (data.status === 'unsubscribed') {
            button.innerText = 'Subscribe';
        }
    })
    .catch(error => console.error('Error:', error));
}
