# 🎓 codewithyash — Online Student Authentication Portal

codewithyash is a PHP-based web application that simulates a real-world **online coaching platform**, built to demonstrate a complete, secure user authentication system — from registration to password recovery to account management. The project focuses on practical implementation of session handling, email-based OTP verification, and a clean, premium glassmorphism UI.

---

## ✨ Features

- **User Registration** — New students can sign up with profile details and a profile picture upload.
- **Secure Login** — Session-based authentication with SHA1 password hashing.
- **Forget Password (OTP-based)** — Users receive a one-time password via email (using PHPMailer + SMTP) to verify their identity before resetting their password. OTPs expire after 5 minutes for security.
- **Change Password** — Logged-in users can update their password after verifying their current one.
- **Account Detail / Profile Update** — View and edit personal details (name, age, gender, mobile number, country, profile picture).
- **Delete Account** — Users can permanently remove their account after password confirmation.
- **Member-Only Dashboard** — Premium content is locked behind authentication, simulating a real subscription-based access model.
- **Responsive Glassmorphism UI** — Custom-built CSS with a modern frosted-glass design, gradient backgrounds, and smooth hover interactions (no UI framework used — pure handwritten CSS).

---

## 🛠️ Tech Stack

| Layer        | Technology                          |
|--------------|--------------------------------------|
| Backend      | PHP (procedural)                     |
| Database     | MySQL (via `mysqli`)                 |
| Email Service| PHPMailer + SMTP (Zoho Mail)         |
| Frontend     | HTML, CSS (custom glassmorphism UI)  |
| Auth         | PHP Sessions + SHA1 password hashing |

---

## 📂 Project Structure

```
├── index.php           # Public home page
├── login.php           # Login page
├── newuser_form.php    # Registration form
├── newuser.php         # Registration handler
├── forget.php          # Forgot password — sends OTP
├── verifyOtp.php       # OTP verification page
├── newpassword.php     # Reset password after OTP success
├── chngpass.php        # Change password (logged-in users)
├── userDetail.php      # View account details
├── uptodate.php        # Update profile details
├── settingg.php        # Account settings menu
├── removeAc.php        # Delete account
├── member.php           # Premium / member-only dashboard
├── logout.php          # Logout handler
├── header.php / footer.php   # Shared layout components
├── dbconfig.php        # Database configuration
├── style.css           # Custom glassmorphism styling
└── PHPMailer.php / SMTP.php  # Email library for OTP delivery
```

---

## 🔐 How Authentication Works

1. User registers with a username, password (hashed via SHA1), and profile details.
2. On login, credentials are verified against the database and a PHP session is created.
3. If a password is forgotten, a 4-digit OTP is generated, stored with a 5-minute expiry, and emailed to the user via PHPMailer.
4. After successful OTP verification, the user is redirected to set a new password.
5. All sensitive pages (account details, settings, member dashboard) are protected by session checks.

---

## 🚀 Setup Instructions

1. Clone this repository into your local server directory (e.g., `htdocs` for XAMPP).
2. Import the database schema into MySQL (table: `users`).
3. Update `dbconfig.php` with your database credentials.
4. Update SMTP credentials in `forget.php` for OTP email functionality.
5. Run the project via `localhost/your-folder-name/index.php`.

---

## 📌 Future Improvements

- Migrate password hashing from SHA1 to `password_hash()` (bcrypt) for stronger security.
- Add prepared statements / PDO to prevent SQL injection.
- Build a proper admin panel for managing students and content.
- Add real subscription/payment integration.

---

## 👤 Author

Built by **Yash** as a hands-on project to learn and demonstrate full-stack PHP development — authentication systems, session management, email integration, and UI design.
