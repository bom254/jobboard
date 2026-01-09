<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 
  if (isset($_POST['submit'])) {

      if (
          empty($_POST['username']) ||
          empty($_POST['email']) ||
          empty($_POST['password']) ||
          empty($_POST['re-password'])
      ) {
          echo "<div class='alert alert-danger'>Some inputs are empty</div>";
      } else {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['re-password'];
        $img = 'web-coding.png';

        if ($password === $repassword) {

            $insert = $conn->prepare("
                INSERT INTO users (username, email, mypassword, img)
                VALUES (:username, :email, :mypassword, :img)
            ");

            $insert->execute([
                ':username' => $username,
                ':email' => $email,
                ':mypassword' => password_hash($password, PASSWORD_DEFAULT),
                ':img' => $img
            ]);

            echo "<div class='alert alert-success'>Registration successful</div>";

        } else {
        echo "<div class='alert alert-danger'>Passwords do not match</div>";
      }
    }
  }
?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Register</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Register</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">
            <form action="register.php" class="p-4 border rounded" method="POST">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Username</label>
                  <input type="text" id="fname" class="form-control" placeholder="Username" name="username">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" placeholder="Email address" name="email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <input type="password" id="fname" class="form-control" placeholder="Password" name="password">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Re-Type Password</label>
                  <input type="password" id="fname" class="form-control" placeholder="Re-type Password" name="re-password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                </div>
              </div>

            </form>
          </div>
      
        </div>
      </div>
    </section>
     
<?php require "../includes/footer.php"; ?>