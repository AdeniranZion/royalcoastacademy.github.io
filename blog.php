




<?php
    include 'partials/db_connect.php';

    // Fetch the latest news (the main news)
    $mainNewsSql = "SELECT * FROM news ORDER BY date DESC LIMIT 1";
    $mainNewsResult = $conn->query($mainNewsSql);
    $mainNews = $mainNewsResult->fetch_assoc();
    
    // Fetch other news (excluding the main news)
    $otherNewsSql = "SELECT * FROM news WHERE id != ? ORDER BY date DESC";
    $otherNewsStmt = $conn->prepare($otherNewsSql);
    $otherNewsStmt->bind_param('i', $mainNews['id']);
    $otherNewsStmt->execute();
    $otherNewsResult = $otherNewsStmt->get_result();
    
    include_once 'partials/header.php';
?>
<style>
    body {
        background-color: #fff;
    }
    .blog-header {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
        padding: 30px;
    }
    .blog-header h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }
    .blog-header p {
        color: #6c757d;
        font-size: 1.5rem;
    }
    .blog-main img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 15px;
    }
    .blog-main h2 {
        font-size: 1.5rem;
        margin: 15px 0;
    }
    .blog-meta {
        font-size: 1.2rem;
        color: #6c757d;
        margin-bottom: 10px;
    }
    .blog-sidebar {
        height: 100%; /* Full height of the column */
        max-height: 62vh; /* Ensure it doesn't exceed viewport height */
        overflow-y: auto; /* Enable scrolling */
        scrollbar-width: thin;
    }
    .blog-sidebar img {
        width: 100%;
        border-radius: 5px;
        max-height: 30vh;
        object-fit: cover;
    }
    .blog-sidebar h4 {
        font-size: 1.4rem;
        margin: 15px 0 5px;
    }
    .blog-sidebar .blog-meta {
        font-size: 1.2rem;
    }
</style>
</head>
<body>
    <div style="background-color: #671470; padding: 35px; padding-right: 12.5%; text-align: right; position: relative;">
        <h1 class="logo" style="margin: 0; color: #fff8ec; font-size: 3rem;" data-aos="fade-right">News</h1>
        <div style="position: absolute; bottom: 0; right: 0; width: 90px; height: 2px; background-color: white; margin-right:12%;" data-aos="fade-left"></div>
    </div>
    <div class="container">
        <div class="blog-header">
            <h1>Latest News</h1>
            <p>Stay updated with the most recent events and highlights at Royal Coast Academy. Explore our latest stories and insights.</p>
        </div>
        <div class="row" data-aos="fade-up">
            <!-- Main News -->
            <?php if ($mainNews): ?>
            <div class="col-md-8 blog-main">
                <img src="<?php echo htmlspecialchars($mainNews['image']); ?>" alt="Main Post">
                <h2><?php echo htmlspecialchars($mainNews['title']); ?></h2>
                <p class="blog-meta"><i class="fas fa-calendar"></i> <?php echo date('F j, Y', strtotime($mainNews['date'])); ?> &nbsp; | &nbsp; <i class="fas fa-user"></i> Admin</p>
                    <p><?php echo htmlspecialchars($mainNews['excerpt']); ?></p>
                    <a href="news.php?id=<?php echo $mainNews['id']; ?>" class="btnSmall">Read More</a>
            </div>
            <?php else: ?>
            <p>No main news available.</p>
            <?php endif; ?>
            
            <!-- Sidebar for Other News -->
            <div class="col-md-4 blog-sidebar">
                <h3>Other News</h3>
                <?php if ($otherNewsResult->num_rows > 0): ?>
                <?php while ($otherNews = $otherNewsResult->fetch_assoc()): ?>
                <div class="other-news-item">
                    <img src="<?php echo htmlspecialchars($otherNews['image']); ?>" alt="<?php echo htmlspecialchars($otherNews['title']); ?>">
                    <h4><?php echo htmlspecialchars($otherNews['title']); ?></h4>
                    <p class="blog-meta"><i class="fas fa-calendar"></i> <?php echo date('F j, Y', strtotime($otherNews['date'])); ?>  &nbsp; | &nbsp; <i class="bi bi-person"></i> Admin &nbsp; | &nbsp; <i class="bi bi-chat"></i> N/A 
                    &nbsp; | <a href="news.php?id=<?php echo $otherNews['id']; ?>">Read More</a>
                </p>
                </div>
                <?php endwhile; ?>
                <?php else: ?>
                <p>No other news available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Contact Admissions Section -->
    <div class="contact-admissions" style="padding: 50px 50px; text-align: center; background-color: #fcf5fc">
        <h2 style="font-size: 3.5rem; margin-bottom: 20px;">Ready to embark on a journey of excellence at <strong>Royal Coast Academy?</strong></h2>
        <a href="admissionpage.php" class="btn" >Apply Now</a>
    </div>

    <?php include_once 'partials/footer.php'; ?>
</body>
</html>

