<?php
    if(isset($_GET['log'])){
        $dx =$_GET['log'];
    }else{
        $dx ='';
    }
    if($dx=='logout'){
        unset($_SESSION['username']);
        header('location: http://localhost/banthucpham/home');
    }
?>
  <section class="menu cid-rKYPNHqRuO" once="menu" id="menu1-l">

    


<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">

    <div class="container">
        <div class="navbar-brand">
            <span class="navbar-logo">
                <a href="home">
                    <img src="public/img/logo.png" alt="Mobirise" style="height: 3.8rem;">
                </a>
            </span>
            <span class="navbar-caption-wrap"><a class="navbar-caption mbr-light text-white display-5" href="home">
                     HauiFood</a></span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="home">
                        Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="profile">
                        Giới thiệu</a>
                </li>
                <li class="nav-item dropdown">
  
                    <a class="nav-link link text-white dropdown-toggle display-4" href="product" data-toggle="dropdown-submenu">Thực đơn</a>
                    <div class="dropdown-menu">
                        <?php
                        while ($row = mysqli_fetch_array($data["type"])) {
                        ?>
                        <a class="text-white dropdown-item display-4" href="product&id=<?php echo $row['id']?>"><?php echo $row['cate_name']?></a>
                        <?php
                        }
                        ?>
                </li>
                <?php
                if(isset($_SESSION["username"])){
                ?>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="cart">
                       Giỏ hàng</a>
                </li>
                <?php
                }
                ?>
            </ul>
            <?php
             if(isset($_SESSION['username'])){?>
             <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-white display-4" href="home&log=logout">
                    Đăng xuất </a></div>
             <?php
             }else{
                 ?>
                  <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-white display-4" href="Viewlogin">
                    Đăng nhập </a></div>
                 <?php
             }
            ?>
           
            
        </div>
    </div>
</nav>

</section>