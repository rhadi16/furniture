<?php 
  session_start();
  include "admin/config/connect.php";

  if(isset($_SESSION['user']) && $_SESSION['oten'] == "admin"){
    // fungsi redirect menggunakan javascript
    echo '<script language="javascript"> window.location.href = "admin" </script>';

  } elseif (isset($_SESSION['user']) && $_SESSION['oten'] == "pelanggan"){
    // fungsi redirect menggunakan javascript
    echo '<script language="javascript"> window.location.href = "pelanggan" </script>';
  }

  $qry2 = "SELECT
            *
          FROM tb_barang";
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <!-- my fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
      <!-- my style -->
      <link rel="stylesheet" type="text/css" href="css/style1.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Happy Home Furniture</title>
    </head>

    <body>
      <!-- Navbar -->
      <div class="navbar-fixed">
        <nav class="navcol">
          <div class="container">
            <div class="nav-wrapper">
              <a href="#" class="brand-logo nav-link">Happy Home Furniture</a>
              <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="#login" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">near_me</i>Login</a></li>
              </ul> 
            </div>
          </div>
        </nav>
      </div>
      <!-- navbar trigger -->
      <ul class="sidenav" id="mobile-nav">
        <li><a href="#login" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">near_me</i>Login</a></li>
      </ul>

      <div id="login" class="modal container">
        <form method="post" action="login_func.php">
          <div class="modal-content">
            <h4>Login</h4>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">account_box</i>
                <input id="icon_prefix" type="email" class="validate" name="email" required>
                <label for="icon_prefix">Email</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input id="icon_telephone" type="password" name="password" class="validate" required>
                <label for="icon_telephone">Password</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">accessibility</i>
                <select name="oten" required>
                  <option value="admin">Admin</option>
                  <option value="pelanggan">Pelanggan</option>
                </select>
                <label>Login Sebagai</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="waves-effect waves-light btn modal-close red darken-4"><i class="material-icons left">close</i>Tutup</button>
            <input type="hidden" name="login" value="login">
            <button type="submit" class="waves-effect waves-light btn light-green accent-4"><i class="material-icons left">input</i>Login</button>
          </div>
        </form>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-4">Shop Furniture <span>Faster</span><br> and with the <span>Best Quality</span></h1><br>
          <a href="registrasi.php" class="waves-effect waves-light btn"><i class="material-icons left">near_me</i>Go To Registration</a>
        </div>
      </div>

      <!-- container info panel -->
      <div class="container info-panel">
        <!-- info panel -->
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="col m4 s12">
                <i class="material-icons left medium">stars</i>
                <h4>Kualitas Terbaik</h4>
              </div>
              <div class="col m4 s12">
                <i class="material-icons left medium">local_shipping</i>
                <h4>Pengiriman Cepat</h4>
              </div>
              <div class="col m4 s12">
                <i class="material-icons left medium">people</i>
                <h4>Pelayanan cepat</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- working space -->
      <div class="container working">
        <div class="row">
          <div class="col m7 s12">
            <img src="img/bg-services.jpg" alt="Working Space" class="responsive-img hoverable">
          </div>
          <div class="col m5 s12">
            <h3>You <span>Shophing</span> from <span>Home</span></h3>
            <p>Perabotan harus nyaman. Dan selalu miliki karya seni yang Anda buat di suatu tempat di rumah.</p>
            <a href="index.html" class="waves-effect waves-light btn"><i class="material-icons left">near_me</i>Company</a>
          </div>
        </div>
      </div>

      <!-- testimonial -->
        <div class="testimonial">
          <div class="carousel">
            <?php
              $no = 1;
              $query2 = mysqli_query($mysqli, $qry2);
              while ($data2 = mysqli_fetch_array($query2)) {
            ?>
                <a class="carousel-item">
                  <p class="center-align"><?php echo $data2['nama_barang']; ?></p>
                  <img src="admin/foto_brg/<?php echo $data2['foto']; ?>" class="hoverable">
                </a>
            <?php } ?>
          </div>          
        </div>

      <!-- footer -->
      <footer class="page-footer grey darken-3">
        <div class="footer-copyright">
          <div class="container">
            <p>Furniture</p>
            <a class="grey-text text-lighten-4 right" href="#">Back To Top</a>
          </div>
        </div>
      </footer>

      <?php
        if (isset($_GET['desc'])) {
          $desc = $_GET['desc']; 
      ?>
          <?php
            if ($desc == "success-reg") {
          ?>
            <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
          <?php } elseif ($desc == "failed-reg2") { ?>
            <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
          <?php } elseif ($desc == "failed-log") { ?>
            <div class="desc-in" data-flashdata="<?php echo $desc; ?>"></div>
          <?php } ?>
      <?php
        }
      ?>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.js"></script>
      <!-- Jquery -->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <!-- my js -->
      <script src="admin/assets/sweetalert/dist/sweetalert2.all.min.js"></script>
      <script type="text/javascript" src="js/script1.js"></script>
    </body>
  </html>