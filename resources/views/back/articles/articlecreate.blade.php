@extends('back.layouts.master')
@section('content')


    <h1><div class="sidebar-brand-text mx-5 my-5">Yazı oluştur<hr></div></h1>

    <div class="col-md-6 mx-auto">
    <form method="post" action="{{route('admin.create.post')}}">
        @csrf
        <div class="form-group">
            <label>Başlık</label>
            <input type="text" name="title" class="form-control" aria-describedby="emailHelp" >
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>Yazı</label>
            <textarea type="text" name="article" class="form-control"></textarea>
        </div>
        <label>Kategori</label>

        <select name="category" class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}" >{{$category->name}}</option>
            @endforeach
        </select>
<br>
        <div align="right">
        <button type="submit" class="btn btn-primary">Oluştur</button>
        </div>
    </form>
    </div>
    </div>

@endsection
