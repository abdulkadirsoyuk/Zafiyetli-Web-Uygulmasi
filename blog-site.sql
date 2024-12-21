-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Ara 2024, 13:57:59
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog-site`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `read_time` int(11) DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `created_at`, `image_path`, `category`, `slug`, `summary`, `read_time`, `user_id`, `username`) VALUES
(9, 'Siber Güvenlik: Dijital Dünyanın Koruma Kalkanı', 'Teknolojinin hızla gelişmesi, hayatımızın dijitalleşmesini beraberinde getirmiştir. Ancak bu durum, kişisel bilgilerden kurumsal verilere kadar pek çok alanın siber tehditlere açık hale gelmesine yol açmıştır. Siber güvenlik; kimlik avı, zararlı yazılımlar, fidye yazılımları, DDoS saldırıları ve veri ihlalleri gibi tehditlere karşı önlemler alınmasını sağlar.\r\n\r\nBireyler güçlü parolalar kullanarak, yazılımlarını güncel tutarak ve güvenilir antivirüs çözümleri tercih ederek kendilerini koruyabilir. Kuruluşlar ise, güvenlik duvarları, ağ izleme sistemleri ve güvenlik farkındalığı eğitimleri gibi daha gelişmiş önlemleri hayata geçirmelidir.\r\n\r\nSiber güvenlik, yalnızca teknolojik bir gereklilik değil; aynı zamanda kişisel mahremiyetin, ticari sırların ve ulusal güvenliğin korunması için hayati bir unsurdur.', '2024-12-09 14:18:29', 'teknoloji.png', 'teknoloji', 'siber-guvenlik-dijital-dunyanin-koruma-kalkani', 'Siber güvenlik, dijital sistemleri, ağları ve verileri yetkisiz erişim, saldırı ve zarar görme risklerinden koruma çalışmalarını kapsayan bir alandır. Günümüzde, bireyler ve kuruluşlar için kritik bir öneme sahiptir.', 2, 2, 'aks'),
(14, 'Yapay Zeka ve İş Hayatı: Yeni Meslekler ve Dönüşüm', 'YZ, rutin işleri otomatikleştirerek çalışanların daha yaratıcı ve stratejik görevlerle ilgilenmesine olanak tanır. Ancak, bazı meslekler YZ tarafından devralınırken, veri bilimcisi, yapay zeka mühendisi ve etik uzmanı gibi yeni iş alanları ortaya çıkmaktadır.\r\n\r\nBu dönüşüm, hem çalışanlar hem de işverenler için uyum gerektirir. Eğitim ve yeniden beceri kazandırma programları, iş gücünün bu teknolojik değişime ayak uydurmasını sağlamak için önemlidir. Yapay zeka, iş dünyasının geleceğini şekillendiren en güçlü araçlardan biridir.', '2024-12-09 14:29:52', 'download (3).jpg', 'teknoloji', 'yapay-zeka-ve-s-hayati-yeni-meslekler-ve-donusum', 'Yapay zeka, iş dünyasında verimliliği artırırken bazı meslekleri dönüştürüyor. Aynı zamanda yeni iş fırsatları da yaratıyor.', 2, 2, 'aks'),
(15, 'Yapay Zeka ve Etik: Teknolojinin Sorumlu Kullanımı', 'YZ sistemleri, eğitildikleri veri setlerine dayalı kararlar alır. Ancak, veri setlerindeki önyargılar, sonuçların taraflı olmasına neden olabilir. Bu durum, özellikle işe alım, kredi değerlendirme ve sağlık alanlarında kritik sonuçlar doğurabilir.\r\n\r\nEtik bir yapay zeka geliştirmek için tarafsız veri setleri, algoritma şeffaflığı ve hesap verebilirlik gibi prensipler uygulanmalıdır. Ayrıca, teknolojinin sosyal etkileri dikkatlice analiz edilmelidir. Yapay zekanın etik kullanımı, bu güçlü teknolojinin insanlığa fayda sağlaması için kritik bir öneme sahiptir.', '2024-12-09 14:30:45', 'ai.jpg', 'teknoloji', 'yapay-zeka-ve-etik-teknolojinin-sorumlu-kullanimi', 'Yapay zekanın hızlı yükselişi, etik sorumlulukları da beraberinde getirmektedir. Veri mahremiyeti, önyargı ve şeffaflık, bu alanda tartışılan temel konulardır.', 3, 2, 'aks'),
(16, 'DDoS Saldırıları: Sistemleri Çökerten Tehdit', 'DDoS saldırılarında, birden fazla kaynaktan gelen trafikle hedefin sistemi, sunucusu veya ağı çalışamaz hale getirilir. Bu saldırılar genellikle bir web sitesini veya hizmeti devre dışı bırakmak için kullanılır.\r\n\r\nBu saldırılardan korunmak için güçlü güvenlik duvarları, saldırı tespit sistemleri ve ağ segmentasyonu gibi önlemler alınmalıdır. Özellikle kritik altyapılara sahip kuruluşların, DDoS saldırılarına karşı dayanıklı çözümler geliştirmesi önemlidir. DDoS saldırıları, siber güvenlik savunmasında karşılaşılan en karmaşık tehditlerden biridir.', '2024-12-09 14:31:20', 'download (2).jpg', 'teknoloji', 'ddos-saldirilari-sistemleri-okerten-tehdit', 'DDoS (Dağıtılmış Hizmet Engelleme) saldırıları, hedef sistemi yoğun bir trafikle etkisiz hale getirmeyi amaçlayan siber saldırılardır.', 5, 2, 'aks');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `blog_slug` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `blog_slug`, `content`) VALUES
(16, '2024-12-19 19:24:45', 'ddos-saldirilari-sistemleri-okerten-tehdit', '<script>\r\n  alert(\"XSS test\");\r\n</script>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'aks', 'test', 'asdf'),
(3, 'asd', 'test1', '1234'),
(4, 'qwe', 'test2', 'qwe');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
