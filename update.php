
<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 西暦18/01/06
 * Time: 23:47
 */

require_once("db_connect.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "Select * from todo where id = '$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
?>

        <html>
        <head>
            <title>Update Todo list</title>
        </head>
        <body>
        <h1>Update Todo list</h1>
        <form method="post" action="update.php">
            <p>Todo title: </p>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input name="todoTitle" type="text" value = "<?php echo $title ?>">
            <p>Todo description: </p>
            <input name="todoDescription" type="text" value = "<?php echo $description ?>">
            <br>
            <input type="submit" name="submit" value="Edit">
        </form>
        </body>
        </html>



<?php
    }else{
        echo "The todo not exist !";
    }
    mysqli_close($link);
}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];
    db();
    global $link;

    $query = "UPDATE todo SET title = '$title', description = '$description', date = now()  WHERE id =$id ";
    $insertEdited = mysqli_query($link, $query);
    if($insertEdited){
        echo "<p>Update successfully !</p>";
        echo "<a href=\"http://localhost:8888/todolist/index.php\" target=\"_blank\">Back to index</a>";

    }
    else{
        echo mysqli_error($link);
    }
}

?>




