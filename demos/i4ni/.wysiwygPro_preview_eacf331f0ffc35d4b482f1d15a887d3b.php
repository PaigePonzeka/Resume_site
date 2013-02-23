<?php
if ($_GET['randomId'] != "eeW43Ylsnl0WCPsSi5fnKjzguFFujG_xjdIiTwY21nQ6jbJE0N0Hyz88JFOemb8n") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
