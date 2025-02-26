@extends('layout.main')

@section('content')
    <div style="margin: 10px 0">
        <a href="{{ route('product.index') }}">Назад</a>
    </div>
    <hr>
    <div style="margin: 10px 0">
        <h3>Изменить товар</h3>
    </div>
    <div>
        <form action="{{ route('product.update', $product->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div style="margin-bottom: 15px">
                <input
                    type="text"
                    name="title"
                    placeholder="Название"
                    value="{{ old('title') ?? $product->title}}"
                >
                @error('title')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <select name="category_id">
                    <option value="легкий" {{ $product->category['title'] == 'легкий' ? 'selected' : '' }}>Легкий</option>
                    <option value="хрупкий" {{ $product->category['title'] == 'хрупкий' ? 'selected' : '' }}>Хрупкий</option>
                    <option value="тяжелый" {{ $product->category['title'] == 'тяжелый' ? 'selected' : '' }}>Тяжелый</option>
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
                    value="{{ old('cost') ?? $product->cost}}"
                >
                @error('cost')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <textarea
                    name="info"
                    placeholder="Введите описание"
                >{{ old('info') ?? $product->info}}</textarea>
            </div>
            <div style="margin-bottom: 15px">
                <input type="submit" value="Изменить">
            </div>
        </form>
    </div>
@endsection

