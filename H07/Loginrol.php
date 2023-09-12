<?php

session_start();
require_once ('config.php');
$servername = "localhost";
$username = "id20296794_phpschool";
$password = "f@egLCkL11[E=KXi";
$dbname = "id20296794_schoolphp";


try {
    $conn = new PDO("mysql:host=$servername; port=3308; dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
if (isset($_POST['knop'])) {
    $rol = "Admin";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role ="User";
if (empty($email || empty($pass))) {
    echo "full in required fields";
}
else{
        $query = "SELECT * FROM loginrol WHERE email = '$email' AND password = '$password' AND rol = '$rol' ";
        $statement = $conn->prepare($query);
        $statement->execute(array($email,$password,$rol));


        if ($query->rowCount() >= 1) {
            if($rol== true){
                $_SESSION['user']=$rol ;
                header("location:admin.php");
            }

        }
        else if($rol == false){
           $_SESSION['user']=$role;
            header("location:user.php");
        }

}

}
if (isset($_POST["loguit"])) {
    $_SESSION= array();
    session_destroy();

}

?>

    <title>Title</title>
</head>
<body>
<h1></h1>
<form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="post">
    <input type="text" name= "email" id="email" value="">
    <input type= "password" name="password" id="password" value="">
    <input type="submit" name="knop" id ="knop" value="login">
</form>

<p><a href="Loginrol.php?loguit">Uitloggen </p>
</body>
</html>