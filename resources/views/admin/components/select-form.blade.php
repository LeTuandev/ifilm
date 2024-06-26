<div>
    <label for="" class="label-cinema">{{ isset($lable) ? $lable : '' }}</label>
    <select name="{{ isset($name) ? $name : '' }}" class="form-control bg-light border-1 small" @disabled(isset($isDisabled) ? $isDisabled : '')>
        <option value="">--chọn--</option>
        @if (isset($item))
            @foreach ($items as $key => $item)
                <option value="{{ $key }}">{{ $tem }}</option>
            @endforeach
        @endif
    </select>
</div>
