<?php

echo <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giriş - QUİZ ADMİN</title>
    <link rel="stylesheet" href="assets/yeni/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/giris.css" />

    <script src="https://kit.fontawesome.com/d1fc3fdb09.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="assets/yeni/js/bootstrap.min.js"></script>

<body class="bg-light"> 
    <div class="container">
        <div class="row login-parent">
           <div class="login col-md-5 col-xs-12 card">
            <div class="card-body portfolyo">
              <h5 class="card-subtitle mb-2 text-muted">
                Giriş - QUİZ
              </h5>
              <form class="needs-validation" novalidate>
                <div class="form-row">                      
                    <label for="validationCustomUsername">Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="far fa-envelope-open"></i> </span>
                      </div>
                      <input type="email" class="form-control" id="validationCustomUsername" placeholder="Email" 
                      aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Geçerli Eposta Adresi Giriniz
                      </div>
                    </div>
                  
                </div>
                <div class="form-row">                      
                        <label for="validationCustomEmail">Şifre</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="far fa-envelope-open"></i></span>
                          </div>
                          <input type="password" class="form-control" id="validationCustomEmail" placeholder="Şifre"
                           aria-describedby="inputGroupPrepend" required>
                          <div class="invalid-feedback">
                            Boş bırakılamaz
                          </div>
                      </div>
                </div>
               
                <div class="form-row"> 
                    <div class="col-md-12 mb-3">
                       <button class="btn btn-outline-success" type="submit">Giriş</button>
                      </div>
                </div>  
            </form>
            </div>
           
           </div>
        </div>
    </div>
  <script>
       var forms = document.getElementsByClassName('needs-validation');

Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit', function(event) {
    
    event.preventDefault();
      event.stopPropagation();
    if (form.checkValidity() === true) {
      
    $.ajax(
        {
            url:"https://quizapp1234.herokuapp.com?posta="+$('input[type="email"]').val() + "&sifre=" + $('input[type="password"]').val(),
            method:"GET",
            crossDomain: true,   
            type:'application/json',
        }
    ).done(function(res){
      document.cookie = "kullanici=" + JSON.stringify(res);
      window.location.href = "https://quizadmin1.herokuapp.com/";

    }).fail(function(err){
        alert("Login Başarısız");
    });
    }
    form.classList.add('was-validated');
  }, false);
});
  </script>
</body>
</html>
EOF;
?>
