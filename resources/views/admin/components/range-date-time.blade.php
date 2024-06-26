<div>
    <label for="">{{ isset($label) ? $label : '' }}</label>
    <div class="input-group input-daterange">
        <input type="text" class="form-control border-1" value="{{ isset($startDate) ? $startDate : '' }}" name="start_date">
        <div class="input-group-addon">to</div>
        <input type="text" class="form-control border-1" value="{{ isset($endDate) ? $endDate : '' }}" name="end_date">
    </div>
</div>
