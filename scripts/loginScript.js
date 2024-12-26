let users = JSON.parse(localStorage.getItem('users')) || [];

function validateForm(event) {
    event.preventDefault();

    const usernameInput = document.getElementById('loginUsername');
    const passwordInput = document.getElementById('loginPassword');

    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    let isValid = true;

    const usernameError = document.getElementById('loginUsernameError');
    const passwordError = document.getElementById('loginPasswordError');

    // Reset error messages and border styles
    usernameError.innerText = '';
    passwordError.innerText = '';
    resetBorder(usernameInput);
    resetBorder(passwordInput);

    if (username === '') {
        usernameError.innerText = 'Username is required';
        usernameInput.style.borderColor = 'red';
        isValid = false;
    }

    if (password === '') {
        passwordError.innerText = 'Password is required';
        passwordInput.style.borderColor = 'red';
        isValid = false;
    }

    if (isValid) {
        const newUser = { username, password };
        users.push(newUser);
        localStorage.setItem('users', JSON.stringify(users));
        window.location.href = 'index.html';
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
document.getElementById('loginForm').addEventListener('submit', validateForm);
document.getElementById('loginUsername').addEventListener('input', clearError);
document.getElementById('loginPassword').addEventListener('input', clearError);
