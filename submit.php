
<?php

// Step 1: Connect to database
include "db.php";

// Step 2: Check whether form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Step 3: Receive form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $age = (int) $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $city = trim($_POST['city']);

    // Step 4: Insert data into database
    $sql = "INSERT INTO students
    (name, email, phone, age, gender, course, city)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Step 5: Prepare SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("SQL Error: " . mysqli_error($conn));
    }

    // Step 6: Bind variables
    mysqli_stmt_bind_param(
        $stmt,
        "ssissss",
        $name,
        $email,
        $phone,
        $age,
        $gender,
        $course,
        $city
    );

    // Step 7: Execute query
    if (mysqli_stmt_execute($stmt)) {

        echo "<h2>Registration Successful!</h2>";
        echo "<p>Your data has been saved.</p>";
        echo '<a href="formsp.php">Register Another Student</a>';

    } else {

        echo "Error: " . mysqli_stmt_error($stmt);

    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>
