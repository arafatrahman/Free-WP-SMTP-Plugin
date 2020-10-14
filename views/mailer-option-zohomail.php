
<?php
$zohoAuthButton = '';
$zohoAuthSuccess = '';
if (KauZohoMail::isKauZohoClientsSaved() && KauZohoMail::isKauZohomailAuthRequired()) {


    $zohoAuthButton = ' 
        
                    <div class="form-group row ">
                        <div class="col-6">
                          <a href="' . KauZohoMail::kauZohoMailAuthUrl() . '" class="authentication-button" >         
                              
                             <i class="fa fa-google" aria-hidden="true"></i><b> Authentication </b>
                                
                           </a>  
                        </div>
                    </div> ';
} else {
    $zohoAuthSuccess = 'true';
}
?>


<!-- Mailer option ZOHO Settings Close Here-->
<div class="smtp-settings-field" id="zohomail-settings-id" style="display: none" >

    <div class="form-group row mailer-section-label">
        <div class="col-md-12 mailerlabel">
            <div class="p-2 mb-2 bg-secondary text-white col-md-2 "><img src="<?php echo KAU_ASSETS_DIR_URI . "/images/zohomail.png"; ?>" class="gmail-icon"  width="20" height="20"><b>ZohoMail</b></div>
            <hr class="zohomail-section-hr">
        </div>
    </div>



    <div class="settings-content">

        <div class="form-group row ">

            <label for="zohomail-client-id" class="col-sm-3 col-form-label font-weight-bold">Client Id<span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="kau-zohomail-client-id" class="form-control" id="kau-zohomail-client-id"   placeholder="Enter Zohomail Client Id" value="<?php echo kauget('kau-zohomail-client-id', $smtpValue); ?>">
                <div class="gmail-client-id-label font-italic label-text">Follow this link to get an client id from zohomail: <a href="https://api-console.zoho.com/">Get Zohomail Client Id</a></div>
            </div>

        </div>

        <div class="form-group row ">

            <label for="zohomail-client-secret" class="col-sm-3 col-form-label font-weight-bold">Client Secret<span class="kau-required">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="kau-zohomail-client-secret" class="form-control" id="kau-zohomail-client-secret"   placeholder="Enter Zohomail Client Secret" value="<?php echo kauget('kau-zohomail-client-secret', $smtpValue); ?>">
                <div class="gmail-client-id-label font-italic label-text">Follow this link to get an client secret from zohomail: <a href="https://api-console.zoho.com/">Get Zohomail Client Secret</a></div>
            </div>

        </div>

        <div class="form-group row ">

            <label for="zohomail-redirect-uri" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"name="zohomail-redirect-uri" id="zohomail-redirect-uri" placeholder="Authorized redirect URI Goes Here" value="<?php echo esc_url_raw(admin_url("admin.php?page=smtp_settings")); ?>" readonly >
                <div class="gmailredirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Zoho Mail application.</div>
            </div>

        </div>



        <div class="form-group row ">

            <label for="zoho-html-allow" class="col-sm-3 col-form-label font-weight-bold">HTML Allow </label>
            <div class="col-sm-6">
                <label class="switch ">
                    <input type="checkbox" name="kau-zoho-html-allow" id="kau-zoho-html-allow" value="true"   <?php
$zohoHtmlAllow = (kauget('kau-zoho-html-allow', $smtpValue)) ? 'checked' : false;
echo $zohoHtmlAllow;
?>  >
                    <span class="slider round "></span>

            </div>


        </div> 

        <div class="form-group row ">

            <label for="zoho-authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization Status</label>
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
