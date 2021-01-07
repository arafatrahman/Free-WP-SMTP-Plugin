<!-- Mailer option mailgun Settings start Here-->    
<div class="smtp-settings-field" id="mailgun-settings-id" style="display: none" >

    <div class="form-group row mailer-section-label">
        <div class="col-md-12 mailerlabel">
            <div class="p-2 mb-2  text-white col-md-2 " style="background-color: #B11718"><img src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/mailgun.png"); ?>" class="gmail-icon"  width="20" height="20"><b><?php esc_html_e('MailGun','wp-mailer-smtp')?></b></div>
            <hr class="mailgun-section-hr">
        </div>
    </div>



    <div class="settings-content">

        <div class="form-group row ">

            <label for="mailgunAPIKey" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('API Key','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <input type="password" name="kau-mailgun-api-key" class="form-control" id="kau-mailgun-api-key"   placeholder="Enter mailgun Api Key" value="<?php echo esc_html(wpmsget('kau-mailgun-api-key', $smtpValue)); ?>">
                <div class="gmail-client-id-label font-italic label-text"><?php esc_html_e('Follow this link to get an api key from Mailgun:','wp-mailer-smtp')?> <a href="https://login.mailgun.com/login/"><?php esc_html_e('Get mailgun Api Key V3','wp-mailer-smtp')?></a></div>
            </div>

        </div>

        <div class="form-group row ">

            <label for="mailgunAPIurl" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('API base URL ','wp-mailer-smtp')?><span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="kau-mailgun-api-url" class="form-control" id="kau-mailgun-api-url"   placeholder="Enter mailgun API base URL" value="<?php echo esc_html(wpmsget('kau-mailgun-api-url', $smtpValue)); ?>">
                <div class="gmail-client-id-label font-italic label-text"><?php esc_html_e('Follow this link to get an api base url Mailgun:','wp-mailer-smtp')?> <a href="https://login.mailgun.com/login/"><?php esc_html_e('Get mailgun API base URL','wp-mailer-smtp')?></a></div>
            </div>

        </div>

        <div class="form-group row ">

            <label for="mailgun-html-allow" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('HTML Allow','wp-mailer-smtp')?> </label>
            <div class="col-sm-6">
                <label class="switch ">
                    <input type="checkbox" name="kau-mailgun-html-allow" id="kau-mailgun-html-allow" value="true"   <?php
                    $mailgunHtmlAllow = (wpmsget('kau-mailgun-html-allow', $smtpValue)) ? 'checked' : false;
                    echo $mailgunHtmlAllow;
                    ?>  >
                    <span class="slider round "></span>

            </div>


        </div> 



    </div>





</div>
<!-- Mailer option MailGun Settings Close Here--> 

