<?php
    if(isset($_GET['log'])){
        $dx =$_GET['log'];
    }else{
        $dx ='';
    }
    if($dx=='logout'){
        unset($_SESSION["user"]);
        header('location: mvc/view/loginad.php');
    }
?>
<div class="modal js-modal" >
    <div class="modal-container js-mdcs" style="height: 150px;">
        <div class="modal-header">
            </div>
            <div class="navmodal">
                <div class="txmd" style="text-align: center;">
                <p style="padding-bottom: 16px;">Hello!</p>
                <p><?php
                    if(isset($_SESSION["user"])){
                        echo $_SESSION["user"];
                    }
                 ?></p>
                </div>
               
                <li id="logout"><i class="fas fa-sign-in-alt"></i><a href="http://localhost/banthucpham/loginad">Logout</a></li>

            </li>
         </div>
</div>