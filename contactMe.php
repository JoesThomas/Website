<?php
require_once __DIR__.'/includes/portfolio-seo.php';
if(session_status()!==PHP_SESSION_ACTIVE) session_start();
$status='';$error=false;
if(($_SERVER['REQUEST_METHOD']??'GET')==='POST'){
 $name=trim((string)($_POST['name']??''));$email=trim((string)($_POST['email']??''));$message=trim((string)($_POST['message']??''));
 $token=(string)($_POST['csrf']??'');
 if(!empty($_POST['website'])){$status='Thank you for your message.';}
 elseif(empty($_SESSION['portfolio_csrf'])||!hash_equals($_SESSION['portfolio_csrf'],$token)){$error=true;$status='Session expired. Please refresh and retry.';}
 elseif($name===''||strlen($name)>120||!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen($email)>254||$message===''||strlen($message)>5000){$error=true;$status='Please enter a valid name, email and message.';}
 else{
  $path=getenv('PORTFOLIO_SMTP_CONFIG') ?: '';
  $config=($path!=='' && is_readable($path)) ? json_decode(file_get_contents($path),true) : null;
  if(!is_array($config) || empty($config['host']) || empty($config['username']) ||
     empty($config['password']) || empty($config['recipient']) ||
     !filter_var($config['username'],FILTER_VALIDATE_EMAIL) ||
     !filter_var($config['recipient'],FILTER_VALIDATE_EMAIL) ||
     !in_array(($config['encryption']??''),array('tls','ssl'),true) ||
     !in_array((int)($config['port']??0),array(465,587),true)){
    $error=true;$status='Email service is temporarily unavailable.';
  }else{
    require_once __DIR__.'/includes/Exception.php';
    require_once __DIR__.'/includes/PHPMailer.php';
    require_once __DIR__.'/includes/SMTP.php';
    $mailer=new PHPMailer\\PHPMailer\\PHPMailer(true);
    try{
      $mailer->isSMTP();
      $mailer->Host=$config['host'];
      $mailer->SMTPAuth=true;
      $mailer->Username=$config['username'];
      $mailer->Password=$config['password'];
      $mailer->SMTPSecure=$config['encryption'];
      $mailer->Port=(int)$config['port'];
      $mailer->CharSet='UTF-8';
      $mailer->setFrom($config['username']);
      $mailer->addAddress($config['recipient']);
      $mailer->addReplyTo($email,$name);
      $mailer->Subject='Portfolio enquiry';
      $mailer->Body="Name: $name\\nEmail: $email\\n\\n$message";
      $mailer->send();
      $status='Thanks — your message has been sent.';
      unset($_SESSION['portfolio_csrf']);
    }catch(Exception $exception){
      error_log('Portfolio SMTP delivery failed');
      $error=true;$status='The message could not be sent. Please try again later.';
    }
  }
 }
}
if(empty($_SESSION['portfolio_csrf']))$_SESSION['portfolio_csrf']=bin2hex(random_bytes(32));
?><!doctype html><html lang="en"><head><?php portfolioSeo('Contact | Joe Thomas — Software Engineer','Get in touch with Joe Thomas about software engineering opportunities and collaborations.','/contactMe.php'); ?><link rel="stylesheet" href="assets/css/portfolio.css"></head><body><?php include __DIR__.'/includes/Header.php'; ?>
<main class="portfolio"><div class="wrap"><p class="eyebrow">Get in touch</p><h1>Let's build something useful.</h1><p class="lead">I'm open to discussing software engineering roles and interesting technical challenges. Send a message or connect through GitHub.</p><div class="actions"><a class="action" href="https://github.com/JoesThomas" target="_blank" rel="noopener noreferrer">GitHub</a><a class="action primary" href="CV.php">View / download CV</a></div>
<section class="cardx" style="max-width:700px"><h2>Send a message</h2><?php if($status): ?><p role="status" class="status<?= $error?' error':'' ?>"><?= htmlspecialchars($status,ENT_QUOTES,'UTF-8') ?></p><?php endif; ?>
<form action="contactMe.php" method="post"><input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['portfolio_csrf'],ENT_QUOTES,'UTF-8') ?>"><div style="position:absolute;left:-9999px" aria-hidden="true"><label for="website">Leave blank</label><input name="website" id="website" tabindex="-1" autocomplete="off"></div>
<div class="field"><label for="name">Your name</label><input id="name" name="name" maxlength="120" autocomplete="name" required></div><div class="field"><label for="email">Email address</label><input id="email" name="email" type="email" maxlength="254" autocomplete="email" required></div><div class="field"><label for="message">Message</label><textarea id="message" name="message" rows="6" maxlength="5000" required></textarea></div><button class="action primary" type="submit">Send message</button><p class="note">Your information will only be used to respond to your enquiry.</p></form></section></div></main></body></html>