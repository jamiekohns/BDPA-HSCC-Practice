<?php

namespace Acidenlay;

class AcidenlayChild extends Acidenlay
{
    function getName()
    {
        $parent = parent::getName();
        $me = 'AcidenlayChild';

        return sprintf(
            'I am %s, my parent is %s',
            $me,
            $parent
        );
    }
}
