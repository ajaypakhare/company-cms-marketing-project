<?php
// Assuming $con is your database connection
include_once("z_db.php");
session_start(); // Start session before any output

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'])) {
    $status = "OK"; // Initial status
    $msg = "";
    $username = mysqli_real_escape_string($con, $_POST['username']); // Fetching details through POST method
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if ($status == "OK") {
        // Retrieve username and password from database according to user's input, preventing SQL injection
        $query = "SELECT * FROM deposit WHERE (username = '$username') AND (password = '$password')";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            // Valid username and password
            $_SESSION['username'] = $username;
            header("Location: dashboard/user_dashboard.php");
 // Redirect to dashboard
            exit(); // Stop further execution
        } else {
            $errormsg = "
                <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                    Username And/Or Password Does Not Match.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>"; // Printing error if found in validation
        }
    } else {
        $errormsg = "
        <div class='alert alert-danger alert-dismissible alert-outline fade show'>
            " . $msg . "
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>"; // Printing error if found in validation
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Other head elements... -->
</head>

<body>
<?php include "header.php"; ?>
    <!-- ***** Welcome Area Start ***** -->
<section id="home" class="section welcome-area bg-overlay overflow-hidden d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <!-- Welcome Intro Start -->
            <div class="col-12">
                <div class="container">
                    <div class="row"><>
                        <div class="col-md-6 col-sm-8 col-xs-12 offset-md-3 offset-sm-2">
                            <form class="login-form" action="" method="post">
                                <h2 class="text-white text-center">Login</h2>
                                <?php if(isset($errormsg)) echo $errormsg; ?> <!-- Display error message if any -->
                                <div class="form-group">
                                    <label class="text-white" for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-white" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <button type="submit" class="btn btn-block" style="background-color: #6f42c1;">Login</button><br>
                                <center><p class="text-white">Don't have an account?</p></center><br>
                                <a href="signup.php" class="btn btn-block" style="background-color: #6f42c1;">Sign Up</a><br>
                            </form> 
                        </div>
                    </div>
                </div>                  
            </div>
        </div>
    </div>
</section>
<!-- ***** Welcome Area End ***** -->
<?php include "footer.php"; ?>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your other scripts... --> 
