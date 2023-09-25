
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Форма регистрации</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Форма регистрации</h2>
                <form>
                    <div class="form-group">
                        <label for="username">Имя пользователя</label>
                        <input type="text" class="form-control" id="username" placeholder="Введите имя пользователя" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Адрес электронной почты</label>
                        <input type="email" class="form-control" id="email" placeholder="Введите адрес электронной почты" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" placeholder="Введите пароль" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
    <?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instreet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка данных из формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Хеширование пароля (лучше использовать более безопасные методы)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL-запрос для вставки данных в таблицу
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Регистрация успешна!";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>

    <!-- Подключение скриптов Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>