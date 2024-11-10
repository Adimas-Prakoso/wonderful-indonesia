import "./bootstrap";
import Alpine from "alpinejs";

// Define languages globally
window.languages = {
    en: {
        name: "English",
        flag: "/images/flags/en.svg",
    },
    id: {
        name: "Bahasa Indonesia",
        flag: "/images/flags/id.svg",
    },
    zh: {
        name: "中文",
        flag: "/images/flags/zh.svg",
    },
};

// Import translations
import { translations } from "./translations";
window.translations = translations;

// Initialize Alpine
window.Alpine = Alpine;

// Add default data
document.addEventListener("alpine:init", () => {
    Alpine.data("navigation", () => ({
        mobileMenuOpen: false,
        languageMenuOpen: false,
        currentLang: "en",
        languages: window.languages,
        translations: window.translations,
    }));
});

// Start Alpine
Alpine.start();

// DOM content loaded handler
document.addEventListener("DOMContentLoaded", () => {
    // Initialize slideshow if hero section exists
    const heroSection = document.querySelector(".hero-section");
    if (heroSection) {
        new Slideshow(heroSection);
    }

    // Mobile menu handling
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        const mobileLinks = mobileMenu.querySelectorAll("a");
        mobileLinks.forEach((link) => {
            link.addEventListener("click", () => {
                mobileMenu.classList.add("hidden");
            });
        });
    }
});
