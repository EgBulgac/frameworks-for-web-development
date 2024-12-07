# Movie Manager

**Movie Manager** — это простое CRUD-приложение для управления фильмами, построенное на PHP с использованием REST API.

---

## 📁 Структура проекта

```
FDAW_Exam/
├── api/
│   ├── index.php           # Точка входа для API
│   ├── routes.php          # Маршруты для API
├── config/
│   ├── db.php              # Конфигурация базы данных
├── controllers/
│   ├── MovieController.php # Контроллер обработки запросов
├── models/
│   ├── Movie.php           # Модель данных для фильмов
├── index.html              # HTML-страница для взаимодействия с API
├── .htaccess               # Настройка для маршрутизации
```

---

## 📦 Установка

1. **Клонируйте проект:**

   ```bash
   gh repo clone EgBulgac/frameworks-for-web-development
   cd FDAW_Exam
   ```

2. **Настройте базу данных:**

   - Создайте базу данных `film_manager` в вашем MySQL сервере.
   - Выполните SQL-запрос для создания таблицы:

     ```sql
     CREATE TABLE movies (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255) NOT NULL,
         phone VARCHAR(20) NOT NULL,
         email VARCHAR(255),
         note TEXT,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```

3. **Настройте конфигурацию базы данных:**

   В файле `config/db.php` укажите свои данные для подключения к базе данных:

   ```php
   private $host = "localhost";
   private $db_name = "film_manager";
   private $username = "root"; // Ваше имя пользователя
   private $password = "root";     // Ваш пароль
   ```

4. **Запустите сервер:**

   Если вы используете MAMP или XAMPP:

   - Переместите папку проекта в директорию `htdocs` (например, `C:\xampp\htdocs`).
   - Перейдите по адресу [http://localhost/FDAW_Exam/public/index.html](http://localhost/FDAW_Exam/public/index.html).

   Если вы используете встроенный сервер PHP:

   ```bash
   php -S localhost:8888 -t public
   ```

---

## 🌐 API Маршруты

1. **GET /api/index.php**  
   Получить все фильмы.

2. **GET /api/index.php?id={id}**  
   Получить фильм по ID.

3. **POST /api/index.php**  
   Создать новый фильм.  
   Тело запроса (JSON):

   ```json
   {
     "title": "Student at Exam",
     "director": "Bulgac Egor",
     "genre": "horror",
     "description": "Hope he will not die"
   }
   ```

4. **PUT /api/index.php?id={id}**  
   Обновить фильм.  
   Тело запроса (JSON):

   ```json
   {
     "title": "Student at Exam for FDAW",
     "director": "Bulgac Egor",
     "genre": "horror",
     "description": "Hope he will get at least 9"
   }
   ```

5. **DELETE /api/index.php?id={id}**  
   Удалить фильм.

---

## 📃 Использование

1. Откройте [http://localhost/FDAW_Exam/index.html](http://localhost/FDAW_Exam/index.html).
2. Создавайте, редактируйте и удаляйте фильмы через веб-интерфейс.
3. Список фильмов обновляется автоматически.

---

## 🛠 Технологии

- PHP
- MySQL
- REST API
- HTML, CSS, JavaScript
