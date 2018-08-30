<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="{{  asset('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">       
    </head>
    <body>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-8 offset-md-2">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h1 class="text text-center text-danger mt-5">! !&nbsp;OOP's&nbsp;! !</h1><br>
                                    <p class="text text-center text-info"><b>You are ran out of time and you are more than 1 hour late</b></p>
                                    <p class="text text-center text-info"><b>Please do re-registration</b></p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('img/error.gif') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>



    <script src="{{ asset('js/app.js') }}"></script>
</html>
