<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__.'/../vendor/autoload.php';

use Erede\Acquirer;
use Erede\Requests\CaptureRequest;
use Erede\Enums\EnvironmentType;


$reqCap = new CaptureRequest();
$reqCap->setAmount(10.00);
$reqCap->setTid("a");

$c = new Acquirer('123','123', EnvironmentType::Develop);
$v = $c->capture($reqCap);
echo $v->getMessage();

