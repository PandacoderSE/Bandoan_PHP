 <?php
 //check username có tồn tại hay chưa
 class Ajax extends controller{
    public function checkun(){
        $un = $_POST['un'];
        $a = $this->model("LoginModel")->checkun($un);
        if($a=="true"){
            echo"Tên này đã được sử dụng";
        }
    }
    
 }
 ?>