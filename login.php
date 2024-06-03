<html>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pword = $_POST['pword'];
    
    $connection = mysqli_connect("localhost", "root", "") or die("couldnt connect to server");
    $db = mysqli_select_db($connection, "12b4") or die("couldnt connect to database");
    $query = "select * from userlogin where username='$name' and pword='$pword'";
    $result = mysqli_query($connection, $query) or die("query failed: " . mysqli_error($connection));
    
    if (mysqli_num_rows($result) > 0) {
        echo "hii, ", $name, " Login Succesful", "<br>";
        // Redirect to html.html
        header("Location: html.html");
        exit(); // Ensure that script stops execution after redirection
    } else {
        echo "Invalid user";
    }
    
    mysqli_close($connection);
}
?>
</body>
</html>

