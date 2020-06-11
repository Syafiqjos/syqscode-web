<!DOCTYPE html>

<html>
    <form action="/admin/insert-post" method="post">
        @csrf
        <input type="hidden" name="keywrd" value="B-baka janai no o o  o">
        <label for="url">URL : </label>
        <input type="text" id="url" name="url">
        <br><br>
        <label for="title">Title : </label>
        <input type="text" id="title" name="title">
        <br><br>
        <label for="desc">Description : </label>
        <textarea id="desc" name="desc"></textarea>
        <br><br>
        <label for="content">Content-HTML : </label>
        <textarea id="content" name="content"></textarea>
        <br><br>
        <label for="cover">Cover URL : </label>
        <input type="text" id="cover" name="cover">
        <br><br>
        <label for="tags">Tags : </label>
        <br>
        @foreach($tags as $tag)
            <input type="checkbox" id="tag_{{$tag->id}}" name="tag_{{$tag->id}}" value="{{$tag->id}}">
            <label for="tag_{{$tag->id}}"> {{$tag->name}} </label>
            <br>
        @endforeach
        <br><br>
        <label for="author">Author : </label>
        <br>
        @foreach($authors as $author)
            <input type="radio" id="author_{{$author->id}}" name="author" value="{{$author->id}}">
            <label for="author_{{$author->id}}"> {{$author->username}} </label>
            <br>
        @endforeach
        <br><br>
        <input type="submit" name="post_preview" value="Preview it"></input>
        <input type="submit" name="post_upload" value="Post it"></input>
    </form>
</html>
