<!DOCTYPE html>
<html>
<title>Q-Pay Website</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" type="image/png" href="images/icon.ico">
<style>
h1,h2,h3,h4,h5,h6 {
    letter-spacing: 5px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#home" class="w3-bar-item w3-button">Quick Payment ( Q-Pay )</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="login.php" class="w3-bar-item w3-button">Masuk</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="images/icon.jpg" alt="Q-Pay" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">Q-Pay</h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="images/gambar2.png" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">Tentang Q-Pay</h1><br>
      <h5 class="w3-center">Aplikasi Point Of Sales</h5>
      <p class="w3-large">Aplikasi ini dibuat oleh Kelompok 2, hasil akhir dari mata kuliah Project II. Aplikasi ini ditujukan untuk memecahkan masalah pada tiap toko agar proses transaksi berjalan cepat.</p>
      <p class="w3-large w3-text-grey w3-hide-medium">Aplikasi ini berbasis Android, dimana pengguna handphone di zaman sekarang hampir semua operasi sistemnya adalah android. Jadi aplikasi ini tidak menyusahkan toko, tidak memerlukan banyak uang untuk membeli peralatan untuk menunjang aplikasi ini cukup dengan handphone saja. Aplikasi ini juga didukung oleh web, dimana web digunakan untuk melihat data barang, karyawan, dan rekap.</p>
    </div>
  </div>
  
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Fitur pada Q-Pay</h1><br>
      <h4>Sqan QR-Code</h4>
      <p class="w3-text-grey">Pembeli dapat melihat harga produk yang akan dibeli dengan cara melakukan Sqan QR-Code dengan handphone via Aplikasi Q-Pay</p><br>
    
      <h4>Kelola Data Barang</h4>
      <p class="w3-text-grey">Aplikasi ini juga dapat mengelola data barang.</p><br>
    
      <h4>Transaksi</h4>
      <p class="w3-text-grey">Proses transaksi juga dilakukan diaplikasi ini.</p><br>
    
      <h4>Struk Transaksi</h4>
      <p class="w3-text-grey">Jika menggunakan aplikasi ini, toko tidak memerlukan kertas untuk Struk, karena struk akan muncul dalam aplikasi apabila pembayaran sudah dilakukan.</p><br>
    
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="images/gambar1.png" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Kontak</h1><br>
    <p>Untuk Menggunakan aplikasi ini, tentunya harus daftar dulu, untuk daftar diharap menggubungi customer service aplikasi ini. Atau langsung datang ke kantor untuk daftar.</p>
    <p class="w3-text-blue-grey w3-large"><b>Politeknik Negeri Indramayu, Jl. Raya Lohbener Lama No. 08 Indramayu 45252 Fax / Tlp. (0234) 5746464</b></p>
    <p>Anda juga dapat menguhubungi customer service kami dengan nomor telpon +6281394626880 atau email qpay@qpay.com</p>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by Tim 2 </p>
</footer>

</body>
</html>
