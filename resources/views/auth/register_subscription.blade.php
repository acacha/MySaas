@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="hold-transition register-page">

    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
            Plan: Bronze
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="register-box-body">
            <p class="login-box-msg">Payment Details</p>

            <div class="alert alert-success" style="display:none" id="stripe_status">
                Ok! Now please register!
            </div>


            <form action="" method="POST" id="payment-form">
                <span class="payment-errors"></span>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <label>
                        <span>Card Number</span>
                        <input type="text" size="20" data-stripe="number" class="form-control"
                               value="4242424242424242"/>
                    </label>
                </div>

                <div class="form-group has-feedback">
                    <label>
                        <span>CVC</span>
                        <input type="text" size="4" data-stripe="cvc" class="form-control" value="894"/>
                    </label>
                </div>

                <div class="form-group has-feedback">
                    <label>
                        <span>Expiration (MM/YYYY)</span>
                        <input type="text" size="2" data-stripe="exp-month" class="form-control" value="06"/>
                    </label>
                    <span> / </span>
                    <input type="text" size="4" data-stripe="exp-year" class="form-control" value="2016"/>
                </div>



                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Pay</button>
                    </div><!-- /.col -->
                    <div class="col-xs-4"></div>
                </div>
            </form>

        </div>

        <br/>

        @include('auth.partials.register',['url' => 'registerAndSubscribeToStripe'])






    </div><!-- /.register-box -->

    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        // This identifies your website in the createToken call below
        Stripe.setPublishableKey('pk_test_K19paoH5iQhKhLqvxt5STeRm');
        // ...

        jQuery(function($) {
            $('#payment-form').submit(function(event) {
                var $form = $(this);

                // Disable the submit button to prevent repeated clicks
                $form.find('button').prop('disabled', true);

                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from submitting with the default action
                return false;
            });
        });

        function stripeResponseHandler(status, response) {
            var $form = $('#register_form');
            var $form_stripe = $('#payment-form');
            var $stripe_status = $('#stripe_status');

            if (response.error) {
                // Show the errors on the form
                $form.find('.payment-errors').text(response.error.message);
                $form.find('button').prop('disabled', false);
            } else {
                // response contains id and card, which contains additional card details
                var token = response.id;
                console.debug("token:" + token);
                // Insert the token into the form so it gets submitted to the server
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                // and submit

                $form_stripe.hide();
                $stripe_status.show();
            }
        };
    </script>
    </body>

@endsection
