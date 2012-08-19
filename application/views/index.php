<!DOCTYPE html>
<html lang="en">
    <?= $this->load->view('head'); ?>
    <body>
        <?= $this->load->view('navbar'); ?>        
        <div id="content">
            <div class="container">
                <div class="row">
                    <?= $this->load->view('sidebar'); ?>
                    <div class="span9">
                        <?= $this->load->view('shout'); ?>
                    </div>
                    <div class="span9">
                        
                    </div>
                </div>    
            </div> 
            <?= $this->load->view('shouts'); ?>
        </div>        
        <?php $this->load->view('footer'); ?>
    </body>
</html>
