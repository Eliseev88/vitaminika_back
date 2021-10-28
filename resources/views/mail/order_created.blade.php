<h2>Уважаемый(ая) {{ $order->name }} {{ $order->surname }}</h2>
<p>Мы приняли ваш заказ №{{ $order->id }} и уже начали работу над ним!</p>
<p>Состав заказа:</p>
<ul>
    @foreach($cart as $el)
    <li>{{ $el->name }} в количестве {{ $el->quantity }} шт.</li>
    @endforeach
</ul>
<p>Общая сумма заказа - {{ $order->sum }} руб.</p>
<p>Благодарим за выбор нашего магазина!</p>
