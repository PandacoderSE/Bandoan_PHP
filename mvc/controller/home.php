<?php
class home extends controller {
    public function product() {
        // Số lượng sản phẩm trên mỗi trang
        $limit = 4;

        // Xác định trang hiện tại
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Lấy tổng số sản phẩm
        $total_products = $this->model("ProductModel")->getTotalProducts();

        // Lấy dữ liệu sản phẩm cho trang hiện tại
        $products = $this->model("ProductModel")->getProducts($page, $limit);

        // Tính toán tổng số trang
        $total_pages = ceil($total_products / $limit);

        if (isset($_POST['submit'])) {
            if (!empty($_POST['Name']) || !empty($_POST['Email']) || !empty($_POST['Message'])) {
                $name = $_POST["Name"];
                $email = $_POST['Email'];
                $nd = $_POST['Message'];
                $ngaycmt = $_POST['ngaycmt'];
                $kq = $this->model("CmtModel")->insert($name, $email, $nd, $ngaycmt);
            }
            $this->view("layout", [
                "type" => $this->model("CategoryModel")->get(),
                "get" => $products,
                "kq" => isset($kq) ? $kq : null,
                "cmt" => $this->model("CmtModel")->getcmt(),
                "total_pages" => $total_pages,
                "current_page" => $page
            ]);
        } else {
            $this->view("layout", [
                "type" => $this->model("CategoryModel")->get(),
                "get" => $products,
                "cmt" => $this->model("CmtModel")->getcmt(),
                "total_pages" => $total_pages,
                "current_page" => $page
            ]);
        }
    }
}

?>