<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 西暦18/01/01
 * Time: 23:23
 */

function db(){
    global $link;
    $link = mysqli_connect("localhost", "root", "root", "todolist") or     die("couldn’t connect to database");
    return $link;
}

if(db()){
    echo "Databse connected !";
}

?>