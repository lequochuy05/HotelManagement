# 🏨 Onix Hotel Management System

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)

A professional, feature-rich Hotel Management System designed to streamline room bookings, facility management, and guest interactions. Built with a focus on responsiveness and administrative control.

---

## ✨ Key Features

- **🌐 Responsive Frontend**: Seamless experience across desktops, tablets, and mobile devices.
- **📅 Smart Booking System**: Check availability with real-time date and guest count filtering.
- **🛡️ Advanced Admin Panel**:
  - Manage rooms, features, and facilities.
  - Track new, confirmed, and cancelled bookings.
  - View user queries and reviews.
  - Generate PDF invoices/records.
- **⭐ Guest Reviews**: Transparent rating and review system for transparency.
- **🔒 Secure Authentication**: Robust login for both users and administrators.
- **📧 Email Notifications**: Integrated with SendGrid for account recovery and confirmations.

---

## 🛠️ Project Structure

```text
HotelManagement/
├── Admin/              # Admin Panel core files (Login, Dashboard, Management)
│   ├── ajax/           # Admin-side AJAX handlers
│   ├── css/            # Admin styling
│   ├── inc/            # Core includes (dbconfig, essentials, header)
│   └── scripts/        # Admin-side JS logic
├── Css/                # Main application styling (Bootstrap & custom)
├── ajax/               # User-side AJAX handlers
├── images/             # Media assets (Rooms, Facilities, Profile)
├── inc/                # User-side includes (Header, Footer, Links)
├── hotelbooking.sql    # Database schema and sample data
└── index.php           # Main landing page
```

---

## 🚀 Installation & Setup

### 📦 Prerequisites
- **Web Server**: Apache or Nginx.
- **PHP**: Version 8.0 or higher.
- **Database**: MySQL or MariaDB.

---

### 💻 Windows Setup (XAMPP / WAMP)

1.  **Clone the project**:
    ```bash
    git clone https://github.com/lequochuy05/HotelManagement.git
    ```
2.  **Move to server directory**: Copy the project folder to `C:\xampp\htdocs\`.
3.  **Start Services**: Open XAMPP Control Panel and start **Apache** and **MySQL**.
4.  **Database Setup**:
    - Open [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
    - Create a new database named `hotelmanagement`.
    - Select the database and click **Import**.
    - Choose the `hotelbooking.sql` file from the project root.
5.  **Configure Credentials**:
    - Edit `Admin/inc/dbconfig.php` if you have a different MySQL password.
    - Default credentials in project: `root` / `12345`.
6.  **Access the project**:
    - Frontend: [http://localhost/HotelManagement/](http://localhost/HotelManagement/)
    - Admin: [http://localhost/HotelManagement/Admin/](http://localhost/HotelManagement/Admin/)

---

### 🐧 Linux Setup (LAMP / LEMP Stack)

1.  **Clone the project**:
    ```bash
    git clone https://github.com/lequochuy05/HotelManagement.git
    cd HotelManagement
    ```
2.  **Permissions**: Ensure the web server has write access to the `images/` folder:
    ```bash
    sudo chown -R www-data:www-data images/
    sudo chmod -R 755 images/
    ```
3.  **Database Import**:
    ```bash
    mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS hotelmanagement;"
    mysql -u root -p hotelmanagement < hotelbooking.sql
    ```
4.  **Apache Configuration**: (Optional) Create a VirtualHost or symlink to `/var/www/html`.
    ```bash
    sudo ln -s $(pwd) /var/www/html/HotelManagement
    ```
5.  **Configure**: Edit `Admin/inc/dbconfig.php` to match your DB credentials.
6.  **PHP Server (Quick Start)**:
    If you have PHP installed but no full web server setup:
    ```bash
    php -S localhost:8000
    ```

---

## 🔑 Default Admin Credentials

To access the administration panel:
- **Username**: `admin`
- **Password**: `123`

---

## 📧 Contact & Support

**Author**: Wuchuy </br>
**Email**: [wuchuy05.dev@gmail.com](mailto:wuchuy.dev@gmail.com)  

---
