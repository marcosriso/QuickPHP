<div class="form-group">
    <label for="{{ $field->Field }}" class="col-sm-3 control-label">{{ $info->display_name }}</label>
    <div class="col-sm-9">

    @if(!$info->readonly)
        <select class="form-control select2" id="{{ $field->Field }}" name="{{ $field->Field }}" placeholder=""
                @if($info->readonly) readonly @endif
                @if($info->required) required @endif >
                <option value="">{{ $lang->PICK }}</option>
            @forelse($link as $l)
                <option @if(isset($queryObj) && $queryObj->{$field->Field} == $l->id ) selected @endif value="{{ $l->id }}">{{ $l->{$link->details->display_fk} }}</option>
            @empty
                <option>{{ $lang->NORECORDS }}</option>
            @endforelse
        </select>
    @else
        @foreach($link as $l)
            @if(isset($queryObj) && $queryObj->{$field->Field} == $l->id )
                <input readonly value="{{ $l->{$link->details->display_fk} }}"  >
            @endif 
        @endforeach
    @endif
    </div>
</div>