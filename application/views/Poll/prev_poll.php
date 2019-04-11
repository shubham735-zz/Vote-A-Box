
<div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table"></i>
                    Previous Polls
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Sr. no.</th>
                    <th>Action</th>
                    <th>Statement</th>
                    <th>Winner</th>
                    <th>Nominees who got Votes</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                        foreach ($contest as $c) {
                                $nominee="";
                                foreach ($poll as $p) {
                                    if($p->id==$c->id){
                                        $nominee=$nominee.",".$p->options;
                                        }                               
                            }
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <?php if ($c->active==0) {
                                    echo "<td></td>";
                                }
                                else{ ?>
                                <td><a href="<?=base_url('Poll/status/0/').$c->id?>" class="btn btn-danger">Close Poll</a></td><?php } ?>
                                <td><?=$c->statement?></td>
                                <td><?=$c->winner?></td>
                                <td><?=$nominee?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr. no.</th>
                        <th>Action</th>
                        <th>Statement</th>
                        <th>Winner</th>
                        <th>Nominees</th>
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