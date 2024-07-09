
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
            <div class="col-12 col-md-7">

                <?php
                $status = "OK"; //initial status
                $msg = "";
                if (isset($_POST['save'])) {
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    // $role = mysqli_real_escape_string($con, $_POST['role']);
                    $nod = mysqli_real_escape_string($con, $_POST['nod']);
                    $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
                    $pod = mysqli_real_escape_string($con, $_POST['pod']);
                    $dod = mysqli_real_escape_string($con, $_POST['dod']);
                    $itd = mysqli_real_escape_string($con, $_POST['itd']);
                    $sn = mysqli_real_escape_string($con, $_POST['sn']);
                    $sc = mysqli_real_escape_string($con, $_POST['sc']);
                    $nok = mysqli_real_escape_string($con, $_POST['nok']);
                    $cv = mysqli_real_escape_string($con, $_POST['cv']);
                    
                    if ($status == "OK") {
                        $qb = mysqli_query($con, "INSERT INTO deposit (username, password, nod, nationality, pod, dod, itd, sn, sc, nok, cv) VALUES ('$username', '$password', '$nod', '$nationality', '$pod', '$dod', '$itd', '$sn', '$sc', '$nok', '$cv')");

                        if ($qb) {
                            $errormsg = "
                            <div class='alert alert-success alert-dismissible alert-outline fade show text-center' style='margin-left:100px'>
                  User has been added successfully.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                                
                        }
                    } else {
                        $errormsg = "
                        <div class='alert alert-danger alert-dismissible alert-outline fade show text-center' style='margin-left:100px'>
                        ".$msg." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>"; //printing error if found in validation
                    }
                }
                ?>
                
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                print $errormsg;
                            }
                            ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="card" style="width:900px;height:500px;margin-left:60px;">
                                        <div class="card-header text-center">Sign Up Form !</div>
                                            <div class="card-body" style="background-color: #6f42c1;">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <!-- <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="firstnameInput" class="form-label"> Select Role</label>
                                                                        <select class="form-select" name="role" aria-label="Default select example">
                                                                        <option selected="" disabled>Select Role </option>
                                                                        <option value="admin">Administrator</option>
                                                                        <option value="user">User</option>
                                                                        </select>
                                                                    </div>
                                                                </div> -->

                                                                <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                    <label for="firstnameInput" class="form-label text-white"> Username</label>
                                                                    <input type="text" class="form-control" id="firstnameInput" name="username" placeholder="Your Username">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white"> Password</label>
                                                                <input type="password" class="form-control" id="firstnameInput" name="password" placeholder="Your Password">
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white">Full Name</label>
                                                                <input type="text" class="form-control" id="firstnameInput" name="nod" placeholder="Your User Name">
                                                            </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4">
                                                            <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label text-white"> User Gender</label>
                                                            <input type="text" class="form-control" id="firstnameInput" name="pod" placeholder="Your User Gender">
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white">Job Title</label>
                                                                <input type="text" class="form-control" id="firstnameInput" name="itd" placeholder="Your Job Title">
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white">Date Of Birth</label>
                                                                <input type="date" class="form-control" id="firstnameInput" name="dod" placeholder="Your Date Of Birth">
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white">Mobile Numbers</label>
                                                                <input type="number" class="form-control" id="firstnameInput" name="sn" placeholder="Your Mobile Number" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number">
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white">Email Address</label>
                                                                <input type="email" class="form-control" id="firstnameInput" name="sc" placeholder="Your Email Address" >
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white">Country</label>
                                                                <input type="text" class="form-control" id="firstnameInput" name="nationality" placeholder="Your  Country">
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                 <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white">State</label>
                                                                <input type="text" class="form-control" id="firstnameInput" name="nok" placeholder="Your State">
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                <label for="firstnameInput" class="form-label text-white">City</label>
                                                                <input type="text" class="form-control" id="firstnameInput" name="cv" placeholder="Your City">
                                                            </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                            <label for="firstnameInput" class="form-label text-white">Submit Form</label><br>
                                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                                            </div>
                                                            </div>
                                                            <!-- <div class="col-lg-12">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                <button type="submit" name="save" class="btn btn-primary">Add User</button>
                                                            </div> -->
                                                             </div><!--end col-->
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function(e) {
            var formInputs = document.querySelectorAll('input[type="text"], input[type="password"], input[type="number"], input[type="email"], input[type="date"]');
            var isEmpty = false;

            formInputs.forEach(function(input) {
                if (input.value.trim() === '') {
                    isEmpty = true;
                }
            });

            if (isEmpty) {
                e.preventDefault();
                alert('Please fill in all the fields.');
            }
        });
    });
</script>