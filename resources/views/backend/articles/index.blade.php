@extends('layouts.backend')

@section('title', 'Page Title')


@section('content')
@include('partials._success',['flashSuccess'=>'status'])
<h2>Articles
  &nbsp;
  <a class="ui right floated tiny primary labeled icon button" href="{{url('dashboard/articles/create')}}">
      <i class="plus add icon"></i> Add New Article
  </a>
</h2>

<div class="ui left icon input table-list-search-input">
  <input type="text" placeholder="Search articles..." id="article-list-search">
   <i class="file text outline icon"></i>
</div>

<div id="article-table-list">
<div class="list-pagination top-list-pagination"></div>
  <table  class="ui celled table" cellspacing="0" width="100%">
    <thead>
          <tr class="text-center">
              <th>Id</th>
              <th>Title</th>
              <th>Category</th>
              <th>Author</th>
              <th>Status</th>
              <th>Created at</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody class="list text-center">
      @if(isset($articles) && count($articles))
        @foreach($articles as $article)
          <tr>
            <td class="article-table-id">{{$article->id}}</td>
            <td class="article-table-title">{{ str_limit($article->title, $limit = 50, $end = '...') }}</td>
             <td class="article-table-category-name">{{$article->category_name}}</td>
            <td class="article-table-author-name">{{$article->author_name}}</td>
            <td class="article-table-status">
              @if($article->is_published)
               <span class="ui label green">Published</span>
              @else
                <span class="ui label grey">Draft</span>
              @endif
            </td>
            <td class="article-table-created-at">{{$article->created_at->format('d M Y')}}</td>
            <td>
              <a href="{{url('dashboard/articles/'.$article->id.'/edit')}}" id="edit-article-{{$article->id}}"  class="mini ui button orange"><i class="edit icon"></i> Edit</a>
              <form class="form-inline form-delete-article" method="POST" action="/dashboard/articles/{{$article->id}}">
                {{csrf_field()}}
                 <input name="_method" type="hidden" value="DELETE">
                 <button class="ui mini button red" id="delete-article-{{$article->id}}" type="submit"><i class="icon remove article"></i> Delete</button>

              </form>
            </td>
          </tr>

        @endforeach

    @endif
          <tr id="article-table-no-results" style="display:none;"><td colspan="7">No results</td></tr>
      </tbody>

  </table>
<div class="list-pagination bottom-list-pagination"></div>
</div>



@endsection