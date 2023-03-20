@extends('layout')
@section('titele')API Keys @endsection

@section('content')
<a href="{{route('key.new')}}"><span type="button" class="btn btn-primary float-right mb-2 bt-1">New</span></a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Key</th>
        <th scope="col">CX</th>
        <th scope="col">Cereri</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($keys as $key)
    <tr>
        <th scope="row">{{ $key->id }}</th>
        <td> {{$key->name}} </td>
        <td> {{$key->key}} </td>
        <td> {{$key->cx}} </td>
        <td> {{$key->currentrequest}} </td>
        <td>
            <a href="{{route('key.edit',$key->id)}}" title='Modifica'><i class="far fa-edit"></i></a>
            <a href="{{route('key.delete',$key->id)}}" title='Sterge'><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $keys->links() }}
@endsection
