This repository contains a modular PHP project with several functionalities, including CRUD operations, a shopping cart system, REST API handling, and user authentication using sessions and password hashing.

Folder Structure
crud/
Implements basic CRUD operations (Create, Read, Update, Delete)

Uses PDO for secure database interaction

APP_CARD/
A simple "Add to Cart" system using PHP sessions

Displays products and allows checkout

Includes cart display and item total functionality

api/
A lightweight REST API

Supports Read, Update, Delete, and View operations via HTTP methods

login/
Provides a user login and registration form

Uses password_hash() for storing passwords securely

Uses password_verify() for login validation

PHP sessions manage user authentication state

How to Run
git clone https://github.com/HassanShafiq97/php.git
Place the project inside your htdocs folder (for XAMPP) or your server root.

Import the required database files (if provided) in phpMyAdmin.

Start Apache and MySQL using your local server manager.

Open your browser:http://localhost/php/
PHP 7.x or later

MySQL or MariaDB

Apache/Nginx

XAMPP, WAMP, or any LAMP stack

Notes
database file provided in folder and see the database name from code if not provided
