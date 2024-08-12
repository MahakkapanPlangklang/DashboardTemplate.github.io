const loginBtn = document.getElementById('login-btn');
const signupBtn = document.getElementById('signup-btn');
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const closeBtns = document.querySelectorAll('.close-btn');
const popupContainer = document.querySelector('.popup-container');

// Add event listeners to the buttons
loginBtn.addEventListener('click', () => {
  popupContainer.style.display = 'block';
  document.querySelector('.popup:first-child').style.display = 'block';
});

signupBtn.addEventListener('click', () => {
  popupContainer.style.display = 'block';
  document.querySelector('.popup:last-child').style.display = 'block';
});

closeBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    popupContainer.style.display = 'none';
    document.querySelectorAll('.popup').forEach((popup) => {
      popup.style.display = 'none';
    });
  });
});

// Add event listeners to the forms
loginForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  // TO DO: implement login logic here
  console.log(`Login attempt: ${username} ${password}`);
});

signupForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const username = document.getElementById('username').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm-password').value;
  // TO DO: implement signup logic here
  console.log(`Signup attempt: ${username} ${email} ${password} ${confirmPassword}`);
});