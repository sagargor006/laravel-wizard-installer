@extends('installer::install')

@section('step')
    @if(isset($error))
        <div class="alert alert-danger" role="alert">{!! $error !!}</div>
    @else
        <div class="alert alert-success text-center" role="alert">Database connection successful</div>
    @endif
    <p>The installation of the database and the loading of all the basic data of the application will be carried out.</p>
    <p>This may take a while, please wait and don't close the page.</p>
    <form method="post" action="{{ route('LaravelInstaller::install.runMigrations') }}">
        <div class="actions">
            <button type="submit" class="btn btn-success float-right">
                Next step
                <i class="fas fa-angle-right ml-2"></i>
            </button>
        </div>
    </form>
@endsection
