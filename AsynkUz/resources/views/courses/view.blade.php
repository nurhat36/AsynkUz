
@extends('layouts.master')
@section('title', 'Kurs Görüntüle')


@section('navigasyon')

    <nav style="margin-top: 10px" class="bg-light-subtle" aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/courses">Kurslar</a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{$course->id }} Numaralı kurs</li>

        </ol>
    </nav>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-9">
        <h1>{{ $course->title }}</h1>

        <div class="row">
            <div class="col-6">
                <h4>   <img src="{{ asset('storage/' . $course->teacher->user_image) }}" style="height: 48px" alt="" sizes="" srcset=""> {{ $course->teacher->name }}</h4>
            </div>
            <div class="col-6">
               <div style="float: left">  <i style="font-size: 48px;color: #e02939;" class="bi  bi-tag-fill"></i></div> <p style="font-size: 15px" class="m-0">Kategory</p>
                <h4 class="m-0"> {{ $course->category->name }} </h4>
            </div>
        </div>


        <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-fill  mb-3 bg-white border-1" id="ex1" role="tablist">
            <li class="nav-item " role="presentation">
                <a
                    data-mdb-tab-init
                    class="nav-link active"
                    id="ex2-tab-1"
                    href="#ex2-tabs-1"
                    role="tab"
                    aria-controls="ex2-tabs-1"
                    aria-selected="true"
                >Kurs Açıklamaları </a
                >
            </li>
            <li class="nav-item" role="presentation">
                <a
                    data-mdb-tab-init
                    class="nav-link"
                    id="ex2-tab-2"
                    href="#ex2-tabs-2"
                    role="tab"
                    aria-controls="ex2-tabs-2"
                    aria-selected="false"
                >Kurs İçerikleri</a
                >
            </li>
            <li class="nav-item" role="presentation">
                <a
                    data-mdb-tab-init
                    class="nav-link"
                    id="ex2-tab-3"
                    href="#ex2-tabs-3"
                    role="tab"
                    aria-controls="ex2-tabs-3"
                    aria-selected="false"
                >Yorumlar</a
                >
            </li>
        </ul>
        <!-- Tabs navs -->
<!-- Tabs content -->
<div class="tab-content" id="ex2-content">
    <div
        class="tab-pane fade show active"
        id="ex2-tabs-1"
        role="tabpanel"
        aria-labelledby="ex2-tab-1"
    >
        <div class="card">
            <img src="{{ asset('storage/' . $course->preview_image) }}" class="card-img-top"  alt="Fissure in Sandstone"/>
        </div>
        <div>
            <h1>Course ID: {{$course->id }}</h1>

            <p>Açıklama: {{ $course->description }}</p>
        </div>
    </div>
    </div>
    <div
        class="tab-pane fade"
        id="ex2-tabs-2"
        role="tabpanel"
        aria-labelledby="ex2-tab-2"
    >

        <style>
            /* Basic styling for sections and subsections */
            .section {
                margin: 10px 0;
                border: 1px solid #ccc;
            }
            .section-header {
                background-color: #f0f0f0;
                padding: 10px;
                cursor: move;
            }
            .subsections {
                padding-left: 20px;
                padding-right: 20px;
            }
            .subsection-item {
                background-color: #f1f1f1;
                margin: 5px 0;
                padding: 8px;
                cursor: move;
            }








            /* File Upload Container */
            .file-upload-wrapper {
                position: relative;

                max-width: 400px;
            }

            .file-upload-label {
                display: block;
                padding: 10px;
                background-color: #f8f9fa;
                border: 2px dashed #ced4da;
                border-radius: 5px;
                text-align: center;
                cursor: pointer;
                color: #6c757d;
                font-size: 16px;
                transition: background-color 0.2s ease-in-out;
            }

            .file-upload-label:hover {
                background-color: #e2e6ea;
            }

            .file-upload-label:after {
                content: "or drag and drop files here";
                display: block;
                margin-top: 5px;
                font-size: 14px;
                color: #adb5bd;
            }

            .file-upload-input {
                opacity: 0;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                cursor: pointer;
            }

            .file-upload-preview {
                margin-top: 10px;
                padding: 8px;
                background-color: #fff;
                border: 1px solid #dee2e6;
                border-radius: 5px;
                text-align: left;
            }

            .file-upload-preview ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

            .file-upload-preview ul li {
                padding: 5px 0;
                border-bottom: 1px solid #dee2e6;
            }

            .file-upload-preview ul li:last-child {
                border-bottom: none;
            }

            /* Success State */
            .file-upload-wrapper.success .file-upload-label {
                border-color: #28a745;
                background-color: #d4edda;
                color: #155724;
            }

            .file-upload-wrapper.success .file-upload-label:after {
                content: "File uploaded successfully!";
                color: #155724;
            }

            /* Error State */
            .file-upload-wrapper.error .file-upload-label {
                border-color: #dc3545;
                background-color: #f8d7da;
                color: #721c24;
            }

            .file-upload-wrapper.error .file-upload-label:after {
                content: "File upload failed!";
                color: #721c24;
            }

        </style>


        <div id="sections">
            @foreach ($course->sections as $section)
            <div class="section bg-white" insert="true" data-section-id="{{ $section->datasectionid}}" id="{{ $section->id}}" data-position="{{ $section->order }}">
                <div class="section-header bg-white border-b-2 border-solid row " style="margin-right:0px !important;margin-left: 0px !important;">
                    <div class="col-lg-10"><span id="sectiontitle">{{ $section->title }}</span></div>
                    <div class="col-lg-2">
                        <div class="btn-group shadow-0" role="group" aria-label="Basic example">
                        <button class="btn btn-outline-danger btn-rounded remove-section"   data-mdb-ripple-init><i class="bi bi-trash-fill"></i></button>
                    <button class="btn btn-outline-success btn-rounded section-edit" id="section-edit"  data-mdb-ripple-init><i class=" bi bi-pencil-square"></i></button>
                    </div>
                    </div>
                </div>

                <div class="subsections ">
                    @foreach ($section->videos as $video)
                    <div class="subsection-item row" id="{{ $video->id }}" style="margin-right:0px !important;margin-left: 0px !important;" insert="true" data-subsection-id="{{ $video->datasubsectionid }}" data-position="{{ $video->order }}" data-parent-section-id="{{ $section->id }}">
                       <div class="col-lg-10 row">
                        <span  url="{{ $video->url }}" id="subsectiontitle">{{ $video->title }}</span> <a href="/courses/{{$course->id }}/watch/{{ $video->id }}" target="_blank">İzle</a>
                       </div>
                        <div class="col-lg-2">
                            <div class="btn-group btn-groupsub shadow-0" role="group" aria-label="Basic example">
                        <button class="btn btn-outline-danger btn-rounded remove-subsection"   data-mdb-ripple-init><i class="bi bi-trash-fill"></i></button>
                                <button class="btn btn-outline-success btn-rounded subsection-edit" id="subsection-edit"  data-mdb-ripple-init><i class=" bi bi-pencil-square"></i></button>
                        </div>
                        </div>
                    </div>
                    @endforeach
                    <button class="add-subsection-btn btn btn-outline-secondary btn-rounded mb-2">Yeni Video</button>
                </div>
            </div>
            @endforeach
        </div>
        <button id="add-section-btn" class="btn w-100 btn-outline-primary btn-rounded"><i class="bi bi-plus-square-fill"></i></button>

        <!-- Sortable.js kütüphanesini dahil edin -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

        <script>
            {{'let courseid='.$course->id.';' }}

            document.addEventListener('change', function(event) {
                // Eğer değişiklik 'file-upload' input'unda gerçekleştiyse
                let parentsubsection = event.target.closest('.subsection-item');
                if (event.target && event.target.id === 'file-upload') {
                    const fileInput = event.target;
                    const fileWrapper = document.getElementById('file-upload-wrapper');
                    const fileList = document.getElementById('file-list');
                    if (fileInput.files.length > 0) {
                        fileWrapper.classList.remove('error');
                        fileWrapper.classList.add('success');
                        parentsubsection.setAttribute('insert', 'false');
                        const files = fileInput.files;
                        fileList.innerHTML = '';
                        for (let i = 0; i < files.length; i++) {
                            const listItem = document.createElement('li');
                            listItem.textContent = files[i].name;
                            fileList.appendChild(listItem);
                        }
                    } else {
                        fileWrapper.classList.remove('success');
                        fileWrapper.classList.add('error');
                        fileList.innerHTML = '<li>Dosya yüklenemedi!</li>';
                    }
                }
                else if(event.target && event.target.classList.contains('subsectiontitle-input')){
                    parentsubsection.setAttribute('insert', 'false');
                }
            });
            document.addEventListener('click', function (event) {
                // Sadece section-edit sınıfına sahip butonlara tıklamayı yakalıyoruz
                let edit = event.target.closest('.section-edit');

                    // En yakın parent olan .section veya .subsection-item öğesini buluyoruz
                    let parentheader = event.target.closest('.section-header');

                    if (edit) {
                        // Parent içindeki ilgili başlığı alıyoruz
                        let titleElement = parentheader.querySelector('#sectiontitle');

                        if (titleElement) {
                            // Başlığın mevcut metnini alıyoruz
                            let currentText = titleElement.textContent.trim();

                            // Eski span öğesini kaldırıyoruz
                            titleElement.remove();

                            // Yeni bir input öğesi oluşturuyoruz
                            let input = document.createElement('input');
                            input.type = 'text';
                            input.value = currentText;
                            input.className = 'sectiontitle-input form-control'; // İsteğe bağlı olarak stil verebilirsiniz

                            // Input öğesini ilgili parent'a ekliyoruz
                            parentheader.querySelector('.col-lg-10').appendChild(input);

                            console.log('Başlık düzenleme modunda:', currentText);


                            // Eski section-edit butonunu kaldırıyoruz
                            edit.remove();

                            // Yeni section-insert butonunu oluşturuyoruz
                            let insertButton = document.createElement('button');
                            insertButton.className = 'btn btn-outline-primary btn-rounded section-insert';
                            insertButton.innerHTML = '<i class="bi bi-floppy2"></i>';

                            // Yeni butonu parent'a ekliyoruz
                            parentheader.querySelector('.btn-group').appendChild(insertButton);
                        } else {
                            console.log('Başlık bulunamadı.');
                        }

                    } else {
                        console.log('Parent section veya subsection bulunamadı.');
                    }



                let insertButton = event.target.closest('.section-insert');

                if (insertButton) {
                    // Input alanını buluyoruz
                    let inputElement = parentheader.querySelector('.sectiontitle-input');

                    if (inputElement) {
                        // Input'un mevcut değerini alıyoruz
                        let newText = inputElement.value.trim();

                        // En yakındaki section div'inden data-position değerini alıyoruz
                        let parentSection = insertButton.closest('.section');
                        let order = parentSection ? parentSection.getAttribute('data-position') : 0;
                        let datasectionid = parentSection ? parentSection.getAttribute('data-section-id') : 0;

                        // Course ID'yi tanımlıyoruz

                        // AJAX ile veriyi gönderiyoruz
                        $.ajax({
                            url: courseid+'/sections', // PHP tarafındaki URL
                            type: 'POST',
                            data: {
                                title: newText,
                                order: order,
                                datasectionid: datasectionid,
                                description: '', // Eğer description alıyorsanız, buraya ekleyin
                                _token: '{{ csrf_token() }}' // Laravel CSRF koruması için token
                            },
                            success: function(response) {
                                if (response.status=='success') {
                                    // Eski input'u kaldırıyoruz
                                    inputElement.remove();
                                    // Yeni bir span öğesi oluşturuyoruz
                                    let span = document.createElement('span');
                                    span.id = 'sectiontitle';
                                    span.textContent = newText;

                                    // Span öğesini parent'a ekliyoruz
                                    parentheader.querySelector('.col-lg-10').appendChild(span);
                                    parentSection.setAttribute('insert', 'true');
                                    console.log('Başlık düzenleme tamamlandı:', newText);
                                    parentSection.setAttribute('id', response.section.id);

                                    // Eski section-insert butonunu kaldırıyoruz
                                    insertButton.remove();

                                    // Yeni section-edit butonunu oluşturuyoruz
                                    let editButton = document.createElement('button');
                                    editButton.className = 'btn btn-outline-success btn-rounded section-edit';
                                    editButton.id = 'section-edit';
                                    editButton.setAttribute('data-mdb-ripple-init', 'true');
                                    editButton.innerHTML = '<i class="bi bi-pencil-square"></i>'

                                    // Yeni butonu parent'a ekliyoruz
                                    parentheader.querySelector('.btn-group').appendChild(editButton);
                                } else {
                                    console.log('Veri kaydedilemedi.');
                                }
                            },
                            error: function() {
                                console.log('Ajax isteği başarısız.');
                            }
                        });
                    } else {
                        console.log('Input alanı bulunamadı.');
                    }
                } else {
                    console.log('Parent section bulunamadı.');
                }


                let parentsubsection = event.target.closest('.subsection-item');
                let subedit = event.target.closest('.subsection-edit');
                if (subedit) {
                    // Parent içindeki ilgili başlığı alıyoruz
                    let titleElement = parentsubsection.querySelector('#subsectiontitle');

                    if (titleElement) {
                        // Başlığın mevcut metnini alıyoruz
                        let currentText = titleElement.textContent.trim();

                        // Eski span öğesini kaldırıyoruz


                        // Yeni bir input öğesi oluşturuyoruz
                        let input = document.createElement('input');
                        input.type = 'text';
                        input.value = currentText;
                        input.className = 'subsectiontitle-input form-control '; // İsteğe bağlı olarak stil verebilirsiniz
                        parentsubsection.querySelector('.col-lg-10').appendChild(input);

                        let fileUploadWrapper = document.createElement('div');
                        fileUploadWrapper.className = 'file-upload-wrapper col-lg-8  mt-2 mb-2'; // Sınıfları ayarla
                        fileUploadWrapper.id = 'file-upload-wrapper'; // ID ayarla

                        let label = document.createElement('label');
                        label.htmlFor = 'file-upload'; // For özelliğini ayarla
                        label.className = 'file-upload-label'; // Sınıfı ayarla
                        label.textContent = 'Click to upload a file'; // İçeriği ayarla

                        let fileInput = document.createElement('input');
                        fileInput.type = 'file'; // Dosya girişi
                        fileInput.id = 'file-upload'; // ID ayarla
                        fileInput.className = 'file-upload-input'; // Sınıfı ayarl
                        let fileUploadPreview = document.createElement('div');
                        fileUploadPreview.className = 'file-upload-preview'; // Sınıfı ayarla

                        let fileList = document.createElement('ul');
                        fileList.id = 'file-list'; // ID ayarla

                        fileUploadPreview.appendChild(fileList);

                        fileUploadWrapper.appendChild(label);
                        fileUploadWrapper.appendChild(fileInput);
                        fileUploadWrapper.appendChild(fileUploadPreview);
                        parentsubsection.querySelector('.col-lg-10').appendChild(fileUploadWrapper);
                        console.log('Başlık düzenleme modunda:', currentText);

                        let fileupload = document.createElement('div');
                        fileupload.className = 'col-lg-4 p-3 mt-2 mb-2 bg-light bg-gradient text-dark position-relative'; // Sınıfları ayarla
                        fileupload.id = 'file';
                        fileupload.innerHTML='<i class="bi bi-x-circle position-absolute   end-0 " style=" margin-top: -1rem;  color: #e02939; font-size: 15px; cursor: pointer;"></i><a target="_blank" href="'+titleElement.getAttribute('url')+'"> <canvas id="'+titleElement.getAttribute('url')+'canvas"  width="100%" height="36"></canvas></a>      <video id="'+titleElement.getAttribute('url')+'video" src="'+titleElement.getAttribute('url')+'" preload="metadata" style="display:none;"></video>';
                        parentsubsection.querySelector('.col-lg-10').appendChild(fileupload);


                        const video = document.getElementById(titleElement.getAttribute("url")+'video');
                        const canvas = document.getElementById(titleElement.getAttribute("url")+'canvas');
                        const ctx = canvas.getContext('2d');

                        // Video yüklendiğinde, kareyi yakala
                        const remInPixels = parseFloat(getComputedStyle(document.documentElement).fontSize); // root (html) font size
                        video.addEventListener('loadeddata', function() {
                            const desiredWidth = fileupload.clientWidth - (2*remInPixels);  // Sabit genişlik
                            const aspectRatio = video.videoWidth / video.videoHeight;
                            const desiredHeight = desiredWidth / aspectRatio;  // Oranı koruyarak yükseklik hesapla

                            // Canvas boyutlarını ayarla
                            canvas.width = desiredWidth;
                            canvas.height = desiredHeight;

                            // Video karelerini okumadan önce videoyu başlat
                            video.currentTime = 0;

                            // Videonun yüklenip tam olarak ilk kareye gelmesini bekleyelim
                            video.addEventListener('seeked', function() {
                                // İlk kareyi canvas'a orantılı şekilde çiz
                                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                                console.log('İlk kare canvas üzerine çizildi!');
                            });
                        });

                        // Videoyu otomatik oynatmadan önce durdur
                        video.load();  //

                        // Eski section-edit butonunu kaldırıyoruz
                        subedit.remove();
                        titleElement.remove();
                        // Yeni section-insert butonunu oluşturuyoruz
                        let insertButton = document.createElement('button');
                        insertButton.className = 'btn btn-outline-primary btn-rounded subsection-insert';
                        insertButton.innerHTML = '<i class="bi bi-floppy2"></i>';

                        // Yeni butonu parent'a ekliyoruz
                        parentsubsection.querySelector('.btn-groupsub').appendChild(insertButton);
                    } else {
                        console.log('Başlık bulunamadı.');
                    }

                } else {
                    console.log('Parent section veya subsection bulunamadı.');
                }



                let subsectioninsert = event.target.closest('.subsection-insert');

                if (subsectioninsert) {
                    // Input alanını buluyoruz
                    let inputElement = parentsubsection.querySelector('.subsectiontitle-input');
                    let fileInputElement = parentsubsection.querySelector('.file-upload-input'); // Video dosyası input'u

                    console.log("1");
                    let newText = inputElement.value.trim();
                    let order =  parentsubsection.getAttribute('data-position');
                    let datasubsectionid = parentsubsection.getAttribute('data-subsection-id');
                    let parentSection = event.target.closest('.section');
                    const targetDiv = parentsubsection.querySelector('.col-lg-10').querySelector("#file");

                    if (inputElement && parentsubsection.getAttribute("insert")==="false" && fileInputElement.files.length != 0) {
                        console.log("2");
                        // Input'un mevcut değerini alıyoruz



                        // FormData nesnesi oluştur
                        let formData = new FormData();
                        formData.append('title', newText);
                        formData.append('order', order);
                        formData.append('datasubsectionid', datasubsectionid);
                        formData.append('section_id', parentSection.getAttribute("id"));
                        formData.append('description', ''); // Eğer description alıyorsanız, buraya ekleyin
                        formData.append('video', fileInputElement.files[0]); // Video dosyasını ekliyoruz
                        formData.append('_token', '{{ csrf_token() }}'); // Laravel CSRF koruması için token

                        // AJAX ile veriyi gönderiyoruz
                        $.ajax({
                            url: courseid + '/videos', // PHP tarafındaki URL
                            type: 'POST',
                            data: formData,
                            contentType: false, // FormData kullanırken contentType ayarını false yapıyoruz
                            processData: false, // FormData kullanırken processData ayarını false yapıyoruz
                            success: function(response) {
                                if (response.status == 'success') {
                                    // Eski input'u kaldırıyoruz
                                    inputElement.remove();

                                    // Yeni bir span öğesi oluşturuyoruz
                                    let span = document.createElement('span');
                                    span.id = 'subsectiontitle';
                                    span.textContent = newText;
                                    fileInputElement.closest('.file-upload-wrapper').remove();
                                    // Span öğesini parent'a ekliyoruz
                                    parentsubsection.querySelector('.col-lg-10').appendChild(span);
                                    parentsubsection.setAttribute('id', response.video.id);

                                    console.log('Başlık düzenleme tamamlandı:', newText);
                                    if (targetDiv) {
                                        targetDiv.remove();  // Eğer varsa, kaldır
                                    }

                                    // Eski section-insert butonunu kaldırıyoruz
                                    subsectioninsert.remove();
                                    parentsubsection.setAttribute("insert", "true");
                                    // Yeni section-edit butonunu oluşturuyoruz
                                    let editButton = document.createElement('button');
                                    editButton.className = 'btn btn-outline-success btn-rounded subsection-edit';
                                    editButton.id = 'subsection-edit';
                                    editButton.setAttribute('data-mdb-ripple-init', 'true');
                                    editButton.innerHTML = '<i class="bi bi-pencil-square"></i>';

                                    // Yeni butonu parent'a ekliyoruz
                                    parentsubsection.querySelector('.btn-groupsub').appendChild(editButton);
                                } else {
                                    console.log('Veri kaydedilemedi.');
                                }
                            },
                            error: function() {
                                console.log('Ajax isteği başarısız.');
                            }
                        });
                    }
                    else if(inputElement && parentsubsection.getAttribute("insert")==="false" && fileInputElement.files.length === 0){

                        // FormData nesnesi oluştur
                        let formData = new FormData();
                        formData.append('title', newText);
                        formData.append('order', order);
                        formData.append('datasubsectionid', datasubsectionid);
                        formData.append('section_id', parentSection.getAttribute("id"));
                        formData.append('description', ''); // Eğer description alıyorsanız, buraya ekleyin
                        formData.append('video', ''); // Video dosyasını boş gönderiyoruz
                        formData.append('_token', '{{ csrf_token() }}'); // Laravel CSRF koruması için token

                        // AJAX ile veriyi gönderiyoruz
                        $.ajax({
                            url: courseid + '/videos', // PHP tarafındaki URL
                            type: 'POST',
                            data: formData,
                            contentType: false, // FormData kullanırken contentType ayarını false yapıyoruz
                            processData: false, // FormData kullanırken processData ayarını false yapıyoruz
                            success: function(response) {
                                if (response.status == 'success') {
                                    // Eski input'u kaldırıyoruz
                                    inputElement.remove();

                                    // Yeni bir span öğesi oluşturuyoruz
                                    let span = document.createElement('span');
                                    span.id = 'subsectiontitle';
                                    span.textContent = newText;
                                    fileInputElement.closest('.file-upload-wrapper').remove();
                                    // Span öğesini parent'a ekliyoruz
                                    parentsubsection.querySelector('.col-lg-10').appendChild(span);

                                    console.log('Başlık düzenleme tamamlandı:', newText);

                                    // Eski section-insert butonunu kaldırıyoruz
                                    subsectioninsert.remove();
                                    targetDiv.remove();
                                    parentsubsection.setAttribute("insert", "true");
                                    // Yeni section-edit butonunu oluşturuyoruz
                                    let editButton = document.createElement('button');
                                    editButton.className = 'btn btn-outline-success btn-rounded subsection-edit';
                                    editButton.id = 'subsection-edit';
                                    editButton.setAttribute('data-mdb-ripple-init', 'true');
                                    editButton.innerHTML = '<i class="bi bi-pencil-square"></i>';

                                    // Yeni butonu parent'a ekliyoruz
                                    parentsubsection.querySelector('.btn-groupsub').appendChild(editButton);
                                } else {
                                    console.log('Veri kaydedilemedi.');
                                }
                            },
                            error: function() {
                                console.log('Ajax isteği başarısız.');
                            }
                        });                    }
                    else {
                        // Eski input'u kaldırıyoruz
                        inputElement.remove();
                        targetDiv.remove();
                        // Yeni bir span öğesi oluşturuyoruz
                        let span = document.createElement('span');
                        span.id = 'subsectiontitle';
                        span.setAttribute('url', parentsubsection.querySelector('.col-lg-10').querySelector("a"));
                        span.textContent = newText;
                        fileInputElement.closest('.file-upload-wrapper').remove();
                        // Span öğesini parent'a ekliyoruz
                        parentsubsection.querySelector('.col-lg-10').appendChild(span);
                        parentsubsection.setAttribute("insert", "true");
                        console.log('Başlık düzenleme tamamlandı:', newText);

                        // Eski section-insert butonunu kaldırıyoruz
                        subsectioninsert.remove();

                        // Yeni section-edit butonunu oluşturuyoruz
                        let editButton = document.createElement('button');
                        editButton.className = 'btn btn-outline-success btn-rounded subsection-edit';
                        editButton.id = 'subsection-edit';
                        editButton.setAttribute('data-mdb-ripple-init', 'true');
                        editButton.innerHTML = '<i class="bi bi-pencil-square"></i>';

                        // Yeni butonu parent'a ekliyoruz
                        parentsubsection.querySelector('.btn-groupsub').appendChild(editButton);
                            }
                } else {
                    console.log('Parent section bulunamadı.');
                }
            });


            let sectionIdCounter = 3; // Yeni bölümler için sayaç
            let subsectionIdCounter = 4; // Yeni alt bölümler için sayaç

            // Mevcut yapıyı almak ve güncellemek için fonksiyon
            function updateStructure() {
                let sections = document.querySelectorAll('#sections .section');
                sections.forEach(function(section, sectionIndex) {
                    let sectionId = section.getAttribute('data-section-id');
                    // Bölümün sırasını güncelle
                    section.setAttribute('data-position', sectionIndex + 1);

                    let subsections = section.querySelectorAll('.subsection-item');
                    subsections.forEach(function(subsection, subsectionIndex) {
                        // Alt bölümün sırasını ve bağlı olduğu bölüm ID'sini güncelle
                        subsection.setAttribute('data-position', subsectionIndex + 1);
                        subsection.setAttribute('data-parent-section-id', sectionId);
                    });
                });
            }

            // Bölümleri sürüklenebilir hale getir
            new Sortable(document.getElementById('sections'), {
                animation: 150,
                handle: '.section-header',
                onEnd: function (evt) {
                    console.log('Bölüm taşındı:', evt);
                    updateStructure();
                    const data = getCurrentStructure();

                    $.ajax({
                        url: courseid+'/sections/update',
                        type: 'POST',
                        data: JSON.stringify(data), // Gönderdiğiniz veriyi kontrol edin
                        contentType: 'application/json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log('Başarıyla güncellendi:', response);
                        },
                        error: function(xhr, status, error) {
                            console.log('Güncelleme hatası:', xhr.responseText); // Hata detayını gösterir
                        }
                    });
                    console.log('Mevcut Yapı:', getCurrentStructure());
                    // Yeni sıralamayı veritabanınıza burada güncelleyebilirsiniz
                }
            });

            // Alt bölümleri sürüklenebilir hale getir ve bölümler arasında taşımaya izin ver
            function initSubsectionSortables() {
                document.querySelectorAll('.subsections').forEach(function (subsectionContainer) {
                    // Eğer zaten bir Sortable instance'ı varsa yeniden oluşturma
                    if (subsectionContainer.sortableInstance) {
                        subsectionContainer.sortableInstance.destroy();
                    }
                    subsectionContainer.sortableInstance = new Sortable(subsectionContainer, {
                        group: 'shared-subsections', // Aynı grup ismi, bölümler arası sürüklemeye izin verir
                        animation: 150,
                        handle: '.subsection-item',
                        draggable: '.subsection-item',
                        filter: '.add-subsection-btn',
                        onEnd: function (evt) {
                            console.log('Alt bölüm taşındı:', evt);
                            updateStructure();
                            const data = getCurrentStructure();

                            $.ajax({
                                url: courseid+'/sections/update',
                                type: 'POST',
                                data: JSON.stringify(data), // Gönderdiğiniz veriyi kontrol edin
                                contentType: 'application/json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    console.log('Başarıyla güncellendi:', response);
                                },
                                error: function(xhr, status, error) {
                                    console.log('Güncelleme hatası:', xhr.responseText); // Hata detayını gösterir
                                }
                            });
                            console.log('Mevcut Yapı:', getCurrentStructure());
                            // Yeni sıralamayı veritabanınıza burada güncelleyebilirsiniz
                        }
                    });
                });
            }

            // İlk başta alt bölümleri sürüklenebilir hale getir
            initSubsectionSortables();

            // Yeni Bölüm Ekle Butonu
            document.getElementById('add-section-btn').addEventListener('click', function() {
                addNewSection();
            });
            function generateRandomPassword(length) {
                // Kullanılacak karakter setlerini tanımlıyoruz
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+[]{}|;:,.<>?';

                let password = '';
                for (let i = 0; i < length; i++) {
                    // Rastgele bir karakter seçiyoruz
                    let randomChar = characters.charAt(Math.floor(Math.random() * characters.length));
                    password += randomChar;
                }

                return password;
            }

            function addNewSection() {
                let sectionsContainer = document.getElementById('sections');

                // Yeni bölüm elemanı oluştur
                let newSection = document.createElement('div');
                newSection.classList.add('section');
                newSection.classList.add('bg-white');
                newSection.setAttribute('data-section-id', generateRandomPassword(12));
                newSection.setAttribute('insert', 'false');
                newSection.setAttribute('data-position', '0'); // Geçici olarak 0, updateStructure() ile güncellenecek

                newSection.innerHTML = `
                <div class="section-header bg-white border-b-2 border-solid row " style="margin-right:0px !important;margin-left: 0px !important;">
                    <div class="col-lg-10"> <input type="text" class="sectiontitle-input form-control" value="Bölüm ${sectionIdCounter - 1}"> </div>
                    <div class="col-lg-2">
                    <div class="btn-group shadow-0" role="group" aria-label="Basic example">

                    <button class="btn btn-outline-danger btn-rounded remove-section"><i class="bi bi-trash-fill"></i></button>
                    <button class="btn btn-outline-primary btn-rounded section-insert"><i class="bi bi-floppy2"></i></button>
                    </div>
                    </div>
                </div>

                <div class="subsections">
                    <button class="add-subsection-btn btn btn-outline-secondary btn-rounded mb-2">Yeni Video</button>
                </div>
            `;

                sectionsContainer.appendChild(newSection);
                updateStructure();
                initSubsectionSortables();
                addEventListeners();
            }

            // Alt Bölüm Ekle Butonu
            function addSubsection(addButton) {
                let subsectionsContainer = addButton.parentElement;

                // Yeni alt bölüm elemanı oluştur
                let newSubsection = document.createElement('div');
                newSubsection.classList.add('subsection-item');
                newSubsection.classList.add('row');

                newSubsection.setAttribute('data-subsection-id', generateRandomPassword(12));
                newSubsection.setAttribute('data-position', '0'); // Geçici olarak 0, updateStructure() ile güncellenecek
                newSubsection.setAttribute('data-parent-section-id', '');

                newSubsection.innerHTML = `
                <div class="col-lg-10 row">
                <input type="text" value="Alt Bölüm ${sectionIdCounter - 1}" style="width:50% !important;" class="subsectiontitle-input col-lg-6 form-control" >

             <div class="file-upload-wrapper col-lg-6"  name="video" id="file-upload-wrapper">
  <label for="file-upload" class="file-upload-label">
    Click to upload a file
  </label>
  <input type="file" id="file-upload" class="file-upload-input">
  <div class="file-upload-preview">
    <ul id="file-list">
      <!-- Yüklenen dosya bilgileri buraya eklenecek -->
    </ul>
  </div>
</div>
                </div>
                <div class="col-lg-2">
                  <div class="btn-group btn-groupsub shadow-0" role="group" aria-label="Basic example">

                <button class="btn btn-outline-danger btn-rounded  remove-subsection"><i class="bi bi-trash-fill"></i></button>
               <button class="btn btn-outline-primary btn-rounded subsection-insert"><i class="bi bi-floppy2"></i></i></button>
                  </div>
</div>
                `;

                // "Alt Bölüm Ekle" butonundan önce yeni alt bölümü ekle
                subsectionsContainer.insertBefore(newSubsection, addButton);
                updateStructure();
                addEventListeners();
            }

            // Silme Butonları için Event Listener Ekleme
            function addEventListeners() {
                // Bölüm Silme
                document.querySelectorAll('.remove-section').forEach(function(btn) {
                    btn.removeEventListener('click', removeSection);
                    btn.addEventListener('click', removeSection);
                });

                // Alt Bölüm Silme
                document.querySelectorAll('.remove-subsection').forEach(function(btn) {
                    btn.removeEventListener('click', removeSubsection);
                    btn.addEventListener('click', removeSubsection);
                });

                // Alt Bölüm Ekleme
                document.querySelectorAll('.add-subsection-btn').forEach(function(btn) {
                    btn.removeEventListener('click', addSubsectionListener);
                    btn.addEventListener('click', addSubsectionListener);
                });
            }

            function removeSection(event) {
                let parentSection = event.target.closest('.section');
                let id = parentSection ? parentSection.getAttribute('id') : 0;
                let insert =parentSection.getAttribute('insert');


                if(insert=='true')
                {
                $.ajax({
                    url: courseid+'/sections/delete', // PHP tarafındaki URL
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}' // Laravel CSRF koruması için token
                    },
                    success: function(response) {
                        if (response.status=='success') {

                            parentSection.parentElement.removeChild(parentSection);
                            updateStructure();
                        } else {
                            console.log('Veri Silinemedi.');
                        }
                    },
                    error: function() {
                        console.log('Ajax isteği başarısız.');
                    }
                });
                }
                else {
                    parentSection.parentElement.removeChild(parentSection);
                    updateStructure();
                }
            }

            function removeSubsection(event) {

                let subsection = event.target.closest('.subsection-item');
                let id = subsection ? subsection.getAttribute('id') : 0;
                let insert =subsection.getAttribute('insert');


                if(insert=='true')
                {
                    $.ajax({
                        url: courseid+'/video/delete', // PHP tarafındaki URL
                        type: 'POST',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}' // Laravel CSRF koruması için token
                        },
                        success: function(response) {
                            if (response.status=='success') {

                                subsection.parentElement.removeChild(subsection);
                                updateStructure();
                            } else {
                                console.log('Veri Silinemedi.');
                            }
                        },
                        error: function() {
                            console.log('Ajax isteği başarısız.');
                        }
                    });
                }
                else {

                }
                subsection.parentElement.removeChild(subsection);
                updateStructure();
            }


            function addSubsectionListener(event) {
                addSubsection(event.target);
                initSubsectionSortables();
            }

            // İlk başta event listener'ları ekle
            addEventListeners();

            // Mevcut yapıyı almak için fonksiyon
            function getCurrentStructure() {
                let sections = document.querySelectorAll('#sections .section');
                let structure = [];
                sections.forEach(function(section) {
                    let sectionId = section.getAttribute('data-section-id');
                    let sectionPosition = section.getAttribute('data-position');
                    let subsections = section.querySelectorAll('.subsection-item');
                    let subsectionList = [];
                    subsections.forEach(function(subsection) {
                        let subsectionId = subsection.getAttribute('data-subsection-id');
                        let subsectionPosition = subsection.getAttribute('data-position');
                        let parentSectionId = subsection.getAttribute('data-parent-section-id');
                        subsectionList.push({
                            id: subsectionId,
                            position: parseInt(subsectionPosition),
                            parentSectionId: parentSectionId
                        });
                    });
                    structure.push({
                        id: sectionId,
                        position: parseInt(sectionPosition),
                        subsections: subsectionList
                    });
                });
                return structure;
            }
        </script>

    </div>
    <div
        class="tab-pane fade"
        id="ex2-tabs-3"
        role="tabpanel"
        aria-labelledby="ex2-tab-3"
    >
        Tab 3 content
    </div>

    </div>
<!-- Tabs content -->




    <div class="col-lg-3">
        <a   href="/courses/{{$course->id }}/watch/1" class="btn btn-outline-primary btn-rounded w-100 "  data-mdb-ripple-init  data-mdb-ripple-color="dark">Başla</a>
    </div>
</div>
@endsection




