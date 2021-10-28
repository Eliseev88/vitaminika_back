<h2>Поступил новый заказ №{{ $order->id }}</h2>

<p>Состав заказа:</p>
<ul>
    @foreach($cart as $el)
        <li>{{ $el->name }} в количестве {{ $el->quantity }} шт.</li>
    @endforeach
</ul>
<p>Общая сумма заказа - {{ $order->sum }} руб.</p>

<p>Тип доставки:
    @if($order->delivery == 'yes')
        доставка по адресу {{ $order->address }}
    @else
        самовывоз
    @endif
</p>

<p>Для перехода к заказу перейдите по
    <a href="https://vitaminika.ru/admin/orders/{{ $order->id }}" target="_blank">ссылке</a>
</p>
