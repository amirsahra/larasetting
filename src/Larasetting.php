<?php

namespace Amirsahra\Larasetting;

class Larasetting
{
    public function say()
    {
        //return "Hi larasetting";
        return config('larasetting.test');
    }
}
