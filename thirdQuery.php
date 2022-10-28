<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thirdQuery</title>
    <link rel="stylesheet" href="thirdQuery.css">
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
    <script src="script.js"></script>
    <?php
    $con = mysqli_connect("localhost", "shaunak", "mysqlPassword", "IWP");
    if ($con === false) {
        die("ERROR: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM student";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<center><table cellpadding=10px><tr bgcolor='teal'><th>Name</th><th>RegNo</th><th>Course</th><th>Course Code</th><th>Internal Marks</th><th>Comment</th></tr>";
        while ($row = mysqli_fetch_row($result)) {
            if ($row[4] < 25) {
                echo '<tr bgcolor="red"><td>' . $row[0] .
                    "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td></tr>";
            } elseif ($row[4] > 45) {
                echo '<tr bgcolor="green"><td>' . $row[0] .
                    "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td></tr>";
            } else {
                echo "<tr bgcolor='teal'><td>" . $row[0] .
                    "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td></tr>";
            }
        }
        echo "</table></center>";
    } else {
        echo "<h2>No results found.</h2>";
    }
    ?>
</body>

</html>