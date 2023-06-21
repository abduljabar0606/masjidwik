<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylee.css">
    <link href='https://fonts.googleapis.com/css?family=Be Vietnam Pro' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Epilogue' rel='stylesheet'>
    <script src="coba.js"></script>
</head>
<body> 
<nav class="navbar">
    <div class="navbar-logo">
        <img src="wikrama.jpg" alt="" class="navbar-icon"></a>
        <a href="#" class="navbar-tag">SMK WIKRAMA BOGOR</a>
    </div>
    <div class="navbar-nav">
        <a href="#home" id="home-link">Home</a>
        <a href="#how">Cara Wakaf</a>
        <a href="#data">Data Wakaf</a>
        <a href="#gallery">Gallery</a>
        <a href="https://smkwikrama.sch.id/" target="_blank">Web Wikrama</a>
    </div>
</nav>

<section class="hero" id="home">
    <main class="content">
        <h3>Masjid Besar SMK Wikrama Bogor</h3>
        <p>Mari <span>Tingkatkan Keimanan</span> Masyarakat SMK Wikrama Bogor.</p>
        <a href="input.php">Beri Bantuan Shodaqoh</a>
    </main>

    <div class="content-img">
        <img src="Rectangle 1.png" alt="">
        <img src="Frame 18792.png" alt="" class="ekstra-img">
        <img src="unnamed 1.png" alt="" class="ekstra-image">
    </div>
</section>

<section class="bar-progres">


    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "masjidwik";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    // Mengambil data donasi dari tabel sodakoh
    $sql = "SELECT SUM(REPLACE(nominal, '.', '')) AS total_donasi, COUNT(*) AS jumlah_donatur FROM sodakoh";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_donasi = $row["total_donasi"];
        $jumlah_donatur = $row["jumlah_donatur"];
    } else {
        $total_donasi = 0;
        $jumlah_donatur = 0;
    }

    // Menentukan target donasi
    $target_donasi = 200000000; // 200 juta

    // Menghitung persentase donasi terkumpul
    $persentase = ($total_donasi / $target_donasi) * 100;

    // Menghitung lebar bar progress
    $bar_width = $persentase * 3; // 3 adalah faktor untuk mengatur lebar
    
    $sql = "SELECT * FROM sodakoh";
    $result = $conn->query($sql);
    $scrolling_text = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nama = $row["nama"];
            $nominal = $row["nominal"];
            $kategori = $row["kategori"];

            $scrolling_text .= "$nama - $kategori  : Rp. " . number_format($nominal) . "  |  ";
      }
  }
  ?>
    <div class="bar-information">
        <h4>total target dana</h4>
        <h4>total dana terkumpul</h4>
        <h4>total donatur</h4>
    </div>

    <div class="bar-money">
        <h2>Rp.<?php echo number_format($target_donasi); ?></h2>
        <h2>Rp.<?php echo number_format($total_donasi); ?></h2>
        <h2><?php echo $jumlah_donatur; ?> Orang</h2>
    </div>
    <hr>
    <div class="progress-bar">
        <div class="progress" style="width: <?php echo $bar_width; ?>px;"></div>
        <div class="percentage">
            <strong><?php echo number_format($persentase, 2); ?>%</strong><p>Terpenuhi</p>
        </div>
    </div>
    <div class="scrolling-text">
        <p><?php echo $scrolling_text; ?></p>
        <div class="blue-bar"></div>
    </div>
</section>

    
<section class="banner">
        <!--image slider start-->
        <div class="slider">
            <div class="slides">
              <!--radio buttons start-->
              <input type="radio" name="radio-btn" id="radio1">
              <input type="radio" name="radio-btn" id="radio2">
              <input type="radio" name="radio-btn" id="radio3">
              <input type="radio" name="radio-btn" id="radio4">
              <!--radio buttons end-->
              <!--slide images start-->
              <div class="slide first">
                <img src="Gedung.jpg" alt="">
              </div>
              <div class="slide">
                <img src="rsz_1_gedung_1.jpg" alt="">
              </div>
              <div class="slide">
                <img src="download.jpg" alt="">
              </div>
              <div class="slide">
                <img src="perpus.jpg" alt="">
              </div>
              <!--slide images end-->
              <!--automatic navigation start-->
              <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
              </div>
              <!--automatic navigation end-->
            </div>
            <!--manual navigation start-->
            <div class="navigation-manual">
              <label for="radio1" class="manual-btn"></label>
              <label for="radio2" class="manual-btn"></label>
              <label for="radio3" class="manual-btn"></label>
              <label for="radio4" class="manual-btn"></label>
            </div>
            <!--manual navigation end-->
          </div>
          <!--image slider end-->
      
          <script type="text/javascript">
          var counter = 1;
          setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if(counter > 4){
              counter = 1;
            }
          }, 5000);
          </script>
</section>

<section class="about-wakaf">
    <div class="about-title">
        <p><span>Manfaat</span> wakaf, infaq shodaqoh.</p>
        <h5>berikut adalah beberapa keutamaan wakaf, infaq 
        shodaqoh yang akan anda dapatkan.</h5>
    </div>
    
    <div class="container1">
        <div class="top-cards">
          <div class="card">
            <img src="Frame 18567.png" class="bordercard"> 
            <img src="hati.png" class="picbaccard1">
            <br><br>
            <h1>Menjadikan hati lebih tenang</h1>
            <br> 
            <p>Kami memberikan harga yang terbaik dibandingkan
            dengan kompetitor kami.</p>
          </div>
          <div class="card">
            <img src="Frame 18567 (1).png" class="bordercard"> 
            <img src="ceklis.png" class="picbaccard2">
            <br><br>
            <h1>Terbukanya pintu rezeki</h1> 
            <br>
            <p>Allah akan membuka pintu rezeki dari arah yang tidak
            dikira sebelummnya</p>
          </div>
        </div>
  
        <div class="bottom-cards">
          <div class="card"> 
            <img src="Frame 18567 (2).png" class="bordercard"> 
            <img src="security.png" class="picbaccard3">
            <br><br>
            <h1>Menjauhkan dari bahaya</h1> 
            <br>
            <p>Rasulullah SAW pernah bersabda: "Bersegeralah untuk
            bersedekah , karena musibah dan bencana tidak bisa mendahului sedekah."</p>
          </div>
          <div class="card">
            <img src="Frame 18567 (3).png" class="bordercard"> 
            <img src="bintang.png" class="picbaccard4">       
            <br><br>
            <h1>Pahala yang tak terputus</h1>
            <br> 
            <p>Ini akan menolong kita di akhirat nantinya, juga dapat
            menyelamatkannya dari api neraka.</p>
          </div>
        </div>
    </div>
    <div class="image-container">
        <img src="unsplash_lyiKExA4zQA.png" alt="Gambar">
    </div>
</section>

<section class="how" id="how">
    <div class="how-content">
        <h1><span>Cara Melakukan</span> Wakaf, Infaq Shodaqoh.</h1>
        <h5>berikut adalah cara melakukan wakaf, infaq shodaqoh untuk membantu pembangunan mesjid besar SMK wikrama Bogor</h5>
    </div>
    <div class="how-container">
        <div class="how-box">
            <div class="how-card">
                <h1><span>01</span><br> Isi form data diri</h1>
                <p>Isikan form pengisian yang tersedia di form data diri, isikan dengan data diri anda dengan teliti.</p>
            </div>
            
            <div class="how-card">
                <h1><span>02</span> <br>isikan nominal shodaqoh</h1>
                <p>Isikan nominal yang akan anda shodaqohkan, pastikan isi nominal dengan seiklasnya tanpa ada paksaan apapun.</p>
            </div>

            <div class="how-card">
                <h1><span>03 </span><br>Upload bukti pembayaran</h1>
                <p>Pilih metode pembayaran dan upload bukti pembayaran.</p>
            </div>

            <div class="how-card">
                <h1><span>04 </span><br>verifikasi pembayaran</h1>
                <p>Pembayaran anda akan di verikasi oleh admin dan jika terverifikasi nama anda akan tampil.</p>
            </div>
        </div>
    </div>
</section>

<section class="wakaf">
    <div class="cara-wakaf">
      <p><span>Data Donatur </span>Wakaf, Infaq <br>Shodaqoh. </p>
      <h5>Berikut Adalah Data Donatur Wakaf, Infaq Sodaqoh Untuk <br> Masjid Besar SMK Wikrama Bogor.</h5>
    </div>
</section>
    
<section class="datatabel">
    <?php
    include("working.php");
    ?>
    
    <div class="datatabel">
     <div class="row">
       <div class="col-sm-8">
        <?php echo $deleteMsg??''; ?>
        <div class="table-responsive">
          <table class="table-table-bordered">
           <thead><tr><th>Nomor</th>
    
             <th>Nama Donatur</th>
             <th>ID Donatur</th>
             <th>Paket</th>
             <th>Kategori</th>
             <th>Nominal</th>
        </thead>
        <tbody>
      <?php
          if(is_array($fetchData)){      
          $sn=1;
          foreach($fetchData as $data){
        ?>
          <tr>
          <td><?php echo $sn; ?></td>
          <td><?php echo $data['Nama']??''; ?></td>
          <td><?php echo $data['ID']??''; ?></td>
          <td><?php echo $data['Paket']??''; ?></td>
          <td><?php echo $data['Kategori']??''; ?></td>
          <td><?php echo 'Rp. ' . $data['Nominal']??''; ?></td>  
         </tr>
         <?php
          $sn++;}}else{ ?>
          <tr>
            <td colspan="8">
        <?php echo $fetchData; ?>
      </td>
        <tr>
        <?php
        }?>
        </tbody>
         </table>
       </div>
    </div>
    </div>
    </div>    
</section>

<section class="gallery" id="gallery">
    <div class="gallery-title">
        <p><span>gallery</span> masjid besar SMK wikrama bogor.</p>
        <h5>berikut adalah gallery masjid SMK wikrama bogor.</h5>
    </div>
    <div class="gallery-container">
        <div class="gallery-box">
            <div class="gallery-content">
                <img src="Rectangle 300.png" alt="">
            </div>
            <div class="gallery-content">
                <img src="Rectangle 300 (1).png" alt="">
            </div>
            <div class="gallery-content">
                <img src="Rectangle 300 (2).png" alt="">
            </div>
            <div class="gallery-content">
                <img src="Rectangle 300 (3).png" alt="">
            </div>
            <div class="gallery-content">
                <img src="Rectangle 300 (4).png" alt="">
            </div>
            <div class="gallery-icon">
                <img src="Vector.png" alt="">
                <p >Buka Gallery</p>
            </div>
        </div>
        
    </div>
</section>

<section class="footer">
    <footer>
        <div class="footer-left">
            <div class="footer-title-body">
                <img src="unnamed 1 (1).png">
                <h3 class="title">SMK Wikrama <br>Bogor</h3>
            </div>
            <div class="address">
                <h4>Alamat</h4>
                <p>Jl. Raya Wangun <br>
                    Kelurahan Sindangsari<br>
                    Bogor Timur 16720</p>
            </div><br>
            <div class="call">
                <h4>Telepon</h4>
                <p> 0251-8242411 / <br>
                    082221718035 (Whatsapp)</p>
            </div><br>
            <div class="footer-social-icons">
                <a href="#"><i class='bx bxl-facebook-square'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-youtube'></i></a>
            </div>
        </div>
        <div class="footer-right">
            <h4>Tentang Wikrama</h4>
            <ul>
                <li><a href="#">Sejarah</a></li>
                <li><a href="#">Peraturan Sekolah</a></li>
                <li><a href="#">Rencana Strategi &amp; Prestasi</a></li>
                <li><a href="#">Yayasan</a></li>
                <li><a href="#">Struktur Organisasi</a></li>
                <li><a href="#">Cabang</a></li>
                <li><a href="#">Penghargaan</a></li>
                <li><a href="#">Kerjasama</a></li>
            </ul>
        </div>
        <?php


        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $pesan = $_POST['pesan'];


            $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
            if (mysqli_query($conn, $sql)) {
            }
        }
        ?>
        <div class="footer-right-box">
            <h4>Kirim Pesan</h4>
            <div class="content-footer">
                <form action="" method="post">
                    <div class="name">
                        <input type="text" name="nama" required placeholder="Nama">
                    </div>
                    <div class="email">
                        <input type="email" name="email" required placeholder="Email">
                    </div>
                    <div class="msg">
                        <textarea name="pesan" cols="30" rows="5" placeholder="Pesan Anda"></textarea>
                    </div>
                    <div class="btn">
                        <button type="submit" name="submit">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>

    </footer>

</section>

<p class="footer-copy">© 2023 - SMK Wikrama Bogor. All Rights Reserved.</p>
</body>
</html>