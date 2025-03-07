<?php

date_default_timezone_set("America/Asuncion");

$title = $_POST["title"] ?? "";
$description = $_POST["description"] ?? "";
$due_date = $_POST["due_date"] ?? "";
$create_date = date('Y-m-d\TH:i');
$priority = $_POST["priority"] ?? "";
$category = $_POST["category"] ?? "";
$status = "Не выполнена";

$errors = [];

//проверка на ввод. валидация
if (isset($_POST['send'])) {

    if (empty($title)) {
        $errors += ["1" => "Название обязательно для заполнения"];
    }
    if ((strlen($title)) < 3) {
        $errors += ["2" => "Название слишком короткое"];
    }
    if (empty($due_date)) {
        $errors += ["3" => "Дата не выбрана"];
    }
    if (empty($priority)) {
        $errors += ["4" => "Приоритет не выбран"];
    }
    if (empty($category)) {
        $errors += ["5" => "Категория не выбрана"];
    }

    if (empty($errors)) {
        // добавление в базу данных
        try {
            echo "send to database";
            $s = $conn->query("INSERT INTO datatable (title,description,create_date,due_date,priority,category,status) VALUES ('$title','$description','$create_date','$due_date','$priority','$category', '$status')");
            $all = $s->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Attentions" . $e->getMessage());
        };
    }
}
