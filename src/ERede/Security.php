<?php

namespace ERede;
/**
 * Class Security
 *
 * This class is responsable for store affiliation's information.
 */
class Security
{
    /**
     * Affiliation's number.
     *
     * @var string
     */
    public $affiliation = '';

    /**
     * Affiliation's password.
     *
     * @var string
     */
    public $password    = '';

    /**
     * The environment which will conect.
     *
     * @var EnvironmentType
     */
    public $environment = NULL;

    function __construct($affiliation, $password, $environment) {
        $this->affiliation = $affiliation;
        $this->password    = $password;
        $this->environment = $environment;
    }
}
