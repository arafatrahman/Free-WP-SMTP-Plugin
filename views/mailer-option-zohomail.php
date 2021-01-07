
<?php
$zohoAuthButton = '';
$zohoAuthSuccess = '';
if (KauZohoMail::isKauZohoClientsSaved() && KauZohoMail::isKauZohomailAuthRequired()) {


    $zohoAuthButton = ' 
                    
                    <div class="form-group row api-autheication-btn">
                        <div class="col-6" >
                          <a href="' . KauZohoMail::kauZohoMailAuthUrl() . '" class="btn kau-api-autheication">
                            <span class="autheication-btn-txt">Authorization</span>
                            <span class="round"><i class="fa fa-chevron-right"></i></span>
                          </a>
                        </div>
 
                    </div>';

                   
}
$smtpValue = Setting::getSMTP();
if (wpmsget('kau-zohoMail-access-token', $smtpValue)) {
        $zohoAuthSuccess = 'true';
        $zohoAuthButton = '';
    }
?>


<!-- Mailer option ZOHO Settings Close Here-->
<div class="smtp-settings-field" id="zohomail-settings-id" style="display: none" >

    <div class="form-group row mailer-section-label">
        <div class="col-md-12 mailerlabel">
            <div class="p-2 mb-2 text-white col-md-2 " style="background-color: #F0453C"><img src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/zohomail.png"); ?>" class="gmail-icon"  width="20" height="20"><b><?php esc_html_e('ZohoMail','wp-mailer-smtp')?></b></div>
            <hr class="zohomail-section-hr">
        </div>
    </div>



    <div class="settings-content">


        <div class="form-group row ">
            <label for="zohomail-domain-extensions" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Domain Extensions','wp-mailer-smtp')?><span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <select class="form-control" id="zohomail-domain-extensions"  name="zohomail-domain-extensions" id="cars">
                    <option <?php if (wpmsget('zohomail-domain-extensions', $smtpValue) == ".com") echo 'selected="selected"'; ?> value=".com" ><?php esc_html_e('.com','wp-mailer-smtp')?></option>
                    <option <?php if (wpmsget('zohomail-domain-extensions', $smtpValue) == ".eu") echo 'selected="selected"'; ?> value=".eu"><?php esc_html_e('.eu','wp-mailer-smtp')?></option>
                    <option <?php if (wpmsget('zohomail-domain-extensions', $smtpValue) == ".in") echo 'selected="selected"'; ?> value=".in"><?php esc_html_e('.in','wp-mailer-smtp')?></option>
                    <option <?php if (wpmsget('zohomail-domain-extensions', $smtpValue) == ".com.cn") echo 'selected="selected"'; ?> value=".com.cn"><?php esc_html_e('.com.cn','wp-mailer-smtp')?></option>
                    <option <?php if (wpmsget('zohomail-domain-extensions', $smtpValue) == ".com.eu") echo 'selected="selected"'; ?> value=".com.eu">.<?php esc_html_e('com.eu','wp-mailer-smtp')?></option>
                </select>
            </div>
        </div>

        <div class="form-group row ">

            <label for="zohomail-client-id" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Client Id','wp-mailer-smtp')?><span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="kau-zohomail-client-id" class="form-control" id="kau-zohomail-client-id"   placeholder="Enter Zohomail Client Id" value="<?php echo esc_html(wpmsget('kau-zohomail-client-id', $smtpValue)); ?>">
                <div class="gmail-client-id-label font-italic label-text"><?php esc_html_e('Follow this link to get an client id from zohomail: ','wp-mailer-smtp')?><a href="https://api-console.zoho.com/"><?php esc_html_e('Get Zohomail Client Id','wp-mailer-smtp')?></a></div>
            </div>

        </div>

        <div class="form-group row ">

            <label for="zohomail-client-secret" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Client Secret','wp-mailer-smtp')?><span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <input type="password" name="kau-zohomail-client-secret" class="form-control" id="kau-zohomail-client-secret"   placeholder="Enter Zohomail Client Secret" value="<?php echo esc_html(wpmsget('kau-zohomail-client-secret', $smtpValue)); ?>">
                <div class="gmail-client-id-label font-italic label-text"><?php esc_html_e('Follow this link to get an client secret from zohomail:','wp-mailer-smtp')?> <a href="https://api-console.zoho.com/"><?php esc_html_e('Get Zohomail Client Secret','wp-mailer-smtp')?></a></div>
            </div>

        </div>

        <div class="form-group row ">

            <label for="zohomail-redirect-uri" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Authorized redirect URI','wp-mailer-smtp')?></label>
            <div class="col-sm-5">
                <input type="text" class="form-control"name="zohomail-redirect-uri" id="zohomail-redirect-uri" placeholder="Authorized redirect URI Goes Here" value="<?php echo esc_url_raw(admin_url("admin.php")); ?>" readonly >
                <div class="gmailredirectURI-label font-italic label-text"><?php esc_html_e('Please copy this URL into the Authorized redirect URIs field of your Zoho Mail application.','wp-mailer-smtp')?></div>
            </div>

        </div>



        <div class="form-group row ">

            <label for="zoho-html-allow" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('HTML Allow','wp-mailer-smtp')?> </label>
            <div class="col-sm-6">
                <label class="switch ">
                    <input type="checkbox" name="kau-zoho-html-allow" id="kau-zoho-html-allow" value="true"   <?php
                    $zohoHtmlAllow = (wpmsget('kau-zoho-html-allow', $smtpValue)) ? 'checked' : false;
                    echo $zohoHtmlAllow;
                    ?>  >
                    <span class="slider round "></span>

            </div>


        </div> 

        <div class="form-group row ">

            <label for="zoho-authorization" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Authorization Status','wp-mailer-smtp')?></label>
            <div class="col-sm-4">
                <label class="switch">
                    <input type="checkbox" name="zoho-authorization-status" id="zoho-authorization-status" value="1"  <?php if ($zohoAuthSuccess == "true") echo 'checked'; ?>  onclick="return false">
                    <span class="slider round"></span>

                </label>  

            </div>

        </div>


        <?php echo $zohoAuthButton ?>



    </div>





</div>            
<!-- Mailer option ZOHO Settings Close Here-->
