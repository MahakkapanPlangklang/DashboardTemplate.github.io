// JavaScript to highlight the active menu item based on the current page URL
document.addEventListener('DOMContentLoaded', function () {
  // Get the current URL path
  var currentPath = location.pathname.split('/').pop();

  // Select all nav links
  var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
  
  // Loop through each nav link
  navLinks.forEach(function (link) {
    // Check if the link's href matches the current path
    if (link.getAttribute('href') === currentPath) {
      // Add 'active' class to the matching link
      link.classList.add('active');
    }
  });
});
