<?php
$errors = [];
if (isset($_GET["PUT"])) {
    $input = $_SERVER['REQUEST_URI'];
    $id = preg_replace("/[^,.0-9]/", '', $input);
    
    $sub_id = $id;
    $resul = $conn->prepare("SELECT * FROM datatable WHERE id = ?");
    $resul->execute([$sub_id]);
    $bu = $resul->fetch(PDO::FETCH_ASSOC);
    $desc = [
        "id" => "id:",
        "title" => "Название:",
        "description" => "Описание:",
        "due_date" => "Срок выполнения:",
        "create_date" => "Дата создания:",
        "priority" => "Приоритет:",
        "category" => "Категория:",
        "status" => "Cтатус:",
    ];
    $placeholders = [
        "id" => "",
        "title" => "<input id='title' name='title'></label>",
        "description" => "<input id='description' name='description'></br>",
        "due_date" => "<input id='due_date' name='due_date' type='datetime-local' min='<?php $create_date ?>'>",
        "create_date" => "",
        "priority" => "<select name='priority' id='priority-selected'>
            <option value=''>--Выберите приоритет--</option>
            <option value='Высокий'>Высокий</option>
            <option value='Средний'>Средний</option>
            <option value='Низкий'>Низкий</option>
        </select>",
        "category" => "<select name='category' id='category-selected'>
            <option value=''>--Выберите приоритет--</option>
            <option value='Работа'>Работа</option>
            <option value='Дом'>Дом</option>
            <option value='Личное'>Личное</option>
        </select>",
        "status" => "<select name='status' id='status-selected'>
            <option value=''>--Выберите приоритет--</option>
            <option value='Не выполнена'>не выполнена</option>
            <option value='Выполнена'>выполнена</option>
        </select>",
    ];
    require "update.php";
    echo "<form action='' method='POST'>";
    foreach ($desc as $field => $string) {
        if (isset($bu[$field]) && isset($placeholders[$field])) {
            echo $string . " " . $bu[$field] . $placeholders[$field] . "</br>";
        }
    }
    echo "<input type='submit' name='update' value='Изменить задачу' >";
    echo "</form>" . "</br>";
}
