<?php
//thông tin kết nối 
const _HOST = 'localhost';
const _DB = 'Webbanhang';
const _USER = 'root';
const _PASS = '';

try {
    if (class_exists('PDO')) {
        $dsn = 'mysql:bdname=' . _DB . ';host=' . _HOST;
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',//set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //tạo thông báo ngoại lệ khi gặp lỗi 
        ];

        $con = new PDO($dsn, _USER, _PASS, $option);
        if ($con) {
            echo 'Kết nối thành công ';
        }
    }
} catch (Exception $e) {
    echo '<div style="color:red; padding: 5px 15px;border:1px solid red;">';
    echo '<br> Lỗi :' . $e->getMessage();
    echo '</div>';
    die();
}