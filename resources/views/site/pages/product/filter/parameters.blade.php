@foreach($parameters->map(function ($item){return $item->parent;})->unique()->sortBy(function($item){return $item->title;}) as $parameter)
    <div class="widget widget-collapsible widget-categories">

        <h3 class="widget-title @if(!in_array($parameter->id, $selectedParametersParent->toArray()))  collapsed @endif widget-title-next"><span>{{$parameter->title}}</span>
        <span class="toggle-btn"></span>
        </h3>
        <div class="brend_list widget-body" id="brendList" >

            @foreach($parameter->children as $child)
                @if($parameters->where('id', $child->id)->count())
                    <div class="brend_item">
                        <label for="parameter_{{$child->id}}">
                            <input @checked($selectedParameters && in_array($child->id, $selectedParameters))  id="parameter_{{$child->id}}" class="brend-checkbox" type="checkbox" name="parameter[]" value="{{$child->id}}" >
                            {{ $child->title }}
                        </label>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endforeach
