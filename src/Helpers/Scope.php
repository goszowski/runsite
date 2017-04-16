<?php

namespace Goszowski\Runsite\Helpers;

class Scope
{
    protected $globalName = 'runsite_scope';

    public function set($name, $value)
    {
        $GLOBALS[$this->globalName][$name] = $value;
    }

    public function get($name)
    {
        return $GLOBALS[$this->globalName][$name];
    }

    public function destroy($name)
    {
        return $GLOBALS[$this->globalName][$name] = null;
    }
}
