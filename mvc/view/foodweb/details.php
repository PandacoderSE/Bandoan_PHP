
       <!-- banner -->
       <div class="banner">
    <div class="img">
        <img src="public\img\details.png" class="img-fluid" alt="">
    </div>
</div>
<!-- search -->
<div class="search-area">
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
    <div class="search_box">
    <form  action="result"  method="POST">
            <input type="text" name="k" class="text_field" placeholder="Bạn đang tìm kiếm nội dung gì ?">
            <div class="search__select select-wrap">
            <span class="fal fa-chevron-down"></span>
            </div>
            <button name="submit" class="search-btn btn--lg">Tìm kiếm</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    
<section class="pricing02 cid-rKZuj2eVgJ" id="pricing02-12" style="margin-top: 60px;">

<section class="form01 cid-rKZBPrHeRE" id="form01-21" style="padding-top: 0px;">


<div class="container">
<h2 class="mbr-section-title align-center mbr-exbold mbr-fonts-style mbr-black display-2">
                Chi tiết món ăn</h2>
                <section data-bs-version="5.1" class="testimonials1 cid-sWqZaq2WIL" id="testimonials1-p">
    

    
    <div class="container">
    <?php
    if(isset($data['details'])){
        while ($row = mysqli_fetch_array($data["details"])){?>
        <div class="row align-items-center" style="background: white;">
            <div class="col-12 col-md-6">
                <div class="image-wrapper">
                <img src="public\img\<?php echo $row['thumbnail']?>"  style="height: 100%;">
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="text-wrapper">
                    <p style="font-size: 30px;font-weight: 800;"><?php echo $row['name_product']?> </p>
                    <p class="mbr-text mbr-fonts-style mb-4 display-7">
                    <?php echo $row['mota']?>
                    </p>
                    <p class="name mbr-fonts-style mb-1 display-4">
                        <strong style="font-size: 20px;">Giá</strong>
                    </p>
                    <p class="position mbr-fonts-style display-4">
                        <strong style="font-size: 20px;"><?php echo number_format($row['regular_price'])?> VND</strong>
                    </p>
                    <p>Số lượng</p>
                    <form action="cart" method="POST">
                    <input type="number" name="soluong" id="" min=1 style="width: 50px;padding: 5px !important;margin-bottom: 20px ;">
                    <input type="hidden" name="idsp" value="<?php echo $row['id_product']?>">
                    <input type="hidden" name="tensp" value="<?php echo $row['name_product']?>">
                    <input type="hidden" name="giasp" value="<?php echo $row['regular_price']?>">
                    <input type="hidden" name="hinhanhsp" value="<?php echo $row['thumbnail']?>">
                </div>
                <?php if(isset($_SESSION['username'])){?>
                <button name="cartup" style="border: none;background: white;">
                <p class="btn btn-secondary display-7"  style="margin: 0;">Thêm vào giỏ hàng</p>
                </button>
                <?php
                }else{
                    ?>
                    <h2>Đăng nhập để tiếp tục mua hàng</h2>
                    <?php
                }
                ?>
                </form>
            </div>
            
        </div>
    </div>
    <?php
        }
    }
        ?>
</section>
  

</div>
</section>
</section>
<section class="pricing02 cid-rKZuj2eVgJ" id="pricing02-12" style="margin-top: 60px;">

    

    
    <div class="container">
        <div class="row">

            <div class="col-md-12 pb-5 col-lg-12 align-center">
                <h1 class="mbr-section-title pb-3 mbr-exbold mbr-fonts-style display-2">Các món ăn khác</h1>
            </div>
         
            <?php
            while ($row = mysqli_fetch_array($data["get"])) {
        ?>
            <div class="card item features-image col-12 col-md-6 col-lg-3">
                <div class="item-wrapper align-center">

                    <div class="card-img">
                        <img src="public\img\<?php echo $row['thumbnail']?>" >
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 254.99 483.96" class="product-shape-hover-img" src="http://demo.themewinter.com/wp/gloreya/wp-content/themes/gloreya/public/jquery/enu_shape_hover.svg" alt="Quarter Onion">
                        <path stroke="lightgray" d="M235.35,0H19.64A19.61,19.61,0,0,0,0,19.59V423.24a19.62,19.62,0,0,0,19.64,19.6H53.4l-1,.09a45.89,45.89,0,0,1,32,12.15c6.73,6.28,11.46,14.52,18.55,20.4,13.23,11,34.19,11.33,47.78.79,7.07-5.49,12-13.26,18.32-19.56,8.81-8.75,21-14.67,33.42-13.73l-1.43-.14h34.23A19.62,19.62,0,0,0,255,423.24V19.59A19.61,19.61,0,0,0,235.35,0Z">
                        </path>
                    </svg>

                    <div class="card-box pt-4">
                        
                    <h4 class="card-title pb-3 mbr-bold mbr-fonts-style display-7"><?php echo $row['name_product']?></h4>
                        <p class="mbr-text mbr-semibold mbr-fonts-style display-4">
                            <?php
                            echo $row['mota']
                            ?></p>

                        <h5 class="price pb-4 mbr-bold mbr-fonts-style display-7"><?php echo number_format($row['regular_price'])?> VND</h5>

                        <a href="details&id=<?php echo $row['id_product']?>">
                        <span class="icon mobi-mbri"><ion-icon name="cart-outline"></ion-icon></span></a>



                    </div>
                </div>
            </div>
          <?php
            }
            ?>

        </div>
    </div>

</section>