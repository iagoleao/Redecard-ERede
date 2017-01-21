<?php

namespace ERede\Responses;
use ERede\Base;

/**
 * Class FindResponse
 *
 * This class is returned after find method.
 */
class FindResponse extends Base
{
    private $returnCode = 0;
    private $message = "";
    private $tid = "";
    private $status = "";
    private $distributorAffiliation = "";
    private $capture = "";
    private $installments = "";
    private $date = "";
    private $time = "";
    private $amount = "";
    private $currency = "";
    private $reference = "";
    private $authorizationNumber = "";
    private $nsu = "";
    private $softDescriptor = "";
    private $cardNumber = "";
    private $cardHolderName = "";
    private $authorizationExpDate = "";
    private $captureDate = "";
    private $refundDate = "";
    private $departureTax = "";
    private $avsResponse = "";
    private $avsMessage = "";
    private $postalCode = "";
    private $addressStreet = "";
    private $addressNumber = "";
    private $addressComplement = "";
    private $document = "";
    private $cavv = "";
    private $eci = "";
    private $xid = "";
    private $origin = "";

    public function getReturnCode(){
        return $this->returnCode;
    }

    public function setReturnCode($returnCode){
        $this->returnCode = $returnCode;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getTid(){
        return $this->tid;
    }

    public function setTid($tid){
        $this->tid = $tid;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getDistributorAffiliation(){
        return $this->distributorAffiliation;
    }

    public function setDistributorAffiliation($distributorAffiliation){
        $this->distributorAffiliation = $distributorAffiliation;
    }

    public function getCapture(){
        return $this->capture;
    }

    public function setCapture($capture){
        $this->capture = $capture;
    }

    public function getInstallments(){
        return $this->installments;
    }

    public function setInstallments($installments){
        $this->installments = $installments;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getTime(){
        return $this->time;
    }

    public function setTime($time){
        $this->time = $time;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function getCurrency(){
        return $this->currency;
    }

    public function setCurrency($currency){
        $this->currency = $currency;
    }

    public function getReference(){
        return $this->reference;
    }

    public function setReference($reference){
        $this->reference = $reference;
    }

    public function getAuthorizationNumber(){
        return $this->authorizationNumber;
    }

    public function setAuthorizationNumber($authorizationNumber){
        $this->authorizationNumber = $authorizationNumber;
    }

    public function getNsu(){
        return $this->nsu;
    }

    public function setNsu($nsu){
        $this->nsu = $nsu;
    }

    public function getSoftDescriptor(){
        return $this->softDescriptor;
    }

    public function setSoftDescriptor($softDescriptor){
        $this->softDescriptor = $softDescriptor;
    }

    public function getCardNumber(){
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber){
        $this->cardNumber = $cardNumber;
    }

    public function getCardHolderName(){
        return $this->cardHolderName;
    }

    public function setCardHolderName($cardHolderName){
        $this->cardHolderName = $cardHolderName;
    }

    public function getAuthorizationExpDate(){
        return $this->authorizationExpDate;
    }

    public function setAuthorizationExpDate($authorizationExpDate){
        $this->authorizationExpDate = $authorizationExpDate;
    }

    public function getCaptureDate(){
        return $this->captureDate;
    }

    public function setCaptureDate($captureDate){
        $this->captureDate = $captureDate;
    }

    public function getRefundDate(){
        return $this->refundDate;
    }

    public function setRefundDate($refundDate){
        $this->refundDate = $refundDate;
    }

    public function getDepartureTax(){
        return $this->departureTax;
    }

    public function setDepartureTax($departureTax){
        $this->departureTax = $departureTax;
    }

    public function getAvsResponse(){
        return $this->avsResponse;
    }

    public function setAvsResponse($avsResponse){
        $this->avsResponse = $avsResponse;
    }

    public function getAvsMessage(){
        return $this->avsMessage;
    }

    public function setAvsMessage($avsMessage){
        $this->avsMessage = $avsMessage;
    }

    public function getPostalCode(){
        return $this->postalCode;
    }

    public function setPostalCode($postalCode){
        $this->postalCode = $postalCode;
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

    public function getCavv(){
        return $this->cavv;
    }

    public function setCavv($cavv){
        $this->cavv = $cavv;
    }

    public function getEci(){
        return $this->eci;
    }

    public function setEci($eci){
        $this->eci = $eci;
    }

    public function getXid(){
        return $this->xid;
    }

    public function setXid($xid){
        $this->xid = $xid;
    }

    public function getOrigin(){
        return $this->origin;
    }

    public function setOrigin($origin){
        $this->origin = $origin;
    }


    /**
     * Maps the public Rede's Wcf response object to sdk's response object.
     *
     * @param Array $wcfResponse
     * @return FindResponse
     */
    public static function map($wcfResponse){
        $findResponse = new FindResponse();

        if($wcfResponse->REGISTRO->COD_RET != "")
            $findResponse->setReturnCode($wcfResponse->REGISTRO->COD_RET);
        else
            $findResponse->setReturnCode(TransactionStatus::TransactionNotProcessed);


        $findResponse->setMessage($wcfResponse->REGISTRO->MSG_RET);
        $findResponse->setTid($wcfResponse->REGISTRO->TID);
        $findResponse->setStatus($wcfResponse->REGISTRO->STATUS);
        $findResponse->setDistributorAffiliation($wcfResponse->REGISTRO->FILIACAO_DSTR);
        $findResponse->setCapture($wcfResponse->REGISTRO->TRANSACAO);
        $findResponse->setInstallments($wcfResponse->REGISTRO->PARCELAS);
        $findResponse->setDate($wcfResponse->REGISTRO->DATA);
        $findResponse->setTime($wcfResponse->REGISTRO->HORA);
        $findResponse->setAmount($wcfResponse->REGISTRO->TOTAL);
        $findResponse->setCurrency($wcfResponse->REGISTRO->MOEDA);
        $findResponse->setReference($wcfResponse->REGISTRO->NUMPEDIDO);
        $findResponse->setAuthorizationNumber($wcfResponse->REGISTRO->NUMAUTOR);
        $findResponse->setNsu($wcfResponse->REGISTRO->NUMSQN);
        $findResponse->setSoftDescriptor($wcfResponse->REGISTRO->IDENTIFICACAOFATURA);
        $findResponse->setCardNumber($wcfResponse->REGISTRO->NR_CARTAO);
        $findResponse->setCardHolderName($wcfResponse->REGISTRO->NOM_PORTADOR);
        $findResponse->setAuthorizationExpDate($wcfResponse->REGISTRO->DATA_EXP_PRE_AUT);
        $findResponse->setCaptureDate($wcfResponse->REGISTRO->DATA_CON_PRE_AUT);
        $findResponse->setRefundDate($wcfResponse->REGISTRO->DATA_CANC);
        $findResponse->setDepartureTax($wcfResponse->REGISTRO->TAXA_EMBARQUE);
        $findResponse->setOrigin($wcfResponse->REGISTRO->ORIGEM);

        if ($wcfResponse->REGISTRO->AVS != NULL) {
            $findResponse->setAvsResponse($wcfResponse->REGISTRO->AVS->RESP_AVS);
            $findResponse->setAvsMessage($wcfResponse->REGISTRO->AVS->MSG_AVS);
            $findResponse->setPostalCode($wcfResponse->REGISTRO->AVS->CEP);
            $findResponse->setAddressStreet($wcfResponse->REGISTRO->AVS->ENDERECO);
            $findResponse->setAddressNumber($wcfResponse->REGISTRO->AVS->NU_ENDERECO);
            $findResponse->setAddressComplement($wcfResponse->REGISTRO->AVS->COMPLEMENTO);
            $findResponse->setDocument($wcfResponse->REGISTRO->AVS->CPF);
        }

        if ($wcfResponse->REGISTRO->_x0033_DS != null) {
            $findResponse->setCavv($wcfResponse->REGISTRO->_x0033_DS->CAVV);
            $findResponse->setEci($wcfResponse->REGISTRO->_x0033_DS->ECI);
            $findResponse->setXid($wcfResponse->REGISTRO->_x0033_DS->XID);
        }

        return $findResponse;
    }
}