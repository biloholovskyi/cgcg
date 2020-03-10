<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];

$multiple_to_recipients = array(
  'albertgaifullin@gmail.com',
  'support@cgcg.world'
);
wp_mail($multiple_to_recipients, "Новая заявка", "Имя: ".$name." | Номер: ".$tel." | Email: ".$email);
