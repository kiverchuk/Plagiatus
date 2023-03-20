@extends('layout')
@section('titele')Modifica utilizator @endsection

@section('content')
<div class=" p-3">

    <form action="{{route('user.get.post',$id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Nume</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nume" value="{{ $user['name']}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="Email" value="{{ $user['email']}}">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">Password</label>
            <input type="text" name="password" class="form-control" id="exampleFormControlInput3" placeholder="Parola noua. Lasa gol daca nu se modifica." value="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Drepturi</label>
            <select name='roleid' class="custom-select custom-select-lg mb-3" id="exampleFormControlInput4" value="{{ $user['roleid']}}">
                @foreach ($roles as $key=>$role)
                    <option value="{{$key}}" {{$user['roleid']==$key? "selected":""}}>{{$role}}</option>
                @endforeach
              </select>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
      </form>

</div>
@endsection
