<?php
$string = file_get_contents('todo-list.json');
$todo_list = json_decode($string, true);

if (isset($_POST['todoItem']) && trim($_POST['todoItem']) != '') {
    $todo_item = $_POST['todoItem'];

    $todo_array = [
        "language" => $todo_item,
        "done" => false,
    ];

    $todo_list[] = $todo_array;

    file_put_contents('todo-list.json', json_encode($todo_list, JSON_PRETTY_PRINT));
}
if (isset($_POST['delete'])) {
    unset($todo_list[$_POST['delete']]);
    file_put_contents('todo-list.json', json_encode($todo_list, JSON_PRETTY_PRINT));
}

header('Content-Type: application/json');
echo json_encode($todo_list);