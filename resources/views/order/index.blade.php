@extends('layout.main')

@section('content')
    <table style="width: 100vw">
        <thead>
            <tr>
                <th>ID</th>
                <th>Дата создания</th>
                <th>ФИО</th>
                <th>Товар</th>
                <th>Стоимость(руб)</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="order-attr">{{ $order->id }}</td>
                <td class="order-attr">{{ $order->created_at }}</td>
                <td class="order-attr">{{ $order->credentials }}</td>
                <td class="order-attr">{{ $order->product['title'] }}</td>
                <td class="order-attr">{{ $order->total_cost }}</td>
                <td class="order-attr {{ $order->status == 'NEW' ? 'yellow' : 'green'}} }}">{{ $order->status }}</td>
                <td class="order-attr">
                    <div>
                        <a href="{{ route('order.show', $order->id) }}">Подробнее</a>
                        <div style="{{ $order->status == 'DONE' ? 'display: none;' : '' }}">
                            <form action="{{ route('order.update', $order->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <input style="display: none" type="text" name="status" value="DONE">
                                <input style="color: darkgreen" type="submit" value="Выполнить">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <style>
        .order-attr {
            text-align: center;
            padding: 10px;
        }

        .yellow {
            color: greenyellow;
        }

        .green {
            color: green;
        }
    </style>
@endsection
