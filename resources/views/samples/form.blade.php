@include('layouts.public-head-styles')
@include('layouts.head')

@section('scripts')
    @parent
    <script src="@staticVersion('/js/sampleEngine.min.js')"></script>
@endsection

@include('layouts.public-scripts')
@section('body')
    <body class="flex flex-col" data-page="{{isset($global->page) ? $global->page : ''}}">
        @include('samples.formBody')
        <script>
            var sample_id = '{{substr($sample->id, 1)}}';
            var prerequisite = {!! $prerequisites !!};
            var items = {!! $items !!};
            items.forEach(function(item, i){
                if(item.type == 'image_url'){
                   var img = new Image;
                   img.onload = function(){
                        items[i].image_url = this;
                   };
                   img.src = item.image_url + '.png';
                }
                if(item.answer.type == 'optional_images'){
                    item.answer.options.forEach(function(option, ia){
                        var img = new Image;
                        img.onload = function(){
                            items[i].answer.options[ia] = this;
                        };
                        img.src = option + '.png';
                    });
                }
            });
        </script>
        @yield('scripts')
    </body>
@endsection

@extends('layouts.app')