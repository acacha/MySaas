<?php

namespace app;



class CreadorDePerfilesHTML extends AbstractProfiler {

    public function show($user)
    {
        return "<div>
                Id: <b> " . $this->getuserId($user) . "</b><br/>
                Name: " . $user->name . "
                </div>";
    }
}