<div class="card">
    <div class="card__header">
        <h3>Товары</h3>
        <a href="{{ route('admin.createProduct')}}">Добавить товар</a>
    </div>


    <form action="" class="card__search">
        <span class="las la-search"></span>
        <input wire:model="term" type="text" placeholder="Поиск товара по имени или артикулу...">
    </form>




    <div class="card__body">
        <table width="100%">
            <thead>
            <tr>
                <td wire:click="doSort('name')" class="sorting" style="cursor: pointer"
                    data-sorting_type="asc"
                    data-column-name="name">
                    Наименование <span class="span_icon" id="name_icon">
                        @if($sortBy == 'name' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'name' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('code')" class="sorting" style="cursor: pointer"
                    data-sorting_type="asc"
                    data-column-name="code">
                    Артикул <span class="span_icon" id="code_icon">
                        @if($sortBy == 'code' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'code' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('form')" class="sorting" style="cursor: pointer"
                    data-sorting_type="asc"
                    data-column-name="form">
                    Форма <span class="span_icon" id="form_icon">
                        @if($sortBy == 'form' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'form' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('amount')" class="sorting" style="cursor: pointer"
                    data-sorting_type="asc"
                    data-column-name="amount">
                    Количество <span class="span_icon" id="amount_icon">
                        @if($sortBy == 'amount' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'amount' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('price')" class="sorting" style="cursor: pointer"
                    data-sorting_type="asc"
                    data-column-name="price">
                    Цена <span class="span_icon" id="price_icon">
                        @if($sortBy == 'price' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'price' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('availability')" class="sorting" style="cursor: pointer"
                    data-sorting_type="asc"
                    data-column-name="availability">
                    Наличие <span class="span_icon" id="availability_icon">
                        @if($sortBy == 'availability' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'availability' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td wire:click="doSort('brand_id')" class="sorting" style="cursor: pointer"
                    data-sorting_type="asc"
                    data-column-name="brand_id">
                    Бренд <span class="span_icon" id="brand_id_icon">
                        @if($sortBy == 'brand_id' && $direction == 'asc') <i class="fas fa-sort-up"></i>
                        @elseif($sortBy == 'barnd_id' && $direction == 'desc') <i class="fas fa-sort-down"></i>
                        @endif
                    </span>
                </td>
                <td>Действия</td>
            </tr>
            </thead>
            <tbody>
            @include('vendor.pagination.data-products')
            </tbody>
        </table>

{{--        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />--}}
{{--        <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />--}}
{{--        <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />--}}

    </div>

</div>
</div>
