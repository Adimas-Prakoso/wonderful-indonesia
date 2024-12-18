import './bootstrap';
import { Slideshow } from './slideshow';

// DOM content loaded handler
document.addEventListener('DOMContentLoaded', () => {
    // Initialize slideshow if hero section exists
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        new Slideshow(heroSection);
    }

    // Mobile menu handling
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // Email Subscription Handler
    const subscriptionForm = document.querySelector('#newsletter-form');
    const successPopup = document.querySelector('#success-popup');
    const closePopupBtn = document.querySelector('#close-popup');
    
    // Close popup when clicking the close button
    if (closePopupBtn) {
        closePopupBtn.addEventListener('click', () => {
            successPopup.classList.add('hidden');
        });
    }
    
    // Close popup when clicking outside
    if (successPopup) {
        successPopup.addEventListener('click', (e) => {
            if (e.target === successPopup) {
                successPopup.classList.add('hidden');
            }
        });
    }
    
    if (subscriptionForm) {
        subscriptionForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            
            // Create HTML content for email
            const htmlContent = `
                <div style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; line-height: 1.6;">
                    <div style="text-align: center; padding: 20px 0;">
                        <img src="https://i.ibb.co.com/F7WcM7J/wonderful-indonesia-logo.png" alt="Wonderful Indonesia" style="max-width: 200px; height: auto;">
                    </div>
                    
                    <div style="background: linear-gradient(135deg, #B91C1C 0%, #991B1B 100%); padding: 40px 20px; text-align: center; border-radius: 12px 12px 0 0;">
                        <h1 style="color: white; font-size: 28px; margin: 0;">Welcome to Wonderful Indonesia!</h1>
                        <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-top: 10px;">Your gateway to endless adventures</p>
                    </div>
                    
                    <div style="background-color: #ffffff; padding: 30px; border-radius: 0 0 12px 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <div style="background-color: #f8f8f8; border-radius: 8px; padding: 20px; margin-bottom: 25px;">
                            <h3 style="color: #1F2937; margin-bottom: 15px; font-size: 18px;">Subscription Details</h3>
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 8px 0; color: #4B5563; width: 120px;"><strong>Name:</strong></td>
                                    <td style="padding: 8px 0; color: #111827;">${nameInput.value}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #4B5563;"><strong>Email:</strong></td>
                                    <td style="padding: 8px 0; color: #111827;">${emailInput.value}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; color: #4B5563;"><strong>Date:</strong></td>
                                    <td style="padding: 8px 0; color: #111827;">${new Date().toLocaleDateString('en-US', { 
                                        year: 'numeric', 
                                        month: 'long', 
                                        day: 'numeric' 
                                    })}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <p style="color: #4B5563; font-size: 16px; margin-bottom: 20px;">
                            Thank you for subscribing to our newsletter! Get ready to explore the beauty of Indonesia through:
                        </p>
                        
                        <ul style="color: #4B5563; padding-left: 20px; margin-bottom: 25px;">
                            <li style="margin-bottom: 8px;">✨ Exclusive travel guides and tips</li>
                            <li style="margin-bottom: 8px;">🏖️ Hidden gems and destinations</li>
                            <li style="margin-bottom: 8px;">🎉 Special events and festivals</li>
                            <li style="margin-bottom: 8px;">💫 Limited time offers and promotions</li>
                        </ul>
                        
                        <div style="background: linear-gradient(135deg, #B91C1C 0%, #991B1B 100%); padding: 20px; border-radius: 8px; text-align: center; margin-top: 30px;">
                            <p style="color: white; font-size: 18px; margin: 0;">Stay tuned for amazing content!</p>
                        </div>
                    </div>
                    
                    <div style="text-align: center; padding: 20px; color: #6B7280; font-size: 14px;">
                        <p style="margin-bottom: 10px;">Follow us on social media:</p>
                        <div>
                            <a href="#" style="color: #B91C1C; text-decoration: none; margin: 0 10px;">Instagram</a>
                            <a href="#" style="color: #B91C1C; text-decoration: none; margin: 0 10px;">Facebook</a>
                            <a href="#" style="color: #B91C1C; text-decoration: none; margin: 0 10px;">Twitter</a>
                        </div>
                        <p style="margin-top: 20px; font-size: 12px;">© ${new Date().getFullYear()} Wonderful Indonesia. All rights reserved.</p>
                    </div>
                </div>
            `;
            
            try {
                const submitButton = e.target.querySelector('button[type="submit"]');
                submitButton.disabled = true;
                submitButton.textContent = 'Subscribing...';
                
                const response = await fetch('https://api-beige-six.vercel.app/send-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        to: emailInput.value,
                        subject: 'Welcome to Indonesian Tourism Newsletter',
                        htmlContent: htmlContent
                    })
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    // Show success popup
                    successPopup.classList.remove('hidden');
                    subscriptionForm.reset();
                } else {
                    throw new Error(data.error || 'Failed to subscribe');
                }
            } catch (error) {
                console.error('Subscription error:', error);
                alert('Sorry, there was an error processing your subscription. Please try again later.');
            } finally {
                const submitButton = e.target.querySelector('button[type="submit"]');
                submitButton.disabled = false;
                submitButton.textContent = 'Subscribe Now';
            }
        });
    }
});