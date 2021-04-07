<nav class='navbar'>
<a href="?page=home.php"> Home</a>
<a href="?page=upload.php"> Upload</a>
<a href="?page=about.php"> About</a>
</nav>

<?php

if(!isset($_GET['page']) || ($_GET['page']=="home.php")) {
   include($_GET['page']);
}
else {
	echo "<p>";
	include("page/" .$_GET['page']);
	echo "</p>";
}
?>