@extends('installer::install')

@section('step')
    <p>Checking the server requirements</p>
    <ul class="list-group mb-3">
        <li class="list-group-item">
            PHP Version
            <small>(>={{ config('installer.php') }})</small>
            <span class="float-right">
                @if($checks['php'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            PDO
            <span class="float-right">
                @if($checks['pdo'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            Mbstring
            <span class="float-right">
                @if($checks['mbstring'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            Fileinfo
            <span class="float-right">
                @if($checks['fileinfo'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            OpenSSL
            <span class="float-right">
                @if($checks['openssl'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            Tokenizer
            <span class="float-right">
                @if($checks['tokenizer'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            Json
            <span class="float-right">
                @if($checks['json'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            Curl
            <span class="float-right">
                @if($checks['curl'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
    </ul>
    <div class="actions">
        @if(!in_array(false, $checks, true))
            <a href="{{ route('LaravelInstaller::install.folders') }}" class="btn btn-success float-right">
                Next step
                <i class="fas fa-angle-right ml-2"></i>
            </a>
        @else
            <a href="{{ route('LaravelInstaller::install.server') }}" class="btn btn-danger float-right">
                Reload
                <i class="fas fa-redo ml-2"></i>
            </a>
        @endif
    </div>
@endsection
