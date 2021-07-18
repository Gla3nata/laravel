@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <!-- Post preview-->
                    <div class="post-preview">
                        <div class="post-preview">
                            <h2 class="post-title">Новость дня</h2>
                            <p>Описание</p>
                        </div>
                        <p class="post-meta">
                            Автор
                            <a href="#!">Админ</a>
                            от {{ now()->format('d-m-Y H:i') }}
                        </p>
                    </div>
            </div>
        </div>
    </div>
@endsection
