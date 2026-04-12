<?php
require('./includes/database.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $body = $_POST['body'];

    $statement = $pdo->prepare('INSERT INTO tahlilyat (title, body) VALUES (?, ?)');
    $statement->execute([$title, $body]);

    $_SESSION['successful'] = "Post Muofaqiyatli Yaratildi!";
    header("Location: ./blog.php");
}




$title = 'Post Yaratish';
require('./includes/header.php');
?>
<div class="container py-4 mt-5">
    <header class="pb-3 mb-4 border-bottom">
        <img width="40" class="me-2" viewBox="0 0 118 94" role="img" src="./photos/favicon.png" alt="">
        <span class="fs-4">Yangi Post Yaratish</span>
    </header>
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <form action="" method="POST">
            <div class="container-fluid py-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Post Sarlavhasi</label>
                    <input required="text" name='title' class="form-control" id="exampleFormControlInput1" placeholder="Post Sarlavhasi">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post Matni</label>
                    <textarea require class="form-control" name='body' id="exampleFormControlTextarea1" rows="3" placeholder="Post Matni"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Saqlash</button>
                <a class="btn btn-primary" href="./blog.php">Orqaga</a>
            </div>
        </form>
    </div>

</div>


<?php
require('./includes/footer.php');
?>