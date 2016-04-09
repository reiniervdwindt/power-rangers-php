<?php
require 'vendor/autoload.php';
\VCR\VCR::configure()
    ->enableLibraryHooks(['curl'])
    ->enableRequestMatchers(array('method', 'url', 'host'))
    ->setStorage('json');
\VCR\VCR::turnOn();