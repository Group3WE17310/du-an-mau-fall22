<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../content/css/category.css">
</head>
<body>
<?php
         require "../dao/pdo.php";
         require "../dao/loai.php";
         require "../dao/hang_hoa.php";
        
    ?>
    <div class="container">
        <?php
        require "inc/header.php";
        ?>
        <main>
            <article>
                
                <div class="listProduct">
                        <?php
                            $dshh =hang_hoa_select_by_loai_hang($_GET['ma_loai']);
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
                require "inc/aside.php";
            ?>
        </main>

    

        <?php
            require "inc/footer.php";
        ?>
    </div>
    
    
</body>
</html>