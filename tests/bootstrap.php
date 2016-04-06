<?php
require 'vendor/autoload.php';
\VCR\VCR::configure()
    ->enableLibraryHooks(['curl'])
    ->setStorage('json');
\VCR\VCR::turnOn();