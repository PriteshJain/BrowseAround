<div class="row" style="text-align: right">
    <div class="span1">
        &nbsp;
    </div>
    <div class="span9">
        <strong>You</strong>      
        <p><?= $shout ?></p>
        <p>
            <time class="timeago" datetime="<?= date('F j, Y, g:i a', $shoutedAt->sec); ?>"><?= date('F j, Y, g:i a', $shoutedAt->sec); ?></time>
            &nbsp;&nbsp;
            <a class="shout-links">
                <i class="icon-trash"></i>
                Delete Thread		
            </a>
            &nbsp;&nbsp;
            <a class="shout-links">
                <i class="icon-eye-open"></i>
                View Conversation			
            </a>
        </p>
    </div>
    <div class="span1">
        <div class="account-avatar">
            <img src="img/headshot.png" alt="" class="thumbnail" />            
        </div> 
    </div>
</div>
<hr class="span11"/>