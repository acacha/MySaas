<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Redirect;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectToAuthenticationServiceProvider($provider,Socialite $socialite) {
        return $this->app->make('socialite')->driver($provider)->redirect();
        return Socialite::driver($provider)->redirect();
        return $socialite->redirect();
    }

    public function handleAuthenticationServiceProviderCallback($provider) {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/' . $provider);
        }

        dd($user);
//
//        try {
//            SocialAuth::login('github');
//        } catch (ApplicationRejectedException $e) {
//            // User rejected application
//        } catch (InvalidAuthorizationCodeException $e) {
//            // Authorization was attempted with invalid
//            // code,likely forgery attempt
//        }
//
//        return Redirect::intended();
//
//        //dd($user);
//
////        $authUser = User::firstOrCreate(get_object_vars ( $user ) );
//
////        Auth::login($authUser, true);
//
////        return Redirect::to('home');
    }

    protected function subscribeToStripe($creditCardToken, User $user)
    {
        $user->newSubscription('starter', 'starter')
            ->create($creditCardToken);
    }

    protected function registerAndSubscribeToStripe(Request $request) {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));

        $creditCardToken = $request->input('stripeToken');

        $user = Auth::user();

        $this->subscribeToStripe($creditCardToken,$user);

        return redirect($this->redirectPath());












    }


}
