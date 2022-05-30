<?php
function logger($message)
{
    $message = date("H:i:s") . " - $message - ".PHP_EOL;
    print($message);
    flush();
    ob_flush();
}