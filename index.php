<?php
require_once ("db_connect.php")
?>


<html>
<head>
    <title>my todos</title>
</head>
<body>
<h2>
    Todo list
</h2>

<?php
db();
global $link;
$query = "Select * from todo";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) >= 1){
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $title = $row['title'];
        $date = $row['date'];

?>

    <ul>
        <li><a href="detail.php?id=<?php echo $id?>"><?php echo $title ?></a></li> <?php echo "[[$date]]";?>
        <button type="button"><a href="update.php?id=<?php echo $id?>">Edit</a></button>
        <button type="button"><a href="delete.php?id=<?php echo $id?>">Delete</a></button>
    </ul>

        <?php
    }
}else {
    echo "<p>task list is empty !</p>";
}
mysqli_close($link);
?>
<p><a href="create.php">add todo</a></p>
</body>
</html>

