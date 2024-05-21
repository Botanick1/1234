<!-- post_ad_ajax.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Публикация объявления</title>
</head>
<body>
    <h2>Публикация объявления</h2>
    <form id="postAdForm">
        <label for="title">Заголовок:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="description">Описание:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        <button type="submit">Опубликовать</button>
    </form>
    <div id="message"></div>

    <script>
        document.getElementById('postAdForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Предотвращаем отправку формы по умолчанию

            var form = this;
            var formData = new FormData(form); // Создаем объект FormData для отправки данных формы

            // Отправляем AJAX-запрос на сервер
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'post_ad_ajax_process.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // В случае успешного ответа от сервера обновляем сообщение на странице
                        document.getElementById('message').innerHTML = xhr.responseText;
                        // Очищаем поля формы
                        form.reset();
                    } else {
                        // В случае ошибки выводим сообщение об ошибке
                        document.getElementById('message').innerHTML = 'Ошибка: ' + xhr.statusText;
                    }
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
