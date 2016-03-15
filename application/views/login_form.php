<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://localhost/ppe_appli_frais/index.php/user_authentication/user_login_process");
}
?>
<head>
<title>Fenêtre de connexion</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style_login.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<div id="main">
<div id="login">
<h2>Fenêtre de connexion</h2>
<hr/>
<?php echo form_open('user_authentication/user_login_process'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>Login :</label>
<input type="text" name="login" id="name" placeholder="login"/><br /><br />
<label>Mot de passe :</label>
<input type="password" name="mdp" id="mdp" placeholder="**********"/><br/><br />
<input type="submit" value=" Connexion " name="submit"/><br />
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>