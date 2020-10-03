


<div id="emailtesting" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5 <?php if(kauget('kau_form_submit',$_POST) == "kau_testing_settings"){ echo "show active";} ?>">

<?php 

$testingValue = self::getEmailTesting();

?>



                 
<form role="form" name="email_testing_form" id="email-testing-form" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?page=smtp_settings';?>" enctype="multipart/form-data">

                        <div class=" well smtp-setting-one-content ">

                            <div class="form-group row ">

                                <label for="emailsubject" class="col-sm-3 col-form-label font-weight-bold">Email Subject</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email-subject" id="email-subject" placeholder="Enter Email Subject"  value="<?php echo kauget('email-subject',$testingValue);   ?>">
                                    <div class="emailsubject-label font-italic label-text">Subject of the email you want to send</div>
                                </div>

                            </div>

                            <div class="form-group row ">

                                <label for="emailbody" class="col-sm-3 col-form-label font-weight-bold">Email Body</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="email-body" id="email-body" rows="4"  value="<?php kauget('email-body',$testingValue); ?>"><?php echo kauget('email-body',$testingValue);   ?></textarea>
                                    <div class="email-body-label font-italic label-text">Your Message Goes Here......</div>
                                </div>

                            </div>

                            <div class="form-group row ">

                                <label for="recipientemail" class="col-sm-3 col-form-label font-weight-bold"> Recipient Email Address</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" name="recipient-email"  id="recipient-email" placeholder="Enter Recipient Email Address"  value="<?php echo kauget('recipient-email',$testingValue) ;  ?>">
                                    <div class="recipient-email-label font-italic label-text">Enter an Email Address where testing email will be send</div>
                                </div>

                            </div>



                        </div>

                        <div class="row">
                            <div class="col-6">
                            <button type="submit" id="emailTestingSubmit" name="kau_form_submit" class="btn savebtn" value="kau_testing_settings"><i class="fa fa-paper-plane" aria-hidden="true" ></i><b> Email Testing</b></button>
                            </div>
                            
                            <div class="col-6 float-right text-right">

                            </div>

                        </div>
                    </div>

                    </form>   