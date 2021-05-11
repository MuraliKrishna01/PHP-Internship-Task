<?php include 'database/config.php';

if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else{
    header("Location: register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/Profilestyle.css">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    <title>Profile</title>
</head>
<body>
    <header>
  
  <div class="header_bar">
    <div class="logo-left">
    <a href="#">
                   <img src="assets/images/MCY title.png" height="160" width="240">
                    
                </a>
    </div>
  <div class="nav-center">
  
      <div class="dropdown"><?php echo "Hello";?>
        <br><span><img src="<?php echo $user['profile_pic']; ?>"></span>
        <div class="dropdown-content">
            <div class="dropdown-a">
                <h5><a href="<?php echo $userLoggedIn; ?>"><i style="color:#3875c5;" class="fas fa-user"></i>
                       <?php echo $user ['username']?></a></h5>
                <hr>
                
                <a href="requests.php"><i style="color:#3875c5;" class="fas fa-users"></i>&nbsp;Requests</a>
                
                <hr>
                
                <a href="account_settings.php"><i style="color:#3875c5;" class="fas fa-cog"></i>&nbsp;Settings</a><br><br>
                <a href="home.php"><i style="color:#3875c5;" class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
            </div>
        </div> 
        <?php echo $user['first_name']; ?><?php echo "  !";?> 
        
      </div>
  </div>
  
  
  <nav>
        <a href="Profile.php">
          <i style="color: #3875C5;" class="fas fa-home"></i>&nbsp;Home</a>&nbsp;&nbsp;
          
        <a href="">
            <i style="color: #3875C5;" class="fas fa-envelope"></i>&nbsp;Messages</a>&nbsp;&nbsp;
            
        <a href="">
            <i style="color: #3875C5;" class="fas fa-bell"></i>&nbsp;Notifications</a>
      
  </nav>
    </header><br><br>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://images.newindianexpress.com/uploads/user/imagelibrary/2020/8/17/w900X450/roads.jpg" alt="blog">
                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Roads</h1>
                  <p class="leading-relaxed mb-3">Condition of Hyderabad Roads after the heavy rains last week .<br>Location : Begumpet x roads </p>
                  <div class="flex items-center flex-wrap ">
                    <a href="https://www.newindianexpress.com/cities/hyderabad/2020/aug/19/watch-out-hyderabad-roads-riddled-with-3000-potholes--2185232.html" class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                      </svg>
                    </a>
                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>14
                    </span>
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>2
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="http://mief.in/wp-content/uploads/2013/11/govt_school_20111114-300x199.jpg" alt="blog">
                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Infastructure</h1>
                  <p class="leading-relaxed mb-3"> Due to the neglegence of concerned officials the Infastructure of governtment school is in Pity State . <br>Location : Manikonda </p>
                  <div class="flex items-center flex-wrap">
                    <a href="https://www.careerindia.com/news/2013/06/28/majority-government-schools-india-lack-infrastructure-005573.html" class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                      </svg>
                    </a>
                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>9
                    </span>
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>1
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://telanganatoday.com/wp-content/uploads/2017/06/Manjira1.jpg" alt="blog">
                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Water</h1>
                  <p class="leading-relaxed mb-3"> Massive leakage at Manjira water pipe-line .<br> Location: Rajapet colony </p>
                  <div class="flex items-center flex-wrap ">
                    <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0"  href="https://telanganatoday.com/massive-leakage-at-manjira-water-pipe-line">Learn More
                      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                      </svg>
                    </a>
                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                      </svg>7
                    </span>
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>3
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     <div class="container" >
         <a href="ComplaintForm.php" >
            <button class="btn1" >REPORT A COMPLAINT </button>
        </a>
     </div>
</body>
</html>