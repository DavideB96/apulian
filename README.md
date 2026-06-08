# 🌊 Apulian — Discover Puglia's Events

A full-stack event management platform built with Laravel, themed around the culture and beauty of Puglia, Italy.

🔗 **Live Demo:** [apulian-production.up.railway.app](https://apulian-production.up.railway.app)

---

## 📸 Preview

> Landing page with video background, event listings, and admin dashboard.

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2 · Laravel 12 |
| Frontend | Blade · Tailwind CSS · Alpine.js |
| Database | MySQL (MariaDB) |
| Image Storage | Cloudinary |
| Authentication | Laravel Breeze |
| Deploy | Railway |
| Version Control | Git · GitHub |

---

## ✨ Features

**Public**
- Browse and search events by title, location or description
- Filter events by category (Music, Sport, Art, Culture, Food, Tech)
- View event details with location, date, available spots and progress bar

**Authenticated Users**
- Register and log in securely
- Subscribe and unsubscribe from events
- Personal dashboard showing registered events

**Admin**
- Full CRUD for events (create, edit, delete)
- Image upload via Cloudinary
- Admin dashboard with statistics (total events, registrations, users)
- Role-based access control via custom middleware

---

## 🏗️ Architecture

- **MVC pattern** with Laravel's Eloquent ORM
- **Role-based authorization** (admin / user) via custom `AdminMiddleware`
- **Many-to-many relationship** between users and events via `registrations` pivot table
- **Server-side search and filtering** with paginated results
- **Cloudinary integration** for persistent image storage in production

---

## 🚀 Local Setup

### Requirements
- PHP 8.2+
- Composer
- Node.js & npm
- MySQL

### Installation

```bash
# Clone the repository
git clone https://github.com/DavideB96/apulian.git
cd apulian

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your .env file (DB credentials, Cloudinary keys)

# Run migrations
php artisan migrate

# Build assets
npm run build

# Start the server
php artisan serve
```

### Create an admin user

```bash
php artisan tinker
App\Models\User::where('email', 'your@email.com')->update(['role' => 'admin']);
```

---

## 👤 Author

**Davide Bianchi**
- GitHub: [@DavideB96](https://github.com/DavideB96)
- Portfolio: [davideb96.github.io/EnPortfolio](https://davideb96.github.io/EnPortfolio)

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).