<?php
//нажатие на поиск
if (($_GET["search"]) ??  '') {
    $search = ($_GET["search"]);
    if (is_numeric($search)) {
        $sql = "SELECT * FROM datatable WHERE id = $search";
    } else {
        $sql = "SELECT * FROM datatable WHERE title LIKE '%" . $search . "%' ";
    }

    $resul = $conn->query($sql);

    $all = $resul->fetchall(PDO::FETCH_ASSOC);
    if (count($all) === 0) {
        echo 'Такой задачи нет в списке';
    }
    $c = $_SESSION["sort_order"] ?? 0;
    if (count($all) > 1) {
        require "sort_due_date.php";
        require "created_at.php";
    }

    foreach ($all as $k => $array) {
        echo "<div class ='item-search'>";
        foreach ($array as $a => $string) {
            echo '<p>' . $string . '</p>';
        }
        $id = htmlspecialchars($array['id']);
        echo '<form method="Get">
        <input type="hidden" name="id" value="' . $id . '">
        <input type="submit" name="update" value="Обновить">
        </form>';
        echo '<form action="?id=' . $id . '" method="POST">
            <input type="hidden" name="DELETE" value="' . $id . '">
            <input type="submit" value="Удалить">
            </form>';
        echo "</div>";
    }
}
