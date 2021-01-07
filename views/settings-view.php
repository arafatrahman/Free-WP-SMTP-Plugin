
<?php include_once "suggest-popup.php"; ?>

<!-- Main Settings Section start -->        

<?php
$kauSettingsSave = '';
if (wpmsget('wpms_form_submit', $_POST) == "wpms_smtp_settings") {

    $kauSettingsSave = ' <div class="notice notice-success is-dismissible  " id ="kau-settings-save-alert">
            <p class=" text-success "> <strong><i class="fa fa-check-circle"></i> Settings Saved!</strong> Your Settings Successfully Saved</p>
        </div>';
}
?>

<div class="container smtp-main-container  col-12">


    <div class="banner">
        <div class="container col-12">

            <div class="row banner-text">
                <?php $imgUrl = esc_url(WPMS_ASSETS_DIR_URI . "/images/brandlogo.png"); ?>
                <div class="col-3 kauniaweblogo"> <a href="https://riyadly.com/" target="_blank"> <img src="<?php echo $imgUrl ?>" alt="kauniaweb" > </a></div>



                <div class="col-6 cover-text text-center" style="text-shadow: 1px 1px 2px #484848 !important;">
                    <h3 class="text-white"><strong><?php esc_html_e('WP Mailer SMTP','wp-mailer-smtp')?></strong></h3>
                    <span class="font-italic"><?php esc_html_e('Our goal is to send you emails from your WordPress website without any hassle.We hope that Now you can send emails through this plugin ','wp-mailer-smtp')?></span>


                </div>

                <div class="col-3">  <a href="https://riyadly.com/wp-mailer-smtp-documentation-for-wordpress/" class="button-get-started" ><b><?php esc_html_e('DOCUMENTATION','wp-mailer-smtp')?></b></a> </div>





            </div>
        </div>
    </div>

    <div class="p-5 bg-white rounded shadow mb-5">


        <?php echo $kauSettingsSave; ?>

        <div id="smtpTab" class="col-12">
            <ul  role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                <li class="nav-item flex-sm-fill">
                    <a id="home-tab" data-toggle="tab" href="#smtp" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold  <?php
                    if (wpmsget('wpms_form_submit', $_POST) == "wpms_smtp_settings") {
                        echo "show active";
                    }
                    ?> <?php if (wpmsget('wpms_form_submit', $_POST) == "wpms_smtp_reset_settings") echo "show active" ?> <?php
                   if (wpmsget('wpms_form_submit', $_POST) == "") {
                       echo "show active";
                   }
                    ?> "><?php esc_html_e('SMTP Settings','wp-mailer-smtp')?></a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="profile-tab" data-toggle="tab" href="#misc" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold <?php if (wpmsget('wpms_form_submit', $_POST) == "wpms_misc_settings") echo "show active" ?> <?php if (wpmsget('wpms_form_submit', $_POST) == "wpms_misc_reset_settings") echo "show active" ?>"><?php esc_html_e('MISC Settings','wp-mailer-smtp')?></a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="contact-tab" data-toggle="tab" href="#emaillogs" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold"><?php esc_html_e('Email Logs','wp-mailer-smtp')?></a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="contact-tab" data-toggle="tab" href="#emailtesting" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold <?php
                   if (wpmsget('wpms_form_submit', $_POST) == "wpms_testing_settings") {
                       echo "show active";
                   }
                    ?>"><?php esc_html_e('Email Testing','wp-mailer-smtp')?></a>
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
