<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost/banthucpham/home">  
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="public\stylelogin\style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="Viewregister/register" method="POST" autocomplete="off" id="form-register" class="sign-in-form">
          <h2 class="title">Đăng ký</h2>
          <?php
                                if(isset($data['kq'])){
                                    if($data["kq"]=="true"){?>
                                    <h3 style="color:rgb(0, 162, 255);margin-bottom: 20px;">
                                        <?php echo "Đăng ký thành công! ";
                                        ?> 
                                    </h3>
                                    <?php
                                    }
                                    else{?>
                                    <h3 style="color:red;margin-bottom: 20px;">
                                        <?php echo "Đăng ký thất bại";?>
                                    </h3>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                }
                            ?>
            <div class="input-field form-group">
              <i class="fas fa-user"></i>
              <input id="fullname" name="fullname" type="text" placeholder="Username">
              <span id="messageUn" class="form-message"></span>
            </div>
            <div class="input-field form-group">
              <i class="fas fa-envelope"></i>
              <input id="email" name="email" type="text" placeholder="email">
              <span class="form-message"></span>
            </div>
            <div class="input-field form-group">
              <i class="fas fa-lock"></i>
              <input id="passwordr" name="password" type="password" placeholder="Password" >
              <span class="form-message"></span>
            </div>
            <div class="input-field form-group">
              <i class="fas fa-lock"></i>
              <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Retype">
              <span class="form-message"></span>
            </div>
            <button class="form-submit btn solid">Đăng ký</button>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Bạn đã có tài khoản?</h3>
            <p>
                Hãy đăng nhập bằng tài khoản của bạn!
            </p>
            <a href="Viewlogin" class="btn transparent" id="sign-up-btn">
              Đăng nhập
            </a>
          </div>
          <img src="public\img\register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="public\jslogin\script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/jslogin/check.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        Validator({
          form: '#form-register',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [
            Validator.isRequired('#fullname', 'Vui lòng nhập đầy đủ thông tin'),
            Validator.isEmail('#email','Vui lòng nhập đúng email'),
            Validator.minLength('#passwordr', 6,'Nhập tối thiểu 6 ký tự'),
            Validator.isRequired('#password_confirmation','Vui lòng nhập đầy đủ thông tin'),
            Validator.isConfirmed('#password_confirmation', function () {
              return document.querySelector('#form-register #passwordr').value;
            }, 'Không trùng khớp')
          ],
        });
        });
    </script>
  </body>
</html>
