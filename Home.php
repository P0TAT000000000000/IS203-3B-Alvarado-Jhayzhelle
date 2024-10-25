<?php
// Start session at the beginning of home.php
session_start();
require('./database.php'); // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// // Database
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
//     // Retrieve and sanitize form data
//     $FName = $_POST['FirstName'];
//     $MName = $_POST['MiddleName'];
//     $LName = $_POST['LastName'];
//     $Email = $_POST['Email'];
//     $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT); // Hash the password

//     // Prepare the SQL statement
//     $queryCreate = "INSERT INTO jhayzdb1.jhayztable (FirstName, MiddleName, LastName, Email, Password) VALUES (?, ?, ?, ?, ?)";
    
//     if ($stmt = mysqli_prepare($connection, $queryCreate)) {
//         mysqli_stmt_bind_param($stmt, "sssss", $FName, $MName, $LName, $Email, $Password);
//         if (!mysqli_stmt_execute($stmt)) {
//             echo '<script>alert("Registration failed: ' . mysqli_stmt_error($stmt) . '");</script>';
//         } else {
//             echo '<script>alert("Successfully Created"); window.location.href = "Login.php";</script>';
//         }
//         mysqli_stmt_close($stmt);
//     } else {
//         echo '<script>alert("Error in SQL preparation: ' . mysqli_error($connection) . '");</script>';
//     }
// }


// Greet the user
echo "<h2 style='color: white; font-family:Georgia'>Welcome to Urban Shave, " . $_SESSION['user_name'] . "!</h2>";
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Urban Shave</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source Sans Pro">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      html {
    scroll-behavior: smooth;
    background-color: gray;
    }

      h2 {
    font-family: "Lucida Handwriting";
    color: white; 
     }
    </style>
<body class="w3-light-white w3-margin">

<!-- PHP Section for form handling -->
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Collect and sanitize input data
      $name = htmlspecialchars($_POST['Name']);
      $service = htmlspecialchars($_POST['Service']);
      $datetime = htmlspecialchars($_POST['date']);
      $message = htmlspecialchars($_POST['Message']);

      // You can store this data in a database or process it here
      // For now, let's display a confirmation message
      echo "<div class='w3-panel w3-green w3-display-container'>
                <span onclick=\"this.parentElement.style.display='none'\" class='w3-button w3-large w3-display-topright'>&times;</span>
                <h3>Success!</h3>
                <p>Thank you, $name. Your request for $service has been received. We'll contact you soon for the appointment on $datetime.</p>
            </div>";
  }
?>

<!-- Navigation bar with links -->
<div class="w3-bar w3-dark-gray w3-text-white">
<!-- style="position: fixed; top: 0; width: 100%; z-index: 1; -->
  <h2 class="w3-left w3-tag w3-dark-gray w3-round w3-text-white">URBAN SHAVE</h2>
  <a href="login.php" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">LOG OUT</a>
  <a href="EditInfo.php" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">EDIT INFO</a>
  <a href="#Contact" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">CONTACT</a>
  <a href="#SERVICES" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">SERVICES</a>
  <a href="#BARBERS" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">BARBERS</a>
  <a href="#Home" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">HOME</a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-medium w3-hide-large" style="margin-top:45px;" onclick="myFunction()">&#9776;</a>
</div>

<!-- Responsive mobile menu -->
<div id="demo" class="w3-bar-block w3-gray w3-hide w3-hide-large w3-small" style="margin-top:45px;">
  <a href="#Home" class="w3-bar-item w3-button">HOME</a>
  <a href="#BARBERS" class="w3-bar-item w3-button">BARBERS</a>
  <a href="#SERVICES" class="w3-bar-item w3-button">SERVICES</a>
  <a href="#Contact" class="w3-bar-item w3-button">CONTACT</a>
  <a href="EditInfo.php" class="w3-bar-item w3-button">EDIT INFO</a>
  <a href="login.php" class="w3-bar-item w3-button">LOG OUT</a>
</div>


<!-- Navigation bar with links -->
<!-- <div class="w3-bar w3-dark-gray w3-text-white">
  <h2 class="w3-left w3-tag w3-dark-gray w3-round w3-text-white">URBAN SHAVE</h2>
  <a href="login.php" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">LOG OUT</a>
  <a href="#Contact" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">CONTACT</a>
  <a href="#SERVICES" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">SERVICES</a>
  <a href="#BARBERS" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">BARBERS</a>
  <a href="#Home" class="w3-hide-small w3-bar-item w3-button w3-mobile w3-medium w3-right" style="margin-top:10px;">HOME</a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-medium w3-hide-large" style="margin-top:10px;" onclick="myFunction()">&#9776;</a>
</div>

<div id="demo" class="w3-bar-block w3-gray w3-hide w3-hide-large w3-small">
  <a href="#Home" class="w3-bar-item w3-button">HOME</a>
  <a href="#BARBERS" class="w3-bar-item w3-button">BARBERS</a>
  <a href="#SERVICES" class="w3-bar-item w3-button">SERVICES</a>
  <a href="#Contact" class="w3-bar-item w3-button">CONTACT</a>
  <a href="login.php" class="w3-bar-item w3-button">LOG OUT</a>
  
</div> -->

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Image header -->
  <header class="w3-display-container w3-wide" style="padding-bottom:32px;" id="Home">
    <img class="w3-image" src="images/Bg5.jpg" width="1600" height="1060">
    <div class="w3-display-left w3-padding-large">
    <h1 class="w3-text-white" style="font-family: 'Arial', sans-serif; font-size: 30px;">"Stay Sharp, Stay Urban"</h1>
      <h1 class="w3-jumbo w3-text-white w3-hide-small" style="font-family: 'Arial', sans-serif;"><b>URBAN SHAVE</b></h1>
      <p style="color: white; font-family: 'Times New Roman'; font-size: 20px ;">It combines the modern, urban vibe with attention to detail, giving the impression of a stylish and professional service.</p>
      <h6><button class="w3-button w3-round w3-gray w3-padding-large w3-large w3-hover-opacity-off"><a href="#Contact">BOOK NOW</a></button></h6>
    </div>
  </header>

  <!-- Grid / BARBERS section -->
  <div class="w3-row-padding" id="BARBERS">
    <div class="w3-center w3-padding-32">
      <h2 class="w3-wide w3-center">BARBERS AND HAIR STYLIST</h2>
         <p class="w3-opacity w3-center w3-text-white"><i>Choose your Barber</i></p>
         <p class="w3- w3-text-white w3-left-align" style="color: white; font-family: 'Times New Roman'; font-size: 20px ;">
         At Urban Shave, our barbers are masters of their craft, combining years of experience with a passion for precision grooming. Whether it's a fresh fade, a clean shave, or a stylish trim, our barbers</p>
         <p style="color: white; font-family: 'Times New Roman'; font-size: 20px ;"> deliver top-tier results with exceptional attention to detail.
      </p>
    </div>

    <div class="w3-third w3-margin-bottom">
      <div class="w3-card-4">
        <img src="images/Russcut3.jpg" style="width:100% ; height:65%">
        <div class="w3-container">
          <h3>Russ Ravelaz</h3>
          <p class="w3-opacity w3-text-white" >Barber & Professional Hair Stylist</p>
          <p> A well-known barber based in the Philippines, who operates out of Identity Hair Studio in Quezon City. He's gained a strong reputation for his precision cuts and stylish hair treatments, often highlighted on social media platforms like TikTok under the handle @russcutshair_</p>
          <p><button class="w3-button w3-round w3-white w3-block"><a href="RussRavelaz.php">LEARN MORE</a></button></p>
          <p><button class="w3-button w3-round w3-gray w3-block"><a href="#Contact">BOOK NOW</a></button></p>
        </div>
      </div>
    </div>

    <div class="w3-third w3-margin-bottom">
      <div class="w3-card-4">
        <img src="images/James.jpg" style="width:100% ; height:65%">
        <div class="w3-container">
          <h3>James “FCVNDO” Florencondia</h3>
          <p class="w3-opacity w3-text-white">Barber & CEO/Founder</p>
          <p>As the Owner/CEO and Founder, James has elevated the world of barbering, specializing in luxury precision and unapologetic badassery. Renowned as a celebrity barber, he has left his indelible mark on the grooming experiences of high-profile clientele.</p>
          <p><button class="w3-button w3-round w3-white w3-block"><a href="FCVNDO.php">LEARN MORE</a></button></p>
          <p><button class="w3-button w3-round w3-gray w3-block"><a href="#Contact">BOOK NOW</a></button></p>
        </div>
      </div>
    </div>

    <div class="w3-third w3-margin-bottom">
      <div class="w3-card-4">
        <img src="images/Gumcruz3.jpg" style="width:100% ; height:65%">
        <div class="w3-container">
          <h3>Gum Cruz</h3>
          <p class="w3-opacity w3-text-white">Barber & Hair Stylist</p>
          <p>a notable barber in the Philippines, recognized for his impact on the barbering scene and his creative styles. He is the owner of Pomade Cartel, a well-known barbershop in Angeles City, which has gained popularity for its unique grooming services and trendy cuts. </p>
          <p><button class="w3-button w3-round w3-white w3-block"><a href="GumCruz.php">LEARN MORE</a></button></p>
          <p><button class="w3-button w3-round w3-gray w3-block"><a href="#Contact">BOOK NOW</a></button></p>
        </div>
      </div>
    </div>
  </div>

<!-- SERVICES section -->
<div class="w3-white" id="SERVICES">
    <div class="w3-container">
      <div class="w3-center w3-padding-32">
      <h2 class="w3-wide w3-text-gray">URBAN SHAVE SERVICES OFFER</h2>
      <!-- <p class="w3-opacity"><i>Find the right activity for your dog</i></p><br> -->
      <p class="w3-left-align w3-white w3-text-black">
      At Urban Shave, we specialize in delivering precision haircuts and grooming services tailored to your unique style. Our skilled barbers combine expertise with modern techniques to ensure every cut, shave, and trim leaves you feeling sharp and confident. Whether you're after a classic look or something more contemporary, we take pride in providing personalized attention to detail. Step into Urban Shave and experience top-notch service that reflects the true essence of urban sophistication. Stay sharp, stay urban!
      </p>
      </div>

      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-third">
          <img src="images/Haircut2.jpeg" style="width:100%; height:70%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Haircuts</b></p>
            <p>• Classic cuts • Fade cuts • Taper cuts<br> • Crew cuts • Undercuts • Buzz cuts</p>
            <button class="w3-button w3-round w3-gray w3-margin-bottom w3-text-white" onclick="document.getElementById('ticketModal').style.display='block'"><a href="Haircuts.php">LEARN MORE</a></button>
          </div>
        </div>
        <div class="w3-third">
          <img src="images/Beard2.jpeg" style="width:100%; height:70%;" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Beard Grooming</b></p>
            <p>• Beard trims • Beard shaping • Full beard grooming<br> • Line-ups</p>
            <button class="w3-button w3-round w3-gray w3-margin-bottom w3-text-white" onclick="document.getElementById('ticketModal').style.display='block'"><a href="BeardGrooming.php">LEARN MORE</a></button>
          </div>
        </div>
        <div class="w3-third">
          <img src="images/Hairstyle2.jpeg" style="width:100%; height:70%" class="w3-hover-opacity">
          <div class="w3-container w3-white">
            <p><b>Hair Styling</b></p>
            <p>• Hair wash and style • Blow-drying • Pompadour styling<br> • Textured styles </p>
            <button class="w3-button w3-round w3-gray w3-margin-bottom w3-text-white" onclick="document.getElementById('ticketModal').style.display='block'"><a href="HairStyling.php">LEARN MORE</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>


<!-- Contact Form -->
  <div class="w3-padding-32 w3-dark-gray w3-center" id="Contact">
    <h3>Book an Appointment</h3>
    <p>Fill in the form below to book an appointment.</p>
    <form action="" method="POST" class="w3-container">
      <p><label>Name</label><input class="w3-input" type="text" name="Name" required></p>
      <p><label>Service</label><input class="w3-input" type="text" name="Service" required></p>
      <p><label>Date</label><input class="w3-input" type="date" name="date" required></p>
      <p><label>Message</label><textarea class="w3-input" name="Message" rows="4" required></textarea></p>
      <button type="submit" name="create" class="w3-button w3-round w3-white w3-border w3-border-black">Submit</button>
    </form>
  </div>
</div>

<script>
// Script for toggling the mobile menu
function myFunction() {
  var x = document.getElementById("demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
