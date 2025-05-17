# 🎬 Cinema Management Web & API

A web application connected to a RESTful API that allows managing a cinema schedule system, including movies and their screenings. Developed with PHP (frontend) and Spring Boot (backend).

---

## 📦 Project Contents

### 🧩 Main Entities
- **Movie**: title, genre, duration, release date, currently showing
- **Screening**: date and time, theater room, ticket price, subtitled, associated movie

### 🌐 Backend API (Spring Boot)
- Endpoints: `/movies`, `/screenings`
- Methods: `GET`, `POST`, `PUT`, `DELETE`
- Database: MySQL
- Documentation: OpenAPI available (Swagger)

### 💻 Web Application (PHP + HTML + CSS)
- List movies and screenings
- Add, edit, and delete entries
- Visual interface with cinema-inspired design
- Consumes REST API using `file_get_contents()` and JSON

---

## 🚀 Technologies Used

| Layer     | Technology                  |
|----------|-----------------------------|
| Frontend | PHP 7+, HTML5, Custom CSS3  |
| Backend  | Java 17, Spring Boot 3, Lombok, JPA, MySQL |
| Style    | Dark theme, cinema icons/emojis |
| Versioning | Git + GitHub + GitFlow     |

---

## 🗂️ Project Structure

```
├── index.php
├── config/
│   └── config.php
├── css/
│   └── style.css
├── view/
│   ├── list_movies.php
│   ├── list_screenings.php
│   ├── add_movie.php
│   ├── add_screening.php
│   ├── edit_movie.php
│   ├── edit_screening.php
│   ├── delete_movie.php
│   ├── delete_screening.php
│   ├── header.php
│   └── footer.php
└── README.md
```

---

## ⚙️ Local Setup

1. Clone the repository:
```bash
git clone https://github.com/your-user/cinema-project.git
```

2. Start the backend (Spring Boot API):
```bash
cd backend/
./mvnw spring-boot:run
```

3. Run the web interface (via XAMPP, Laragon, etc.):
```
http://localhost/cinema/index.php
```

4. Ensure the API responds at:
```
http://localhost:8080/movies
```

---

## 🧪 Testing and Deployment
- ✅ Manual tests via browser
- ✅ Postman collection for endpoints
- ✅ Optional AWS deployment
- ✅ Optional JavaFX + RxJava client

---

## 👩‍💻 Authors

> TheBigBangDAM  
> DAM Academic Project - 2025  
> San Valero

---

Thanks for checking out this project! 🎞️🍿
