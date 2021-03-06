@extends('admin/main')

@section('title', 'Каталог товаров')

@section('content')
<main>
    <div class="recent-grid">
        <div class="projects">
            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
            <livewire:search-products />
        </div>
    </div>
</main>

@push('js')

{{--  PRODUCT DELETE  --}}
<script>
    $(document).ready(function () {
            $('.card__body').on('click', '.product-delete', function (event) {
                event.preventDefault();
                let adminConfirm = confirm('Вы уверены, что хотите удалить позицию?');
                let productId = $(this).data('product_id');
                let itemId = $(this).data('item_id');
                if (adminConfirm) {
                    $.ajax({
                        url: "{{ route('admin.productDelete') }}",
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            productId: productId
                        },
                        success: (data) => {
                            $('#item_' + itemId).remove();
                        }
                    })
                }
            })
        })
</script>

{{--    SORTING  --}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--       function fetch_data(page, sort_type, sort_by)--}}
{{--       {--}}
{{--           $.ajax({--}}
{{--               url: '{{ route('fetch_data') }}?page='+page+'&sortby='+sort_by+'&sorttype='+sort_type+'&table=products',--}}
{{--               method: "GET",--}}
{{--               headers: {--}}
{{--                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--               },--}}
{{--               success:function (data)--}}
{{--               {--}}
{{--                   $('tbody').html('');--}}
{{--                   $('tbody').html(data);--}}
{{--               }--}}
{{--           })--}}
{{--       }--}}
{{--       $(document).on('click', '.sorting', function (){--}}
{{--           let column_name = $(this).data('column-name');--}}
{{--           let order_type = $(this).data('sorting_type');--}}
{{--           let reverse_order = '';--}}
{{--           if(order_type == 'asc') {--}}
{{--               $(this).data('sorting_type', 'desc');--}}
{{--               reverse_order = 'desc';--}}
{{--               $('.span_icon').html('')--}}
{{--               $('#'+column_name+'_icon').html('<i class="fas fa-sort-up"></i>')--}}
{{--           } else {--}}
{{--               $(this).data('sorting_type', 'asc');--}}
{{--               reverse_order = 'asc';--}}
{{--               $('.span_icon').html('')--}}
{{--               $('#'+column_name+'_icon').html('<i class="fas fa-sort-down"></i>')--}}
{{--           }--}}
{{--           $('#hidden_column_name').val(column_name);--}}
{{--           $('#hidden_sort_type').val(reverse_order);--}}
{{--           let page = $('#hidden_page').val();--}}
{{--           fetch_data(page, reverse_order, column_name);--}}
{{--       })--}}
{{--        $(document).on('click', '.pagination a', function (event){--}}
{{--            event.preventDefault();--}}
{{--            let page = $(this).attr('href').split('page=')[1];--}}
{{--            $('#hidden_page').val(page);--}}
{{--            let column_name = $('#hidden_column_name').val();--}}
{{--            let sort_type = $('#hidden_sort_type').val();--}}
{{--            fetch_data(page, sort_type, column_name);--}}
{{--        })--}}

{{--    });--}}
{{--</script>--}}

@endpush
@endsection
