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

### Web Interface (Browser)

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

### API Testing (Postman Beginner's Guide)

This guide will walk you through testing all API endpoints using Postman.

#### A. Initial Setup (First Time Only)

1.  **Create an Environment**: In Postman, go to the "Environments" tab and click `+`. Name it "MiniStore Dev". Add a variable named `baseUrl` and set its value to your local development URL (e.g., `http://ministore.test`).

2.  **Create a Collection**: Go to the "Collections" tab and click `+`. Name it "MiniStore API". All your requests will be saved here.

3.  **Select Environment**: In the top-right corner of Postman, make sure your "MiniStore Dev" environment is selected.

#### B. Authentication

First, we need to log in to get authentication tokens.

**1. Login as Admin**
-   Create a new request in your collection named "Login Admin".
-   **Method**: `POST`
-   **URL**: `{{baseUrl}}/api/login`
-   **Body** tab -> select `form`:
    -   `email`: `admin@example.com`
    -   `password`: `password`
-   **Tests** tab: Add the following script. This will automatically save the token to your environment variables!
    ```javascript
    var jsonData = pm.response.json();
    pm.environment.set("admin_token", jsonData.token);
    ```
-   Click **Send**. You should get a `200 OK` response with a token. The token is now saved as `{{admin_token}}`.

**2. Login as User**
-   Duplicate the "Login Admin" request and rename it "Login User".
-   Change the `email` in the Body to `john@example.com`.
-   In the **Tests** tab, change the script to save a different variable:
    ```javascript
    var jsonData = pm.response.json();
    pm.environment.set("user_token", jsonData.token);
    ```
-   Click **Send**. This will save the user's token as `{{user_token}}`.

**3. Get Current User (`/me`)**
-   Create a new request named "Get Me".
-   **Method**: `GET`
-   **URL**: `{{baseUrl}}/api/me`
-   **Authorization** tab:
    -   Type: `Bearer Token`
    -   Token: `{{token}}`
-   Click **Send**. It should return the user's details.

**4. Logout**
-   Create a new request named "Logout".
-   **Method**: `POST`
-   **URL**: `{{baseUrl}}/api/logout`
-   **Authorization** tab:
    -   Type: `Bearer Token`
    -   Token: `{{token}}`
-   Click **Send**. You will get a "Logged out" message. The token `{{admin_token}}` is now invalid. If you try to use it again on the "Get Me" request, you will get an "Unauthenticated" error.

#### C. Testing API Resources

Here is the pattern for testing a typical resource like **Products**. You can apply the same pattern for **Orders** and **Tokos**.

**1. List Products**
-   **Method**: `GET`
-   **URL**: `{{baseUrl}}/api/products`
-   **Authorization**: Bearer Token `{{token}}`

**2. Create a Product**
-   **Method**: `POST`
-   **URL**: `{{baseUrl}}/api/products`
-   **Authorization**: Bearer Token `{{token}}`
-   **Body** tab -> select `raw` and `JSON`:
    ```json
    {
        "name": "New API Product",
        "description": "A product created from the API",
        "price": 19.99,
        "stock": 100,
        "toko_id": 1,
        "supplier_id": 1
    }
    ```
> **Note**: After creating a product, note its `id` from the response for the next steps.

**3. Get a Single Product**
-   **Method**: `GET`
-   **URL**: `{{baseUrl}}/api/products/1` (Replace `1` with the ID of the product you created).
-   **Authorization**: Bearer Token `{{token}}`

**4. Update a Product**
-   **Method**: `PUT`
-   **URL**: `{{baseUrl}}/api/products/1` (Use the ID from above)
-   **Authorization**: Bearer Token `{{token}}`
-   **Body** tab -> select `raw` and `JSON`:
    ```json
    {
        "name": "Updated API Product",
        "price": 25.50
    }
    ```

**5. Delete a Product**
-   **Method**: `DELETE`
-   **URL**: `{{baseUrl}}/api/products/1` (Use the ID from above)
-   **Authorization**: Bearer Token `{{admin/user_token}}`

#### D. Testing Role-Based Permissions (Suppliers)

This shows how to verify that only admins can modify suppliers.

**1. Test with a User Token**
-   Create a request "Create Supplier (as User)".
-   **Method**: `POST`
-   **URL**: `{{baseUrl}}/api/suppliers`
-   **Authorization**: Bearer Token `{{user_token}}`
-   **Body** (raw/JSON): `{ "name": "Test Supplier", "email": "supplier@test.com" }`
-   Click **Send**. You should receive a **`403 Forbidden`** error, because regular users cannot create suppliers.

**2. Test with an Admin Token**
-   Duplicate the request above and name it "Create Supplier (as Admin)".
-   Change the **Authorization** token to `{{admin_token}}`.
-   Click **Send**. You should receive a **`201 Created`** response. This confirms your security is working!

**3. Listing Suppliers (as any user)**
-   Create a request "List Suppliers".
-   **Method**: `GET`
-   **URL**: `{{baseUrl}}/api/suppliers`
-   **Authorization**: Bearer Token `{{user_token}}` (or `{{admin_token}}`)
-   Click **Send**. This should succeed with a **`200 OK`** for either user.
