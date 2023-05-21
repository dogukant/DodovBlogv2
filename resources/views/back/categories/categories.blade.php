@extends('back.layouts.master')
@section('content')

    <h1><div class="sidebar-brand-text mx-5 my-5">KATEGORİLER<hr></div></h1>


<div class="col-md-auto">
<ul class="list-group">
    @foreach($categories as $category)
    <a href="{{route('admin.categoriesedit', $category->id)}}" ><li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        {{$category->name}}
        <span class="badge badge-primary badge-pill">{{$category->articleCount->count()}}</span>
    </li>
    </a>
        <br>
    @endforeach
</ul>
</div>

@endsection
