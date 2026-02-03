## Sistem Informasi Gereja


### Project Setup & Run Guide

This README explains how to set up and run this project locally.

#### Requirements

Make sure you have the following installed on your system:

* PHP >= 8.4
* Composer
* MariaDB / PostgreSQL / SQLite (choose one)
* Node.js >= 18 & NPM (or Yarn / PNPM)
* Git

#### Installation Steps

##### 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-folder>
```

##### 2. Install PHP Dependencies

```bash
composer install
```

##### 3. Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

Update the `.env` file with your database credentials:

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

##### 4. Generate Application Key

```bash
php artisan key:generate
```

##### 5. Run Database Migrations

```bash
php artisan migrate
```

(Optional) Seed the database:

```bash
php artisan db:seed
```

##### 6. Install Frontend Dependencies

```bash
npm install
```

Build frontend assets:

```bash
npm run build
```

For development mode:

```bash
npm run dev
```

##### 7. Run the Application

```bash
php artisan serve
```

The application will be available at:

```
http://127.0.0.1:8000
```
#### License

This project is licensed under the MIT License.
