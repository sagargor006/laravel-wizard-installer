@extends('installer::install')

@section('step')
    <div class="alert alert-success text-center" role="alert">
        <h5 class="text-uppercase">The application has been installed successfully</h5>
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <p>
                <b>Website address</b>
                <br>
                Your website is located at this URL
            </p>
            <p>
                <a href="{{ $path }}">{{ $path }}</a>
            </p>

        </div>
        <div class="col-6">
            <p>
                <b>Administration Area</b>
                <br>
                Use the following link to log into the administration area:
            </p>
            <p>
                <a href="{{ $path }}/auth/login">{{ $path }}/auth/login</a>
            </p>
            <p>
                Email: <b>admin@admin.com</b>
                <br>
                Password: <b>12345678</b>
            </p>
        </div>
    </div>
    <hr>
    <p>
        <b>Support and questions</b>
        <br>
        If you need support, please send me an email using the contact form on my envato user page. I usually respond to support requests within 24 hours so please feel free to contact me with
        problems of any kind or even simple questions, I don’t mind responding.
        <br>
        <a href="https://codecanyon.net/user/dacoto" target="_blank" rel="nofollow">https://codecanyon.net/user/dacoto</a>
    </p>
@endsection
