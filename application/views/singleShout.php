<div class="row">
    <div class="span1">
        <div class="account-avatar">
            <img src="img/headshot.png" alt="" class="thumbnail" />
        </div> 
    </div>
    <div class="span11">
        <strong>Tirthesh Ganatra</strong> @GanatraT
        <p><?= $shout ?></p>
        <p><time class="timeago" datetime="<?= new MongoTimestamp($shoutedAt).__to_string() ?>"><?= $shoutedAt ?></time></p>
    </div>
</div>
<hr class="span11"/>
