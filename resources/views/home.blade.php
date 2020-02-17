@foreach ($users as $user)
    <h1>{{$user->id}}: {{$user->name}}</h1>
@endforeach
{{$users->links()}}
