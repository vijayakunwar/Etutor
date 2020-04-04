<?php
session_start();
session_unset();
session_destroy();
echo"logging out.......stay tuned!";
echo"you page will redirect after 1.5 seconds...";
//header('Refresh:3;  URL= http://localhost/test/Etutor-front%20end%20design/index.html');

header('Refresh:3;  URL= ../index.php');

