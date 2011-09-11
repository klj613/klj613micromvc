        <h3>Other Pages:</h3>
        <ul>
<?php
    foreach ($list as $routeId => $uri) {
        echo "            <li><a href=\"$uri\">$routeId</a></li>\n";
    }
?>
        </ul>