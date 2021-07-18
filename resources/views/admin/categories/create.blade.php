@extends('layouts.admin')
@section('title')Добавить категорию - @parent @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Добавить категорию</h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Добавить новую категорию</li>
            </ol>
            <div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form method="post" action="{{ route ('admin.categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" {{old ('title') }}>
                    </div><br>
                    <div class="form-group">
                        <label for="status">Цвет</label>
                        <input type="text" class="form-control" id="color" name="title" {{old ('color') }}>
                    </div><br>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea class="form-control"  id="description" name="description">{!! old('description') !!}</textarea>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <br>
                </form>
                <br>
            </div>
        </div>
@endsection

