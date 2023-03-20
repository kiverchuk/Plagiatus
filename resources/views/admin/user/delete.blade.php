@extends('layout')
@section('titele')Utilizator nou @endsection

@section('content')
<div class=" p-3">

    <form action="{{route('user.delete.post',$id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Nume</label>
          <input type="text"class="form-control" id="exampleFormControlInput1" placeholder="Nume" value="{{ $user['name']}}" readonly>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Email</label>
            <input type="email"class="form-control" id="exampleFormControlInput2" placeholder="Email" value="{{ $user['email']}}" readonly>
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Drepturi</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Email" value="{{ $roles[$user['roleid']]}}" readonly>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-danger">Sterge</button>
            </div>
          </div>
      </form>

</div>
@endsection
