<div id="footer">
    <div class="container">				
        <hr />
        <p>&copy; 2012 &nbsp;<i class="icon-leaf"></i>&nbsp;GovindaBros.org
        </div>
    </div> 
    <script src="<?= base_url() ?>assets/js/jquery-1.7.2.min.js"></script>
    <script src="<?= base_url() ?>assets/js/timeago.yarp.js" type="text/javascript" charset="utf-8" > </script>
    <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        initialize();    
        jQuery("time.timeago").timeago();
    });

    function shoutOutToThread(threadID){
        $('.shoutBox_' + threadID).toggle();
    }
    
    function viewConversation(threadID) {
        $('.conversations_' + threadID).toggle();
    }
    
    function reportThread(threadID){

    }

    $('#shout-out').on('click', function() {        
        data = {
            'latitude' : $('#latitude').val(),
            'longitude' : $('#longitude').val(),
            'shout' : $('#shoutOut').val(),
            'replyFor' : $('#replyFor').val(),
            'replyFrom' : $('#replyFrom').val()
        }
        
        $.ajax({
            url: "<?= site_url('index.php/shout/saveShout'); ?>",
            type: "post",
            data: data,
            dataType: "html",
            success: function(response) {                                      
                $('#shouts').prepend(response);
            }
        });

        $('#shoutOut').val('');              
        // prevents from refreshing the page
        return false;
    });
    function getShouts() {
        data = {
            'latitude' : $('#latitude').val(),
            'longitude' : $('#longitude').val()
        }
        
        $.ajax({
            url: "<?= site_url('index.php/shout/getShouts'); ?>",
            type: "post",
            data: data,
            dataType: "html",
            success: function(response) {                                      
                $('#shoutsContainer').prepend(response);
            }
        });
    }
    $(function(){
        $('.shout-links').live('click', function(event,data) {   
            alert("ddada")
        var  dat = {'id': $(this).data('id') };    
        var url = "<?= site_url('index.php/shout/destroyShout'); ?>";
        var method = $(this).data('method');
        $.ajax({
            url: url,
            type: "post",
            data: dat,
            dataType: "html",
            success: function(response) {                                      
                $('#shoutsContainer').prepend(response);
            }
        });

         // prevents from refreshing the page
         return false;
     });
    });

    function initialize() {            
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                $("#latitude").val(position.coords.latitude);
                $("#longitude").val(position.coords.longitude);
                getShouts();
            }, function() {
                handleNoGeolocation(true);
            });
        } else {          
            handleNoGeolocation(false);
        }
    }

    function handleNoGeolocation(errorFlag) {
        if (errorFlag) {
            alert('Error: The Geolocation Service Failed.');
        } else {
            alert('Error: Your Browser Does Not Support GeoLocation.');
        }        
    }            
    </script>
