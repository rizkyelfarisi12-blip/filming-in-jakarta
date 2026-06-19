<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "includes/db.php";

$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE username='$username' LIMIT 1"
    );

    if(mysqli_num_rows($query)>0){

        $user = mysqli_fetch_assoc($query);

        if(password_verify($password,$user['password'])){

            $_SESSION['user_id']   = $user['id'];
            $_SESSION['name']      = $user['name'];
            $_SESSION['role']      = $user['role'];

            header("Location: dashboard.php");
            exit;
        }
    }

    $error = "Username atau password salah";
}
?>

<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

    body{
        background:#f5f6fa;
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
    }

    .login-box{
        width:420px;
        background:white;
        padding:40px;
        border-radius:16px;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
    }

    .logo{
        text-align:center;
        margin-bottom:25px;
    }

    .logo h2{
        font-weight:700;
        color:#f15d30;
    }

    </style>

    </head>

    <body>

    <div class="login-box">

        <div class="logo">
            <h2>Filming In Jakarta</h2>
            <p>Admin Panel</p>
        </div>

        <?php if($error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">
                <label>Username</label>
                <input
                    type="text"
                    name="username"
                    class="form-control"
                    required
                >
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required
                >
            </div>

            <button class="btn btn-primary w-100">
                Login
            </button>

        </form>

    </div>

    </body>
</html>