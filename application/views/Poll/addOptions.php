<div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table"></i>
                    Add Options
            </div>
          <div class="card-body">
            <form method="post" action="<?=base_url('Poll/saveOptions')?>">
            	<?php
            	for($i=1;$i<=$options;$i++){ ?>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Option no. <?=$i?></label>
                                <input type="text" class="form-control" placeholder="Enter Option" name="option<?=$i?>" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    	<input type="hidden" name="options" value="<?=$options?>">
                        <input type="hidden" name="contest_id" value="<?=$id?>">
                        <input type="hidden" name="type" value="">
                    <input type="submit" class="btn btn-success" value="Save Options">
                </form>
            </div>
        </div>