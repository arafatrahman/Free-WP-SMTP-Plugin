  <!-- Header Section start -->
        <div class="container col-12 ">

            <div class="row cover-img">

            
                <div class="col-12 " >
            
                <div class="col-12 text-center " >
               
                    <div class="cover-img-text">
                   
                        <h1><strong>FREE WP SMTP PUGIN</strong></h1>
                        <h4 class="font-italic">Having problems with your WordPress site not sending emails? <br> You’re not alone.Our goal is to make email deliverability easy and reliable.<br> We wantto ensure your emails reach the inbox.</h4>
                        <p class="kauniawebbranding "><a   href="http://kauniaweb.com/"> <img  src="https://riyadly.com/wp-content/uploads/2020/09/ZCZC.png" ></a></p>
                    </div>
					


                </div>


            </div>
        </div> 
  <!-- Header Section close -->

        
<!-- Main Settings Section start -->        


        <div class="container smtp-main-container  col-12">

            <div class="p-5 bg-white rounded shadow mb-5">

            <div class="notice notice-error is-dismissible  " id ="kau-settings-alert" style="display:none" >
            <p class=" text-danger "> <i class="fa fa-exclamation-circle " aria-hidden="true"></i> Settings Cannot be saved due to {error causes}</p>
            </div>

            <div class="notice notice-success is-dismissible" id ="kau-settings-alert" style="display:none">
            <p class=" text-success"> <i class="fa fa-check-circle"></i> Settings Cannot be saved due to {error causes}</p>
            </div>

            <div id="smtpTab" class="col-12">
            <ul  role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
            <li class="nav-item flex-sm-fill">
                <a id="home-tab" data-toggle="tab" href="#smtp" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">SMTP Settings</a>
            </li>
            <li class="nav-item flex-sm-fill">
                <a id="profile-tab" data-toggle="tab" href="#misc" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">MISC Settings</a>
            </li>
            <li class="nav-item flex-sm-fill">
                <a id="contact-tab" data-toggle="tab" href="#emaillogs" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Email Logs</a>
            </li>
            <li class="nav-item flex-sm-fill">
                <a id="contact-tab" data-toggle="tab" href="#emailtesting" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Email Testing</a>
            </li>
            </ul>
            </div>

            


                <div id="myTabContent" class="tab-content">
                   <?php include_once "smtp-settings.php" ;	?>
                   <?php include_once "misc-settings.php" ;	?>
                   <?php include_once "emaillogs-settings.php" ;?>
                   <?php include_once "emailtesting-settings.php" ;?>

                </div>
               
            </div>
        </div>
 <!-- Main Settings Section Close --> 
