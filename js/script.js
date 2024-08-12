// Selectors
const navToggle = document.querySelector('.nav-toggle');
const navMenu = document.querySelector('.nav-menu');
const heroButton = document.querySelector('.hero-button');
const featuresTabs = document.querySelectorAll('.features-tab');
const testimonialsCarousel = document.querySelector('.testimonials-carousel');
const callToActionButton = document.querySelector('.call-to-action-button');

// Navigation Menu Toggle
navToggle.addEventListener('click', () => {
  navMenu.classList.toggle('active');
});

// Hero Button Scroll to Features
heroButton.addEventListener('click', () => {
  document.querySelector('.features').scrollIntoView({ behavior: 'smooth' });
});

// Features Tabs
featuresTabs.forEach((tab) => {
  tab.addEventListener('click', () => {
    const tabId = tab.getAttribute('data-tab');
    const tabContent = document.querySelector(`.features-content#${tabId}`);
    featuresTabs.forEach((t) => t.classList.remove('active'));
    tab.classList.add('active');
    tabContent.classList.add('active');
  });
});

// Testimonials Carousel
let testimonialIndex = 0;
const testimonials = testimonialsCarousel.children;
const testimonialCount = testimonials.length;

function nextTestimonial() {
  testimonialIndex = (testimonialIndex + 1) % testimonialCount;
  testimonialsCarousel.style.transform = `translateX(-${testimonialIndex * 100}%)`;
}

function prevTestimonial() {
  testimonialIndex = (testimonialIndex - 1 + testimonialCount) % testimonialCount;
  testimonialsCarousel.style.transform = `translateX(-${testimonialIndex * 100}%)`;
}

document.querySelector('.testimonials-prev').addEventListener('click', prevTestimonial);
document.querySelector('.testimonials-next').addEventListener('click', nextTestimonial);

// Call to Action Button Scroll to Top
callToActionButton.addEventListener('click', () => {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});