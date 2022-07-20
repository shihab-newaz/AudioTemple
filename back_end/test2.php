<?php
global $response,$curl,$err,$term;
echo $term;
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo '<p>'.$response.'</p>';
}

?>