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
                            <h1 class="text text-center text-success">You are successfully verified your registration</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>



    <script src="{{ asset('js/app.js') }}"></script>
</html>
