@extends('layouts.app')

@section('content')
    <div class="container">
    <a type="submit" class="btn btn-primary mb-2" href="{{ route('store.admin.posts.create') }}">Добавить товар</a>
    <table>
        @foreach($paginator as $item)
            <div class="card mb-3" style="max-width: 95vw;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset($item->image) }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $item->created_at }}</small></p>
                            <a href="{{ route('store.admin.posts.edit', $item->id) }}" class="btn btn-primary" style="margin-bottom: 5px">Редактировать</a><br>
                            <a href="{{ route('store.comment.create', $item->id) }}" class="btn btn-primary" style="margin-bottom: 5px">Комментировать</a><br>
                            <a href="{{ route('store.admin.posts.show', $item->id) }}" class="btn btn-primary" style="margin-bottom: 5px">Посмотреть все комментарии</a><br>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    </table>

    </div>
    @php /** @var Illuminate\Pagination\Paginator $paginator */ @endphp
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
