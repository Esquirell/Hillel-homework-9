<ul>
    @foreach($profits as $profit)
        <li>
            <a href="{{route('profits.show', ['profit' => $profit->id])}}">{{$profit->sum}} UAH from {{$profit->source}}</a>
            <a href="{{route('profits.edit', ['profit' => $profit->id])}}">Edit</a>
            <form method="post" action="{{route('profits.destroy', ['profit' => $profit->id])}}">
                @csrf
                @method('delete')
                <button type="submit">X</button>
            </form>
        </li>
    @endforeach
    <a href="{{route('profits.create')}}">Add new profit</a>

</ul>
