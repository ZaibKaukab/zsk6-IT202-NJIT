<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Unit 4 Exercise zsk6</title>
</head>
<body>
<h1>My Bowling Team</h1>
<h4>Name: Zaib Kaukab</h4>
<h4>UCID: zsk6</h4>
<h4>Course and Section: IT-202-004 Internet Applications</h4>
<?php
error_log('$_POST ' . print_r($_POST, true));
$db = getDB();
$bowlerid = $_POST['bowlerid'];
$score = $_POST['score'];
$query = "INSERT INTO games_zsk6 (bowlerid, score) VALUES (?, ?)";
$stmt = $db->prepare($query);
if($stmt == false) { echo "ERROR:" . $db->errno . ' ' . $db->error; }
$stmt->bind_param(
   "ii",
   $bowlerid,
   $score
);
$result = $stmt->execute();
$stmt->close();
$db->close();
if ($result) {
   echo "<h2>New game's score successfully added</h2>\n";
} else {
   echo "<h2>Sorry, there was a problem adding that game's score</h2>\n";
}
date_default_timezone_set("America/New_York");
echo "The date and time is " . date("D M j h:i:sa T Y");
?>
</body>
</html>