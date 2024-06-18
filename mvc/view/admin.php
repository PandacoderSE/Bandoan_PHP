<?php
	if(!isset($_SESSION["user"])){
		header('Location: loginad');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/banthucpham/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="public\stylead\style.css">
    <link rel="stylesheet" href="public\stylead\stylethem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

    
    <title>WebFood</title>

    
</head>
<body>
    <div class="container">
    <?php require_once 'pagesad/navigation.php'?>
    <div class="main">
    <?php require_once 'pagesad/top.php'?>
    <?php
    require_once 'pagesad/'.$data['pages'].'.php';
    ?>
    </div>
    <?php 
    require_once 'mvc/view/pagesad/modol.php';
    ?>
    <script src="public/js/modal.js"></script>
    <script src="public/js/script.js"></script>
    <script src="public/js/jsthem.js"></script>
    <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
    let toggle= document.querySelector('.toggle');
    let navigation= document.querySelector('.navigation');
    let main= document.querySelector('.main');
    toggle.onclick = function(){
    navigation.classList.toggle('active');
    main.classList.toggle('active')
    }

    let list = document.querySelectorAll('.navigation li');
    function activeLink(){
    list.forEach((item)=>
    item.classList.remove('hovered'));
    this.classList.add('hovered');
    }
    list.forEach((item)=>
    item.addEventListener('mouseover',activeLink));

    document.getElementById("dateField").value = new Date().toISOString().substring(0, 10);
    </script>
</body>
</html>