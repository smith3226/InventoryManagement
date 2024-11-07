# Inventory Management System

A simple inventory management system built with Laravel, allowing users to perform CRUD operations on inventory items.

## Features

- **List Items**: View all inventory items.
- **Add Item**: Add new inventory items.
- **View Item**: View specific item details.
- **Edit Item**: Update existing items.
- **Delete Item**: Remove items from inventory.

## Technologies

- **Backend**: Laravel
- **Database**: MySQL
- **Frontend**: Blade templates

## Setup

### Prerequisites
- PHP >= 8.0, Composer, MySQL (or Docker for containerized setup)

### Installation

1. Clone the repository:
git clone https://github.com/smith3226/InventoryManagement

cd inventory-management
   
2.Install dependencies:

composer install

3.Configure .env:

Copy .env.example to .env and set database details.

4.Run migrations:

php artisan migrate

5.Start the application:

php artisan serve

6.Run with Docker:

docker-compose up -d
