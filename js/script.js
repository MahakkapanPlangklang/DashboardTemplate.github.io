// Login page script
const loginForm = document.querySelector('.login-form');
const loginUsernameInput = document.querySelector('#username');
const loginPasswordInput = document.querySelector('#password');

loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const username = loginUsernameInput.value;
    const password = loginPasswordInput.value;
    // TO DO: implement login logic here
    console.log(`Username: ${username}, Password: ${password}`);
});

// Sign up page script
const signupForm = document.querySelector('.signup-form');
const signupUsernameInput = document.querySelector('#username');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#confirm-password');

signupForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const username = signupUsernameInput.value;
    const email = emailInput.value;
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;
    // TO DO: implement sign up logic here
    console.log(`Username: ${username}, Email: ${email}, Password: ${password}, Confirm Password: ${confirmPassword}`);
});