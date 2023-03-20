@extends('layout')
@section('titele')Edit @endsection

@section('content')
<div class=" p-3">

    <form action="{{route('file.get.post',$file->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <a href="{{route('file.download', $file->id)}}" target="_blank">Download PDF</a>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="{{$file->title}}">
        </div>


        <div class="form-group">
            <label for="exampleFormControlInput1">Autor</label>
            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Autor" value="{{$file->author}}">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Coordonator</label>
            <input type="text" name="coordinator" class="form-control" id="exampleFormControlInput1" placeholder="Coordonator" value="{{$file->coordinator}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Unitate Organizatională</label>
            @if (Auth::user()->roleid == 1)
                <select name='organizationunit' class="custom-select custom-select-lg mb-3" id="exampleFormControlInput4">
                    @foreach ($roles as $key=>$role)
                        <option value="{{$role}}" {{ $file->organizationunit == $role? "selected":""}}>{{$role}}</option>
                    @endforeach
                </select>
            @else
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Unitate Organizationala" value="{{ $file->organizationunit }}" readonly>
            @endif
        </div>



        <div class="form-group">
            <label for="exampleFormControlInput1">Exclude Pages</label>
            <input type="text" name="excludePages" class="form-control" id="exampleFormControlInput1" placeholder="Pages" value="{{$file->excludePages}}">
          </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
      </form>

</div>
@endsection
