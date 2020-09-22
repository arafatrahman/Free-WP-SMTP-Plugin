<div id="emailtesting" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">

<?php 

$testingValue = self::getEmailTesting();




$emailSubject = (isset($testingValue['email-subject']) ? $testingValue["email-subject"] : false);
$emailBody =(isset($testingValue["email-body"]) ? $testingValue["email-body"] : false);
$recipientEmail = (isset($testingValue['recipient-email'])? $testingValue["recipient-email"] : false);




?>



                 
<form role="form" name="misc-settings-form" id="misc-settings-form" method="post" action="" enctype="multipart/form-data">

                        <div class=" well smtp-setting-one-content ">

                            <div class="form-group row ">

                                <label for="emailsubject" class="col-sm-3 col-form-label font-weight-bold">Email Subject</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email-subject" id="email-subject" placeholder="Enter Email Subject"  value="<?php echo $emailSubject;  ?>">
                                    <div class="emailsubject-label font-italic label-text">Subject of the email you want to send</div>
                                </div>

                            </div>

                            <div class="form-group row ">

                                <label for="emailbody" class="col-sm-3 col-form-label font-weight-bold">Email Body</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="email-body" id="email-body" rows="4"  value="<?php $emailBody;  ?>"><?php echo $emailBody;  ?></textarea>
                                    <div class="email-body-label font-italic label-text">Your Message Goes Here......</div>
                                </div>

                            </div>

                            <div class="form-group row ">

                                <label for="recipientemail" class="col-sm-3 col-form-label font-weight-bold"> Recipient Email Address</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" name="recipient-email"  id="recipient-email" placeholder="Enter Recipient Email Address"  value="<?php echo $recipientEmail ;  ?>">
                                    <div class="recipient-email-label font-italic label-text">Enter an Email Address where testing email will be send</div>
                                </div>

                            </div>



                        </div>

                        <div class="row">
                            <div class="col-6">
                            <input type="hidden" name="email-testing" value="true" />
                            <button type="submit" class="btn savebtn" value="submit"><i class="fa fa-paper-plane" aria-hidden="true" ></i><b> Email Testing</b></button>
                            </div>
                            
                            <div class="col-6 float-right text-right">

                            </div>

                        </div>
                    </div>

                    </form>   