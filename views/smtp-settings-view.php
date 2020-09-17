<!DOCTYPE html>
<html lang="en">
    <head>
        <title>FREE WP SMTP PLUGIN</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
    </head>
    <body>



  <!-- Header Section start -->
        <div class="container col-12 ">

            <div class="row">

                <div class="col-11  cover-img text-left " >
                    <div class="cover-img-text">
                        <h2><strong>FREE WP SMTP <br>PUGIN</strong></h2>
                        <h6 class="font-italic">Having problems with your WordPress site not<br> sending emails? You’re not alone.Our goal is <br>to make email deliverability easy and reliable.<br> We wantto ensure your emails reach the inbox.</h6>
                        <p><a href="kauniaweb.com" class="brandingby font-weight-bold font-italic" >by kauniaweb</a></p>
                    </div>
					


                </div>






                <div class="col-1">
                    <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center  border-0 ">
                        <li class="nav-item flex-sm-fill">
                            <a id="home-tab" data-toggle="tab" href="#smtp" role="tab" aria-controls="smtp" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active nav-color1"><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon1.png"  width="50" height="50"></a>
                        </li>
                        <li class="nav-item flex-sm-fill">
                            <a id="profile-tab" data-toggle="tab" href="#misc" role="tab" aria-controls="misc" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold nav-color2"><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon2.png"  width="50" height="50"></a>
                        </li>
                        <li class="nav-item flex-sm-fill">
                            <a id="contact-tab" data-toggle="tab" href="#emaillogs" role="tab" aria-controls="emaillogs" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold nav-color3"><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon3.png"  width="50" height="50"></a>
                        </li>
                        <li class="nav-item flex-sm-fill">
                            <a id="contact-tab" data-toggle="tab" href="#emailtesting" role="tab" aria-controls="emailtesting" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold nav-color4"><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon4.png"  width="50" height="50"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
  <!-- Header Section close -->


        
<!-- Main Settings Section start -->        
<div class="col-1"></div>

        <div class="container smtp-main-container  col-10">

            <div class="p-5 bg-white rounded shadow mb-5">


                <div id="myTabContent" class="tab-content">
                    <!-- SMTP Settings Section start --> 
                    <div id="smtp" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">



                        <div class="row menu-label1">
                            <div class="">
                                <div class="p-2 bg-color"></span><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon1.png" class="lebelpossition" width="30" height="30" ><b>SMTP Settings</b></div>
                                
                            </div>
							<hr class="menu-label1-hr">
                        </div>  

                        <div class=" well smtp-setting-one-content ">

                            <div class="form-group row ">
                                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">SMTP Activation</label>
                                <div class="col-sm-5">
                                    <label class="switch">
                                        <input type="checkbox" id="smtp-activation">
                                        <span class="slider round"></span>
                                    </label> 
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label for="fromemail" class="col-sm-3 col-form-label font-weight-bold">From Email Address</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" id="from-email" placeholder="From Email Address">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="fromname" class="col-sm-3 col-form-label font-weight-bold">From Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="from-name" placeholder="From Name">
                                </div>
                            </div>


                        </div>  <!-- Form Part 1 Close  Here-->
                        <div class=" well smtp-setting-one-content ">
						
						

                            <div class="form-group row col-12 testing">

                                <label for="mailer option" class="col-3 col-form-label font-weight-bold">Mailer Option</label>
                                           <div class="col-sm-9">
										   
										<div class="container mailer-type">

											<label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-smtp" name="mailer-type" value="1"  /><span class="connection-type-label font-italic font-weight-bold">SMTP.com</span> 
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-gmail" name="mailer-type" value="1"  /> <span class="connection-type-label font-italic font-weight-bold">Gmaill</span>
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-microsoft" name="mailer-type" value="1"  /> <span class="connection-type-label font-italic font-weight-bold">Microsoft</span>
											</label>
											<label class="btn btn-default active">
												<input type="radio" class="redio-color" id="mailer-type-default" name="mailer-type" value="1"  /> <span class="connection-type-label font-italic font-weight-bold">Default</span>
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
                                            <input type="email" class="form-control" id="gmail-client-id" placeholder="Enter Gmail Client ID">
                                            <div class="gmail-client-id-label font-italic label-text ">At registration the client application is assigned a client ID and a client secret (password) by the authorization server</div>
                                        </div>

                                    </div>
                                    <div class="form-group row ">

                                        <label for="gmailclientsecret" class="col-sm-3 col-form-label font-weight-bold">Client Secret</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="gmail-client-secret" placeholder="Enter Gmail Client Secret">
                                            <div class="gmail-client-secret-label font-italic label-text">At registration the client application is assigned a client ID and a client secret (password) by the authorization server</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="redirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="redirectURI" placeholder="Enter Gmail Client Secret">
                                            <div class="redirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization</label>
                                        <div class="col-sm-4">
                                            <label class="switch">
                                                <input type="checkbox" id="gmail-authorization" >
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
                                            <input type="text" class="form-control" id="smtp-api-key" placeholder="Enter SMTP API Key">
                                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an API Key from SMTP.com: <a href="https://my.smtp.com/settings/api"></a>Get API Key.</div>
                                        </div>

                                    </div>
                                    <div class="form-group row ">

                                        <label for="smtpsendername" class="col-sm-3 col-form-label font-weight-bold">Sender Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="smtp-sender-name" placeholder="Enter SMTP Sender Name">
                                            <div class="gmail-client-secret-label font-italic label-text">Follow this link to get a Sender Name from SMTP.com: <a href="https://my.smtp.com/senders/">Get Sender Name.</a></div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="redirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="redirectURI" placeholder="Enter Gmail Client Secret">
                                            <div class="redirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization</label>
                                        <div class="col-sm-4">
                                            <label class="switch">
                                                <input type="checkbox" id="gmail-authorization" >
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
                                            <input type="text" class="form-control" id="smtp-api-key" placeholder="Enter SMTP API Key">
                                            <div class="gmail-client-id-label font-italic label-text">Follow this link to get an API Key from SMTP.com: <a href="https://my.smtp.com/settings/api"></a>Get API Key.</div>
                                        </div>

                                    </div>
                                    <div class="form-group row ">

                                        <label for="smtpsendername" class="col-sm-3 col-form-label font-weight-bold">Sender Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="smtp-sender-name" placeholder="Enter SMTP Sender Name">
                                            <div class="gmail-client-secret-label font-italic label-text">Follow this link to get a Sender Name from SMTP.com: <a href="https://my.smtp.com/senders/">Get Sender Name.</a></div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="redirectURI" class="col-sm-3 col-form-label font-weight-bold">Authorized redirect URI</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="redirectURI" placeholder="Enter Gmail Client Secret">
                                            <div class="redirectURI-label font-italic label-text">Please copy this URL into the "Authorized redirect URIs" field of your Google web application.</div>
                                        </div>

                                    </div>

                                    <div class="form-group row ">

                                        <label for="authorization" class="col-sm-3 col-form-label font-weight-bold">Authorization</label>
                                        <div class="col-sm-4">
                                            <label class="switch">
                                                <input type="checkbox" id="gmail-authorization" >
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
                                    <input type="email" class="form-control" id="smtp-host" placeholder="smtp.example.com">
                                    <div class="smtp-host-label font-italic label-text">The SMTP server which will be used to send email. for example smtp.gmail.com</div>
                                </div>

                            </div>




                            <div class="form-group row ">

                                <label for="smtp-authorization" class="col-sm-3 col-form-label font-weight-bold">SMTP Authorization</label>
                                <div class="col-sm-6">
                                    <label class="switch ">
                                        <input type="checkbox" id="smtp-authorization" >
                                        <span class="slider round "></span>
                                    </label><div class="smtp-authorization-label font-italic label-text">Use Authentication when sending an email ( recommended: True)</div>
                                </div>


                            </div>



                            <div class="form-group row ">

                                <label for="username-smtp" class="col-sm-3 col-form-label font-weight-bold">SMTP Username</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="username-smtp" placeholder="Enter Your SMTP Username">
                                    <div class="username-smtp-label font-italic label-text">Your SMTP username goes here</div>
                                </div>

                            </div>


                            <div class="form-group row ">

                                <label for="password-smtp" class="col-sm-3 col-form-label font-weight-bold">SMTP Password</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="password-smtp" placeholder="Enter Your SMTP Password">
                                    <div class="password-smtp-label font-italic label-text">You need enter password every time you update the settings for security reason</div>
                                </div>

                            </div>




                            <div class="form-group row ">

                                <label for="connection-type" class="col-sm-3 col-form-label font-weight-bold">Connection Type</label>
                                <div class="col-sm-9">


                                    <div class="btn-group rediobox-btn" >
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-smtp" name="quality[25]" value="1" checked /><span class="connection-type-label font-italic font-weight-bold">None</span> 
                                        </label>
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-gmail" name="quality[25]" value="1"  /> <span class="connection-type-label font-italic font-weight-bold">SSL</span>
                                        </label>
                                        <label class="btn btn-default active">
                                            <input type="radio" class="redio-color" id="mailer-type-microsoft" name="quality[25]" value="1"  /> <span class="connection-type-label font-italic font-weight-bold">TSL</span>
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
                                    <input type="text" class="form-control" id="port-smtp" placeholder="Enter Your SMTP Port">
                                    <div class="password-smtp-label font-italic label-text">Enter the mail server port.Most mail servers use port 465.</div>
                                </div>

                            </div>


                            <div class="form-group row ">

                                <label for="ssl-verification" class="col-sm-3 col-form-label font-weight-bold">SSL Certificate Verification</label>
                                <div class="col-sm-9">
                                    <label class="switch ">
                                        <input type="checkbox" id="ssl-verification" >
                                        <span class="slider round "></span>
                                    </label><div class="ssl-verification-label font-italic label-text">Fix the SSL configurations instead of bypassing it.</div>
                                </div>

                            </div>           


                        </div> 



                        <div class="row">
                            <div class="col-6">
                                <a href="something" class="save-settings" ><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon1.png"  width="30" height="30"><b>Save Settings</b></a>
                            </div>
                            
                            <div class="col-6 float-right text-right">
                                <a href="something" class="reset-settings" ><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon1.png"  width="30" height="30"><b>Reset Settings</b></a>
                            </div>

                        </div>


                    </div>
                    <!-- SMTP Settings Section Close --> 
                    
                    <!-- MISC Settings Section start --> 
                    <div id="misc" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                        <div class="row menu-label1">
                            <div class="">
                                <div class="p-2 bg-color2"></span><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon2.png" class="lebelpossition" width="30" height="30" ><b>MISC Settings</b></div>
                                
                            </div>
							<hr class="menu-label2-hr">
                        </div> 

                        <div class=" well smtp-setting-one-content ">

                            <div class="form-group row ">
                                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Debug Mode Enable</label>
                                <div class="col-sm-1">
                                    <label class="switch">
                                        <input type="checkbox" id="debug-activation" >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-sm-6 font-italic label-text">  Error log option adds commands and data between wordpress and your SMTP server to PHP error_log file</div>
                            </div>

                            <div class="form-group row ">
                                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Email Do Not Send</label>
                                <div class="col-sm-1">
                                    <label class="switch">
                                        <input type="checkbox" id="email-not-send" >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-sm-6 font-italic label-text">  Swtich if you would like to stop sending all emails.</div>
                            </div>

                            <div class="form-group row ">
                                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Hide Email Delivery Error</label>
                                <div class="col-sm-1">
                                    <label class="switch">
                                        <input type="checkbox" id="hide-error" >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-sm-6 font-italic label-text">  Swtich if you would like to hide warning alerting of email delivery errors.</div>
                            </div>

                            <div class="form-group row ">
                                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Allow Invalid SSL</label>
                                <div class="col-sm-1">
                                    <label class="switch">
                                        <input type="checkbox" id="invalid-ssl-allow" >
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-sm-6 font-italic label-text"> Allow connecting to a server with invalid SSL setup.Bear in mind this is only a workaround,the right thing would be to fix the server SSL setup</div>
                            </div>

                            <div class="form-group row ">
                                <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Allow Usage Traking</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>OFF</option>
                                        <option>ON</option>

                                    </select>
                                </div>

                            </div>



                        </div>

                        <div class="row">
                            <div class="col-6">
                                <a href="something" class="save-settings" ><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon2.png"  width="30" height="30"><b>Save Settings</b></a>
                            </div>
                            
                            <div class="col-6 float-right text-right">
                                <a href="something" class="reset-settings" ><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon2.png"  width="30" height="30"><b>Reset Settings</b></a>
                            </div>

                        </div>


                    </div>
                    <!-- MISC Settings Section start --> 
                    
                    <!-- EMail Logs Settings Section start --> 
                    <div id="emaillogs" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">

                        <div class="row menu-label1">
                            <div class="">
                                <div class="p-2 bg-color3"></span><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon3.png"  width="30" height="30" class="settingsicon"><b class="settingslebel">Email Logs</b></div>
                                
                            </div>
							<hr class="menu-label3-hr">
                        </div>  
                        <p class="text-muted">3Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <!-- Email logs Settings Section close --> 
                    
                     <!-- Email testing Settings Section Start --> 
                    <div id="emailtesting" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">

                        <div class="row menu-label1">
                            <div class="">
                                <div class="p-2 bg-color4"></span><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon4.png"  width="30" height="30" class="settingsicon"><b class="settingslebel">Email Testing</b></div>
                                
                            </div>
							<hr class="menu-label4-hr">
                        </div>   

                        <div class=" well smtp-setting-one-content ">

                            <div class="form-group row ">

                                <label for="emailsubject" class="col-sm-3 col-form-label font-weight-bold">Email Subject</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="email-subject" placeholder="Enter Email Subject">
                                    <div class="emailsubject-label font-italic label-text">Subject of the email you want to send</div>
                                </div>

                            </div>

                            <div class="form-group row ">

                                <label for="emailbody" class="col-sm-3 col-form-label font-weight-bold">Email Body</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" id="email-body" rows="4"></textarea>
                                    <div class="email-body-label font-italic label-text">Your Message Goes Here......</div>
                                </div>

                            </div>

                            <div class="form-group row ">

                                <label for="recipientemail" class="col-sm-3 col-form-label font-weight-bold"> Recipient Email Address</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" id="recipient-email" placeholder="Enter Recipient Email Address">
                                    <div class="recipient-email-label font-italic label-text">Enter an Email Address where testing email will be send</div>
                                </div>

                            </div>



                        </div>

                        <div class="row">
                            <div class="col-6">
                                <a href="something" class="save-settings" ><img src="https://riyadly.com/wp-content/uploads/2020/09/menu-icon4.png"  width="30" height="30"><b>Send Email</b></a>
                            </div>
                            
                            <div class="col-6 float-right text-right">

                            </div>

                        </div>
                    </div>
                    <!-- Email testing Settings Section close --> 
                </div>
               
            </div>
        </div>
<div class="col-1"></div>  <!-- Main Settings Section Close --> 

    </body>
</html>
