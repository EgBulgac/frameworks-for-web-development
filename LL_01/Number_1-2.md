````markdown
# Теоретическая часть

### Какой метод HTTP был использован для отправки запроса?

- **POST**

### Какие заголовки были отправлены в запросе?

- Accept: _/_
- Accept-Encoding: gzip, deflate
- Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,es;q=0.7
- Connection: keep-alive
- Content-Length: 37
- Content-Type: application/x-www-form-urlencoded; charset=UTF-8
- Cookie: \_fbp=fb.1.1729246337643.289924829189570132
- Host: sandbox.usm.md
- Origin: http://sandbox.usm.md
- Referer: http://sandbox.usm.md/login/
- User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36
- X-Requested-With: XMLHttpRequest

### Какие параметры были отправлены в запросе?

- username=student&password=studentpass

### Какой код состояния был возвращен сервером?

- **401 Unauthorized**

### Какие заголовки были отправлены в ответе?

- Cookie: \_fbp=fb.1.1729246337643.289924829189570132
- Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,es;q=0.7
- Accept-Encoding: gzip, deflate
- Referer: http://sandbox.usm.md/login/
- Origin: http://sandbox.usm.md
- Content-Type: application/x-www-form-urlencoded; charset=UTF-8
- Accept: _/_
- User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36
- X-Requested-With: XMLHttpRequest
- Content-Length: 37
- Connection: keep-alive
- Host: sandbox.usm.md

# Практическая часть

### Составьте GET-запрос к серверу по адресу http://sandbox.com, указав в заголовке User-Agent ваше имя и фамилию

```bash
curl -X GET http://sandbox.com -H "User-Agent: John Doe"
```
````

Ответ сервера:

```html
<html>
  <head>
    <title>301 Moved Permanently</title>
  </head>
  <body>
    <center><h1>301 Moved Permanently</h1></center>
    <hr />
    <center>cloudflare</center>
  </body>
</html>
```

### Составьте POST-запрос к серверу по адресу http://sandbox.com/cars, указав в теле запроса следующие параметры:

- make: Toyota
- model: Corolla
- year: 2020

```bash
curl -X POST http://sandbox.com/cars \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "make=Toyota&model=Corolla&year=2020"
```

Ответ сервера:

```html
<html>
  <head>
    <title>301 Moved Permanently</title>
  </head>
  <body>
    <center><h1>301 Moved Permanently</h1></center>
    <hr />
    <center>cloudflare</center>
  </body>
</html>
```

### Составьте PUT-запрос к серверу по адресу http://sandbox.com/cars/1, указав в заголовке User-Agent ваше имя и фамилию, в заголовке Content-Type значение application/json и в теле запроса следующие параметры:

```bash
curl -X PUT http://sandbox.com/cars/1 \
  -H "User-Agent: John Doe" \
  -H "Content-Type: application/json" \
  -d '{"make": "Toyota", "model": "Corolla", "year": 2021}'
```

Ответ сервера:

```html
<html>
  <head>
    <title>301 Moved Permanently</title>
  </head>
  <body>
    <center><h1>301 Moved Permanently</h1></center>
    <hr />
    <center>cloudflare</center>
  </body>
</html>
```

### Напишите один из возможных вариантов ответа сервера следующий запрос.

**Запрос:**

```http
POST /cars HTTP/1.1
Host: sandbox.com
Content-Type: application/json
User-Agent: John Doe
model=Corolla&make=Toyota&year=2020
```

**Возможный ответ сервера:**

#### 1. Код состояния 200 OK:

Ситуация: Запрос успешно обработан, но сервер не создал новый ресурс, а обновил или вернул существующий. Ответ может содержать данные, подтверждающие успешное выполнение запроса.

```http
HTTP/1.1 200 OK
Content-Type: application/json
{
  "message": "Car information updated successfully",
  "car": {
    "make": "Toyota",
    "model": "Corolla",
    "year": 2020
  }
}
```

#### 2. Код состояния 201 Created:

Ситуация: Запрос успешно обработан, и был создан новый ресурс. Сервер может возвращать информацию о новом объекте (например, ID созданного автомобиля).

```http
HTTP/1.1 201 Created
Content-Type: application/json
{
  "message": "Car created successfully",
  "car": {
    "id": 123,
    "make": "Toyota",
    "model": "Corolla",
    "year": 2020
  }
}
```

#### 3. Код состояния 400 Bad Request:

Ситуация: Запрос имеет некорректный синтаксис или неверные данные в теле запроса. Например, в теле запроса указан неверный формат данных (например, application/json, но данные не в формате JSON).

```http
HTTP/1.1 400 Bad Request
Content-Type: application/json
{
  "error": "Invalid JSON format",
  "message": "Expected JSON but received form-encoded data"
}
```

#### 4. Код состояния 401 Unauthorized:

Ситуация: Запрос требует авторизации, но пользователь не авторизован или токен недействителен.

```http
HTTP/1.1 401 Unauthorized
Content-Type: application/json
{
  "error": "Unauthorized",
  "message": "Authentication required to access this resource"
}
```

#### 5. Код состояния 403 Forbidden:

Ситуация: Запрещен доступ к ресурсу, несмотря на успешную аутентификацию. Например, у пользователя нет прав на создание или редактирование ресурсов.

```http
HTTP/1.1 403 Forbidden
Content-Type: application/json
{
  "error": "Forbidden",
  "message": "You do not have permission to create a car"
}
```

#### 6. Код состояния 404 Not Found:

Ситуация: Запрашиваемый ресурс не существует на сервере. Например, если вы пытаетесь создать автомобиль на несуществующем пути или в неверном разделе API.

```http
HTTP/1.1 404 Not Found
Content-Type: application/json
{
  "error": "Not Found",
  "message": "The requested endpoint /cars does not exist"
}
```

#### 7. Код состояния 500 Internal Server Error:

Ситуация: Ошибка на сервере при обработке запроса. Это может быть связано с проблемами в базе данных, внутренних ошибках серверной логики или других непредвиденных сбоях.

```http
HTTP/1.1 500 Internal Server Error
Content-Type: application/json
{
  "error": "Internal Server Error",
  "message": "An unexpected error occurred while processing your request"
}
```

```

```
