@extends('layout.main')

@section('content')
    <div style="margin: 10px 0">
        <a href="{{ route('product.index') }}">Назад</a>
    </div>
    <hr>
    <div style="margin: 10px 0">
        <h3>Оформить заказ</h3>
    </div>
    <div>
        <div style="margin: 10px 0">
            <h4>{{ $product->title }}</h4>
            <div>{{ $product->cost }} руб</div>
        </div>
        <hr style="margin-bottom: 10px">
        <form action="{{ route('order.store') }}" method="post">
            @csrf
            <div style="visibility: hidden;">
                <input
                    type="number"
                    name="product_id"
                    value={{ $product->id }}
                >
            </div>
            <div style="margin-bottom: 15px">
                <input
                    type="text"
                    name="credentials"
                    placeholder="ФИО"
                    value="{{ old('credentials') }}"
                >
                @error('credentials')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <input
                    type="number"
                    name="count"
                    id="count"
                    value=1
                    min=1
                >
                <label for="count">Кол-во товара</label>
                @error('count')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <input
                    readonly
                    type="number"
                    name="total_cost"
                    id="total_cost"
                    value="{{ $product->cost }}"
                >
                <label for="total_cost">Итого</label>
                @error('cost')
                {{ $message }}
                @enderror
            </div>
            <div style="margin-bottom: 15px">
                <textarea
                    name="comment"
                    placeholder="Комментарий"
                >{{ old('comment') }}</textarea>
            </div>
            <div style="margin-bottom: 15px">
                <input style="color: blue" type="submit" value="Оформить">
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countInput = document.getElementById('count');
            const totalCostInput = document.getElementById('total_cost');
            const productCost = {{ $product->cost }};

            function updateTotalCost() {
                const count = parseFloat(countInput.value) || 0;
                totalCostInput.value = (productCost * count).toFixed(2);
            }

            countInput.addEventListener('input', updateTotalCost);

            updateTotalCost();
        });
    </script>
@endsection

