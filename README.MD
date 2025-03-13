# Broadcast Messaging App

## Introduction
The **Broadcast Messaging App** is a web-based platform built using **PHP** that allows users to send and receive short messages in real time. Inspired by platforms like Twitter, this application provides a simple interface for broadcasting messages to an audience.

## Features
- **User Authentication**: Register and log in securely.
- **Post Messages**: Users can post text-based messages.
- **View Feeds**: See all recent broadcasts from users.
- **Like & Comment**: Engage with messages by liking and commenting.
- **User Profiles**: Each user has a profile displaying their posts.
- **Responsive Design**: Works across different devices.
- **Future Updates**: Plan to add image uploads for posts.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript (optional for interactivity)
- **Backend**: PHP
- **Database**: MySQL
- **Version Control**: Git & GitHub

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/your-username/broadcast-app.git
   ```
2. Navigate to the project directory:
   ```sh
   cd broadcast-app
   ```
3. Set up a database in MySQL and import the provided `database.sql` file.
4. Configure the database connection in `config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your-username');
   define('DB_PASS', 'your-password');
   define('DB_NAME', 'your-database');
   ```
5. Start a local server:
   ```sh
   php -S localhost:8000
   ```
6. Open `http://localhost:8000` in your browser.

## Usage
- **Sign up** for an account or log in.
- **Post a broadcast** to share your thoughts.
- **Interact** with posts by liking or commenting.

## Contributing
Contributions are welcome! To contribute:
1. Fork the repository.
2. Create a new branch:
   ```sh
   git checkout -b feature-branch
   ```
3. Commit your changes:
   ```sh
   git commit -m "Added new feature"
   ```
4. Push to GitHub and create a Pull Request.

## License
This project is licensed under the **Apache 2.0 License**. See the `LICENSE` file for details.

## Contact
For any issues or suggestions, feel free to contact **your-email@example.com** or create an issue in the repository.

