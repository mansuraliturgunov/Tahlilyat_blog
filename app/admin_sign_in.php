<?php
require('./includes/database.php');

$login = 'admin';
$parol = 'admin';

if (isset($_GET['exit'])) {
    $_SESSION['successful'] = "Endi siz oddiy User siz!";
    unset($_SESSION['admin']);
    unset($_GET['exit']);
    header('Location: ./blog.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['admin'] = [
        'login' => $_POST['login'],
        'pass' => $_POST['pass']
    ];

    $admin = $_SESSION['admin'];

    if ($admin['login'] == $login && $admin['pass'] == $parol) {
        $_SESSION['successful'] = "Endi siz adminsiz!";

        header('Location: ./blog.php');
        exit;
    } else {

        unset($_SESSION['admin']);
        $_SESSION['danger'] = "Login yoki parol xato!";

        header('Location: ./admin_sign_in.php');
        exit;
    }
}


$title = 'Admin bo\'lish';
require('./includes/header.php');

?>
<div class="d-flex align-items-center py-4 bg-body-tertiary justify-content-center">


    <form method="POST" action="" style="max-width: 330px; width: 100%; margin: auto;">
        <?php if (isset($_SESSION['danger'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php
                echo $_SESSION['danger'];
                unset($_SESSION['danger']);
                ?>
            </div>
        <?php endif ?>
        <img class="mb-4" src="./photos/favicon.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Admin sign in</h1>
        <div class="form-floating">
            <input name='login' type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label name='login' for="floatingInput">Login</label>
        </div>
        <div class="form-floating mt-2">
            <input name='pass' type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label name='pass' for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; Tahlilyat admin bolib kirish</p>
    </form>


</div>


<?php

require('./includes/footer.php');

?>