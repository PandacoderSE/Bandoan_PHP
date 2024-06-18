
       <!-- banner -->
       <div class="banner">
    <div class="img">
        <img src="public/img/Special.png" class="img-fluid" alt="">
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

<!--    
san pham ban chay -->
<section class="pricing02 cid-rKZuj2eVgJ" id="pricing02-12" style="margin-top: 60px;">

    

    
    <div class="container">
        <div class="row">

            <div class="col-md-12 pb-5 col-lg-12 align-center">
                <h2 class="mbr-section-subtitle mbr-exbold mbr-light mbr-fonts-style display-5">Combo</h2>
                <h1 class="mbr-section-title pb-3 mbr-exbold mbr-fonts-style display-2">Những món ăn mới cập nhật</h1>
            </div>
            <?php
            while($row = mysqli_fetch_array($data['get'])){

            ?>
            <div class="card item features-image col-12 col-md-6 col-lg-3">
                <div class="item-wrapper align-center">

                    <div class="card-img">
                        <img src="public\img\<?php echo $row['thumbnail']?>" alt="Mobirise">
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

                        <h5 class="price pb-4 mbr-bold mbr-fonts-style display-7"><?php echo number_format( $row['regular_price'] )?>  VND</h5>

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



<div class="embed-responsive embed-responsive-16by9">
    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/FcEVbVrNIyg?start=22" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
  </div>

<section class="carouse3 slide testimonials-slider cid-rKZBKzILXD" data-interval="false" id="testimonials03-20" style="padding-bottom: 0px;">

    

    

    <div class="container text-center">


        <div class="row">
            <div class="col-12  col-md-12 pb-5 col-lg-12">
                <h3 class="mbr-section-subtitle mbr-semibold align-center mbr-fonts-style display-5">Đánh giá</h3>
                <h2 class="mbr-section-title align-center mbr-exbold mbr-fonts-style mbr-black display-2">
                    Bạn thấy thế nào về dịch vụ của chúng tôi?</h2>

            </div>
        </div>
    </div>
</section>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="headings d-flex justify-content-between align-items-center mb-3">
                <h5>Các bình luận</h5>
               
            </div>
            <?php
            while ($row = mysqli_fetch_array($data["cmt"])) {

?>
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"> <img src="public\img\meo.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary"><?php echo $row['hten']?></small> 
                    </span> </div> <small><?php echo $row['ngaycmt']?></small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply px-4"> <small><?php echo $row['noidung']?></small> </div>
                    <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- 
nhan xet -->
<section class="form01 cid-rKZBPrHeRE" id="form01-21" style="padding-top: 0px;">
    
    
    <div class="container">
        <div class="row">




            <div class="col-lg-6 my-auto md-pb mbr-form" data-form-type="formoid">
                <!--Formbuilder Form-->
                <form action="home" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="C7yiKowyCdUcWLfCiF6DKtUuS3CZR1hj2wRq1Cp7APHoG80Y4WQV13atUa0w27UcR3h9NaYPcwxLFW5wcKOPDh53HnV3r+u6LOzMz8YFuc6wpvexo4n753E+AUs3dPaC.Jm0cmI9CqDWTTXWKzTLzhI5uvq+WIdRdXNK7DgYCJ1ARPJODdQ7A7RQRNOUDe7/rm/WKm2zEz2XiVwxY2W7Cvxzym8iusMDwuD8HUEBEmg6A2J29SLmtw39UWrOf4Wxf">
                  

                    <div class="dragArea form-row">
                        <div class="col-lg-12">
                            <h5 class="align-left mbr-fonts-style display-7"><strong>Nhập nhật xét của bạn</strong>
                            </h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="Name">
                            <input type="text" name="Name" placeholder="Tên" data-form-field="Name" required="required" class="form-control display-7" value="" id="Name-form01-21">
                        </div>
                        <div data-for="Email" class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="email" name="Email" placeholder="Email" data-form-field="Email" class="form-control display-7" required="required" value="" id="Email-form01-21">
                        </div>
                        <div data-for="Message" class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="Message" placeholder="Nội dung " data-form-field="Message" required="required" class="form-control display-7" id="Message-form01-21"></textarea>
                        </div>
                        <input id="current-time" value="" type="hidden" name="ngaycmt">
       
                            <script>
                                var curDate = new Date();
                                 
                                // Ngày hiện tại
                                var curDay = curDate.getDate();
                                
                                // Tháng hiện tại
                                var curMonth = curDate.getMonth() + 1;
                                 
                                // Năm hiện tại
                                var curYear = curDate.getFullYear();
                                
                                // Gán vào thẻ HTML
                                document.getElementById('current-time').value = curDay + "/" + curMonth + "/" + curYear;
                            </script>
       
                        <div class="col-auto"><button name="submit" class="btn btn-success display-4">GỬI LỜI NHẮN </button></div>
                    </div>
                </form>
                <!--Formbuilder Form-->
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5232.138944435541!2d105.73616248744364!3d21.052621193213007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1718643479068!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="info02 cid-rKZuEdlTXw" id="info02-16">

    

    

    <div class="container">
        <div class="row jc-sb">

            <div class="col-md-12 col-lg-7 md-pb my-auto">
                <div class="media-content">

                
                    <h2 class="mbr-section-subtitle mbr-semibold align-left mbr-light mbr-fonts-style display-5">Tải ứng dụng</h2>
                    <h1 class="mbr-section-title pb-3 align-left mbr-exbold mbr-fonts-style display-2">Nhấn tải và thưởng thức</h1>


                    <p class="mbr-text align-left pb-3 mbr-fonts-style display-4">Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit. Donec ullamcorper neque dapibus ipsum semper, sit amet
                        luctus turpis porttitor. Ut libero ante, varius quis ligula in, aliquet consectetur tortor.
                        Proin aliquet neque nibh, pretium rutrum quam mattis.<br></p>
                    <div class="mbr-section-btn align-left"><a class="btn btn-md btn-black display-4" href="http://localhost/banthucpham/home">
                        <span ><ion-icon name="logo-google-playstore"></ion-icon></span>Get it on<br>Google
                            Play<br>
                        </a> <a class="btn btn-md btn-black display-4" href="http://localhost/banthucpham/home">
                            <span ><ion-icon name="logo-apple-appstore"></ion-icon></span>Get it on<br>App
                            Store<br></a></div>

                </div>
            </div>

            <div class="col-md-12 col-lg-5 my-auto">
                <div class="mbr-figure">
                    <img src="public\img\04.png" alt="Mobirise">
                </div>
            </div>

        </div>
    </div>

</section>
