@extends('layout.main')

@section('content')
    <div style="margin: 10px 0">
        <a href="{{ route('order.index') }}">Назад</a>
    </div>
    <hr>
    <div>
        <h3>{{ $order->id }}</h3>
        <div><i>Дата создания:</i> {{ $order->created_at }}</div>
        <div><i>ФИО:</i> {{ $order->credentials }}</div>
        <div><i>Товар:</i> <a href="{{ route('product.show', $order->product['id']) }}">{{ $order->product['title'] }}</a></div>
        <div><i>Кол-во:</i> {{ $order->count }}</div>
        <div><i>Стоимость:</i> {{ $order->total_cost }} руб</div>
        <div><i>Статус:</i> <span class="{{ $order->status == 'NEW' ? 'yellow' : 'green' }}">{{ $order->status }}</span></div>
        <div><i>Комментарий:</i> {{ $order->comment }}</div>
        <div style="margin-top: 10px;">
            <div style="display: inline-block">
                <form style="{{ $order->status == 'DONE' ? 'display: none;' : '' }}" action="{{ route('order.update', $order->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <input style="display: none" type="text" name="status" value="DONE">
                    <input style="color: darkgreen" type="submit" value="Выполнить">
                </form>
                <form action="{{ route('order.destroy', $order->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input style="color: indianred" type="submit" value="Очистить">
                </form>
            </div>
        </div>
    </div>

    <style>
        .yellow {
            color: greenyellow;
        }

        .green {
            color: green;
        }
    </style>
@endsection
