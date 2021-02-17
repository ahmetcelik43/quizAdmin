<?php
  require 'vendor/autoload.php';
  require 'auth.php';

  use GuzzleHttp\Client;
  $loader = new \Twig\Loader\FilesystemLoader('template/');
$twig = new \Twig\Environment($loader, [
    'cache' => 'compilation_cache',
]);


    $url = "http://localhost:90/api/admin/";
    $kategoriLink = $url . 'kategori';
    $sorularLink = $url . 'soru';
    $kullanicilarLink = $url . 'kullanicilar';
    $cevaplarLink = $url . 'cevaplar';
    
    $rol =json_decode($_COOKIE["kullanici"],true)["rol"];
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $client = new Client([
            'base_uri' => 'https://quizapp1234.herokuapp.com/kategori',
            'timeout'  => 20.0,
        ]);
        //$data = ["posta"=>$gelen_veri->posta , "sifre"=> $gelen_veri->sifre];
        $response = $client->request('GET', '');     
        if($response->getStatusCode() === 200)
        {
             $res = json_decode($response->getBody()->getContents(),true);
             //var_dump($res);die();
             $kategori = isset($res['Mesaj'])  ? [] : $res;

//             $kategori = $res["kategoriler"]  ? json_decode($res["kategoriler"] , true) : [];
             $kategoriSayisi = count($kategori);
         
        }
        $client = new Client([
            'base_uri' => 'https://quizapp1234.herokuapp.com/soru',
            'timeout'  => 20.0,
        ]);
        //$data = ["posta"=>$gelen_veri->posta , "sifre"=> $gelen_veri->sifre];
        $response = $client->request('GET', '');     
        if($response->getStatusCode() === 200)
        {
             $res = json_decode($response->getBody()->getContents(),true);
             $soru = isset($res["Mesaj"])  ? [] : $res;
             $soruSayisi = count($soru);
         
        }
        $client = new Client([
            'base_uri' => 'https://quizapp1234.herokuapp.com/uyeler',
            'timeout'  => 20.0,
        ]);
        $response = $client->request('GET', '');     
        if($response->getStatusCode() === 200)
        {
             $res = $response->getBody()->getContents();
             $uye = json_decode($res , true);
             $uyeSayisi = count($uye);
         
        }
    }
    echo $twig->render('anasayfa.html',[ "url"=>$url ,"kategoriLink"=>$kategoriLink,
     "sorularLink"=>$sorularLink,"kullanicilarLink"=>$kullanicilarLink , "cevaplarLink"=>$cevaplarLink , "username"=>$username,
     "rol"=> $rol , "kategoriSayisi"=>$kategoriSayisi  ,"soruSayisi"=>$soruSayisi ,"uyeSayisi"=>$uyeSayisi]);



?>
