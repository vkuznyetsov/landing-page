<!DOCTYPE html>
<html lang="en" class="js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Developer workspaces to modify, run and debug code in the cloud or on-premises.">
        <meta name="keywords" content="Codenvy, Cloud IDE, Java IDE, online IDE, web IDE, development environment, IDE, cloud, JavaScript, Java, Spring, Groovy, Ruby, PHP, code, deploy">
        <meta name="author" content="Codenvy">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <title>Codenvy - Setup</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="styles/bootstrap.css" >
        
        <link rel="stylesheet" href="lib/font-awesome-4.2.0/css/font-awesome.min.css"/>

        <!-- Custom styles for this template -->
        <link href="styles/style.css" rel="stylesheet">
        <script src="script/jquery.min.js"></script>
        <script src="script/jquery.validate.js"></script>
    </head>
<body>
<script type="text/javascript">
    <?php
    include 'conf/config.php';
    ?>
</script>
    <div class="signup-page">
        <div class="vmiddle">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                    	<a href="/"><img src="images/logo@3x.png" alt="logo" class="logo" /></a>
                    	<h2>On-pemises configuration</h2>
                    	<div class="error-container"></div>
                    	<form action="setup.php" id="onpremloginForm" class="onpremloginForm" method="post">
                    		<ul>
                                <li>
                                    <p class="info">Current DNS name : ec2-52-7-130-190.compute-1.amazonaws.com</p>
                                </li>
                                <li>
                       				<span class="input-con">
                                        <label for="dns">Change DNS name</label>
                    					<input class="required" type="text" name="dns" value="ec2-52-7-130-190.compute-1.amazonaws.com" />
                    				</span>
                                    <p></p>
                                    <span class="input-con">
                                        <label for="email">Administrator email</label>
                                        <input class="required" name="email" type="email" placeholder="Admin email" required/>
                                    </span>
                                    <p></p>
                    				<span class="input-con">
                                    <label for="password">Setup a new password</label>
                    					<input name="password" type="password" placeholder="Admin Password" onchange="form.password2.pattern = this.value;" required>
                    				</span>
                                    <p></p>
                                    <span class="input-con">
                                    <label for="password"></label>
                                        <input name="password2" type="password" placeholder="Repeat password" required>
                                    </span>
                                    <p></p>
                    				<span class="input-con"><input type="submit" Value="OK" /></span>
                    			</li>
                    		</ul>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>