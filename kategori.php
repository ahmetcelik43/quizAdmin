<?php
  require 'vendor/autoload.php';
  require 'auth.php';
  use GuzzleHttp\Client;
  $loader = new \Twig\Loader\FilesystemLoader('template/');
  $twig = new \Twig\Environment($loader, [
    'cache' => 'compilation_cache',
  ]);


    $url = "https://quizadmin1.herokuapp.com";
    $kategoriLink = $url . 'kategori';
    $sorularLink = $url . 'soru';
    $kullanicilarLink = $url . 'kullanicilar';
    $cevaplarLink = $url . 'cevaplar';
    $username =json_decode($_COOKIE["kullanici"],true)["kullaniciAdi"];
    $rol =json_decode($_COOKIE["kullanici"],true)["rol"];  

      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $client = new Client([
            'base_uri' => 'https://quizapp1234.herokuapp.com/kategori',
            'timeout'  => 20.0,
        ]);
        //$data = ["posta"=>$gelen_veri->posta , "sifre"=> $gelen_veri->sifre];
        $response = $client->request('GET', '');    
        $kategori_ = []; 
        if($response->getStatusCode() === 200)
        {
             $res = json_decode($response->getBody(),true);
             //var_dump($res);die();
             $kategori = isset($res['Mesaj'])  ? [] : $res;
             //var_dump($kategori);die();
            
            // var_dump(count($kategori));die();
                 if(count($kategori)>0)
                 {
                   
                 /*
                 foreach ($kategori as $key => $value) {
                    $id = $value["id"];
                    $ad = $value["ad"];
                    $tarih = $value["createdAt"];
                    $html = $html . '<tr><td><button title="Güncelle" onclick="guncelle(\''.$id.'\' , \''.$ad.'\')"
                    class="btn btn-xs btn-outline-primary"><i class="ti-pencil-alt"></i></button>
                    <button title="Sil" class="btn btn-xs btn-outline-danger" onclick="sil(\''.$id.'\')">
                    <i class="ti-close"></i></button></td><td>'.$id.'</td> <td>'.$ad.'</td> <td>'.$tarih.'</td></tr>' ;
                 }
                 */
                $kategori_ = $kategori;
                 }
               
             
       }
       echo $twig->render('kategori.html',["kategori"=>$kategori_ , "url"=>$url ,"kategoriLink"=>$kategoriLink,
       "sorularLink"=>$sorularLink,"kullanicilarLink"=>$kullanicilarLink , "cevaplarLink"=>$cevaplarLink , "username"=>$username,
       "rol"=> $rol]);
}  





?>
