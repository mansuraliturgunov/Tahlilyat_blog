<?php
require('./includes/database.php');
$title = 'Post Viev';
require('./includes/header.php');

$id = $_GET['id'];

$steitement = $pdo->prepare('SELECT * FROM tahlilyat WHERE id = ?');
$steitement->execute([$id]);

$post = $steitement->fetch();


?>



<div class="col-lg-8 mx-auto p-4 py-md-5 ">
    <img src="https://static4.tgstat.ru/channels/_0/60/603ecb6f19c49c980b38e5240b856145.jpg" alt="" class="bd-placeholder-img card-img-top" preserveAspectRatio="xMidYMid slice" role="img" >

    <h1 class="text-body-emphasis"><?= $post["title"] ?></h1>
    <p class="fs-5 col-md-8"><?= $post["body"] ?></p>
    <small class="text-body-secondary"><?= $post['created_at'] ?></small>
    <hr class="col-3 col-md-2 mb-5">

    <div class="mb-5 mt-5">
        <a href="./blog.php" class="btn btn-primary btn-lg px-4">Yangi Postlar</a>
    </div>

</div>
<?php
require('./includes/footer.php');

?>