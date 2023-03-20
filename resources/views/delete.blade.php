@extends('layout')
@section('titele')Delete @endsection

@section('content')
<div class="text-center mt-3" >
    <form method="POST" action="{{ route('file.delete.post', $file->id) }}">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
              <input name="name" type="text" class="form-control" placeholder="Название" value="{{$file->id}}" readonly>
            </div>
          </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
              <input name="name" type="text" class="form-control" placeholder="Название" value="{{$file->title}}" readonly>
            </div>
          </div>
        <button type="submit" class="btn btn-danger mb-2">Delete</button>
      </form>
</div>
@endsection
