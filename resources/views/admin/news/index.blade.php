@extends('layouts.admin')
@section('title')Список новостей - @parent @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Новости</h1>
            <a href="{{ route ('admin.news.create') }}" class="btn btn-primary" style="float:right">Добавить новость</a>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список новостей</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список новостей
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Заголовок</th>
                            <th>Описание</th>
                            <th>Дата добавления</th>
                            <th>Управление</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($newsList as  $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->description }}</td>
                                <td>{{ $news->created_at->format('d-m-Y  H:i') }}</td>
                                <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}"
                                       style="font-size: 12px;">редактировать</a> &nbsp; | &nbsp;
                                    <a href="javascript:;" class="delete" rel="{{ $news->id }}"
                                       style="font-size: 12px; color:red;">удалить</a>
                                </td>
                                <td>$320,800</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Записей не обнаруженно</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
               $(function () {
            $(".delete").on('click', function () {
                if (confirm("Подтвердите удаление")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "DELETE",
                        url: "/admin/news/" + $(this).attr('rel'),
                        complete: function () {
                            alert("Запись удаленa");
                            location.reload();
                        }
                    })
                }
            })
        });
    </script>
@endpush
