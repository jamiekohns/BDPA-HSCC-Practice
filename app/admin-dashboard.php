
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php'; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php'; ?>


  <div class="jumbotron">
    <div class="container">
        <!-- Change the Admin to the persons actual name-->
      <h1 class="display-3">Hello, Admin</h1>
      <p>.</p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Create new user</h2>
        <p>Create new users lower than your permissions</p>
        <p><a class="btn btn-secondary" href="#" role="button">Create Accounts &raquo;</a></p>
      </div>
      <div class="col-md-6">
        <h2>Modify Users</h2>
        <p>View all user accounts and/or edit/delete accounts</p>
        <p><a class="btn btn-secondary" href="/account_modify.php" role="button">View Accounts &raquo;</a></p>
      </div>
    </div>
    <hr>

  </div> <!-- /container -->


<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>
