export class Slideshow {
    constructor(container) {
        this.container = container;
        this.slides = Array.from(container.querySelectorAll('.hero-slide'));
        this.dots = Array.from(container.querySelectorAll('.slide-dot'));
        this.prevButton = container.querySelector('.slide-prev');
        this.nextButton = container.querySelector('.slide-next');
        this.currentIndex = 0;
        this.isAnimating = false;
        this.autoplayInterval = null;
        this.autoplayDuration = 6000;
        this.touchStartX = 0;
        this.touchEndX = 0;

        this.init();
    }

    init() {
        this.setupEventListeners();
        this.showSlide(0);
        this.startAutoplay();
    }

    setupEventListeners() {
        // Navigation buttons
        this.prevButton?.addEventListener('click', () => this.prev());
        this.nextButton?.addEventListener('click', () => this.next());

        // Dot indicators
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => this.goToSlide(index));
            dot.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.goToSlide(index);
                }
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prev();
            if (e.key === 'ArrowRight') this.next();
        });

        // Touch events
        this.container.addEventListener('touchstart', (e) => {
            this.touchStartX = e.changedTouches[0].screenX;
            this.stopAutoplay();
        }, { passive: true });

        this.container.addEventListener('touchend', (e) => {
            this.touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe();
            this.startAutoplay();
        }, { passive: true });

        // Pause autoplay on hover or focus
        this.container.addEventListener('mouseenter', () => this.stopAutoplay());
        this.container.addEventListener('mouseleave', () => this.startAutoplay());
        this.container.addEventListener('focusin', () => this.stopAutoplay());
        this.container.addEventListener('focusout', () => this.startAutoplay());
    }

    handleSwipe() {
        const swipeDistance = this.touchStartX - this.touchEndX;
        const minSwipeDistance = 50;

        if (Math.abs(swipeDistance) > minSwipeDistance) {
            if (swipeDistance > 0) {
                this.next();
            } else {
                this.prev();
            }
        }
    }

    showSlide(index) {
        if (this.isAnimating) return;
        this.isAnimating = true;

        const previousIndex = this.currentIndex;
        this.currentIndex = index;

        // Update slides
        this.slides.forEach((slide, i) => {
            slide.classList.remove('active', 'prev', 'next');
            if (i === index) {
                slide.classList.add('active');
            } else if (i === previousIndex) {
                slide.classList.add(index > previousIndex ? 'prev' : 'next');
            }
        });

        // Update dots
        this.dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
            dot.setAttribute('aria-current', i === index ? 'true' : 'false');
        });

        // Reset animation lock
        setTimeout(() => {
            this.isAnimating = false;
        }, 700);
    }

    next() {
        const nextIndex = (this.currentIndex + 1) % this.slides.length;
        this.goToSlide(nextIndex);
    }

    prev() {
        const prevIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
        this.goToSlide(prevIndex);
    }

    goToSlide(index) {
        if (index === this.currentIndex || this.isAnimating) return;
        this.showSlide(index);
    }

    startAutoplay() {
        if (this.autoplayInterval) return;
        this.autoplayInterval = setInterval(() => this.next(), this.autoplayDuration);
    }

    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
            this.autoplayInterval = null;
        }
    }
}
