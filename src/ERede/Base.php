<?php

namespace ERede;
/**
 * Class BaseModel
 *
 * This class is used to help conversion methods.
 */
class Base
{
    static protected function toNull($value)
    {
        if ($value === '')
            return NULL;
        else
            return $value;
    }
}