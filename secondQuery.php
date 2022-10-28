<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>secondQuery</title>
    <link rel="stylesheet" href="secondQuery.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="nav">
        <div class="menu" id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="firstQuery.php">firstQuery</a></li>
                <li><a href="secondQuery.php">secondQuery</a></li>
                <li><a href="thirdQuery.php">thirdQuery</a></li>
            </ul>
        </div>
        <div class="bar">
            <a class="fa fa-bars" id="bars" onclick="responsive()" style="cursor: pointer;"></a>
        </div>
    </div>
    <script src="nav.js"></script>
    <?php
        $con = mysqli_connect("localhost", "shaunak", "mysqlPassword", "IWP");
        if ($con === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql1 = "UPDATE student SET comment = 'Slow Learner' WHERE internal < (SELECT AVG(internal) FROM student)";
        $result2 = mysqli_query($con, $sql1);
        if ($result2) {
            echo '<script>alert("Database updated successfully")</script>';
        }
        $sql = "SELECT name, regno, course, comment FROM student WHERE internal < (SELECT AVG(internal) FROM student)";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<center><table cellpadding=10px><tr><th>Name</th><th>RegNo</th><th>Course</th><th>Comment</th></tr>";
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>";
            }
            echo "</table></center>";
        } else {
            echo "<h2>No results found.</h2>";
        }
    ?>
</body>

</html>