<?php
<?php
date_default_timezone_set('Europe/Oslo');
//connect to database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "excuses";

$conn = mysqli_connect($host, $user, $password, $dbname);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $sql = "SELECT excuseText FROM excuses WHERE excuseText LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo $row['excuseText'] . "<br>";
            }
        } else {
            echo "No results found.";
        }
    }
?>

?>

