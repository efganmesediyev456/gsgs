@foreach($brends as $brend)
    <input class="form-check-input" @checked(request()->brend == $brend->id) type="checkbox" name="brend" id="brend_{{$brend->id}}" value="{{$brend->id}}">
    <label class="form-check-label" for="brend_{{$brend->id}}"><span>{{ $brend->title }} ({{$brend->products()->count()}})</span></label>
    <br>
@endforeach
