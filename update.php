<?php
$title = $_POST["title"] ?? "";
$description = $_POST["description"] ?? "";
$due_date = $_POST["due_date"] ?? "";
$priority = $_POST["priority"] ?? "";
$category = $_POST["category"] ?? "";
$status = $_POST["status"] ?? "";
$moving = $bu;
$update = [];
$errors_moving = [];

if (isset($_POST['update'])) {
    if (1 <= (strlen($title))) {
        if (strlen($title) <= 3) {
            echo "Название слишком короткое!";
            $errors_moving[] = "Название слишком короткое";
        }
    }
    if (empty($errors_moving)) {
        $update["id"] = $moving["id"];
        $update["title"] = $title;
        $update["description"] = $description;
        $update["due_date"] = $due_date;
        $update["create_date"] = $moving["create_date"];
        $update["priority"] = $priority;
        $update["category"] = $category;
        $update["status"] = $status;
        foreach ($update as $i => $r) {
            if (strlen($update[$i]) > 0) {
                if ($update[$i] && $moving[$i]) {
                    $moving[$i] = $update[$i];
                }
            }
        }
        $id = "";
        foreach ($moving as $cook) {
            if (key($moving) == "id") {
                $id = $cook;
            }
            $key = (key($moving));
            next($moving);
            $s = $conn->query("UPDATE datatable SET $key = '$cook' WHERE id =$id");
            $all = $s->fetchAll(PDO::FETCH_ASSOC);
            $bu = $moving;
        }
    }
    // header("Location: /index.php");
}
