<!-- Mailer option mailgun Settings start Here-->    
<div class="smtp-settings-field" id="mailgun-settings-id" style="display: none" >

    <div class="form-group row mailer-section-label">
        <div class="col-md-12 mailerlabel">
            <div class="p-2 mb-2 bg-primary text-white col-md-2 "><img src="<?php echo KAU_ASSETS_DIR_URI . "/images/sendinblue.png"; ?>" class="gmail-icon"  width="20" height="20"><b>MailGun</b></div>
            <hr class="mailgun-section-hr">
        </div>
    </div>



    <div class="settings-content">

        <div class="form-group row ">

            <label for="mailgunAPIKey" class="col-sm-3 col-form-label font-weight-bold">API Key <span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="kau-mailgun-api-key" class="form-control" id="kau-mailgun-api-key"   placeholder="Enter mailgun Api Key" value="<?php echo kauget('kau-mailgun-api-key', $smtpValue); ?>">
                <div class="gmail-client-id-label font-italic label-text">Follow this link to get an api key from Sendinblue: <a href="https://account.sendinblue.com/advanced/api">Get mailgun Api Key V3</a></div>
            </div>

        </div>

        <div class="form-group row ">

            <label for="mailgunAPIurl" class="col-sm-3 col-form-label font-weight-bold">API base URL <span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="kau-mailgun-api-url" class="form-control" id="kau-mailgun-api-url"   placeholder="Enter mailgun API base URL" value="<?php echo kauget('kau-mailgun-api-url', $smtpValue); ?>">
                <div class="gmail-client-id-label font-italic label-text">Follow this link to get an api key from Sendinblue: <a href="https://account.sendinblue.com/advanced/api">Get mailgun API base URL</a></div>
            </div>

        </div>

        <div class="form-group row ">

            <label for="mailgun-html-allow" class="col-sm-3 col-form-label font-weight-bold">HTML Allow </label>
            <div class="col-sm-6">
                <label class="switch ">
                    <input type="checkbox" name="kau-mailgun-html-allow" id="kau-mailgun-html-allow" value="true"   <?php
                    $mailgunHtmlAllow = (kauget('kau-mailgun-html-allow', $smtpValue)) ? 'checked' : false;
                    echo $mailgunHtmlAllow;
                    ?>  >
                    <span class="slider round "></span>

            </div>


        </div> 



    </div>





</div>
<!-- Mailer option MailGun Settings Close Here--> 

