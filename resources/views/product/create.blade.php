@extends('layout.main')

@section('content')
    <div style="margin: 10px 0">
        <a href="{{ route('product.index') }}">Назад</a>
    </div>
    <hr>
    <div style="margin: 10px 0">
        <h3>Добавить товар</h3>
    </div>
    <div>
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div style="margin-bottom: 15px">
                <input
                    type="text"
                    name="title"
                    placeholder="Название"
                    value="{{ old('title') }}"
                >
                @error('title')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <select name="category_id">
                    <option value="легкий">Легкий</option>
                    <option value="хрупкий" selected>Хрупкий</option>
                    <option value="тяжелый">Тяжелый</option>
                </select>
                @error('category_id')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <input
                    type="text"
                    name="cost"
                    placeholder="Цена"
                    value="{{ old('cost') }}"
                >
                @error('cost')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <textarea
                    name="info"
                    placeholder="Введите описание"
                >{{ old('info') }}</textarea>
            </div>
            <div style="margin-bottom: 15px">
                <input type="submit" value="Добавить">
            </div>
        </form>
    </div>
@endsection

