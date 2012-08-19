<div class="container">
    <div class="row">
        <div class="well span12">  
            <h1 class="page-title">
                <i class="icon-comments"></i>
                Shouts!				
            </h1>
            <div class="widget">
                <div class="widget-content">                                     
                    <div class="container shouts" id="shouts" style="padding: 10px;">
                        <?php
                        $count = 0;
                        foreach ($shoutData as $s) {
                            $s['threadID'] = $count;
                            if ($count % 5 == 0) {
                                $this->load->view('myShouts', $s);
                            } else {
                                $this->load->view('singleShout', $s);
                            }
                            $count++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>