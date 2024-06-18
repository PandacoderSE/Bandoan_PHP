<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public\stylead\style.css">
    <link rel="stylesheet" href="public/img/themify-icons/themify-icons.css">
</head>
<body>
    <div class="ctnlg">
        <form action="" autocomplete="off" method="post" class="form-lg" id="form-login">
            <h1>Admin login</h1>
            <i class="ti-user"></i>
            <div class="form-group jsfrom">
            <label >User name</label>
            <input id="username" name="user" type="text">
            <span class="form-message"></span>
            </div>

            <div class="form-group jsfrom">
            <label >Password</label>
            <input id="password" name="password" type="password">
            <span class="form-message"></span>
            </div>
            <button class="form-submit">Login</button>
            
        </form>
            
    </div>
    <script src="public/js/script.js"></script>
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
        const frmip = document.querySelectorAll('.jsfrom input')
        const frmlb = document.querySelectorAll('.jsfrom label')
        for(let i=0;i<4;i++){
            frmip[i].addEventListener("mouseover",function(){
                frmlb[i].classList.add("focus")
            })
            frmip[i].addEventListener("mouseout",function(){
                if(frmip[i].value == ""){
                    frmlb[i].classList.remove("focus")
                }
            })
        }
    </script>
</body>
</html>