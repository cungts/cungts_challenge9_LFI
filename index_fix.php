<nav class='navbar'>
<a href="?page=home"> Home</a>
<a href="?page=upload"> Upload</a>
<a href="?page=about"> About</a>
</nav>
 <?php
if (!isset($_GET['page'])) {
    include "home.php";
} else {
switch ($_GET['page']) {
    case "home":
         include "home.php";
    break;
    case "upload":
         include "page/upload_fix.php";
    break;
    case "about":
         include "page/about.php";
    break;
    default:
         include "home.php";
    };
}
?>