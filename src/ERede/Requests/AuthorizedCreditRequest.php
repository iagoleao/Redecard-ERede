<?php

namespace ERede\Requests;
use ERede\Base;
use ERede\Enums\TransactionType;

/**
 * Class AuthorizedCreditRequest
 *
 * This class is filled with transaction information.
 * Is the request object sent to the server.
 */
class AuthorizedCreditRequest extends Base
{
    private $amount = 0.0;
    private $transaction = 0;
    private $reference = '';
    private $cardNumber = '';
    private $securityCode = '';
    private $expirationMonth = 0;
    private $expirationYear = 0;
    private $cardHolderName = '';
    private $softDescriptor = '';
    private $subscription = '';
    private $origin = '';
    private $postalCode = '';
    private $addressComplement = '';
    private $document = '';
    private $addressStreet = '';
    private $addressNumber = '';
    private $installments = '';
    private $capture = true;

    public function getAmount(){
        return $this->amount;
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function getTransaction(){
        return $this->transaction;
    }

    public function setTransaction($transaction){
        $this->transaction = $transaction;
    }

    public function getReference(){
        return $this->reference;
    }

    public function setReference($reference){
        $this->reference = $reference;
    }

    public function getCardNumber(){
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber){
        $this->cardNumber = $cardNumber;
    }

    public function getSecurityCode(){
        return $this->securityCode;
    }

    public function setSecurityCode($securityCode){
        $this->securityCode = $securityCode;
    }

    public function getExpirationMonth(){
        return $this->expirationMonth;
    }

    public function setExpirationMonth($expirationMonth){
        $this->expirationMonth = $expirationMonth;
    }

    public function getExpirationYear(){
        return $this->expirationYear;
    }

    public function setExpirationYear($expirationYear){
        $this->expirationYear = $expirationYear;
    }

    public function getCardHolderName(){
        return $this->cardHolderName;
    }

    public function setCardHolderName($cardHolderName){
        $this->cardHolderName = $cardHolderName;
    }

    public function getSoftDescriptor(){
        return $this->softDescriptor;
    }

    public function setSoftDescriptor($softDescriptor){
        $this->softDescriptor = $softDescriptor;
    }

    public function getSubscription(){
        return $this->subscription;
    }

    public function setSubscription($subscription){
        $this->subscription = $subscription;
    }

    public function getOrigin(){
        return $this->origin;
    }

    public function setOrigin($origin){
        $this->origin = $origin;
    }

    public function getPostalCode(){
        return $this->postalCode;
    }

    public function setPostalCode($postalCode){
        $this->postalCode = $postalCode;
    }

    public function getAddressComplement(){
        return $this->addressComplement;
    }

    public function setAddressComplement($addressComplement){
        $this->addressComplement = $addressComplement;
    }

    public function getDocument(){
        return $this->document;
    }

    public function setDocument($document){
        $this->document = $document;
    }

    public function getAddressStreet(){
        return $this->addressStreet;
    }

    public function setAddressStreet($addressStreet){
        $this->addressStreet = $addressStreet;
    }

    public function getAddressNumber(){
        return $this->addressNumber;
    }

    public function setAddressNumber($addressNumber){
        $this->addressNumber = $addressNumber;
    }

    public function getInstallments(){
        return $this->installments;
    }

    public function setInstallments($installments){
        $this->installments = $installments;
    }

    public function getCapture(){
        return $this->capture;
    }

    public function setCapture($capture){
        $this->capture = $capture;
    }

    /**
     * Maps sdk's request object to public Rede's Wcf request object.
     *
     * @param AuthorizedCreditRequest $creditRequest
     * @param Security $security
     * @return array
     */
    public static function map($creditRequest, $security){

        if($creditRequest->capture)
            $transacao = $creditRequest->getInstallments() > 1 ? TransactionType::InstallmentCreditIssuer :
                TransactionType::Credit;
        else
            $transacao = TransactionType::PreAuthorization;

        $wcfRequest = array(
            "Filiacao"            => $security->affiliation                ,
            "Senha"               => $security->password                   ,

            "Total"               => number_format($creditRequest->getAmount(), 2, '.', ''),
            "Parcelas"            => sprintf("%02d", $creditRequest->getInstallments())      ,
            "NumPedido"           => $creditRequest->getReference()          ,
            "Nrcartao"            => $creditRequest->getCardNumber()       ,
            "Cvc2"                => $creditRequest->getSecurityCode()     ,
            "Mes"                 => sprintf("%02d", $creditRequest->getExpirationMonth())   ,
            "Ano"                 => (string)$creditRequest->getExpirationYear()            ,
            "Portador"            => $creditRequest->getCardHolderName()   ,
            "IdentificacaoFatura" => $creditRequest->getSoftDescriptor()   ,
            "Recorrente"          => $creditRequest->getSubscription()     ,
            "Origem"              => $creditRequest->getOrigin()           ,
            "Cep"                 => $creditRequest->getPostalCode()       ,
            "Complemento"         => $creditRequest->getAddressComplement(),
            "Cpf"                 => $creditRequest->getDocument()         ,
            "Endereco"            => $creditRequest->getAddressStreet()    ,
            "Transacao"           => $transacao                            ,
        );

        return $wcfRequest;
    }
}
