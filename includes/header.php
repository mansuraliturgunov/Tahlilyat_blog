<?php




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href='./CSS/style.css' rel="stylesheet">
    <link href='./CSS/style2.css' rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./photos/favicon.png">

    <title><?= $title ?? 'Tahliliyat' ?> </title>
    <style>
        .card-body p {
            display: -webkit-box;
            line-clamp: 4;
            -webkit-line-clamp: 4;
            /* Necha qator ko'rinishini shu yerda belgilaysan */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

    </style>
</head>

<body>
    <?php require('thema.php') ?>

    <header data-bs-theme="dark">
        <?php require('navbar.php') ?>
    </header>

    <main>