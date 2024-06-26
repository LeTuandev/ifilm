<div>
    <label for="">{{ isset($label) ? $label : '' }}</label>
    <select class="selectpicker border-1 form-control" multiple aria-label="size 3 select example" @disabled(isset($isDisabled) ? $isDisabled : '')>
        <option value="">--chọn--</option>
        @if (isset($items))
            @foreach ($items as $key => $item)
                <option value="{{ $key }}">{{ $item }}</option>
            @endforeach
        @endif
    </select>
</div>
