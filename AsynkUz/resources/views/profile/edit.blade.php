@extends('layouts.master')
@section('title', "Profile")

@section('content')



    <div>
        @include('profile.partials.update-profile-information-form')


        @include('profile.partials.update-password-form')


        @include('profile.partials.delete-user-form')

    </div>

@endsection




