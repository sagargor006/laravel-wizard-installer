@extends('installer::install')

@section('step')
    <p>
        @lang('Welcome to the installation wizard').
        <br>
        @lang('Before getting started, we need some information on the database').
        @lang('You will need to know the following items before proceeding').
    </p>
    <ol>
        <li>@lang('Database host')</li>
        <li>@lang('Database port')</li>
        <li>@lang('Database name')</li>
        <li>@lang('Database username')</li>
        <li>@lang('Database password')</li>
    </ol>
    <p>
        @lang('Most likely these items were supplied to you by your Web Host').
        @lang('If you don’t have this information, then you will need to contact them before you can continue').
    </p>
    <p>@lang('Installer will insert this information inside a configuration file so your site can communicate with your database').</p>
    <p>@lang('Need more help?') <a href="https://docs.dacoto.com/laravel-dashboard/installation/installation-wizard" target="_blank">@lang('See installation guide').</a></p>
    <div class="actions">
        <a href="{{ route('install.server') }}" class="btn btn-success float-right">
            @lang('Next step')
            <i class="fas fa-angle-right ml-2"></i>
        </a>
    </div>
@endsection
