@extends('layout')
@section('titele')Modifica Key-a @endsection

@section('content')
<div class=" p-3">
    <form action="{{route('key.edit.post',$id)}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Nume</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nume" value="{{ $key['name']}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Key</label>
            <input type="text" name="key" class="form-control" id="exampleFormControlInput2" placeholder="Key" value="{{ $key['key']}}">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">CX</label>
            <input type="text" name="cx" class="form-control" id="exampleFormControlInput3" placeholder="CX" value="{{ $key['cx']}}">
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
      </form>
</div>
@endsection
