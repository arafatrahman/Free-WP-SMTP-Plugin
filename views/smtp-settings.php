<div id="smtp" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 <?php if(kauget('kau_form_submit',$_POST) == "kau_smtp_settings"){ echo "show active";}?> <?php if(kauget('kau_form_submit',$_POST) == "kau_smtp_reset_settings") echo "show active"?> <?php if(kauget('kau_form_submit',$_POST) == ""){ echo "show active";}?>">  


<?php 

$smtpValue = self::getSMTP();



$authenticationButton = '';

$kauGmailClientID = kauget('gmail-client-id',$smtpValue);
$kauGmailClientSecret = kauget('gmail-client-secret',$smtpValue);
$gmailAuthSuccess = '';

if(KauAuthExtends::isKauGmailClientsSaved()){ 
    
    if(KauAuthExtends::isKauGmailAuthRequired()){
      $authenticationButton  = ' 
        
                    <div class="form-group row ">
                        <div class="col-6">
                          <a href="'.KauGmailAuth2::getGmailClient()->createAuthUrl().'" class="authentication-button" >         
                              
                             <i class="fa fa-google" aria-hidden="true"></i><b> Authentication </b>
                                
                           </a>  
                        </div>
                    </div> ';  
    }
    
 
 
}


if(kauget('kau-gmail-access-token',$smtpValue)){
    $gmailAuthSuccess = 'true';
    $authenticationButton = '';
}
$microsoftOutlookAuthUrl = '';
$microsoftAuthSuccess  = 'false';
if(KauOutlookAuth::isKauMicrosoftClientsSaved()){
if(KauOutlookAuth::isKauMicrosoftAuthRequired()){
$microsoftOutlookAuthUrl  = ' 
        
                    <div class="form-group row ">
                        <div class="col-6">
                          <a href="'.KauOutlookAuth::getOutlookAuthURL().'" class="authentication-button" >         
                              
                             <i class="fa fa-microsoft" aria-hidden="true"></i><b> Outlook Auth </b>
                                
                           </a>  
                        </div>
                    </div> '; 
}
else{
    $microsoftAuthSuccess = 'true';
}
}



?>



<form role="form" name="smtp_settings_form" id="smtp-settings-form" method="post" action="" enctype="multipart/form-data">

                        <div class=" well smtp-setting-one-content ">

                            <div class="form-group row ">
                                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">SMTP Activation</label>
                                <div class="col-sm-5">
                                    <label class="switch">
                                        <input name="smtp-activation" type="checkbox" id="smtp-activation" value="1" <?php  $smtpAactivation  = (kauget('smtp-activation',$smtpValue))? 'checked' : false ; echo $smtpAactivation; ?>>
                                        <span class="slider round"></span>
                                    </label> 
                                </div>
                                
                            </div>


                            <div class="form-group row ">
                                <label for="fromemail" class="col-sm-3 col-form-label font-weight-bold">From Email Address <span class="kau-required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="email" name="kau-from-email" class="form-control" id="kau-from-email" placeholder="From Email Address" required  value="<?php echo kauget('kau-from-email',$smtpValue);  ?>">  
                                </div>

                                <div class="col-sm-4 kau-error-msg" id="kau-alert-msg" > <span class="error text-danger text-center" id="kau-invalid-msg" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> Email Address invalid</span> <span class="error text-success text-center" id="kau-valid-msg" style="display:none" > <i class="fa fa-check-circle"></i></i> WOW! Look great</span>   <span class="error text-danger text-center" id="kau-from-email-empty" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> Can't be Empty</span></div>
                            </div>
                            <div class="form-group row ">
                                <label for="fromname" class="col-sm-3 col-form-label font-weight-bold">From Name <span class="kau-required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="kau-from-name" class="form-control" id="kau-from-name" placeholder="From Name" required  value="<?php echo kauget('kau-from-name',$smtpValue); ?>">
                                </div>
                              
                            </div>


                        </div>  <!-- Form Part 1 Close  Here-->
                        <div class=" well smtp-setting-one-content ">
						
						

                            <div class="form-group row col-12 ">

                                <label for="mailer option" class="col-3 col-form-label font-weight-bold">Mailer Option</label>
                                           <div class="col-sm-9">
										   
										<div class="container mailer-type">

											<label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-smtp" name="mailer-types" value="1" <?php  $mailerTypes  = (kauget('mailer-types',$smtpValue) == "1")? 'checked' : false ; echo $mailerTypes; ?> /><span class="connection-type-label font-italic font-weight-bold">SMTP</span> 
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-gmail" name="mailer-types" value="2" <?php  $mailerTypes  = (kauget('mailer-types',$smtpValue) == "2")? 'checked' : false ; echo $mailerTypes; ?> /> <span class="connection-type-label font-italic font-weight-bold">Gmail</span>
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-microsoft" name="mailer-types" value="3"  <?php  $mailerTypes  = (kauget('mailer-types',$smtpValue) == "3")? 'checked' : false ; echo $mailerTypes; ?> /> <span class="connection-type-label font-italic font-weight-bold">Microsoft</span>
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-default" name="mailer-types" value="4" <?php  $mailerTypes  = (kauget('mailer-types',$smtpValue) == "4")? 'checked' : false ; echo $mailerTypes; ?>  /> <span class="connection-type-label font-italic font-weight-bold">Default</span>
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

                                        <label for="gmailclientid" class="col-sm-3 col-form-label font-weight-bold">Client ID <span class="kau-required">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="gmail-client-id" id="gmail-client-id" placeholder="Enter Gmail Client ID" value="<?php echo  kauget('gmail-client-id',$smtpValue);   ?>">
                                            <div class="gmail-client-id-label font-italic label-text ">At registration the client application is assigned a <a target="_blank" href="https://console.developers.google.com/apis/credentials">Client ID</a> and a client secret (password) by the authorization server </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row ">

                                        <label for="gmailclientsecret" class="col-sm-3 col-form-label font-weight-bold">Client Secret <span class="kau-required">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="gmail-client-secret" id="gmail-client-secret" placeholder="Enter Gmail Client Secret"   value="<?php echo kauget('gmail-client-secret',$smtpValue) ;  ?>">
                                            <div class="gmail-client-secret-label font-italic label-text">At registration the client application is assigned a client ID and a <a target="_blank" href="https://console.developers.google.com/apis/credentials">Client secret</a> (password) by the authorization server </div>
                                        </div>
                                       
                                    </div>

                                    <div class="form-group row ">

                                        <label for="gmailredirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control"name="gmailredirectURI" id="gmailredirectURI" placeholder="Authorized redirect URI Goes Here" value="<?php echo esc_url_raw(admin_url("admin.php?page=smtp_settings")); ?>" readonly >
                                            <div class="gmailredirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization Status</label>
                                        <div class="col-sm-4">
                                            <label class="switch">
                                                <input type="checkbox" name="gmail-authorization" id="gmail-authorization" value="1" <?php if( $gmailAuthSuccess == "true" ) echo 'checked' ; ?> onclick="return false">
                                                <span class="slider round"></span>

                                            </label>  
                                            
                                        </div>

                                    </div>       
                                    
                                    <?php echo $authenticationButton ?>

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
                                            <input type="text" name="mo-smtp-api-key" class="form-control" id="mo-smtp-api-key" placeholder="Enter SMTP API Key" value="<?php echo  kauget('mo-smtp-api-key',$smtpValue)   ;  ?>">
                                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an API Key from SMTP.com: <a href="https://my.smtp.com/settings/api">Get API Key.</a></div>
                                        </div>

                                    </div>
                                    <div class="form-group row ">

                                        <label for="smtpsendername" class="col-sm-3 col-form-label font-weight-bold">Sender Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="mo-smtp-sender-name" id="mo-smtp-sender-name" placeholder="Enter SMTP Sender Name" value="<?php echo kauget('mo-smtp-sender-name',$smtpValue)    ;  ?>">
                                            <div class="gmail-client-secret-label font-italic label-text">Follow this link to get a Sender Name from SMTP.com: <a href="https://my.smtp.com/senders/">Get Sender Name.</a></div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="smtpredirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="mo-smtpredirectURI" id="mo-smtpredirectURI" placeholder="Enter Gmail Client Secret" value="<?php echo kauget('mo-smtpredirectURI',$smtpValue);  ?>">
                                            <div class="smtpredirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization</label>
                                        <div class="col-sm-4">
                                            <label class="switch">
                                                <input type="checkbox" name="mo-authorization" id="mo-authorization" value="1"  <?php  $moAuthorization  = (kauget('mo-authorization',$smtpValue))? 'checked' : false ; echo $moAuthorization; ?>>
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

                                        <label for="msClientID" class="col-sm-3 col-form-label font-weight-bold">Client ID <span class="kau-required">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="ms-client-id" class="form-control" id="ms-client-id"   placeholder="Enter Microsoft Client ID" value="<?php echo kauget('ms-client-id',$smtpValue);  ?>">
                                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an Client ID from Microsoft: <a href="https://www.inkoop.io/blog/how-to-get-azure-api-credentials/">Get Client ID.</a></div>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group row ">

                                        <label for="msClientSecret" class="col-sm-3 col-form-label font-weight-bold">Client Secret <span class="kau-required">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="text" name="ms-client-secret" class="form-control" id="ms-client-secret"   placeholder="Enter Microsoft Client Secret" value="<?php echo kauget('ms-client-secret',$smtpValue);  ?>">
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
                                                <input type="checkbox" name="ms-authorization" id="ms-authorization" value="1"  <?php if( $microsoftAuthSuccess == "true" ) echo 'checked' ; ?>  onclick="return false">
                                                <span class="slider round"></span>

                                            </label>  
                                            <div class="ms-authorization-label font-italic label-text">You need to save settings with Client ID and Client Secret before you can proceed.</div>
                                        </div>

                                    </div>  
                                    
                                    
                                    <?php echo $microsoftOutlookAuthUrl; ?>

                                </div>





                            </div>
                            <!-- Mailer option Microsoft Settings Close Here--> 
                            <div class="smtp-settings-field" id="default-settings-id" style="display: none" >

                                <div class="form-group row mailer-section-label">
                                    <div class="col-md-12 mailerlabel">
                                        <div class="p-2 mb-2 bg-warning text-white col-md-3 "><b>Default Settings</b></div>
                                        <hr class="default-section-hr">
                                    </div>
                                </div>



                                <div class="settings-content">

                                    <div class="form-group row ">

                                <label for="smtphost" class="col-sm-3 col-form-label font-weight-bold">SMTP Host/Server <span class="kau-required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="kau-smtp-host" class="form-control" id="kau-smtp-host" placeholder="smtp.example.com"   value="<?php echo kauget('kau-smtp-host',$smtpValue); ?>">
                                    <div class="smtp-host-label font-italic label-text">The SMTP server which will be used to send email. for example smtp.gmail.com</div>
                                </div>
                                <div class="col-sm-4 kau-error-msg" id="kau-alert-msg" > <span class="error text-danger text-center" id="kau-smtp-empty-host" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> Host Can't be Empty </span></div>
                            </div>




                            <div class="form-group row ">

                                <label for="smtp-authorization" class="col-sm-3 col-form-label font-weight-bold">SMTP Authorization <span class="kau-required">*</span></label>
                                <div class="col-sm-6">
                                    <label class="switch ">
                                        <input type="checkbox" name="kau-smtp-authorization-smtp" id="kau-smtp-authorization-smtp"  value="true"   <?php  $authorizationSmtp  = (kauget('kau-smtp-authorization-smtp',$smtpValue))? 'checked' : false ; echo $authorizationSmtp; ?>  >
                                        <span class="slider round "></span>
                                    </label><div class="smtp-authorization-label font-italic label-text">Use Authentication when sending an email ( recommended: True)</div>
                                </div>
                              

                            </div>



                            <div class="form-group row ">

                                <label for="username-smtp" class="col-sm-3 col-form-label font-weight-bold">SMTP Username <span class="kau-required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="email" name="kau-username-smtp" class="form-control" id="kau-username-smtp"   placeholder="Enter Your SMTP Username" value="<?php echo kauget('kau-username-smtp',$smtpValue);  ?>">
                                    <div class="username-smtp-label font-italic label-text">Your SMTP username goes here</div>
                                </div>
                               <div class="col-sm-4 kau-error-msg" id="kau-alert-msg" > <span class="error text-danger text-center" id="kau-invalid-email" style="display:none" > <i class="fa fa-exclamation-circle " aria-hidden="true"></i> Email Address invalid</span> <span class="error text-success text-center" id="kau-valid-email" style="display:none" > <i class="fa fa-check-circle"></i></i> WOW! Look great</span></div>  
                            </div>


                            <div class="form-group row ">

                                <label for="password-smtp" class="col-sm-3 col-form-label font-weight-bold">SMTP Password <span class="kau-required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="kau-password-smtp" class="form-control" id="kau-password-smtp" placeholder="Enter Your SMTP Password"   value="<?php echo kauget('kau-password-smtp',$smtpValue);  ?>">
                                    <div class="password-smtp-label font-italic label-text">You need enter password every time you update the settings for security reason</div>
                                </div>
                                
                            </div>




                            <div class="form-group row ">

                                <label for="connection-type" class="col-sm-3 col-form-label font-weight-bold">Connection Type</label>
                                <div class="col-sm-9">


                                    <div class="btn-group rediobox-btn" >
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-smtp" name="connection-type" value="1"  <?php  $connectionType  = (kauget('connection-type',$smtpValue) == "1")? 'checked' : false ; echo $connectionType; ?> /><span class="connection-type-label font-italic font-weight-bold">None</span> 
                                        </label>
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-gmail" name="connection-type" value="2"   <?php  $connectionType  = (kauget('connection-type',$smtpValue) == "2")? 'checked' : false ; echo $connectionType; ?> /> <span class="connection-type-label font-italic font-weight-bold">SSL</span>
                                        </label>
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-microsoft" name="connection-type" value="3"   <?php  $connectionType  = (kauget('connection-type',$smtpValue) == "3")? 'checked' : false ; echo $connectionType; ?>  /> <span class="connection-type-label font-italic font-weight-bold">TSL</span>
                                        </label>

                                    </div>




                                    <div class="gmail-settings-label font-italic label-text" id="gmail-settings-label">

                                        For most servers TLS is the recommended option. If your SMTP provider offers both SSL and TLS options, we recommend using TLS.
                                    </div>





                                </div>

                            </div>



                            <div class="form-group row ">

                                <label for="port-smtp" class="col-sm-3 col-form-label font-weight-bold">SMTP Port <span class="kau-required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kau-port-smtp" id="kau-port-smtp"   placeholder="Enter Your SMTP Port" value="<?php echo kauget('kau-port-smtp',$smtpValue);  ?>">
                                    <div class="password-smtp-label font-italic label-text">Enter the mail server port.Most mail servers use port 465.</div>
                                </div>
                                
                            </div>             
                                    
                             <div class="form-group row ">

                                <label for="smtp-authorization" class="col-sm-3 col-form-label font-weight-bold">HTML Allow </label>
                                <div class="col-sm-6">
                                    <label class="switch ">
                                        <input type="checkbox" name="kau-smtp-html-allow" id="kau-smtp-html-allow" value="true"   <?php  $authorizationSmtp  = (kauget('kau-smtp-html-allow',$smtpValue))? 'checked' : false ; echo $authorizationSmtp; ?>  >
                                        <span class="slider round "></span>
                                   
                                </div>
                                

                            </div>       
                                    

                                </div>





                            </div>








                        </div>
                    
               

                        <div class="row">
                            <div class="col-6">
                            <button type="submit" name="kau_form_submit" id="kau_smtp_settings_save" class="btn savebtn" value="kau_smtp_settings"><i class="fa fa-cog" aria-hidden="true" ></i><b> Save Settings</b></button>
                            </div>
                            
                            <div class="col-6 float-right text-right">
                           
                            <button type="submit" class="btn resetbtn"  name="kau_form_submit" class="btn savebtn" value="kau_smtp_reset_settings"><i class="fa fa-cog" aria-hidden="true"></i><b> Reset Settings</b></button>
                            </div>

                        </div>
            

                    </div>
                    
  
                    </form> 