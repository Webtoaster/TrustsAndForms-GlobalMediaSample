<?php

if (file_exists(dirname(__DIR__).'/var/cache/prod/App_KernelProdContainer.preload.php')) {
    require dirname(__DIR__).'/var/cache/prod/App_KernelProdContainer.preload.php';
}



/** @noinspection GlobalVariableUsageInspection */

/** @noinspection PreloadingUsageCorrectnessInspection */

//  TODO  Put this back into effect when in production.

// if ($_ENV['APP_ENV']==='prod'){
//     require dirname(__DIR__) . '/var/cache/prod/App_KernelProdContainer.preload.php';
//     // opcache_compile_file(dirname(__DIR__) . '/var/cache/dev/App_KernelDevDebugContainer.preload.php');

// }
