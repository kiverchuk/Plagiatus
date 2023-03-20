@extends('layout')
@section('titele')Fisier nou @endsection

@section('content')
<div class=" p-3">

    <form action="{{route('file.new.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="{{ old('title')}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Autor</label>
            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Autor" value="{{ old('author')}}">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Coordonator</label>
            <input type="text" name="coordinator" class="form-control" id="exampleFormControlInput1" placeholder="Coordonator" value="{{ old('coordinator')}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput4">Unitate Organizatională</label>
            @if (Auth::user()->roleid == 1)
                <select name='organizationunit' class="custom-select custom-select-lg mb-3" id="exampleFormControlInput4">
                    @foreach ($roles as $key=>$role)
                        <option value="{{$role}}">{{$role}}</option>
                    @endforeach
                </select>
            @else
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Unitate Organizationala" value="{{ $roles[Auth::user()->roleid]}}" readonly>
            @endif
        </div>




        <div class="form-group">
            <label for="exampleFormControlInput1">Exclude pages</label>
            <input type="text" name="excludePages" class="form-control" id="exampleFormControlInput1" placeholder="Exclude pages" value="1,2,3,4,5,6,7" value="{{ old('excludePages')}}">
          </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">File input</label>
            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" accept=".txt,.pdf" value="{{ old('file')}}">
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
      </form>

</div>
@endsection
