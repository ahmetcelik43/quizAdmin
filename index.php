<?php
require 'vendor/autoload.php';
/*
use GuzzleHttp\Client;


   
    $jsonArray = array(); // array değişkenimiz bunu en alta json objesine çevireceğiz. 
    $jsonArray["hata"] = FALSE; // Başlangıçta hata yok olarak kabul edelim. 
    $_code = 200; // HTTP Ok olarak durumu kabul edelim. 
    //https://fast-temple-97418.herokuapp.com
        // üye ekleme kısmı burada olacak. CREATE İşlemi 
        //login
     if($_SERVER['REQUEST_METHOD'] == "POST") {
         
        $gelen_veri = json_decode(file_get_contents("php://input")); // veriyi alıp diziye atadık.
      
       
        if(isset($gelen_veri->posta) && !empty($gelen_veri->posta) && isset($gelen_veri->sifre) &&  !empty($gelen_veri->sifre) ) {
            
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'https://quizapp1234.herokuapp.com/',
                // You can set any number of default request options.
                'timeout'  => 5.0,
            ]);
            $data = ["posta"=>$gelen_veri->posta , "sifre"=> $gelen_veri->sifre];
            $response = $client->request('GET', '/user',['body' =>json_encode($data)]);     
            if($response->getStatusCode() === 200)
            {
                $_COOKIE["user"] = $response->getBody();
               
            }
            else
            {
                $_code = 403;
                $jsonArray["hata"] = TRUE;
                $jsonArray["hataMesaj"] = "Giriş Başarısız";
            }
            
        }
        else{
            $_code = 403;
            $jsonArray["hata"] = TRUE;
             $jsonArray["hataMesaj"] = "Bilgiler Girilmedi";
        }
        }
    
    else if($_SERVER['REQUEST_METHOD'] == "PUT") {
         $gelen_veri = json_decode(file_get_contents("php://input")); // veriyi alıp diziye atadık.
            
            // basitçe bi kontrol yaptık veriler varmı yokmu diye 
         if(	isset($gelen_veri->kullanici_adi) && 
                 isset($gelen_veri->ad_soyad) && 
                 isset($gelen_veri->posta) && 
                 isset($gelen_veri->user_id) && 
                 isset($gelen_veri->telefon)
             ) {
                 
                 // veriler var ise güncelleme yapıyoruz.
                    $q = $db->prepare("UPDATE uyeler SET kullaniciAdi= :kadi, adSoyad= :ad_soyad, posta= :posta, telefon= :telefon WHERE id= :user_id ");
                     $update = $q->execute(array(
                             "kadi" => $gelen_veri->kullanici_adi,
                             "ad_soyad" => $gelen_veri->ad_soyad,
                             "posta" => $gelen_veri->posta,
                             "telefon" => $gelen_veri->telefon,
                             "user_id" => $gelen_veri->user_id	 	
                     ));
                     // güncelleme başarılı ise bilgi veriyoruz. 
                     if($update) {
                         $_code = 200;
                         $jsonArray["mesaj"] = "Güncelleme Başarılı";
                     }
                     else {
                         // güncelleme başarısız ise bilgi veriyoruz. 
                         $_code = 400;
                        $jsonArray["hata"] = TRUE;
                         $jsonArray["hataMesaj"] = "Sistemsel Bir Hata Oluştu";
                    }
            }else {
                // gerekli veriler eksik gelirse apiyi kulanacaklara hangi bilgileri istediğimizi bildirdik. 
                $_code = 400;
                $jsonArray["hata"] = TRUE;
                 $jsonArray["hataMesaj"] = "kullanici_adi,ad_soyad,posta,telefon,user_id Verilerini json olarak göndermediniz.";
            }
    } else if($_SERVER['REQUEST_METHOD'] == "DELETE") {
    
        // üye silme işlemi burada olacak. DELETE işlemi 
        if(isset($_GET["user_id"]) && !empty(trim($_GET["user_id"]))) {
            $user_id = intval($_GET["user_id"]);
            $userVarMi = $db->query("select * from uyeler where id='$user_id'")->rowCount();
            if($userVarMi) {
                
                $sil = $db->query("delete from uyeler where id='$user_id'");
                if( $sil ) {
                    $_code = 200;
                    $jsonArray["mesaj"] = "Üyelik Silindi.";
                }else {
                    // silme başarısız ise bilgi veriyoruz. 
                    $_code = 400;
                    $jsonArray["hata"] = TRUE;
                     $jsonArray["hataMesaj"] = "Sistemsel Bir Hata Oluştu";
                }
            }else {
                $_code = 400; 
                $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
                $jsonArray["hataMesaj"] = "Geçersiz id"; // Hatanın neden kaynaklı olduğu belirtilsin.
            }
        }else {
            $_code = 400;
            $jsonArray["hata"] = TRUE; // bir hata olduğu bildirilsin.
            $jsonArray["hataMesaj"] = "Lütfen user_id değişkeni gönderin"; // Hatanın neden kaynaklı olduğu belirtilsin.
        }
    } else if($_SERVER['REQUEST_METHOD'] == "GET") {
        
        if(isset($_COOKIE["user"]) && !empty($_COOKIE["user"]))
        {
            return json_decode($_COOKIE["user"],true);
        }
        return null;       
    
    }
    else {
        $_code = 406;
        $jsonArray["hata"] = TRUE;
         $jsonArray["hataMesaj"] = "Geçersiz method!";
    }
    
    
    SetHeader($_code);
    $jsonArray[$_code] = HttpStatus($_code);
    echo json_encode($jsonArray);
    
    */
?>