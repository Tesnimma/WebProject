let users = JSON.parse(localStorage.getItem('users')) || [];

function validateForm(event) {
    event.preventDefault();

    const usernameInput = document.getElementById('username');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    const username = usernameInput.value.trim();
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    let isValid = true;

    const usernameError = document.getElementById('usernameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    // Reset error messages and border styles
    usernameError.innerText = '';
    emailError.innerText = '';
    passwordError.innerText = '';
    resetBorder(usernameInput);
    resetBorder(emailInput);
    resetBorder(passwordInput);

    if (username === '') {
        usernameError.innerText = 'Username is required';
        usernameInput.style.borderColor = 'red';
        isValid = false;
    }

    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (email === '' || !email.match(emailPattern)) {
        emailError.innerText = 'Valid email is required';
        emailInput.style.borderColor = 'red';
        isValid = false;
    }

    if (password === '') {
        passwordError.innerText = 'Password is required';
        passwordInput.style.borderColor = 'red';
        isValid = false;
    }

    if (isValid) {
        const newUser = { username, email, password };
        users.push(newUser);
        localStorage.setItem('users', JSON.stringify(users));

        window.location.href = 'login.html';
    }
}

// Function to reset border styles
function resetBorder(input) {
    input.style.borderColor = ''; // Remove border color
}

// Clear error message and apply green border when corrected
function clearError(event) {
    const target = event.target;
    const errorElement = document.getElementById(`${target.id}Error`);
    if (errorElement) {
        errorElement.innerText = '';
        target.style.borderColor = 'green'; // Apply green border
    }
}

// Add event listeners
document.getElementById('registrationForm').addEventListener('submit', validateForm);
document.getElementById('username').addEventListener('input', clearError);
document.getElementById('email').addEventListener('input', clearError);
document.getElementById('password').addEventListener('input', clearError);
