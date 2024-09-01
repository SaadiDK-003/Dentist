<?php
require_once 'core/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE ?> | About</title>
    <?php include './includes/css_links.php'; ?>
    <link rel="stylesheet" href="./css/style.min.css">
    <style>
        /* General Form Styles */
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="clinic_page">

    <?php include_once './includes/header.php'; ?>
    <main>
        <section class="hero">
            <div class="container">
                <div class="content hero-about-content">
                    <h1>About</h1>
                    <h1>Welcome To Our My Doctor Clinic</h1>
                    <a href="#findClinicForm" class="btn btn-secondary btn-lg btn-block">Find A Clinic</a>
                </div>
            </div>
        </section>
        <!-- Search Form -->

        <section class="find-clinic">
            <div class="container my-5">
                <div class="row">
                    <h4 class="text-center">Find A Clinic</h4>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mx-auto">
                        <form id="findClinicForm">
                            <!-- Text Box -->
                            <select id="search_clinic" name="search_clinic" class="form-select mb-3">
                                <option value="" selected hidden>Select Clinic</option>
                                <?php
                                $clinic_Q = $db->query("SELECT * FROM `clinic` WHERE `status`='1'");
                                while ($clinic_list = mysqli_fetch_object($clinic_Q)):
                                ?>
                                    <option value="<?= $clinic_list->id ?>"><?= $clinic_list->clinic_name ?></option>
                                <?php endwhile; ?>
                            </select>

                            <!-- Dropdown List -->
                            <select id="category" name="category" class="form-select mb-3">
                                <option value="all">Choose the Area</option>
                                <option value="riyadh">Riyadh</option>
                                <option value="baha">Baha</option>
                                <option value="biesha">Biesha</option>
                            </select>

                            <!-- Search Button -->
                            <button type="submit" class="btn btn-secondary w-100">Search</button>
                        </form>
                    </div>
                </div>
                <div id="render_list" class="render_list">
                </div>
            </div>
        </section>

    </main>
    <footer></footer>


    <?php include './includes/js_links.php'; ?>
    <script>
        $(document).ready(function() {
            $('#search_clinic').on('change', function(e) {
                e.preventDefault();
                let clinic_id = $(this).val();

                $.ajax({
                    url: 'ajax/clinic_info.php',
                    method: 'post',
                    data: {
                        clinic_id: clinic_id
                    },
                    success: function(res) {
                        $("#render_list").html(res);
                    }
                })

            })
        });
    </script>
</body>

</html>