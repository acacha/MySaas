<?php
/**
 * Created by PhpStorm.
 * User: sergi
 * Date: 18/04/16
 * Time: 17:31
 */

namespace app;


abstract class AbstractProfiler implements Profile
{

    abstract public function show($user);

    protected function getuserId($user){
        return $user->id;
    }
}