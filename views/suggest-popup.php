
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right, #0099ff -35%, #ff6699 100%)">
                <h5 class="modal-title" id="exampleModalLabel"><b class="text-light" style="margin-left:10px"><?php esc_html_e('For Better Experience','wp-mailer-smtp')?></b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            
            
            <div class="modal-body">
                
                <p style="font-size: 18px;color:#696969;margin-left:10px;"><b><?php esc_html_e('Authentication With Email Provider Before Sending An Email( access token will be expired every Hours )','wp-mailer-smtp')?></b></p>
                <p style="font-size: 14px;color:red;text-align: center;"><b><?php esc_html_e('Make Sure Other SMTP Plugins Are Disabled','wp-mailer-smtp')?></b></p>
                <p style="font-size: 14px;color:green;text-align: center;"><b><?php esc_html_e('If any errors occur, please refresh and try again.','wp-mailer-smtp')?></b></p>

            </div>
            
        </div>
    </div>
</div>



<script>
    jQuery(function ($) {
        $('#exampleModal').modal('show');
    });
</script>

