<?php
session_start();
if(isset($_SESSION['username'])){
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
            <form method="get" action="Login.php?logout=1">
                <button type="submit" name="logout">Logout</button>
            </form>
        </body>
    </html>';
} else {
    echo "<a href='Login.php'>Bạn phải đăng nhập</a>";
}
?>
