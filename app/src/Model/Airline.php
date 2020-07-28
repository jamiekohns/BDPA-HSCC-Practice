<?php

namespace Flights\Model;

class Airline {
    protected $name;
    protected $codePrefix;

    public __construct(string $name, string $codePrefix)
    {
        $this->name = $name;
        $this->codePrefix = $codePrefix;
    }
}
