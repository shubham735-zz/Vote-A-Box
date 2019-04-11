
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Voteabox</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?=base_url('assets/vendor/datatables/dataTables.bootstrap4.css')?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/css/sb-admin.css')?>" rel="stylesheet">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?=base_url()?>">Voteabox</a>

    <button class="btn btn-link btn-sm text-white bg-green order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->

    <!-- Navbar -->
    <a href="#" class="navbar-brand mr-1" style="margin-left:58em"><?=$_SESSION['name']?></a>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('')?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <?php
      if ($_SESSION['type']==1) {
       ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Poll/create')?>">
              <i class="fas fa-fw fa-plus"></i>
              <span>Create New Poll</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Poll/prev_poll')?>">
              <i class="fas fa-fw fa-list"></i>
              <span>Manage Previous Polls</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Users/view')?>">
              <i class="fas fa-fw fa-id-card"></i>
              <span>Manage Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Users/add')?>">
              <i class="fas fa-fw fa-user-plus"></i>
              <span>Add New User</span>
            </a>
          </li>
          <?php
        }

        ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Poll/cast')?>">
              <i class="fas fa-fw fa-fire"></i>
              <span>Cast A Vote</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Poll/myPoll')?>">
              <i class="fas fa-fw fa-university"></i>
              <span>View My Poll</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Auth/password/').base64_encode($_SESSION['id'])?>">
              <i class="fas fa-fw fa-key"></i>
              <span>Change Password</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Auth/logout')?>">
              <i class="fas fa-fw fa-sign-out-alt"></i>
              <span>Log Out</span>
            </a>
          </li>
    </ul>
<div id="content-wrapper">

      <div class="container-fluid">
