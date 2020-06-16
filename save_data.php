<?php
require_once "SaveData.php";

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["message"])) {

    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $save = new SaveData($username, $email, $phone, $message);
    if (!$save->checkEmail()) {
        $result = [
            'response_message' => 'Неправильный емеил',
        ];
        echo json_encode($result);
    } elseif (!$save->checkPhone()) {
        $result = [
            'response_message' => 'Неправильный номер телефона. Он должен состоять из 10 цифр. Например, 0671239856',
        ];
        echo json_encode($result);
    } elseif (!$save->checkName()) {
        $result = [
            'response_message' => 'Имя должно быть длинной от 3 до 16 символов',
        ];
        echo json_encode($result);
    } elseif (!$save->checkMessage()) {
        $result = [
            'response_message' => 'Поле сообщения не должно быть пустым',
        ];
        echo json_encode($result);
    } else {
        $result = [
            'response_message' => 'Данные успешно отправлены',
        ];
        $save->writeToFile();
        $save->writeToDB();
        echo json_encode($result);
    }
}

?>