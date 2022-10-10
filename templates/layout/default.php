<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');?>
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <?= $this->Html->css('sb-admin-2.css') ?>
    <?= $this->Html->css('admin.css') ?>


    <?= $this->fetch('meta') ?>


    <?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>
    <?= $this->Html->script('/vendor/tinymce/tinymce/tinymce.min.js') ?>

    <?= $this->fetch('css') ?>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<?php $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, 'admin') !== false)  {
       ?>
       <body id="page-top">


       <!-- Page Wrapper -->
       <div id="wrapper">

           <!-- Sidebar -->
           <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

               <!-- Sidebar - Brand -->
               <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build('/') ?>">
                   <div class="sidebar-brand-icon rotate-n-15">
                       <i class="fas fa-laugh-wink"></i>
                   </div>
                   <div class="sidebar-brand-text mx-3">Jim's Healing</div>
               </a>

               <!-- Divider -->
               <hr class="sidebar-divider my-0">



               <!-- Heading -->
               <div class="sidebar-heading">
                   Interface
               </div>

               <!-- Nav Item - Pages Collapse Menu -->

               <li class="nav-item">
            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'HomeContent', 'action' => 'edit', 1]) ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Home Content</span></a>
        </li>

               <li class="nav-item">
                   <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'index']) ?>">
                       <i class="fas fa-fw fa-chart-area"></i>
                       <span>View Appointments</span></a>
               </li>


               <li class="nav-item">
                   <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Blog', 'action' => 'add']) ?>">
                       <i class="fas fa-fw fa-chart-area"></i>
                       <span>Create Blog Post</span></a>
               </li>

               <!-- Divider -->
               <hr class="sidebar-divider">

               <!-- Sidebar Toggler (Sidebar) -->
               <div class="text-center d-none d-md-inline">
                   <button class="rounded-circle border-0" id="sidebarToggle"></button>
               </div>

           </ul>
           <!-- End of Sidebar -->

           <!-- Content Wrapper -->
           <div id="content-wrapper" class="d-flex flex-column">

               <!-- Main Content -->
               <div id="content">

                   <!-- Topbar -->
                   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                       <!-- Sidebar Toggle (Topbar) -->
                       <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                           <i class="fa fa-bars"></i>
                       </button>

                       <!-- Topbar Search -->


                       <!-- Topbar Navbar -->
                       <ul class="navbar-nav ml-auto">

                           <!-- Nav Item - User Information -->
                           <li class="nav-item dropdown no-arrow">
                               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Jesse</span>
                                   <?= $this->Html->image('undraw_profile.svg', ['class' => 'img-profile rounded-circle']); ?>
                               </a>
                               <!-- Dropdown - User Information -->
                               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                   <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                       <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                       Logout
                                   </a>
                               </div>
                           </li>

                       </ul>

                   </nav>
                   <!-- End of Topbar --> <?php
    }
    else {
     ?>
      <?= $this->element('header') ?>
    <?php }

?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, 'admin') !== false)  { ?>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Jim's Healing the Spirit</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=$this->Url->build('/login/signout', []);?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php }
    else { ?>
 <?= $this->element('footer') ?>
    <?php } ?>

    <!-- Bootstrap core JavaScript-->
    <?= $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>

    <!-- Core plugin JavaScript-->
    <?= $this->Html->script('/vendor/jquery-easing/jquery.easing.min.js') ?>

    <!-- Custom scripts for all pages-->
    <?= $this->Html->script('/js/backtotop.js') ?>
    <?= $this->Html->script('/js/sb-admin-2.min.js') ?>
    <?= $this->fetch('script') ?>


</body>

</html>
