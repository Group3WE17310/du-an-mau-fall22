<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../content/css/home.css">
    <style>
        
    </style>
</head>
<body>
    <?php
         require "../dao/pdo.php";
         require "../dao/loai.php";
         require "../dao/hang_hoa.php";
    ?>
    <div class="container">
        <?php
        require 'inc/header.php';
        ?>
        <main>
            <article>
                <div class="slideShow">
                    <!-- Thẻ Chứa Slideshow -->
 <div class="slideshow-container">
  <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->
   <div class="mySlides fade">
     <div class="numbertext">1 / 3</div>
     <img src="../content/img/banner2.jpg" alt="">
     
   </div>
  <div class="mySlides fade">
     <div class="numbertext">2 / 3</div>
     <img src="../content/img/banner3.jpg" alt="">
     
   </div>
  <div class="mySlides fade">
     <div class="numbertext">3 / 3</div>
     <img src="../content/img/banner4.jpg" alt="">
     
   </div>
  <!-- Nút điều khiển mũi tên-->
   <a class="prev" onclick="plusSlides(-1)">❮</a>
   <a class="next" onclick="plusSlides(1)">❯</a>
 </div>
 <br>
<!-- Nút tròn điều khiển slideshow-->
 <div style="text-align:center">
   <span class="dot" onclick="currentSlide(1)"></span>
   <span class="dot" onclick="currentSlide(2)"></span>
   <span class="dot" onclick="currentSlide(3)"></span>
 </div>
                </div>
                <div class="listProduct">
                    <?php
                        $dshh =hang_hoa_select_all();
                        foreach ($dshh as $hh) {
                           
                    ?>
                    <div class="product">
                        <img src="../content/img/<?php echo $hh['hinh'] ?>" alt="">
                        <br>
                        <b><?php echo $hh['don_gia'] ?>$</b>
                        <p><a href="detail.php?ma_hh=<?php echo $hh['ma_hh'] ?>"><?php echo $hh['ten_hh'] ?></a></p>
                    </div>
                   <?php
                        }
                   ?>
                    
                </div>
            </article>
            <?php
            require 'inc/aside.php';
        ?>
            
        </main>

        
        <?php
            require 'inc/footer.php';
        ?>
    </div>
</body>
<script src="../content/js/home.js"></script>
</html>
