const loginBtn = document.getElementById('login-btn');
const signupBtn = document.getElementById('signup-btn');
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const closeBtns = document.querySelectorAll('.close-btn');

// Add event listeners to the buttons
loginBtn.addEventListener('click', () => {
    loginForm.classList.add('show');
});

signupBtn.addEventListener('click', () => {
    signupForm.classList.add('show');
});

// Add event listeners to the close buttons
closeBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
        loginForm.classList.remove('show');
        signupForm.classList.remove('show');
    });
});

// Add event listeners to the forms
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    // TO DO: implement login logic here
    console.log(`Login form submitted with username: ${username} and password: ${password}`);
});

signupForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    // TO DO: implement signup logic here
    console.log(`Signup form submitted with username: ${username}, email: ${email}, password: ${password}, and confirm password: ${confirmPassword}`);
});