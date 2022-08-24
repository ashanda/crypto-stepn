@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before proceeding, confirm your email address.') }}
                    ,
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to resend email verification link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="alert_box" class="alert_box" style="display: none;">
    <div class="alert alert-danger">
        <strong>Alert!</strong> Verification email has been sent. Please check your emails.
        <button onclick="close_alert()" class="btn btn-warning">Ok</button>
    </div>
</div>

<script type="text/javascript">
    function show_alert() {
        document.getElementById("alert_box").style.display = "block";
    }

    function close_alert() {
        document.getElementById("alert_box").style.display = "none";
    }
    window.onload = show_alert();
</script>
@endsection