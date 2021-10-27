@extends('admin/main')

@section('title', 'Обратная связь')

@section('content')
<main>
    <div class="recent-grid">
        <div class="projects">

            <div class="card">
                <div class="card__header">
                    <h3>Обратная связь</h3>
                </div>
                <div class="card__body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Номер</td>
                                <td>Имя отправителя</td>
                                <td>Дата отправки</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $key => $review)
                            <tr>
                                <td> <a href="{{ route('admin.feedbackShow', ['review' => $review] )}}">{{ $key + 1 }}</a></td>
                                <td>{{ $review->name }} {{ $review->surname }}</td>
                                <td>{{ $review->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
