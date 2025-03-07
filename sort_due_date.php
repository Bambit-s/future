<?php
echo '<form action="" method="Post"><input type="submit" name="sort_due_date" value="Сортировка по дате выполнения"></form>' . '</br>';
if (isset($_POST["sort_due_date"])) {
    $c = $_SESSION['sort_order'] ?? 0;

    usort($all, function ($a, $b) use (&$c) {
        if ($c % 2 == 0) { {
                return $a['due_date'] <=> $b['due_date'];
            };
        } else {
            return $b['due_date'] <=> $a['due_date'];
        }
    });

    $c++;
    $_SESSION['sort_order'] = $c % 2;
}
