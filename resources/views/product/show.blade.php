@extends('layout.main')

@section('content')
    <div style="margin: 10px 0">
        <a href="{{ url()->previous() }}">Назад</a>
    </div>
    <hr>
    <div>
        <h3>{{ $product->title }}</h3>
        <div><i>Категория:</i> {{ $product->category['title'] }}</div>
        <div><i>Цена:</i> {{ $product->cost }} руб</div>
        <div><i>Описание:</i> {{ $product->info }}</div>
        <div style="margin-top: 10px">
            <a href="{{ route('product.edit', $product->id) }}">Изменить</a>
            <div style="display: inline-block">
                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input style="color: red" type="submit" value="Удалить">
                </form>
            </div>
        </div>
    </div>
@endsection
