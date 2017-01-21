<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include __DIR__.'/../vendor/autoload.php';

use ERede\Acquirer;
use ERede\Requests\FindRequest;
use ERede\Enums\EnvironmentType;

$reqFind = new FindRequest();
$reqFind->setTid("1851435097");
$reqFind->setReference("126AA1");

$c = new Acquirer('123','123', EnvironmentType::Homolog);

$v = $c->find($reqFind);
echo 'status: '.$v->getMessage();
echo '<br/>AuthorizationNumber: '.$v->getAuthorizationNumber();
echo '<br/>NSU: '.$v->getNsu();
echo '<br/>Data Captura: '.$v->getCaptureDate();
echo '<br/>Capturado: '.$v->getCapture();


