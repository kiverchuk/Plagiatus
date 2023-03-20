@extends('layout')
@section('titele')Вход@endsection

@section('content')
<div class="mt-3">
    <a href="{{route('file.new')}}"><span type="button" class="btn btn-primary float-right mb-2 mt-1">New</span></a>
    @if (!is_null($files))
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Unique Local</th>
            <th scope="col">Unique Online</th>
            <th scope="col">Last Update</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($files as $file)
        <tr>
            <th scope="row">{{ $file->id }}</th>
            <td>
                <a href="{{route('file.download', $file->id)}}">
                    {{$file->title}}
                </a>
            </td>
            <td>
                @if (!is_null($file->unique))
                <a href="{{route('check.raport',$file->id)}}">
                    {{$file->unique." %"}}
                </a>
                @else
                    {{'null'}}
                @endif
            </td>
            <td>
                @if (!is_null($file->uniqueGoogle))
                <a href="{{route('check.raportGoogle',$file->id)}}">
                    {{$file->uniqueGoogle." %"}}
                </a>
                @else
                    {{'null'}}
                @endif
            </td>
            <td>{{$file->updated_at}}</td>
            <td>
                @if ($file->incheck)
                    {{-- <i class="far fa-copyright" style="color: red"></i> --}}
                    <span class="googlecheck" style="color: red; border:2px solid red;"><span>L</span></span>
                @else
                    {{-- <a href="{{route('file.check',$file->id)}}"><i class="far fa-copyright"></i></a> --}}
                    <a href="{{route('file.check',$file->id)}}" class="googlecheck"><span>L</span></a>
                @endif
                @if ($file->incheckg)
                    {{-- <i class="far fa-copyright" style="color: red"></i> --}}
                    <span class="googlecheck" style="color: red; border:2px solid red;"><span>G</span></span>
                @else
                    {{-- <a href="{{route('file.check',$file->id)}}"><i class="far fa-copyright"></i></a> --}}
                    <a href="{{route('file.check.google',$file->id)}}" class="googlecheck"><span>G</span></a>
                @endif
                <a href="{{route('file.get',$file->id)}}"><i class="far fa-edit"></i></a>
                <a href="{{route('file.delete',$file->id)}}"><i class="far fa-trash-alt"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
    @endif
    {{ $files->links() }}
</div>
<style>
    .googlecheck{
        font-weight: bolder;
        border: 2px solid #007bff;
        border-radius: 30px;
        /* width: 5px; */
        /* height: 5px; */
        /* padding: 1px; */
        font-size: 12px;
    }
    a.googlecheck:hover{
        text-decoration: none !important;
        border: 2px solid #0056b3;
    }
    .googlecheck span {
        width: 13px;
        height: 13px;
        display: inline-block;
        text-align: center;
    }
</style>
@endsection
