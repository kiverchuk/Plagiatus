@extends('layout')
@section('titele')Utilizatori @endsection

@section('content')
<a href="{{route('user.new')}}"><span type="button" class="btn btn-primary float-right mb-2 mt-1">New</span></a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td> {{$user->email}} </td>
        <td> {{$user->rolename}} </td>
        <td>
            <a href="{{route('user.get',$user->id)}}" title='Modifica'><i class="far fa-edit"></i></a>
            @if ($user->id != Auth::user()->id)
                <a href="{{route('user.delete',$user->id)}}" title='Sterge'><i class="far fa-trash-alt"></i></a>
            @endif
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
