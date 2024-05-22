<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
?>
<?php
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
if (!isset($_SESSION['messageRegister'])) {
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/registration.css">
    <link rel="stylesheet" href="assets/icons/css/all.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link href="assets/src/css/lightbox.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Eintein</title>
</head>
<body>
    <div class="box"></div>
    <div class="header">
        <a href="index.php">
            <div class="logo">
                <img src="assets/img/logo.jpeg" width="100%" height="100%" alt="">
            </div>            
        </a>
        <a href="index.php"><i class="fas fa-house"><span class="text"> Home</span></i></a>
    </div>
    <div class="circle"></div>
   
    <div class="container">
        <div class="images gallery">
            <div class="img img1">
                <a href="assets/img/b.png" data-lightbox="models"> <img src="assets/img/b.png" alt=""></a>  
            </div>
            <div class="img img2">
                <a href="assets/img/b1.png" data-lightbox="models"> <img src="assets/img/b1.png" alt=""></a> 
            </div>
            <div class="img img3">
                <a href="assets/img/b2.png" data-lightbox="models"> <img src="assets/img/b.png" alt=""></a> 
            </div>
        </div>
        <div class="">
        <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="i-action" value="CandidateController" />
            <input type="hidden" name="action" value="registerCandidate" />
                <h2>Registration <span class="color">Form</span></h2>
                <div class="alert <?php echo $message['class']; ?> font-weight-bold" style="width:90;display:<?php echo $message['display']; ?>;">
                    <!-- <a class="close col text-right" data-dismiss="alert" href="#">&times;</a> -->
                   <center><strong><?php
                        echo $message['message'].'!';
                   ?></center></strong>
                </div>
                <div class="d-flex">
                    <input id="name" name="name" type="text" placeholder="Name" class="form-control me-2" aria-describedby="nameHelp" id="validationCustom2" required>
                    <input id="Sname" name="sname" type="text" placeholder="Surname" class="form-control" aria-describedby="nameHelp" id="validationCustom03" required>
                </div>
                <input id="email" name="email" type="email" placeholder="Enter E-mail" class="form-control" aria-describedby="nameHelp" id="validationCustom04" required>
                <input id="address" name="address" type="text" placeholder="Address" class="form-control" aria-describedby="nameHelp" id="validationCustom05" required>
                <input id="NIC" name="NIC" type="text" placeholder="ID Card number" class="form-control" aria-describedby="nameHelp" id="validationCustom06" required>
                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" aria-describedby="nameHelp" id="validationCustom07" required>
                <input id="dob" name="dob" type="Date" placeholder="Date of Birth" class="form-control" aria-describedby="nameHelp" id="validationCustom08" required>
                <select name="gender" id="gender" class="form-control" aria-describedby="nameHelp" id="validationCustom09" required>
                    <option value="" disabled selected>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <select name="course" id="course" class="form-control" aria-describedby="nameHelp" id="validationCustom01" required>
                    <option value="" disabled selected>Select Course</option>
                    <option value="german">German</option>
                    <option value="french">French</option>
                    <option value="english">English</option>
                </select>
                <select name="level" id="level" class="form-control" aria-describedby="nameHelp" id="validationCustom01" required>
                    <option value="" disabled selected>Select Level</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                </select>
                <select name="purpose" id="purpose" class="form-control" aria-describedby="nameHelp" id="validationCustom01" required>
                    <option value="" disabled selected>Select Purpose</option>
                    <option value="Private Classes">Private Classes</option>
                    <option value="Online Classes">Online Classes</option>
                    <option value="Preparation to Test">Preparation to Test</option>
                </select>
                <select name="test" id="germanTest" class="form-control" aria-describedby="nameHelp" id="validationCustom01" style="display:none" >
                    <option value="" disabled selected>Select German Test</option>
                    <option value="Goethe">Goethe</option>
                    <option value="ECL">ECL</option>
                    <option value="TestDaf">TestDaf</option>
                </select>
                <select name="test" id="englishTest" class="form-control" aria-describedby="nameHelp" id="validationCustom01" style="display:none" >
                    <option value="" disabled selected>Select English Test</option>
                    <option value="TOEFL">TOEFL</option>
                    <option value="IELTS">IELTS</option>
                    <option value="SAT">SAT</option>
                    <option value="DUOLINGUD">DUOLINGUD</option>
                </select>
                <select name="test" id="frenchTest" class="form-control" aria-describedby="nameHelp" id="validationCustom01" style="display:none" >
                    <option value="" disabled selected>Select French Test</option>
                    <option value="TEF">TEF</option>
                    <option value="TCF">TCF</option>
                    <option value="DELF">DELF</option>
                    <option value="DALF">DALF</option>
                </select>
                <label>Your Registration Fees is:<b id="registrationFee2"></b>(FCFA)</label>
                <input id="registrationFee" disabled name="registrationFee" type="text" placeholder="registration Fee" class="form-control" aria-describedby="nameHelp" id="validationCustom07" required>
                <input id="phonePayment" name="phonePayment" type="text" placeholder="phone Payment" class="form-control" aria-describedby="nameHelp" id="validationCustom07" required>
                <input type="submit" value="Submit" class="btn">
            </form>
        </div>
    </div>
    
    <!-- Vendor JS Files -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/src/js/lightbox.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script>
        lightGallery(document.querySelector('.gallery'));
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')
            
            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }
                
                form.classList.add('was-validated')
            }, false)
            })
        })()
  </script> 
  <script>
    const purposeInput = document.getElementById('purpose');
    purposeInput.addEventListener('change', function() {
        let lanague =  document.getElementById("course").value;
        const newValue = this.value;
	    document.getElementById("germanTest").style.display = "none";
	    document.getElementById("frenchTest").style.display = "none";
	    document.getElementById("englishTest").style.display = "none";
        document.getElementById("registrationFee").value = '5000'
        if (newValue == 'Preparation to Test') {
            if (lanague == 'german') {
                document.getElementById("germanTest").style.display = "block";
                document.getElementById("germanTest").value = ''
                // document.getElementById("registrationFee").value = '5.000 FCFA'
            } else if (lanague == 'french') {
	            document.getElementById("frenchTest").style.display = "block";
                document.getElementById("frenchTest").value = ''
                // document.getElementById("registrationFee").value = '5.000 FCFA'

            } else  {
                document.getElementById("englishTest").value = ''
                document.getElementById("englishTest").style.display = "block";
                // document.getElementById("registrationFee").value = '5.000 FCFA'
            }
        }else{
            if (lanague == 'german') {
                document.getElementById("registrationFee").value = '10000'
            }
        }
    });
    const courseInput = document.getElementById('course');
    courseInput.addEventListener('change', function() {
        let newValue =  document.getElementById("purpose").value;
        const lanague = this.value;
	    document.getElementById("germanTest").style.display = "none";
	    document.getElementById("frenchTest").style.display = "none";
	    document.getElementById("englishTest").style.display = "none";
        document.getElementById("registrationFee").value = '5000';
        if (newValue == 'Preparation to Test') {
            if (lanague == 'german') {
                document.getElementById("germanTest").style.display = "block";
                document.getElementById("germanTest").value = ''
            } else if (lanague == 'french') {
	            document.getElementById("frenchTest").style.display = "block";
                document.getElementById("frenchTest").value = ''

            } else  {
                document.getElementById("englishTest").value = ''
                document.getElementById("englishTest").style.display = "block";
            }
        }else{
            if (lanague == 'german') {
                document.getElementById("registrationFee").value = '10000'
            }
        }
    });
  </script>
  <script>
        $(function(){
            $("#dob").datepicker({
                changeMonth: true,
                changeYear:true,
                yearRange: "1994:2024"
            });
        });
        if($('.alert:visible').fadeOut(2000 )){
          
        };        
    </script>
</body>
</html>