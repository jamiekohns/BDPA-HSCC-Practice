<?php

namespace Acidenlay\Den;

class Den
{
    public $str;

    function __construct($arg) {
        $this->str = $arg;
    }

    function getName()
    {
        return 'Den ' . $this->str;
    }
}
