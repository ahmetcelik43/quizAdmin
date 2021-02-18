<?php
$username =json_decode($_COOKIE["kullanici"],true)["kullaniciAdi"];
if(!isset($username) || empty($username))
{
    header("Location: https://quizadmin1.herokuapp.com/login");
}
?>
