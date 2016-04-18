<?php

namespace App\Http\Controllers;

use app\CreadorDePerfilesHTML;
use app\CreadorDePerfilesJson;
use app\Profile;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{

    public function preShow() {
        if ($json) {
            return show(CreadorDePerfilesjson());
        } else {
            return show(CreadorDePerfilesHTML());
        }

    }

    public function show(Profile $profile)
    {
        return $profile->show(Auth::user());
//        $creator = new CreadorDePerfilesHTML();
//        return Auth::user()->profile($creator);
    }



}
