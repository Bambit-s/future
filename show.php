<?php
session_start();
require "search.php";
require "update_page.php";
require "delete.php";
if (isset($_GET["show"])) {

    $s = $conn->query("SELECT * FROM datatable");
    $all = $s->fetchAll(PDO::FETCH_ASSOC);
    if (count($all) > 1) {
        require "sort_due_date.php";
        require "created_at.php";
    }
    
    foreach ($all as $k => $array) {
        echo "<div class ='item'>";
        foreach ($array as $a => $string) {
            echo '<p>' . $string . '</p>';
        }

        $id = $array['id'];

        echo '<form action="?id=' . $id . '" method="GET">
            <input type="hidden" name="PUT" value="' . ($id) . '">
            <input type="submit" value="Обновить">
            </form>';

        echo '<form action="?id=' . $id . '" method="POST">
            <input type="hidden" name="DELETE" value="' . ($id) . '">
            <input type="submit" value="Удалить">
            </form>';
        echo "</div>";
    }
}
