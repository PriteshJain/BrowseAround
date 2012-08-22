<div class="row">
    <div class="span1">
        <div class="account-avatar">
            <img src="img/headshot.png" alt="" class="thumbnail" />            
        </div> 
    </div>
    <div class="span9">
        <strong>Tirthesh Ganatra</strong> @GanatraT         
        <p><?= $shout ?></p>
        <p>
            <?php $threadID = 1 ?>
            <time class="timeago" datetime="<?= date('F j, Y, g:i a', $shoutedAt->sec); ?>"><?= date('F j, Y, g:i a', $shoutedAt->sec); ?></time>
            &nbsp;&nbsp;
            <a class="shout-links" onclick="shoutOutToThread(<?= $threadID; ?>)">
                <i class="icon-share"></i>
                Reply To Thread			
            </a>
            &nbsp;&nbsp;
            <a class="shout-links" onclick="viewConversation(<?= $threadID; ?>)">
                <i class="icon-eye-open"></i>
                View Conversation			
            </a>            
            &nbsp;&nbsp;
            <a class="shout-links" onclick="reportThread(<?= $threadID; ?>)">
                <i class="icon-flag"></i>
                Report			
            </a>            
        </p>

        <div id="shout-links" class="shoutBox_<?= $threadID; ?>">
            <?php
            $data = array(
                'replyFrom' => 'myID',
                'replyFor' => 'threadID'
                );
            echo $this->load->view('shout', $data);
            ?>
        </div>

        <div id="shout-links" class="conversations_<?= $threadID; ?>">
            <?php
            $conversations = $this->shout_model->showreplies($shout->$id);
            foreach( $conversations as $conversation) {
                $this->load->view('conversations',$conversation);
            }
            ?>
        </div>
    </div>
</div>
<hr class="span11"/>
