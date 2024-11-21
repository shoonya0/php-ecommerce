# E-commerce

This repository contains the backend implementation for E-commerce, built with Laravel and Livewire. The application provides various functionalities including user management, order management, product management, and more.

## Project Structure

```plaintext
├───app/
│   ├───Http/
│   │   ├───Controllers/
│   │   │   ├───Auth/
│   │   │   │       VerifyEmailController.php
│   │   │   └───Controller.php
│   │   └───Middleware/
│   │           AdminMiddleware.php
│   │
│   ├───Livewire/
│   │   ├───Actions/
│   │   │       Logout.php
│   │   ├───Forms/
│   │   │       LoginForm.php
│   │   ├───AboutUs.php
│   │   ├───AddCategory.php
│   │   ├───AddProductForm.php
│   │   ├───AdminDashboard.php
│   │   ├───AdminLayout.php
│   │   ├───AllProducts.php
│   │   ├───BreadCrumb.php
│   │   ├───Contacts.php
│   │   ├───EditCategory.php
│   │   ├───EditProduct.php
│   │   ├───Footer.php
│   │   ├───Header.php
│   │   ├───HeroSection.php
│   │   ├───ItemCard.php
│   │   ├───ManageCategories.php
│   │   ├───ManageOrders.php
│   │   ├───ManageProduct.php
│   │   ├───ProductDetails.php
│   │   ├───ProductListing.php
│   │   ├───ProductSection.php
│   │   ├───ProductTable.php
│   │   ├───ShoppingCartComponent.php
│   │   └───ShoppingCartIcon.php
│   │
│   ├───Models/
│   │       Activity.php
│   │       Category.php
│   │       Order.php
│   │       Product.php
│   │       ShoppingCart.php
│   │       User.php
│   │
│   ├───Providers/
│   │       AppServiceProvider.php
│   │       VoltServiceProvider.php
│   │
│   └───View/
│       └───Components/
│               AppLayout.php
│               GuestLayout.php
│
├───database/
│   ├───factories/
│   │       UserFactory.php
│   │
│   ├───migrations/
│   │       0001_01_01_000000_create_users_table.php
│   │       0001_01_01_000001_create_cache_table.php
│   │       0001_01_01_000002_create_jobs_table.php
│   │       2024_04_24_000001_add_user_social_provider_table.php
│   │       2024_04_24_000002_update_passwords_field_to_be_nullable.php
│   │       2024_05_07_000003_add_two_factor_auth_columns.php
│   │       2024_11_12_171740_add_role_column_to_users_table.php
│   │       2024_11_12_172510_create_categories_table.php
│   │       2024_11_12_181051_create_products_table.php
│   │       2024_11_21_143128_create_shopping_carts_table.php
│   │       2024_11_21_182142_add_last_active_at_to_users_table.php
│   │       2024_11_21_182412_create_activities_table.php
│   │       2024_11_21_184532_create_orders_table.php
│   │
│   └───seeders/
│           DatabaseSeeder.php
│           OrderSeeder.php
│
├───resources/
│   ├───css/
│   │       app.css
│   │
│   ├───js/
│   │       app.js
│   │       bootstrap.js
│   │
│   └───views/
│       │   admin-layout.blade.php
│       │   dashboard.blade.php
│       │   profile.blade.php
│       │   welcome.blade.php
│       │
│       ├───components/
│       │       action-message.blade.php
│       │       application-logo.blade.php
│       │       auth-session-status.blade.php
│       │       danger-button.blade.php
│       │       dropdown-link.blade.php
│       │       dropdown.blade.php
│       │       input-error.blade.php
│       │       input-label.blade.php
│       │       modal.blade.php
│       │       nav-link.blade.php
│       │       primary-button.blade.php
│       │       responsive-nav-link.blade.php
│       │       secondary-button.blade.php
│       │       text-input.blade.php
│       │
│       ├───errors/
│       │       404.blade.php
│       │
│       ├───layouts/
│       │       app.blade.php
│       │       guest.blade.php
│       │
│       └───livewire/
│           │   about-us.blade.php
│           │   add-category.blade.php
│           │   add-product-form.blade.php
│           │   admin-dashboard.blade.php
│           │   all-products.blade.php
│           │   bread-crumb.blade.php
│           │   contacts.blade.php
│           │   edit-category.blade.php
│           │   edit-product.blade.php
│           │   footer.blade.php
│           │   header.blade.php
│           │   hero-section.blade.php
│           │   item-card.blade.php
│           │   logout.blade.php
│           │   manage-categories.blade.php
│           │   manage-orders.blade.php
│           │   manage-product.blade.php
│           │   product-details.blade.php
│           │   product-listing.blade.php
│           │   product-section.blade.php
│           │   product-table.blade.php
│           │   shopping-cart-component.blade.php
│           │   shopping-cart-icon.blade.php
│           │
│           ├───layout/
│           │       navigation.blade.php
│           │
│           ├───pages/
│           │   └───auth/
│           │           confirm-password.blade.php
│           │           forgot-password.blade.php
│           │           login.blade.php
│           │           register.blade.php
│           │           reset-password.blade.php
│           │           verify-email.blade.php
│           │
│           ├───profile/
│           │       delete-user-form.blade.php
│           │       update-password-form.blade.php
│           │       update-profile-information-form.blade.php
│           │
│           ├───skeleton/
│           │       item-skeleton.blade.php
│           │
│           └───welcome/
│                   navigation.blade.php
│
├───routes/
│       auth.php
│       console.php
│       web.php
│
├───storage/
│   ├───app/
│   │   └───private/
│   │       └───livewire-tmp/
│   │           └───photos/
│   │
│   └───public/
│
├───.gitignore
├───database.sqlite
├───artisan
├───composer.json
└───README.md
```

## Prerequisites

-   PHP 8.1 or higher
-   Composer
-   Node.js
-   npm
-   Laravel CLI

## Getting Started

1. Clone the repository
2. Run `composer install`
3. Run `npm install`
4. Run `npm run dev`
5. Run `php artisan migrate`
6. Run `php artisan db:seed`
7. Run `php artisan serve`

## Setup Environment Variables

### The path to environment configuration file and adjust the settings as needed:

1. Copy the `.env.example` file to `.env`
2. Update the variables with your own values

### Update the environment variables in config.dev.env to match your local setup.

## Install Dependencies

1. Run `composer install`
2. Run `npm install`

## Database Migration

1. Run `php artisan migrate`
2. Run `php artisan db:seed`

## Run the application

1. Run `php artisan serve`

## API Reference

### Authentication

### API Reference

| Route                        | Parameter   | Type   | Description                                  |
| ---------------------------- | ----------- | ------ | -------------------------------------------- |
| /sales/customer/{id}         | id          | uint   | Required. Id of customer to fetch            |
| /sales/customers/email       | email       | string | Required. Email of customer to fetch         |
| /sales/customers             | ---         | ---    | ---                                          |
| /sales/billing/{id}          | id          | uint   | Required. ID of the billing to fetch         |
| /sales/billings/customer_id  | customer_id | uint   | Required. Customer ID to fetch billings      |
| /sales/billings              | ---         | ---    | ---                                          |
| /product/{product_id}/detail | product_id  | uint   | Required. ID of the product to fetch details |
| /shopping-cart               | ---         | ---    | ---                                          |
| /all-products                | ---         | ---    | ---                                          |
| /about-us                    | ---         | ---    | ---                                          |
| /contact-us                  | ---         | ---    | ---                                          |
| /admin/dashboard             | ---         | ---    | Admin dashboard view                         |
| /products                    | ---         | ---    | Manage products view                         |
| /orders                      | ---         | ---    | Manage orders view                           |
| /add/product                 | ---         | ---    | Add product form view                        |
| /manage/categories           | ---         | ---    | Manage categories view                       |
| /add/category                | ---         | ---    | Add category form view                       |
| /edit/{id}/product           | id          | uint   | Edit product view                            |
| /edit/{id}/category          | id          | uint   | Edit category view                           |
| /order                       | ---         | ---    | Add order view                               |

## Features

-   Admin Dashboard
-   Manage Products
-   Manage Categories
-   Manage Orders
-   Add Product
-   Add Category
-   Edit Product
-   Edit Category

## Diagrams

MVC Architecture:

Project Structure:

## Contact Us:

For further information, you can contact the project maintainers.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
