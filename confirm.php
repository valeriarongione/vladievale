<!DOCTYPE HTML>
<?php
 
   function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "";
 
    $email_subject = "[conferma_presenza]";
 
     
 
 
     
  $result_message = "";

    // validation expected data exists
 
    if(
    	(!isset($_POST['name']) || empty($_POST["name"])) ||
 
        (!isset($_POST['email']) || empty($_POST["email"])) ||
 
        (!isset($_POST['confirmed']) || empty($_POST["confirmed"])) ) {
 
 	 $result_message = 'I campi nome e email sono obbligatori! ';
        
 
    } else {
    	
 
     
 
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
	$confirmed = $_POST['confirmed']; // required
 	$date = $_POST['date']; // not required
 	$guests = $_POST['guests']; // not required
    $message = $_POST['message']; // not required
 
     
 
    
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
	  if(!preg_match($email_exp,$email)) {
	 
	    $result_message .= 'L\'indirizzo email non è valido.<br />';
	 
	  }
	 

 
 
     $email_message = "Conferma matrimonio:\n\n";
 
     
 
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
  
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Conferma: ".clean_string($confirmed)."\n";
 
    $email_message .= "Partecipanti: ".clean_string($guests)."\n";

    $email_message .= "Messaggio: ".clean_string($message)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '."noreply@vladievale.com"."\r\n".
 
'Reply-To: '.$email."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 

$result_message = 'Grazie per la tua conferma.';  
 
  }
?>
 
 
 

<html>
	<head>
		<title>Vale & Vladi sposi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="index.html">14 Agosto 2016</a>  CI SPOSIAMO</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Menu</a>
								<ul>
									<li><a href="#">Cerimonia</a></li>
									<li><a href="#">Festa</a></li>
									<li><a href="#">Addio al nubilato</a></li>
									<li><a href="#">Addio al celibato</a></li>
									<li><a href="#">Alloggi</a></li>
									<li><a href="confirm.html">Conferma Presenza</a></li>
									<li><a href="#">Libro ospiti</a></li>
									<li><a href="#">Esclusi</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2>Vale & Vladi</h2>
					<p>14 Agosto 2016</p>
					<!--ul class="actions">
						<li><a href="#" class="button">Conferma Presenza</a></li>
					</ul-->
				</section>

<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Conferma presenza</h2>
							<p><?php echo $result_message; ?></p>
						</header>
						<!--span class="image featured"><img src="images/pic01.jpg" alt="" /></span-->
					</section>

					

			<!-- CTA -->
				<section id="cta">

					<h2></h2>
									</section>

			<!-- Footer -->
				<footer id="footer">
					<!--ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul-->
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>