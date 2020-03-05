<?php
session_start();

require __DIR__.'/autoloader.php';

\Kernel\Kernel::serve();
