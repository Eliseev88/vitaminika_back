@if($orders->isEmpty())
    <tr>
        <td colspan="6"><br><strong>Заказов с таким номером не найдено</strong><br><br></td>
    </tr>
@else
@foreach($orders as $order)

    <tr>
        <td><a href="{{ route('admin.order', ['order' => $order]) }}">{{ $order->id }}</a></td>
        <td>
            @if ($order->delivery == 'yes') Доставка
            @else Самовывоз
            @endif
        </td>
        <td class="td-status">
            @if($order->status == 0)
                <span class="status purple"></span>
                новый
            @elseif($order->status == 2)
                <span class="status green"></span>
                завершен
            @elseif($order->status == 1)
                <span class="status pink"></span>
                в процессе
            @else
                <span class="status orange"></span>
                отменен
            @endif
        </td>
        <td>{{ $order->created_at }}</td>
        <td>{{ $order->updated_at }}</td>

        <td class="card__body-action">
            <a href="{{ route('admin.order', ['order' => $order]) }}">Ред.</a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        {{ $orders->links('vendor.pagination.default') }}
    </td>
</tr>
@endif
