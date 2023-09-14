<?php

session_start();
require_once ('config.php');

$email="";
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
    }


}

$stmt = $conn->prepare("SELECT * FROM loginrol WHERE email =?");
$stmt-> execute([$email]);
$user =$stmt-> fetch(PDO::FETCH_ASSOC);



if ($user) {
    // User found by email
    if ($password === $user['password']) {
        if (isset($user['userID'])) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['email'] = $user['email'];
            header('Location: admin.php');
            exit();
        }
    } else {
        $error = "Wrong Username and or Password";
    }
}
?>
<title>Title</title>;
</head>
<body>
<?php if (isset($error)) { echo "<p>$error</p>"; } ?>
<h1></h1>
<form  method="POST">
    <input type="text" name= "email" id="email" value="" required>
    <input type= "password" name="password" id="password" value="">
    <input type="submit" name="knop" id ="knop" value="login">
</form>

<p><a href="Loginrol.php?loguit">Uitloggen </p>
</body>
</html>