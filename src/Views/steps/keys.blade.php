@extends('installer::install')

@section('step')
    @if(isset($error))
        <div class="alert alert-danger" role="alert">{!! $error !!}</div>
    @else
        <div class="alert alert-success text-center" role="alert">Migrations loaded successfully</div>
    @endif
    <p>The encryption keys of the application and the api connection must be generated.</p>
    <p>The storage link will also be generated.</p>
    <form method="post" action="{{ route('LaravelInstaller::install.setKeys') }}">
        <div class="actions">
            <button type="submit" class="btn btn-success float-right">
                Next step
                <i class="fas fa-angle-right ml-2"></i>
            </button>
        </div>
    </form>
@endsection
