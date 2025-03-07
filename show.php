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
        
        foreach ($array as $a => $string) {
            echo '<p>' . $string . '</p>';
        }

        $id = $array['id'];

        echo '<form method="Get">
        <input type="hidden" name="id" value="' . $id . '">
        <input type="submit" name="update" value="Обновить">
        </form>';

        echo '<form method="Post">
        <input type="hidden" name="id" value="' . $id . '">
        <input type="submit" name="delete" value="Удалить">
        </form>';
    }
}
