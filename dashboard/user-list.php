<?php include"header.php";?>
<?php include"sidebar.php";?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
 <div class="page-content">
       <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">User Lists</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">All</a></li>
                                        <li class="breadcrumb-item active">User Lists</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">User Lists</h5>
                                </div>
                                <div class="card-body">
                                <div style="overflow-x: auto; overflow-y: auto; max-height: 400px;">
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th data-ordering="false">User Role</th>
                                                <th data-ordering="false">UserName</th>
                                                <th data-ordering="false">Password</th>
                                                <th data-ordering="false">User Name</th>
                                                <th data-ordering="false">Gender</th>
                                                <th data-ordering="false">Job Title</th>
                                                <th data-ordering="false">Date Of Birth</th>
                                                <th data-ordering="false">Mobile Number</th>
                                                <th data-ordering="false">Eamil Address</th>
                                                <!-- <th data-ordering="false">Country</th>
                                                <th data-ordering="false">State</th>
                                                <th data-ordering="false">City</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        <?php
				   $q="SELECT * FROM  deposit ORDER BY id ASC";

 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{

	$id="$ro[id]";
    $role="$ro[role]";
	$username="$ro[username]";
    $password="$ro[password]";
    $nod="$ro[nod]";
    $pod="$ro[pod]";
    $dod="$ro[dod]";
    $itd="$ro[itd]";
    $sn="$ro[sn]";
    $sc="$ro[sc]";
    // $nationality="$ro[nationality]";
    // $nok="$ro[nok]";
    // $cv="$ro[cv]";



  print "<tr>

				  <td>
				  $role
				  </td>
                  <td>
				  $username
				  </td>
                  <td>
				  $password
				  </td>
                  <td>
				  $nod
				  </td>
                  <td>
				  $pod
				  </td>
                  <td>
				  $itd
				  </td>
                  <td>
				  $dod
				  </td><td>
				  $sn
				  </td>
                  <td>
				  $sc
				  </td>


          <td>
                                                    <div class='dropdown d-inline-block'>
                                                        <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                            <i class='ri-more-fill align-middle'></i>
                                                        </button>
                                                        <ul class='dropdown-menu dropdown-menu-end'>

                                                            <li><a href='edituser.php?id=$id' class='dropdown-item edit-item-btn'><i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Edit</a></li>
                                                            <li>
                                                                <a href='delete-user.php?id=$id' class='dropdown-item remove-item-btn'>
                                                                    <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>


				  </tr>";

  }
  ?>




                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->




                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include"footer.php";?>
