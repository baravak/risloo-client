@isset($model->response('meta')->orders->current->$key)
    @if($model->response('meta')->orders->current->$key == 'desc')
        <a href="{{app('request')->create($model->url($model->currentPage()), 'GET', ['order' => $key, 'sort' => 'asc'])->getUri()}}"><i class="fas text-primary fa-sort-down"></i></a>
    @else
        <a href="{{app('request')->create($model->url($model->currentPage()), 'GET', ['order' => $key, 'sort' => 'desc'])->getUri()}}"><i class="fas text-primary fa-sort-up"></i></a>
    @endif
    {{$title}}
@elseif(in_array($key, $model->response('meta')->orders->allowed))
        <a href="{{app('request')->create($model->url($model->currentPage()), 'GET', ['order' => $key, 'sort' => 'desc'])->getUri()}}"><i class="fas text-black-50 fa-sort"></i></a> {{$title}}
@else
    {{$title}}
@endisset
{{-- @if(isset(app('request')->order) && strtolower(app('request')->order) == strtolower($key))

    @if(isset(app('request')->sort) && strtolower(app('request')->sort) == 'asc')? '<a href=\"'. order_link('$key', 'desc') .'\"><i class=\"fas text-primary fa-sort-up\"></i></a>' : '<a href=\"'. order_link('$key', 'asc') .'\"><i class=\"fas text-primary fa-sort-down\"></i></a>') : '<a href=\"'. order_link('$key', 'desc') .'\"><i class=\"fas fa-sort text-black-50\"></i></a>' --}}
