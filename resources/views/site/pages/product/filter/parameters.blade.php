@foreach($parameters->map(function ($item){return $item->parent;})->unique()->sortBy(function($item){return $item->title;}) as $parameter)
    <label class="fw-900 mt-15">{{$parameter->title}}</label>
    <div class="custome-checkbox">
        @foreach($parameter->children as $child)
            @if($parameters->where('id', $child->id)->count())
                <input @checked(request()->parameter and in_array($child->id, request()->parameter)) class="form-check-input" type="checkbox" name="parameter[]" id="parameter_{{$child->id}}" value="{{$child->id}}">
                <label class="form-check-label" for="parameter_{{$child->id}}"><span> {{ $child->title }} ({{$child->products()->count()}})</span></label>
                <br>
            @endif
        @endforeach
    </div>
@endforeach
