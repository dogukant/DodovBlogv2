@extends('front.layouts.master')
@section('title','Bloguma hoş geldiniz')
@section('content')

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
        @include('front.widgets.categoryWidget')
            @foreach($articles as $article)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{route('single', [$article->slug])}}">
                    <img src="{{$article->image}}" />
                    <h2 class="post-title">{{$article->title}}</h2>
                    <h3 class="post-subtitle">{{$article->content}}</h3>
                </a>
                <p class="post-meta">
                    {{$article->created_at->diffForHumans();}}
                    Kategori:
                    <a href="{{route('category',$article->getCategory->slug)}}">{{$article->getCategory->name;}}</a>
                </p>
            </div>
            @endforeach
            {!! $articles->links() !!}
    </div>
</div>
    @endsection

