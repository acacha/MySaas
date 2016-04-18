<?php

namespace app;


class CreadorDePerfilesJson extends AbstractProfiler
{
    public function show($user)
    {
        return "<JSON>
                Id: <b> " . $this->getuserId($user) . "</b><br/>
                Name: " . $user->name . "
                </JSON>";
    }


}