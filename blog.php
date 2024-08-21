
<?php
    include_once 'partials/header.php';
?>
<style>
    body {
        background-color: #f0f0f0;
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
        <h1 class="logo" style="margin: 0; color: #fff8ec; font-size: 3rem;"  data-aos="fade-right">News</h1>
        <div style="position: absolute; bottom: 0; right: 0; width: 90px; height: 2px; background-color: white; margin-right:12%;" data-aos="fade-left"></div>
    </div>
    <div class="container">
        <div class="blog-header">
            <h1>Latest News</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Suscipit qui neque sint eveniet tempore sapiente.</p>
        </div>
        <div class="row">
            <div class="col-md-8 blog-main">
                <img src="images/IMG-20240616-WA0023.jpg" alt="Main Post">
                <h2>Even the all-powerful Pointing has no control about the blind texts</h2>
                <!-- <p class="blog-meta"><i class="bi bi-calendar3"></i> May 29, 2018 &nbsp; | &nbsp; <i class="bi bi-person"></i> Admin &nbsp; | &nbsp; <i class="bi bi-chat"></i> 19</p> -->
                <p class="blog-meta"><i class="fas fa-calendar"></i> May 29, 2018 &nbsp; | &nbsp; <i class="fas fa-user"></i> Admin <i class="fas fa-comments"></i> 19</p>
                <div class="col-md-10 blog-body">
                    <p>World Malaria Day is an international observance commemorated every year on 25 April and recognizes global efforts to control malaria. Globally, 3.3 billion people in 106 countries are at risk of malaria. In 2012, malaria caused an estimated 627,000 deaths, mostly among African children.

Royal Coast Academy’s Initiatives
At Royal Coast Academy, we believe in the power of education to drive change. In honor of World Malaria Day, our school has organized a series of activities designed to educate our students and community about malaria: Educational Workshops: Our science department has conducted workshops on how malaria spreads, the symptoms of the disease, and the importance of mosquito control and bed nets. Art and Essay Competitions: Students participated in art and essay competitions themed around malaria awareness, with winners receiving recognition at a special assembly. Fundraising for Malaria Prevention: The school has launched a fundraising campaign, with proceeds going to organizations dedicated to providing mosquito nets and medicines to malaria-endemic regions. The Global Fight Against Malaria World Malaria Day serves as a reminder of the ongoing global effort to end malaria. According to the World Health Organization (WHO), over 600,000 people die from malaria each year, most of them young children in sub-Saharan Africa. However, with continued investment in prevention, treatment, and research, there is hope for a malaria-free future. How You Can Help Students and parents at Royal Coast Academy can make a difference by supporting global malaria initiatives. Whether by donating to organizations like the Against Malaria Foundation or spreading awareness in your community, every action counts. Conclusion As we observe World Malaria Day, let’s remember that education is a powerful tool in the fight against malaria. At Royal Coast Academy, we are proud to stand with the global community in raising awareness and taking action to end this devastating disease. Together, we can make a difference.
                        <br>
                        <br>
                    </p>
                </div>
            </div>
            <div class="col-md-4 blog-sidebar">
                <div class="row">
                    <div class="col-12 mb-3">
                        <img src="images/IMG-20240616-WA0024.jpg" alt="Sidebar Post">
                        <h4>Even the all-powerful Pointing has no control about the blind texts</h4>
                        <p class="blog-meta"><i class="bi bi-calendar3"></i> May 29, 2018 &nbsp; | &nbsp; <i class="bi bi-person"></i> Admin &nbsp; | &nbsp; <i class="bi bi-chat"></i> 19</p>
                    </div>
                    <div class="col-12 mb-3">
                        <img src="images/IMG-20240616-WA0027.jpg" alt="Sidebar Post">
                        <h4>Even the all-powerful Pointing has no control about the blind texts</h4>
                        <p class="blog-meta"><i class="bi bi-calendar3"></i> May 29, 2018 &nbsp; | &nbsp; <i class="bi bi-person"></i> Admin &nbsp; | &nbsp; <i class="bi bi-chat"></i> 19</p>
                    </div>
                    <div class="col-12 mb-3">
                        <img src="images/IMG-20240616-WA0023.jpg" alt="Sidebar Post">
                        <h4>Even the all-powerful Pointing has no control about the blind texts</h4>
                        <p class="blog-meta"><i class="bi bi-calendar3"></i> May 29, 2018 &nbsp; | &nbsp; <i class="bi bi-person"></i> Admin &nbsp; | &nbsp; <i class="bi bi-chat"></i> 19</p>
                    </div>
                    <div class="col-12 mb-3">
                        <img src="images/IMG-20240616-WA0025.jpg" alt="Sidebar Post">
                        <h4>Even the all-powerful Pointing has no control about the blind texts</h4>
                        <p class="blog-meta"><i class="bi bi-calendar3"></i> May 29, 2018 &nbsp; | &nbsp; <i class="bi bi-person"></i> Admin &nbsp; | &nbsp; <i class="bi bi-chat"></i> 19</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once "partials/footer.php"; ?>

</body>
</html>
