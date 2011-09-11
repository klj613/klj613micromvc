<!DOCTYPE html>
<html>
    <head>
        <title>klj613's little mvc project</title>
    </head>
    <body>
        <h1>This is a profile page</h1>
<?php
    echo $this->render('vars.html', array('UserId' => $userId, 'Username' => $user));
?>
<?php
    echo $this->fetch('Main::otherPages');
?>
    </body>
</html>