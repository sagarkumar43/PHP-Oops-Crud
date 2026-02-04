# PHP OOP CRUD Application

This project is a simple **PHP CRUD Application** built using **Object-Oriented Programming (OOP)** concepts.
It follows a **basic MVC-like structure** and includes **login functionality**, session handling, database abstraction, and validation.

This project is ideal for:
- PHP OOP beginners
- Interview preparation
- Understanding MVC fundamentals without frameworks

---

## 🔧 Technologies Used

- PHP (OOP)
- MySQL
- HTML
- Apache (.htaccess for routing)
- Sessions

---

## 📁 Project Folder Structure

PHP-Oops-Crud-main/
│── .htaccess
│
├── app/
│   └── Core/
│       ├── Controller.php
│       ├── Database.php
│       ├── Model.php
│       ├── Session.php
│       └── Validator.php
│
├── config/
│   ├── config.php
│   └── database.php
│
└── public/
    ├── index.php
    └── login.php

---

## 🧠 Application Flow (High Level)

1. User request comes from browser
2. `.htaccess` redirects request to `public/index.php`
3. `index.php` loads config + core classes
4. Controller handles request
5. Model interacts with Database
6. Response is sent back to browser
7. Session manages login state

---

## 📄 File-by-File Explanation (Detailed)

---

## 🔹 1. `.htaccess`

Purpose:
- URL rewriting
- All requests routed to `public/index.php`

Concept Used:
- Front Controller Pattern

Example logic:
- Agar user `/public/index.php` ke alawa kuch bhi access kare
- Request automatically `index.php` par aa jati hai

Isse:
- Clean URLs milte hain
- Security better hoti hai

---

## 🔹 2. `config/config.php`

Purpose:
- Application-level configuration

Is file mein:
- App name
- Base URL
- Time zone
- Session configuration

Line-by-line concept:
- `return [ ... ]` → PHP array return karta hai
- Ye config array poori application mein use hota hai
- Centralized configuration ka concept use hua hai

---

## 🔹 3. `config/database.php`

Purpose:
- Database credentials store karna

Contains:
- Host
- Database name
- Username
- Password

Why separate file?
- Security
- Easy maintenance
- Reusability

---

## 🔹 4. `public/index.php`

Purpose:
- **Entry point of the application**

Yahin se application start hoti hai.

Key Responsibilities:
- Config files load karna
- Core classes include karna
- Controller initialize karna

Concepts Used:
- Front Controller
- Autoloading (manual)
- Single entry point

Is file ka kaam:
> “Jo bhi request aaye, usko control karna”

---

## 🔹 5. `public/login.php`

Purpose:
- User login form
- Login request handle karna

Flow:
1. User username/password enter karta hai
2. Form submit hota hai
3. Controller/Model ke through DB check hota hai
4. Session set hoti hai

Security Concept:
- Session-based authentication

---

## 🔹 6. `app/Core/Controller.php`

Purpose:
- Base Controller class

Is class ka kaam:
- Common functionality dena jo saare controllers use kar sakte hain

Concepts Used:
- Inheritance
- Reusability

Example:
- Future mein agar multiple controllers bane
- Sab is Controller class ko extend karenge

---

## 🔹 7. `app/Core/Model.php`

Purpose:
- Base Model class

Responsibilities:
- Database object ko hold karna
- Common DB functions provide karna

Concepts Used:
- Abstraction
- Inheritance

Isse fayda:
- Har model ko DB connection bar-bar nahi banana padta

---

## 🔹 8. `app/Core/Database.php`

Purpose:
- Database connection handle karna

Concepts Used:
- OOP
- Encapsulation

Line-by-line concept:
- Private properties → DB credentials hide karne ke liye
- Constructor → connection initialize karta hai
- Methods → query execute karte hain

Ye class:
> “Pure project ka database brain hai”

---

## 🔹 9. `app/Core/Session.php`

Purpose:
- Session handling in OOP way

Methods:
- `start()` → session start karta hai
- `set()` → session value set karta hai
- `get()` → session value read karta hai
- `destroy()` → logout ke time session destroy

Concepts Used:
- Static methods
- Encapsulation

Why static?
- Bar-bar object banane ki zarurat nahi

---

## 🔹 10. `app/Core/Validator.php`

Purpose:
- Form data validation

Responsibilities:
- Empty check
- Input validation
- Error handling

Concept:
- Separation of concerns

Validation alag class mein rakhna:
- Code clean hota hai
- Reusable hota hai

---

## 🔐 Authentication Flow (Login)

1. User login form submit karta hai
2. Data validate hota hai (Validator)
3. DB se match hota hai (Model)
4. Correct hua to session set hoti hai
5. User authenticated ho jata hai

---

## 🧩 OOP Concepts Used

- Encapsulation → private properties
- Inheritance → Controller & Model
- Abstraction → Database handling
- Static methods → Session
- Separation of concerns

---

## 🎯 Interview Ready Points

- MVC ka basic structure
- Front Controller pattern
- OOP best practices
- Session-based authentication
- Clean folder structure

---

## 🚀 Possible Improvements

- Autoloader (PSR-4)
- CSRF protection
- Password hashing
- Middleware
- Proper routing class

---

## ✅ Conclusion

This project is a **perfect beginner-friendly PHP OOP CRUD application**
that helps in understanding:
- How real projects are structured
- How MVC works internally
- How OOP concepts are applied practically

---
