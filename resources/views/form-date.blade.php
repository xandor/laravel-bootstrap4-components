<?php
$id = $id ?? 'input-date-' . incrementedInt();
$format = $format ?? 'YYYY-MM-DD';
$placeholder = $placeholder ?? $format;
?>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text" id="{{ $id }}-addon1"><i class="far fa-calendar"></i></span>
    </div>
    <input class="form-control {{ $class ?? '' }}"
           value="{{ $slot ?? '' }}"
           id="{{ $id }}"
           aria-describedby="{{ $id }}-addon1"
           placeholder="{{ $placeholder }}"
           @isset($type) type="{{ $type }}" @endisset
           @isset($name) name="{{ $name }}" @endisset
           @isset($style) style="{{ $style }}" @endisset
    >
</div>
<script>
    (function() {
        var config = {
            "singleDatePicker":                true,
            "showDropdowns":                   true,
            "showISOWeekNumbers":              true,
            "showCustomRangeLabel":            false,
            "autoUpdateInput":                 false,
            "autoApply":                       true,
            @isset($startDate)"startDate":     "{{$startDate}}",  @endisset
            @isset($endDate)"endDate":         "{{$endDate}}",    @endisset
            "locale":                          {
                "format":           "{{$format}}",
                "separator":        " - ",
                "applyLabel":       "Ok",
                "cancelLabel":      "Abbrechen",
                "fromLabel":        "Von",
                "toLabel":          "Bis",
                "customRangeLabel": "Custom",
                "weekLabel":        "W",
                "daysOfWeek":       [
                    "So",
                    "Mo",
                    "Di",
                    "Mi",
                    "Do",
                    "Fr",
                    "Sa"
                ]
            }
        };

        try {
            var $input = $('#{{$id}}');
            $input.daterangepicker(config);
            $input.on('apply.daterangepicker', function(ev, picker) {
                $input.val(picker.startDate.format('{{ $format }}'));
            });
        } catch (e) {
            document.addEventListener("DOMContentLoaded", function() {
                var $input = $('#{{$id}}');
                $input.daterangepicker(config);
                $input.on('apply.daterangepicker', function(ev, picker) {
                    $input.val(picker.startDate.format('{{ $format }}'));
                });
            });
        }
    })();
</script>
