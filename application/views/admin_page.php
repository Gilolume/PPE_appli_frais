<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['login']);
$prenom = ($this->session->userdata['logged_in']['prenom']);
} else {
header("location: login");
}
?>
<head>
<title>Page d'administration</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="profile">
<?php
echo "Bondour <b id='welcome'><i>" . $username . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "Bienvenue sur la page d'accueil";
echo "<br/>";
echo "<br/>";
echo "Le login est : " . $username;
echo "<br/>";
echo "Le prenom est : " . $prenom;
echo "<br/>";
?>
<b id="logout"><a href="logout">Deconnexion</a></b>
</div>
<br/>
</body>
</html>