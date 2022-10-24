<?php session_start();
if (isset($_SESSION['username'])) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="icon" href="../images/assets/footerlogo.jpg" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" />
    <script src="../js/bootstrap.bundle.min.js"></script>
    <style>
      body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)),
          url(../images/library10.jpg);
      }

      .cart-page {
        padding: 70px;
      }

      .text {
        color: white;
        font-weight: bold;
      }

      .card {
        width: 40% !important;
      }

      .card img {
        height: 210px;
      }

      .cart-info {
        display: flex;
        flex-wrap: wrap;
      }

      .img-fluid {
        max-width: 100%;
        height: 100%;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      th {
        text-align: left;
        padding: 5px 30px 5px 30px;
        color: white;
        background: #d9821f;
      }

      td {
        padding: 10px;
      }

      .total-price {
        display: flex;
        margin-top: 20px;
        justify-content: flex-end;
      }

      .total-price table {
        border-top: 3px solid #d9821f;
        width: 100%;
        max-width: 257px;
      }

      td:last-child {
        text-align: right;
      }

      th:last-child {
        text-align: right;
      }
    </style>
  </head>
  <?php
  if (isset($_POST['submit'])) {
    include "../models/database.php";
    $db = new DataBase('library');

    if ($db->connect()) {
      $bid = $_POST['book_id'];
      $cid = $_POST['customer_id'];
      $sql = "DELETE FROM buy WHERE buy.bookid = '$bid' AND buy.cid='$cid'";
      if ($db->query($sql)) {
        header('Location: ./cart.php');
      } else {
        echo "sth went wrong, Coudn't remove book";
      }
    } else {
      $db->close();
      die('Server Connection Error');
    }
  }
  ?>

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
                <?php if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin') { ?>
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
            <li class="nav-item">
              <a class="nav-link" href="AboutUs.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section onchange="calculate_cost()" class="small-container cart-page">
      <table>
        <tr>
          <th>
            <h3>Books</h3>
          </th>
          <th>
            <h3>Amount</h3>
          </th>
        </tr>
        <?php
        include "../models/database.php";
        $db = new DataBase('library');

        if ($db->connect()) {
          $userid = $_SESSION['user_id'];
          $sql = "SELECT * FROM buy JOIN book ON buy.bookid = book.bookid WHERE buy.cid = '$userid';";
          $result = $db->query($sql);
          if ($result && mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
        ?>
              <tr>
                <td>
                  <div class="card mb-3" style="max-width: 540px;width: 30%;">
                    <div class="row g-0 card-img">
                      <div class="col-md-4">
                        <img src="<?php echo '../images/' . $row['bookcover']; ?>" class="img-fluid rounded-start" alt="<?php echo $row['bookcover']; ?>">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <form action="" method="post">
                            <input type="hidden" name="book_id" value="<?php echo $row['bookid']; ?>">
                            <input type="hidden" name="customer_id" value="<?php echo $row['cid']; ?>">
                            <button type="submit" name="submit" value="submit" style="width:100%" class="btn btn-danger">Remove</button>
                          </form>
                          <hr>
                          <h5 class="card-title"><?php echo $row['name']; ?></h5>
                          <p class="card-text"><?php echo $row['writer']; ?></p>
                          <p class="card-text"><small class="text-muted"><?php echo $row['cost'] . "$"; ?></small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="mb-3">
                    <input type="hidden" name="input-prices[]" value="<?php echo $row['cost'] . "$"; ?>">
                    <input type="number" name="input-amounts[]" value="1" style="width: 40%;height:25%;float:right;" class="form-control" min="1" max="10">
                  </div>
                </td>
              </tr>
            <?php }
          } else { ?>
            <tr>
              <td colspan="2" style="background-color:#ffffff61;text-align:center;margin-top:20px;">Cart is empty.</td>
            </tr>
        <?php
          }
        } else {
          die('Server Connection Error');
        } ?>
      </table>
      <div class="total-price">
        <table>
          <tr>
            <td class="text">SubTotal</td>
            <td name="show-data[]" class="text"></td>
          </tr>
          <tr>
            <td class="text">Taxes</td>
            <td name="show-data[]" class="text"></td>
          </tr>
          <tr>
            <td class="text">Total</td>
            <td name="show-data[]" class="text"></td>
          </tr>
        </table>
      </div>
    </section>

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
    <script>
      calculate_cost();

      function calculate_cost() {
        let subtotal = 0;
        let taxes = 2;
        let total = 0;

        let amounts = document.getElementsByName('input-amounts[]');
        let prices = document.getElementsByName('input-prices[]');
        for (let index = 0; index < amounts.length; index++)
          subtotal += parseFloat(amounts[index].value) * parseFloat(prices[index].value);

        total += (subtotal + taxes);
        document.getElementsByName('show-data[]')[0].innerHTML = subtotal + "$";
        document.getElementsByName('show-data[]')[1].innerHTML = taxes + "$";
        document.getElementsByName('show-data[]')[2].innerHTML = total + "$";
        console.log(subtotal, taxes, total);
      }
    </script>
  </body>

  </html>
<?php } else {
  header('Location: ../index.php');
} ?>