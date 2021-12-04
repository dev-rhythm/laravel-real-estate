@php
/**
* Trial period calculations.
**/
$trial_expired = Auth::user()->trial_expired();
$trial_count = Auth::user()->getTrialCount();

// pages to ignore this popups on.
$is_billing_page = request()->is('billing');
$is_chckout_page = request()->is('checkout');
@endphp


@if ($trial_expired)
<script>
    var trial_count = {{$trial_count}};
    var is_chckout_page = '{{$is_chckout_page}}';
    var is_billing_page = '{{$is_billing_page}}';

    // if trial period one and not on checkout and billing page show error.
    if(trial_count == 1 && is_chckout_page != true && is_billing_page != true){
        Swal.fire({
            title:                  "Plan Expired",
            text:                   "Your free trial is been expired. You can extend it for 1 week or purchase a plan",
            type:                   'warning',
            showCancelButton:       true,
            showConfirmButton:      true,
            allowOutsideClick:      false,
            confirmButtonText:      'Extend Trial For 1 Week',
            cancelButtonText:       'Purchase Plan',
            confirmButtonColor:     '#3085d6',
            cancelButtonColor:      '#139827',
            allowEscapeKey:         false,
        }).then((result) => {
            if (result.value == true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="csrf_token_ftr"]').val()
                    }
                });
                $.ajax({
                    type:'POST',
                    url:'/extend_validity',
                    success:function(data) {
                        Swal.fire('Trial Period Extended ', '', 'success')
                    }
                });

            } else if (result.dismiss == 'cancel') {
                // redirect to billing page.
                window.location = '/billing';
            }
        });
    }else if(trial_count == 2 && is_chckout_page != true && is_billing_page != true){
        Swal.fire({
            title:                  "Plan Expired",
            text:                   "Your free trial #2 is been expired. Please purchase a plan to list properties",
            type:                   'warning',
            showConfirmButton:      true,
            allowOutsideClick:      false,
            confirmButtonText:      'Purchase Plan',
            allowEscapeKey:         false,
            confirmButtonColor:     '#139827',
        }).then((result) => {
            if (result.value == true) {
                // redirect to billing page.
                window.location = '/billing';
            }
        });
    }

</script>
@endif
