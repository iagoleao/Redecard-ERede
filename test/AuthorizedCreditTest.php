<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use ERede\Acquirer;
use ERede\Requests\AuthorizedCreditRequest;
use ERede\Enums\EnvironmentType;

$reqCredit = new AuthorizedCreditRequest();
$reqCredit->setAmount(1.00);
$reqCredit->setReference("126AA1");
$reqCredit->setCardNumber("5123");
$reqCredit->setSecurityCode("123");
$reqCredit->setExpirationMonth(5);
$reqCredit->setExpirationYear(18);
$reqCredit->setCardHolderName("Fulano de tal");
$reqCredit->setSubscription("0");
$reqCredit->setSoftDescriptor("");
$reqCredit->setPostalCode("");
$reqCredit->setAddressComplement("");
$reqCredit->setDocument("");
$reqCredit->setAddressStreet("");
$reqCredit->setAddressNumber("");
$reqCredit->setOrigin("01");
$reqCredit->setCapture(true);
$reqCredit->setInstallments(0);


$c = new Acquirer('xxxxx','xxxxxxxxxxxxxx', EnvironmentType::Homolog);
$v = $c->authorizeCredit($reqCredit);
echo 'getMessage: '.$v->getMessage();
echo '<br/>getReturnedCode: '.$v->getReturnCode();
echo '<br/>getTid: '.$v->getTid();
