<?php
session_start();
?>
<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = [
        'state' => '0',
        'message' => 'RESTRICTED ACCESS',
        'display' => 'block',
        'class' => 'alert-danger',
    ];
    header('Location: /index.php');
} else {
    require_once '../Controllers/IndexController.php';
    $user = $_SESSION['user'];
    $userList = getAllUsers();
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: /index.php');
}
if (isset($_POST['i-action'])) {
    if ($_POST['i-action']) {
        $action = str_replace('.', '', $_POST['i-action']);
        $action = str_replace('/', '', $action);
        if (file_exists('../Controllers/'.$action.'.php')) {
            require_once '../Controllers/'.$action.'.php';
        }
    } else {
    }
}
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Eintein Institut Dashboard Template">
    <meta name="author" content="IAI SMS">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>IAI E-COMMERCE</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/dark-style.css" rel="stylesheet" />
    <link href="assets/css/transparent-style.css" rel="stylesheet">
    <link href="assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/colors/color1.css" />

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="index.php">
                            <img src="assets/images/brand/logo.png" height="80px" class="header-brand-img desktop-logo" alt="logo">
                            <img src="assets/images/brand/logo-3.png" height="80px" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="main-header-center ms-3 d-none d-lg-block">
                            <input class="form-control" placeholder="Search for results..." type="search">
                            <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <div class="dropdown d-none">
                                <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fe fe-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- SEARCH -->
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown  d-flex">
                                            <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                                            </a>
                                        </div>
                                        <!-- Theme-Layout -->
                                        <div class="dropdown d-flex">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <i class="fe fe-minimize fullscreen-button"></i>
                                            </a>
                                        </div>
                                        
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                                <img src="assets/images/users/<?php echo $user['image']; ?>" alt="profile-user"
                                                    class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold"><?php echo $user['name']; ?></h5>
                                                        <small class="text-muted">Senior Admin</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <!-- <a class="dropdown-item" href="profile.php">
                                                    <i class="dropdown-icon fe fe-user"></i> Profile
                                                </a> -->
                                                <!-- <a class="dropdown-item" href="email-inbox.php">
                                                    <i class="dropdown-icon fe fe-mail"></i> Inbox
                                                    <span class="badge bg-danger rounded-pill float-end">5</span>
                                                </a> -->
                                                <!-- <a class="dropdown-item" href="lockscreen.php">
                                                    <i class="dropdown-icon fe fe-lock"></i> Lockscreen
                                                </a> -->
                                                <form method="post">
                                                    <button class="dropdown-item" name="logout">
                                                        <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.php">
                            <img src="assets/images/brand/logo.png" height="80px" class="header-brand-img desktop-logo" alt="logo">
                            <img src="assets/images/brand/logo-1.png" height="80px" class="header-brand-img toggle-logo"
                                alt="logo">
                            <img src="assets/images/brand/logo-2.png" height="80px" class="header-brand-img light-logo" alt="logo">
                            <img src="assets/images/brand/logo-3.png" height="80px" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Main</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="dashboard.php"><i
                                        class="side-menu__icon fe fe-user"></i><span
                                        class="side-menu__label">Manage Users</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="command.php"><i
                                        class="side-menu__icon fe fe-user"></i><span
                                        class="side-menu__label">View Orders</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="drug.php"><i
                                        class="side-menu__icon fe fe-activity"></i><span
                                        class="side-menu__label">Manage Foods</span></a>
                            </li>
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 id="title" class="page-title" style="display:block"><?php echo 'WELCOME'.' '.$user['fname'].' !'; ?></h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $user['fname']."'s ".'Dashboard'; ?></li>
                                    
                                    <!-- <?php var_dump($_SESSION['user']); ?> -->
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="card-title mb-0">Users</h3>
                                        <div id="open-modal" class="container-login100-form-btn" style="width:100px">
                                            <button id="open-modal"  class="login100-form-btn btn-primary">New</button>	                    
                                        </div>
                                    </div>
                                    <div id="userForm" class="wrap-login100 p-6" style="display:none;">
                                        <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="i-action" value="IndexController" />
                                            <input type="hidden" name="action" value="register" />
                                            <input type="hidden" id="user_id" name="user_id" value="" />
                                            <span class="login100-form-title">
                                                    User Form
                                            </span>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" id="fname" name="fname" type="text" placeholder="Full names" required>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" id="uname" name="uname" type="text" placeholder="User name" required>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" id="email" name="email" type="email" placeholder="Email" required>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-phone" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 ms-0 form-control" id="phone" name="phone" type="text" placeholder="Phone" required>
                                            </div>
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Select Account Type</h4>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-select-all" aria-hidden="true"></i>
                                                </a>
                                                <select class="input100 border-start-0 ms-0 form-control" id="accountType" name="accountType" required>
                                                    <option value="ADMIN">ADMIN</option>
                                                    <option value="TRANSLATOR">TRANSLATOR</option>
                                                </select> 
                                            </div>
                                            <div id="passwordInput">
                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 ms-0 form-control" id="password" name="password" type="password" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <!-- Upload image input-->
                                            <div class="input-group rounded-pill bg-white shadow-sm">
                                                <input name="image_upload" id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                                <!-- <label id="upload-label" for="upload" class="font-weight-light text-muted"></label> -->
                                                <div class="input-group-append">
                                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                                </div>
                                            </div>

                                            <div class="" id="pic" style="display:none;margin-top:10px">
                                                    <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-lg mx-auto d-block" style="height:240px;width:240px;">
                                            </div>
                                            <label class="custom-control custom-checkbox mt-4" id="valid-control">
                                                <input type="checkbox" id="box" name="box" class="custom-control-input" required>
                                                <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
                                            </label>
                                            <div class="container-login100-form-btn">
                                                <button id="close-modal" aria-label="Close" class="btn-close login100-form-btn btn-danger" style="width:100px;margin-left:10px"
                                                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">Cancel</span></button> 
                                                <!-- <button id="close-modal" style="width:100px;margin-right:30px"  class="login100-form-btn btn-danger">Cancel</button>	     -->
                                                <button type="submit" style="width:100px;margin-left:10px"  class="login100-form-btn btn-primary">Save</button>	    
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-4 -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">Users List</h3>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
                                                    <div class="tab-menu-heading border-0 p-0">
                                                        <div class="tabs-menu1">
                                                            <!-- Tabs -->
                                                            <ul class="nav panel-tabs product-sale">
                                                                <li><a href="#tab5" class="active"
                                                                        data-bs-toggle="tab">All Users</a></li>
                                                                <!-- <li><a href="#tab6" data-bs-toggle="tab"
                                                                        class="text-dark">Admin</a></li>
                                                                <li><a href="#tab7" data-bs-toggle="tab"
                                                                        class="text-dark">Translator</a></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body tabs-menu-body border-0 pt-0">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab5">
                                                                <div class="table-responsive">
                                                                    <table id="data-table"
                                                                        class="table table-bordered text-nowrap mb-0">
                                                                        <thead class="border-top">
                                                                            <tr>
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">User Id</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    User Name</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    User Email</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    Phone</th>
                                                                                <th
                                                                                    class="bg-transparent border-bottom-0">
                                                                                    Account Type</th>
                                                                                <th class="bg-transparent border-bottom-0"
                                                                                    style="width: 5%;">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <!-- <tr class="border-bottom">
                                                                                <td class="text-center">
                                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                                        <h6
                                                                                            class="mb-0 fs-14 fw-semibold">
                                                                                            #1</h6>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <span class="avatar bradius"
                                                                                            style="background-image: url(assets/images/users/IMG_4586.jpg)"></span>
                                                                                        <div
                                                                                            class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                            <h6
                                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                                Anderson</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <div
                                                                                            class="mt-0 mt-sm-3 d-block">
                                                                                            <h6
                                                                                                class="mb-0 fs-14 fw-semibold">
                                                                                                Kamsonganderson39@gmail.com</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td><span class="mt-sm-2 d-block">652156526</span></td>
                                                                                <td><span
                                                                                        class="fw-semibold mt-sm-2 d-block">Admin</span>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="mt-sm-1 d-block">
                                                                                        <span
                                                                                            class="badge bg-success-transparent rounded-pill text-success p-2 px-3">Pending</span>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="g-2">
                                                                                        <a class="btn text-primary btn-sm"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Edit"><span
                                                                                                class="fe fe-edit fs-14"></span></a>
                                                                                        <a class="btn text-danger btn-sm"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-original-title="Delete"><span
                                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr> -->
                                                                            <?php
                                                                                while ($data = mysqli_fetch_assoc($userList)) { 
                                                                                    $jsonData = json_encode($data);
                                                                                    echo '
                                                                                    <tr class="border-bottom">
                                                                                        <td class="text-center">
                                                                                            <div class="mt-0 mt-sm-2 d-block">
                                                                                                <h6
                                                                                                    class="mb-0 fs-14 fw-semibold">
                                                                                                    #'.$data['user_id'].'</h6>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="d-flex">
                                                                                                <span class="avatar bradius"
                                                                                                    style="background-image: url(assets/images/users/'.$data['image'].')"></span>
                                                                                                <div
                                                                                                    class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                                    <h6
                                                                                                        class="mb-0 fs-14 fw-semibold">
                                                                                                        '.$data['name'].'</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="d-flex">
                                                                                                <div
                                                                                                    class="mt-0 mt-sm-3 d-block">
                                                                                                    <h6
                                                                                                        class="mb-0 fs-14 fw-semibold">
                                                                                                        '.$data['email'].'</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td><span class="mt-sm-2 d-block">'.$data['phone'].'</span></td>
                                                                                        <td><span
                                                                                                class="fw-semibold mt-sm-2 d-block">'.$data['accountType'].'</span>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="g-2">
                                                                                                <a onclick="UpdateAccount(`'.$data['user_id'].'`,`'.$data['fname'].'`,`'.$data['name'].'`,`'.$data['email'].'`,`'.$data['accountType'].'`,`'.$data['phone'].'`,`'.$data['image'].'`)" 
                                                                                                href="#userForm"
                                                                                                class="btn text-primary btn-sm"
                                                                                                    data-bs-toggle="tooltip"
                                                                                                    data-bs-original-title="Edit"><span
                                                                                                        class="fe fe-edit fs-14"></span></a>
                                                                                                <a onclick="DeleteAccount(`'.$data['user_id'].'`,`'.$data['name'].'`)" class="btn text-danger btn-sm"  
                                                                                                    data-bs-target="#country-selector"
                                                                                                    data-bs-toggle="modal"><span
                                                                                                    class="fe fe-trash-2 fs-14"></span></a>
                                                                                                </a>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>';
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-4 END -->
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>

        <!-- Sidebar-right -->
        
        <!--/Sidebar-right-->

        <!-- Country-selector modal-->
        <div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content country-select-modal">
                    <div class="modal-header">
                        <h6 class="modal-title" id="Test2">Deleting User<h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="i-action" value="IndexController" />
                            <input type="hidden" name="action" value="deleteUser" />
                            <input type="hidden" id="user_id" name="user_id" value="" />
                            <div id="deletModal"></div>
                            <div class="container-login100-form-btn">
                            <button aria-label="Close" class="btn-close login100-form-btn btn-primary" style="width:100px;margin-left:10px"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">Close</span></button>   
                                <button type="submit" style="width:100px;margin-left:10px"  class="login100-form-btn btn-danger">DELETE</button>	    
                            </div>
                        </form>                  
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Country-selector modal-->

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © 2024 
                        <!-- <a href="javascript:void(0)">Sash</a> -->
                        . Designed 
                        <!-- with  -->
                        <!-- <span class="fa fa-heart text-danger"></span> -->
                        by IAI SMS
                        <!-- <a href="javascript:void(0)"> Spruko </a> -->
                         All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="assets/js/jquery.sparkline.min.js"></script>

    <!-- Sticky js -->
    <script src="assets/js/sticky.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="assets/js/circle-progress.min.js"></script>

    <!-- PIETY CHART JS-->
    <script src="assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="assets/plugins/peitychart/peitychart.init.js"></script>

    <!-- SIDEBAR JS -->
    <script src="assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="assets/plugins/p-scroll/pscroll.js"></script>
    <script src="assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <!-- <script src="assets/plugins/chart/Chart.bundle.js"></script>
    <script src="assets/plugins/chart/rounded-barchart.js"></script>
    <script src="assets/plugins/chart/utils.js"></script> -->

    <!-- INTERNAL SELECT2 JS -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>

    <!-- INTERNAL Data tables js-->
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>

    <!-- INTERNAL APEXCHART JS -->
    <!-- <script src="assets/js/apexcharts.js"></script>
    <script src="assets/plugins/apexchart/irregular-data-series.js"></script> -->

    <!-- C3 CHART JS -->
    <!-- <script src="assets/plugins/charts-c3/d3.v5.min.js"></script>
    <script src="assets/plugins/charts-c3/c3-chart.js"></script> -->

    <!-- CHART-DONUT JS -->
    <script src="assets/js/charts.js"></script>

    <!-- INTERNAL Flot JS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/plugins/flot/chart.flot.sampledata.js"></script>
    <script src="assets/plugins/flot/dashboard.sampledata.js"></script>

    <!-- INTERNAL Vector js -->
    <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="assets/js/index1.js"></script>

    <!-- Color Theme js -->
    <script src="assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="assets/js/custom.js"></script>
    <script>
  document.getElementById("open-modal").addEventListener("click", function() {
	document.getElementById("userForm").style.display = "block";
	document.getElementById("open-modal").style.display = "none";
    document.getElementById("passwordInput").style.display = "block"; 
    document.getElementById("valid-control").style.display = "block";
    document.getElementById("pic").style.display = "none";
    document.getElementById("password").setAttribute("required", "");
    document.getElementById("box").setAttribute("required", "");
  });
    function UpdateAccount(id,fname,uname,email,accountType,phone,image) {
        $("#user_id").val(id)
        $("#fname").val(fname)
        $("#uname").val(uname)
        $("#email").val(email)
        $("#accountType").val(accountType)
        $("#phone").val(phone)            
        var path = "assets/images/users/"+image
        document.getElementById("passwordInput").style.display = "none"; 
        document.getElementById("password").removeAttribute("required");
        document.getElementById("box").removeAttribute("required");
        document.getElementById("valid-control").style.display = "none";
        document.getElementById("userForm").style.display = "block"; 
        $('#imageResult').attr('src', path); 
        document.getElementById("pic").style.display = "block";
        document.getElementById("userForm").focus();
	    document.getElementById("open-modal").style.display = "none";
    }
   function DeleteAccount(id,data) {
        $("#user_id").val(id)
        var element = document.getElementById("deletModal");
        var newElement = document.createElement("h3");
        newElement.textContent = "Are you sure you want to delete User of name  "+ data +" and Id "+ id +".";
        element.appendChild(newElement);
    };

  document.getElementById("close-modal").addEventListener("click", function() {
	document.getElementById("userForm").style.display = "none";
	document.getElementById("open-modal").style.display = "block";

  });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageResult')
                    .attr('src', e.target.result);
                    $( "#pic" ).css( "display", "block" )
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}
        if($('.alert:visible').fadeOut(8000 )){
          
        };        
    </script>


</body>

</html>