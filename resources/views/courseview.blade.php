
@extends('layouts.master')
@section('title', 'Kurs Görüntüle')


@section('navigasyon')

    <nav style="margin-top: 10px" class="bg-light-subtle" aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/courses">Kurslar</a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ $courseId }} Numaralı kurs</li>

        </ol>
    </nav>
@endsection

@section('content')



    <div>
        <h1>Course ID: {{ $courseId }}</h1>
    </div>

@endsection




