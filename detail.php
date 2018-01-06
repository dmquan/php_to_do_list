<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 西暦18/01/03
 * Time: 0:59
 */
require_once("db_connect.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "Select * from todo  where id='$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        if($row){
            $title = $row['title'];
            $description = $row['description'];
            $date = $row['date'];
            echo  "
            <h2>$title</h2>
            <h3>$description</h3>
            <p>$date</p>
            ";
        }
    }else{
        echo 'no todo ';
    }
    mysqli_close($link);

}else{
    echo 'you must use id';
}