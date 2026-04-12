<?php
require('./includes/database.php');

$id = $_GET['id'];

$statement = $pdo->prepare('SELECT * FROM tahlilyat WHERE id = ?');
$statement->execute([$id]);
$post = $statement->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PUT'])) {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    $statement = $pdo->prepare('UPDATE tahlilyat  SET title = :title, body = :body WHERE id = :id ');
    $statement->execute([
        'id' => $post_id,
        'title' => $title, 
        'body' => $body
    ]);

    $_SESSION['successful'] = "Post Muofaqiyatli Tahrirlandi!";
    header("Location: ./blog.php");
    exit;
}




$title = 'Post Yaratish';
require('./includes/header.php');
?>
<div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
        <img width="40" class="me-2" viewBox="0 0 118 94" role="img" src="./photos/favicon.png" alt="">
        <span class="fs-4">Postni Tahrirlash</span>
    </header>
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <form action="" method="POST">
            <div class="container-fluid py-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Post Sarlavhasi</label>
                    <input required="text" name='title' class="form-control" id="exampleFormControlInput1" placeholder="Post Sarlavhasi" value="<?= $post['title'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post Matni</label>
                    <textarea require class="form-control" name='body' id="exampleFormControlTextarea1" rows="3"> <?= $post['body'] ?> </textarea>
                </div>

                    <input type="hidden" name="PUT">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">

                <button class="btn btn-primary" type="submit">Saqlash</button>
                <a class="btn btn-primary" href="./blog.php">Orqaga</a>

            </div>
        </form>
    </div>

</div>


<?php
require('./includes/footer.php');
?>