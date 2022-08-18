<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "cinemakyiv@gmail.com";
    $mail->Password = "xzjknxmoctqbwmsn";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->From = 'cinemakyiv@gmail.com';
    $mail->FromName = $_POST['firstName'].' '.$_POST['lastName'];
    $mail->addAddress('vladyslavketov@gmail.com');

    $mail->IsHTML(true);

    // $subject = $_POST["subject"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["message"];
    $tel = $_POST["tel"];
    $subject = 'Анкета'.''.$_POST['firstName'].' '.$_POST['lastName'];

    $mail->Subject = $subject;
    
    $body = '<strong>Актор:</strong> '.$_POST['firstName'].' '.$_POST['lastName'].'';
      if(trim(!empty($_POST['firstName']))){
      $body.='<p><strong>Ім`я:</strong> '.$_POST['firstName'].'</p>';
      }
      if(trim(!empty($_POST['lastName']))){
        $body.='<p><strong>Прізвище:</strong> '.$_POST['lastName'].'</p>';
      }
      if(trim(!empty($_POST['message']))){
        $body.='<p><strong>Повідомлення:</strong> '.$_POST['message'].'</p>';
      }
      if(trim(!empty($_POST['tel']))){
        $body.='<p><strong>Телефон</strong> '.$_POST['tel'].'</p>';
      }

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