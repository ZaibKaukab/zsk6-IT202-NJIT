<!DOCTYPE html>
<html>
<head>
<title>Unit 7 In-Class Exercise zsk6</title>
</head>
<body>
<h1>My Bowling Team</h1>
<h4>Name: Zaib Kaukab</h4>
<h4>UCID: zsk6</h4>
<h4>Course and Section: IT-202-004 Internet Applications</h4>
<form name="games" action="Unit07Exercise_action_zsk6.php" method="get">
   <label>Bowler ID:</label>
   <input type="number" name="bowlerid">
   <br>
   <br>
   <input type="submit">
</form>
<br>
<?php
date_default_timezone_set("America/New_York");
echo "The date and time is " . date("D M j h:i:sa T Y");
?>
</body>
</html>
