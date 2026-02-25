# 🛒 Laravel E-Commerce Project
📌 Overview

This is a back-end E-Commerce Web Application built using Laravel.
The project includes user authentication, product management, admin dashboard, cart functionality, reviews system, and database relationships.

The goal of this project was to practice real-world Laravel development including migrations, factories, seeders, authentication, and CRUD operations.

# 🚀 Features
👤 Authentication System

User registration & login

Role-based access (Admin / User)

Profile management

Fake Payment

# 🛍 Product Management

- Create, edit, delete products (Admin)

- Product categories

- Product image display

- Single product view page

# 🛒 Cart System

- Add products to cart

- View cart items

- Remove items from cart

# ⭐ Reviews System

- Users can leave product reviews

- Linked to both user and product

# 📊 Admin Dashboard

- Manage users

- Manage products

- Manage reviews

- View contact messages

# 🗄 Database

- Proper foreign key relationships

- Migrations for all tables

- Factories & seeders for testing data

# 🛠 Tech Stack

- Backend: Laravel

- Frontend: Blade, Bootstrap

- Database: MySQL

- Authentication: Laravel Auth

- Version Control: Git & GitHub

# 💳 Payment Integration (Stripe - Test Mode)

This project integrates Stripe payment gateway using Stripe Checkout (Test Mode).

Features:
- Secure Stripe Checkout session
- Payment success & cancel handling
- Test card support for development
- API keys stored securely in .env
- Order confirmation after successful payment

Test Card Example:
- Card Number: 4242 4242 4242 4242
- Expiry: Any future date  
- CVC: Any 3 digits

# ⚙ Installation Guide

Clone the repository:

git clone [https://github.com/ahmad-suliman/eCommerce-laravel-project.git]
- cd eCommerce-laravel-project

- Install dependencies:

- composer install

- Copy environment file:

- cp .env.example .env

- Generate application key:

- php artisan key:generate

- Set your database credentials in .env

- Run migrations and seeders:

- php artisan migrate --seed

- Start the server:

- php artisan serve

Visit:
    [http://127.0.0.1:8000]

# 🔑 Test Accounts
    All seeded users have the default password:
    password

You can check seeded emails inside the database.

# 👨‍💻 Author

  Ahmad Suliman

GitHub:
[https://github.com/ahmad-suliman]
