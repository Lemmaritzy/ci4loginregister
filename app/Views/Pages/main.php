<?=$this->extend('layouts/index')?>
<?=$this->section("content")?>

<?php
echo session('username')."<br>"; 
echo session('password')."<br>";
echo session('mail')."<br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="select" method="get">
        <input type="hidden" name="user" value="<?=session('username')?>">
        <input type="submit" value="Bilgilerimi göster">
    </form>
    <form action="logout" method="get">
        <input type="submit" value="Çıkış">
    </form>
</body>
</html>

<?=$this->endSection("content")?>