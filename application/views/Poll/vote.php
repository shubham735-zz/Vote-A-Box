<div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table"></i>
                    Make A Vote
            </div>
          <div class="card-body">
            <form method="post" action="<?=base_url('Poll/castMyVote')?>">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label><?=$question[0]->statement?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <?php
                                    foreach ($options as $o) {
                                        $i=1;
                                        if ($question[0]->multiple==0) {
                                            ?>
                                            <input type="radio" name="options[]" value="<?=$o->id?>" ><label>&nbsp;<?=$o->options?></label><br>
                                            <?php
                                        }
                                        elseif ($question[0]->multiple==1) {
                                            ?>
                                            <input type="checkbox" name="options[]?>" value="<?=$o->id?>"><label>&nbsp;<?=$o->options?></label><br>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>                        
                    </div>
                    <input type="hidden" name="contest_id" value="<?=$question[0]->id?>">
                    <input type="hidden" name="user_id" value="<?=$cc?>">
                    <input type="submit" value="Cast Vote" class="btn btn-success">                    
                </form>
            </div>
        </div>