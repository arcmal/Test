
<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{

include("loding.php");
header('Refresh: 0; url=index.php');
}
?>
