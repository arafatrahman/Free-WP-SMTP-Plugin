<div id="misc" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5 <?php if(wpmsget('wpms_form_submit',$_POST) == "wpms_misc_settings") echo "show active"?> <?php if(wpmsget('wpms_form_submit',$_POST) == "wpms_misc_reset_settings") echo "show active"?>">


<?php 

$miscValue = self::getMISC();
$imgUrl = WPMS_ASSETS_DIR_URI . '/images/underdevelopment.png';

?>                   

<form role="form" name="misc-settings-form" id="misc-settings-form" method="post" action="" enctype="multipart/form-data">

    <div style="background-image: url('<?php echo $imgUrl ?>');width: 1000px; height: 560px;">
                       <div class=" well smtp-setting-one-content " style="display: none">

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Debug Mode Enable','wp-mailer-smtp')?></label>
                               <div class="col-sm-1">
                                   <label class="switch">
                                       <input type="checkbox" id="debug-activation" name="debug-activation" value="1"  <?php  $debugActivation  = (wpmsget('debug-activation',$miscValue))? 'checked' : false ; echo $debugActivation; ?>>
                                       <span class="slider round"></span>
                                   </label>
                               </div>
                               <div class="col-sm-6 font-italic label-text">  <?php esc_html_e('Error log option adds commands and data between wordpress and your SMTP server to PHP error_log file','wp-mailer-smtp')?></div>
                           </div>

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Email Do Not Send','wp-mailer-smtp')?></label>
                               <div class="col-sm-1">
                                   <label class="switch">
                                       <input type="checkbox" id="email-not-send" name="email-not-send"  value="1" <?php  $emailNotSend  = (wpmsget('email-not-send',$miscValue))? 'checked' : false ; echo $emailNotSend; ?> >
                                       <span class="slider round"></span>
                                   </label>
                               </div>
                               <div class="col-sm-6 font-italic label-text">  <?php esc_html_e('Swtich if you would like to stop sending all emails.','wp-mailer-smtp')?></div>
                           </div>

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Hide Email Delivery Error','wp-mailer-smtp')?></label>
                               <div class="col-sm-1">
                                   <label class="switch">
                                       <input type="checkbox" id="hide-error" name="hide-error" value="1" <?php  $hideError  = (wpmsget('hide-error',$miscValue))? 'checked' : false ; echo  $hideError; ?>>
                                       <span class="slider round"></span>
                                   </label>
                               </div>
                               <div class="col-sm-6 font-italic label-text">  <?php esc_html_e('Swtich if you would like to hide warning alerting of email delivery errors.','wp-mailer-smtp')?></div>
                           </div>

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Allow Invalid SSL','wp-mailer-smtp')?></label>
                               <div class="col-sm-1">
                                   <label class="switch">
                                       <input type="checkbox" id="invalid-ssl-allow" name="invalid-ssl-allow"  value="1" <?php if(wpmsget('invalid-ssl-allow',$miscValue)=="1") echo 'checked'; ?>>
                                       <span class="slider round"></span>
                                   </label>
                               </div>
                               <div class="col-sm-6 font-italic label-text"> <?php esc_html_e('Allow connecting to a server with invalid SSL setup.Bear in mind this is only a workaround,the right thing would be to fix the server SSL setup','wp-mailer-smtp')?></div>
                           </div>

                           <div class="form-group row ">
                               <label for="smtpactivation" class="col-sm-3 col-form-label font-weight-bold"><?php esc_html_e('Allow Usage Traking','wp-mailer-smtp')?></label>
                               <div class="col-sm-2">
                                   <select class="form-control" id="allow-traking"  name="allow-traking">
                                       <option value="off" <?php if(wpmsget('allow-traking',$miscValue)=="off") echo 'selected="selected"'; ?>><?php esc_html_e('OFF','wp-mailer-smtp')?></option>
                                       <option value="on" <?php if(wpmsget('allow-traking',$miscValue)=="on") echo 'selected="selected"'; ?>><?php esc_html_e('ON','wp-mailer-smtp')?></option>

                                   </select>
                               </div>

                           </div>



                       </div>

                       <div class="row" style="display: none">
                            <div class="col-6">
                           
                            <button type="submit" name="wpms_form_submit" class="btn savebtn" value="wpms_misc_settings"><i class="fa fa-cog" aria-hidden="true" ></i><b> Save Settings','wp-mailer-smtp')?></b></button>
                            </div>
                            
                            <div class="col-6 float-right text-right">

                            <button type="submit" name="wpms_form_submit" class="btn savebtn" value="wpms_misc_reset_settings" class="btn resetbtn"><i class="fa fa-cog" aria-hidden="true" value="Submit"></i><b> Reset Settings','wp-mailer-smtp')?></b></button>
                            </div>

                        </div>


    </div>               </div>
</form>                       