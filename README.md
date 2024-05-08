# Laravel Subscription Platform

## Project Overview
This Laravel Subscription Platform allows users to subscribe to multiple websites. Whenever a new post is published on a subscribed website, all its subscribers receive an email notification with the post's title and description.

## Getting Started

### Prerequisites
- PHP 7.4 or higher
- Composer
- MySQL or any other database supported by Laravel
- A mail service for sending emails (SMTP credentials)

### Installation

1. **Clone the repository:**
   ```
   git clone https://github.com/Iranks20/laravel-subscription-platform.git
   cd subscription-platform
   ```

2. **Install dependencies:**
   ```
   composer install
   ```

3. **Set up environment variables:**
   - Copy `.env.example` to `.env`:
     ```
     cp .env.example .env
     ```
   - Edit `.env` to set your database and mail settings.

4. **Generate application key:**
   ```
   php artisan key:generate
   ```

5. **Run migrations:**
   ```
   php artisan migrate
   ```

6. **Seed the database (Optional):**
   ```
   php artisan db:seed
   ```

### Configuration for Mail
Update the `.env` file with your mail service provider’s details. Here's an example using SMTP:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Note:** Emails might land in the spam folder, so please check the spam folder if emails are not appearing in the inbox.

### Running the Application

Start the local development server:
```
php artisan serve
```
This will serve the application on http://localhost:8000.

### Testing

#### API Endpoints
You can test the following functionalities:

- **Create a User:**
  ```
  POST /api/users
  ```
  Payload:
  ```json
  {
      "name": "Jane Doe",
      "email": "jane@example.com",
      "password": "securepassword"
  }
  ```

- **Create a Website:**
  ```
  POST /api/websites
  ```
  Payload:
  ```json
  {
      "name": "Example Website",
      "url": "https://example.com"
  }
  ```

- **Subscribe to a Website:**
  ```
  POST /api/websites/{websiteId}/subscribe
  ```
  Payload:
  ```json
  {
      "user_id": "1"
  }
  ```

- **Create a Post for a Website:**
  ```
  POST /api/websites/{websiteId}/posts
  ```
  Payload:
  ```json
  {
      "title": "New Post Title",
      "description": "Description of the new post."
  }
  ```

### Command to Send Emails
Run the command to trigger sending emails for new posts:
```
php artisan email:send
```
Make sure to have your queue worker running if using asynchronous email sending:
```
php artisan queue:work
```
