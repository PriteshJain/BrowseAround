<div id="footer">
    <div class="container">				
        <hr />
        <p>&copy; 2012 Browse Around
    </div>
</div> 
<script src="<?= base_url() ?>assets/js/jquery-1.7.2.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        initialize();        
    });

    $('#shout-out').on('click', function() {
        data = {
            'latitude' : $('#latitude').val(),
            'longitude' : $('#longitude').val(),
            'shout' : $('#shoutOut').val()
        }
        
        // $.ajax({
        //     url: "<?= site_url('index.php/shout/saveShout'); ?>",
        //     type: "post",
        //     data: data,
        //     dataType: "html",
        //     success: function(response) {                                      
        //         $('#shouts').prepend(response);
        //     }
        // });
        // prevents from refreshing the page
        return false;
    });

    function initialize() {            
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                $("#latitude").val(position.coords.latitude);
                $("#longitude").val(position.coords.longitude);
                    
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
