<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__.'/../vendor/autoload.php';

use ERede\Acquirer;
use ERede\Requests\CancelRequest;
use ERede\Enums\EnvironmentType;

$reqCancel = new CancelRequest();
$reqCancel->setTid("1851435097");
$reqCancel->setNsu("891845");
$reqCancel->setAuthorizationNumber("893974");
$reqCancel->setDate("20170117");

$c = new Acquirer('123','123', EnvironmentType::Develop);
$v = $c->cancel($reqCancel);
echo $v->getMessage();