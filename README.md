# Wonderful Indonesia

A comprehensive web application showcasing Indonesia's rich cultural heritage, including traditional destinations, dances, batik, clothes, houses, weapons, musical instruments, and food. Built with Laravel, Vite, Alpine.js, and Tailwind CSS.

## Features

- **Destinations**: Explore beautiful tourist destinations across Indonesia
- **Traditional Dances**: Learn about various traditional dances from different regions
- **Batik**: Discover the art and patterns of Indonesian batik
- **Traditional Clothes**: Browse traditional clothing from various provinces
- **Traditional Houses**: Explore architectural heritage of Indonesian traditional houses
- **Traditional Weapons**: Learn about historical weapons from different regions
- **Musical Instruments**: Discover traditional musical instruments
- **Traditional Food**: Explore diverse Indonesian culinary heritage

## Tech Stack

- **Backend**: Laravel 11.30
- **Frontend**: 
  - Vite for asset bundling and HMR
  - Alpine.js for reactive UI components
- **Styling**: Tailwind CSS 3.x
- **Database**: MySQL
- **APIs**:
  - Google Gemini AI for content generation
  - LolHuman API for image search

## Prerequisites

- PHP >= 8.1
- Node.js >= 16.x
- Composer
- MySQL

## Installation

1. Clone the repository:
```bash
git clone https://github.com/Adimas-Prakoso/wonderful-indonesia.git
cd wonderful-indonesia
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node.js dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wonderful_indonesia
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run database migrations:
```bash
php artisan migrate
```

8. Build assets:
```bash
npm run build
```

## Development

1. Start the Laravel development server:
```bash
php artisan serve
```

2. Start the Vite development server:
```bash
npm run dev
```

## API Keys

This application uses several external APIs. You'll need to obtain API keys and add them to your `.env` file:

```env
GEMINI_API_KEY=your_gemini_api_key
LOLHUMAN_API_KEY=your_lolhuman_api_key
```

## Project Structure

```
wonderful-indonesia/
├── app/
├── resources/
│   ├── css/
│   │   ├── explores/
│   │   └── info/
│   ├── js/
│   │   ├── explores/
│   │   └── info/
│   └── views/
│       ├── explores/
│       └── info/
├── routes/
├── public/
├── vite.config.js
└── ...
```

## Features in Detail

### Explore Pages
Each explore page uses Alpine.js components for:
- Interactive search functionality
- Dynamic filtering
- Responsive grid layouts
- Smooth transitions and animations

### Info Pages
Each category has detailed information pages that include:
- High-quality images with lightbox functionality
- AI-generated content using Google Gemini
- Dynamic image galleries
- Responsive layouts with Tailwind CSS
- Interactive UI elements with Alpine.js

## Frontend Architecture

The frontend is built using a combination of:
- **Blade Templates**: Laravel's templating engine for server-side rendering
- **Alpine.js**: For reactive data binding and component behavior
- **Tailwind CSS**: For utility-first styling
- **Vite**: For modern asset bundling and development experience

Key features of our frontend setup:
- Hot Module Replacement (HMR) for rapid development
- CSS and JS code splitting
- Optimized asset bundling for production
- Modern ES6+ JavaScript features
- Responsive and interactive UI components

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- [Laravel](https://laravel.com)
- [Alpine.js](https://alpinejs.dev)
- [Tailwind CSS](https://tailwindcss.com)
- [Vite](https://vitejs.dev)
- [Google Gemini AI](https://deepmind.google/technologies/gemini/)
- [LolHuman API](https://api.lolhuman.xyz)

## Contact

Your Name - your.email@example.com

Project Link: [https://github.com/Adimas-Prakoso/wonderful-indonesia](https://github.com/Adimas-Prakoso/wonderful-indonesia)
