@extends('installer::install')

@section('step')
    <p>@lang('Verifying write and read permissions on folders')</p>
    <ul class="list-group mb-3">
        <li class="list-group-item">
            {{ base_path().DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'framework' }}
            <span class="float-right">
                @if($checks['storage.framework'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            {{ base_path().DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'logs' }}
            <span class="float-right">
                @if($checks['storage.logs'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
        <li class="list-group-item">
            {{ base_path().DIRECTORY_SEPARATOR.'bootstrap'.DIRECTORY_SEPARATOR.'cache' }}
            <span class="float-right">
                @if($checks['bootstrap.cache'])
                    <i class="fas fa-20 fa-check-circle text-success"></i>
                @else
                    <i class="fas fa-20 fa-times-circle text-danger"></i>
                @endif
            </span>
        </li>
    </ul>
    <div class="actions">
        @if(!in_array(false, $checks))
            <a href="{{ route('install.database') }}" class="btn btn-success float-right">
                @lang('Next step')
                <i class="fas fa-angle-right ml-2"></i>
            </a>
        @else
            <a href="{{ route('install.folders') }}" class="btn btn-danger float-right">
                @lang('Reload')
                <i class="fas fa-redo ml-2"></i>
            </a>
        @endif
    </div>
@endsection
