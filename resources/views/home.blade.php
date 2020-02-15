@foreach ($users as $user)
    <h1>{{$user->mobile}}</h1>
@endforeach
{{$users->render()}}
