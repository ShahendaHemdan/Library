<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AboutUs</title>
  <link rel="icon" href="../images/assets/footerlogo.jpg" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" />
  <script src="../js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: linear-gradient(#0000008c, #0000008c),
        url(../images/library6.jpg);
    }

    .row {
      margin: 0px;
    }

    .navbar,
    .bg-dark,
    .dropdown-menu-dark {
      background-color: #ffdb0029 !important;
    }

    .dropdown-item:hover {
      background-color: #00000061 !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="../images/assets/logo.jpg" alt="Website_Logo" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php"><i class="fas fa-home"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="sciencefiction.php">Science Fiction</a></li>
              <li><a class="dropdown-item" href="psychology.php">Psychology</a></li>
              <li><a class="dropdown-item" href="horror.php">Horror</a></li>
              <li><a class="dropdown-item" href="Novel.php">Novel</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Options
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <?php session_start();
              if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin') { ?>
                <li><a class="dropdown-item" href="views/editData.php">settings</a></li>
              <?php } ?>
              <?php if (isset($_SESSION['username'])) { ?>
                <li><a class="dropdown-item" href="../controller/logout.php">Log Out</a></li>
              <?php } else { ?>
                <li><a class="dropdown-item" href="SignIn.html">Log In</a></li>
                <li><a class="dropdown-item" href="SignUp.html">Sign Up</a></li>
              <?php } ?>
            </ul>
          </li>
          <?php if (isset($_SESSION['username'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <?php if (!isset($_SESSION['user_id'])) { ?>
    <section class="login-text">
      <h6>You need to login to enjoy website functionalities.</h6>
    </section>
  <?php } ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <h1 class="text-color" style="text-align: center;font-size:55px;font-family: forte;">About us</h1>
      </div>
    </div>
    <div class="row justify-content-start">
      <div class="col-4">
        <h4 class="text-white">Some quotes about reading books</h4>
      </div>
    </div>
    <div class="row justify-content-around">
      <div class="col-8 text-white">
        <p>“Once you learn to read, you will be forever free.” Frederick Douglass</p>
        <p>“There are many little ways to enlarge your world. Love of books is the best of all.” Jacqueline Kennedy</p>
        <p>“Reading is a discount ticket to everywhere.” Mary Schmich</p>
        <p>“In books I have traveled, not only to other worlds, but into my own.” Anna Quindlen</p>
        <p>“Books are the plane, and the train, and the road. They are the destination,
          and the journey. They are home.” Anna Quindlen</p>
      </div>
    </div>
    <div class="row justify-content-start">
      <div class="col-4">
        <h4 class="text-white">Some notes About the owner&copy;</h4>
      </div>
    </div>
    <div class="row justify-content-around">
      <div class="col-8 text-white">
        <p>The site has been created by Ibrahim Moustafa Darwish & Ahmed Maher El-Saeidy.</p>
        <p>If there is any problem, try to reload the page or to contact us.</p>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-8 text-white">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus maiores unde, doloribus ipsum
        similique ex sapiente perspiciatis nostrum inventore eaque porro, tempora sunt odio cumque
        minima eos temporibus tenetur, aut maxime fugit amet. Iusto maiores laborum nulla ex eius
        saepe assumenda cumque sapiente? Modi, doloremque amet commodi eius rerum iure reprehenderit
        magni in veritatis error repellendus dolor, iste et perferendis neque ducimus, labore velit.
        officiis voluptatum, veritatis mollitia nam deserunt repellat laudantium doloribus dolorum
        quidem ipsam voluptas officia minima blanditiis maxime atque possimus dolor harum praesentium
        Doloribus explicabo dignissimos nam eos, illo ab, consequuntur aperiam, sunt error voluptates hic
        minima quas corrupti sed praesentium blanditiis aliquid qui iste. Nam, id temporibus autem, sint,
        debitis natus perferendis corporis veniam porro. Corrupti sint, assumenda, quo eum dicta inventore
        voluptates a consequuntur illo aliquid tenetur repellat!</p>
    </div>
  </div>
  <footer class="bg-dark text-center text-white" style="background-color: #f1f1f1;margin-top:auto;">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="col mb-4">
        <!-- Facebook -->
        <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.facebook.com/ibrahim.mostafa.9809" role="button" data-mdb-ripple-color="white"><i class="fab fa-facebook-f"></i></a>

        <!-- Instagram -->
        <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.instagram.com/hika8853/" role="button" data-mdb-ripple-color="white"><i class="fab fa-instagram"></i></a>

        <!-- Twitter -->
        <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://twitter.com/_Ahmed__Maher" role="button" data-mdb-ripple-color="white"><i class="fab fa-twitter"></i></a>

        <!-- Youtube -->
        <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.youtube.com/channel/UCL3Kf6BwwiZyN723LfiEsCA" role="button" data-mdb-ripple-color="white"><i class="fab fa-youtube"></i></a>

        <!-- Discord -->
        <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://discord.gg/JuA63EQv" role="button" data-mdb-ripple-color="white"><i class="fab fa-discord"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://www.linkedin.com/in/ahmedmaherelsaeidi" role="button" data-mdb-ripple-color="white"><i class="fab fa-linkedin"></i></a>
        <!-- Github -->
        <a class="btn btn-link btn-floating btn-lg text-white m-1" href="https://github.com/AhmedMaherElSaeidi" role="button" data-mdb-ripple-color="white"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-color p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      &copy;Copyright 2020/2021 A.I. library
    </div>
    <!-- Copyright -->
  </footer>
</body>

</html>