<?php include_once "partials/header.php"; ?>

<style>
    /* Custom Styles for Accordion */
    .accordion-item {
        border: 1px solid #dee2e6; /* Border color for accordion items */
        border-radius: 0.25rem; /* Rounded corners */
        margin-bottom: 15px; /* Margin between accordion items */
    }

    .accordion-button {
        background-color: #f8f9fa; /* Background color of accordion headers */
        color: #333; /* Text color of accordion headers */
        border: none; /* Remove default border */
        border-radius: 0; /* Ensure no rounded corners */
        padding: 1rem 3rem 1rem 1rem; /* Padding around accordion button */
        width: 100%;
        text-align: left; /* Align text to the left */
        font-weight: 600; /* Bold font weight */
        position: relative; /* Position relative for icon */
        transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    .accordion-button:hover {
        background-color: #e0ecef; /* Darker background on hover */
    }

    .accordion-button i {
        position: absolute; 
        right: 1rem;
        transform: translateY(-50%); 
        font-size: 1.5rem; 
        transition: transform 0.3s ease;
    }

    .accordion-button.collapsed i {
        transform: translateY(-50%) rotate(180deg); 
    }

    .accordion-body {
        background-color: #fff;
        color: #555;
        padding: 1rem;
        border-top: none;
        border-radius: 0 0 0.25rem 0.25rem;
    }
</style>

<section class="faq-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" style="background-color: white; border-radius: 1%">
                <div class="faq-content">
                    <h1 class="mb-4 fw-bold" style="padding: 20px 0;">Frequently Asked Questions</h1>

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    How do I obtain an application form?
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <p>To obtain an application form, you have two convenient options:</p>
                                    <ul>
                                        <p>Physically from the School: Visit the school in person to collect a hard copy of the application form.</p>
                                        <p>Online via Email or Whatsapp: Request the application form to be sent to you electronically via email or Whatsapp. Once received, you can download, complete, and return the form through the same channel. Choose the method that is most convenient for you, and follow the provided instructions for a smooth application process.</p>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    What are the school's operating hours?
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>Our school operates from Monday to Friday, 8:00 AM to 4:00 PM.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    What is the minimum age for crèche, nursery, primary, and secondary schools?
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p>At our nursery level, children are admitted into Pre-K 1 from 15 months old, while those of Reception 1 are admitted from age 3. Year 1 pupils are admitted from age 5 or 6. For our secondary schools, prospective learners are expected to have completed year six or at least attained the age of 10 in year 5.</p>
                                    <p><strong style="color: #007bff">Please Note:</strong> We do not admit pupils and students into Years 6, 9, and 12, as these are terminal classes. However, exceptions apply for applicants emigrating from outside Nigeria OR Lagos state (with proof).</p>
                                    <p>You can reach our administration office by phone at <a href="tel:+123456789">08027664776</a> or by email at <a href="mailto:royalcoastacademy21@gmail.com">royalcoastacademy21@gmail.com</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1100">
                <div class="support-illustration text-center">
                    <img src="images/undraw_teacher_re_sico.svg" alt="Support Illustration" class="img-fluid rounded shadow-sm" style="max-width: 80%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="help-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                <div class="help-content">
                    <h1 class="mb-4 fw-bold">Get Help and Support</h1>
                    <p class="mb-4">If you have any questions or need assistance, please don't hesitate to reach out to us. Our support team is ready to help you.</p>
                    <p class="mb-4">Contact us via email at <a href="mailto:yemideniran@gmail.com">support@royalcoastacademy.com</a> or call us at <a href="tel:+123456789">+2348027664776</a>.</p>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1" data-aos="fade-right" data-aos-duration="1100">
                <div class="help-illustration text-center">
                    <img src="images/undraw_questions_re_1fy7.svg" alt="Help Illustration" class="img-fluid rounded shadow-sm">
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "partials/footer.php"; ?>

<!-- Font Awesome Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.2.0/js/all.min.js"></script>

<!-- Bootstrap Bundle with Popper.js for Bootstrap 5 Accordion -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Initialize AOS -->
<script>
    AOS.init();
</script>

<!-- Custom Script to Close Open Accordions when Another is Opened -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accordion = document.getElementById('accordionPanelsStayOpenExample');
        accordion.addEventListener('show.bs.collapse', function (event) {
            const openItems = accordion.querySelectorAll('.accordion-collapse.show');
            openItems.forEach(function (item) {
                if (item !== event.target) {
                    new bootstrap.Collapse(item, {
                        toggle: true
                    }).hide();
                }
            });
        });
    });
</script>
