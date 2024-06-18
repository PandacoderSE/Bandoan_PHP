
       <!-- banner -->
       <div class="banner">
    <div class="img">
        <img src="public\img\Artboard 2.png" class="img-fluid" alt="">
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

    

    
    <div class="container">
        <div class="row">

      
            <div class="col-md-12 pb-5 col-lg-12 align-center">
                <h2 class="mbr-section-subtitle mbr-exbold mbr-light mbr-fonts-style display-5">Tìm kiếm</h2>
                <h1 class="mbr-section-title pb-3 mbr-exbold mbr-fonts-style display-2" >Kết quả của bạn</h1>
            </div>
            <?php
            while ($row = mysqli_fetch_array($data["timkiem"])) {
        ?>
            <div class="card item features-image col-12 col-md-6 col-lg-3">
                <div class="item-wrapper align-center">

                    <div class="card-img">
                        <img src="public\img\<?php echo $row['thumbnail']?>">
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


