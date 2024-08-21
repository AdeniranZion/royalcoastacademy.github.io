<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .container-head {
            background-color: #ffebcc;
            padding: 20px 30px;
            text-align: center;
            margin-bottom: 20px;
        }
        .main-content, .sidebar {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .main-content img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 15px;
            border-radius: 8px;
        }
        .card-temp-1 {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f8f8f8;
            transition: background-color 0.3s;
        }
        .card-temp-1:hover {
            background-color: #ececec;
        }
        .card-temp-1 h3 {
            font-size: 1.2rem;
            margin: 0;
        }
        .card-temp-1 p {
            margin: 10px 0;
        }
        .read-more {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }
        .read-more:hover {
            text-decoration: underline;
        }
        .sidebar h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .sidebar a {
            text-decoration: none;
            color: #444;
        }
        @media (max-width: 768px) {
            .main-content, .sidebar {
                padding: 15px;
            }
            .container {
                margin: 0 15px;
            }
            .card-temp-1 {
                flex-direction: column;
                text-align: center;
            }
            .card-temp-1 img {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-head">
        <h1>Modern Blog</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div id="main-content" class="main-content">
                    <!-- Initial content -->
                    <div class="card-temp-1">
                        <img src="images/IMG-20240616-WA0027.jpg" alt="post1">
                        <div>
                            <h3>Exploring the Future of Technology</h3>
                            <p>The tech industry is rapidly evolving, with new innovations emerging every day...</p>
                            <span class="read-more" onclick="loadContent('post1')">Read More</span>
                        </div>
                    </div>
                    <div class="card-temp-1">
                        <img src="images/IMG-20240616-WA0023.jpg" alt="post2">
                        <div>
                            <h3>Sustainability in Modern Architecture</h3>
                            <p>Green buildings and sustainable architecture are becoming the norm in today's world...</p>
                            <span class="read-more" onclick="loadContent('post2')">Read More</span>
                        </div>
                    </div>
                    <div class="card-temp-1">
                        <img src="images/IMG-20240616-WA0024.jpg" alt="post3">
                        <div>
                            <h3>How to Stay Productive Working from Home</h3>
                            <p>Remote work has become a permanent fixture for many. Learn how to stay productive...</p>
                            <span class="read-more" onclick="loadContent('post3')">Read More</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="sidebar">
                    <h3>Other News</h3>
                    <ul>
                        <li><a href="#" onclick="loadContent('post4')">Understanding Cryptocurrency</a></li>
                        <li><a href="#" onclick="loadContent('post5')">The Rise of Electric Vehicles</a></li>
                        <li><a href="#" onclick="loadContent('post6')">AI in Healthcare</a></li>
                        <li><a href="#" onclick="loadContent('post7')">The Impact of Social Media</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadContent(postId) {
            const content = {
                post1: `
                    <div class="post-content">
                        <img src="images/IMG-20240616-WA0027.jpg" alt="future of technology">
                        <h2>The Tech Industry's New Era</h2>
                        <p>The technology sector is on the brink of a revolution, with advancements in AI, blockchain, and quantum computing. These innovations are set to change the way we live and work...</p>
                        <p>As we move into the future, it's important to stay informed about the trends shaping the tech landscape...</p>
                        <p>Stay ahead of the curve with our expert insights and analysis...</p>
                        <p>Learn more about the future of technology and how it will impact your business...</p
                        <p>Discover the latest developments in AI, blockchain, and quantum computing...</p>
                        <p>Get the inside scoop on the tech industry's hottest trends...</p>
                        <p>Read more about the tech industry's new era...</p>
                        <a href="blog.php">Go back</a>
                    </div>
                `,
                post2: `
                    <div class="post-content">
                        <img src="images/yemi2.jpg" alt="modern architecture">
                        <h2>Sustainability in Modern Architecture</h2>
                        <p>Green buildings and sustainable architecture are becoming the norm in today's world. Architects are focusing on designs that minimize environmental impact and reduce energy consumption...</p>
                        <p>From smart materials to renewable energy integration, the future of architecture looks green and sustainable...</p>
                    </div>
                `,
                post3: `
                    <div class="post-content">
                        <img src="images/yemi3.jpg" alt="productivity">
                        <h2>How to Stay Productive Working from Home</h2>
                        <p>Remote work has become a permanent fixture for many. To stay productive, it's essential to establish a routine, create a dedicated workspace, and take regular breaks...</p>
                        <p>Staying connected with colleagues and maintaining a work-life balance are also key factors in ensuring long-term productivity...</p>
                    </div>
                `,
                post4: `
                    <div class="post-content">
                        <h2>Understanding Cryptocurrency</h2>
                        <p>Cryptocurrencies have taken the world by storm, with Bitcoin and Ethereum leading the charge. But how do they work, and what does the future hold for digital currencies?...<p>
                    </div>
                `,
                post5: `
                    <div class="post-content">
                        <h2>The Rise of Electric Vehicles</h2>
                        <p>Electric vehicles (EVs) are rapidly becoming mainstream, with advancements in battery technology and charging infrastructure. But what challenges lie ahead as the world shifts towards EVs?...<p>
                    </div>
                `,
                post6: `
                    <div class="post-content">
                        <h2>AI in Healthcare</h2>
                        <p>Artificial intelligence is revolutionizing healthcare, from diagnostic tools to personalized treatment plans. But what ethical considerations must be addressed as AI continues to grow in this field?...<p>
                    </div>
                `,
                post7: `
                    <div class="post-content">
                        <h2>The Impact of Social Media</h2>
                        <p>Social media has transformed the way we communicate and consume information. But what are the long-term effects of this shift on society and individual well-being?...<p>
                    </div>
                `
            };

            document.getElementById('main-content').innerHTML = content[postId];
        }
    </script>
</body>
</html>
