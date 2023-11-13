<?php
//connexão à BD;
$sname= "localhost";
$unmae= "root";
$password= "localhostMiguel";

$db_name= "empresa";

$conn= mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection Failed";

}
?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inclubo</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../indexlogged.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="../userImages/INCLUBO.png" style="width: 70px; height: 70px; transform: rotate(15deg)">
            </div>
            <div class="sidebar-brand-text mx-3">Inclubo</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="../indexlogged.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

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
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search AudioBooks.."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Miguel Carvalho</span>
                                <img class="img-profile rounded-circle"
                                     src="../img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">


                            <h1 align="center " class="h3 mb-2 text-gray-800">Harry Potter and the Sorcerer's Stone</h1>

                            <br /> <br />

                            <div class="main-container2">
                                <div class="inline-lol">
                                    <img class="poster2" src="../moviesImages/hp.jpg" />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div>
                                        <h6>An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world.</h6>
                                        <br />
                                        &nbsp;&nbsp;&nbsp;<h7><b>Fantasy, Young Adult Fiction</b></h7>
                                        <br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h7><b>2002</b></h7>
                                        <br /><br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h7><b><u>Warner Bros.</u></b></h7>
                                    </div>
                                </div>

                                <p style="margin-left: 6.5%; margin-top: 1%">★3.8</p>

                            </div>
                            <br />
                            <br />
                <div style="display: flex; flex-direction: row; align-items: center;">
                    <div style="margin-right: 20px;">
                        <p>Listen in Portuguese</p>
                        <audio class="spain-button" controls src="../audios/portuguese.mp3"></audio>
                    </div>
                    <div style="margin-right: 20px;">
                        <p>Listen in Spanish</p>
                        <audio class="spain-button" controls src="../audios/spanish.mp3"></audio>
                    </div>
                    <div style="margin-right: 20px;">
                        <p>Listen in Italian</p>
                        <audio class="spain-button" controls src="../audios/Italian.mp3"></audio>
                    </div>
                    <div style="margin-right: 20px;">
                        <p>Listen in Georgian</p>
                        <audio class="spain-button" controls src="../audios/georgian.mp3"></audio>
                    </div>
                    <div>
                        <p>Listen in Czech</p>
                        <audio class="spain-button" controls src="../audios/czech.mp3"></audio>
                    </div>
                </div>

                <br />
                <h1 class="h3 mb-2 text-gray-800"></h1>



            </div>

            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Inclubo 2023</span>
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

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
