<?php
if (isset($_POST['delete'])) {
    $id = $_POST["id"];
    $s = $conn->query("DELETE FROM datatable WHERE id =$id");
    $all = $s->fetch(PDO::FETCH_ASSOC);
}
