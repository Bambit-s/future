<?php

if (isset($_POST['DELETE'])) {
    
    $input = $_SERVER['REQUEST_URI'];
    var_dump($input);
    $id = preg_replace("/[^,.0-9]/", '', $input);
    var_dump($id);
    // $s = $conn->query("DELETE FROM datatable WHERE id =$id");
    // $all = $s->fetch(PDO::FETCH_ASSOC);
}
