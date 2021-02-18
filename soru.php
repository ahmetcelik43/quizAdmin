<?php
  require 'vendor/autoload.php';
  require 'auth.php';
  use GuzzleHttp\Client;
  $loader = new \Twig\Loader\FilesystemLoader('template/');
$twig = new \Twig\Environment($loader, [
    'cache' => 'compilation_cache',
]);
    $url = "https://quizadmin1.herokuapp.com/";
    $kategoriLink = $url . 'kategori';
    $sorularLink = $url . 'soru';
    $kullanicilarLink = $url . 'kullanicilar';
    $cevaplarLink = $url . 'cevaplar';
    $rol =json_decode($_COOKIE["kullanici"],true)["rol"];  
    $username =json_decode($_COOKIE["kullanici"],true)["kullaniciAdi"];  

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $sorular_ = [];
        $client = new Client([
            'base_uri' => 'https://quizapp1234.herokuapp.com/soru',
            'timeout'  => 20.0,
        ]);
        //$data = ["posta"=>$gelen_veri->posta , "sifre"=> $gelen_veri->sifre];
        $response = $client->request('GET', '');     
        if($response->getStatusCode() === 200)
        {
             $res = json_decode($response->getBody(),true);
             //$soru = json_decode(json_encode($res),true);
             $sorular_ = isset($res['Mesaj']) ? [] :$res;
             //$kategoriler = $kategori["kategoriler"];
           /*
                 $html = '';
                 foreach ($soru as $key => $value) {
                    $soruID = $value["soruID"];
                    $soru = $value["soru"];
                    $kategori = $value["kategori"];
                    $kategoriID = $value["kategoriID"];
                    $tarih = $value["createdAt"];
                    $html = $html . '<tr><td><button title="Güncelle" onclick="guncelle(\''.$soruID.'\' , \''.$soru.'\' , \''.$kategoriID.'\')"
                    class="btn btn-xs btn-outline-primary"><i class="ti-pencil-alt"></i></button>
                    <button title="Sil" class="btn btn-xs btn-outline-danger" onclick="sil(\''.$soruID.'\')">
                    <i class="ti-close"></i></button></td><td>'.$soruID.'</td> <td>'.$soru.'</td> <td>'.$kategori.'</td> <td>'.$tarih.'</td></tr>' ;
                 }
                 */
             
       }
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
         //$kategori = json_decode(json_encode($res),true);
         $kategori = isset($res['Mesaj'])  ? [] : $res;
         //$kategoriler = $kategori["kategoriler"];
        
             //echo(strval($kategori[1]["id"]));die();
             if(count($kategori) > 0)
             {
               $kategori_ = $kategori;
             }
             /*
             $kategoriHtml = '';
             foreach ($kategori as $key => $value) {
                $id = $value["id"];
                $ad = $value["ad"];
                $kategoriHtml = $kategoriHtml . '<option value="'.$id.'">'.$ad.'</option>' ;
             }
             */
         
   }
   //var_dump($kategori_);die();

   echo $twig->render('soru.html',["kategoriler"=>$kategori_ , "sorular"=>$sorular_,"url"=>$url ,"kategoriLink"=>$kategoriLink,
   "sorularLink"=>$sorularLink,"kullanicilarLink"=>$kullanicilarLink , "cevaplarLink"=>$cevaplarLink , "username"=>$username,
   "rol"=> $rol]);   
}  

?>
