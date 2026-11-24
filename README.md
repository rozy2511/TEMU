# TEMU — Lost & Found Platform

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-red?style=for-the-badge&logo=laravel" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.3-blue?style=for-the-badge&logo=php" alt="PHP 8.3">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3-38B2AC?style=for-the-badge&logo=tailwindcss" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql" alt="MySQL">
</p>

<p align="center">
  <strong>Find what's lost. Return what's found.</strong>
</p>

---

## About TEMU

**TEMU** is a web-based Lost & Found platform designed to help people report lost and found items, discover potential matches, and reconnect lost belongings with their rightful owners.

TEMU provides a centralized platform where users can submit reports, search for items, and initiate ownership claims through a structured process. By bringing lost and found information together in one platform, TEMU aims to make the process of finding and returning belongings more organized, accessible, and efficient.

## Features

### User Features
- **Lost & Found Reports** — Submit reports for lost or found items.
- **Item Search & Discovery** — Browse and search item reports.
- **Item Matching** — Discover reports of items that may match lost or found belongings.
- **Ownership Claims** — Submit a claim to verify ownership of an item.
- **Claim Management** — Track claim status and manage claim-related interactions.
- **Contact Requests** — Request contact with the person who reported a found item.
- **Handoff Confirmation** — Confirm the return of an item through the platform.

### Admin Features
- **Dashboard** — Overview of platform activity and reports.
- **User Management** — View and manage registered users.
- **Report Management** — Monitor and manage item reports.
- **Report Moderation** — Hide or restore reports when necessary.
- **Claim Management** — Review and monitor ownership claim submissions.

## Website Preview

<!-- Add your website screenshots below -->

### Homepage

<!-- Replace the placeholder with your actual screenshot -->
<!-- ![TEMU Homepage](screenshots/homepage.png) -->

### Item Reports

<!-- ![TEMU Item Reports](screenshots/reports.png) -->

### Claim Process

<!-- ![TEMU Claim Process](screenshots/claims.png) -->

## Tech Stack

| Technology | Description |
|---|---|
| Laravel 11 | Backend web framework |
| PHP 8.3 | Programming language |
| MySQL | Database management system |
| Blade | Template engine |
| Tailwind CSS | Styling framework |
| Alpine.js | Frontend interaction |
| Vite | Frontend build tool |

## Installation

Follow these steps to run TEMU locally.

### 1. Clone the Repository

```bash
git clone https://github.com/rozy2511/TEMU.git
```

```bash
cd TEMU
```

### 2. Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

### 3. Configure Environment

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Configure Database

Create a MySQL database and configure the database credentials in the `.env` file.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=temu
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the database configuration according to your local environment.

### 5. Run Database Migrations

```bash
php artisan migrate
```

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Run the Application

Start the Laravel server:

```bash
php artisan serve
```

Start the frontend development server:

```bash
npm run dev
```

Open the application in your browser at:

```text
http://127.0.0.1:8000
```

## Project Structure

```text
TEMU/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Admin/
│   │       └── User/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   ├── web.php
│   └── auth.php
├── storage/
├── tests/
├── .env.example
├── composer.json
└── package.json
```

## Security & Privacy

TEMU incorporates a structured claim and contact-request process to help protect user interactions.

- Claim submissions are handled through the platform.
- Contact information is not openly displayed during the initial claim process.
- Contact requests require approval before direct communication.
- Users can follow the status of their claim submissions.

## Contributing

Contributions, suggestions, and feedback are welcome to help improve TEMU.

If you would like to contribute:

1. Fork this repository.
2. Create a new branch.
3. Commit your changes.
4. Submit a Pull Request.

## License

This project is developed as a web application project and is built using the Laravel framework.

---

# Laravel Documentation

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the Laravel sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- [Vehikl](https://vehikl.com/)
- [Tighten Co.](https://tighten.co)
- [WebReinvent](https://webreinvent.com/)
- [Kirschbaum Development Group](https://kirschbaumdevelopment.com)
- [64 Robots](https://64robots.com)
- [Curotec](https://www.curotec.com/services/technologies/laravel/)
- [Cyber-Duck](https://cyber-duck.co.uk)
- [DevSquad](https://devsquad.com/hire-laravel-developers)
- [Jump24](https://jump24.co.uk)
- [Redberry](https://redberry.international/laravel/)
- [Active Logic](https://activelogic.com)
- [byte5](https://byte5.de)
- [OP.GG](https://op.gg)

## Contributing to Laravel

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within the Laravel framework, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
