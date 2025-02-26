@extends('layout.main')

@section('content')
    <div style="margin: 10px 0">
        <a href="{{ route('product.create') }}">Добавить товар</a>
    </div>
    <hr>
    @foreach($products as $product)
        <div>
            <h3>{{ $product->title }}</h3>
            <div><i>Категория:</i> {{ $product->category['title'] }}</div>
            <div><i>Цена:</i> {{ $product->cost }} руб</div>
            <div style="margin-top: 10px">
                <div>
                    <a href="{{ route('product.show', $product->id) }}">Подробнее</a>
                    <a href="{{ route('product.edit', $product->id) }}">Изменить</a>
                </div>
                <div style="display: inline-block; margin: 10px 0">
                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input style="color: red" type="submit" value="Удалить">
                    </form>
                </div>
                <div style="display: inline-block; margin: 10px 0">
                    <form action="{{ route('order.create', $product->id) }}" method="get">
                        <input style="color: blue" type="submit" value="Оформить заказ">
                    </form>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
@endsection
