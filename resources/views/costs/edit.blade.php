<form action="{{route('costs.update', ['cost' => $cost->id])}}" method="post">
    @csrf
    @method('patch')
    <input type="text" name="sum" value="{{$cost->sum}}">
    <input type="text" name="source" value="{{$cost->source}}">
    <textarea name="comment">{{$cost->comment}}</textarea>
    <button type="submit">Edit cost</button>
    <p><a href="{{route('profits.index')}}">Back</a></p>
</form>
