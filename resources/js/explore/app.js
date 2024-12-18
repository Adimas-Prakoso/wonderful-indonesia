import "./bootstrap";

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
