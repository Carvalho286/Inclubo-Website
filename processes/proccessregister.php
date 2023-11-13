<?php
session_start();

//connexão à BD;
$sname= "localhost";
$unmae= "root";
$password= "localhostMiguel";

$db_name= "empresa";

$conn= mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection Failed";

}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rePassword'])) {
    function validate($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $rePassword = validate($_POST['rePassword']);

    //filtraçoes
    $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $rePassword = filter_var($rePassword, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rePassword = filter_var($rePassword, FILTER_SANITIZE_STRING);

    $passwordFilter = '/^(?=.*[!@#$%^&*.-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';
    $onlyTextMin3 = '/^(?=.*[A-Z])(?=.*[a-z]).{3,20}$/';


    if (empty($name)) {
        header("Location: ../pages/register.php?error=Didn't fill out the Name");
        exit();
    } else if (empty($email)) {
        header("Location: ../pages/register.php?error=Didn't fill out the Email");
        exit();
    } else if (empty($password)) {
        header("Location: ../pages/register.php?error=Didn't fill out the Password");
        exit();
    } else if (empty($rePassword)) {
        header("Location: ../pages/register.php?error=Didn't fill out the Repeated Password");
        exit();
    } else {
        if (preg_match($onlyTextMin3, $name)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if ($password == $rePassword) {
                        if (preg_match($passwordFilter, $password)) {
                            $queryCheckEmail = "SELECT * FROM users WHERE email='$email'";
                            $resultCheckEmail = mysqli_query($conn, $queryCheckEmail);
                            if (mysqli_num_rows($resultCheckEmail) > 0) {
                                header("Location: ../pages/register.php?error=Email já em uso");
                                exit();
                            } else {
                                $hashedPassword = md5($password);
                                $sql = "INSERT INTO users(name, email, password, role, active) VALUES('$name', '$email', '$hashedPassword', 'User', 1)";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    header("Location: ../pages/login.php?success=Account created successfully");
                                    exit();
                                } else {
                                    header("Location: ../pages/register.php?error=ERROR");
                                    exit();
                                }
                            }
                        } else {
                            header("Location: ../pages/register.php?error=Password needs at least 1 number, 1 Uppercase letter and 1 special character");
                            exit();
                        }
                    } else {
                        header("Location: ../pages/register.php?error=Passwords are not the same");
                        exit();
                    }
            } else {
                header("Location: ../pages/register.php?error=This is the incorrect format of an email");
                exit();
            }
        } else {
            header("Location: ../pages/register.php?error=Name needs to have at least 3 characters");
            exit();
        }
    }
} else {
    header("Location: ../pages/register.php");
    exit();
}