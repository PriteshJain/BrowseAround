<!DOCTYPE html>
<html lang="en">
    <?= $this->load->view('head'); ?>
    <body>
        <?= $this->load->view('navbar'); ?>        
        <div id="content">
            <div class="container">
                <div class="row">
                    <?= $this->load->view('sidebar'); ?>
                    <div class="span8">
                        <?php
                        $data = array(
                            'replyFrom' => 0,
                            'replyFor' => 0
                        );
                        echo $this->load->view('shout', $data);
                        ?>
                    </div>
                </div>    
            </div> 
            <div id="shoutsContainer"></div>
        </div>        
        <?php $this->load->view('footer'); ?>
    </body>
</html>
