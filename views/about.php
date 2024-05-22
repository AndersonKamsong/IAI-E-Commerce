<?php
    session_start();
    // Language : fr $ en
    if(!isset($_SESSION['language'])){
      $_SESSION['language'] = "fr";
    }
    if($_GET){
      // var_dump($_GET);
      // die();
     switch($_GET['lang']){
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
    $phoneNumber = '670844193'; // Example number
    
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

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container head d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" width="150" height="200" alt="" style="object-fit: contain;">
        <!-- <h1>Einstein<span>.</span></h1> -->
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php#hero"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Home' : 'Accueil'); ?></a></li>
          <li><a href="about.php"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'About' : 'A propos'); ?></a></li>          
          <li><a href="index.php#contact"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Contact us' : 'Contact'); ?></a></li>&nbsp;&nbsp;

          <li class="dropdown"><a><span><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Language' : 'Langage'); ?> <b style="color:#297559"><?php echo $_SESSION['language']?></b></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <form action="" method="get">
                <li>
                    <label htmlfor="en">
                    <a  href="about.php?lang=en" style="color:<?php echo $_SESSION['language'] == 'en' ?  'red' :  ''  ?>"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'English' : 'Anglais'); ?></a>
                    </label>
                </li>
                <!-- <input type="submit" name="en" id="en" value="en" hidden /> -->

                <li>
                  <label htmlfor="fr">
                    <a href="about.php?lang=fr" style="color:<?php echo $_SESSION['language'] == 'fr' ?  'red' :  ''  ?>" ><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'French' : 'Francais'); ?></a>
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
  <main id="main">

  <!-- About Us  -->
  <section class="about">
    <h1 class="mt-5">
    <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'About Us' : "À propos de nous") ?>  
    </h1>
  </section>






    <section class="sample-page">
      <div class="container" data-aos="fade-up">
      <div class="d-sm-flex d-block justify-content-between align-items-center">
          <div class="col-sm-6 col-12 text-center  p-2 p-sm-5 border me-3 mt-3 rounded-3">
            <h1 class="text-center">
            <?php echo $_SESSION['language'] == 'en' ? 'Our <span class="color">Mission</span>' : 'Notre <span class="color">Mission</span>' ?>  
             </h1>
            <p class="text-center">
            <?php echo $_SESSION['language'] == 'en' ? "Our mission is to provide our community with high-quality pharmaceutical care and comprehensive healthcare services. At the core of our commitment is the well-being and satisfaction of our patients. We prioritize patient care by delivering compassionate and personalized services, establishing strong patient-pharmacist relationships based on trust, empathy, and respect. Medication safety is paramount to us, and we ensure the safe and appropriate use of medications by offering accurate information, counseling, and medication management services. Through health education, we empower our patients with knowledge about their health conditions, medications, and preventive care, serving as a valuable resource for informed decision-making. Collaboration is key to optimizing patient care, and we actively engage with healthcare providers to facilitate seamless coordination and continuity of care. Lastly, we strive to enhance accessibility and convenience by providing efficient prescription processing, medication delivery options, and extended operating hours to cater to diverse schedules and individual needs.":"
            Notre mission est de fournir à notre communauté des soins pharmaceutiques de haute qualité et des services de santé complets. Au cœur de notre engagement se trouve le bien-être et la satisfaction de nos patients. Nous donnons la priorité aux soins aux patients en offrant des services compatissants et personnalisés, en établissant des relations solides entre les patients et les pharmaciens basées sur la confiance, l'empathie et le respect. La sécurité des médicaments est primordiale pour nous, et nous veillons à une utilisation sûre et appropriée des médicaments en fournissant des informations précises, des conseils et des services de gestion des médicaments. Grâce à l'éducation en matière de santé, nous donnons à nos patients les connaissances nécessaires sur leurs conditions de santé, leurs médicaments et les soins préventifs, en tant que ressource précieuse pour la prise de décisions éclairées. La collaboration est essentielle pour optimiser les soins aux patients, et nous travaillons en étroite collaboration avec les prestataires de soins de santé pour faciliter une coordination et une continuité des soins transparentes. Enfin, nous nous efforçons d'améliorer l'accessibilité et la commodité en offrant un traitement efficace des prescriptions, des options de livraison de médicaments et des horaires d'ouverture prolongés pour répondre aux horaires variés et aux besoins individuels.
            " ?>
             </p>
            <a href=""><div class="btn bg text-white px-5 py-2 rounded-5">
              <?php echo $_SESSION['language'] == 'en' ? 'Learn More' : "Plus d'informations" ?>  
            </div></a>
          </div>

          <div class="col-sm-6 col-12 text-center p-2 p-sm-5 border mt-3 mt-sm-none rounded-3">
            <h1 class="text-center">
            <?php echo $_SESSION['language'] == 'en' ? 'Our <span class="color">Vision</span>' : 'Notre <span class="color">Vision</span>' ?>  
            </h1>
            <p class="text-center">
            <?php echo $_SESSION['language'] == 'en' ? "At our pharmacy, our vision is to be a trusted and integral part of our community's healthcare journey. We strive to provide exceptional pharmaceutical care, promote wellness, and enhance the quality of life for our customers. Our aim is to be recognized as a reliable source of medications, professional expertise, and personalized services that meet the diverse needs of our patients."
            :"Dans notre pharmacie, notre vision est d'être un acteur de confiance et une partie intégrante du parcours de santé de notre communauté. Nous nous efforçons de fournir des soins pharmaceutiques exceptionnels, de promouvoir le bien-être et d'améliorer la qualité de vie de nos clients. Notre objectif est d'être reconnus comme une source fiable de médicaments, d'expertise professionnelle et de services personnalisés répondant aux besoins diversifiés de nos patients.
            " ?>
            
        </p>
            <a href=""><div class="btn bg text-white px-5 py-2 rounded-5">
              <?php echo $_SESSION['language'] == 'en' ? 'Learn More' : "Plus d'informations" ?> 
            </div></a>
          </div>
      </div>
      </div>
    </section>

  </main><!-- End #main -->




  <!-- our team -->
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container text-center">

        <div class="section-title">
          <h2 data-aos="fade-in">Meet Our <span class="color">Team</span> </h2>
          <p data-aos="fade-in" class="mb-5">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row justify-content-between align-items-center">
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up">
              <div class="pic"><img src="assets/img/team/team-1.jpg" alt=""></div>
              <h4 class="color">Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="assets/img/team/team-2.jpg" alt=""></div>
              <h4 class="color">Sarah Jhinson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="pic"><img src="assets/img/team/team-3.jpg" alt=""></div>
              <h4 class="color">William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    
    <!-- End Team Section -->

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
    </section>
    <!-- End Testimonials Section -->

  </main><!-- End #main -->



  <!-- FAQ's SECTION -->
  <!-- <div class="container faq my-5">
    <h1 class="text-center mb-3">FA<span class="color">Q's</span></h1>
    <p class="text-center">
    <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Do you still have any questions to know?. Feel free to ask our experts here.' : "Avez-vous encore des questions à poser ? N'hésitez pas à les poser à nos experts ici.
    " )?>  
    </p>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? '1. Why immigrate to Germany?' : "1. Pourquoi immigrer en Allemagne?" )?>
            
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'It is also the leading economic power in Europe, with the lowest unemployment rate. 2024 may be your year to change your life or job! Indeed, as the leading economic power in the European Union and 4th in the world, Germany has a lot to offer job seekers.' : "L'Allemagne est également la première puissance économique en Europe, avec le taux de chômage le plus bas. 2024 pourrait être votre année pour changer de vie ou d'emploi ! En effet, en tant que première puissance économique de l'Union européenne et quatrième au monde, l'Allemagne a beaucoup à offrir aux chercheurs d'emploi.
          " )?>  
          </div>
        </div>
      </div>
      <div class="accordion-item border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? '2. What are the conditions to immigrate to Germany?' : "2. Quelles sont les conditions pour immigrer en Allemagne ?
          " )?>
            
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'It is possible to immigrate to Germany either to work or to study or even for family reunification. For family reunification of a German or foreign spouse or due to marriage, knowledge of the German language at level A1 is required. For training in the field of your choice during which you are paid from the first month, you need: - Baccalaureate / GCE A- Level (all series passes; general, technical and commercial) - Knowledge of German (level B2) or willing to learn German. - Motivated, hardworking and honest.' : "Il est possible d'immigrer en Allemagne soit pour travailler, soit pour étudier, soit même pour la réunification familiale. Pour la réunification familiale avec un conjoint allemand ou étranger, ou en raison du mariage, une connaissance de la langue allemande au niveau A1 est requise. Pour une formation dans le domaine de votre choix durant laquelle vous êtes rémunéré dès le premier mois, vous avez besoin de : - Baccalauréat / GCE A-Level (toutes les séries passent ; générale, technique et commerciale) - Connaissance de l'allemand (niveau B2) ou volonté d'apprendre l'allemand. - Motivé, travailleur et honnête.
          " )?> 
          </div>
        </div>
      </div>
      <div class="accordion-item border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? ' 3. What are the most sought after trades in Germany?' : "3. Quels sont les métiers les plus recherchés en Allemagne ?" )?>
           
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Doctors, nurses, engineers, technicians of all fields, managers, etc. There is something for everyone in Germany!' : 'Médecins, infirmières, ingénieurs, techniciens dans tous les domaines, cadres, etc. Il y en a pour tous les goûts en Allemagne !' )?>  
          </div>
        </div>
      </div>
      <div class="accordion-item border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? '4. What is the salary of a worker in Germany?' : "4. Quel est le salaire d'un travailleur en Allemagne ?" )?>
            
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'In 2023, the average gross salary of employees working full-time was €3,994. If we add part-time employees, we reach an average gross salary of €2,077.' : "En 2023, le salaire brut moyen des employés à temps plein s'élevait à 3 994 €. En incluant les employés à temps partiel, le salaire brut moyen descend à 2 077 €." )?>  
          </div>
        </div>
      </div>
      <div class="accordion-item  border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? '5. What language level do I need to work in Germany?' : "5. De quel niveau de langue ai-je besoin pour travailler en Allemagne ?
          ")?>
            
          </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'You need knowledge of German at level B2 in order to obtain a visa to find a training place.' : "Pour obtenir un visa de recherche de stage ou de formation professionnelle en Allemagne, vous avez besoin d'un niveau de allemand B2.
          " )?>  
          </div>
        </div>
      </div>
      <div class="accordion-item border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? ' 6. How long does it take to learn German?' : "6. Combien de temps faut-il pour apprendre l'allemand ?
          ")?>
           
          </button>
        </h2>
        <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'There are 5 Levels: A1, A2, B1, B2 and C1. Each level lasts 2 months in intensive courses. You can therefore reach level B1 in 6 months.' : "
          C'est exact ! Il existe bien 5 niveaux de langue en allemand : A1, A2, B1, B2 et C1.  En suivant des cours intensifs, on peut effectivement atteindre le niveau B1 en 6 mois." )?>  
          </div>
        </div>
      </div>
      <div class="accordion-item border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? '7. How many hours of classes a day?' : "7. Combien d'heures de cours par jour ? " )?>
            
          </button>
        </h2>
        <div id="flush-collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Classes are either from 7:40 a.m. to 11:40 a.m. (4 hrs) or from 11:50 a.m. to 2:50 p.m. (3 hrs) or from 3:00 p.m. to 7:00 p.m. (4 hrs) each day from Monday to Friday. The compositions are every Saturday and the results every Monday. The best can obtain a bonus of up to 40,000frs.' : "La durée des cours par jour peut varier selon la tranche horaire choisie : Matinée: De 7h40 à 11h40 (soit 4 heures)
          Après-midi: De 11h50 à 14h50 (soit 3 heures)
          Soirée: De 15h00 à 19h00 (soit 4 heures)
          Les cours se déroulent du lundi au vendredi. Les compositions ont lieu tous les samedis et les résultats sont donnés chaque lundi. Le/la meilleur(e) élève peut obtenir un bonus allant jusqu'à 40 000 francs CFA.
          " )?>  
          </div>
        </div>
      </div>
      <div class="accordion-item border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? '8. When can I start the courses of German ?' : "8. Quand puis-je commencer les cours d'allemand ?" )?>
          </button>
        </h2>
        <div id="flush-collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Entry takes place every month at INSTITUT EINSTEIN but not for all levels. Find out about your return to school; A1, A2, B1, B2 or C1 at the secretariat, by whatsapp, by email or by call.' : "L'institut Einstein propose des inscriptions tous les mois, mais pas pour tous les niveaux. Renseignez-vous auprès du secrétariat, par WhatsApp, par email ou par téléphone pour connaître les prochaines sessions de votre niveau (A1, A2, B1, B2 ou C1).
          ")?>  
          </div>
        </div>
      </div>
      <div class="accordion-item border mb-3">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? '9. I can get trained in what field in Germany and earn money from the first month?' : "9. Dans quel domaine pourrais-je suivre une formation en Allemagne et gagner un revenu dès le début ?" )?>
          </button>
        </h2>
        <div id="flush-collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
          <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? ' You can be trained in the areas of your choice such as; nursing, catering, hotels, mechatronics, logistics, electricians, etc. Other questions? Please contact us….' : "Vous pouvez suivre une formation dans de nombreux domaines, par exemple : les soins infirmiers, la restauration, l'hôtellerie, la mécatronique, la logistique, l'électricité, etc. Vous avez d'autres questions ? Contactez-nous !" )?>  
         </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- End of Faq's -->


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
        Designed by <span class="text-primary"> Group<span class="text-warning">6</span></span>
      </div>
    </div>
  </footer><!-- End Footer -->
  <!-- End Footer -->

<a href="#" class="scroll-top d-flex bg align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script> 

  let img = document.getElementById('image');
  let imgs = ['assets/img/ab2.png','assets/img/ab.png','assets/img/ab1.png']
  setInterval(function(){
    let random = Math.floor(Math.random() * 3);
    img.src = imgs[random];
  },5000);

    $(document).ready(function () {
      new WOW().init();
    });

  lightGallery(document.querySelector('.gallery'));
  
</script>

</body>

</html>