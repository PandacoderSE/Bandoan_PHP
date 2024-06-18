
<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.11.4, m -->
  <base href="http://localhost/banthucpham/">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.11.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="public/jquery/ogo2.png" type="image/x-icon">
  <meta name="description" content="New DinerM4 HTML Template - Download Now!">
  
  <title>webfood</title>
  <link rel="stylesheet" href="public/style/mobirise2.css">
  <link rel="stylesheet" href="public/style/mobirise-icon.css">
  <link rel="stylesheet" href="public/style/tether.min.css">
  <link rel="stylesheet" href="public/style/bootstrap.min.css">
  <link rel="stylesheet" href="public/style/bootstrap-grid.min.css">
  <link rel="stylesheet" href="public/style/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="public/style/style.css">
  <link rel="stylesheet" href="public/style/styles.css">
  <link rel="stylesheet" href="public/style/jquery.formstyler.css">
  <link rel="stylesheet" href="public/style/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="public/style/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="public/style/css\style.css">
  <link rel="stylesheet" href="public/style/recaptcha.css">
  <link rel="stylesheet" href="public\style\css\csscu\style.css">
  <link rel="preload" as="style" href="public/style/css/mbr-additional.css"><link rel="stylesheet" href="public/style/css/mbr-additional.css" type="text/css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="mobirise/style.css">
    <link rel="stylesheet" href="public\style\bosung.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
  
  
</head>
<body>

<!-- Analytics -->
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PFK425"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PFK425');</script>
<!-- End Google Tag Manager -->
<!-- /Analytics -->
<?php
    if(isset($data['kq'])){
        if($data['kq']==true){?>
    <script>
        swal("Thành công!", "Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!", "success");
    </script>
      <?php
    }
}
?>

<?php
    require_once "mvc/view/blockfood/header.php";
?>


<?php
            if(isset($data['pages'])){
                require_once 'foodweb/'.$data['pages'].'.php';
            }
            else{
                require_once 'mvc/view/blockfood/container.php';
            }
        ?>

<?php
    require_once "mvc/view/blockfood/footer.php";
?>


  <script src="public/jquery/jquery.min.js"></script>
  <script src="public/jquery/popper.min.js"></script>
  <script src="public/jquery/tether.min.js"></script>
  <script src="public/jquery/bootstrap.min.js"></script>
  <script src="public/jquery/nav-dropdown.js"></script>
  <script src="public/jquery/navbar-dropdown.js"></script>
  <script src="public/jquery/jquery.touch-swipe.min.js"></script>
  <script src="public/jquery/jarallax.min.js"></script>
  <script src="public/jquery/vimeo_player.js"></script>
  <script src="public/jquery/bootstrap-carousel-swipe.js"></script>
  <script src="public/jquery/mbr-testimonials-slider.js"></script>
  <script src="public/jquery/jquery.formstyler.js"></script>
  <script src="public/jquery/jquery.formstyler.min.js"></script>
  <script src="public/jquery/jquery.datetimepicker.full.js"></script>
  <script src="public/jquery/smooth-scroll.js"></script>
  <script src="public/jquery/script.js"></script>
  <script src="public/jquery/formoid.min.js"></script>
  
  <!-- Messenger Plugin chat Code -->
  <div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "100576405928641");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v13.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>