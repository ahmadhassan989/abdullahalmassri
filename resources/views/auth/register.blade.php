@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                            <h2>SIGN UP</h2>

                                <div class="col-md-6">
                                    <input id="name" placeholder="Your name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> 
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> 
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="email" placeholder="Email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="phone_number" placeholder="Phone Number"  class=" @error('phone_number') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone"> 
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input value="{{ old('birthday') }}" type="date" id="datepicker"  name="birthday" required>
                                </div>
                                </div>



                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="password" placeholder="Password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="password-confirm" placeholder="Re-Password" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
