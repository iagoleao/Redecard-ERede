<?php

namespace ERede\Enums;
/**
 * Class EnvironmentType
 *
 * EnvironmentType maps witch environment will connect.
 */
abstract class EnvironmentType
{
    const Homolog    = 0;
    const Production = 1;
    const Develop    = 2;
}
