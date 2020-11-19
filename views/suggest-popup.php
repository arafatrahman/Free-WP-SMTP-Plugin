
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right, #0099ff -35%, #ff6699 100%)">
                <h5 class="modal-title" id="exampleModalLabel"><b class="text-light" style="margin-left:10px">For Better Experience</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            
            
            <div class="modal-body">
                
                <p style="font-size: 18px;color:#696969;margin-left:10px;"><b>Authentication With Email Provider Before Sending An Email( access token will be expired every Hours )</b></p>
                <p style="font-size: 14px;color:red;text-align: center;"><b>Make Sure Other SMTP Plugins Are Disabled</b></p>
                <p style="font-size: 14px;color:green;text-align: center;"><b>If any errors occur, please refresh and try again.</b></p>

            </div>
            
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#exampleModal').modal('show');
    });
</script>

