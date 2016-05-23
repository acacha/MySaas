<?php
/**
 * Created by PhpStorm.
 * User: sergi
 * Date: 25/04/16
 * Time: 16:18
 */

namespace app\Http\Controllers;

use App\Events\ShotoutAdded;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShoutProves {

    public $user;

    public $content;

    public function __construct($user,$content) {

    $this->user = $user;
    $this->content = $content;
}


}

class ShotOutController extends Controller
{

    public function shotout()
    {
        // Venim de processar un formulari simple amb un botó (submit) i un textarea
        // 1) Validar formulari
        // 2) Persistència: migració/seed etc: shoutout/notification, models
        // 3)
        $shoutout = new ShoutProves('pepito','Hola mon!');

        event(new ShotoutAdded($shoutout));
//        Event::fire();
        // Event::listener();
    }
}