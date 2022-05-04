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
                    <div class="tab-pane fade show active" id="maindata" role="tabpanel"
                         aria-labelledby="nav-maindata-tab">
                        <div class="form-group">
                            <label for="name">Название товара</label>
                            <input name="name" value="{{ $item->name }}"
                                   id="name"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">

                            <label for="image">Картинка новости:</label><br>
                            <img width="400" height="400" src="{{ asset($item->image) }}" alt="{{ $item->image }}"><br>
                            <label for="image" class="form-label">Поменять картинку</label><br>
                            <input class="form-control form-control-sm" type="file" name="image"
                                   placeholder="Choose image" id="image">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" value="{{ $item->description }}"
                                      id="description"
                                      class="form-control"
                                      rows="20">{{ old('description', $item->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input name="price" value="{{ $item->price }}"
                                   id="price"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
