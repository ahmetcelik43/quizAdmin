<?php
$username =json_decode($_COOKIE["kullanici"],true)["kullaniciAdi"];
if(!isset($username) || empty($username))
{
    header("Location: http://localhost:90/api/admin/login");
}
?>
