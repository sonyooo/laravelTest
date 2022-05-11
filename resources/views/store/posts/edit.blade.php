@extends('layouts.app');

@section('content')

    @php /** @var \App\Models\MusicReview $item */ @endphp
    <div class="container">
        @include('store.admin.posts.includes.result')
        <form method="post" action="{{ route('store.comment.store') }}" enctype="multipart/form-data">
            @csrf

            @php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-pane fade show active" id="maindata" role="tabpanel"
                                         aria-labelledby="nav-maindata-tab">
                                        <div class="form-group">
                                            <label for="user_name">Ваше имя</label>
                                            <input name="user_name" value="{{ $item->user_name }}"
                                                   id="user_name"
                                                   type="text"
                                                   class="form-control"
                                                   minlength="3"
                                                   required>
                                            <input type="hidden" value="{{ $instrument_id }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="message">Текст</label>
                                            <textarea name="message" value="{{ $item->message }}"
                                                      id="message"
                                                      class="form-control"
                                                      rows="10">{{ old('message', $item->message) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <br>

@endsection
