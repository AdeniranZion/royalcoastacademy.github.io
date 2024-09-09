<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .newsbody {
            font-family: 'Arial', sans-serif;
            background: #fff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 4rem;
        }

        .news-section {
            margin-bottom: 3rem;
        }

        .events-section {
            margin-bottom: 3rem;
            background-color: #fff;
        }

        .news-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
            flex: 1 1 calc(33.333% - 20px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card-title {
            font-size: 2rem;
            margin: 0 0 10px;
            color: #333;
        }

        .card-date {
            font-size: 1.4rem;
            color: #777;
            margin-bottom: 10px;
        }

        .card-text {
            flex-grow: 1;
            font-size: 1.4rem;
            color: #555;
            margin-bottom: 20px;
        }

        .card-footer {
            padding: 20px;
            background: #f4f4f9;
            text-align: right;
        }

        .card-footer a {
            text-decoration: none;
            color: #e070dd;
            transition: color 0.3s;
            font-size: 1.6rem;
        }

        .card-footer a:hover {
            color: #671470;
        }

        .events-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
        }

        .calendar-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .calendar-header {
            font-size: 1.8rem;
            color: #e070dd;
            margin-bottom: 10px;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            grid-gap: 5px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .calendar div {
            text-align: center;
            padding: 10px;
            border-radius: 4px;
            background: #f9f9f9;
            cursor: pointer;
            transition: background 0.3s;
            position: relative;
        }

        .calendar div:hover {
            background: #e9e9e9;
        }

        .calendar div.event-date:hover::after {
            content: attr(data-details); /* Show event details on hover */
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 5px;
            background: #bbb;
            color: #fff;
            border-radius: 4px;
            white-space: nowrap;
            font-size: 1.5rem;
            z-index: 10;
        }

        .current-day {
            background: #bbb;
            color: #007bff;
            border-radius: 100%;
            border: 2px solid #007bff;
            font-weight: bold;
            width: 40px;
            height: 40px;
            line-height: 20px;
            display: inline-block;
            text-align: left;
            padding-right: 20px;
        }

        .event-date {
            background: #FFD700;
            color: #e070dd;
            font-weight: bold;
        }

        .event-details {
            background: #f4f4f9;
            border-radius: 8px;
            margin-top: 40px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .event-details h3 {
            margin-top: 0;
            font-size: 2.5rem;
            font-weight: bold;
            color: #e070dd;
        }

        .event-details p {
            margin: 0.5rem 0;
            font-size: 1.8rem;
            color: #555;
        }

        @media (max-width: 768px) {
            .card {
                flex: 1 1 calc(50% - 20px);
            }

            .events-grid {
                grid-template-columns: 1fr;
                display: flex;
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .card {
                flex: 1 1 100%;
            }
            .calendar {
                font-size: 1.5rem;
                grid-gap: 2px;
                padding: 20px 10px;
            }
        }
    </style>
</head>
<body>
    <?php
    include '../royalcoastacademy/partials/db_connect.php';

    if (!isset($conn)) {
        die("Database connection not established.");
    }
    
    // Fetch all news from the database
    $sql = "SELECT * FROM news ORDER BY date DESC";
    $result = $conn->query($sql);
    
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    function includeRoyalGazzete() {
    ?>
        <section class="newsbody">
            <div class="container">
                <!-- News Section -->
                <section class="news-section">
                    <div class="news-grid">
                        <?php
                        // Fetch all news from the database
                        $sql = "SELECT * FROM news ORDER BY date DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $newsTitle = htmlspecialchars($row['title']);
                                $newsDate = date('F j, Y', strtotime($row['date'])); // Format date
                                $newsTime = date('H:i', strtotime($row['time'])); // Format time
                                $newsImage = htmlspecialchars($row['image']); // Make sure you have this field in your table
                                $newsExcerpt = htmlspecialchars($row['description']);
                        ?>
                                <div class="card" data-aos="zoom-in" data-aos-duration="1000">
                                    <img src="<?php echo $newsImage; ?>" alt="<?php echo $newsTitle; ?>">
                                    <div class="card-content">
                                        <h3 class="card-title"><?php echo $newsTitle; ?></h3>
                                        <p class="card-date"><i class="fas fa-clock" style="color: #ccc"></i> <?php echo $newsDate . ' at ' . $newsTime; ?></p>
                                        <p class="card-text"><?php echo $newsExcerpt; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="news.php?id=<?php echo $row['id']; ?>">Read More</a>    
                                        
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No news available";
                        }
                        ?>
                    </div>
                </section>
            </div>
        </section>
    <?php
    }

    function includeUpcomingEvents() {
    ?>
        <section class="newsbody">
            <div class="container">
                <!-- Events Section -->
                <section class="events-section">
                    <h1 class="section-title" data-aos="fade-up">Upcoming Events</h1>
                    <div class="events-grid">
                        <!-- Calendar -->
                        <div class="calendar-container" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="calendar-header">July 2024</div>
                            <div class="calendar">
                                <?php
                                // Example events data
                                $events = [
                                    1 => ['title' => 'Science Fair', 'details' => 'Details about the Science Fair.'],
                                    5 => ['title' => 'PTA Meeting', 'details' => 'Details about the PTA Meeting.'],
                                    10 => ['title' => 'Sports Day', 'details' => 'Details about the Sports Day.']
                                ];

                                // Get current day
                                $currentDay = date('j');

                                // Number of days in the current month
                                $daysInMonth = date('t');

                                // Loop through each day of the month
                                for ($day = 1; $day <= $daysInMonth; $day++) {
                                    if (isset($events[$day])) {
                                        // If there's an event on this day, highlight it and add hover details
                                        $additionalClass = ($day == $currentDay) ? ' current-day' : '';
                                        echo '<div class="event-date' . $additionalClass . '" data-details="' . $events[$day]['title'] . ' - ' . $events[$day]['details'] . '" onclick="showEventDetails(' . $day . ')">' . $day . '</div>';
                                    } else {
                                        // Regular day without an event
                                        $additionalClass = ($day == $currentDay) ? ' current-day' : '';
                                        echo '<div class="' . $additionalClass . '">' . $day . '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Event Details -->
                        <div class="event-details" data-aos="zoom-in" data-aos-duration="1000">
                            <h3 id="event-title">Event Details</h3>
                            <p id="event-description">View all of our events this month</p>
                            <p id="event-time"></p>
                            <p id="event-location"></p>
                        </div>
                        <a href="calendar.php">View</a>
                    </div>
                </section>
            </div>
        </section>
    <?php
    }
    ?>

    <script>
        // Function to show news details
        function showNewsDetails(newsId) {
            $newsItems = "";
            const news = <?php echo json_encode($newsItems); ?>; // PHP array to JavaScript object

            // Update DOM with news details
            if (news[newsId]) {
                // Example: Display details in a modal or another section
                alert('News Title: ' + news[newsId].title + '\nDate: ' + news[newsId].date + '\nDetails: ' + news[newsId].excerpt);
            } else {
                alert('News details not found.');
            }
        }

        // Sample event details with time and location
        const events = {
            1: { title: "Science Fair", description: "Annual school science fair with exciting projects from students.", time: "10:00 AM", location: "School Auditorium" },
            2: { title: "Library Opening", description: "Celebrate the opening of our new library with a ribbon-cutting ceremony.", time: "9:00 AM", location: "New Library" },
            3: { title: "Summer Camp Registration", description: "Register now for our fun-filled summer camp.", time: "12:00 PM", location: "Main Office" },
            7: { title: "Parents' Meeting", description: "Monthly meeting for parents to discuss school activities.", time: "2:00 PM", location: "Room 101" },
            14: { title: "Sports Day", description: "Join us for a day of fun and sports competitions.", time: "8:00 AM", location: "School Field" },
            18: { title: "Art Exhibition", description: "Showcase of students' artwork.", time: "11:00 AM", location: "Art Gallery" },
            23: { title: "Music Concert", description: "Enjoy performances by our school band and choir.", time: "7:00 PM", location: "School Hall" },
            30: { title: "Graduation Ceremony", description: "Celebrate the achievements of our graduates.", time: "5:00 PM", location: "School Auditorium" }
        };

        // Function to show event details
        function showEventDetails(date) {
            if (events[date]) {
                document.getElementById('event-title').innerText = events[date].title;
                document.getElementById('event-description').innerText = events[date].description;
                document.getElementById('event-time').innerHTML = '<i class="fas fa-clock"></i> ' + events[date].time;
                document.getElementById('event-location').innerHTML = '<i class="fas fa-map-marker-alt"></i> ' + events[date].location;
            } else {
                document.getElementById('event-title').innerText = "Event Details";
                document.getElementById('event-description').innerText = "Select a date to see event details.";
                document.getElementById('event-time').innerText = "";
                document.getElementById('event-location').innerText = "";
            }
        }
    </script>
</body>
</html>
