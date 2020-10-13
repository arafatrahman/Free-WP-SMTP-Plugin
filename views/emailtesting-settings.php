<div id="emailtesting" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5 <?php
$emailSentMsg = '';

if (kauget('kau_form_submit', $_POST) == "kau_testing_settings") {
    echo "show active";
    $emailSentMsg = '<div class="alert alert-success" id="gmail-email-sent" style="">
        <strong><i class="fa fa-check-circle"></i> Success!</strong> Email Sent Successfully.
    </div>';
}
?>">

    <?php
    echo $emailSentMsg;
    $testingValue = Setting::getEmailTesting();
    
    
    $smtpValue = Setting::getSMTP();
    

    
    $emailSendButton = '';
    if(kauget('mailer-types',$smtpValue) == "4"){
        $emailSendButton = '';
    }

    
    $emailSendButton = '';
    if (KauAuthExtends::isKauGmailAuthRequired() && empty(kauget('mailer-types', $smtpValue) =="3") && empty(kauget('mailer-types', $smtpValue) =="4") && empty(kauget('mailer-types', $smtpValue) =="5") && empty(kauget('mailer-types', $smtpValue) =="6") ) {
        $emailSendButton = 'disabled';
    }
    ?>




    <form role="form" name="email_testing_form" id="email-testing-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=smtp_settings'; ?>" enctype="multipart/form-data">

        <div class=" well smtp-setting-one-content ">



            <div class="form-group row ">

                <label for="emailsubject" class="col-sm-3 col-form-label font-weight-bold">Email Subject <span class="kau-required">*</span></label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="email-subject" id="email-subject" placeholder="Enter Email Subject" required value="<?php echo kauget('email-subject', $testingValue); ?>">
                    <div class="emailsubject-label font-italic label-text">Subject of the email you want to send</div>
                </div>
                
            </div>

            <div class="form-group row ">

                <label for="emailbody" class="col-sm-3 col-form-label font-weight-bold">Email Body <span class="kau-required">*</span></label>
                <div class="col-sm-5">
                    <textarea class="form-control" name="email-body" id="email-body" rows="4" required value="<?php kauget('email-body', $testingValue); ?>"><?php echo kauget('email-body', $testingValue); ?></textarea>
                    <div class="email-body-label font-italic label-text">Your Message Goes Here......</div>
                </div>
                
            </div>

            <div class="form-group row ">

                <label for="recipientemail" class="col-sm-3 col-form-label font-weight-bold"> Recipient Email Address <span class="kau-required">*</span></label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="recipient-email"  id="recipient-email" placeholder="Enter Recipient Email Address" required  value="<?php echo kauget('recipient-email', $testingValue); ?>">
                    <div class="recipient-email-label font-italic label-text">Enter an Email Address where testing email will be send</div>
                </div>
                <div class="col-sm-4 kau-error-msg" id="kau-alert-msg" > <span class="error text-danger text-center" id="kau-testing-invalid-msg" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> Email Address invalid</span> <span class="error text-success text-center" id="kau-testing-valid-msg" style="display:none" > <i class="fa fa-check-circle"></i></i> WOW! Look great</span> </div>

            </div>



        </div>

        <div class="alert alert-danger" style="display:<?php if($emailSendButton == ''){echo 'none'; } ?>" >
            <strong><i class="fa fa-exclamation-circle " aria-hidden="true"></i>  Need To Fix!</strong> Complete the plugin setup and start sending emails Before Send Email . <a href="<?php echo admin_url().'admin.php?page=smtp_settings'; ?>"><strong>Configuration Now </strong></a>
        </div>

        <div class="row">
            <div class="col-6">
                <button type="submit" id="emailTestingSubmit" name="kau_form_submit" class="btn savebtn" value="kau_testing_settings" <?php echo $emailSendButton ?>><i class="fa fa-paper-plane" aria-hidden="true" ></i><b>  Email Testing</b></button>
            </div>

            <div class="col-6 float-right text-right">

            </div>

        </div>
</div>

</form>   