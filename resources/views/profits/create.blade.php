<form action="{{route('profits.store')}}" method="post">
    @csrf
    <input type="text" name="sum">
    <input type="text" name="source">
    <textarea name="comment"></textarea>
    <button type="submit">Add profit</button>
</form>
