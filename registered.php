<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/config.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="add.php" class="form-group" method="POST">
                    <div class="modal-body">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                        <label for="">Email</label>
                        <input type="Email" class="form-control" name="email" placeholder="Enter your email" required>
                        <label for="">Phone No.</label>
                        <input type="tel" class="form-control" name="phone" placeholder="Enter your Phone" required>
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        <label for=""> Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Enter your comfirm password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="adduser" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Users -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="add.php" class="form-group" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_id">
                        <p>Are you sure. you want to detete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="detelebtn" class="btn btn-primary">Yes, Delele</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Registered Users</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h2>" . $_SESSION['status'] . "</h2>";
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registered Users

                        </h3>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add User</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone NO.</th>
                                    <!-- <th>Status</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql  = "SELECT * FROM `users`";

                                $res = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($res) > 0) {
                                    foreach ($res as $row) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?>
                                            </td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <!-- <td> <?php echo $row['password']; ?></td> -->
                                            <td>
                                                <a href="registered-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Edit</a>
                                                <button type="button" class="btn btn-danger btn-sm deletebtn" value="<?php echo $row['id']; ?>"><i class="fas fa-trash"></i>Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                <?php
                                } else {
                                ?>
                                    <tr>
                                        <td>No Record Found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>






            </div>

            <?php include('includes/script.php'); ?>
            <script>
                $(document).ready(function() {
                    $('.deletebtn').click(function(e) {
                        e.preventDefault();

                        var id = $(this).val();
                        // console.log(id);
                        $('.delete_id').val(id);
                        $('#DeleteModal').modal('show');
                    });
                });
            </script>


            <?php include('includes/footor.php'); ?>