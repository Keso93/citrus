<?php

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once sprintf('%s/../src/%s.php', $_SERVER['DOCUMENT_ROOT'], $className);
});
