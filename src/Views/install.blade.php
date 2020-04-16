<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('Installation') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/img/app/icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5/css/all.min.css">
    <style>
        body {
            font-size: 90%;
        }

        .layout {
            background-image: url("/img/app/background.jpg");
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: normal;
            line-height: 1.5;
        }

        h2 {
            font-size: 22px;
        }

        hr {
            border-top: 1px solid #e9eaec;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .full-height {
            min-height: 100vh;
        }

        .p-15 {
            padding: 15px !important;
        }

        .fa-20 {
            font-size: 20px;
        }

        .m-b-30 {
            margin-bottom: 30px !important;
        }

        .inline-block {
            display: inline-block !important;
        }
    </style>
</head>
<body>
<div class="layout">
    <div class="container">
        <div class="row full-height align-items-center">
            <div class="col-10 mx-auto">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="p-15">
                            <div class="m-b-30 text-center">
                                <img alt="App logo" class="img-fluid inline-block" src="/img/app/icon.png" style="max-height: 45px;">
                                <h2 class="inline-block m-0 align-middle pl-3 text-uppercase">{{ config('app.name', 'Laravel') }} @lang('Installation')</h2>
                                <hr>
                            </div>
                            @yield('step')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4/dist/js/bootstrap.min.js"></script>
</body>
</html>
