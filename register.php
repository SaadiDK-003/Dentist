<?php
require_once './core/database.php';
if (isLoggedin() === true) {
    header('Location: ./');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE ?> | Sign Up</title>
    <?php include './includes/css_links.php'; ?>
    <link rel="stylesheet" href="./css/style.min.css">
</head>

<body class="register_page">
    <?php include_once './includes/header.php'; ?>
    <main>
        <section class="Sign Up">
            <div class="container my-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1><?= TITLE ?> | Sign Up</h1>
                    </div>
                    <div class="col-10 col-md-6 mx-auto">
                        <?php
                        if (isset($_POST['submit'])) :
                            echo register($_POST);
                        ?>
                        <?php endif; ?>

                        <div class="row my-3">
                            <div class="col-12 col-md-4 mx-auto">
                                <select name="select-form" id="select-form" class="form-select">
                                    <option value="patient">Patient</option>
                                    <option value="doctor">Doctor</option>
                                </select>
                            </div>
                        </div>
                        <!-- Patient Form -->
                        <div class="patient-form">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Patient Name</label>
                                            <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" id="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" id="username" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="phone">Mobile</label>
                                            <input type="tel" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" id="phone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" title="Must be at least 6 character" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="re-password">Re-Password</label>
                                            <input type="password" name="re_password" id="re-password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="text" name="age" id="age" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="diseases">Diseases</label>
                                            <input type="text" name="diseases" id="diseases" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 mb-3 d-flex align-items-end">
                                        <div class="form-group d-flex gap-2 justify-content-end w-100">
                                            <!--<a href="./login.php" class="btn btn-secondary order-0 order-md-1">login</a>-->
                                            <input type="hidden" name="user_type" value="patient">
                                            <button type="submit" name="submit" id="submit" class="btn btn-success">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Doctor Form -->
                        <div class="doctor-form d-none">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Doctor Name</label>
                                            <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" id="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" id="username" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="phone">Mobile</label>
                                            <input type="tel" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" id="phone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" title="Must be at least 6 character" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="re-password">Re-Password</label>
                                            <input type="password" name="re_password" id="re-password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="text" name="age" id="age" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="certificate">Certificate</label>
                                            <input type="text" name="certificate" id="certificate" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="experience">Experience</label>
                                            <input type="text" name="experience" id="experience" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 d-flex align-items-end">
                                        <div class="form-group d-flex gap-2 justify-content-end w-100">
                                            <!--<a href="./login.php" class="btn btn-secondary order-0 order-md-1">login</a>-->
                                            <input type="hidden" name="user_type" value="doctor">
                                            <button type="submit" name="submit" id="submit" class="btn btn-success">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <?php include './includes/js_links.php'; ?>

    <script>
        $(document).ready(function() {
            $(document).on('change', '#select-form', function() {
                let val = $(this).val();
                if (val == 'patient') {
                    $(".patient-form").removeClass('d-none').next().addClass('d-none');
                } else {
                    $(".doctor-form").removeClass('d-none').prev().addClass('d-none');
                }
            });
        });
    </script>
</body>

</html>