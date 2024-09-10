<?php
require_once 'core/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE ?> | Home</title>
    <?php include './includes/css_links.php'; ?>
    <link rel="stylesheet" href="./css/style.min.css">
</head>

<body class="home_page">

    <?php include_once './includes/header.php'; ?>
    <main>
        <section class="hero">
            <div class="container">
                <div class="content hero-content">
                    <h1>MY DOCTOR CLINIC</h1>
                    <div class="text-center">
                            <h2 class="text-center text-white">Browse Your Doctors</h2>
                            <a href="doctors.php" class="btn btn-primary">Browse Your Doctors</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer></footer>


    <?php include './includes/js_links.php'; ?>

</body>

</html>