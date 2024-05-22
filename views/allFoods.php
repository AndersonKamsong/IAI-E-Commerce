
<?php


// Initialize totalActivities if not set
if (!isset($_SESSION['totalActivities'])) {
    $_SESSION['totalActivities'] = 0; // Assume an initial value or dynamically calculate it based on your database if necessary.
}

// Set default language and page if not already set
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = "fr";
}

if (!isset($_SESSION['page']) || $_SESSION['page'] < 1) {
    $_SESSION['page'] = 1;
}

// Language switch handling
if (isset($_GET['lang']) && in_array($_GET['lang'], ['fr', 'en'])) {
    $_SESSION['language'] = $_GET['lang'];
}

// Pagination handling
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'next') {
        $_SESSION['page']++;
    } elseif ($_GET['action'] == 'prev' && $_SESSION['page'] > 1) {
        $_SESSION['page']--;
    }
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
  $message = $_SESSION['message'];
  // unset($_SESSION['message']);
}

// Database and Activities Handling
include_once '../Controllers/FoodController.php';
$activities = [];
$limit = 9; // Number of activities per page

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $activities = filterActivity($_POST['filter']); // Assuming this returns an array of activities
    // print_r($activities);
    // die;
    $_SESSION['totalActivities'] = count($activities); // Update the total activities based on search result
    $_SESSION['page'] = 1; // Reset to first page on new search
} else {
    $activities = getAllActivity(); // Assuming this returns an array of all activities

    $_SESSION['totalActivities'] = count($activities); // Update total activities
}

// Calculate pagination variables
$startIndex = ($_SESSION['page'] - 1) * $limit;
$endIndex = min($startIndex + $limit, $_SESSION['totalActivities']);
$displayedActivities = array_slice($activities, $startIndex, $limit);
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




<section class="activities">
    <div class="container">
      <div class="row my-4">
        <div class="col">
            <form action="" method="post" class="form-inline">
                <div class="input-group mb-3">
                    <input type="text" name="filter" class="form-control" placeholder="Search with a key word" aria-label="Search with a key word" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" name="search" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
      </div>
        <div class="row">
            <div class="grid-container">
            <?php
          // include_once '../Controllers/ActivityController.php';
          // $activities = getAllActivity();
          // Reverse the order of activities
          $reversedActivities = array_reverse($activities);

          // Initialize counter to limit displayed activities
         
          $lang = $_SESSION['language'] == 'en' ? 'en' : 'fr';
          // Loop through the reversed array of activities
          foreach ($reversedActivities as $data) {
            // if ($count >= 4) { // Limit to 4 activities for medium screens
            //   break; // Exit the loop if the limit is reached
            // }
            $jsonData = json_encode($data);

          ?>
            <div class="activity"> <!-- Each activity is a grid item -->
              <div class="activity-img-container">
                <img src="assets/images/foods/<?php echo htmlspecialchars($data['image']); ?>" class="img-fluid" alt="">
              </div>
              <div class="details">
                <h3><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? $data['nameEnglish'] : $data['nameFrench']); ?></h3>
                <p><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? $data['prix'] : $data['prix']); ?></p>
              </div>
              <div class="actionC">
                <div class="action"  onclick='openPopUp(<?php echo $jsonData; ?>, "<?php echo $lang; ?>")'>
                  <?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Order ' : 'Commande'); ?>&nbsp;<i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          <?php
           
          }

          ?>
          <div id="popup" class="popup hide-popup">
            <div class="popup-content">
              <div class="popup-close">
                <i class='fas fa-xmark text-black'></i>
              </div>
              <div class="popup-left">
                <div class="popup-img-container">
                  <img src="assets/images/foods/<?php echo htmlspecialchars($data['image']); ?>" class="" alt="" height="300px">
                  <h1 style="color:white"  id="title"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? $data['nameEnglish'] : $data['nameFrench']); ?></h1>
                  <p  style="color:white" id="description"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? $data['prix'] : $data['prix']); ?></p>
                </div>
              </div>
              <div class="popup-right">
                <div class="right-content">
                <form  method="post">
                  <input type="hidden" name="i-action" value="OrderController" />
                  <input type="hidden" name="action" value="registerOrder" />
                  <div class="alert <?php echo $message['class']; ?> font-weight-bold" style="padding :40%;display:<?php echo $message['display']; ?>;">
                      <a class="close col text-right" data-dismiss="alert" href="#">&times;</a>
                     <center><strong><?php
                          echo $message['message'].'!';
                          unset($_SESSION['message']);
                     ?></center></strong>
                  </div>
                  <div class="panel panel-primary">
                      <div class="panel-body tabs-menu-body p-0 pt-5">
                          <div class="tab-content">
                            <div class="panel-body tabs-menu-body p-0 pt-5">
                                  <div class="tab-content">
                                      <div class="tab-pane active" id="tab5">
                                          <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                              <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                  <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                              </a>
                                              <input class="input100 border-start-0 form-control ms-0" name="name" type="text" placeholder="Enter name">
                                          </div>
                                          <br />
                                          <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                              <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                  <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                              </a>
                                              <input class="input100 border-start-0 form-control ms-0" name="class" type="text" placeholder="Enter Class">
                                          </div>
                                          <br />
                                          <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                              <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                  <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                              </a>
                                              <input class="input100 border-start-0 form-control ms-0" name="No_plate" type="number" placeholder="Number of Plate">
                                          </div>
                                          <br />
                                          <div class="actionC">
                                            <button class="action" type="submit"  class="login100-form-btn btn-primary">Order</button>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                          </div>
                      </div>
                    </div>
                  </form>  
                </div>
              </div>
            </div>
          </div>

            </div>
        </div>
        <?php if ($_SESSION['totalActivities'] > $limit): ?>
        <div class="pagination">
            <?php if ($_SESSION['page'] > 1): ?>
            <a href="?action=prev">&laquo; Previous</a>
            <?php endif; ?>
            <?php if ($endIndex < $_SESSION['totalActivities']): ?>
            <a href="?action=next">Next &raquo;</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
    
</section>

<script>
  function openPopUp(data,lang) {
    // Assuming 'data' is the object passed from PHP
    const popup = document.getElementById('popup');
    
    // // Setting image source
    // const img = popup.querySelector('.popup-img');
    // img.src = `assets/images/activities/${data.image}`;
    // img.alt = data.titleEnglish; // Or titleFrench, depending on the session language
    
    // // Setting title
    // const title = popup.querySelector('.popup-right .right-content h1');
    // title.textContent = lang == 'en'? data.titleEnglish :data.titleFrench; // Or titleFrench
    
    // // Setting description
    // const desc = popup.querySelector('.popup-right .right-content p');
    // desc.textContent = lang == 'en'? data.descEnglish:data.descFrench;// Or descFrench
    
    // Show the popup
    popup.classList.remove("hide-popup");
    popup.classList.add("show-popup");
   
}
</script>
</div>

