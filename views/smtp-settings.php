<div id="smtp" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">  


<?php 

$smtpValue = self::getSMTP();


$smtpActivation = (isset($smtpValue['smtp-activation']) ? $smtpValue["smtp-activation"] : false);
$fromEmail =(isset($smtpValue["from-email"]) ? $smtpValue["from-email"] : false);
$fromName = (isset($smtpValue['from-name'])? $smtpValue["from-name"] : false);
$mailerType = (isset($smtpValue['mailer-types'])? $smtpValue["mailer-types"] : false);
$gmailClientID = (isset($smtpValue['gmail-client-id'])? $smtpValue["gmail-client-id"] : false);
$gmailClientSecret = (isset($smtpValue['gmail-client-secret'])? $smtpValue["gmail-client-secret"] : false);
$gmailRedirectURI = (isset($smtpValue['gmailredirectURI'])? $smtpValue["gmailredirectURI"] : false);
$gmailAuthorization = (isset($smtpValue['gmail-authorization'])? $smtpValue["gmail-authorization"] : false);
$moSmtpApiKey = (isset($smtpValue['mo-smtp-api-key'])? $smtpValue["mo-smtp-api-key"] : false);
$moSmtpSenderName = (isset($smtpValue['mo-smtp-sender-name'])? $smtpValue["mo-smtp-sender-name"] : false);
$moSmtpRedirectURI = (isset($smtpValue['mo-authorization'])? $smtpValue["mo-smtpredirectURI"] : false);
$moAuthorization = (isset($smtpValue['mo-authorization'])? $smtpValue["mo-authorization"] : false);

$msApiKey = (isset($smtpValue['ms-api-key'])? $smtpValue["ms-api-key"] : false);
$msSenderName = (isset($smtpValue['ms-sender-name'])? $smtpValue["ms-sender-name"] : false);
$authorizationSmtp = (isset($smtpValue['authorization-smtp'])? $smtpValue["authorization-smtp"] : false);
$msRedirectURI = (isset($smtpValue['msredirectURI'])? $smtpValue["msredirectURI"] : false);
$msAuthorization = (isset($smtpValue['ms-authorization'])? $smtpValue["ms-authorization"] : false);

$smtpHost = (isset($smtpValue['smtp-host'])? $smtpValue["smtp-host"] : false);
$smtpHost = (isset($smtpValue['smtp-host'])? $smtpValue["smtp-host"] : false);
$usernameSmtp = (isset($smtpValue['username-smtp'])? $smtpValue["username-smtp"] : false);
$passwordSmtp = (isset($smtpValue['password-smtp'])? $smtpValue["password-smtp"] : false);
$connectionType = (isset($smtpValue['connection-type'])? $smtpValue["connection-type"] : false);
$portSmtp = (isset($smtpValue['port-smtp'])? $smtpValue["port-smtp"] : false);
$sslVerification = (isset($smtpValue['ssl-verification'])? $smtpValue["ssl-verification"] : false);






?>



<form role="form" name="smtp-settings-form" id="smtp-settings-form" method="post" action="" enctype="multipart/form-data">

                        <div class=" well smtp-setting-one-content ">

                            <div class="form-group row ">
                                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">SMTP Activation</label>
                                <div class="col-sm-5">
                                    <label class="switch">
                                        <input name="smtp-activation" type="checkbox" id="smtp-activation" value="1" <?php if($smtpActivation=="1") echo 'checked'; ?>>
                                        <span class="slider round"></span>
                                    </label> 
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label for="fromemail" class="col-sm-3 col-form-label font-weight-bold">From Email Address</label>
                                <div class="col-sm-5">
                                    <input type="email" name="from-email" class="form-control" id="from-email" placeholder="From Email Address" value="<?php echo $fromEmail;  ?>">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="fromname" class="col-sm-3 col-form-label font-weight-bold">From Name</label>
                                <div class="col-sm-5">
                                    <input type="text" name="from-name" class="form-control" id="from-name" placeholder="From Name" value="<?php echo $fromName;  ?>">
                                </div>
                            </div>


                        </div>  <!-- Form Part 1 Close  Here-->
                        <div class=" well smtp-setting-one-content ">
						
						

                            <div class="form-group row col-12 ">

                                <label for="mailer option" class="col-3 col-form-label font-weight-bold">Mailer Option</label>
                                           <div class="col-sm-9">
										   
										<div class="container mailer-type">

											<label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-smtp" name="mailer-types" value="1" <?php if($mailerType =="1") echo 'checked'; ?> /><span class="connection-type-label font-italic font-weight-bold">SMTP</span> 
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-gmail" name="mailer-types" value="2" <?php if($mailerType =="2") echo 'checked'; ?>  /> <span class="connection-type-label font-italic font-weight-bold">Gmail</span>
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-microsoft" name="mailer-types" value="3"  <?php if($mailerType =="3") echo 'checked'; ?> /> <span class="connection-type-label font-italic font-weight-bold">Microsoft</span>
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-default" name="mailer-types" value="4" <?php if($mailerType =="4") echo 'checked'; ?>  /> <span class="connection-type-label font-italic font-weight-bold">Default</span>
											</label>
										</div>

                             

                                    <div class="font-italic label-text" id="smtp-settings-label" style="display: none">

                                        SMTP.com is a recommended transactional email service.With a 22 years of track record of reliable email delivery,SMTP.com is premiere solution for Wordpress developers and website owners.SMTP.com has been arround for almost as long as email itself.
                                    </div>

                                    <div class="font-italic label-text" id="gmail-settings-label" style="display: none">

                                        Send emails using your Gmail or G Suite (formerly Google Apps) account, all while keeping your login credentials safe. Other Google SMTP methods require enabling less secure apps in your account and entering your password. However, this integration uses the Google API to improve email delivery issues while keeping your site secure.
                                    </div>

                                    <div class="font-italic label-text" id="smtp-settings-label" style="display: none">

                                        SMTP.com is a recommended transactional email service.With a 22 years of track record of reliable email delivery,SMTP.com is premiere solution for Wordpress developers and website owners.SMTP.com has been arround for almost as long as email itself.
                                    </div>

                                    <div class="font-italic label-text" id="gmail-settings-label" style="display: none">

                                        Send emails using your Gmail or G Suite (formerly Google Apps) account, all while keeping your login credentials safe. Other Google SMTP methods require enabling less secure apps in your account and entering your password. However, this integration uses the Google API to improve email delivery issues while keeping your site secure.
                                    </div>

                                    <div class="font-italic label-text" id="microsoft-settings-label" style="display: none">

                                        In Outlook,click file.Then Navigate to Account Settings>Account Settings.On the Email tab,double-click on the account you want to connect to Hubspot.Below Server Information,you can find your incomeing mail server (IMAP) and outgoing mail server (SMTP) name.
                                    </div>
                                    <div class="font-italic label-text" id="default-settings-label" style="display: none">

                                        You currently have the native WordPress option selected. Please select any other Mailer option above to continue the setup.
                                    </div>


                                </div>

                            </div>



                            <!-- Mailer option GMAIL Settings start Here-->    
                            <div class="gmail-settings-field" id="gmail-settings-id" style="display: none">

                                <div class="form-group row mailer-section-label">
                                    <div class="col-md-12 mailerlabel">
                                        <div class="p-2 mb-2 gmail-back-color text-white col-md-3 "><b><img src="https://riyadly.com/wp-content/uploads/2020/09/gmail-icon.png" class="gmail-icon"  width="20" height="20">GMAIL Settings</b></div>
                                        <hr class="gmail-section-hr">
                                    </div>
                                </div>

                                <div class="settings-content">

                                    <div class="form-group row ">

                                        <label for="gmailclientid" class="col-sm-3 col-form-label font-weight-bold">Client ID</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="gmail-client-id" id="gmail-client-id" placeholder="Enter Gmail Client ID" value="<?php echo $gmailClientID ;  ?>">
                                            <div class="gmail-client-id-label font-italic label-text ">At registration the client application is assigned a client ID and a client secret (password) by the authorization server</div>
                                        </div>

                                    </div>
                                    <div class="form-group row ">

                                        <label for="gmailclientsecret" class="col-sm-3 col-form-label font-weight-bold">Client Secret</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="gmail-client-secret" id="gmail-client-secret" placeholder="Enter Gmail Client Secret" value="<?php echo $gmailClientSecret ;  ?>">
                                            <div class="gmail-client-secret-label font-italic label-text">At registration the client application is assigned a client ID and a client secret (password) by the authorization server</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="gmailredirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"name="gmailredirectURI" id="gmailredirectURI" placeholder="Authorized redirect URI Goes Here" value="<?php echo $gmailRedirectURI ;  ?>">
                                            <div class="gmailredirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization</label>
                                        <div class="col-sm-4">
                                            <label class="switch">
                                                <input type="checkbox" name="gmail-authorization" id="gmail-authorization" value="1" <?php if($mailerType =="1") echo 'checked'; ?>>
                                                <span class="slider round"></span>

                                            </label>  
                                            <div class="gmail-authorization-label font-italic label-text">You need to save settings with Client ID and Client Secret before you can proceed.</div>
                                        </div>

                                    </div>                                            

                                </div>





                            </div>
                            <!-- Mailer option GMAIL Settings Close Here--> 

                            <!-- Mailer option SMTP.COM Settings start Here-->    
                            <div class="smtp-settings-field " id="smtp-settings-id" style="display: none">


                           


                                <div class="form-group row mailer-section-label">
                                    <div class="col-md-12 mailerlabel">
                                        <div class="p-2 mb-2 bg-success text-white col-md-3 "></span><img src="https://riyadly.com/wp-content/uploads/2020/09/smtpp.png" class="gmail-icon"  width="20" height="20"><b>SMTP.com</b></div>
                                        <hr class="smtp-section-hr">
                                    </div>
                                </div>

                                <div class="settings-content">

                                    <div class="form-group row ">

                                        <label for="smtpapikey" class="col-sm-3 col-form-label font-weight-bold">API Key</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="mo-smtp-api-key" class="form-control" id="mo-smtp-api-key" placeholder="Enter SMTP API Key" value="<?php echo $moSmtpApiKey  ;  ?>">
                                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an API Key from SMTP.com: <a href="https://my.smtp.com/settings/api"></a>Get API Key.</div>
                                        </div>

                                    </div>
                                    <div class="form-group row ">

                                        <label for="smtpsendername" class="col-sm-3 col-form-label font-weight-bold">Sender Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="mo-smtp-sender-name" id="mo-smtp-sender-name" placeholder="Enter SMTP Sender Name" value="<?php echo $moSmtpSenderName  ;  ?>">
                                            <div class="gmail-client-secret-label font-italic label-text">Follow this link to get a Sender Name from SMTP.com: <a href="https://my.smtp.com/senders/">Get Sender Name.</a></div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="smtpredirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="mo-smtpredirectURI" id="mo-smtpredirectURI" placeholder="Enter Gmail Client Secret" value="<?php echo $moSmtpRedirectURI  ;  ?>">
                                            <div class="smtpredirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization</label>
                                        <div class="col-sm-4">
                                            <label class="switch">
                                                <input type="checkbox" name="mo-authorization" id="mo-authorization" value="1"  <?php if($moAuthorization  =="1") echo 'checked'; ?>>
                                                <span class="slider round"></span>

                                            </label>  
                                            <div class="gmail-authorization-label font-italic label-text">You need to save settings with Client ID and Client Secret before you can proceed.</div>
                                        </div>

                                    </div>                                            

                                </div>





                            </div>
                            <!-- Mailer option SMTP.COM Settings Close Here--> 

                            <!-- Mailer option Microsoft Settings start Here-->    
                            <div class="smtp-settings-field" id="microsoft-settings-id" style="display: none" >

                                <div class="form-group row mailer-section-label">
                                    <div class="col-md-12 mailerlabel">
                                        <div class="p-2 mb-2 bg-info text-white col-md-3 "><img src="https://riyadly.com/wp-content/uploads/2020/09/microsoft-icon.png" class="gmail-icon"  width="20" height="20"><b>Microsoft</b></div>
                                        <hr class="microsoft-section-hr">
                                    </div>
                                </div>



                                <div class="settings-content">

                                    <div class="form-group row ">

                                        <label for="smtpapikey" class="col-sm-3 col-form-label font-weight-bold">API Key</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="ms-api-key" class="form-control" id="ms-api-key" placeholder="Enter SMTP API Key" value="<?php echo $msApiKey ;  ?>">
                                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an API Key from SMTP.com: <a href="https://my.smtp.com/settings/api"></a>Get API Key.</div>
                                        </div>

                                    </div>
                                    <div class="form-group row ">

                                        <label for="smtpsendername" class="col-sm-3 col-form-label font-weight-bold">Sender Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="ms-sender-name" class="form-control" id="ms-sender-name" placeholder="Enter SMTP Sender Name"  value="<?php echo $msSenderName ;  ?>">
                                            <div class="gmail-client-secret-label font-italic label-text">Follow this link to get a Sender Name from SMTP.com: <a href="https://my.smtp.com/senders/">Get Sender Name.</a></div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="smtpredirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                                        <div class="col-sm-5">
                                            <input type="text"name="msredirectURI" class="form-control" id="msredirectURI" placeholder="Enter Gmail Client Secret"  value="<?php echo $msRedirectURI ;  ?>">
                                            <div class="smtpredirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization</label>
                                        <div class="col-sm-4">
                                            <label class="switch">
                                                <input type="checkbox" name="ms-authorization" id="ms-authorization" value="1" <?php if($msAuthorization =="1") echo 'checked'; ?>>
                                                <span class="slider round"></span>

                                            </label>  
                                            <div class="gmail-authorization-label font-italic label-text">You need to save settings with Client ID and Client Secret before you can proceed.</div>
                                        </div>

                                    </div>                                            

                                </div>





                            </div>
                            <!-- Mailer option Microsoft Settings Close Here--> 









                        </div>
                        <div class=" well smtp-setting-one-content ">

                            <div class="form-group row ">

                                <label for="smtphost" class="col-sm-3 col-form-label font-weight-bold">SMTP Host/Server</label>
                                <div class="col-sm-5">
                                    <input type="text" name="smtp-host" class="form-control" id="smtp-host" placeholder="smtp.example.com" value="<?php echo $smtpHost ;  ?>">
                                    <div class="smtp-host-label font-italic label-text">The SMTP server which will be used to send email. for example smtp.gmail.com</div>
                                </div>

                            </div>




                            <div class="form-group row ">

                                <label for="smtp-authorization" class="col-sm-3 col-form-label font-weight-bold">SMTP Authorization</label>
                                <div class="col-sm-6">
                                    <label class="switch ">
                                        <input type="checkbox" name="authorization-smtp" id="authorization-smtp" value="1" <?php if($authorizationSmtp=="1") echo 'checked'; ?>  >
                                        <span class="slider round "></span>
                                    </label><div class="smtp-authorization-label font-italic label-text">Use Authentication when sending an email ( recommended: True)</div>
                                </div>


                            </div>



                            <div class="form-group row ">

                                <label for="username-smtp" class="col-sm-3 col-form-label font-weight-bold">SMTP Username</label>
                                <div class="col-sm-5">
                                    <input type="text" name="username-smtp" class="form-control" id="username-smtp" placeholder="Enter Your SMTP Username" value="<?php echo $usernameSmtp ;  ?>">
                                    <div class="username-smtp-label font-italic label-text">Your SMTP username goes here</div>
                                </div>

                            </div>


                            <div class="form-group row ">

                                <label for="password-smtp" class="col-sm-3 col-form-label font-weight-bold">SMTP Password</label>
                                <div class="col-sm-5">
                                    <input type="text" name="password-smtp" class="form-control" id="password-smtp" placeholder="Enter Your SMTP Password" value="<?php echo $passwordSmtp;  ?>">
                                    <div class="password-smtp-label font-italic label-text">You need enter password every time you update the settings for security reason</div>
                                </div>

                            </div>




                            <div class="form-group row ">

                                <label for="connection-type" class="col-sm-3 col-form-label font-weight-bold">Connection Type</label>
                                <div class="col-sm-9">


                                    <div class="btn-group rediobox-btn" >
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-smtp" name="connection-type" value="1" <?php if($connectionType=="1") echo 'checked'; ?> /><span class="connection-type-label font-italic font-weight-bold">None</span> 
                                        </label>
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-gmail" name="connection-type" value="2"  <?php if($connectionType=="2") echo 'checked'; ?> /> <span class="connection-type-label font-italic font-weight-bold">SSL</span>
                                        </label>
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-microsoft" name="connection-type" value="3"  <?php if($connectionType=="3") echo 'checked'; ?>  /> <span class="connection-type-label font-italic font-weight-bold">TSL</span>
                                        </label>

                                    </div>




                                    <div class="gmail-settings-label font-italic label-text" id="gmail-settings-label">

                                        For most servers TLS is the recommended option. If your SMTP provider offers both SSL and TLS options, we recommend using TLS.
                                    </div>





                                </div>

                            </div>



                            <div class="form-group row ">

                                <label for="port-smtp" class="col-sm-3 col-form-label font-weight-bold">SMTP Port</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="port-smtp" id="port-smtp" placeholder="Enter Your SMTP Port" value="<?php echo $portSmtp;  ?>">
                                    <div class="password-smtp-label font-italic label-text">Enter the mail server port.Most mail servers use port 465.</div>
                                </div>

                            </div>


                            <div class="form-group row ">

                                <label for="ssl-verification" class="col-sm-3 col-form-label font-weight-bold">SSL Certificate Verification</label>
                                <div class="col-sm-9">
                               

                                    <label class="switch ">
                                        <input type="checkbox"name="ssl-verification" id="ssl-verification" value="1" <?php if($sslVerification=="1") echo 'checked'; ?> >
                                        <span class="slider round "></span>
                                    </label><div class="ssl-verification-label font-italic label-text">Fix the SSL configurations instead of bypassing it.</div>
                                </div>

                            </div>           


                        </div> 
               

                        <div class="row">
                            <div class="col-6">
                            <input type="hidden" name="smtp-submitted" value="true" />
                           
                            <button type="submit" class="btn savebtn" value="submit"><i class="fa fa-cog" aria-hidden="true" ></i><b> Save Settings</b></button>
                            </div>
                            
                            <div class="col-6 float-right text-right">
                           
                            <button type="submit" class="btn resetbtn"><i class="fa fa-cog" aria-hidden="true" value="Submit"></i><b> Reset Settings</b></button>
                            </div>

                        </div>
            

                    </div>
                    
  
                    </form>                  