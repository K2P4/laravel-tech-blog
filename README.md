# Laravel Blog Website

[![PHP](https://img.shields.io/badge/PHP-8.1-blue)](https://www.php.net/) 

A **full-featured blog website** built with Laravel that allows users to create, edit, and manage posts. It includes subscriptions, scribe mode, comments, an admin panel, notifications, and user authentication (login and logout).  

---

## Table of Contents

- [Features](#features)  
- [Installation](#installation)  
- [Configuration](#configuration)  
- [Usage](#usage)  
- [License](#license)  

---

## Features

- **User Authentication:** Registration, login, and logout.  
- **Post Management:** Create, edit, and delete blog posts.  
- **Comments:** Users can comment on posts.  
- **Subscriptions:** Users can subscribe to posts or authors to receive notifications.  
- **Scribe Mode:** Optional special mode for writing or editing posts.  
- **Admin Panel:** Manage users, posts, comments, and site settings.  
- **Notifications:** Real-time notifications for comments, subscriptions, and updates.  

---

## Installation

1. **Clone the repository**:


```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
composer install
php artisan key:generate
php artisan serve

```

## Configuration

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_db
DB_USERNAME=root
DB_PASSWORD=
```


## Usage

```bash
- Register a new user or login with an existing account.
- Admin Panel: Access via /admin for managing users, posts, and comments.
- Create & Edit Posts: Use the dashboard to manage content.
- Subscriptions:** Users can subscribe to posts or authors to receive notifications.  
- Comments & Subscriptions: Engage with posts and subscribe for notifications.
- Scribe Mode: Use this mode for enhanced content creation experience.
```

