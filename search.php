<?php
$db = mysqli_connect("localhost", "username", "password", "database_name");
?>
<?php
$query = $_GET["query"];
$result = mysqli_query($db, "SELECT * FROM table_name WHERE column_name LIKE '%$query%'");
?>
<?php
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div>{$row['column_name']}</div>";
	}
} else {
	echo "Ничего не найдено";
}
?>
