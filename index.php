<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <script src="ajax.js"></script>

</head>

<body>
<div class="container">
    <form method="post" id="ajax_form" action="">
        <div class="form-group">
            <label for="username">Имя</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
                   placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email">Емеил</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                   placeholder="Enter email">

        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp"
                   placeholder="Enter phone number">
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <input type="button" class="btn btn-success" id="btn" value="Отправить"/>
    </form>
</div>
<br>
<div id="alert"></div>
</body>
</html>