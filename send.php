<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$quest = $_POST['question'];
$kaptcha = $_SESSION['rand_code'];
$user_kaptcha = $_POST['kaptcha'];
$user_kaptcha = mb_convert_case($user_kaptcha, MB_CASE_UPPER, 'UTF-8');

$multiple_to_recipients = array(
  'albertgaifullin@gmail.com',
  'support@cgcg.world'
);

if($kaptcha != $user_kaptcha) {
  exit('kapt_error');
} else {
  wp_mail($multiple_to_recipients, "Новая заявка", "Имя: ".$name." | Номер: ".$tel." | Email: ".$email." | Вопрос: ".$quest);
  exit('ok');
}
