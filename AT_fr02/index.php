<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>А можно чуток больше 8-ми?</title>
</head>
<body>
    <div class="container">
      <h1>All contacts</h1>

      <div id="data">

      </div>
    </div>

    <form id="addContactForm">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="note">Заметка:</label>
        <textarea id="note" name="note"></textarea>

        <button type="submit">Добавить</button>
    </form>
    <div id="response"></div>
</body>
</html>

<script>
  setTimeout(() => {
    const form = document.querySelector('#addContactForm');  
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const jsonData = Object.fromEntries(formData.entries());

      // POST
      fetch('api/contacts.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify(jsonData)
      })
      .then((response) => response.json())
      .then(data => {
          document.getElementById('response').innerText = 'Контакт успешно добавлен!';
          // this.reset();
      })
      .catch(error => {
          document.getElementById('response').innerText = 'Ошибка при добавлении контакта.';
          console.error(error);
      });
    });

    // GET
      fetch('api/contacts.php')
      .then((response) => response.json())
      .then(data => {
        console.log(data, document.querySelector('#data'));
        let html = '';

        data.forEach(element => {
          document.querySelector('#data').append(`
        name: ${element.name}
        email: ${element.email}
        phone: ${element.phone}
        note: ${element.note}`);
        });
      })
      .catch(error => {
          document.getElementById('response').innerText = 'Ошибка при добавлении контакта.';
          console.error(error);
      });
  }, 1000);
</script>

