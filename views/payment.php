<?php
session_start();
include_once '../config/conn.php';
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
if (isset($_SESSION['payment'])) {
    $data = json_decode($_SESSION['payment'], true);
}else {
    header('Location:signup.php');
}
if (!isset($_SESSION['message'])) {
    $message = [
        'state' => '0',
        'message' => '',
        'display' => 'none',
        'class' => '',
    ];
//unset($_SESSION['message']);
} else {
    $message = $_SESSION['messageRegister'];
    // unset($_SESSION['message']);
}
?>
<?php //var_dump($message);?>
<!doctype html>
<html lang="en" >

<head>

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
    <title>Institut_Eintein </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- <link href="assets/css/dark-style.css" rel="stylesheet" /> -->
    <!-- <link href="assets/css/transparent-style.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/skin-modes.css" rel="stylesheet" /> -->

    <!--- FONT-ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/colors/color1.css" />

    <style>
        :root{
            --primary06: #010e35e8  !important;
        }
        body{
            background: var(--primary06);
            opacity: 1;
        }
    </style>
</head>

<body class="">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center logo1">
                    <a href="index.php">
                        <div class="logo">
                            <img src="assets/img/logo.jpeg" width="100%" height="100%" alt="">
                        </div>            
                    </a>
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" method="post" id="paymentForm">
                            <input type="hidden" name="i-action" value="CandidateController" />
                            <input type="hidden" name="action" value="verifiy" />
                            <input type="hidden" name="id" value="<?php echo $data['reference'];?>" />
                            <div class=" <?php echo $message['class']; ?> font-weight-bold" style="width:90%;display:<?php echo $message['display']; ?>;">
                                <!-- <a class="close col text-right" data-dismiss="alert" href="#">&times;</a> -->
                               <center><strong><?php
                                    echo $message['message'].'!';
                                    echo "<br />";
                                    echo "You operator is ".$data['operator'];
                                    echo ". Use the code: ".$data['ussd_code']." to valid the transaction on your phone";
                                    echo "<br />";
                                    echo "<em style='color:red'>Closing this page will  cancel the transaction</em>";
                               ?></center></strong>
                            </div>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <img src="assets/images/loader.svg" class="loader-img" alt="Loader">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="assets/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="assets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="assets/js/custom.js"></script>
    <script>
        if($('.alert:visible').fadeOut(8000 )){
          
        };        
    </script>
    <script>
        let attempts = 0; // Initialize attempts counter outside the interval
        let maxAttempts = 5; // Set maximum attempts 

        const intervalId = setInterval(async () => {
            attempts++;
            if (attempts > maxAttempts) {
                clearInterval(intervalId)
            }
            let payResponse = await attemptPayment(id);
            if (payResponse) {
                let status = payResponse.status
                if (status === 'FAILED') {
                    clearInterval(intervalId)
                }
                if (status === 'SUCCESSFUL') {
                    clearInterval(intervalId)
                }
            }
        }, 15000);
        const form = document.getElementById('paymentForm');
        // const submitButton = form.querySelector('input[type="submit"]');

        function submitForm() {
            // console.log("form submitting");
          form.submit();
        }

        // submitButton.disabled = true; // Disable submit button initially

        setTimeout(submitForm, 10000); // Submit form after 30 seconds

    </script>
</body>

</html>
