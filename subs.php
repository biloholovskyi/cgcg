<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

$email = $_POST['email-subs'];
$kaptcha = $_SESSION['rand_code-subs'];
$user_kaptcha = $_POST['kaptcha-subs'];
$user_kaptcha = mb_convert_case($user_kaptcha, MB_CASE_UPPER, 'UTF-8');
$email = mb_convert_case($email, MB_CASE_LOWER, 'UTF-8');

if ($kaptcha != $user_kaptcha) {
  exit('kapt_error');
} else {
  $id = $wpdb->get_results( "SELECT email FROM subscribe" );

  foreach ($id as $emailll) {
    $mail = $emailll->email;
    if($mail == $email) {
      exit('ok');
    }
  }
  $wpdb->insert(
    'subscribe',
    array( 'email' => $email ),
    array( '%s' )
  );
  exit('ok');
}


