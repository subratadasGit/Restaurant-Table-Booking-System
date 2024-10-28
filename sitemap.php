<?php include_once('admin/includes/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap</title>
    <link href="https://cdn.tailwindcss.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #4a148c; /* Deep purple background */
            color: white;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
            overflow: hidden;
        }
        .container {   
            max-width: 800px;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            backdrop-filter: blur(10px); /* Glassmorphism effect */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        h2 {
            font-size: 1.8rem;
            margin-top: 1.5rem;
        }
        p, ul {
            font-size: 1.1rem;
        }
        a {
            text-decoration: none;
            color: #e1bee7;
            transition: color 0.3s;
        }
        a:hover {
            color: #f8bbd0;
        }
        footer {
            margin-top: 2rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Sitemap</h1>
        <p class="text-center mb-6">Welcome to the Sitemap of The One And Only Cafe!</p>

        <h2><i class="fas fa-user-shield"></i> Admin</h2>
        <p>The admin has full access to the system, including managing bookings, viewing reports, and configuring settings.</p>

        <h2><i class="fas fa-user-tie"></i> Sub-Admin</h2>
        <p>The sub-admin has limited access. They can view bookings and make modifications but cannot access sensitive settings.</p>

        <h2><i class="fas fa-info-circle"></i> Landing Page Info</h2>
        <ul class="list-disc list-inside">
            <li><i class="fas fa-home"></i> Home: Overview of the cafe, including featured items.</li>
            <li><i class="fas fa-utensils"></i> Menu: Detailed menu items available for customers.</li>
            <li><i class="fas fa-calendar-check"></i> Reservation: Customers can book tables.</li>
            <li><i class="fas fa-check-circle"></i> Check Booking: Customers can verify their bookings.</li>
            <li><i class="fas fa-envelope"></i> Contact: Ways to reach out to the cafe.</li>
        </ul>
        
        <footer>
            <a href="index.php" class="bg-purple-900 text-white px-4 py-2 rounded hover:bg-purple-700">Back to Home</a>
        </footer>
    </div>
</body>
</html>
