<?php

namespace ERede\Responses;
use ERede\Base;

/**
 * Class AuthorizedCreditResponse
 *
 * This class is returned after a AuthorizedCredit transaction.
 */
class AuthorizedCreditResponse extends Base
{
    private $cet = "";
    private $returnCode = 0;
    private $interest = "";
    private $avsMessage = "";
    private $avsResponse = "";
    private $message = "";
    private $authorizationNumber = "";
    private $reference = "";
    private $nsu = "";
    private $tid = "";
    private $installments = "";
    private $totalInterest = "";
    private $date = "";
    private $time = "";

    public function getCet(){
        return $this->cet;
    }

    public function setCet($cet){
        $this->cet = $cet;
    }

    public function getReturnCode(){
        return $this->returnCode;
    }

    public function setReturnCode($returnCode){
        $this->returnCode = $returnCode;
    }

    public function getInterest(){
        return $this->interest;
    }

    public function setInterest($interest){
        $this->interest = $interest;
    }

    public function getAvsMessage(){
        return $this->avsMessage;
    }

    public function setAvsMessage($avsMessage){
        $this->avsMessage = $avsMessage;
    }

    public function getAvsResponse(){
        return $this->avsResponse;
    }

    public function setAvsResponse($avsResponse){
        $this->avsResponse = $avsResponse;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getAuthorizationNumber(){
        return $this->authorizationNumber;
    }

    public function setAuthorizationNumber($authorizationNumber){
        $this->authorizationNumber = $authorizationNumber;
    }

    public function getReference(){
        return $this->reference;
    }

    public function setReference($reference){
        $this->reference = $reference;
    }

    public function getNsu(){
        return $this->nsu;
    }

    public function setNsu($nsu){
        $this->nsu = $nsu;
    }

    public function getTid(){
        return $this->tid;
    }

    public function setTid($tid){
        $this->tid = $tid;
    }

    public function getInstallments(){
        return $this->installments;
    }

    public function setInstallments($installments){
        $this->installments = $installments;
    }

    public function getTotalInterest(){
        return $this->totalInterest;
    }

    public function setTotalInterest($totalInterest){
        $this->totalInterest = $totalInterest;
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

    /**
     * Maps the public Rede's Wcf response object to sdk's response object.
     *
     * @param Array $wcfResponse
     * @return AuthorizedCreditResponse
     */
    public static function map($wcfResponse){
        $creditResponse = new AuthorizedCreditResponse();

        if($wcfResponse->CodRet != "")
            $creditResponse->setReturnCode($wcfResponse->CodRet);
        else
            $creditResponse->setReturnCode(TransactionStatus::TransactionNotProcessed);

        $creditResponse->setMessage($wcfResponse->Msgret);
        $creditResponse->setCet($wcfResponse->Cet);
        $creditResponse->setInterest($wcfResponse->Juros);
        $creditResponse->setAvsMessage($wcfResponse->MsgAvs);
        $creditResponse->setAvsResponse($wcfResponse->RespAvs);
        $creditResponse->setAuthorizationNumber($wcfResponse->NumAutor);
        $creditResponse->setReference($wcfResponse->NumPedido);
        $creditResponse->setNsu($wcfResponse->NumSqn);
        $creditResponse->setTid($wcfResponse->Tid);
        $creditResponse->setInstallments($wcfResponse->ValParcelas);
        $creditResponse->setTotalInterest($wcfResponse->ValTotalJuros);
        $creditResponse->setDate($wcfResponse->Data);
        $creditResponse->setTime($wcfResponse->Hora);

        return $creditResponse;
    }
}