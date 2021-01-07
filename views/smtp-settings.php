<div id="smtp" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 <?php
if (wpmsget('wpms_form_submit', $_POST) == "wpms_smtp_settings") {
    echo "show active";
}
?> <?php if (wpmsget('wpms_form_submit', $_POST) == "wpms_smtp_reset_settings") echo "show active" ?> <?php
if (wpmsget('wpms_form_submit', $_POST) == "") {
    echo "show active";
}
?>">  


    <?php
    $smtpValue = self::getSMTP();


    $authenticationButton = '';

    $kauGmailClientID = wpmsget('gmail-client-id', $smtpValue);
    $kauGmailClientSecret = wpmsget('gmail-client-secret', $smtpValue);
    $gmailAuthSuccess = '';

    if (KauAuthExtends::isKauGmailClientsSaved()) {

        if (KauAuthExtends::isKauGmailAuthRequired()) {
            $authenticationButton = ' 
                
                    <div class="form-group row api-autheication-btn">
                        <div class="col-6" >
                          <a href="' . KauGmailAuth2::getGmailClient()->createAuthUrl() . '" class="btn kau-api-autheication">
                            <span class="autheication-btn-txt">Authorization</span>
                            <span class="round"><i class="fa fa-chevron-right"></i></span>
                          </a>
                        </div>
 
                    </div>';
        }
    }


    if (wpmsget('kau-gmail-access-token', $smtpValue)) {
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
                    
                    <div class="form-group row api-autheication-btn">
                        <div class="col-6" >
                          <a href="' . KauOutlookAuth::getOutlookAuthURL() . '" class="btn kau-api-autheication">
                            <span class="autheication-btn-txt">Authorization</span>
                            <span class="round"><i class="fa fa-chevron-right"></i></span>
                          </a>
                        </div>
 
                    </div>

                    ';
        } else {
            $microsoftAuthSuccess = 'true';
        }
    }
    ?>


        
    <form role="form" name="smtp_settings_form" id="smtp-settings-form" method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=smtp_settings'; ?>" enctype="multipart/form-data">

        <div class=" well smtp-setting-one-content ">

            <div class="form-group row ">
                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('SMTP Activation','wp-mailer-smtp')?></label>
                <div class="col-sm-5">
                    <label class="switch">
                        <input name="smtp-activation" type="checkbox" id="smtp-activation" value="1" <?php
                        $smtpAactivation = (wpmsget('smtp-activation', $smtpValue)) ? 'checked' : false;
                        echo $smtpAactivation;
                        ?>>
                        <span class="slider round"></span>
                    </label> 
                </div>

            </div>


            <div class="form-group row ">
                <label for="fromemail" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('From Email Address','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                <div class="col-sm-5">
                    <input type="email" name="kau-from-email" class="form-control" id="kau-from-email" placeholder="From Email Address" required  value="<?php echo wpmsget('kau-from-email', $smtpValue); ?>">  
                </div>

                <div class="col-sm-4 kau-error-msg" id="kau-alert-msg" > <span class="error text-danger text-center" id="kau-invalid-msg" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> <?php esc_html_e('Email Address invalid','wp-mailer-smtp')?></span> <span class="error text-success text-center" id="kau-valid-msg" style="display:none" > <i class="fa fa-check-circle"></i></i> <?php esc_html_e('WOW! Look great','wp-mailer-smtp')?></span>   <span class="error text-danger text-center" id="kau-from-email-empty" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> <?php esc_html_e('Can not be Empty','wp-mailer-smtp')?></span></div>
            </div>
            <div class="form-group row ">
                <label for="fromname" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('From Name','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="kau-from-name" class="form-control" id="kau-from-name" placeholder="From Name" required  value="<?php echo wpmsget('kau-from-name', $smtpValue); ?>">
                </div>

            </div>


        </div>  <!-- Form Part 1 Close  Here-->
        <div class=" well smtp-setting-one-content ">



            <div class="form-group row col-12 ">

                <label for="mailer option" class="col-3 col-form-label font-weight-bold"><?php esc_html_e('Mailer Option','wp-mailer-smtp')?></label>
                <div class="col-sm-9">

                    <div class="container mailer-type">


                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-gmail" name="mailer-types" value="2" <?php
                            $mailerTypes = (wpmsget('mailer-types', $smtpValue) == "2") ? 'checked' : false;
                            echo $mailerTypes;
                            ?> /> <span class="connection-type-label font-italic font-weight-bold"><?php esc_html_e('Gmail','wp-mailer-smtp')?></span>
                        </label>
                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-microsoft" name="mailer-types" value="3"  <?php
                            $mailerTypes = (wpmsget('mailer-types', $smtpValue) == "3") ? 'checked' : false;
                            echo $mailerTypes;
                            ?> /> <span class="connection-type-label font-italic font-weight-bold"><?php esc_html_e('Microsoft','wp-mailer-smtp')?></span>
                        </label>
                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-mailgun" name="mailer-types" value="5"  <?php
                            $mailerTypes = (wpmsget('mailer-types', $smtpValue) == "5") ? 'checked' : false;
                            echo $mailerTypes;
                            ?> /> <span class="connection-type-label font-italic font-weight-bold"><?php esc_html_e('MailGun','wp-mailer-smtp')?></span>
                        </label>

                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-zohomail" name="mailer-types" value="6"  <?php
                            $mailerTypes = (wpmsget('mailer-types', $smtpValue) == "6") ? 'checked' : false;
                            echo $mailerTypes;
                            ?> /> <span class="connection-type-label font-italic font-weight-bold"><?php esc_html_e('Zoho Mail','wp-mailer-smtp')?></span>
                        </label>

                        <label class="btn btn-default active">
                            <input type="radio" class="redio-color" id="mailer-type-default" name="mailer-types" value="4" <?php
                            $mailerTypes = (wpmsget('mailer-types', $smtpValue) == "4") ? 'checked' : false;
                            echo $mailerTypes;
                            ?>  /> <span class="connection-type-label font-italic font-weight-bold"><?php esc_html_e('Default','wp-mailer-smtp')?></span>
                        </label>
                    </div>



                    <div class="font-italic label-text" id="smtp-settings-label" style="display: none">

                        <?php esc_html_e('SMTP.com is a recommended transactional email service.With a 22 years of track record of reliable email delivery,SMTP.com is premiere solution for Wordpress developers and website owners.SMTP.com has been arround for almost as long as email itself.','wp-mailer-smtp')?>
                    </div>

                    <div class="font-italic label-text" id="gmail-settings-label" style="display: none">

                        <?php esc_html_e('Send emails using your Gmail or G Suite (formerly Google Apps) account, all while keeping your login credentials safe. Other Google SMTP methods require enabling less secure apps in your account and entering your password. However, this integration uses the Google API to improve email delivery issues while keeping your site secure.','wp-mailer-smtp')?>
                    </div>

                    <div class="font-italic label-text" id="smtp-settings-label" style="display: none">

                        <?php esc_html_e('SMTP.com is a recommended transactional email service.With a 22 years of track record of reliable email delivery,SMTP.com is premiere solution for Wordpress developers and website owners.SMTP.com has been arround for almost as long as email itself.','wp-mailer-smtp')?>
                    </div>

                    <div class="font-italic label-text" id="gmail-settings-label" style="display: none">

                        <?php esc_html_e('Send emails using your Gmail or G Suite (formerly Google Apps) account, all while keeping your login credentials safe. Other Google SMTP methods require enabling less secure apps in your account and entering your password. However, this integration uses the Google API to improve email delivery issues while keeping your site secure.','wp-mailer-smtp')?>
                    </div>

                    <div class="font-italic label-text" id="microsoft-settings-label" style="display: none">

                        <?php esc_html_e('In Outlook,click file.Then Navigate to Account Settings>Account Settings.On the Email tab,double-click on the account you want to connect to Hubspot.Below Server Information,you can find your incomeing mail server (IMAP) and outgoing mail server (SMTP) name.','wp-mailer-smtp')?>
                    </div>
                    <div class="font-italic label-text" id="mailgun-settings-label" style="display: none">

                        <?php esc_html_e('mailgun is our recommended transactional email service. Founded in 2012, they serve 80,000+ growing companies around the world and send over 30 million emails each day','wp-mailer-smtp')?>
                    </div>

                    <div class="font-italic label-text" id="zohomail-settings-label" style="display: none">

                        <?php esc_html_e('Ad-free Business Email Hosting with a clean, minimalist interface. Integrated Calendar, Contacts, Notes, Tasks apps. Free for up to 5 users.','wp-mailer-smtp')?>
                    </div>

                    <div class="font-italic label-text" id="default-settings-label" style="display: none">

                        <?php esc_html_e('You currently have the native WordPress option selected. Please select any other Mailer option above to continue the setup.','wp-mailer-smtp')?>
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
                <button type="submit" name="wpms_form_submit" id="wpms_smtp_settings_save" class="btn savebtn" value="wpms_smtp_settings"><i class="fa fa-cog" aria-hidden="true" ></i><b> Save Settings</b></button>
            </div>

            <div class="col-6 float-right text-right">

                <button type="submit" class="btn resetbtn"  name="wpms_form_submit" class="btn savebtn" value="wpms_smtp_reset_settings"><i class="fa fa-cog" aria-hidden="true"></i><b> Reset Settings</b></button>
            </div>

        </div>


</div>


</form> 