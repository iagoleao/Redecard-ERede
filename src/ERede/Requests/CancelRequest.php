<?php

namespace ERede\Requests;
use ERede\Base;

/**
* Class CancelRequest
* 
* This class is filled with information to cancel a transaction.
* The request object sent to the server.
*/
class CancelRequest extends Base
{
    private $tid = "";
    private $authorizationNumber = "";
    private $nsu = "";
    private $date = "";

    public function getTid(){
        return $this->tid;
    }

    public function setTid($tid){
        $this->tid = $tid;
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

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

    
   /**
   * Maps sdk's request object to public Rede's Wcf request object.
   *
   * @param CancelRequest $cancelRequest
   * @param Security $security
   * @return array
   */
    public static function map($cancelRequest, $security){
        $wcfRequest = array(
            "Filiacao"  => $security->affiliation                          ,
            "Senha"     => $security->password                             ,

            "Tid"       => self::toNull($cancelRequest->getTid())                ,
            "NumAutor"  => self::toNull($cancelRequest->getAuthorizationNumber()),
            "NumSqn"    => self::toNull($cancelRequest->getNsu())                ,
            "Data"      => self::toNull($cancelRequest->getdate())               ,
        );
        
        return $wcfRequest;
    }
}
