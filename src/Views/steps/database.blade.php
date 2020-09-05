@extends('installer::install')

@section('step')
    <p>
        Below you should enter your database connection details
        If you're not sure about these, contact your hosting provider
    </p>
    @if(isset($error))
        <div class="alert alert-danger" role="alert">{!! $error !!}</div>
    @endif
    <form method="post" action="{{ route('LaravelInstaller::install.setDatabase') }}">
        <div class="form-group">
            <label for="host">Database host<span class="text-danger">*</span></label>
            <input id="host" type="text" name="database_hostname" class="form-control" value="{{ $values['database_hostname'] ?? '127.0.0.1' }}" required>
        </div>
        <div class="form-group">
            <label for="port">Database port<span class="text-danger">*</span></label>
            <input id="port" type="number" name="database_port" class="form-control" value="{{ $values['database_port'] ?? '3306' }}" required>
        </div>
        <div class="form-group">
            <label for="name">Database name<span class="text-danger">*</span></label>
            <input id="name" type="text" name="database_name" class="form-control" value="{{ $values['database_name'] ?? 'laravel' }}" required>
        </div>
        <div class="form-group">
            <label for="username">Database username<span class="text-danger">*</span></label>
            <input id="username" type="text" name="database_username" class="form-control" value="{{ $values['database_username'] ?? 'root' }}" required>
        </div>
        <div class="form-group">
            <label for="password">Database password</label>
            <input id="password" type="password" name="database_password" class="form-control" value="{{ $values['database_password'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="prefix">Database prefix</label>
            <input id="prefix" type="text" name="database_prefix" class="form-control" placeholder="Optional" value="{{ $values['database_prefix'] ?? '' }}">
        </div>
        <div class="actions">
            <button type="submit" class="btn btn-success float-right">
                Next step
                <i class="fas fa-angle-right ml-2"></i>
            </button>
        </div>
    </form>
@endsection
