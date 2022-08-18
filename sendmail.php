<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
    $mail->Charset = 'UTF-8';

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "cinemakyiv@gmail.com";
    $mail->Password = "xzjknxmoctqbwmsn";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->From = 'cinemakyiv@gmail.com';
    $mail->addAddress('vladyslavketov@gmail.com');

    $mail->IsHTML(true);

    $name = $_POST["name"];
    $email = $_POST["email"];
    $work = $_POST["work"];
    $message = $_POST["message"];

    $body = "<h1>Зустрічай новий лист</h1>" . $name . ' ' . $email . ' ' . $work . ' ' . $message;
    $mail->Subject = 'Заявка з форми 1';
    $mail->Body = $body;

    $mail->send();

    echo
    "
    <script>
    alert('Отправка успешна');
    document.location.href = 'index.html';
    </script>
    ";
    }
  ?>