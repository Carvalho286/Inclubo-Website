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

$numberOfWrongs = $_GET['count'];
$userId = 0;
$userEmail = $_POST['email'];
$getId = "SELECT id FROM users WHERE email = '$userEmail'";
$resultGetId = $conn->query($getId);


if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    //filtrações
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $passwordFilter = '/^(?=.*[!@#$%^&*.-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';

    if (empty($email)) {
        header("Location: ../pages/login.php?error=Didn't fill the Email");
        exit();
    } else if (empty($password)) {
        header("Location: ../pages/login.php?error=Didn't fill the Password");
        exit();
    } else if (preg_match($passwordFilter, $password)) {
        $hashedPassword = md5($password);
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $hashedPassword) {
                if ($row['active'] == 1) {
                    if ($row['role'] == 'User') {
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['email']  = $row['email'];
                        if (!empty($_POST['remember_check'])) {
                            $remember_check = $_POST['remember_check'];

                            $key = 'Hipopotamo';
                            $encryptedText = openssl_encrypt($password, 'aes-256-cbc', $key);

                            setcookie('email', $email, time()+(86400*30), "/" );
                            setcookie('password', $encryptedText, time()+(86400*30), "/");
                            setcookie('userLogin', $remember_check, time()+(86400*30), "/");
                        } else {
                            setcookie('email', $email, time()+1);
                            setcookie('password', $hashedPassword,  time()+1);
                        }
                        header("Location: ../indexlogged.php");
                        exit();
                    } else {
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['email']  = $row['email'];
                        $_SESSION['role'] = $row['role'];
                        if (!empty($_POST['remember_check'])) {
                            $remember_check = $_POST['remember_check'];

                            $key = 'Hipopotamo';
                            $encryptedText = openssl_encrypt($password, 'aes-256-cbc', $key);

                            setcookie('email', $email, time()+(86400*30), "/" );
                            setcookie('password', $encryptedText, time()+(86400*30), "/");
                            setcookie('userLogin', $remember_check, time()+(86400*30), "/");
                        } else {
                            setcookie('email', $email, time()+1);
                            setcookie('password', $hashedPassword,  time()+1);
                        }
                        header("Location: ../indexadmin.php");
                        exit();
                    }
                } else {
                    header("Location: ../pages/login.php?error=Account is desactivated");
                    exit();
                }
            } else {
            }
        } else {
            while($numberOfWrongs < 4) {
                $numberOfWrongs++;
                if ($numberOfWrongs == 3) {
                    header("Location: ../pages/login.php?error=Email or Password incorrect! 2 more tries before account block!&&count=$numberOfWrongs");
                    exit();
                } else if ($numberOfWrongs == 4) {
                    header("Location: ../pages/login.php?error=EEmail or Password incorrect! 1 more try before account block!&&count=$numberOfWrongs");
                    exit();
                } else {
                    header("Location: ../pages/login.php?error=Email or Password incorrect!&&count=$numberOfWrongs");
                    exit();
                }
            };
            $sql = "UPDATE users SET active = 0 WHERE id = '$userId'";
            $result = $conn->query($sql);
            if ($result) {
                header("Location: ../pages/login.php?error=The account has been blocked.&&count=$numberOfWrongs");
                exit();
            } else {
                header("Location: ../pages/login.php?error=Account block not successfull");
                exit();
            }
        }
    } else {
        while($numberOfWrongs < 4) {
            $numberOfWrongs++;
            if ($numberOfWrongs == 3) {
                header("Location: ../pages/login.php?error=Email or Password incorrect! 2 more tries before account block!&&count=$numberOfWrongs");
                exit();
            } else if ($numberOfWrongs == 4) {
                header("Location: ../pages/login.php?error=EEmail or Password incorrect! 1 more try before account block!&&count=$numberOfWrongs");
                exit();
            } else {
                header("Location: ../pages/login.php?error=Email or Password incorrect!&&count=$numberOfWrongs");
                exit();
            }
        };
        $sql = "UPDATE users SET active = 0 WHERE id = '$userId'";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: ../pages/login.php?error=The account has been blocked.&&count=$numberOfWrongs");
            exit();
        } else {
            header("Location: ../pages/login.php?error=Account block not successfull");
            exit();
        }
    }
} else {
    echo "fds";
}
