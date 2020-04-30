<?php
session_start();
if(isset($_SESSION['email'])){
    echo
    '<!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            <h3>Đăng nhập thành công</h3>
            <form method="get" action="LoginPdo.php?logout=1">
                <button type="submit" name="logout">Logout</button>
            </form>
        </body>
    </html>';
} else {
    echo "<a href='LoginPdo.php'>Bạn phải đăng nhập</a>";
}
?>