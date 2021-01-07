
<?php
$smtp_url = admin_url() . "admin.php?page=smtp_settings";
?>


<div class="banner">
    <div class="container col-12">

        <div class="row banner-text">
            <?php $imgUrl = esc_url(WPMS_ASSETS_DIR_URI . "/images/brandlogo.png"); ?>
            <div class="col-3 kauniaweblogo"> <img src="<?php echo $imgUrl ?>" alt="kauniaweb" > </div>



            <div class="col-6 cover-text text-center" style="text-shadow: 1px 1px 2px #484848 !important;">
                <h3 class="text-white"><strong><?php esc_html_e('WP Mailer SMTP','wp-mailer-smtp')?></strong></h3>
                <span class="font-italic"><?php esc_html_e('Our goal is to send you emails from your WordPress website without any hassle.We hope that Now you can send emails through this plugin','wp-mailer-smtp')?></span>


            </div>

            <div class="col-3">  <a href="https://riyadly.com/wp-mailer-smtp-documentation-for-wordpress/" class="button-get-started" ><b><?php esc_html_e('DOCUMENTATION','wp-mailer-smtp')?></b></a> </div>





        </div>
    </div>
</div>

<section class="smtp-description col-12" >

    <div class="container">

        <div class="row">
            <div class="col-1 ">

            </div>



            <div class="col-10 text-center">
                <h5 class="font-italic align-middle" ><?php esc_html_e('SMTP stands for Simple Mail Transfer Protocol. SMTP is a set ofcommunication guidelinesthat allow software to transmit an electronic mail over the internet is called Simple Mail Transfer Protocol. It is aprogram used for sending messages to other','wp-mailer-smtp')?> </br><?php esc_html_e('computer users based on e-mail addresses.','wp-mailer-smtp')?></h5>

            </div>
            <div class="col-1">

            </div>
        </div>
    </div>



</section>


<section id="settings" class="pb-5">
    <div class="container d-flex justify-content-center settings-container">



        <div class="row col-8 ">

            <div class="col-xs-12 col-sm-6 col-md-4">
                <a class="card-link" href="<?php echo $smtp_url; ?>" class="">
                    <div class="card">
                        <div class="text-center">
                            <p><img class=" img-fluid" src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/settings-1.png"); ?>" alt="card image"></p>
                            <h5 class="card-title"><b><?php esc_html_e('SMTP Settings','wp-mailer-smtp')?></b></h5>
                            <p class="card-text font-italic align-middle"><?php esc_html_e('if you want to Set your smtp settings properly click here now','wp-mailer-smtp')?></p>

                        </div>
                    </div>
                </a>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a class="card-link2" href="<?php echo $smtp_url; ?>" class="">
                    <div class="card">
                        <div class="text-center">
                            <p><img class=" img-fluid" src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/settings-2.png"); ?>" alt="card image"></p>
                            <h5 class="card-title"><b><?php esc_html_e('Misc Settings','wp-mailer-smtp')?></b></h5>
                            <p class="card-text font-italic align-middle"><?php esc_html_e('if you want you can also set your miscellaneous settings here.','wp-mailer-smtp')?></p>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 card4">
                <a class="card-link3" href="<?php echo $smtp_url; ?>" class="">
                    <div class="card">
                        <div class="text-center">
                            <p><img class=" img-fluid" src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/settings-3.png"); ?>" alt="card image"></p>
                            <h5 class="card-title"><b><?php esc_html_e('Email Logs','wp-mailer-smtp')?></b></h5>
                            <p class="card-text font-italic align-middle"><?php esc_html_e('Keep track of every email sent from your WordPress site','wp-mailer-smtp')?></p>

                        </div>
                    </div>
                </a>

            </div>







        </div>


    </div>



    <div class="container d-flex justify-content-center settings-container2">



        <div class="row col-8 ">

            <div class="col-xs-12 col-sm-6 col-md-4">



            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <a class="card-link4" href="<?php echo $smtp_url; ?>" class="">
                    <div class="card">
                        <div class="text-center">
                            <p><img class=" img-fluid" src="<?php echo esc_url(WPMS_ASSETS_DIR_URI . "/images/settings-4.png"); ?>" alt="card image"></p>
                            <h5 class="card-title"><b><?php esc_html_e('Email Testing','wp-mailer-smtp')?></b></h5>
                            <p class="card-text font-italic align-middle card-desc"><?php esc_html_e('For Confirmation you can also check by email testing','wp-mailer-smtp')?></p>

                        </div>
                    </div>
                </a>

            </div>




            <div class="col-xs-12 col-sm-6 col-md-4">



            </div>



        </div>


    </div>



    <section class="smtp-features-head col-12 justify-content-center" >

        <div class="container">

            <div class="row">
                <div class="col-4">
                    <hr />
                </div>
                <div class="col-4 text-center">
                    <h5><b ><?php esc_html_e('SMTP FEATURES DETAILS','wp-mailer-smtp')?></b></h5>
                </div>
                <div class="col-4">
                    <hr />
                </div>
            </div>
        </div>



    </section>

    <section class="smtp-description col-12 justify-content-center" >

        <div class="container">

            <div class="row">
                <div class="col-1 ">

                </div>



                <div class="col-10 text-center">
                    <h5 class="font-italic align-middle" ><?php esc_html_e('Easy WP SMTP allows you to configure and send all','wp-mailer-smtp')?></br><?php esc_html_e('outgoingemails via a SMTP server. This will prevent  your emails from','wp-mailer-smtp')?></br><?php esc_html_e('going into the junk/spam folder of the recipients.','wp-mailer-smtp')?></h5>

                </div>
                <div class="col-1">

                </div>
            </div>
        </div>



    </section>


    <section class="smtp-description col-12 justify-content-center" >

        <div class="container">

            <div class="row">
                <div class="col-5  smtp-features-li1 ">

                    <ul class="list-group">
                        <li class="list-group-item"><b><?php esc_html_e('You can use Gmail, Yahoo, Hotmail’s SMTP
                                server if you have an account with them.','wp-mailer-smtp')?></b></li>
                        <li class="list-group-item"><b><?php esc_html_e('Securely deliver emails to your recipients.','wp-mailer-smtp')?></b></li>        
                        <li class="list-group-item"><b><?php esc_html_e('Ability to specify a Reply-to email address.','wp-mailer-smtp')?></b></li>

                    </ul>
                </div>

                <div class="col-2">
                    <img class=" img-fluid" src="https://riyadly.com/wp-content/uploads/2020/09/tree.png" alt="card image">
                </div>
                <div class="col-5  smtp-features-li2">

                    <ul class="list-group">
                        <li class="list-group-item"><b><?php esc_html_e('Sending Email using a SMTP server.','wp-mailer-smtp')?></b></li>
                        <li class="list-group-item"><b><?php esc_html_e('Seamlessly connect your WordPress blog with a mail server to handle all outgoing emails.','wp-mailer-smtp')?></b></li>        
                        <li class="list-group-item"><b><?php esc_html_e('Option to enable debug logging to see if the emails are gettings sent out seccessfully or not','wp-mailer-smtp')?></b></li>

                    </ul>
                </div>




            </div>
        </div>



    </section>

    <section class="col-12 justify-content-center" >

        <div class="container">

            <div class="row">
                <div class="col-5">

                </div>
                <div class="col-3">
                    <a href="<?php echo $smtp_url; ?>" class="button-get-started2" ><b><?php esc_html_e('GET STARTED','wp-mailer-smtp')?></b></a>
                </div>
                <div class="col-4">

                </div>

            </div>
        </div>



    </section>

