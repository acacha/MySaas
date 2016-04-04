<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('downloadInvoice','PDFController@downloadInvoice');
    Route::get('invoiceHtml

    ','PDFController@invoiceHtml');
    Route::get('auth/{provider}', 'Auth\AuthController@redirectToAuthenticationServiceProvider');
    Route::get('auth/{provider}/callback', 'Auth\AuthController@handleAuthenticationServiceProviderCallback');

    Route::get('plans', 'PlansController@index');

    Route::get('register_subscription', function() {
        return view('auth.register_subscription');
    });

    Route::post('registerAndSubscribeToStripe', 'Auth\AuthController@registerAndSubscribeToStripe');

    Route::get('reports/dailySales','ReportsController@dailySales');

    Route::get('test',function(){
        $subscriptions = \Laravel\Cashier\Subscription::all();

        $totals = array();

        foreach ($subscriptions as $subscription) {
            $day = $subscription->created_at->format('Y-m-d');
            $quantity = $subscription->quantity;
            if (array_key_exists($day,$totals)) {
                $totals[$day] = $totals[$day] + $quantity;
            } else {
                $totals[$day] = $quantity;
            }
        }

        foreach ($totals as $day => $total) {
            $rd = new \App\SaleReportsDaily();

            $rd->day = $day;
            $rd->total = $total;
            $rd->save();
        }
    });


});
