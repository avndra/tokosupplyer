<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## How to Use

First, make sure you have seeded the database to create the default users. If you haven't, run:

```bash
php artisan migrate:fresh --seed
```

### Default Users

The seeder creates the following users. The password for all of them is `password`.

- **Admin**: `admin@example.com`
- **User 1**: `john@example.com`
- **User 2**: `jane@example.com`

---

### Website

1.  **Navigate to the Welcome Page**: Open your project in the browser. You should see a welcome page with "Login" and "Register" links.
2.  **Login as Admin**:
    -   Click "Login".
    -   Use the credentials: `admin@example.com` / `password`.
    -   You will be redirected to the `/dashboard`.
    -   From the dashboard, you can navigate to `/suppliers`. You will see "Add", "Edit", and "Delete" controls.
3.  **Login as User**:
    -   Log out, then click "Login" again.
    -   Use the credentials: `john@example.com` / `password`.
    -   You will be redirected to `/toko-check` (since this user doesn't have a store yet) or `/products`.
    -   Navigate to `/suppliers`. You will be able to see the list of suppliers, but the "Add", "Edit", and "Delete" controls will not be visible.

---

### API (Using Postman)

#### 1. Get Authentication Token

To interact with the protected API routes, you first need to get an authentication token.

-   **Method**: `POST`
-   **URL**: `http://<your-app-url>/api/login`
-   **Body** (form-data or x-www-form-urlencoded):
    -   `email`: `admin@example.com` (or a user email)
    -   `password`: `password`

The response will contain a `token` which you should copy.

#### 2. Access Protected Routes

Now you can use this token to access protected endpoints by adding it as a Bearer Token in the Authorization header.

-   **Method**: `GET`
-   **URL**: `http://<your-app-url>/api/me`
-   **Headers**:
    -   `Accept`: `application/json`
    -   `Authorization`: `Bearer <your-copied-token>`

This will return the details of the currently authenticated user.

#### 3. Test Role-Based Routes

You can easily test the admin-only routes by getting a token for an admin and a regular user and trying to access the same endpoint.

**Example: Creating a Supplier**

1.  **Get an admin token** using `admin@example.com`.
2.  Make a `POST` request to `http://<your-app-url>/api/suppliers` with the admin's bearer token and valid supplier data.
    -   **Result**: You should receive a `201 Created` response.
3.  **Get a user token** using `john@example.com`.
4.  Make the same `POST` request to `http://<your-app-url>/api/suppliers` with the user's bearer token.
    -   **Result**: You should receive a `403 Forbidden` response, as only admins can create suppliers.

**Example: Listing Suppliers**

1.  Make a `GET` request to `http://<your-app-url>/api/suppliers` using either the admin's or the user's token.
    -   **Result**: In both cases, you should receive a `200 OK` response with the list of suppliers, as all authenticated users are allowed to view them.
