<?php
$connect = mysqli_connect("localhost", "root", "", "Sklad") or die("Error");

$query = mysqli_query($connect, "SELECT * FROM Works");

/* while($row = mysqli_fetch_assoc($query)) echo "<h1>".$row['title']."</h1><p>".$row['text']."</p><br>"; */
?>



<!DOCTYPE html>
<html>
    <head>
    <title>PHP SEARCHING</title>
    </head>    
    <body>
    <form method="post">
        <input type="text" name="search" class="search">
        <input type="submit" name="submit" value="поиск">
    </form>
    <hr>
    <?php
        if(isset($_POST['submit'])){
            $search = explode(" ", $_POST['search']);
            $count = count($search);
            $array = array();
            $i = 0;
            foreach($search as $key) {
                $i++;
                if($i < $count) $array[] = " CONCAT (`id_works`,`name`) LIKE '%".$key."%' OR "; else $array[] = " CONCAT (`id_works`,`name`) LIKE '%".$key."%' OR ";
            }
            $sql = "SELECT * FROM `Works` WHERE ". implode("", $array);
            echo $sql;
            $query = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($query))  echo "<h1>".$row['id_works']. "</h1><p>".$row['name']."</p><br>";
        }
    ?>

    </body>
</html>