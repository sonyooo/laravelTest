@php /** @var \App\Models\BlogPost */ @endphp

<div class="col-md-4">
    <a href="{{ route('store.admin.posts.index') }}" class="btn btn-outline-primary">Назад</a>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="maindata" role="tabpanel" aria-labelledby="nav-maindata-tab">
                        <div class="form-group">
                            <label for="name">Название товара</label>
                            <p>{{ $item->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="image">Картинка новости:</label><br>
                            <img width="400" height="400" src="{{ $item->image }}" alt="{{ $item->image }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <p>{{ $item->description }}</p>

                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <p>{{ $item->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
