<div class="modal fade" id="registration_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="voh_register">
                    <form action="{{route('register_voh')}}" method="POST" class='voh_register_formcls'
                        id="voh_register_form">
                        <div class="form-group">
                            <input type="text" value="" name="f_name" class="form-control" placeholder="First Name">
                            <span class="err_display"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" value="" name="l_name" class="form-control" placeholder="Last Name">
                            <span class="err_display"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" value="" name="email" class="form-control" placeholder="Email">
                            <span class="err_display"></span>
                        </div>
                        <input type="hidden" name="voh_id" id="voh_id">
                        {{ csrf_field() }}
                        <div class="form-group">

                            <button type="submit" id="submit" class="btn btn-orange">Register Now!</button>
                        </div>
                    </form>
                    <div class="msg">

                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js">
</script>

<script>
    jQuery(document).ready(function(){

        $("#voh_register_form").validate({
            onkeyup: function(element) {
                $(element).valid();
            },
            rules: {
                f_name: {
                    required:true
                },
                l_name: {
                    required:true
                },
                email: {
                    required:true,
                    email: true,
                },
            },
            errorPlacement: function (error, element) {

                $(element).closest('.form-group').find('.err_display').text(error.text()).show();
                $(element).closest('.inputBox').removeClass('focus')
                element.attr("style","font-family:Arial, FontAwesome;border-color:#ff0000;border-size:1px;");

            },
            unhighlight: function(element, errorClass, validClass) {

                $(element).closest('.form-group').find('.err_display').html('');
                $(element).removeAttr("style");
            },
            messages: {
                f_name: {
                    required: "Name can't be empty!",
                },
                l_name: {
                    required: "Last Name can't be empty!",
                },
                email: {
                    required: "Email can't be empty!",
                },
                submitHandler: function(form) {
                    form.submit();
                },
            },
        });

        $("#submit").click(function(e) {

            e.preventDefault();
            if(  $("#voh_register_form").valid()){

                $.ajax({
                    type: "POST",
                    url: "{{route('register_voh')}}",
                    data: $("#voh_register_form").serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function( msg ) {
                    jQuery('.msg').html('<div class="alert alert-success" role="alert">Registered Successfully!</div>');
                    setTimeout(() => {
                        jQuery('#registration_modal').modal('hide');
                        jQuery('#voh_register_form').trigger('reset');
                        jQuery('.msg').html('');
                    }, 1500);

                });
            }else{

            }
        });

        jQuery(document).on('click', '.register_now', function(){
            var voh_id = jQuery(this).attr('data-id');
            jQuery('#voh_register_form #voh_id').val(voh_id);
            jQuery('#registration_modal').modal('show');
        });
    })

</script>
