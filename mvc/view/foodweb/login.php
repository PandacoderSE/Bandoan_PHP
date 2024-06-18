<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost/banthucpham/home">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" 
    crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="public\stylelogin\style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="Viewlogin/login" method="POST" autocomplete="off" id="form-login" class="sign-in-form">
            <h2 class="title">Đăng nhập</h2>
            <?php
                                if(isset($data['kq'])){
                                    if($data["kq"]=="true"){
                                      header('location: http://localhost/banthucpham/home');
                                  
                                    }
                                    else{?>
                                    <h3 style="color:red;margin-bottom: 20px;">
                                        <?php echo "Sai username hoặc password";?>
                                    </h3>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                }
                            ?>
                            
            <div class="input-field form-group">
                <i class="fas fa-user"></i>
                <input id="username" name="user" type="text" placeholder="Username">
                <span class="form-message"></span>
            </div>
            <div class="input-field form-group">
              <i class="fas fa-lock"></i>
              <input id="password" name="password" type="password" placeholder="Password">
              <span class="form-message"></span>
            </div>
            <button class="form-submit btn solid">Đăng nhập</button>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Bạn chưa có tài khoản?</h3>
            <p>
                Hãy đăng ký một tài khoản mới!
            </p>
            <a href="Viewregister" class="btn transparent" id="sign-up-btn">
              Đăng ký
            </a>
          </div>
          <img src="public/img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="public\jslogin\script.js"></script>
    <script>
        Validator({
          form: '#form-login',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [
            Validator.isRequired('#username'),
            Validator.minLength('#password', 6),
          ],
        });
    </script>
  </body>
</html>
