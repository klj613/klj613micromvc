<?php
    /**
     * This file is part of klj613's micro MVC framework made out of boredom.
     * 
     * (c) Kristian Lewis Jones <klj613@kristianlewisjones.com>
     * 
     * For the full copyight and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    require("class/AppKernal.php");
        
    try
    {
        $appKernal = new AppKernal("prod"); // Production Mode Initialisation
        $appKernal->handleRequest();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>