<ul>
    @foreach($costs as $cost)
        <li>
            <a href="{{route('costs.show', ['cost' => $cost->id])}}">{{$cost->sum}} UAH for {{$cost->source}}</a>
            <a href="{{route('costs.edit', ['cost' => $cost->id])}}">Edit</a>
            <form method="post" action="{{route('costs.destroy', ['cost' => $cost->id])}}">
                @csrf
                @method('delete')
                <button type="submit">X</button>
            </form>
        </li>
    @endforeach
    <p><a href="{{route('costs.create')}}">Add new cost</a></p>
    <p><a href="{{route('home')}}">Home</a></p>
</ul>
