<?php

if (isset($_POST['DELETE'])) {
    
    $input = $_SERVER['REQUEST_URI'];
    $id = preg_replace("/[^,.0-9]/", '', $input);
    $s = $conn->query("DELETE FROM datatable WHERE id =$id");
    $all = $s->fetch(PDO::FETCH_ASSOC);
}
