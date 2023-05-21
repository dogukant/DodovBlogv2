@extends('back.layouts.master')
@section('content')


    <div class="col-md-6 mx-auto">
        <form method="post" action="{{route('admin.update')}}">
            @csrf
            <input type="hidden" name="article_id" value="{{$articles->id}}">
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" value="{{$articles->title}}" class="form-control" aria-describedby="emailHelp" >
                <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label>Yazı</label>
                <textarea type="text" name="article" class="form-control">{{$articles->content}}</textarea>
            </div>
            <div class="form-group"
            <label>Kategori</label>
            <select name="category" class="form-control">
                @foreach($categories as $category)
                    <option @if($articles->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label>Fotoğraf</label>
                <br>
                <img src="{{asset($articles->image)}}" class="img-thumbnail rounded" width="150" />
                <input type="file" name="image" class="form-control">
            </div>
            </div>
            <div align="right">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            </form>
                <div align="right">
            <form method="post" style="display: inline-block" action="{{route('admin.destroy')}}">
                @csrf
                @method('DELETE')
                <button value="{{$articles->id}}" name="article_id" type="submit" class="btn btn-danger">Sil</button>
            </form>
            <br>
            </div>
            </div>
            </div>
    </div>
@endsection
