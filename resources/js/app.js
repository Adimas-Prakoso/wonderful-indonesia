import Alpine from 'alpinejs';

// Define languages globally
window.languages = {
    en: {
        name: 'English',
        flag: '/images/flags/en.svg'
    },
    id: {
        name: 'Bahasa Indonesia',
        flag: '/images/flags/id.svg'
    },
    zh: {
        name: '中文',
        flag: '/images/flags/zh.svg'
    }
};

// Import translations
import { translations } from './translations';
window.translations = translations;

// Initialize Alpine
window.Alpine = Alpine;

// Add default data
Alpine.data('navigation', () => ({
    mobileMenuOpen: true,
    languageMenuOpen: false,
    currentLang: 'en',
    languages: window.languages,
    translations: window.translations
}));

Alpine.start();

// Mobile menu and slideshow functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });

    // Slideshow functionality
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slide-dot');
    let currentSlide = 0;
    const slideInterval = 5000;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        slides[index].classList.add('active');
        dots[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    setInterval(nextSlide, slideInterval);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });
});
