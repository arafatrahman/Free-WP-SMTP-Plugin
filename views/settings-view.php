<!-- Main Settings Section start -->        

<?php
$kauSettingsSave = '';
if (kauget('kau_form_submit', $_POST) == "kau_smtp_settings") {

    $kauSettingsSave = ' <div class="notice notice-success is-dismissible  " id ="kau-settings-save-alert">
            <p class=" text-success "> <strong><i class="fa fa-check-circle"></i> Settings Saved!</strong> Your Settings Successfully Saved</p>
        </div>';
}
?>

<div class="container smtp-main-container  col-12">


    <div class="banner">
        <div class="container col-12">

            <div class="row banner-text">
                <?php $imgUrl = plugins_url('/brandlogo.png', __FILE__); ?>
                <div class="col-3 kauniaweblogo"> <a href="http://kauniaweb.com/" target="_blank"> <img src="<?php echo $imgUrl ?>" alt="kauniaweb" > </a></div>



                <div class="col-6 cover-text text-center">
                    <h3 class="text-white"><strong>FREE WP SMTP PUGIN</strong></h3>
                    <span class="font-italic">Our goal is to make email deliverability easy and reliable. We want to ensure your emails reach the inbox.</span>


                </div>

                <div class="col-3">  <a href="<?php echo $smtp_url; ?>" class="button-get-started" ><b>DOCUMENTATION</b></a> </div>





            </div>
        </div>
    </div>

    <div class="p-5 bg-white rounded shadow mb-5">


        <?php echo $kauSettingsSave; ?>

        <div id="smtpTab" class="col-12">
            <ul  role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                <li class="nav-item flex-sm-fill">
                    <a id="home-tab" data-toggle="tab" href="#smtp" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold  <?php
                    if (kauget('kau_form_submit', $_POST) == "kau_smtp_settings") {
                        echo "show active";
                    }
                    ?> <?php if (kauget('kau_form_submit', $_POST) == "kau_smtp_reset_settings") echo "show active" ?> <?php
                   if (kauget('kau_form_submit', $_POST) == "") {
                       echo "show active";
                   }
                    ?> ">SMTP Settings</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="profile-tab" data-toggle="tab" href="#misc" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold <?php if (kauget('kau_form_submit', $_POST) == "kau_misc_settings") echo "show active" ?> <?php if (kauget('kau_form_submit', $_POST) == "kau_misc_reset_settings") echo "show active" ?>">MISC Settings</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="contact-tab" data-toggle="tab" href="#emaillogs" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Email Logs</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="contact-tab" data-toggle="tab" href="#emailtesting" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold <?php
                   if (kauget('kau_form_submit', $_POST) == "kau_testing_settings") {
                       echo "show active";
                   }
                    ?>">Email Testing</a>
                </li>
            </ul>
        </div>




        <div id="myTabContent" class="tab-content">
<?php include_once "smtp-settings.php"; ?>
<?php include_once "misc-settings.php"; ?>
<?php include_once "emaillogs-settings.php"; ?>
<?php include_once "emailtesting-settings.php"; ?>

        </div>

    </div>
</div>
<!-- Main Settings Section Close --> 
