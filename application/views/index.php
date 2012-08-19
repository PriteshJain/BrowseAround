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
                </div>    
            </div> 
            <div id="shoutsContainer"></div>
        </div>        
        <?php $this->load->view('footer'); ?>
    </body>
</html>
