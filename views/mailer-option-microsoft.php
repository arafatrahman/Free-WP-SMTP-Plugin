<!-- Mailer option Microsoft Settings start Here-->    
            <div class="smtp-settings-field" id="microsoft-settings-id" style="display: none" >

                <div class="form-group row mailer-section-label">
                    <div class="col-md-12 mailerlabel">
                        <div class="p-2 mb-2 bg-info text-white col-md-2 "><img src="<?php echo KAU_ASSETS_DIR_URI . "/images/microsoft-icon.png"; ?>" class="gmail-icon"  width="20" height="20"><b>Microsoft</b></div>
                        <hr class="microsoft-section-hr">
                    </div>
                </div>



                <div class="settings-content">

                    <div class="form-group row ">

                        <label for="msClientID" class="col-sm-3 col-form-label font-weight-bold">Client ID <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" name="ms-client-id" class="form-control" id="ms-client-id"   placeholder="Enter Microsoft Client ID" value="<?php echo kauget('ms-client-id', $smtpValue); ?>">
                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an Client ID from Microsoft: <a href="https://www.inkoop.io/blog/how-to-get-azure-api-credentials/">Get Client ID.</a></div>
                        </div>

                    </div>

                    <div class="form-group row ">

                        <label for="msClientSecret" class="col-sm-3 col-form-label font-weight-bold">Client Secret <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" name="ms-client-secret" class="form-control" id="ms-client-secret"   placeholder="Enter Microsoft Client Secret" value="<?php echo kauget('ms-client-secret', $smtpValue); ?>">
                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an Client Secret from Microsoft: <a href="https://www.inkoop.io/blog/how-to-get-azure-api-credentials/">Get Client Secret.</a></div>
                        </div>

                    </div>


                    <div class="form-group row ">

                        <label for="msredirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                        <div class="col-sm-5">
                            <input type="text"name="ms-redirect-uri" class="form-control" id="ms-redirect-uri" placeholder="Enter Gmail Client Secret"  value="<?php echo esc_url_raw(admin_url("admin.php")); ?>" readonly>
                            <div class="msredirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Microsoft web application.</div>
                        </div>

                    </div>

                    <div class="form-group row ">

                        <label for="ms-authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization Status</label>
                        <div class="col-sm-4">
                            <label class="switch">
                                <input type="checkbox" name="ms-authorization" id="ms-authorization" value="1"  <?php if ($microsoftAuthSuccess == "true") echo 'checked'; ?>  onclick="return false">
                                <span class="slider round"></span>

                            </label>  
                            <div class="ms-authorization-label font-italic label-text">You need to save settings with Client ID and Client Secret before you can proceed.</div>
                        </div>

                    </div>  


                    <?php echo $microsoftOutlookAuthUrl; ?>

                </div>





            </div>
            <!-- Mailer option Microsoft Settings Close Here--> 