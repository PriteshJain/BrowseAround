<form class="faq-search" method="post">
    <div class="well">
        <input type="text" name="search" placeholder="shout out here!" id="shoutOut">
        <input type="hidden" id="latitude" maxlength="6"/>
        <input type="hidden" id="longitude" maxlength="6"/>        
        <input type="hidden" id="replyFor" value="<?= $replyFor; ?>"/>
        <input type="hidden" id="threadFrom" value="<?= $replyFrom; ?>"/>
        <button type="submit" class="btn-warning btn-large" id="shout-out" class="shout-out">
            <i class="icon-comment"></i> Shout
        </button>
    </div>
</form>
