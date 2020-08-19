<?php

namespace Flights\Model;

/**this is an example of a class */

class Airline {
    protected $name;
    protected $codePrefix;

    public __construct(string $name, string $codePrefix)
    {
        $this->name = $name;
        $this->codePrefix = $codePrefix;
    }
}
