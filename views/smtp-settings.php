<div id="smtp" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 <?php
if (kauget('kau_form_submit', $_POST) == "kau_smtp_settings") {
    echo "show active";
}
?> <?php if (kauget('kau_form_submit', $_POST) == "kau_smtp_reset_settings") echo "show active" ?> <?php
if (kauget('kau_form_submit', $_POST) == "") {
    echo "show active";
}
?>">  


    <?php
    $smtpValue = self::getSMTP();

    
    $authenticationButton = '';

    $kauGmailClientID = kauget('gmail-client-id', $smtpValue);
    $kauGmailClientSecret = kauget('gmail-client-secret', $smtpValue);
    $gmailAuthSuccess = '';

    if (KauAuthExtends::isKauGmailClientsSaved()) {

        if (KauAuthExtends::isKauGmailAuthRequired()) {
            $authenticationButton = ' 
        
                    <div class="form-group row ">
                        <div class="col-6">
                          <a href="' . KauGmailAuth2::getGmailClient()->createAuthUrl() . '" class="authentication-button" >         
                              
                             <i class="fa fa-google" aria-hidden="true"></i><b> Authentication </b>
                                
                           </a>  
                        </div>
                    </div> ';
        }
    }


    if (kauget('kau-gmail-access-token', $smtpValue)) {
        $gmailAuthSuccess = 'true';
        $authenticationButton = '';
    }
    
    if (isset($_GET['code'])) {
        $gmailAuthSuccess = 'true';
        $authenticationButton = '';
    }
    
    $microsoftOutlookAuthUrl = '';
    $microsoftAuthSuccess = 'false';
    if (KauOutlookAuth::isKauMicrosoftClientsSaved()) {
        if (KauOutlookAuth::isKauMicrosoftAuthRequired()) {
            $microsoftOutlookAuthUrl = ' 
        
                    <div class="form-group row ">
                        <div class="col-6">
                          <a href="' . KauOutlookAuth::getOutlookAuthURL() . '" class="authentication-button" >         
                              
                             <i class="fa fa-microsoft" aria-hidden="true"></i><b> Outlook Auth </b>
                                
                           </a>  
                        </div>
                    </div> ';
        } else {
            $microsoftAuthSuccess = 'true';
        }
    }
    ?>



    <form role="form" name="smtp_settings_form" id="smtp-settings-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=smtp_settings'; ?>" enctype="multipart/form-data">

        <div class=" well smtp-setting-one-content ">

            <div class="form-group row ">
                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">SMTP Activation</label>
                <div class="col-sm-5">
                    <label class="switch">
                        <input name="smtp-activation" type="checkbox" id="smtp-activation" value="1" <?php
                        $smtpAactivation = (kauget('smtp-activation', $smtpValue)) ? 'checked' : false;
                        echo $smtpAactivation;
                        ?>>
                        <span class="slider round"></span>
                    </label> 
                </div>

            </div>


            <div class="form-group row ">
                <label for="fromemail" class="col-sm-3 col-form-label font-weight-bold">From Email Address <span class="kau-required">*</span></label>
                <div class="col-sm-5">
                    <input type="email" name="kau-from-email" class="form-control" id="kau-from-email" placeholder="From Email Address" required  value="<?php echo kauget('kau-from-email', $smtpValue); ?>">  
                </div>

                <div class="col-sm-4 kau-error-msg" id="kau-alert-msg" > <span class="error text-danger text-center" id="kau-invalid-msg" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> Email Address invalid</span> <span class="error text-success text-center" id="kau-valid-msg" style="display:none" > <i class="fa fa-check-circle"></i></i> WOW! Look great</span>   <span class="error text-danger text-center" id="kau-from-email-empty" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> Can't be Empty</span></div>
            </div>
            <div class="form-group row ">
                <label for="fromname" class="col-sm-3 col-form-label font-weight-bold">From Name <span class="kau-required">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="kau-from-name" class="form-control" id="kau-from-name" placeholder="From Name" required  value="<?php echo kauget('kau-from-name', $smtpValue); ?>">
                </div>

            </div>


        </div>  <!-- Form Part 1 Close  Here-->
        <div class=" well smtp-setting-one-content ">



            <div class="form-group row col-12 ">

                <label for="mailer option" class="col-3 col-form-label font-weight-bold">Mailer Option</label>
                <div class="col-sm-9">

                    <div class="container mailer-type">

                        
                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-gmail" name="mailer-types" value="2" <?php
                            $mailerTypes = (kauget('mailer-types', $smtpValue) == "2") ? 'checked' : false;
                            echo $mailerTypes;
                            ?> /> <span class="connection-type-label font-italic font-weight-bold">Gmail</span>
                        </label>
                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-microsoft" name="mailer-types" value="3"  <?php
                            $mailerTypes = (kauget('mailer-types', $smtpValue) == "3") ? 'checked' : false;
                            echo $mailerTypes;
                            ?> /> <span class="connection-type-label font-italic font-weight-bold">Microsoft</span>
                        </label>
                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-mailgun" name="mailer-types" value="5"  <?php
                            $mailerTypes = (kauget('mailer-types', $smtpValue) == "5") ? 'checked' : false;
                            echo $mailerTypes;
                            ?> /> <span class="connection-type-label font-italic font-weight-bold">MailGun</span>
                        </label>
                        
                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-zohomail" name="mailer-types" value="6"  <?php
                            $mailerTypes = (kauget('mailer-types', $smtpValue) == "6") ? 'checked' : false;
                            echo $mailerTypes;
                            ?> /> <span class="connection-type-label font-italic font-weight-bold">Zoho Mail</span>
                        </label>
                        
                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-default" name="mailer-types" value="4" <?php
                            $mailerTypes = (kauget('mailer-types', $smtpValue) == "4") ? 'checked' : false;
                            echo $mailerTypes;
                            ?>  /> <span class="connection-type-label font-italic font-weight-bold">Default</span>
                        </label>
                    </div>



                    <div class="font-italic label-text" id="smtp-settings-label" style="display: none">

                        SMTP.com is a recommended transactional email service.With a 22 years of track record of reliable email delivery,SMTP.com is premiere solution for Wordpress developers and website owners.SMTP.com has been arround for almost as long as email itself.
                    </div>

                    <div class="font-italic label-text" id="gmail-settings-label" style="display: none">

                        Send emails using your Gmail or G Suite (formerly Google Apps) account, all while keeping your login credentials safe. Other Google SMTP methods require enabling less secure apps in your account and entering your password. However, this integration uses the Google API to improve email delivery issues while keeping your site secure.
                    </div>

                    <div class="font-italic label-text" id="smtp-settings-label" style="display: none">

                        SMTP.com is a recommended transactional email service.With a 22 years of track record of reliable email delivery,SMTP.com is premiere solution for Wordpress developers and website owners.SMTP.com has been arround for almost as long as email itself.
                    </div>

                    <div class="font-italic label-text" id="gmail-settings-label" style="display: none">

                        Send emails using your Gmail or G Suite (formerly Google Apps) account, all while keeping your login credentials safe. Other Google SMTP methods require enabling less secure apps in your account and entering your password. However, this integration uses the Google API to improve email delivery issues while keeping your site secure.
                    </div>

                    <div class="font-italic label-text" id="microsoft-settings-label" style="display: none">

                        In Outlook,click file.Then Navigate to Account Settings>Account Settings.On the Email tab,double-click on the account you want to connect to Hubspot.Below Server Information,you can find your incomeing mail server (IMAP) and outgoing mail server (SMTP) name.
                    </div>
                    <div class="font-italic label-text" id="mailgun-settings-label" style="display: none">

                       mailgun is our recommended transactional email service. Founded in 2012, they serve 80,000+ growing companies around the world and send over 30 million emails each day
                    </div>
                    
                    <div class="font-italic label-text" id="zohomail-settings-label" style="display: none">

                       Ad-free Business Email Hosting with a clean, minimalist interface. Integrated Calendar, Contacts, Notes, Tasks apps. Free for up to 5 users.
                    </div>
                    
                    <div class="font-italic label-text" id="default-settings-label" style="display: none">

                        You currently have the native WordPress option selected. Please select any other Mailer option above to continue the setup.
                    </div>


                </div>

            </div>



            <?php include_once "mailer-option-gmail.php"; ?>
            <?php include_once "mailer-option-microsoft.php"; ?>
            <?php include_once "mailer-option-mailgun.php"; ?>
            <?php include_once "mailer-option-zohomail.php"; ?>
            <?php include_once "mailer-option-default.php"; ?>


        </div>



        <div class="row">
            <div class="col-6">
                <button type="submit" name="kau_form_submit" id="kau_smtp_settings_save" class="btn savebtn" value="kau_smtp_settings"><i class="fa fa-cog" aria-hidden="true" ></i><b> Save Settings</b></button>
            </div>

            <div class="col-6 float-right text-right">

                <button type="submit" class="btn resetbtn"  name="kau_form_submit" class="btn savebtn" value="kau_smtp_reset_settings"><i class="fa fa-cog" aria-hidden="true"></i><b> Reset Settings</b></button>
            </div>

        </div>


</div>


</form> 