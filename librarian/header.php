
<?php
require_once '../dbcon.php';

$page1=(explode('/',$_SERVER['PHP_SELF']));
$page = end($page1);
echo $page;

session_start();
if (! isset($_SESSION['librarian_login'])){
    header('location: login.php');
}
$librarian_login = $_SESSION['librarian_login'];
$data = mysqli_query($con,"SELECT * FROM `librarian` WHERE `email`='$librarian_login'");
$librarian_info = mysqli_fetch_assoc($data);
?>


<!doctype html>
<html lang="en" class="fixed left-sidebar-top">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>

    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


</head>

<body>
<body data-gr-c-s-loaded="true" class="  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <a href="index.php" class="on-click">
                    <h3 style="color:#fff;">LMS</h3>
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>
            <!--SEARCH HEADERBOX-->
            <div class="header-section" id="search-headerbox">
                <input type="text" name="search" id="search" placeholder="Search...">
                <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                <div class="header-separator"></div>
            </div>

            <!--USER HEADERBOX -->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img alt="profile photo" src="../assets/images/avatar/avatar_user.jpg">
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?= ucwords($librarian_info['firstname']).' '.ucwords($librarian_info['lastname']) ?></span>
                        <span class="user-profile">Admin</span>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li> <a href="librarian-profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a href="logout.php" data-toggle="tooltip" data-placement="left" title="" data-original-title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            <div id="left-nav" class="nano has-scrollbar">
                <div class="nano-content" tabindex="0" style="right: -17px;">
                    <nav>
                        <ul class="nav nav-left-lines" id="main-nav">
                            <!--HOME-->
                            <li class="<?php echo $page == 'index.php' ? 'active-item':'' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                            <li class="<?php echo $page == 'students.php' ? 'active-item':'' ?>"><a href="students.php"><i class="fa fa-users" aria-hidden="true"></i><span>All Students</span></a></li>

                            <li class="has-child-item close-item <?php echo $page == 'add-book.php' ? 'open-item':'' ?><?php echo $page =='manage-book.php' ? 'open-item':'' ?>">
                                <a><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a>
                                <ul class="nav child-nav level-1" style="">
                                    <li class="<?php echo $page == 'add-book.php' ? 'active-item':'' ?>"><a href="add-book.php">Add Book</a></li>
                                    <li class="<?php echo $page == 'manage-book.php' ? 'active-item':'' ?>"><a href="manage-book.php">Manage Book</a></li>

                                </ul>
                            </li>

                            <li class="<?php echo $page == 'issue-book.php' ? 'active-item':'' ?>"><a href="issue-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book</span></a></li>
                            <li class="<?php echo $page == 'return-book.php' ? 'active-item':'' ?>"><a href="return-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Return Book</span></a></li>
                        </ul>

                    </nav>
                </div>
                <div class="nano-pane" style="display: block;"><div class="nano-slider" style="height: 299px; transform: translate(0px);"></div></div></div>
        </div>
        <!-- CONTENT -->
        <!-- ========================================================= -->
        <div class="content">
