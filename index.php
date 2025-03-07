<?php
require "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require "validation.php" ?>
    <form action="" method="POST">
        <label for="">Название</label>
        <input id="title" name="title"></label>
        <?php if (array_key_exists("1", $errors)) {
            echo $errors[1];
        } elseif (array_key_exists("2", $errors)) {
            echo $errors[2];
        } ?></br>

        <label for="">Описание</label>
        <input id="description" name="description"></br>

        <label for="">Срок выполнения</label>
        <input id="due_date" name="due_date" type="datetime-local" min="<?php $create_date ?>">
        <?php if (array_key_exists("3", $errors)) {
            echo $errors[3];
        } ?></br>

        <label for="" name="title">Приоритет</label>
        <select name="priority" id="priority-selected">
            <option value="">--Выберите приоритет--</option>
            <option value="Высокий">Высокий</option>
            <option value="Средний">Средний</option>
            <option value="Низкий">Низкий</option>
        </select><?php if (array_key_exists("4", $errors)) {
                        echo $errors[4];
                    } ?></br>

        <label for="">Категория</label>
        <select name="category" id="category-selected">
            <option value="">--Выберите приоритет--</option>
            <option value="Работа">Работа</option>
            <option value="Дом">Дом</option>
            <option value="Личное">Личное</option>
        </select><?php if (array_key_exists("5", $errors)) {
                        echo $errors[5];
                    } ?></br>
        <input type="submit" name="send" value="Отправить">
    </form>

    <!-- вывод всех задач -->
    <form action="" method="Get">
        <input type="submit" name="show" value="Показать все задачи">
    </form>

    <form action="" method="Get">
        <input type="search" name="search">
        <input type="submit" value="Поиск">
    </form>
    <div>
        <?php require "show.php"; ?>
    </div>
</body>

</html>