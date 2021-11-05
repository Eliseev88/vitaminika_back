@extends('admin/main')

@section('title', 'Заказы')

@section('content')
<main>
    <div class="recent-grid">
        <div class="projects">
            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
                <livewire:search />
        </div>
    </div>
</main>
@endsection
