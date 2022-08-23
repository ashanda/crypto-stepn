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

<!-- <script type="text/javascript">
    function onload_alert() {

        alert(" Verification email has been sent. Please check your emails");

    }

    window.onload = onload_alert();
</script> -->
@endsection