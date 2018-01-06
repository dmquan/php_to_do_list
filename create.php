<html>
<head>
    <title>Create Todo list</title>
</head>
<body>
<h1>Create Todo List</h1>
<form method="post" action="create.php">
    <p>Todo title: </p>
    <input name="todoTitle" type="text">
    <p>Todo description: </p>
    <input name="todoDescription" type="text">
    <br>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 西暦18/01/01
 * Time: 23:47
 */

require_once("db_connect.php");
if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];
    //connect to database;
    db();
    global $link;
    $query = "INSERT INTO todo(title, description, date)     VALUES ('$title', '$description', now() )";

    $insertTodo = mysqli_query($link, $query);
    if($insertTodo) {
        echo "<p>Create successfully !</p>";
        echo "<a href=\"http://localhost:8888/todolist/index.php\" target=\"_blank\">Back to index</a>";
    }else {
        echo mysqli_error($link);
    }

    mysqli_close($link);
}



?>