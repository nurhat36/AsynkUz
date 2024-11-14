
@extends('layouts.master_black')
@section('title', 'Kurs Görüntüle')




@section('content')
    <!-- Sidebar ve Ana İçerik -->
    <style>
        /* Sidebar'ı kaydırılabilir hale getirmek için */
        .sidebar {
            width: 250px;
            max-height: calc(100vh); /* Navbar yüksekliğini çıkarıyoruz */
            overflow-y: auto; /* Yalnızca sidebar kaydırılabilir */
        }
        .hrr{

                height: calc(100vh - 70px); /* Navbar yüksekliğini çıkarıyoruz */

        }
    </style>
        <div class="d-flex hrr">
            <div class="sidebar bg-light border-end p-3">
                <h4 class="text-center">My Sidebar</h4>
                <ul class="list-group list-group-flush">

                    <!-- Nested Submenu Example -->
                    @foreach ($course->sections as $section)
                    <li class="list-group-item">
                        <a href="#!" class="text-dark" data-mdb-toggle="collapse" data-mdb-target="#section-{{ $section->id}}" aria-expanded="false">
                            {{ $section->title }}
                        </a>
                        <ul class="collapse list-unstyled" id="section-{{ $section->id}}">
                            @foreach ($section->videos as $video)

                            <li class="list-group-item" style=" border-top: 1px solid #e0e0e0; border-left: 0;  border-right: 0;    border-bottom: 0; ">
                                <a href="#option1" class="text-dark">
                                    {{ $video->title }}
                                </a>
                            </li>

                            @endforeach
                        </ul>
                    </li>

                    @endforeach
                </ul>
            </div>

        <!-- Page Content -->
        <div class="content p-4" style="flex-grow: 1;">
            <h1>{{ $videoIdd->title }}</h1>


            <video id="videoPlayer" width="90%" controls>
                <source src="{{ $videoIdd->url }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const video = document.getElementById('videoPlayer'); // Video elementini al
            let lastTime = 0; // Son kaydedilen zaman
            let videoPlaying = false;

            // Sayfa sekmesi değiştiğinde veya pencere kaybolduğunda video durur
            document.addEventListener('visibilitychange', function () {
                if (document.hidden) {
                    // Eğer sekme kaybolduysa (başka bir sekme açıldıysa)
                    video.pause();
                } else {
                    // Eğer sekme geri geldiyse, videoyu tekrar başlat
                    if (videoPlaying) {
                        video.play();
                    }
                }
            });

            // Video oynatılmaya başladığında
            video.addEventListener('play', function () {
                videoPlaying = true;
            });

            // Video durdurulduğunda
            video.addEventListener('pause', function () {
                videoPlaying = false;
            });

            // Video her saniye ilerlediğinde
            video.addEventListener('timeupdate', function () {
                const currentTime = video.currentTime; // Video'nun şu anki izlenme süresi
                const videoId = '{{ $video->id }}'; // Video ID'si (Backend'den geçiyor)

                // Her saniyede bir kaydetmek için
                if (Math.floor(currentTime) !== lastTime) {
                    lastTime = Math.floor(currentTime); // Son kaydedilen saniye
                    saveWatchTime(videoId, lastTime);
                }
            });

            // İzlenme süresi kaydeden fonksiyon
            function saveWatchTime(videoId, time) {
                fetch('/save-video-watch-time', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        video_id: videoId,
                        time: time
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Izlenme süresi kaydedildi:', data);
                    })
                    .catch(error => {
                        console.error('Hata:', error);
                    });
            }
        });

    </script>

@endsection
