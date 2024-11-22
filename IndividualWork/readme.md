# Blog Project

This is a simple blog application built with PHP and MySQL.
It allows users to register, log in, create posts, update posts, delete posts, and view individual posts.
The project uses a dark theme and includes authentication and authorization features.

## Features

- User registration and login
- CRUD functionality for posts (Create, Read, Update, Delete)
- User authorization (only logged-in users can create, update, or delete posts)
- Simple dark theme UI
- Responsive design for mobile devices

## Technologies Used

- PHP
- MySQL
- HTML/CSS
- JavaScript (optional for additional functionality)
- Sessions for user authentication

## Setup

Follow these steps to set up the project on your local machine.

### 1. Clone the repository

Clone this repository to your local machine.

```bash
git clone https://github.com/your-username/blog-project.git
```

### 2. Set up the database

Create a new MySQL database named `fdaw_ind` (or any other name you prefer). You can use **phpMyAdmin** or a MySQL command-line tool.

Run the following SQL commands to create the necessary tables:

```sql
CREATE DATABASE fdaw_ind;

USE fdaw_ind;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

### 3. Configure the database connection

In the `config/db.php` file, update the following variables to match your local database configuration:

```php
$host = 'localhost'; // your database host
$username = 'root'; // your database username
$password = 'root'; // your database password
$dbname = 'fdaw_ind'; // your database name
```

### 4. Start the PHP server

Ensure that your PHP environment (like **MAMP**, **XAMPP**, or **WAMP**) is running. If you're using **MAMP**, make sure to start both the **Apache** and **MySQL** services.

Navigate to the project directory and start the PHP built-in server:

```bash
php -S localhost:8000
```

This will start the PHP server at `http://localhost:8000`.

### 5. Access the application

Open your web browser and go to:

```
http://localhost:8000/public/index.php
```

### 6. Register and Log in

- Go to the **Register** page to create a new user.
- After registering, you'll be redirected to the **Login** page, where you can log in with the credentials you just created.
- Once logged in, you can create, update, delete, and view posts.

## Project Structure

Here is a brief overview of the project structure:

```
/FDAW_Ind
├── /config
│   └── db.php               # Database connection
├── /src
│   ├── /controllers
│   │   └── PostController.php  # Controller for handling posts
│   │   └── AuthController.php  # Controller for handling authentication
│   ├── /models
│   │   └── Post.php            # Model for handling posts
│   │   └── User.php            # Model for handling users
├── /public
│   ├── create_post.php        # Page for creating a new post
│   ├── index.php              # Main page displaying all posts
│   ├── login.php              # Page for logging in
│   ├── register.php           # Page for user registration
│   ├── read_post.php          # Page for viewing a single post
│   ├── update_post.php        # Page for editing a post
│   ├── delete_post.php        # Page for deleting a post
│   ├── logout.php             # Page for logging out
│   └── assets
│       ├── /css
│       │   └── style.css       # Stylesheet for the app
│       └── /js                # JavaScript files (optional)
└── /sql
    └── create_tables.sql      # SQL script to create necessary tables
```

### 7. **Customizations**

Feel free to customize the theme, database, or functionality as needed. This application is a basic implementation of a blog with user authentication.

## Contributing

If you'd like to contribute to this project, feel free to open a pull request or submit an issue. Make sure to follow the coding style and document any changes you make.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
