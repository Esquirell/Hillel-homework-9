<form action="{{route('profits.update', ['profit' => $profit->id])}}" method="post">
    @csrf
    @method('patch')
    <input type="text" name="sum" value="{{$profit->sum}}">
    <input type="text" name="source" value="{{$profit->source}}">
    <textarea name="comment">{{$profit->comment}}</textarea>
    <button type="submit">Edit profit</button>
</form>
