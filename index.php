<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application Using PHP OOPS PDO MySQL & FETCH API of ES6</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<!-- Add New User Modal Start -->
<div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-user-form" class="p-2" novalidate>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="first_name" class="form-control form-control-lg" placeholder="Enter First Name" required>
                            <div class="invalid-feedback">First name is required!</div>
                        </div>

                        <div class="col">
                            <input type="text" name="last_name" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                            <div class="invalid-feedback">Last name is required!</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter username" required>
                        <div class="invalid-feedback">username is required!</div>
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
                        <div class="invalid-feedback">E-mail is required!</div>
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter Password" required>
                        <div class="invalid-feedback">Password is required!</div>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add New User Modal End -->

<!-- Edit User Modal Start -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit user form -->
                <form id="edit-user-form" class="p-2" novalidate>
                    <input type="hidden" name="id" id="editUserId">
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="first_name" id="editFirstName" class="form-control form-control-lg" placeholder="Enter First Name" required>
                            <div class="invalid-feedback">First name is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="last_name" id="editLastName" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                            <div class="invalid-feedback">Last name is required!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" id="editEmail" class="form-control form-control-lg" placeholder="Enter E-mail" required>
                        <div class="invalid-feedback">E-mail is required!</div>
                    </div>
                    <div class="mb-3">
                        <input type="tel" name="username" id="editUsername" class="form-control form-control-lg" placeholder="Enter Username" required>
                        <div class="invalid-feedback">Username is required!</div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="editPassword" class="form-control form-control-lg" placeholder="Enter Password" required>
                        <div class="invalid-feedback">Password is required!</div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-block btn-lg" id="edit-user-btn">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit User Modal End -->
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-primary">All users in the database!</h4>
            </div>
            <div>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Add New User</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div id="showAlert"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="main.js"></script>
</body>

</html>
