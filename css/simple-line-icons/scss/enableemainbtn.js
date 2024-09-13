
document.getElementById('mc-embedded-subscribe-form').addEventListener('submit', function(event) {
    // Prevent form submission initially
    event.preventDefault();
    
    // Get the input fields
    const email = document.getElementById('mce-EMAIL').value.trim();
    const firstName = document.getElementById('mce-FNAME').value.trim();
    const lastName = document.getElementById('mce-LNAME').value.trim();
    const phone = document.getElementById('mce-PHONE').value.trim();
    const gdprEmail = document.getElementById('gdpr_358023').checked;
    const gdprSMS = document.getElementById('gdpr_358026').checked;

    // Check if all required fields are filled
    if (email === '' || firstName === '' || lastName === '' || phone === '' || (!gdprEmail && !gdprSMS)) {
        alert('Please fill all required fields.');
        return;
    }

    // If validation passes, submit the form
    this.submit();
});

