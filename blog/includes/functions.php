<?php

    function purify_input($input)
    {
        return trim(stripslashes(htmlentities($input))); 
    }
?>