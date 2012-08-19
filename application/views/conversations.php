<div class="well span9 container">
    <div class="row">
        <div class="span1">
            <div class="account-avatar">
                <img src="img/headshot.png" alt="" class="thumbnail" />            
            </div> 
        </div>
        <div class="span8">
            <strong>Tirthesh Ganatra</strong> @GanatraT         
            <p><?= $shout ?></p>
        </div>
    </div>
    <hr />
    <div class="row" style="text-align: right">
        <div class="span1">
            &nbsp;
        </div>
        <div class="span7">
            <strong>You</strong>      
            <p><?= $shout ?></p>
            <p>
                <time class="timeago" datetime="<?= date('F j, Y, g:i a', $shoutedAt->sec); ?>"><?= date('F j, Y, g:i a', $shoutedAt->sec); ?></time>
                &nbsp;&nbsp;
                <a class="shout-links">
                    <i class="icon-trash"></i>
                    Delete Thread		
                </a>                
            </p>
        </div>
        <div class="span1">
            <div class="account-avatar">
                <img src="img/headshot.png" alt="" class="thumbnail" />            
            </div> 
        </div>
    </div>
    <hr />
</div>