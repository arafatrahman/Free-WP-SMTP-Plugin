<!-- Mailer option GMAIL Settings start Here-->    
            <div class="gmail-settings-field" id="gmail-settings-id" style="display: none">

                <div class="form-group row mailer-section-label">
                    <div class="col-md-12 mailerlabel">
                        <div class="p-2 mb-2 gmail-back-color text-white col-md-3 "><b><img src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/gmail-icon.png"); ?>" class="gmail-icon"  width="20" height="20"><?php esc_html_e('GMAIL Settings','wp-mailer-smtp')?></b></div>
                        <hr class="gmail-section-hr">
                    </div>
                </div>

                <div class="settings-content">

                    <div class="form-group row ">

                        <label for="gmailclientid" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Client ID','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="gmail-client-id" id="gmail-client-id" placeholder="Enter Gmail Client ID" value="<?php echo esc_html(wpmsget('gmail-client-id', $smtpValue)); ?>">
                            <div class="gmail-client-id-label font-italic label-text "><?php esc_html_e('At registration the client application is assigned a','wp-mailer-smtp')?> <a target="_blank" href="https://console.developers.google.com/apis/credentials"><?php esc_html_e('Client ID','wp-mailer-smtp')?></a><?php esc_html_e('and a client secret (password) by the authorization server ','wp-mailer-smtp')?></div>
                        </div>

                    </div>
                    <div class="form-group row ">

                        <label for="gmailclientsecret" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Client Secret','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="gmail-client-secret" id="gmail-client-secret" placeholder="Enter Gmail Client Secret"   value="<?php echo wpmsget('gmail-client-secret', $smtpValue); ?>">
                            <div class="gmail-client-secret-label font-italic label-text"><?php esc_html_e('At registration the client application is assigned a client ID and a ','wp-mailer-smtp')?><a target="_blank" href="https://console.developers.google.com/apis/credentials"><?php esc_html_e('Client secret','wp-mailer-smtp')?></a><?php esc_html_e('(password) by the authorization server ','wp-mailer-smtp')?></div>
                        </div>

                    </div>

                    <div class="form-group row ">

                        <label for="gmailredirectURI" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Authorized redirect URI','wp-mailer-smtp')?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"name="gmailredirectURI" id="gmailredirectURI" placeholder="Authorized redirect URI Goes Here" value="<?php echo esc_url_raw(admin_url("admin.php?page=smtp_settings")); ?>" readonly >
                            <div class="gmailredirectURI-label font-italic label-text"><?php esc_html_e('Please copy this URL into the Authorized redirect URIs field of your Google web application.','wp-mailer-smtp')?></div>
                        </div>

                    </div>

                    <div class="form-group row ">

                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Authorization Status','wp-mailer-smtp')?></label>
                        <div class="col-sm-4">
                            <label class="switch">
                                <input type="checkbox" name="gmail-authorization" id="gmail-authorization" value="1" <?php if ($gmailAuthSuccess == "true") echo 'checked'; ?> onclick="return false">
                                <span class="slider round"></span>

                            </label>  

                        </div>

                    </div>       

                    <?php echo $authenticationButton ?>

                </div>





            </div>
<!-- Mailer option GMAIL Settings Close Here--> 
