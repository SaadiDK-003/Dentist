<?php
require_once './core/database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE ?> | Choose Your Doctor</title>
    <?php include './includes/css_links.php'; ?>
    <link rel="stylesheet" href="./css/style.min.css">
    <style>
        /* Basic Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        header {
            background-color: #005772;
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Search Bar Section */
        .search-container {
            padding: 20px;
            text-align: center;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .search-container input[type="text"] {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .search-container button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Filters Section */
        .filters {
            display: flex;
            justify-content: center;
            padding: 20px;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }

        .filters select {
            margin: 0 10px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Doctor Profiles Section */
        .doctor-profiles {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .doctor-card {
            display: flex;
            align-items: center;
            background-color: white;
            margin: 15px;
            padding: 20px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .doctor-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .doctor-card h3 {
            margin: 10px 0;
            color: #005772;
        }

        .doctor-card p {
            color: #666;
        }

        .doctor-card button {
            margin-top: 10px;
            padding: 10px;
            font-size: 16px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .search-container input[type="text"] {
                width: 100%;
                margin-bottom: 10px;
            }

            .filters {
                flex-direction: column;
                align-items: center;
            }

            .filters select {
                margin: 10px 0;
            }
        }
    </style>
</head>

<body class="menu_page">
    <?php include_once './includes/header.php'; ?>
    <!-- Header Section -->
    <header>
        <h1>Choose Your Doctor</h1>
        <p>Find the right doctor for you</p>
    </header>

    <!-- Search Bar Section -->
    <div class="search-container">
        <input type="text" placeholder="Search by name, specialty, or location...">
        <button type="button">Search</button>
    </div>

    <!-- Filters Section -->
    <div class="filters">
        <select>
            <option value="all">All Specialties</option>
            <option value="cardiology">Cardiology</option>
            <option value="dermatology">Dermatology</option>
            <option value="neurology">Neurology</option>
            <option value="pediatrics">Pediatrics</option>
        </select>

        <select>
            <option value="all">All Locations</option>
            <option value="new-york">Riyadh</option>
            <option value="los-angeles">Baha</option>
            <option value="Bisha">Bisha</option>
            <option value="makkah">makkah</option>
        </select>

        <select>
            <option value="all">Any Rating</option>
            <option value="4+">4+ Stars</option>
            <option value="3+">3+ Stars</option>
            <option value="2+">2+ Stars</option>
        </select>
    </div>

    <!-- Doctor Profiles Section -->
    <div class="doctor-profiles">
        <!-- Doctor Card -->
        <div class="doctor-card">
            <img src="./img/doc.jpg" alt="Doctor Photo">
            <h3>Dr. Mohammed Omar</h3>
            <p>Cardiologist | Riyadh</p>
            <p>★★★★★</p>
            <a href="callus.php"><button type="button">View Profile</button></a>
        </div>

        <div class="doctor-card">
            <img src="./img/doc.jpg" alt="Doctor Photo">
            <h3>Dr. Ahmad Omar</h3>
            <p>Dermatologist | Baha</p>
            <p>★★★★☆</p>
            <a href="callus.php"><button type="button">View Profile</button></a>
        </div>

        <!-- Add more doctor cards as needed -->
    </div>

</body>

</html>