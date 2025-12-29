# Local Aid Resource Finder

Local Aid Resource Finder is a full-stack web application that helps people quickly find nearby aid resources such as food, health services, shelter, and education support. The platform makes local help more accessible through search, category filtering, and direct messaging.

---

## 🚀 Features

- 🔍 Search resources by name or description
- 🏷️ Filter resources by category (Food, Health, Shelter, Education)
- 📍 View locations directly on Google Maps
- 💬 Message aid providers through a dedicated messaging page
- 🛠️ Admin panel to add and manage resources
- 🎨 Clean, colorful, and professional UI with hover effects

---

## 🧠 Inspiration

Many people struggle to find reliable local help during urgent situations. This project was inspired by the idea of creating a simple and accessible platform that connects people with the support they need, when they need it.

---

## 🧱 Tech Stack

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** XAMPP (Apache + MySQL)  
- **Other:** Google Maps links, AJAX for messaging

---

## 🖥️ How to Run Locally

1. Install **XAMPP**
2. Start **Apache** and **MySQL**
3. Clone this repository or download it as ZIP
4. Move the project folder to:
C:\xampp\htdocs\
5. Create a database named:
aid_finder
6. Create the required tables in phpMyAdmin (see Database section below)
7. Open your browser and go to:
http://localhost/Local-Aid-Resource-Finder

---

## 🗄️ Database Structure

### resources table
- id
- name
- category
- location
- description
- contact

### messages table
- id
- resource_id
- sender_name
- sender_email
- message
- created_at

---

## 📸 Screenshots

(Add screenshots of the homepage, messaging page, and admin panel here)

---

## 🧩 Challenges & Learnings

- Integrating frontend and backend smoothly
- Designing a usable and professional UI
- Implementing dynamic search and filtering
- Creating a messaging system that works reliably

This project helped me strengthen my full-stack development and problem-solving skills.

---

## 👤 Author

Built with passion for the **Aethra Global Hackathon 2025** 🚀
