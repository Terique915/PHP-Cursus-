<?php


session_start();
$servername = "localhost";
$username = "id20296794_phpschool";
$password = "f@egLCkL11[E=KXi";
$dbname = "id20296794_schoolphp";
$email = $_POST["email"];
$pass= $_POST["password"];
$user=["Admin","User"];

try {
    $conn = new PDO("mysql:host=$servername; port=3308; dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
$query= ("SELECT email, password,rol FROM loginrol WHERE email = '$email' AND  password = '$pass' AND rol ='$user'");
$Results= $conn->query($query);
$Results->execute() or die("ERROR 2");



try {
    $conn = new PDO("mysql:host=$servername; port=3308; dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
$query= ("SELECT email, password,rol FROM loginrol WHERE email = '$email' AND  password = '$pass' AND rol ='$user'");
$Results= $conn->query($query);
$Results->execute() or die("ERROR 2");


while($row = $Results->fetch()) {
    if ($_POST['email'] == $email && $_POST['password'] == $pass) {
        $result = true;
        break 1;
    }

    if (isset($POST["knop"])){
        if ($result = true){
            if ($user == 'Admin'){
                header('location: Admin.php');
            }
            else{
                header('location:user.php');
            }
        }
    }


}
?>

    <title>Title</title>
</head>
<body>
<h1></h1>
<form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="post">
    <input type="text" name= "usernaam" id="usernaam" value="">
    <input type= "password" name="pwd" value="">
    <input type="submit" name="knop" value="login">
</form>

<p><a href="Login.php?loguit">Uitloggen </p>
</body>
</html>