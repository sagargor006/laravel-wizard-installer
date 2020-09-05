@extends('installer::install')

@section('step')
    <p>
        Welcome to the installation wizard.
        <br>
        Before getting started, we need some information on the database.
        You will need to know the following items before proceeding.
    </p>
    <ol>
        <li>Database host</li>
        <li>Database port</li>
        <li>Database name</li>
        <li>Database username</li>
        <li>Database password</li>
    </ol>
    <p>
        Most likely these items were supplied to you by your Web Host.
        If you don’t have this information, then you will need to contact them before you can continue.
    </p>
    <p>Installer will insert this information inside a configuration file so your site can communicate with your database.</p>
    <p>Need more help? <a href="https://docs.dacoto.com/laravel-dashboard/installation/installation-wizard" target="_blank">See installation guide.</a></p>
    <div class="actions">
        <a href="{{ route('LaravelInstaller::install.server') }}" class="btn btn-success float-right">
            Next step
            <i class="fas fa-angle-right ml-2"></i>
        </a>
    </div>
@endsection
