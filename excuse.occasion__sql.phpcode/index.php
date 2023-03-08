<html>
  <head>
  <title></title>

</head>


<body>
  <h1>A world of excuses</h1>
  <h2>Velg en situsjon</h2>

  <p>
  <?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "excuses";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);
// Check connection
$conn->set_charset("utf8");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM excuses.occasion";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      $id = $row['occID'];
      $name = $row['occText'];
      echo "<a href='index1.php?id=$id'>$name</a><br>";
    
  }
} else {
  echo "0 resultater";
}
mysqli_close($conn);
?>
<form method="post" action="add_occasion.php">
    <input type="text" name="occText" id="occText">
    <input type="submit" value="Legg til en situasjon">
</form>

</body>
</html>
