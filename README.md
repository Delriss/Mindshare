# Mindshare

A collaborative platform built with Laravel to connect and share knowledge within a community. This project leverages Laravel Breeze for authentication and Tailwind CSS for styling, offering a smooth, modern user experience.

## Features

- **User Authentication**: Secure login and registration using Laravel Breeze.
- **Responsive Design**: Styled with Tailwind CSS for a seamless experience across devices.
- **Intuitive Interface**: Built with usability in mind, focusing on simplicity and functionality.

## Technologies Used

- **Laravel**: A robust PHP framework that powers the backend, handling routing, database interactions, and authentication.
- **Laravel Breeze**: A simple authentication starter kit for Laravel, providing a foundation for login, registration, password reset, and more.
- **Tailwind CSS**: A utility-first CSS framework that allows for rapid, responsive design with custom styling.
- **Alpine.js**: A lightweight JavaScript framework that enhances interactivity on the frontend without adding excessive complexity.
- **Plesk**: Used for hosting, providing an easy-to-manage environment for deployment and server configuration.
- **MySQL**: A relational database management system that stores user information, post content, and other dynamic data.
- **Composer**: Dependency management for PHP, enabling the installation and maintenance of Laravel and other PHP packages.
- **Node.js & npm**: Used to manage frontend assets and compile Tailwind CSS, ensuring a smooth build process and modern styling.

## Getting Started

These instructions will guide you through setting up and running Mindshare locally for development and testing purposes.

### Prerequisites

- PHP (>= 8.0)
- Composer
- Node.js & npm
- MySQL or compatible database

### Installation

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/Delriss/Mindshare.git
    cd Mindshare
    ```

2. **Install Dependencies**:

    **Backend**:
    ```bash
    composer install
    ```

    **Frontend**:
    ```bash
    npm install && npm run dev
    ```

3. **Environment Setup**:

    Copy the `.env.example` to create your `.env` file:
    ```bash
    cp .env.example .env
    ```

    Configure your database and other settings in `.env`.

4. **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**:
    ```bash
    php artisan migrate
    ```

### Running the Application

**Development**:
```bash
php artisan serve
```

## Usage

- Register a new user account or log in with existing credentials.
- Explore and engage with the knowledge-sharing features available.

## Contributing

Contributions are welcome! Please open an issue to discuss any feature ideas or bug fixes before submitting a pull request.

## License

This project is licensed under the MIT License.