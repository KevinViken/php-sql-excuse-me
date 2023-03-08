<html>
  <head>
    <title></title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <style>
    </style>
  </head>
  <body>
    <h1>Unnskyldninger</h1>
    <button onclick="window.location.href = 'index.php';">Tilbake</button>
    <p>

<?php
if(isset($_GET["id"]) && is_numeric($_GET["id"])){
    $occID = (int)$_GET["id"];
}
?>
<form method="post">
<input type="hidden" name="occID" value="<?php echo $occID; ?>">
<input type="text" name="search" placeholder="Søk etter unnskyldninger">
<input type="submit" value="Search">
</form>

    <?php
    // Connect to the database
    date_default_timezone_set('Europe/Oslo');
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "excuses";
    $conn = mysqli_connect($host, $user, $password, $dbname);
    $conn->set_charset("utf8");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['search'])) {
      $search = "%" . $_POST['search'] . "%";
      $occID = $_POST['occID'];
      $stmt = $conn->prepare("SELECT excuseText FROM excuse WHERE excuseText LIKE ? AND occID = ?");
      $stmt->bind_param("ss", $search, $occID);
      $stmt->execute();      
      $result = $stmt->get_result();
  
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              echo $row['excuseText'] . "<br>";
          }
      } else {
          echo "No results found.";
      }
  }
      if(isset($_GET["id"]) && is_numeric($_GET["id"])){
        $id = (int)$_GET["id"];
        $sql = "SELECT excuse.excuseText, excuse.usedLastDate, excuse.useCount, excuse.exID FROM excuse
        JOIN occasion ON excuse.occID = occasion.occId
        WHERE occasion.occId = $id";


        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            echo "<br>" . $row["excuseText"]."<br>"; 
            echo "Sist brukt: <span id='usedLastDate_" . $row["exID"] . "'>" . $row["usedLastDate"] . "</span><br>";
            echo "Antall bruk: <span id='useCount_" . $row["exID"] . "'>" . $row["useCount"] . "</span><br>";
            echo "<form method='post' action='update_time.php'>";
            echo "<input type='hidden' name='id' value='".$row["exID"]."'/>";
            echo "<input type='submit' class='update_time' value='Trykk får å bruke'/>";
            echo "</form>";              
 }
        } else {
          echo "0 results";
        }
        mysqli_close($conn);
      } else {
        echo "Missing parameter";
      }
    ?>
<form method="post" action="add_excuse.php">
<input type="hidden" name="occID" value="<?php echo $id; ?>">
    <label for="excuseText"></label>
    <input type="text" name="excuseText" id="excuseText">
    <input type="submit" value="Legg til en unnskyldning">
</form>


  </body>
</html>
