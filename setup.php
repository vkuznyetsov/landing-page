<p color='green'>Congratulations!!!</p>
<?php
echo "<div style='color:blue;'>";
echo '<p>email: ' . htmlspecialchars($_POST["email"])."</p>";
echo '<p>dns: ' . htmlspecialchars($_POST["dns"])."</p>";
echo '<p>password: ' . htmlspecialchars($_POST["password"])."</p>";
echo "</div>";
?>