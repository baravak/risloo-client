@section('main')
    <main id="main" class="flex-1 flex flex-col bg-white">
        @if (config('app.env') == 'local')
            <div class="flex items-center justify-center bg-red-600 text-sm text-white py-3 px-2">شما هم اکنون در نسخه آزمایشی ریسلو هستید. هیچ اطلاعاتی در این نسخه حقیقی و ماندگار نیست.</div>
        @endif
        @include('layouts.header')
        @include('layouts.content')
    </main>
@endsection
