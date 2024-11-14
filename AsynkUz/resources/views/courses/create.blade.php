@extends('layouts.master')
@section('title', 'Kurs Kaydet')

@section('navigasyon')

    <nav style="margin-top: 10px" class="bg-light-subtle" aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/courses">Kurslar</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Kurs Kaydet </li>

        </ol>
    </nav>
@endsection
@section('content')

<div class="bg-white m-3 p-3 row">

    <div class="col-lg-9">
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Hata Mesajlarını Gösterme -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row mb-4">
            <!-- Öğretmen Ara -->
            <div class="col">
                <label for="teacher_name">Öğretmen Ara:</label>
                <input type="text" id="teacher_name" class="form-control" name="teacher_name" placeholder="Öğretmen ismini giriniz" autocomplete="off">
                <input type="hidden" id="teacher_id" name="teacher_id">
            </div>

            <div class="col">
                <label for="teacher_name">Kategory Ara:</label>
                <input type="text" id="category_name" class="form-control" name="category" placeholder="Kategory ismini giriniz" autocomplete="off">
                <input type="hidden" id="category_id" name="category_id">
            </div>

            <!-- Kurs Başlığı -->
            <div class="col">
                <div >
                    <label class="form-label" for="title">Title</label>
                    <input type="text" id="title" name="title" required class="form-control" />
                </div>
            </div>

            <!-- Kurs Açıklaması -->
            <div class="col">
                <div >
                    <label class="form-label" for="description">Description</label>

                    <input type="text" id="description" name="description" class="form-control" />
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <!-- Önizleme Resmi Yükleme -->
            <div class="col">
                <label for="preview_image">Ön Gösterim Resmi:</label>
                <input type="file" class="form-control" name="preview_image">
            </div>

            <!-- Tanıtım Videosu Yükleme -->
            <div class="col">
                <label for="intro_video">Tanıtım Videosu:</label>
                <input type="file" class="form-control" name="intro_video">
            </div>
        </div>

        <!-- Kaydet Butonu -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Kaydet</button>
    </form>

    <!-- Öğretmen Arama için jQuery UI Autocomplete -->
    <script>
        $(document).ready(function() {
            $('#teacher_name').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('teachers.search') }}",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name + " (" + item.email + ")",
                                    value: item.name,
                                    id: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $('#teacher_name').val(ui.item.value);
                    $('#teacher_id').val(ui.item.id);
                    return false;
                },
                minLength: 2,
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#category_name').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('category.search') }}",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name + " (" + item.email + ")",
                                    value: item.name,
                                    id: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $('#category_name').val(ui.item.value);
                    $('#category_id').val(ui.item.id);
                    return false;
                },
                minLength: 2,
            });
        });
    </script>
    </div>

    <div class="col-3">
        @include('courses.category.create')
    </div>


</div>
@endsection


