@foreach($brends as $brend)
    <div class="brend_item">

        <label for="brend_{{$brend->id}}">
            <input id="brend_{{$brend->id}}" @checked($brend->id == $selectedBrend?->id) class="brend-checkbox" type="checkbox" name="brend" value="{{$brend->id}}" >
            {{ $brend->title }}
        </label>

    </div>
@endforeach
