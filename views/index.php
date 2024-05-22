<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
// Language : fr $ en
if (!isset($_SESSION['language'])) {
  $_SESSION['language'] = "fr";
}
if ($_GET) {
  switch ($_GET['lang']) {
    case 'fr':
      $_SESSION['language'] = 'fr';
      break;
    case 'en':
      $_SESSION['language'] = 'en';
      break;
    default:
      $_SESSION['language'] = 'fr';
  }
}
// Define the phone number in international format (without spaces or special characters)
$phoneNumber = '652156526'; // Example number

// URL Encode the message you want to send
$message = urlencode("Hello, I'm interested in your services.");

// Create the WhatsApp link
$whatsAppLink = "https://wa.me/{$phoneNumber}?text={$message}";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ODPHARMA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   <!-- Favicons -->
   <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />


  <!-- Google Fonts -->
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> -->

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css?<?php echo time(); ?>" rel="stylesheet">
  <link rel="stylesheet" href="assets/icons/css/all.css?<?php echo time(); ?>">
  <link href="assets/vendor/aos/aos.css?<?php echo time(); ?>" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css?<?php echo time(); ?>" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css?<?php echo time(); ?>" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/boxicons.min.css?<?php echo time(); ?>">
  <!-- <link href="assets/css/style.css" rel="stylesheet" /> -->
  <link href="assets/css/icons.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css?<?php echo time(); ?>" rel="stylesheet">
  <link href="evo-calendar/css/evo-calendar.css?<?php echo time(); ?>" rel="stylesheet">
  <link href="evo-calendar/css/evo-calendar.midnight-blue.css?<?php echo time(); ?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container head d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo12.png" width="150" height="200" alt="" style="object-fit: contain;">
        <!-- <h1>Einstein<span>.</span></h1> -->
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Home' : 'Accueil'); ?></a></li>
          <!-- <li><a href="about.php"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'About' : 'A propos'); ?></a></li> -->
          <!-- <li><a href="#contact"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Contact us' : 'Contact'); ?></a></li>&nbsp;&nbsp; -->

          <li class="dropdown"><a><span><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Language' : 'Langage'); ?> <b style="color:#297559"><?php echo $_SESSION['language'] ?></b></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <form action="" method="get">
                <li>
                  <label htmlfor="en">
                    <a href="index.php?lang=en" style="color:<?php echo $_SESSION['language'] == 'en' ?  'red' :  ''  ?>"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'English' : 'Anglais'); ?></a>
                  </label>
                </li>
                <!-- <input type="submit" name="en" id="en" value="en" hidden /> -->

                <li>
                  <label htmlfor="fr">
                    <a href="index.php?lang=fr" style="color:<?php echo $_SESSION['language'] == 'fr' ?  'red' :  ''  ?>"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'French' : 'Francais'); ?></a>
                  </label>
                </li>
                <!-- <input type="submit" name="fr" id="fr" value="fr" hidden/> -->


              </form>
            </ul>
          </li>

          <a href="login.php" class="text-black">
            <i class="fas fa-door-open user fs-6" style="margin-right: 5px;"> </i>
            <span class="hovers float-end text-black" style="font-size: 14px;"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Sign-in' : 'Se-connecter'); ?></span>
          </a>

          <!-- <a href="register.php"><i class="fas fa-arrow-right-to-bracket fs-5"></i></a> -->
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table d-sm-flex d-none" href="<?php echo $whatsAppLink ?>"><i class="fab fa-whatsapp text-white fs-4"></i>&nbsp; 670-844-193</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- recent activities -->
  <!-- <section class="activities">
    <h1 class="text-center"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Pharmacy ' : 'Médicaments  '); ?><span class="span"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Drugs' : 'En Pharmacie'); ?></span></h1>
    <div class="container">
      <div class="row"> -->
        <?php include_once('./allFoods.php'); ?>
      <!-- </div>
    </div> -->
    <!-- <a href="allDrugs.php"><div class="btn2"><button type="submit">View All Drugs</button></div></a> -->
  <!-- </section> -->

  <main id="main">

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <?php echo $_SESSION['language'] == 'en' ?
            "      <h2>Testimonials</h2>
      <p>What Are They <span class=\"color\">Saying About Us</span></p>"
            :
            "      <h2>Temoinage</h2>
      <p>Qu'est ce qu'ils <span class=\"color\">disent de nous </span></p>" ?>

        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? "I've been using this online pharmacy for months now, and I couldn't be happier with their service. The website is so easy to navigate, and they have a wide range of medications available. The best part is the fast shipping. I always receive my orders within a few days, and the packaging is discreet. Highly recommend" : "Cela fait des mois que j'utilise cette pharmacie en ligne et je suis vraiment satisfait de leur service. Le site web est très facile à naviguer et ils ont un large choix de médicaments disponibles. Le meilleur, c'est la livraison rapide. Je reçois toujours mes commandes en quelques jours, et l'emballage est discret. Je recommande vivement !
                        ") ?>
                        
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Richard</h3>
                      <h4>
                      <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Ceo & Founder' : 'PDG & Fondateur
                      ' )?> 
                      </h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/test2.png" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? "I was skeptical about using an online pharmacy at first, but this website has exceeded my expectations. Their customer service is top-notch. They answered all my questions and helped me find the right medication. The ordering process was simple, and my package arrived on time. I feel confident knowing that I can rely on this online pharmacy for my healthcare needs.":"J'étais sceptique au début d'utiliser une pharmacie en ligne, mais ce site web a dépassé mes attentes. Leur service client est excellent. Ils ont répondu à toutes mes questions et m'ont aidé à trouver le bon médicament. Le processus de commande était simple et mon colis est arrivé à temps. Je me sens en confiance en sachant que je peux compter sur cette pharmacie en ligne pour mes besoins de santé.
                        " )?>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Sara Mani</h3>
                      <h4>
                      <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Designer' : 'Designer
                        ' )?> 
                      </h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testi.png" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'I had a fantastic experience at the language center. The instructors are passionate, and the interactive lessons make language learning fun and engaging.' : "J'ai eu une expérience fantastique au centre de langues. Les instructeurs sont passionnés et les leçons interactives rendent l'apprentissage de la langue amusant et engageant.
                        " )?>                        
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jena Maria</h3>
                      <h4>
                      <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Store Owner' : "Propriétaire de magasin" )?>  
                      </h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/test.png" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div> -->
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? "I'm extremely satisfied with the language center's teaching methods. The small class sizes ensure personalized attention and accelerated learning." : "Je suis extrêmement satisfait(e) des méthodes d'enseignement du centre de langues. Les effectifs réduits des classes garantissent une attention personnalisée et un apprentissage accéléré.
                        " )?>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>John Marten</h3>
                      <h4>
                      <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Entrepreneur' : 'Entrepreneur' )?>  
                      </h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/test3.png" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div> -->
            <!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              Awea Escalier <br>
              Cameroon Yaounde<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4><?php echo $_SESSION['language'] == 'en' ? 'More Info' : 'Plus d\'info' ?></h4>
            <p>
              <strong>Phone:</strong> +237 620-58-46-91<br>
              <strong>Email:</strong> odpharma@gmail.org<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <?php
            echo $_SESSION['language'] == 'en' ?
              "    <h4>Opening Hours</h4>
                  <p><strong>Mon-Sat:</strong> 11AM - 11PM<br>
                    <strong>Sunday:</strong> Closed
                  </p>"
              :
              "    <h4>Heure d'ouverture</h4>
                  <p><strong>Lun-Sam:</strong> 11hr - 23hr<br>
                    <strong>Dimanche:</strong> Closed
                  </p>"
            ?>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>  
              <?php
              echo $_SESSION['language'] == 'en' ?
                "Follow Us"
                :
                "Suivez-nous"
              ?>
            </h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>2024</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <span class="text-primary"> Group<span class="text-warning">2</span></span>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script>
// function openPopUp(data,lang) {
//     // Assuming 'data' is the object passed from PHP
//     const popup = document.getElementById('popup');
  
//     // Show the popup
//     popup.classList.remove("hide-popup");
//     popup.classList.add("show-popup");
// }


    window.addEventListener("load", () => {
      const sentMsg = document.getElementById('sentMsg');
      const errorMsg = document.getElementById('errorMsg');

      if (sentMsg) {
        let sent = sentMsg.getAttribute('style');
        setTimeout(() => {
          sentMsg.style.display = 'none';
        }, 5000);
      }

      if (errorMsg) {
        setTimeout(() => {
          errorMsg.style.display = 'none';
        }, 5000);
      }
    });

  </script>



  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="evo-calendar/js/evo-calendar.js"></script>
  <script>
    // initialize your calendar, once the page's DOM is ready
    $(document).ready(function() {
      $('#calendar').evoCalendar({
        'toggleSidebar': true,
        'toggleEventList': true,
      })
    })
    // calendarEvents
    $('#calendar').evoCalendar({
      todayHighlight: true,
      todayHighlight: true,
      calendarEvents: <?php print_r($events) ?>,
      language: '<?php print_r($_SESSION['language'] == 'en' ? 'en' : 'fr'); ?>',
    })
  </script>
</body>

</html>