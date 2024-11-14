@extends('layouts.master')
@section('title', 'Kurslar')
@section('navigasyon')

    <nav style="margin-top: 10px" class="bg-light-subtle" aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Kurslar</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div>
        Kurslar Listesi
    </div>
    @auth()
    <a href="{{ route('courses.create') }}" class="btn btn-outline-danger" data-mdb-ripple-init data-mdb-ripple-color="dark">Kurs Ekle</a>
    @endauth
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-lg-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $course->preview_image) }}" class="card-img-top" alt="Fissure in Sandstone"/>
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="/courses/view/{{ $course->id }}" class="btn btn-primary" data-mdb-ripple-init>Button</a>
                    </div>
                </div>
            </div>
        @endforeach


        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif
    </div>


@endsection
