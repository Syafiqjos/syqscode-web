<!DOCTYPE html>

<html>
    <form action="/admin/update-post" method="post">
        @csrf
        <label for="id">ID : </label>
        <input readonly type="text" id="id" name="id" value="{{$post->id}}">
        <br><br>
        <label for="url">URL : </label>
        <input readonly type="text" id="url" name="url" value="{{$post->url}}">
        <br><br>
        <label for="title">Title : </label>
        <input type="text" id="title" name="title"  value="{{$post->title}}">
        <br><br>
        <label for="desc">Description : </label>
        <textarea id="desc" name="desc" style="width:40%;height:120px;">{{$post->description}}</textarea>
        <br><br>
        <label for="content">Content-HTML : </label>
        <textarea id="content" name="content" style="width:40%;height:120px;"> {{$post->content}}</textarea>
        <br><br>
        <label for="cover">Cover URL : </label>
        <input type="text" id="cover" name="cover" value="{{$post->cover}}">
        <br><br>
        <label for="tags">Tags : </label>
        <br>
        @foreach($tags as $tag)
            @if(strpos($post->tags, '['.$tag->id.']') !== false)
                <input checked type="checkbox" id="tag_{{$tag->id}}" name="tag_{{$tag->id}}" value="{{$tag->id}}">
            @else
                <input type="checkbox" id="tag_{{$tag->id}}" name="tag_{{$tag->id}}" value="{{$tag->id}}">
            @endif
            <label for="tag_{{$tag->id}}"> {{$tag->name}} </label>
            <br>
        @endforeach
        <br><br>
        <label for="author">Author : </label>
        <br>
        @foreach($authors as $author)
            @if ($post->author_id == $author->id)
                <input checked type="radio" id="author_{{$author->id}}" name="author" value="{{$author->id}}">
            @else
                <input type="radio" id="author_{{$author->id}}" name="author" value="{{$author->id}}">
            @endif
            <label for="author_{{$author->id}}"> {{$author->username}} </label>
            <br>
        @endforeach
        <br><br>
        <input type="submit" name="post_preview" value="Preview it"></input>
        <input type="submit" name="post_upload" value="Update it"></input>
    </form>
</html>
