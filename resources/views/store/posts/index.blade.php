@extends('layouts.app')

@section('content')

    @foreach($reviews as $review)
        @if(!empty($review))
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title"></div>
                        <div class="card-subtitle mb-2 text-muted"></div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="maindata" role="tabpanel" aria-labelledby="nav-maindata-tab">
                                <div class="form-group">
                                    <label><b>Пользователь:</b></label><br>
                                    {{ $review->user_name }}
                                </div>
                                <div class="form-group">
                                    <label><b>Комментарий:</b></label><br>
                                    {{ $review->message }}
                                </div>
                                <div class="form-group">
                                    <label><b>Дата:</b></label><br>
                                    {{ $review->created_at }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <p><b>У этого товара нет отзывов</b></p>
        @endif
    @endforeach

@endsection
