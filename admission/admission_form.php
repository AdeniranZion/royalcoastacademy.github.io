
<?php include_once "../partials/header.php"; ?>

<?php
    // Generate a random prefix consisting of two uppercase letters
    $prefix = chr(rand(65, 90)) . chr(rand(65, 90)); // Random uppercase letters (e.g., "AB", "XY", etc.)

    // Static parts of the form code
    $datePart = date('y-m'); // Year and month (e.g., 24-06)

    // Assuming you have a counter or can retrieve the last used form number from a database
    // Example: Replace with your logic to get the last form number and increment it
    $lastFormNumber = 9; // Example: Get the last form number from a database or file

    // Increment the last form number to generate a new unique form number
    $newFormNumber = $lastFormNumber + 1;

    // Generate the full form code
    $formCode = "{$prefix}-{$datePart}-" . sprintf('%05d', $newFormNumber); // Example: "AB-24-06-00010"

    // Output the form number in your HTML
?>




<head>
    <link rel="stylesheet" href="/royalcoastacademy/css/style.css"> <!-- Link to your CSS file for styling -->
</head>

<style>
    body {
        background-color: #fcf5fc;

    }
    .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 40px;
            background-color: #fff;
            /* background-color: #fcf5fc; */
            border-radius: 8px;
            font-size: 1.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-header img {
            max-width: 100px;
            height: auto;
            margin-bottom: 10px;
        }
        .form-header h1 {
            font-size: 2.8rem;
            margin: 10px 0;
            font-weight: bolder;
            color: #333;
        }
        .form-subtitle {
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: bolder;
            color: #666;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .form-section h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #333;
        }
        .form-section p {
            font-weight: bolder;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: grey;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        select,
        input[type="file"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1.6rem;
        margin-top: 5px;
        color: #333;
    }
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 1.2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .upload-box {
            border: 2px solid #ccc;
            padding: 20px;
            max-width: 150px;
            text-align: center;
            cursor: pointer;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
            align-self: center;
        }
        .upload-box:hover {
            border-color: #e070dd;
            background-color: #f5ecf4;
        }
        .upload-box label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        .upload-box .upload-icon {
            font-size: 3rem;
            color: #336699;
        }
        .upload-box input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        .upload-box p {
            margin-top: 10px;
            color: red;
            font-size: 1.2rem;
        }
        .section-divider {
            border: none;
            border-top: 1px solid plum; /* Thin solid line */
            margin: 20px 0; /* Adjust margin as needed */
            clear: both; /* Ensures no floating elements */
        }

        .form-group small {
            display: block;
            color: #666;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        .form-group p{
            margin-top: 10px;
            font-size: 1.3rem;
            color: #aaa;
        }
        .form-submit {
            text-align: center;
            margin: 10px;
            padding: 1.2rem 1.4rem;
        }

        /* Styling for checkbox and label in a single line */
        .checkbox-group {
            display: flex;
            align-items: flex-start; /* Aligns checkbox with the top of the label text */
            gap: 10px; /* Space between checkbox and label */
        }

        .checkbox-group input[type="checkbox"] {
            margin-top: 5px; /* Slight adjustment to align with the text */
        }

        .checkbox-group label {
            font-size: 1.3rem; /* Slightly smaller text for the label */
            line-height: 1.5; /* Better readability */
            margin: 0; /* Remove default margin */
        }

        /* Styling for buttons */
        .form-submit .btn {
            padding: 10px 20px;
            margin: 0 5px;
            background-color: #336699;
            /* color: white; */
            border: none;
            cursor: pointer;
            font-size: 1.5rem;
            font-weight: bolder;
            transition: background-color 1s ease;
        }

        .form-submit .btn:disabled {
            background-color: #ccc; /* Greyed out color */
            cursor: not-allowed; /* Cursor indicates the button is not clickable */
        }
        
</style>

<body>

<div class="form-container">
    <div class="form-header">
        <img src="/royalcoastacademy/images/RCALogo.png" alt="School Logo">
        <h1>Royal Coast Academy Admission Form</h1>
        <p class="form-subtitle">CRÈCHE, NURSERY & PRIMARY SCHOOLS</p>
        <h2>Admission Form</h2>
    <hr class="section-divider">
    </div>
    <div class="upload-box">
            <label for="passport-photo">Click to upload Photo</label>
            <input type="file" id="passport-photo" name="passport-photo" accept="image/*" required>
            <i class="upload-icon fas fa-cloud-upload-alt"></i>
            <p>*required</p>
    </div>

    <div class="form-section">
        <p>Application Date: <?php echo date('j F Y'); ?></p>
        <p>Form Number: <?php echo $formCode; ?></p>
        <hr class="section-divider">
        <p style="font-style: italic; font-weight:normal">Please fill this form appropriately before the date of examination. Note down your form number as it is the unique id that sets your form apart from others.</p>

        <!-- Divider line -->
        <hr class="section-divider">

        <form action="process_admission.php" method="POST" class="admission-form">
            <h2 style="font-weight: bolder;">Student Identity:</h2>
            <div class="form-group">
                <label for="surname">Surname *</label>
                <input type="text" id="surname" name="surname" required>
            </div>

            <div class="form-group">
                <label for="first-name">First Name *</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth *</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender *</label>
                <select id="gender" name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="SOO">State of Origin: *</label>
                <input type="text" id="state_origin" name="state_origin" required>
            </div>

            <hr class="section-divider" style="margin-top: 40px;">
            
            <h2 style="font-weight: bolder;">Parent / Guardian Details:</h2>
            <div class="form-group">
                <label for="surname">Full Name *</label>
                <input type="text" id="surname" name="surname" required>
            </div>

            <div class="form-group">
                <label for="first-name">Occupation*</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>

            <div class="form-group">
                <label for="first-name">Home Address*</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>

            <div class="form-group">
                <label for="first-name">Phone Number*</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="marital_status">Marital Status *</label>
                <select id="marital_status" name="marital_status" required>
                    <option value="">Select</option>
                    <option value="male">Married</option>
                    <option value="female">Single</option>
                    <option value="divorced">Divorced</option>
                    <option value="widowed">Widowed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Office Address *</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>

            <hr class="section-divider" style="margin-top: 40px;">

            <!-- Supporting Documents Upload Section -->
            <h2 style="font-weight: bolder;">Supporting Documents</h2>

        <div class="form-group">
            <label for="birth-certificate">Birth Certificate *</label>
            <input type="file" id="birth-certificate" name="birth_certificate" accept=".jpg, .jpeg, .png, .pdf" required>
            <p class="file-instructions">Allowed file types: JPG, JPEG, PNG, PDF. Maximum size: 5MB.</p>
        </div>


        <div class="form-group">
            <label for="transcript">Transcript/Academic Record*</label>
            <input type="file" id="transcript" name="transcript" accept=".jpg, .jpeg, .png, .pdf" required>
            <p class="file-instructions">Allowed file types: JPG, JPEG, PNG, PDF. Maximum size: 5MB.</p>
        </div>
            
            
        </form>
    </div>

    <hr class="section-divider" style="margin-top: 40px;">

    <div class="form-section">
        <h2>Undertaking</h2>
        <form action="process_admission.php" method="POST" class="admission-form">
            <div class="form-group checkbox-group">
                <input type="checkbox" id="undertaking" name="undertaking" required>
                <label for="undertaking">
                    I undertake and agree to pay each term’s or year’s fees in advance and give at least a term’s written notice before withdrawing my child from the school or to pay a term’s fees in lieu of notice. I also agree to comply with all conditions stipulated in your school prospectus which I have read carefully with full understanding. *
                </label>
            </div>
            <hr class="section-divider">

            <div class="form-submit">
                <button type="submit" class="btn" id="submit-button" disabled>Submit</button>
                <button type="button" class="btn">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Divider line -->


<?php include_once "../partials/footer.php"; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkbox = document.getElementById("undertaking");
        const submitButton = document.getElementById("submit-button");

        // Event listener for the checkbox
        checkbox.addEventListener("change", function() {
            // Toggle the disabled property based on the checkbox state
            submitButton.disabled = !checkbox.checked;
        });
    });
</script>


</body>
</html>
