 <!-- Mailer option Sendinblue Settings start Here-->    
            <div class="smtp-settings-field" id="sendinblue-settings-id" style="display: none" >

                <div class="form-group row mailer-section-label">
                    <div class="col-md-12 mailerlabel">
                        <div class="p-2 mb-2 bg-primary text-white col-md-2 "><img src="<?php echo KAU_ASSETS_DIR_URI . "/images/sendinblue.png"; ?>" class="gmail-icon"  width="20" height="20"><b>SendinBlue</b></div>
                        <hr class="sendinblue-section-hr">
                    </div>
                </div>



                <div class="settings-content">

                    <div class="form-group row ">

                        <label for="sendinblueAPIKey" class="col-sm-3 col-form-label font-weight-bold">API Key <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" name="kau-sendinblue-api-key" class="form-control" id="kau-sendinblue-api-key"   placeholder="Enter Sendinblue Api Key" value="<?php echo kauget('kau-sendinblue-api-key', $smtpValue); ?>">
                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an api key from Sendinblue: <a href="https://account.sendinblue.com/advanced/api">Get Sendinblue Api Key V3</a></div>
                        </div>

                    </div>

                    

                </div>





            </div>
            <!-- Mailer option Sendinblue Settings Close Here--> 

