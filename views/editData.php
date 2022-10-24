<?php session_start();
if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin') {
  include_once "../models/database.php"; ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A.I. Library-DM</title>
    <link rel="icon" href="../images/assets/footerlogo.jpg" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" />
    <script src="../js/bootstrap.bundle.min.js"></script>
    <style>
      body {
        background: linear-gradient(to bottom, #eecda3 0%, #ef629f 100%);
      }

      form {
        padding: 20px;
        display: block;
        margin: 15% auto;
        border-radius: 1%;
        background-color: #a4a4a49e;
      }

      form input {
        text-align: center;
      }

      .col-4 img {
        height: 60%;
        width: 75%;
        border-radius: 60%;
        margin: 25% auto;
        display: block;
      }
    </style>
  </head>
  <?php
  if (isset($_POST['submit-user'])) {
    $db1 = new DataBase('library');

    if ($db1->connect()) {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $gender = $_POST['gender'];
      $role = $_POST['role'];
      $sql = "INSERT INTO customer(username, password, fname, lname, gender, role) values ('$username', '$password', '$fname', '$lname', '$gender', '$role');";
      $db1->query($sql);
      $db1->close();
      header('Location: ./editData.php?msg=Done');
    } else {
      $db1->close();
      die('Server Connection Error');
    }
  }
  ?>
  <?php
  if (isset($_POST['submit-update'])) {
    $db2 = new DataBase('library');
    if ($db2->connect()) {
      $bid = $_POST['submit-update'];
      $name = $_POST['name'];
      $writer = $_POST['writer'];
      $category = $_POST['category'];
      $cost = $_POST['cost'];

      $sql = "UPDATE book SET book.name = '$name',
       book.writer = '$writer',
       book.category = '$category',
       book.cost = '$cost'
       WHERE book.bookid = '$bid';";
      $db2->query($sql);
      $db2->close();
    } else {
      $db2->close();
      die('Server Connection Error');
    }
  }
  ?>
  <?php
  if (isset($_POST['submit_transaction-deletion'])) {
    $db6 = new DataBase('library');
    if ($db6->connect()) {
      $cid = $_POST['submit_transaction-deletion'];
      $bid = $_POST['book_id'];

      $sql = "DELETE FROM buy 
      WHERE bookid = '$bid' AND cid = '$cid';";
      $db6->query($sql);
      $db6->close();
    } else {
      $db6->close();
      die('Server Connection Error');
    }
  }
  ?>
  <?php
  if (isset($_POST['submit-deletion'])) {
    $db3 = new DataBase('library');
    if ($db3->connect()) {
      $cid = $_POST['submit-deletion'];
      $sql = "DELETE FROM customer
      WHERE customer.cid = '$cid'; ";
      $db3->query($sql);
      $db3->close();
    } else {
      $db3->close();
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
          </ul>
          <div class="d-flex">
            <h6 class="text-white"><?php echo $_SESSION['username']; ?></h6>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <?php if (isset($_GET['edit_bookid'])) {
        $db5 = new DataBase('library');
        if ($db5->connect()) {
          $bid = $_GET['edit_bookid'];
          $sql = "SELECT * FROM book WHERE book.bookid = '$bid'";
          $result = $db5->query($sql);
          $row = $result->fetch_assoc();
      ?>
          <div class="row justify-content-around">
            <div class="col-4">
              <form action="" method="post" enctype="multipart/form-data">
                <h4 style="text-align:center;padding:10px;">Book Update Area</h4>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Book Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Book Writer</label>
                  <input type="text" name="writer" class="form-control" value="<?php echo $row['writer']; ?>">
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Book Category</label>
                  <select style="text-align: center;" name="category" class="form-select">
                    <option selected value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                    <?php $val = array("Science Fiction", "psychology", "horror", "novel");
                    for ($i = 0; $i < count($val); $i++) {
                      if ($val[$i] === $row['category'])
                        continue;
                    ?>
                      <option value="<?php echo $val[$i]; ?>"><?php echo $val[$i]; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Book Price</label>
                  <input type="number" name="cost" class="form-control" value="<?php echo $row['cost']; ?>" min="1" max="500">
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button type="submit" name="submit-update" value="<?php echo $row['bookid']; ?>" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
            <div class="col-4">
              <img src="<?php echo "../images/" . $row['bookcover']; ?>" alt="<?php echo $row['bookcover']; ?>">
            </div>
          </div>
      <?php
          $db5->close();
        } else {
          $db5->close();
          die('Server Connection Error');
        }
      } ?>
      <div class="row justify-content-around">
        <div class="col-4">
          <img src="../images/mikolaj-DCzpr09cTXY-unsplash.jpg" alt="">
        </div>
        <div class="col-4">
          <form action="../controller/addingBook.php" method="post" enctype="multipart/form-data">
            <h4 style="text-align:center;padding:10px;">Book Insertion Area</h4>
            <div class="mb-3">
              <input type="text" name="bookid" class="form-control" placeholder="Book ID">
            </div>
            <div class="mb-3">
              <input type="text" name="name" class="form-control" placeholder="Book Name">
            </div>
            <div class="mb-3">
              <input type="text" name="writer" class="form-control" placeholder="writer Name">
            </div>
            <div class="mb-3">
              <select style="text-align: center;" name="category" class="form-select">
                <option selected disabled>Category</option>
                <option value="Science Fiction">Science Fiction</option>
                <option value="psychology">Psychology</option>
                <option value="horror">Horror</option>
                <option value="novel">Novel</option>
              </select>
            </div>
            <div class="mb-3">
              <input type="number" name="cost" class="form-control" placeholder="Price-$" min="1" max="500">
            </div>
            <div class="mb-3">
              <label for="disabledTextInput" class="form-label">Book Cover</label>
              <input type="file" name="bookcover" class="form-control">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" name="submit-insertion" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>

      <div class="row justify-content-around">
        <div class="col-4">
          <form action="" method="post" enctype="multipart/form-data">
            <h4 style="text-align:center;padding:10px;">User Account Creation</h4>
            <div class="mb-3">
              <input type="text" name="fname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="mb-3">
              <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="mb-3">
              <input type="email" name="username" class="form-control" placeholder="john@gmail.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
            </div>
            <div class="mb-3">
              <input type="text" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
              <select style="text-align: center;" name="role" class="form-select" required>
                <option value="user">user</option>
                <option value="admin">admin</option>
              </select>
            </div>
            <div class="mb-3" style="float: left;margin-right:10px">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">
              <label class="form-check-label" style="font-weight:bold;" for="inlineRadio1">Male</label>
            </div>
            <div class="mb-3" style="float: left;margin-right:10px">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
              <label class="form-check-label" style="font-weight:bold;" for="inlineRadio2">Female</label>
            </div>
            <div class="mb-3" style="float: left;">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="unknown">
              <label class="form-check-label" style="font-weight:bold;" for="inlineRadio2">Others</label>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" name="submit-user" value="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
        <div class="col-4">
          <img src="../images/assets/white-profile-icon-24.jpg" alt="">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-8">
          <center>
            <h4>Website Accounts</h4>
          </center>
          <table class="table table-hover" style="background-color: #a4a4a49e;">
            <tr>
              <th>Customer ID</th>
              <th>username</th>
              <th>password</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Role</th>
              <th>Remove</th>
            </tr>
            <?php
            $db4 = new DataBase("library");

            if ($db4->connect()) {
              $sql = "SELECT * FROM customer";
              $result = $db4->query($sql);

              while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                  <td><?php echo $row['cid']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['password']; ?></td>
                  <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['role']; ?></td>
                  <form action="" method="post">
                    <td><button type="submit" class="btn btn-danger" name="submit-deletion" value="<?php echo $row['cid']; ?>">Delete</button></td>
                  </form>
                </tr>
            <?php }
              $db4->close();
            } else {
              $db4->close();
              die("Server Connection Error.");
            } ?>
          </table>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-8">
          <center>
            <h4>Transactions Data</h4>
          </center>
          <table class="table table-hover" style="background-color: #a4a4a49e;">
            <tr>
              <th>Customer ID</th>
              <th>Name</th>
              <th>Book ID</th>
              <th>Name</th>
              <th>Time</th>
              <th>Remove</th>
            </tr>
            <?php
            $db5 = new DataBase("library");

            if ($db5->connect()) {
              $sql = "SELECT * FROM buy 
              JOIN book ON buy.bookid = book.bookid
              JOIN customer ON buy.cid = customer.cid";
              $result = $db5->query($sql);

              while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                  <td><?php echo $row['cid']; ?></td>
                  <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                  <td><?php echo $row['bookid']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['bought_day']; ?></td>
                  <form action="" method="post">
                    <input type="hidden" name="book_id" value="<?php echo $row['bookid']; ?>">
                    <td><button type="submit" class="btn btn-danger" name="submit_transaction-deletion" value="<?php echo $row['cid']; ?>">Delete</button></td>
                  </form>
                </tr>
            <?php }
              $db5->close();
            } else {
              $db5->close();
              die("Server Connection Error.");
            } ?>
          </table>
        </div>
      </div>
    </div>

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
<?php } else {
  header('Location: ../index.php');
} ?>