document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    validateForm();
});

function validateForm() {
    let isValid = true;

    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Username validation
    if (username === '') {
        document.getElementById('usernameError').innerText = 'Username is required';
        isValid = false;
    } else {
        document.getElementById('usernameError').innerText = '';
    }

    // Email validation (format check)
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (email === '' || !email.match(emailPattern)) {
        document.getElementById('emailError').innerText = 'Valid email is required';
        isValid = false;
    } else {
        document.getElementById('emailError').innerText = '';
    }

    // Password validation
    if (password === '') {
        document.getElementById('passwordError').innerText = 'Password is required';
        isValid = false;
    } else {
        document.getElementById('passwordError').innerText = '';
    }

    if (isValid) {
        alert("Form submitted successfully!");
    }
}
