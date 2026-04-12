<?php
require('./includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['DELETE'])) {

    $post_id = $_POST["id"];

    $statement = $pdo->prepare('DELETE FROM  tahlilyat WHERE id = ?');
    $statement->execute([$post_id]);

    $_SESSION['successful'] = "Post Muofaqiyatli O'chirildi!";

    header("Location: blog.php");
    exit;
}

$title = 'POSTLAR';
require('./includes/header.php');

$statement = $pdo->prepare('SELECT * FROM tahlilyat');
$statement->execute();

$posts = $statement->fetchAll();




?>
<section class="py-5 text-center container mt-5">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Haftaning Top Yangiliklar</h1>
            <p class="lead text-body-secondary">Bu sahifada shu haftada xit bolaytga kinolarni tahlil qilib chiqamiz</p>
            <p>
                <a href="./post_create.php" class="btn btn-primary my-2">Yangi Post Yaratish</a>
            </p>
            <?php if (isset($_SESSION['successful'])): ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['successful'];
                    unset($_SESSION['successful']);
                    ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</section>
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($posts as $post): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://static4.tgstat.ru/channels/_0/60/603ecb6f19c49c980b38e5240b856145.jpg" alt="" class="bd-placeholder-img card-img-top" preserveAspectRatio="xMidYMid slice" role="img">
                        <div class="card-body">
                            <a class="nav-link" href="./post.php?id=<?= $post['id'] ?>">
                                <h5> <?= $post["title"] ?> </h5>
                            </a>
                            <p class="card-text"> <?= $post["body"] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">

                                    <a class="btn btn-sm btn-outline-secondary" href="./post_edit.php?id=<?= $post['id'] ?>">Edit</a>

                                    <form action="" method="POST" onSubmit="return confirm('Rosdan ham postni ochirmoqchimisz?')">
                                        <input type="hidden" name="DELETE">
                                        <input type="hidden" name="id" value="<?= $post['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">DELET</button>
                                    </form>

                                </div>
                                <small class="text-body-secondary"><?= $post['created_at'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php

require('./includes/footer.php');

?>