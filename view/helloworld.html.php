<!DOCTYPE html>
<html>
    <head>
        <title>klj613's little mvc project</title>
    </head>
    <body>
        <h1>Hello <?php echo $name;?>!</h1>
<?php
	echo $this->render('vars.html', array('Name' => $name));
?>
<?php
	echo $this->fetch('Main::otherPages');
?>
    </body>
</html>