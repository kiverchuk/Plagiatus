@extends('layout')
@section('titele')Sterge Key-a @endsection

@section('content')
<div class=" p-3">
    <form action="{{route('key.delete.post',$id)}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Nume</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nume" value="{{ $key['name']}}" readonly>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Key</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Key" value="{{ $key['key']}}" readonly>
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">CX</label>
            <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="CX" value="{{ $key['cx']}}" readonly>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-danger">Sterge</button>
            </div>
          </div>
      </form>
</div>
@endsection
