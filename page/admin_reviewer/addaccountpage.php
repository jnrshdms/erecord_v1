<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/addaccbar.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Add Account</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Account</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="container-fluid">
<div class="card">
<div class="card-header">
<button class="btn btn-danger" data-toggle="modal" data-target="#addacc">ADD  <i class="fa fa-plus-circle"></i></button>
<div class="card-tools">
<div class="input-group input-group-sm">
<input type="text" name="" id="username_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default" onclick="search_data()">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>#</th>
<th>Full Name</th>
<th>Role</th>
<th>Username</th>
<th>Password</th>
</tr>
</thead>
<tbody id="account_list">

</tbody>
</table>
</div>

</div>

</div>

</div>


<?php include 'plugins/footer.php';?>
<?php include 'plugins/js/addacc_script.php';?>
<?php include 'plugins/js/editacc_script.php';?>