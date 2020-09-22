<div id="misc" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">


<?php 

$miscValue = self::getSMTP();


$debugActivation = (isset($miscValue['debug-activation']) ? $miscValue["debug-activation"] : false);
$emailNotSend =(isset($miscValue["email-not-send"]) ? $miscValue["email-not-send"] : false);
$hideError = (isset($miscValue['hide-error'])? $miscValue["hide-error"] : false);
$invalidSslAllow = (isset($miscValue['invalid-ssl-allow'])? $miscValue["invalid-ssl-allow"] : false);
$allowTraking = (isset($miscValue['allow-traking'])? $miscValue["allow-traking"] : false);



?>
                       

<form role="form" name="misc-settings-form" id="misc-settings-form" method="post" action="" enctype="multipart/form-data">

                       <div class=" well smtp-setting-one-content ">

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Debug Mode Enable</label>
                               <div class="col-sm-1">
                                   <label class="switch">
                                       <input type="checkbox" id="debug-activation" name="debug-activation" value="1"  <?php if($debugActivation=="1") echo 'checked'; ?>>
                                       <span class="slider round"></span>
                                   </label>
                               </div>
                               <div class="col-sm-6 font-italic label-text">  Error log option adds commands and data between wordpress and your SMTP server to PHP error_log file</div>
                           </div>

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Email Do Not Send</label>
                               <div class="col-sm-1">
                                   <label class="switch">
                                       <input type="checkbox" id="email-not-send" name="email-not-send"  value="1"  <?php if($emailNotSend=="1") echo 'checked'; ?>>
                                       <span class="slider round"></span>
                                   </label>
                               </div>
                               <div class="col-sm-6 font-italic label-text">  Swtich if you would like to stop sending all emails.</div>
                           </div>

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Hide Email Delivery Error</label>
                               <div class="col-sm-1">
                                   <label class="switch">
                                       <input type="checkbox" id="hide-error" name="hide-error" value="1"  <?php if($hideError=="1") echo 'checked'; ?>>
                                       <span class="slider round"></span>
                                   </label>
                               </div>
                               <div class="col-sm-6 font-italic label-text">  Swtich if you would like to hide warning alerting of email delivery errors.</div>
                           </div>

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Allow Invalid SSL</label>
                               <div class="col-sm-1">
                                   <label class="switch">
                                       <input type="checkbox" id="invalid-ssl-allow" name="invalid-ssl-allow"  value="1"  <?php if($invalidSslAllow=="1") echo 'checked'; ?>>
                                       <span class="slider round"></span>
                                   </label>
                               </div>
                               <div class="col-sm-6 font-italic label-text"> Allow connecting to a server with invalid SSL setup.Bear in mind this is only a workaround,the right thing would be to fix the server SSL setup</div>
                           </div>

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold">Allow Usage Traking</label>
                               <div class="col-sm-2">
                                   <select class="form-control" id="allow-traking"  name="allow-traking">
                                       <option value="off" <?php if($allowTraking=="off") echo 'selected="selected"'; ?>>OFF</option>
                                       <option value="on" <?php if($allowTraking=="on") echo 'selected="selected"'; ?>>ON</option>

                                   </select>
                               </div>

                           </div>



                       </div>

                       <div class="row">
                            <div class="col-6">
                            <input type="hidden" name="misc-submitted" value="true" />
                            <button type="submit" class="btn savebtn" value="submit"><i class="fa fa-cog" aria-hidden="true" ></i><b> Save Settings</b></button>
                            </div>
                            
                            <div class="col-6 float-right text-right">

                            <button type="submit" class="btn resetbtn"><i class="fa fa-cog" aria-hidden="true" value="Submit"></i><b> Reset Settings</b></button>
                            </div>

                        </div>


                   </div>
                   </form>                       