# VANILLA PHP MVC Blog System
A lightweight, pure PHP MVC blog system for building structured, secure, and scalable web applications **without external frameworks.**

---

## 🚀 Get Started

1. Clone the repository: `git clone https://github.com/NatanR-dev/vanilla-php-mvc`.
2. Copy `.env.example` to `.env` and update your database credentials.
3. Launch the environment: `docker-compose up -d`.
4. Visit `http://localhost:8080` to access the app.
5. Manage the database via PHPMyAdmin at `http://localhost:3006` (set in `.env`).
---

## 📚 Requirements

- **PHP**: 8.2 or higher.
- **MySQL**: 5.7 or higher.
- **Apache**: With `mod_rewrite` enabled.
- **Docker**: Docker and Docker Compose (optional, for development).

---

## 🗄 Database Setup 

The project's database was *developed to bootstrap a blog system in the easiest and fastest way possible.* You'll need to follow this database structure to test it, but **feel free to adapt and expand** it as needed—this project was designed specifically for such use cases.

#### Users Table
The `users` table requires these fields:

- `id`: INT (Primary Key, Auto Increment)
- `full_name`: VARCHAR(100)
- `username`: VARCHAR(50) (Unique)
- `email`: VARCHAR(100) (Unique)
- `password`: VARCHAR(255)
- `avatar`: VARCHAR(255)
- `birthday`: DATE
- `role`: ENUM('admin', 'editor', 'author')
- `created_at`: DATETIME
- `updated_at`: DATETIME

### Posts Table
Set up a `posts` table with these fields:

- `id`: INT (Primary Key, Auto Increment)
- `title`: VARCHAR(255)
- `description`: TEXT
- `content`: TEXT
- `slug`: VARCHAR(255) (Unique)
- `author`: VARCHAR(50) (Foreign Key referencing `users(username)`)
- `images`: JSON
- `created_at`: TIMESTAMP
- `updated_at`: TIMESTAMP

---

*Hands on!*

OR
## 📖 Overview

The **Vanilla PHP MVC Blog System** is a minimal yet powerful blog platform built from the ground up using pure PHP, following the MVC (Model-View-Controller) pattern. It's designed for developers who want a clean, dependency-free foundation to learn, extend, or deploy real-world applications. This project not only showcases professional-grade PHP development practices but also serves as a valuable resource for the community, making it an excellent addition to your portfolio for technical interviews and recruitment opportunities.

### 🎯 Why Use This?

- Master MVC architecture in pure PHP.
- Understand routing, controllers, and views without framework magic.
- Build secure, scalable apps with full control.
- Showcase your skills in portfolios or interviews.

---

## 🛠 Core Features

### MVC Architecture

- **Model**: Manages data and logic with PDO-based MySQL integration.
- **View**: Renders templates with reusable components and layouts.
- **Controller**: Handles requests and ties everything together.

### Routing

- Custom-built router with:
  - Dynamic parameters (e.g., `/posts/{id}`, `/posts/{slug}`).
  - Controller-method mapping (`Controller@method`).
  - Public routes: `/`, `/posts`, `/posts/{slug}`, `/login`.
  - Private routes: `/admin/dashboard`, `/admin/users` (admin-only), `/admin/posts` (authenticated).
  - 404 handling and URL normalization.
  

All routes organized by | Path | Method | Desc:

| **Route**                  | **Controller@Method**         | **Description**                     |
|----------------------------|-------------------------------|-------------------------------------|
| `/`                        | `HomeController@index`        | Displays the homepage              |
| **Public Post Routes**     |                               |                                     |
| `/posts`                   | `PostController@index`        | Lists all posts                    |
| `/posts/{id}`              | `PostController@showById`     | Shows a post by ID                 |
| `/posts/{slug}`            | `PostController@showBySlug`   | Shows a post by slug               |
| **Admin User Routes**      |                               |                                     |
| `/admin/users`             | `UserController@index`        | Lists all users (admin only)       |
| `/admin/users/{id}`        | `UserController@show`         | Shows a user by ID (admin only)    |
| `/admin/users/create`      | `UserController@create`       | Form to create a user (admin only) |
| `/admin/users/store`       | `UserController@store`        | Saves a new user (admin only)      |
| `/admin/users/edit/{id}`   | `UserController@edit`         | Form to edit a user (admin only)   |
| `/admin/users/update/{id}` | `UserController@update`       | Updates a user (admin only)        |
| `/admin/users/delete/{id}` | `UserController@delete`       | Deletes a user (admin only)        |
| **Settings Routes**        |                               |                                     |
| `/admin/settings/user`      | `SettingsController@index`    | Displays user settings              |
| `/admin/settings/user/edit/{id}` | `SettingsController@edit` | Form to edit user settings          |
| `/admin/settings/user/update/{id}`| `SettingsController@update` | Updates user settings               |
| **Admin Post Routes**      |                               |                                     |
| `/admin/posts`             | `PostController@index`        | Lists all posts (authenticated)    |
| `/admin/posts/create`      | `PostController@create`       | Form to create a post              |
| `/admin/posts/store`       | `PostController@store`        | Saves a new post                   |
| `/admin/posts/edit/{id}`   | `PostController@edit`         | Form to edit a post                |
| `/admin/posts/update/{id}` | `PostController@update`       | Updates a post                     |
| `/admin/posts/delete/{id}` | `PostController@delete`       | Deletes a post                     |
| `/admin/posts/{id}`        | `PostController@showById`     | Shows a post by ID                 |
| **Authentication Routes**  |                               |                                     |
| `/login`                   | `AuthController@login`        | Displays login form                |
| `/auth/authenticate`       | `AuthController@authenticate` | Processes login                    |
| `/auth/logout`             | `AuthController@logout`       | Logs out the user                  |
| **Admin Dashboard**        |                               |                                     |
| `/admin/dashboard`         | `DashboardController@index`   | Admin dashboard (authenticated)    |

### Controller System

- Base controller with common functionality.
- Specialized controllers for specific features.
- Dynamic method calling based on route parameters.
- Error handling and 404 management.

### Security

- PDO prepared statements to prevent SQL injection.
- HTML escaping for XSS protection.
- Input sanitization and validation.
- Role-based access control (RBAC).

### Database

- PDO abstraction for MySQL.
- Configurable via `.env`.
- Extensible models for CRUD operations.

### Views

- Component-based templates.
- Dynamic data injection.
- Support for layouts and partials.

### Post Management

- Full CRUD for blog posts.
- Metadata support (e.g., date, author).
- SEO-friendly slugs.
- Image handling.

### User Management

- Login and registration.
- Role-based permissions.
- Admin-only user management.

### 🐳 Docker Integration

- Pre-configured environment:
  - PHP 8.2 + Apache.
  - MySQL 5.7.
  - PHPMyAdmin.
- Isolated network setup.

---

## 🔧 Technical Details

### Router
- Regex-based route parsing.
- Parameter extraction (IDs, slugs).
- Automatic controller invocation.

### Controllers
- Base class with shared utilities.
- Error handling built-in.

### Models
- Centralized `Database` class.
- Entity-specific CRUD methods.

### Views
- Secure rendering with HTML escaping.
- Template inclusion system.

---

## 🌟 Highlights

- Pure PHP implementation without external dependencies.
- Full CRUD for blogs/stores.
- Modern PHP 8.2 features.
- Docker-based development environment.
- MVC pattern with strong Separation of Concerns (SoC).
- Secure by default with proper input/output handling.
- Extensible and maintainable codebase.
- SEO-friendly URL structure.
- Component-based view system for reusability.

_This project demonstrates professional-grade PHP development practices without relying on frameworks, making it an excellent showcase for technical interviews and portfolio presentations._

---

## 🔐 Security Practices

- Inputs validated and sanitized.
- Outputs escaped to block XSS.
- Sensitive data in `.env`.
- Protection against common threats (CSRF, SQL injection).

---

## 🎯 Use Cases

- Learning MVC and PHP internals.
- Building blogs, e-commerce, or custom apps.
- Portfolio projects for technical interviews.

---

## ⭐ Get Involved

If you find this project useful, please give it a star on GitHub, fork it to experiment with your own ideas, or contribute by submitting pull requests. Your support helps grow this resource for the community!