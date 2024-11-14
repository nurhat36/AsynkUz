@extends('layouts.master')
@section('title', 'Dashboard')

@section('navigasyon')

    <nav style="margin-top: 10px" class="bg-light-subtle" aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
@endsection

@section('content')

    <x-auth-session-status class="mb-4" :status="session('status')" />

<div class="d-flex justify-content-center ">
    <div class=" bg-white col-lg-4" style="padding: 25px">
    <form class="" method="POST" action="{{ route('login') }}">
        <!-- Email input -->
        @csrf

        <div data-mdb-input-init class="form-outline mb-4">
            <input  class="form-control"  id="email"  type="email" name="email"  required autofocus autocomplete="username"  />
            <label class="form-label" for="email">Email address</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="password"
                   name="password"
                   required autocomplete="current-password" class="form-control" />
            <label class="form-label" for="form1Example2">Password</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
            </div>

            <div class="col">

                @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>
        </div>

        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
    </form>
</div>
</div>
@endsection
