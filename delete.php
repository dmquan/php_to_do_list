
<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 西暦18/01/07
 * Time: 00:00
 */

require_once "db_connect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "DELETE FROM todo WHERE id = '$id'";
    $delete = mysqli_query($link, $query);
    if($delete){
        echo "<p>Delete successfully !</p>";
        echo "<a href=\"http://localhost:8888/todolist/index.php\" target=\"_blank\">Back to index</a>";
    }
    mysqli_close($link);
}

?>