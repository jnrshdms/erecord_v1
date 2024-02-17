<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/addaccbar.php'; ?>

<div class="content-wrapper" style="background: #FFF;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Account Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">E-Record System</a></li>
                        <li class="breadcrumb-item active">Account Management</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="card card-light" style="background: #fff; border-top: 2px solid #1e96fc;">
                <div class="card-header">
                    <h3 class="card-title"><img src="../../dist/img/acct-user.png" style="height:28px;">&ensp;Account Management Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-3">
                            <!-- search full name -->
                            <input type="text" name="username_search" id="username_search" class="form-control" placeholder="Username" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-3">
                        </div>
                        <div class="col-sm-3">
                            <!-- search button -->
                            <button class="btn btn-block d-flex justify-content-left" id="username_search" onclick="search_account()" style="color:#fff;height:34px;border-radius:.25rem;background: #20c997;font-size:15px;font-weight:normal;"><img src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
                        </div>
                        <div class="col-sm-3">
                            <!-- add account button -->
                            <a class="btn btn-block d-flex justify-content-left" data-toggle="modal" data-target="#addapprover" style="color:#000;height:34px;border-radius:.25rem;background: #F29A35;font-size:15px;font-weight:normal;"><img src="../../dist/img/add-user.png" style="height:19px;">&nbsp;&nbsp;Add Account</a>

                        </div>
                    </div>
                    <!-- table -->
                    <div class="card-body table-responsive m-0 p-0" style="max-height: 500px;">
                        <table class="table col-12 mt-3 table-head-fixed text-nowrap table-hover" id="" style="background: #F9F9F9;">
                            <thead style="text-align: center;">
                                <!-- table switching content -->
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Role</th>
                            </thead>
                            <tbody style="text-align: center;" class="mb-0" id="account_list">
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                        <div class="spinner-border text-dark" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/addacc_script.php'; ?>
