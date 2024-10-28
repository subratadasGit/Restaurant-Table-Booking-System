<?php include_once('admin/includes/config.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['name'];
    $emailid = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $bookingdate = $_POST['bookingdate'];
    $bookingtime = $_POST['bookingtime'];
    $noadults = $_POST['noadults'];
    $nochildrens = $_POST['nochildrens'];
    $bno = mt_rand(100000000, 9999999999);

    $query = mysqli_query($con, "INSERT INTO tblbookings(bookingNo, fullName, emailId, phoneNumber, bookingDate, bookingTime, noAdults, noChildrens) VALUES('$bno', '$fname', '$emailid', '$phonenumber', '$bookingdate', '$bookingtime', '$noadults', '$nochildrens')");

    if ($query) {
        echo '<script>alert("Your order sent successfully. Booking number is ' . $bno . '")</script>';
        echo "<script>document.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Table Booking System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./menu.css">
<link rel="stylesheet" href="./video/video.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-purple-900 text-white shadow-md  top-0 z-10 h-16"> <!-- Fixed height added -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full"> <!-- Height set to full -->
            <div class="flex justify-between h-full items-center"> <!-- Changed from h-16 to h-full -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-2xl font-bold tracking-wide">The One And Only Cafe</a>
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#" class="hover:text-purple-300 transition duration-300">Home</a>
                    <a href="#menu" class="hover:text-purple-300 transition duration-300">Menu</a>
                    <a href="#about" class="hover:text-purple-300 transition duration-300">About</a>
                    <a href="#contact" class="hover:text-purple-300 transition duration-300">Contact</a>
                    <a href="admin/" target="_blank" class="hover:text-purple-300 transition duration-300">Admin Panel</a>
                </div>
                <div class="md:hidden">
                    <button id="menu-toggle" class="focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Booking Form -->
    <div class="appointment-w3 py-10 relative overflow-hidden pt-20"> <!-- Added pt-20 to create space below navbar -->
        <video autoplay muted loop class="video-background">
            <source src="video/3195650-uhd_3840_2160_25fps.mp4" type="video/mp4">
           
        </video>
        <div class="form-overlay"></div>
        <form action="#" method="post" class="max-w-xl mx-auto bg-white p-8 shadow-lg rounded-lg relative z-10">
            <h2 class="text-2xl font-bold text-center mb-6">Reserve a Table</h2>
            <input type="text" name="name" placeholder="Name" required class="w-full px-4 py-2 mb-4 border rounded-lg"/>
            <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 mb-4 border rounded-lg"/>
            <input type="text" name="phonenumber" placeholder="Phone Number" required class="w-full px-4 py-2 mb-4 border rounded-lg"/>
            <input type="date" id="datepicker" name="bookingdate" placeholder="Booking Date" required class="w-full px-4 py-2 mb-4 border rounded-lg"/>
            <input type="text" id="timepicker" name="bookingtime" placeholder="Time" required class="w-full px-4 py-2 mb-4 border rounded-lg"/>
            <select name="noadults" required class="w-full px-4 py-2 mb-4 border rounded-lg">
                <option value="">Number of Adults</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <select name="nochildrens" required class="w-full px-4 py-2 mb-4 border rounded-lg">
                <option value="">Number of Children</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <input type="submit" value="Reserve a Table" name="submit" class="w-full bg-purple-900 text-white py-2 rounded-lg hover:bg-purple-700"/>
        </form>
    </div>

    <!-- Check Booking Section -->
<section id="check-booking" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-4">Check Your Booking</h2>
        <p class="text-gray-600 mb-6">Enter your booking number to check your reservation status.</p>
        <form action="#" method="post" class="max-w-xl mx-auto bg-gray-100 p-8 shadow-lg rounded-lg">
            <input type="text" name="bookingNo" placeholder="Booking Number" required class="w-full px-4 py-2 mb-4 border rounded-lg"/>
            <input type="submit" value="Check Booking" name="check" class="w-full bg-purple-900 text-white py-2 rounded-lg hover:bg-purple-700"/>
        </form>
        
        <?php
        if (isset($_POST['check'])) {
            $bookingNo = $_POST['bookingNo'];

            // Fetch the booking details from the database
            $query = mysqli_query($con, "SELECT * FROM tblbookings WHERE bookingNo = '$bookingNo'");
            if ($query && mysqli_num_rows($query) > 0) {
                $booking = mysqli_fetch_assoc($query);
                echo "<div class='mt-6 bg-white p-4 shadow-md rounded-lg'>";
                echo "<h3 class='text-xl font-bold'>Booking Details:</h3>";
                echo "<p><strong>Name:</strong> " . htmlspecialchars($booking['fullName']) . "</p>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($booking['emailId']) . "</p>";
                echo "<p><strong>Phone Number:</strong> " . htmlspecialchars($booking['phoneNumber']) . "</p>";
                echo "<p><strong>Booking Date:</strong> " . htmlspecialchars($booking['bookingDate']) . "</p>";
                echo "<p><strong>Booking Time:</strong> " . htmlspecialchars($booking['bookingTime']) . "</p>";
                echo "<p><strong>Number of Adults:</strong> " . htmlspecialchars($booking['noAdults']) . "</p>";
                echo "<p><strong>Number of Children:</strong> " . htmlspecialchars($booking['noChildrens']) . "</p>";
                echo "</div>";
            } else {
                echo "<div class='mt-6 bg-red-100 text-red-800 p-4 rounded-lg'>No booking found with that number.</div>";
            }
        }
        ?>
    </div>
</section>



    <!-- Sections -->
    <section id="menu" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-4">Our Menu</h2>
        <p class="text-gray-600 mb-6">Discover the delights of our cuisine.</p>
        
        <!-- Menu Items Grid -->
        <div class="menu-grid">
            <!-- Menu Item 1 -->
            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="https://www.foodiesfeed.com/wp-content/uploads/2023/06/burger-with-melted-cheese.jpg" 
                         alt="Smashy Burger" class="menu-img">
                    <div class="overlay">
                        <h3>The Smashy Burger</h3>
                        <p>120/-</p>
                    </div>
                </div>
            </div>
            
            <!-- Menu Item 2 -->
            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5qytC4oKtyh3Xa6usUbYpYWVOc_C8bJ3UjQ&s" 
                         alt="Classic Italian Pasta" class="menu-img">
                    <div class="overlay">
                        <h3>Classic Italian Pasta</h3>
                        <p>230/-</p>
                    </div>
                </div>
            </div>
            
            <!-- Menu Item 3 -->
            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="https://img.freepik.com/premium-photo/veggie-delight-pizza-round-wooden-board-plate-white-background-directly-view_864588-26635.jpg" 
                         alt="Vegan Delight Pizza" class="menu-img">
                    <div class="overlay">
                        <h3>Vegan Delight Pizza</h3>
                        <p>540/-</p>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="https://content.jdmagicbox.com/comp/def_content_category/momos-foodie-/1-momos-foodie--1-cn4lm.jpg" 
                         alt="Vegan Delight Pizza" class="menu-img">
                    <div class="overlay">
                        <h3>The Crazy Dazzling MOMO</h3>
                        <p>120/-</p>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="https://www.modernhoney.com/wp-content/uploads/2019/08/Classic-Lasagna-14-scaled.jpg" 
                         alt="Vegan Delight Pizza" class="menu-img">
                    <div class="overlay">
                        <h3>The Spectacular Lasagna</h3>
                        <p>370/-</p>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="https://www.licious.in/blog/wp-content/uploads/2016/07/Hot-Dogs.jpg" 
                         alt="Vegan Delight Pizza" class="menu-img">
                    <div class="overlay">
                        <h3>The Tangy HotDog</h3>
                        <p>120/-</p>
                    </div>
                </div>
            </div>
            
            <!-- Add more items as needed -->
        </div>
    </div>
</section>






    <section id="about" class="py-16 bg-gray-200">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">About Us</h2>
            <p class="text-gray-600">Welcome to The One And Only Cafe, a place where tradition meets the unexpected. Nestled in the heart of the city, our cafe is a cozy oasis designed for moments of tranquility, joy, and connection. Here, we believe that food should not only nourish the body but also warm the heart and spark conversations.

Our handpicked ingredients are locally sourced and carefully curated by our talented chefs, bringing you flavors that celebrate the art of fine dining in a relaxed atmosphere. Each dish on our menu tells a story, inspired by seasonal produce, artisanal techniques, and our love for authentic, vibrant flavors.

Whether you're stopping by for a morning coffee, meeting friends for brunch, or unwinding with an evening dessert, The Enchanted Cafe is your destination for unforgettable experiences. Join us, and let us take you on a culinary journey that feels like home.</p>
        </div>
    </section>

    <section id="contact" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-4">Contact Us</h2>
        <p class="text-gray-600 mb-8">We’d love to hear from you!</p>

        <div class="flex flex-col md:flex-row justify-center">
            <!-- Contact Form -->
            <div class="bg-gray-100 shadow-lg rounded-lg p-8 w-full max-w-md mx-auto mb-8 md:mb-0 md:mr-4">
                <h3 class="text-2xl font-semibold mb-4">Get in Touch</h3>
                <form action="#" method="post">
                    <input type="text" name="name" placeholder="Your Name" required class="w-full px-4 py-2 mb-4 border rounded-lg"/>
                    <input type="email" name="email" placeholder="Your Email" required class="w-full px-4 py-2 mb-4 border rounded-lg"/>
                    <textarea name="message" rows="4" placeholder="Your Message" required class="w-full px-4 py-2 mb-4 border rounded-lg"></textarea>
                    <input type="submit" value="Send Message" class="w-full bg-purple-900 text-white py-2 rounded-lg hover:bg-purple-700"/>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="bg-gray-100 shadow-lg rounded-lg p-8 w-full max-w-md mx-auto">
                <h3 class="text-2xl font-semibold mb-4">Our Location</h3>
                <p class="text-gray-600 mb-2">The One and Only Cafe</p>
                <p class="text-gray-600 mb-2">123 Foodie Lane</p>
                <p class="text-gray-600 mb-2">Kolkata, India</p>
                <p class="text-gray-600 mb-2">Phone: 9874852833</p>
                <p class="text-gray-600 mb-2">Email: subratadas786420@gmail.com</p>

                <h3 class="text-2xl font-semibold mt-6 mb-4">Follow Us</h3>
                <div class="flex justify-center space-x-4">
                    <a href="https://github.com" target="_blank" class="text-purple-900 hover:text-purple-700">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                    <a href="https://www.linkedin.com" target="_blank" class="text-purple-900 hover:text-purple-700">
                        <i class="fab fa-linkedin"></i> LinkedIn
                    </a>
                    <a href="https://x.com" target="_blank" class="text-purple-900 hover:text-purple-700">
                        <i class="fab fa-twitter"></i> X
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright Notice -->
        <div class="mt-8">
            <p class="text-gray-500">&copy; 2024 The One and Only Cafe. All rights reserved.</p>
        </div>
    </div>
</section>

<!-- Add this section before the closing body tag -->
<footer class="bg-gray-900 text-white p-6 text-center shadow-lg">
    <h2 class="text-lg font-semibold mb-4">Explore More</h2>
    <a href="sitemap.php" class="bg-purple-700 text-white px-5 py-2 rounded-full hover:bg-purple-600 transition duration-300">View Sitemap</a>
</footer>




    <!-- JavaScript for Mobile Menu -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>
</body>
</html>
