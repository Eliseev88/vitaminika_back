<div class="card">
    <div class="card__header">
        <h3>Заказы</h3>
    </div>


    <div class="card__search">
        <span class="las la-search"></span>
        <input wire:model="term" type="text" placeholder="Поиск по номеру заказа...">
    </div>

    <div class="card__body">
        <table width="100%">
            <thead>
            <tr>
                <td wire:click="doSort('id')" class="sorting" style="cursor: pointer">
                    Номер заказа <span class="span_icon" id="id_icon">
                        @if($sortBy == 'id' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'id' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('delivery')" class="sorting" style="cursor: pointer">
                    Тип доставки <span class="span_icon" id="delivery_icon">
                        @if($sortBy == 'delivery' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'delivery' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('status')" class="sorting" style="cursor: pointer">
                    Статус заказа <span class="span_icon" id="status_icon">
                        @if($sortBy == 'status' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'status' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('created_at')" class="sorting" style="cursor: pointer">
                    Дата заказа <span class="span_icon" id="created_at_icon">
                        @if($sortBy == 'created_at' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'created_at' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('updated_at')" class="sorting" style="cursor: pointer">
                    Дата обновления <span class="span_icon" id="updated_at_icon">
                        @if($sortBy == 'updated_at' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'updated_at' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td>Действия</td>
            </tr>
            </thead>
            <tbody>
            @include('vendor.pagination.data-orders')
            </tbody>
        </table>
    </div>
</div>

