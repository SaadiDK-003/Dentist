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

        /* Label Styles */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        /* Input and Select Styles */
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Button Styles */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #6c757d;
        }
    </style>
</head>

<body class="home_page">

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
                            <input type="text" id="searchQuery" name="searchQuery" placeholder="Search A Clinic">

                            <!-- Dropdown List -->
                            <select id="category" name="category">
                                <option value="all">Choose the Area</option>
                                <option value="riyadh">Riyadh</option>
                                <option value="baha">Baha</option>
                                <option value="biesha">Biesha</option>
                            </select>

                            <!-- Text Box -->
                            <input type="text" id="WAYLF" name="WAYLF" placeholder="What are you looking for?">

                            <!-- Search Button -->
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer></footer>


    <?php include './includes/js_links.php'; ?>
    <!-- <script src="js/jquery.bs.calendar.min.js"></script> -->
    <!-- <script src="js/calendar.js"></script> 
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.hero-content h1.smoke-text').addClass('smoke');
            }, 2800);

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                nav: false,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>-->
</body>

</html>