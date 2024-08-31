<?php
require_once './core/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE ?> | Call Us - Doctor Profile</title>
    <?php include './includes/css_links.php'; ?>
    <link rel="stylesheet" href="./css/style.min.css">
    <style>
        /* General Page Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container Styles */
        .container-page {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Doctor Profile Section */
        .profile {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h2 {
            margin: 0;
            font-size: 28px;
            color: #005772;
        }

        .profile-info p {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
        }

        /* Contact Info Section */
        .contact-info {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .contact-info h3 {
            margin: 0;
            font-size: 20px;
            color: #005772;
        }

        .contact-info p {
            margin: 10px 0;
            font-size: 16px;
        }

        /* Availability Section */
        .availability {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .availability-card {
            flex: 1;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 8px;
            text-align: center;
            margin-right: 10px;
        }

        .availability-card:last-child {
            margin-right: 0;
        }

        .availability-card h4 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }

        .availability-card p {
            margin: 10px 0;
            font-size: 16px;
            color: #666;
        }
        .availability-card button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .availability-card button:hover {
            background-color: #45a049;
        }

        /* Unavailability Section */
        .unavailability {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .unavailability-card {
            flex: 1;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 8px;
            text-align: center;
            margin-right: 10px;
        }

        .unavailability-card:last-child {
            margin-right: 0;
        }

        .unavailability-card h4 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }

        .unavailability-card p {
            margin: 10px 0;
            font-size: 16px;
            color: #666;
        }
        .unavailability-card button {
            padding: 10px 20px;
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .unavailability-card button:hover {
            background-color: #ff0000;
        }
    </style>
</head>

<body class="menu_page">
    <?php include_once './includes/header.php'; ?>

    <div class="container-page">

        <!-- Doctor Profile Section -->
        <div class="profile">
            <img src="./img/doc.jpg" alt="Doctor Photo">
            <div class="profile-info">
                <h2>Dr. Mohammed Omar</h2>
                <p>Cardiologist</p>
                <p>Riyadh</p>
            </div>
        </div>

        <!-- Contact Info Section -->
        <div class="contact-info">
            <h3>Contact Information</h3>
            <p>Email: Dr. Mohammed Omar@example.com</p>
            <p>Phone: (123) 456-7890</p>
            <p>Address: 123 Main Street, Riyadh, 10001</p>
        </div>

        <!-- Availability Section -->
        <div class="availability">
            <div class="availability-card">
                <h4>Today</h4>
                <p>9:00 AM - 5:00 PM</p>
                <button>Available</button>
            </div>
            <div class="unavailability-card">
                <h4>Tomorrow</h4>
                <p>10:00 AM - 6:00 PM</p>
                <button>Unavailable</button>
            </div>
        </div>

    </div>

    <?php include './includes/js_links.php'; ?>

    <script>/*
        $(document).ready(function() {
            $.ajax({
                url: 'ajax/products_by_category.php',
                beforeSend: function() {
                    $('.filter_container').addClass('loading');
                },
                success: function(response) {
                    $('.filter_container').removeClass('loading');
                    $(".filter_container").html(response);
                }

            });

            // filter by ID
            $(document).on('click', '.filter_btn', function(e) {
                let filter_id = $(this).data('filter');
                $.ajax({
                    url: 'ajax/products_by_category.php',
                    method: 'post',
                    data: {
                        filter_id: filter_id
                    },
                    beforeSend: function() {
                        $('.filter_container').addClass('loading');
                    },
                    success: function(response) {
                        $('.filter_container').removeClass('loading');
                        $(".filter_container").html(response);
                    }

                });
            });

            // filter by dropDown
            $(document).on('change', 'select[name="filter_"]', function(e) {
                let filter_id = $(this).val();
                $.ajax({
                    url: 'ajax/products_by_category.php',
                    method: 'post',
                    data: {
                        filter_id: filter_id
                    },
                    beforeSend: function() {
                        $('.filter_container').addClass('loading');
                    },
                    success: function(response) {
                        $('.filter_container').removeClass('loading');
                        $(".filter_container").html(response);
                    }

                });
            });

            $(document).on("click", ".cafe-info", function(e) {
                e.preventDefault();
                $('#cafeInfoModal').modal('show');
                let cafeID = $(this).data("id");
                $.ajax({
                    url: 'ajax/cafe_info.php',
                    method: 'post',
                    data: {
                        cafeID_modal: cafeID
                    },
                    success: function(response) {
                        let res = JSON.parse(response);
                        $(".cafeName").html(res.cafeName);
                        $("#ownerName").html(res.ownerName);
                        $("#ownerPhone").html(res.ownerPhone);
                        $("#shopLocation").html(res.shopLocation);
                        $("#shopOpen").html('open: ' + res.shopOpen);
                        $("#shopClose").html('close: ' + res.shopClose);
                    }
                });
            });
        });*/
    </script>
</body>

</html>