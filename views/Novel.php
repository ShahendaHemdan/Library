<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Novel</title>
  <link rel="icon" href="../images/assets/footerlogo.jpg" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" />
  <script src="../js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: linear-gradient(rgba(0, 0, 0, 0.5),
          rgba(0, 0, 0, 0.5)),
        url(../images/library12.jpg);
      flex-direction: column;
      display: flex;
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
              <li><a class="dropdown-item" href="horror.html">Horror</a></li>
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
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="AboutUs.php">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php if (!isset($_SESSION['user_id'])) { ?>
    <section class="login-text">
      <h6>You need to login to enjoy website functionalities.</h6>
    </section>
  <?php } ?>
  <section style="padding: 10px;">
    <?php
    include "../models/database.php";
    include "../models/functions.php";
    $db = new DataBase('library');

    if ($db->connect()) {
      $sql = "SELECT * FROM book WHERE book.category = 'novel'";
      if ($result = $db->query($sql)) {

        while ($row = $result->fetch_assoc()) {
    ?>
          <div class="card" style="width: 18rem;">
            <img src="<?php echo "../images/" . $row['bookcover'] ?>" class="card-img-top" alt="<?php echo $row['name'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name']; ?></h5>
              <p class="card-text">Author : <?php echo $row['writer']; ?></p>
              <p class="card-text">Cost : <?php echo $row['cost'] . "$"; ?></p>
              <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta tenetur quam quidem fuga.</p>
              <?php if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin') { ?>
                <button type="button" class="btn btn-danger"><a style="display: inherit;" href="./controller/removeBook.php?edit_bookid=<?php echo $row['bookid']; ?>">DeleteBook</a></button>
                <button type="button" class="btn btn-success"><a style="display: inherit;" href="editData.php?edit_bookid=<?php echo $row['bookid']; ?>">UpdateBook</a></button>
              <?php } ?>
              <?php
              if (isset($_SESSION['user_id'])) {
                $db2 = new DataBase('library');
                if ($db2->connect()) {
                  $sql2 = "SELECT * FROM buy WHERE buy.cid=" . $_SESSION['user_id'] . " AND buy.bookid=" . $row['bookid'] . ";";
                  $result2 = $db2->query($sql2);
                  if (mysqli_num_rows($result2) === 1) {
              ?>
                    <button class="btn btn-warning" type="button" disabled>InCart</button>
                    <?php
                  } else {
                    if (isset($_SESSION['username']) && $_SESSION['role'] !== 'admin') {
                    ?>
                      <form action="./controller/addtocart.php" method="post" style="display:flex;float: left;">
                        <button class="btn btn-primary" type="submit" name="submit" value="<?php echo $row['bookid']; ?>">Buy</button>
                      </form>
              <?php }
                  }
                  $db2->close();
                } else {
                  $db2->close();
                  die('Server Connection Error');
                }
              }
              ?>
            </div>
          </div>
    <?php
        }
      }
    }
    ?>
  </section>
  <footer class="bg-dark text-center text-white" style="background-color: #f1f1f1;">
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