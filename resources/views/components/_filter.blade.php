@isset($model->response('meta')->filters->allowed->$key)
    <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="{{isset($model->response('meta')->filters->current->$key) ? 'fas' : 'fal'}} fa-filter fs-12"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item fs-12 {{!app('request')->$key ? 'active' : ''}}" href="{{app('request')->create($model->url($model->currentPage()), 'GET', [$key => null])->getUri()}}">{{__("All Items")}}</a>
        @foreach ($model->response('meta')->filters->allowed->$key as $item)
            <a class="dropdown-item fs-12 {{app('request')->$key == $item ? 'active' : ''}}" href="{{app('request')->create($model->url($model->currentPage()), 'GET', [$key => $item])->getUri()}}">{{__("$key.$item")}}</a>
        @endforeach
    </div>
@endisset
