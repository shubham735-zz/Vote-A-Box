<div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table"></i>
                    Users info
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Computer Code</th>
                    <th>Change Password</th>
                    <th>Admin Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($users as $u) {
                            ?>
                            <tr>
                                <td><?=ucwords(strtolower($u->name))?></td>
                                <td><?=$u->email?></td>
                                <td><?=$u->id?></td>
                                <td><a href="<?=base_url('Auth/password/').base64_encode($u->id)?>" class="btn btn-warning">Change Password</a></td>
                                <td>
                                    <?php if($u->type==1){
                                        ?>
                                        <a href="<?=base_url('Users/changestatus/0/').$u->id?>" class="btn btn-danger">Remove as Admin</a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <a href="<?=base_url('Users/changestatus/1/').$u->id?>" class="btn btn-success">Make as Admin</a>
                                        <?php
                                    } ?>
                                </td>
                                <td>
                                    <?php
                                        if ($u->active==1) {
                                            ?>
                                            <a href="<?=base_url('Users/usersstatus/0/').$u->id?>" class="btn btn-primary">Active</a>
                                        <?php
                                        }
                                        else
                                            echo '<a href="#" class="btn btn-danger disabled">Inactive</a>';
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Computer Code</th>
                        <th>Change Password</th>
                        <th>Admin Status</th>
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