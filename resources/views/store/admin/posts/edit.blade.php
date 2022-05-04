@extends('layouts.app');

@section('content')

    @php /** @var \App\Models\BlogPost $item */ @endphp
    <div class="container">
        @include('store.admin.posts.includes.result')
        @if($item->exists)
            <form method="post" action="{{ route('store.admin.posts.update', $item->id) }}" enctype="multipart/form-data">
                @method("PATCH")
                @else
                    <form method="post" action="{{ route('store.admin.posts.store') }}" enctype="multipart/form-data">
                        @endif
                        @csrf

                        @php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('store.admin.posts.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('store.admin.posts.includes.item_edit_add_col')
                            </div>
                        </div>
                    </form>

                    @if($item->exists)
                        <br>
                        <form method="post" action="{{ route('store.admin.posts.destroy', $item->id) }}" enctype="multipart/form-data">
                            @method("DELETE")
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body m-lg-auto">
                                            <button type="submit" class="btn btn-link">Удалить</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    @endif

    </div>

@endsection
