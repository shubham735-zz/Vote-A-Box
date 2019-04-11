
<div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table"></i>
                    Cast Vote
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Statement</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($cast as $c) {
                        ?>
                        <tr>
                            <td><?=$c->statement?></td>
                            <?php
                            $count=0;
                                foreach ($votes as $v) {
                                    if ($v->contest_id==$c->id) {
                                    	$count++;
                                    }
                                }
                                if ($count==0) {
                                	?>
                                	<td><a href="<?=base_url('Poll/vote/').$c->id.'/'.$_SESSION['id']?>" class="btn btn-success">Cast a Vote</a></td>
                                	<?php
                                }
                                else{
                                        ?>
                                        <td><a href="#" class="btn btn-primary disabled">Voted</a></td>
                                        <?php
                                    }
                             ?>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Statement</th>
                        <th>Action</th>
                        </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <?php
                 date_default_timezone_set('Asia/Kolkata');
                $date = date('j M Y h:i A', time());
          ?>
          <div class="card-footer small text-muted">Updated on <?=$date?> </div>
        </div>