<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zafiyetli Web Uygulaması</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/styles/index.css">
</head>
<body>
<header>
<h1>Zafiyetli Web Uygulaması</h1>
<button class="zbtn">
    <a href="blog.php"> Uygulamaya Git  </a>
    </button>

</header>





<div class="container mt-5">
    <h1 class="text-center mb-4 baslik">Blog Sitesindeki Güvenlik Açıkları</h1>
    <div class="accordion" id="accordionExample">


        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    A01:2021-Broken Access Control
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                <h5 class="baslik">Insecure Direct Object References (IDOR)</h5>
                <strong>Açıklama:</strong> 
                     IDOR, bir kullanıcının doğrudan bir nesneye (örneğin, bir dosya, veritabanı kaydı veya URL parametresi) erişerek yetkisiz işlem yapmasına olanak tanıyan bir güvenlik açığıdır. Bu, genellikle yeterli yetki kontrolü eksikliğinden kaynaklanır. Örneğin, blog sitesindeki blog yazısı düzenleme sayfasının URL'deki ID değerini değiştirerek başka bir kullanıcının blog yazısını düzenlemesi veya görmesi mümkün olabilir.
                  <br><strong>Çözüm:</strong>
                    <ul>
                 <li>Kullanıcıların yalnızca kendi kaynaklarına erişebilmeleri için yetki kontrolü mekanizmaları uygulanmalı</li>
                <li>URL parametreleri, form verileri ve diğer girişler üzerinde oturum bazlı doğrulama yapılmalı.</li>
                <li>Hassas bilgileri veya nesne kimliklerini ifşa etmek yerine, benzersiz ve rastgele üretilen referanslar (örneğin, UUID) kullanılmalı.</li>
                <li>Her işlem için kullanıcı oturumunu kontrol edilmeli ve yalnızca yetkili kullanıcıların işlem yapmasına izin verilmeli.</li>
            </ul>
       
                    <hr>


                    <h5 class="baslik">Cross Site Request Forgery (CSRF)</h5>
                    <strong>Açıklama:</strong> 
            CSRF, bir saldırganın kullanıcıyı istemeden kötü niyetli bir eylemi gerçekleştirmeye yönlendirdiği bir güvenlik açığıdır. Örneğin, bir kullanıcı oturum açmışken saldırgan, bu oturumu kullanarak bir blog yazısını değiştirebilir veya silebilir. Bu durum, kullanıcının güvenilir bir kaynaktan geldiğini düşündüğü bir isteği, farkında olmadan gerçekleştirmesi ile ortaya çıkar. Bu linke blog yazısının yazarı tıkladığında blog yazısı silinmektedir. <a href="php/delete_blog.php?id=16">php/delete_blog.php?id=16</a>
            <br><strong>Çözüm:</strong>
            <ul>
                <li>Her form ve önemli işlemde benzersiz bir CSRF token kullanılmalı. Token, kullanıcının oturumu için oluşturulan ve doğrulanması gereken bir değerdir.</li>
                <li>Token'ı doğrulamak için sunucu tarafında ek bir kontrol mekanizması uygulanmalı.</li>
                <li>Kullanıcı oturumlarında benzersiz bir oturum ID’si oluşturulmalı.</li>
            </ul>
        
                  


                  </div>
                    

        </div>

        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    A02:2021-Cryptographic Failures
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                <h5 class="baslik">Hassas Verilerin Düz Metin Olarak Saklanması</h5>
                <strong>Açıklama:</strong> Kullanıcı şifrelerinin veritabanında düz metin olarak saklanması, ciddi bir güvenlik açığı oluşturur. Veritabanına erişim sağlandığında tüm şifreler kolayca okunabilir.
                    <br><strong>Çözüm:</strong>
                    <ul>
                        <li>Şifreler, güvenli bir hash fonksiyonu (örneğin, bcrypt, Argon2 veya SHA-256) ile saklanmalıdır.</li>
                        <li>Salting uygulanarak şifrelerin hash değerlerinin benzersiz olması sağlanmalıdır.</li>
                        <li>Şifre doğrulama işlemleri, hash'lenmiş veriler üzerinde yapılmalıdır.</li>
                    </ul>
                </div>
            </div>
        </div>

<div class="card">
    <div class="card-header" id="headingFour">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            A03:2021-Injection
            </button>
        </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
        <div class="card-body">
        <h5 class="baslik">SQL Enjeksiyonu (SQL Injection)</h5>
        <strong>Açıklama:</strong> SQL enjeksiyonu, kullanıcılardan alınan verilerin doğrudan SQL sorgularına dahil edilmesiyle ortaya çıkan bir güvenlik açığıdır. Bu durum, kötü niyetli bir saldırganın veri tabanını manipüle etmesine ve izinsiz erişim sağlamasına olanak tanır. Örneğin, kullanıcı giriş sayfasında şifre yerine <strong>' OR '1'='1</strong> gibi bir giriş yapıldığında, SQL sorgusu geçerli hale gelir ve saldırgan sisteme giriş yapabilir.
                    <br><strong>Çözüm:</strong> 
                    <ul>
                        <li>Kullanıcıdan alınan veriler doğrulanmalı ve temizlenmelidir.</li>
                        <li>Parametreli sorgular (Prepared Statements) veya ORM'ler kullanılmalıdır.</li>
                        <li>Kullanıcı girdileri üzerinde giriş doğrulama (input validation) uygulanmalıdır.</li>
                    </ul>
               
                    <hr>

                    <h5 class="baslik">Cross-Site Scripting (XSS)</h5>
                    <strong>Açıklama:</strong> XSS saldırıları, kullanıcıların girdiği verilerin çıktıda filtrelenmeden sunulması sonucu gerçekleşir. Saldırganlar, kötü niyetli JavaScript kodları çalıştırarak kullanıcıların tarayıcılarında oturum çalma veya diğer zararlı işlemler gerçekleştirebilir. Örneğin, blog detay sayfasındaki yorumlar kısmında <strong>&lt;script&gt;</strong> etiketleri çalıştırılabilir.
                    <br><strong>Çözüm:</strong>
                    <ul>
                        <li>Kullanıcıdan alınan tüm girişler doğru şekilde doğrulanmalı ve temizlenmelidir.</li>
                        <li>Çıktılar, <code>htmlspecialchars()</code> veya <code>htmlentities()</code> gibi fonksiyonlarla kodlanmalıdır.</li>
                        <li>İçerik Güvenlik Politikası (CSP) uygulanarak XSS riskleri azaltılabilir.</li>
                    </ul>

                
                  

        </div>
    </div>
</div>



<div class="card">
    <div class="card-header" id="headingThree">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
            A05:2021-Security Misconfiguration
            </button>
        </h5>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
        <div class="card-body">
        <h5 class="baslik">Dosya Yükleme Güvenlik Açığı</h5>
        <strong>Açıklama:</strong> Kullanıcıların siteye dosya yüklemelerine izin verildiğinde, yüklenen dosyaların türü ve içeriği kontrol edilmezse, zararlı dosyalar (örneğin, kötü amaçlı PHP scriptleri) yüklenip çalıştırılabilir. Örneğin, blog yazısı ekleme sayfasında yüklenen resim dosyalarının kontrolü yapılmamaktadır.
                    <br><strong>Çözüm:</strong>
                    <ul>
                        <li>Yalnızca güvenli dosya türlerine izin verilmelidir (örneğin, <code>.jpg</code>, <code>.png</code>).</li>
                        <li>Yüklenen dosyaların MIME türü doğrulanmalıdır.</li>
                        <li>Dosya adları rastgele üretilmeli ve güvenli bir dizine kaydedilmelidir.</li>
                        <li>Yüklenen dosyaların içerik taraması yapılmalıdır.</li>
                    </ul>
               
        </div>
    </div>
</div>


      
    </div>
</div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
