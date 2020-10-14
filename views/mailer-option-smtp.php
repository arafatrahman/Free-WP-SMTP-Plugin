<!-- Mailer option SMTP.COM Settings start Here-->    
            <div class="smtp-settings-field " id="smtp-settings-id" style="display: none">





                <div class="form-group row mailer-section-label">
                    <div class="col-md-12 mailerlabel">
                        <div class="p-2 mb-2 bg-success text-white col-md-2 "></span><img src="<?php echo KAU_ASSETS_DIR_URI . "/images/smtp.png"; ?>" class="gmail-icon"  width="20" height="20"><b>SMTP.com</b></div>
                        <hr class="smtp-section-hr">
                    </div>
                </div>

                <div class="settings-content">

                    <div class="form-group row ">

                        <label for="smtpapikey" class="col-sm-3 col-form-label font-weight-bold">API Key</label>
                        <div class="col-sm-5">
                            <input type="text" name="mo-smtp-api-key" class="form-control" id="mo-smtp-api-key" placeholder="Enter SMTP API Key" value="<?php echo kauget('mo-smtp-api-key', $smtpValue); ?>">
                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an API Key from SMTP.com: <a href="https://my.smtp.com/settings/api">Get API Key.</a></div>
                        </div>

                    </div>
                    <div class="form-group row ">

                        <label for="smtpsendername" class="col-sm-3 col-form-label font-weight-bold">Sender Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="mo-smtp-sender-name" id="mo-smtp-sender-name" placeholder="Enter SMTP Sender Name" value="<?php echo kauget('mo-smtp-sender-name', $smtpValue); ?>">
                            <div class="gmail-client-secret-label font-italic label-text">Follow this link to get a Sender Name from SMTP.com: <a href="https://my.smtp.com/senders/">Get Sender Name.</a></div>
                        </div>

                    </div>

                    <div class="form-group row ">

                        <label for="smtpredirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="mo-smtpredirectURI" id="mo-smtpredirectURI" placeholder="Enter Gmail Client Secret" value="<?php echo kauget('mo-smtpredirectURI', $smtpValue); ?>">
                            <div class="smtpredirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                        </div>

                    </div>

                    <div class="form-group row ">

                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization</label>
                        <div class="col-sm-4">
                            <label class="switch">
                                <input type="checkbox" name="mo-authorization" id="mo-authorization" value="1"  <?php
                                $moAuthorization = (kauget('mo-authorization', $smtpValue)) ? 'checked' : false;
                                echo $moAuthorization;
                                ?>>
                                <span class="slider round"></span>

                            </label>  
                            <div class="gmail-authorization-label font-italic label-text">You need to save settings with Client ID and Client Secret before you can proceed.</div>
                        </div>

                    </div>                                            

                </div>





            </div>
            <!-- Mailer option SMTP.COM Settings Close Here--> 
