
<div class="col-md-auto">
    <div class="card">
        <div class="card-header">Kategoriler</div>
        @foreach($categories as $category)
        <a class="list-group-item list-group-item-action @if(Request::segment(2) == $category->slug)active @endif" id="list-home-list" data-toggle="list"
           href="{{route('category', $category->slug)}}" role="tab">{{$category->name}}<span class="badge bg-primary float-end">{{$category->articleCount->count()}}</span></a>
        @endforeach
    </div>
</div>

