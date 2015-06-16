<?php header('Access-Control-Allow-Origin: *'); ?>
<<!DOCTYPE html>
<html>
<head>
	<title>Setup</title>
	<script src="script/jquery.min.js"></script>
</head>
<body>
<p color='green'>Congratulations!!!</p>
<?php
echo "<div style='color:blue;'>";
echo '<p>email: ' . htmlspecialchars($_POST["email"])."</p>";
echo '<p>dns: ' . htmlspecialchars($_POST["dns"])."</p>";
echo '<p>password: ' . htmlspecialchars($_POST["password"])."</p>";
echo "</div>";

#exec ('/usr/local/landing/set-dns.sh ' . htmlspecialchars($_POST["dns"]) . ' ' . htmlspecialchars($_POST["email"]) . ' ' . htmlspecialchars($_POST["password"]));

$fp = fopen('/usr/local/landing/results','w');
fwrite($fp, htmlspecialchars($_POST["dns"]));
fwrite($fp, PHP_EOL);
fwrite($fp, htmlspecialchars($_POST["email"]));
fwrite($fp, PHP_EOL);
fwrite($fp, htmlspecialchars($_POST["password"]));
fwrite($fp, PHP_EOL);
fclose($fp);

#exec ('date 2>&1', $output);
#print_r($output);  // to see the respond to your command
#exec ('/usr/local/landing/set-dns.sh', $output);
#print_r($output);  // to see the respond to your command
?>
<script type="text/javascript">
   // setTimeout(function(){window.location='http://<?php echo trim(htmlspecialchars($_POST["dns"]))?>'}, 5000);
	var intervalID = window.setInterval(function(){
		$.ajax({
		    url: /api/,
		    type: "OPTIONS",
		    success: function(response){
		        if (response.implementationVendor) {//response.implementationVendor == "Codenvy, S.A."
		            window.location='http://<?php echo trim(htmlspecialchars($_POST["dns"]))?>';
		        }else{
		            window.console.error('Api error.');
		            clearInterval(intervalID);
		        }
		    },
		    error: function(){
		        window.console.info('API is not ready yet...');
		    }
		});
   	
   }, 5000);

</script>

</body>
</html>