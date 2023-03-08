<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "excuses";

$conn = mysqli_connect($host, $user, $password, $dbname);
$conn->set_charset("utf8");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["occText"])){
    $occText = $_POST["occText"];

    $sql = "INSERT INTO occasion (occText)
    VALUES ('$occText')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
<html>
<body>
<form method="post" action="add_occasion.php">
    <label for="occText">Occasion Text:</label>
    <input type="text" name="occText" id="occText">
    <input type="submit" value="Legg til en situasjon">
</form>
</body>
</html>