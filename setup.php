<!DOCTYPE html>
<html>
<head>
	<title>Setup</title>
    <link rel="stylesheet" href="styles/bootstrap.css" >
	<script src="script/jquery.min.js"></script>
</head>
<body>
<?php
if (isset($_POST["dns"])) { ?>
<p color='green'>Congratulations!!!</p>
<img class="loading" src="images/wait.gif">
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
<script type="text/javascript">
	var maxAttempt = 2;
	var intervalID = window.setInterval(function(){
		$.ajax({
		    url: /api/,
		    type: "OPTIONS",
		    success: function(response){
		        if (response.implementationVendor) {//response.implementationVendor == "Codenvy, S.A."
		            window.location='http://<?php echo trim(htmlspecialchars($_POST["dns"]))?>';
		        }else{
		            window.console.error('API is not ready yet...');
		            //--maxAttempt;
		            if (!maxAttempt){
			            $('.loading').addClass('hidden');
			            clearInterval(intervalID);
		            }
		        }
		    },
		    error: function(){
		        window.console.info('API is not ready yet...');
		        $('.loading').addClass('hidden');
		    }
		});
   	
   }, 5000);

</script>

</body>
</html>