<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "hunercatisistemleri@gmail.com"; // Mesajların gideceği adres
$subject = "Hüner Çatı İletişim Formu: $m_subject - $name";
$body = "Web sitenizin iletişim formundan yeni bir mesaj aldınız.\n\n"."Detaylar:\n\nAd Soyad: $name\n\nE-Posta: $email\n\nKonu: $m_subject\n\nMesaj:\n$message";

$header = "From: noreply@hunercatisistemleri.com\r\n"; // Apache'ye geçince kendi alan adınız
$header .= "Reply-To: $email\r\n";
$header .= "Content-Type: text/plain; charset=UTF-8\r\n";

if(!mail($to, $subject, $body, $header)) {
  http_response_code(500);
}
?>