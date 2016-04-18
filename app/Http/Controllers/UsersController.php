<?php

namespace App\Http\Controllers;

use App\Events\UserHasChanged;
use App\User;
use Cache;
use Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $users = Cache::remember('query.users',10,function(){
            return  User:: all();
        });
        return $users;
    }

    public function store()
    {
        User::create(['name' => 'Pepito','email' => 'pepito@pepitos.com']);
//        Cache::flush();
//        Cache::forget('query.users');
//        Event::fire('user.change');
        $this->fireUserHasChanged();
    }

    public function update()
    {
        $user = User::first();
        $user->name="Pepita";
        $user->save();
        //Cache::flush();
//        Cache::forget('query.users');
//        Event::fire('user.change');
        $this->fireUserHasChanged();
    }

    public function destroy($id)
    {
        User::destroy($id);
        //Cache::flush();
//        Cache::forget('query.users');
        Event::fire('user.change');
    }

    private function fireUserHasChanged()
    {
        Event::fire(new UserHasChanged());
    }


}
