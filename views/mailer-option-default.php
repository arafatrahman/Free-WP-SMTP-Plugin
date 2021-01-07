<div class="smtp-settings-field" id="default-settings-id" style="display: none" >

                <div class="form-group row mailer-section-label">
                    <div class="col-md-12 mailerlabel">
                        <div class="p-2 mb-2 bg-warning text-white col-md-3 "><b><?php esc_html_e('Default Settings','wp-mailer-smtp') ?></b></div>
                        <hr class="default-section-hr">
                    </div>
                </div>


                <div class="row ">
                    <div class="smtp-instaction col-sm-3"> 
                        <div class="card">
                            <div class="text-center">
                                <p><img class=" img-fluid" src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/google-icon.png"); ?>" alt="card image"></p>
                                <h5 class="card-title"><b><?php esc_html_e('Gmail settings','wp-mailer-smtp')?></b></h5>
                                <p class="card-text font-italic align-middle"><?php esc_html_e('Host: smtp.gmail.com
                                    Type of Encryption: SSL
                                    SMTP Port: 465
                                    Authentication: Yes','wp-mailer-smtp')?></p>

                            </div>
                        </div>
                    </div>
                    <div class="smtp-instaction col-sm-3"> 
                        <div class="card">
                            <div class="text-center">
                                <p><img class=" img-fluid" src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/yahoo-icon.png"); ?>" alt="card image"></p>
                                <h5 class="card-title"><b><?php esc_html_e('Yahoo settings','wp-mailer-smtp')?></b></h5>
                                <p class="card-text font-italic align-middle"><?php esc_html_e('Host:smtp.mail.yahoo.com
                                    Type of Encryption: SSL
                                    SMTP Port: 465
                                    Authentication: Yes','wp-mailer-smtp')?></p>

                            </div>
                        </div>
                    </div>
                    <div class="smtp-instaction col-sm-3"> 
                        <div class="card">
                            <div class="text-center">
                                <p><img class=" img-fluid" src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/microsoft-icon-outlook.png"); ?>" alt="card image"></p>
                                <h5 class="card-title"><b><?php esc_html_e('Office 365','wp-mailer-smtp')?></b></h5>
                                <p class="card-text font-italic align-middle"><?php esc_html_e('Host: smtp.office365.com
                                    Type of Encryption: TLS
                                    SMTP Port: 587
                                    Authentication: Yes','wp-mailer-smtp')?></p>

                            </div>
                        </div>
                    </div>
                    <div class="smtp-instaction col-sm-3"> 
                        <div class="card">
                            <div class="text-center">
                                <p><img class=" img-fluid" src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/hotmail-icon.png"); ?>" alt="card image"></p>
                                <h5 class="card-title"><b><?php esc_html_e('Hotmail','wp-mailer-smtp')?></b></h5>
                                <p class="card-text font-italic align-middle"> <?php esc_html_e('Host: smtp.live.com
                                    Type of Encryption: SSL
                                    SMTP Port: 465
                                    SMTP Authentication: Yes','wp-mailer-smtp')?></p>

                            </div>
                        </div>
                    </div>

                </div>




                <div class="settings-content">

                    <div class="form-group row ">

                        <label for="smtphost" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('SMTP Host/Server','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" name="kau-smtp-host" class="form-control" id="kau-smtp-host" placeholder="smtp.example.com"   value="<?php echo esc_html(wpmsget('kau-smtp-host', $smtpValue)); ?>">
                            <div class="smtp-host-label font-italic label-text"><?php esc_html_e('The SMTP server which will be used to send email. for example smtp.gmail.com','wp-mailer-smtp')?></div>
                        </div>
                        <div class="col-sm-4 kau-error-msg" id="kau-alert-msg" > <span class="error text-danger text-center" id="kau-smtp-empty-host" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> <?php esc_html_e('Host Can not be Empty','wp-mailer-smtp')?> </span></div>
                    </div>




                    <div class="form-group row ">

                        <label for="smtp-authorization" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('SMTP Authorization','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                        <div class="col-sm-6">
                            <label class="switch ">
                                <input type="checkbox" name="kau-smtp-authorization-smtp" id="kau-smtp-authorization-smtp"  value="true"   <?php
                                $authorizationSmtp = (wpmsget('kau-smtp-authorization-smtp', $smtpValue)) ? 'checked' : false;
                                echo $authorizationSmtp;
                                ?>  >
                                <span class="slider round "></span>
                            </label><div class="smtp-authorization-label font-italic label-text"><?php esc_html_e('Use Authentication when sending an email ( recommended: True)','wp-mailer-smtp')?></div>
                        </div>


                    </div>



                    <div class="form-group row ">

                        <label for="username-smtp" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('SMTP Username','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="email" name="kau-username-smtp" class="form-control" id="kau-username-smtp"   placeholder="Enter Your SMTP Username" value="<?php echo esc_html(wpmsget('kau-username-smtp', $smtpValue)); ?>">
                            <div class="username-smtp-label font-italic label-text"><?php esc_html_e('Your SMTP username goes here','wp-mailer-smtp')?></div>
                        </div>
                        <div class="col-sm-4 kau-error-msg" id="kau-alert-msg" > <span class="error text-danger text-center" id="kau-invalid-email" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> <?php esc_html_e('Email Address invalid','wp-mailer-smtp')?></span> <span class="error text-success text-center" id="kau-valid-email" style="display:none" > <i class="fa fa-check-circle"></i></i> <?php esc_html_e('WOW! Look great','wp-mailer-smtp')?></span></div>  
                    </div>


                    <div class="form-group row ">

                        <label for="password-smtp" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('SMTP Password','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="password" name="kau-password-smtp" class="form-control" id="kau-password-smtp" placeholder="Enter Your SMTP Password"   value="<?php echo esc_html(wpmsget('kau-password-smtp', $smtpValue)); ?>">
                            <div class="password-smtp-label font-italic label-text"><?php esc_html_e('You need enter password every time you update the settings for security reason','wp-mailer-smtp')?></div>
                        </div>

                    </div>




                    <div class="form-group row ">

                        <label for="connection-type" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Type of Encryption','wp-mailer-smtp')?></label>
                        <div class="col-sm-9">


                            <div class="btn-group rediobox-btn" >
                                <label class="btn btn-default active">
                                    <input type="radio" class="redio-color" id="kau-encryption-type-none" name="kau-encryption-type" value="none"  <?php
                                    $connectionType = (wpmsget('kau-encryption-type', $smtpValue) == "none") ? 'checked' : false;
                                    echo $connectionType;
                                    ?> /><span class="connection-type-label font-italic font-weight-bold"><?php esc_html_e('None','wp-mailer-smtp')?></span> 
                                </label>
                                <label class="btn btn-default active">
                                    <input type="radio" class="redio-color" id="kau-encryption-type-ssl" name="kau-encryption-type" value="ssl"   <?php
                                    $connectionType = (wpmsget('kau-encryption-type', $smtpValue) == "ssl") ? 'checked' : false;
                                    echo $connectionType;
                                    ?> /> <span class="connection-type-label font-italic font-weight-bold"><?php esc_html_e('SSL','wp-mailer-smtp')?></span>
                                </label>
                                <label class="btn btn-default active">
                                    <input type="radio" class="redio-color" id="kau-encryption-type-tsl" name="kau-encryption-type" value="tsl"   <?php
                                    $connectionType = (wpmsget('kau-encryption-type', $smtpValue) == "tsl") ? 'checked' : false;
                                    echo $connectionType;
                                    ?>  /> <span class="connection-type-label font-italic font-weight-bold"><?php esc_html_e('TSL','wp-mailer-smtp')?></span>
                                </label>

                            </div>




                            <div class="gmail-settings-label font-italic label-text" id="gmail-settings-label">

                                <?php esc_html_e('For most servers TLS is the recommended option. If your SMTP provider offers both SSL and TLS options, we recommend using TLS.','wp-mailer-smtp')?>
                            </div>





                        </div>

                    </div>



                    <div class="form-group row ">

                        <label for="port-smtp" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('SMTP Port','wp-mailer-smtp')?> <span class="kau-required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="kau-port-smtp" id="kau-port-smtp"   placeholder="Enter Your SMTP Port" value="<?php echo esc_html(wpmsget('kau-port-smtp', $smtpValue)); ?>">
                            <div class="password-smtp-label font-italic label-text"><?php esc_html_e('Enter the mail server port.Most mail servers use port 465.','wp-mailer-smtp')?></div>
                        </div>

                    </div>             

                    <div class="form-group row ">

                        <label for="smtp-authorization" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('HTML Allow','wp-mailer-smtp')?> </label>
                        <div class="col-sm-6">
                            <label class="switch ">
                                <input type="checkbox" name="kau-smtp-html-allow" id="kau-smtp-html-allow" value="true"   <?php
                                $authorizationSmtp = (wpmsget('kau-smtp-html-allow', $smtpValue)) ? 'checked' : false;
                                echo $authorizationSmtp;
                                ?>  >
                                <span class="slider round "></span>

                        </div>


                    </div>       


                </div>





            </div>
