<!DOCTYPE html>
<html>
<head>
	<title>Setup</title>
    <link rel="stylesheet" href="styles/bootstrap.css" >
    <link href="styles/style.css" rel="stylesheet">
	<script src="script/jquery.min.js"></script>
</head>
<body>
<?php
if (isset($_POST["dns"])) { ?>
<div class="signup-page">
    <div class="vmiddle">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
					<a href="/"><img src="images/logo@3x.png" alt="logo" class="logo" /></a>
					<h2>Please wait. On-pemises installation is in progress...</h2>
					<img class="loading" src="images/wait.gif">
					<div class="error-container"></div>
					<p>Operation may take up to 10 minutes.</p>
					<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
					  <span class="sr-only">0% Complete</span>
					</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	var attempts = 0;
	var intervalID = window.setInterval(function(){
		$(".progress-bar").css('width',attempts++ +'%');
		//$(".progress-bar").html(attempts+'%');
		$.ajax({
		    url: /api/,
		    type: "OPTIONS",
		    success: function(response){
		        if (response.implementationVendor) {//response.implementationVendor == "Codenvy, S.A."
					clearInterval(intervalID);
					$('.loading').addClass('hidden');
		            window.location='http://<?php echo trim(htmlspecialchars($_POST["dns"]))?>';
		        }else{
		            window.console.error('API is not ready yet...');
		            if (!maxAttempt){
			            clearInterval(intervalID);
		            }
		        }
		    },
		    error: function(){
		        window.console.info('API is not ready yet...');
		    }
		});
   	
   }, 5000);

</script>
<?php
	echo "<div style='color:blue;'>";
	echo '<p>email: ' . htmlspecialchars($_POST["email"])."</p>";
	echo '<p>dns: ' . htmlspecialchars($_POST["dns"])."</p>";
	echo '<p>password: ' . htmlspecialchars($_POST["password"])."</p>";
	echo "</div>";
	$fp = fopen('/usr/local/landing/results','w');
	fwrite($fp, htmlspecialchars($_POST["dns"]));
	fwrite($fp, PHP_EOL);
	fwrite($fp, htmlspecialchars($_POST["email"]));
	fwrite($fp, PHP_EOL);
	fwrite($fp, htmlspecialchars($_POST["password"]));
	fwrite($fp, PHP_EOL);
	fclose($fp);
} else {
	echo "<p>Error. Can not found the DNS name. </p>";
}

#exec ('date 2>&1', $output);
#print_r($output);  // to see the respond to your command
#exec ('/usr/local/landing/set-dns.sh', $output);
#print_r($output);  // to see the respond to your command
?>

</body>
</html>