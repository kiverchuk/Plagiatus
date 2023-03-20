@extends('layout')
@section('titele')Utilizator nou @endsection

@section('content')
<div class=" p-3">
    <form action="{{route('user.new.post')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Nume</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nume" value="{{ old('name')}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="email" value="{{ old('email')}}">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">Password</label>
            <input type="text" name="password" class="form-control" id="exampleFormControlInput3" placeholder="Parola" value="{{ old('password')}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Drepturi</label>
            <select name='roleid' class="custom-select custom-select-lg mb-3" id="exampleFormControlInput4">
                @foreach ($roles as $key=>$role)
                    <option value="{{$key}}">{{$role}}</option>
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
