<?php

include "database.php";

session_start();

if(!isset($_GET['idImg']))
{
    header('Location:Shop.php');
    exit();
}
if(isset($_COOKIE['phone']))
{
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['phone'] = $_COOKIE['phone'];
}
if(isset($_COOKIE['role']))
{
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['role'] = $_COOKIE['role'];
}

if(isset($_SESSION['id']))
{
    $empId = $_SESSION['id'];
    $idImg = $_GET['idImg'];

    $sql_Item = " SELECT * FROM post WHERE id = ".$idImg." ";
    // $sql_Comment = " SELECT status FROM comment WHERE status = 1 ";
    // $sql_ItemCart = " SELECT image,title,text,price 
    //                                     FROM post
    //                                      WHERE post.id IN ( SELECT orderr.Pid
    //                                                                              FROM orderr,employee
    //                                                                          WHERE $empId = orderr.Eid AND orderr.status = 1 ) AND NOT EXISTS ( SELECT * FROM orderr WHERE post.id = orderr.Pid AND status = 2 ) ";
    
    $result_Item = mysqli_query($con,$sql_Item);
    // $result_Comment = mysqli_query($con,$sql_Comment);
    // $result_ItemCart = mysqli_query($con,$sql_ItemCart);
}
else
{
    $idImg = $_GET['idImg'];

    $sql_Item = " SELECT * FROM post WHERE id = ".$idImg." ";
    $result_Item = mysqli_query($con,$sql_Item);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Sal.js CSS -->
    <link rel="stylesheet" href="sal-master/dist/sal.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css?ts=<?=time()?>">

    <title>Home</title>
  </head>
  <body>

                                                      <!-- Header and Nav section -->
<div id="header" style="height: 4rem; position: fixed; top: 0; z-index: 10;">
  <div class="mainBg"></div>

  <div class="container holdNav">
  <div class="row">
            <nav class="col-md-8 col-sm-10 col-12 offset-md-2 offset-sm-1">
            <?php
          
            if(isset($_SESSION['phone']))
            {
              $text = "مرحبا بك";
              echo '<span> <span>'.$_SESSION['name'].' ،</span><span class="float-right">'.$text.'</span> </span>';
              echo '<span>USER</span>';
              echo '<a href="checkAccount.php"><span>تسجيل الخروج</span></a>';
            }
            else if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
            {
              $text = "مرحبا بك";
              echo '<span> <span>'.$_SESSION['name'].' ،</span><span class="float-right">'.$text.'</span> </span>';
              echo '<div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span>لوحة التحكم</span>
                    </a>
                  
                    <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="Order.php">الطلبات</a>
                      <a class="dropdown-item" href="Comment.php">التعليقات</a>
                      <a class="dropdown-item" href="Post.php">إدارة المنتجات</a>
                      <a class="dropdown-item" href="Worker.php">إضافة موظف</a>
                      <a class="dropdown-item" href="Cart.php">طلباتي</a>
                    </div>
                  </div>';
              echo '<a href="checkAccount.php"><span>تسجيل الخروج</span></a>';
            }
            else if(isset($_SESSION['role']) && $_SESSION['role'] == 'worker')
            {
              $text = "مرحبا بك";
              echo '<span> <span>'.$_SESSION['name'].' ،</span><span class="float-right">'.$text.'</span> </span>';
              echo '<div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,10">
                      <span>لوحة التحكم</span>
                    </a>
                  
                    <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdownMenuLink">
                        <div class="mainBg"></div>
                      <a class="dropdown-item" href="Home.php">الرئيسية</a>
                      <a class="dropdown-item" style="color: var(--main-en-color); cursor: default;" href="#">الطلبات</a>
                      <a class="dropdown-item" href="Comment.php">التعليقات</a>
                      <a class="dropdown-item" href="Post.php">إدارة المنتجات</a>
                      <a class="dropdown-item" href="Cart.php">طلباتي</a>
                    </div>
                  </div>';
              echo '<a href="checkAccount.php"><span>تسجيل الخروج</span></a>';
            }
            else
            {
              echo '<a href="Register.php" class="mx-auto"><span>تسجيل الدخول</span></a>';
            }
            
            
            ?>
            </nav>
         </div>
    </div>
</div>
                                                            <!-- Title section -->

<div class="container">
    <div class="title section rounded-lg">
            <div class="mainBg rounded-lg"></div>
          <img src="img/aLogo.png" alt="" data-sal="fade" data-sal-duration="800" data-sal-delay="300" data-sal-easing="ease-out">
          <h1 data-sal="fade" data-sal-duration="800" data-sal-delay="600" data-sal-easing="ease-out">Antique & Gifts</h1>
    </div>
</div>

                                                            <!-- Detail section -->
	<div class="container section mb-5">
        <div class="row justify-content-center align-items-center">
              <div class="leftDetail col-md-6 col-12 text-center mb-4">
                    <?php 
                    if(mysqli_num_rows($result_Item) > 0){
                         $row = mysqli_fetch_array($result_Item)    ?>

                        <img src="savedImg/<?php echo $row['image'] ?>" alt="">
              </div>
                      
              <div class="rightDetail col-md-6 col-12 text-right">

                        <p> <b>الاسم:</b>  <?php  echo $row['title']  ?> </p><hr>
                        <p> <b>الوصف:</b>  <?php  echo $row['text']  ?> </p><hr>
                        <p> <b>الصنف:</b>  <?php  echo $row['category']  ?> </p><hr>
                        <p> <b>السعر:</b>  <?php echo $row['price'] ?> ريال </p>
              <form action="addToCart.php" method="post" enctype="multipart/form-data" class="text-center mt-5">
                            <input type="hidden" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id']; ?>" name="empId">
                            <input type="hidden" value="<?php if(isset($_SESSION['id'])) echo $row['id']; ?>" name="postId">
                            <input type="hidden" value="<?php if(isset($idImg)) echo $idImg; ?>" name="imgId">
                            <button type="submit" name="submit" class="btn btn-outline-danger submit">اضافه الى السلة</button>
              </form>
              <?php
                    if(isset($_GET['errorInAdd']))
                        echo '<span>عذرا... يجب عليك تسجيل الدخول اولا, <a href="Register.php">لتسجيل الدخول</a></span>';
              
              ?>       
            </div>
        </div>
        <?php   }
        else
          echo "sory no data";
         ?>

    </div>
    
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/882f4098ed.js" crossorigin="anonymous"></script>

<!-- MixitUp -->
<script src="mixitup-3/dist/mixitup.min.js"></script>

 <!-- Sal.js -->
<script src="sal-master/dist/sal.js"></script>

 <!-- JS -->
 <script src="js/script.js?ts=<?=time()?>"></script>
</body>
</html>