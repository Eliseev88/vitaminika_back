@extends('admin/main')

@section('title', 'Каталог брендов')

@section('content')
<main>
    <div class="recent-grid">
        <div class="projects">
            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card__header">
                    <h3>Бренды</h3>
                    <a href="{{ route('admin.brand.new') }}">Добавить бренд</a>
                </div>

                <div class="card__search">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Поиск...">
                </div>

                <div class="card__body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Название</td>
                                <td>Страна</td>
                                <td>Действия</td>
                            </tr>
                        </thead>
                        <tbody class="brand-table">

                            @foreach($brands as $brand)
                            <tr id="item_{{ $brand->id }}">
                                <td><a href="{{ route('admin.brand', ['brand' => $brand]) }}"> {{ $brand->name }}</a></td>
                                <td>{{ $brand->country }}</td>

                                <td class="card__body-action">
                                    <a href="{{ route('admin.brand', ['brand' => $brand]) }}">Ред.</a>
                                    <button class="brand-delete"
                                        data-item_id="{{$brand->id}}"
                                        data-brand_id="{{$brand->id}}"
                                    >Уд.</button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>

@push('js')
<script>
    // DELETE BRAND
    $(document).ready(function () {
            $('.card__body').on('click', '.brand-delete', function (event) {
                event.preventDefault();
                let brandConfirm = confirm('Вы уверены, что хотите удалить позицию?');
                let brandId = $(this).data('brand_id');
                let itemId = $(this).data('item_id');
                if (brandConfirm) {
                    $.ajax({
                        url: "{{ route('admin.brand.delete') }}",
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            brandId: brandId
                        },
                        success: (data) => {
                            $('#item_' + itemId).remove();
                        }
                    })
                }
            })
        })
</script>

@endpush
@endsection
