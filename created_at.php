<?php
echo '<form action="" method="Post"><input type="submit" name="created_at" value="Сортировка по дате создания"></form>' . '</br>';
if (isset($_POST["created_at"])) {
    $c = $_SESSION['sort_order'] ?? 0;

    usort($all, function ($a, $b) use (&$c) {
        if ($c % 2 == 0) { {
                return $a['create_date'] <=> $b['create_date'];
            };
        } else {
            return $b['create_date'] <=> $a['create_date'];
        }
    });

    $c++;
    $_SESSION['sort_order'] = $c % 2;
}
