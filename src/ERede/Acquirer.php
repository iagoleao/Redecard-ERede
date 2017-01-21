<?php

namespace ERede;

use ERede\Enums\EnvironmentType;
use ERede\Enums\TransactionStatus;
use ERede\Requests\AuthorizedCreditRequest;
use ERede\Responses\AuthorizedCreditResponse;
use ERede\Requests\CancelRequest;
use ERede\Responses\CancelResponse;
use ERede\Requests\CaptureRequest;
use ERede\Responses\CaptureResponse;
use ERede\Requests\FindRequest;
use ERede\Responses\FindResponse;

/**
 * Class Acquirer
 *
 * Main class of SDK. Contain all methods to authorize, capture or cancel a transaction.
 */
class Acquirer {
    /**
     * Object that holds affiliation's information.
     * @var Security
     */
    private $security = NULL;

    /**
     * returns the wcf url of the selected environment.
     *
     * @return string
     */
    private function wsdl_path() {
        $url = '';
        if ($this->security->environment == EnvironmentType::Homolog)
            $url = "https://scommerce.userede.com.br/Redecard.Komerci.External.WcfKomerci/KomerciWcf.svc?WSDL";
        elseif($this->security->environment == EnvironmentType::Production)
            $url = "https://ecommerce.userede.com.br/Redecard.Adquirencia.Wcf/KomerciWcf.svc?WSDL";
        else
            $url = "http://localhost:50000/KomerciWcf.svc?WSDL";

        return $url;
    }

    /**
     * Default Constructor that initialize Security object.
     *
     * @param string $affiliation
     * @param string $password
     * @param EnvironmentType $environment
     */
    function __construct($affiliation, $password, $environment) {
        $this->security = new Security($affiliation, $password, $environment);
    }

    /**
     * Calls authorizedCredit method.
     *
     * @param AuthorizedCreditRequest $request
     * @return AuthorizedCreditResponse
     */
    function authorizeCredit($request){
        try {
            // create wcf objects.
            $client = new \SoapClient($this->wsdl_path());
            $wcfRequest = AuthorizedCreditRequest::map($request, $this->security);

            // make the request.
            $result = $client->GetAuthorizedCredit(array('request' => $wcfRequest));

            // mapping the result.
            $response = AuthorizedCreditResponse::map($result->GetAuthorizedCreditResult);
        } catch (Exception $e) {
            $response = new AuthorizedCreditResponse();
            $response->setReturnCode(TransactionStatus::TransactionNotProcessed);
            $response->setMessage($e->getMessage());
        }

        return $response;
    }

    /**
     * Captures the transaction.
     *
     * @param CaptureRequest $request
     * @return CaptureResponse
     */
    function capture($request){
        try {
            // create wcf objects.
            $client = new \SoapClient($this->wsdl_path());
            $wcfRequest = CaptureRequest::map($request, $this->security);

            // make the request.
            $result = $client->ConfirmTxnTID(array('request' => $wcfRequest));

            // mapping the result.
            $response = CaptureResponse::map($result->ConfirmTxnTIDResult);
        } catch (Exception $e) {
            $response = new CaptureResponse();
            $response->setReturnCode(TransactionStatus::TransactionNotProcessed);
            $response->setMessage($e->getMessage());
        }

        return $response;
    }

    /**
     * Calls find method.
     *
     * @param FindRequest $request
     * @return FindResponse
     */
    function find($request){
        try {
            // create wcf objects.
            $client = new \SoapClient($this->wsdl_path());
            $wcfRequest = FindRequest::map($request, $this->security);

            // make the request.
            $result = $client->Query(array('request' => $wcfRequest));

            // mapping the result.
            $response = FindResponse::map($result->QueryResult);
        } catch (Exception $e) {
            $response = new FindResponse();
            $response->setReturnCode(TransactionStatus::TransactionNotProcessed);
            $response->setMessage($e->getMessage());
        }

        return $response;
    }

    /**
     * Calls cancel method.
     *
     * @param CancelRequest $request
     * @return CancelResponse
     */
    function cancel($request){
        try {
            // create wcf objects.
            $client = new \SoapClient($this->wsdl_path());
            $wcfRequest = CancelRequest::map($request, $this->security);

            // make the request.
            $result = $client->VoidTransactionTID(array('request' => $wcfRequest));

            // mapping the result.
            $response = CancelResponse::map($result->VoidTransactionTIDResult);
        } catch (Exception $e) {
            $response = new CancelResponse();
            $response->setReturnCode(TransactionStatus::TransactionNotProcessed);
            $response->setMessage($e->getMessage());
        }

        return $response;
    }

}