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
if(isset($_POST["id"]) && is_numeric($_POST["id"])){
    $exID = (int)$_POST["id"]; 
    setlocale(LC_TIME, 'no_NO');
    $date = strftime("%d.%m.%Y %H:%M:%S", time());
    $sql = "UPDATE excuse SET usedLastDate = '$date', useCount = useCount+1 WHERE exID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $exID);
    $result = $stmt->execute();
    if ($result) {
        //get the occasion id 
        $occID = "SELECT occID FROM excuse WHERE exID = $exID";
        $result = mysqli_query($conn, $occID);
        $row = mysqli_fetch_assoc($result);
        $occID = $row['occID'];
        header("Location: index1.php?id=".$occID."&t=".time());
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    $stmt->close();
}

mysqli_close($conn);

?>
