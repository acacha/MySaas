@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
        </div>

    </div>

    <style>

        .pricingtable__row {
            display: flex;
        }

        .pricingtable__column {
            flex: 1;
            text-align: center;
            margin: 0.5em;
        }

        .pricingtable {
            border: solid 1px;
            border-radius: 1.15em;
            background: ghostwhite;
        }

        .pricingtable--color1 {
            border-color: #404040;
        }

        .pricingtable--color2 {
            border-color: #e8b10d;
        }

        .pricingtable--color3 {
            border-color: #307ecc;
        }

        .pricingtable--color4 {
            border-color: #82af6f;
        }

        .pricingtable__header {
            border-bottom: solid 1px;
            -webkit-border-top-left-radius: 1em;
            -webkit-border-top-right-radius: 1em;
            -moz-border-radius-topleft: 1em;
            -moz-border-radius-topright: 1em;
            border-top-left-radius: 1em;
            border-top-right-radius: 1em;
        }

        .pricingtable__header--color1 {
            color: #fff;
            background: #404040;
        }

        .pricingtable__header--color2 {
            color: #fff;
            border-color: #e8b10d;
            background: #ffc657;
        }

        .pricingtable__header--color3 {
            color: #fff;
            border-color: #307ecc;
            background: #307ecc;
        }

        .pricingtable__header--color4 {
            color: #fff;
            border-color: #82af6f;
            background: #82af6f;
        }

        .pricingtable__content {
            background: ghostwhite;
            text-align: left;
        }

        .pricingtable__footer {
            border-top: solid 1px;
            -webkit-border-bottom-left-radius: 1em;
            -webkit-border-bottom-right-radius: 1em;
            -moz-border-radius-bottomleft: 1em;
            -moz-border-radius-bottomright: 1em;
            border-bottom-left-radius: 1em;
            border-bottom-right-radius: 1em;
        }

        .pricingtable__footer--color1 {
            color: #fff;
            background: #404040;
        }

        .pricingtable__footer--color2 {
            color: #fff;
            border-color: #e8b10d;
            background: #ffc657;
        }

        .pricingtable__footer--color3 {
            color: #fff;
            border-color: #307ecc;
            background: #307ecc;
        }

        .pricingtable__footer--color4 {
            color: #fff;
            border-color: #82af6f;
            background: #82af6f;
        }

        ul.pricingtable__list {
            list-style: none;
        }

        ul.pricingtable__list li {
            list-style: none;
            text-indent: -1.4em;
            margin: 1em 2em;
        }

        ul.pricingtable__list li:before {
            font-family: FontAwesome;
            content: "\f00c";
            float: left;
            width: 1.4em;
            color: #69aa46;
        }

        ul.pricingtable__list li.uncheck:before {
            content: "\f00d";
            color: red;
        }



    </style>


        <div class="container-fluid">
            <div class="pricingtable__row">
                <div class="pricingtable__column">
                    <div class="pricingtable pricingtable--color1">
                        <div class="pricingtable__header pricingtable__header--color1">Free</div>
                        <div class="pricingtable__content">
                            <ul class="pricingtable__list">
                                <li>Lorem ipsum dolor sit.</li>
                                <li>Alias beatae deserunt magni.</li>
                                <li>Cupiditate dolorum explicabo quasi!</li>
                                <li>Aspernatur magnam obcaecati ut.</li>
                                <li class="uncheck">Ducimus facere provident sed.</li>
                            </ul>
                        </div>
                        <hr>
                        <div class="pricingtable__price"> 0€/mes</div>
                        <div class="pricingtable__footer pricingtable__footer--color1"><i class="fa fa-credit-card"></i>
                            <a href="{{ url('register') }}">Register</a></div>
                    </div>
                </div>
                <div class="pricingtable__column">
                    <div class="pricingtable pricingtable--color2">
                        <div class="pricingtable__header pricingtable__header--color2">Bronze</div>
                        <div class="pricingtable__content">
                            <ul class="pricingtable__list">
                                <li>Lorem ipsum dolor sit.</li>
                                <li>Alias beatae deserunt magni.</li>
                                <li>Cupiditate dolorum explicabo quasi!</li>
                                <li>Aspernatur magnam obcaecati ut.</li>
                                <li>Ducimus facere provident sed.</li>
                            </ul>
                        </div>
                        <hr>
                        <div class="pricingtable__price"> 10€/mes</div>
                        <div class="pricingtable__footer pricingtable__footer--color2"><i class="fa fa-credit-card"></i>
                            <a href="{{ url('register_subscription') }}">Register</a></div>
                    </div>
                </div>
                <div class="pricingtable__column">
                    <div class="pricingtable pricingtable--color3">
                        <div class="pricingtable__header pricingtable__header--color3">Plan 3</div>
                        <div class="pricingtable__content">
                            <ul class="pricingtable__list">
                                <li>Lorem ipsum dolor sit.</li>
                                <li>Alias beatae deserunt magni.</li>
                                <li>Cupiditate dolorum explicabo quasi!</li>
                                <li>Aspernatur magnam obcaecati ut.</li>
                                <li>Ducimus facere provident sed.</li>
                            </ul>
                        </div>
                        <div class="pricingtable__footer pricingtable__footer--color3"><i class="fa fa-credit-card"></i> Register</div>
                    </div>
                </div>
                <div class="pricingtable__column">
                    <div class="pricingtable pricingtable--color4">
                        <div class="pricingtable__header pricingtable__header--color4">Plan 4</div>
                        <div class="pricingtable__content">
                            <ul class="pricingtable__list">
                                <li>Lorem ipsum dolor sit.</li>
                                <li>Alias beatae deserunt magni.</li>
                                <li>Cupiditate dolorum explicabo quasi!</li>
                                <li>Aspernatur magnam obcaecati ut.</li>
                                <li>Ducimus facere provident sed.</li>
                            </ul>
                        </div>
                        <div class="pricingtable__footer pricingtable__footer--color4"><i class="fa fa-credit-card"></i> Register</div>
                    </div>
                </div>
            </div>
        </div>


    </body>

@endsection

