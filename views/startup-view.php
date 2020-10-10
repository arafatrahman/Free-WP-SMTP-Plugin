
<?php
$smtp_url = admin_url() . "admin.php?page=smtp_settings";
?>


<div class="banner">
    <div class="container col-12">

        <div class="row banner-text">
            <?php $imgUrl = KAU_ASSETS_DIR_URI . "/images/brandlogo.png"; ?>
            <div class="col-3 kauniaweblogo"> <img src="<?php echo $imgUrl ?>" alt="kauniaweb" > </div>



            <div class="col-6 cover-text text-center">
                <h3 class="text-white"><strong>FREE WP SMTP PUGIN</strong></h3>
                <span class="font-italic">Our goal is to make email deliverability easy and reliable. We want to ensure your emails reach the inbox.</span>


            </div>

            <div class="col-3">  <a href="<?php echo $smtp_url; ?>" class="button-get-started" ><b>GET STARTED</b></a> </div>





        </div>
    </div>
</div>

<section class="smtp-description col-12" >

    <div class="container">

        <div class="row">
            <div class="col-1 ">

            </div>



            <div class="col-10 text-center">
                <h5 class="font-italic align-middle" >SMTP stands for Simple Mail Transfer Protocol. SMTP is a set ofcommunication guidelinesthat allow software to transmit an electronic mail over the internet is called Simple Mail Transfer Protocol. It is aprogram used for sending messages to other </br>computer users based on e-mail addresses.</h5>

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
                            <p><img class=" img-fluid" src="<?php echo KAU_ASSETS_DIR_URI . "/images/settings-1.png"; ?>" alt="card image"></p>
                            <h5 class="card-title"><b>SMTP Settings</b></h5>
                            <p class="card-text font-italic align-middle">if you want to Set your smtp settings properly click here now</p>

                        </div>
                    </div>
                </a>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a class="card-link2" href="<?php echo $smtp_url; ?>" class="">
                    <div class="card">
                        <div class="text-center">
                            <p><img class=" img-fluid" src="<?php echo KAU_ASSETS_DIR_URI . "/images/settings-2.png"; ?>" alt="card image"></p>
                            <h5 class="card-title"><b>Misc Settings</b></h5>
                            <p class="card-text font-italic align-middle">if you want you can also set your miscellaneous settings here.</p>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 card4">
                <a class="card-link3" href="<?php echo $smtp_url; ?>" class="">
                    <div class="card">
                        <div class="text-center">
                            <p><img class=" img-fluid" src="<?php echo KAU_ASSETS_DIR_URI . "/images/settings-3.png"; ?>" alt="card image"></p>
                            <h5 class="card-title"><b>Email Logs</b></h5>
                            <p class="card-text font-italic align-middle">Keep track of every email sent from your WordPress site</p>

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
                            <p><img class=" img-fluid" src="<?php echo KAU_ASSETS_DIR_URI . "/images/settings-4.png"; ?>" alt="card image"></p>
                            <h5 class="card-title"><b>Email Testing</b></h5>
                            <p class="card-text font-italic align-middle card-desc">For Confirmation you can also check by email testing</p>

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
                    <h5><b >SMTP FEATURES DETAILS</b></h5>
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
                    <h5 class="font-italic align-middle" >Easy WP SMTP allows you to configure and send all</br>outgoingemails via a SMTP server. This will prevent  your emails from</br>going into the junk/spam folder of the recipients.</h5>

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
                        <li class="list-group-item"><b>You can use Gmail, Yahoo, Hotmail’s SMTP
                                server if you have an account with them.</b></li>
                        <li class="list-group-item"><b>Securely deliver emails to your recipients.</b></li>        
                        <li class="list-group-item"><b>Ability to specify a Reply-to email address.</b></li>

                    </ul>
                </div>

                <div class="col-2">
                    <img class=" img-fluid" src="https://riyadly.com/wp-content/uploads/2020/09/tree.png" alt="card image">
                </div>
                <div class="col-5  smtp-features-li2">

                    <ul class="list-group">
                        <li class="list-group-item"><b>Sending Email using a SMTP server.</b></li>
                        <li class="list-group-item"><b>Seamlessly connect your WordPress blog with a mail server to handle all outgoing emails.</b></li>        
                        <li class="list-group-item"><b>Option to enable debug logging to see if the emails are gettings sent out seccessfully or not</b></li>

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
                    <a href="<?php echo $smtp_url; ?>" class="button-get-started2" ><b>GET STARTED</b></a>
                </div>
                <div class="col-4">

                </div>

            </div>
        </div>



    </section>

