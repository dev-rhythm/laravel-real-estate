<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('admin/assets/js/custom/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}">
</script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/pages/dashboard.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/pages/datatables_basic.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- /theme JS files -->
<input type="hidden" name="csrf_token_ftr" value="<?php echo csrf_token(); ?>">

<script>
    function changeStatus(id,status){
			event.preventDefault();

        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('input[name="_token"]').val()
                  }
              });
        $.ajax({
               type:'POST',
               url:'/publish',
               data: {
				   id,
				   status
                  },
               success:function(data) {
                //

                    if(data == 1){ // success
                        location.reload()
                    }else if(data == 3){ // 3 for free plan error.
                        Swal.fire({
                            title: "Property Not Published",
                            text: "Free plan only allows 1 publish listing. Please upgrade plan to publish more properties.",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                        });
                    }else{ // update plan
                        Swal.fire({
                            title: "Property Not Published",
                            text: "Your plan active property listing limit reached. Upgrade your plan to publish more properties.",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                        });
                    }
               }
            });
		}


</script>
@include('frontend.partials.trialperiod')
