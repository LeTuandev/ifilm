<div>
    <label for="" class="label-cinema">{{ isset($lable) ? $lable : '' }}</label>
    <input type="text"
        name="{{ isset($name) ? $name : '' }}"
        class="form-control bg-light border-1 small"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
        aria-label="Search"
        aria-describedby="basic-addon2" 
        @disabled(isset($isDisabled) ? $isDisabled : '')
        value="{{ isset($value) ? $value : '' }}">
</div>
