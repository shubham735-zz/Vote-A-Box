<div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table"></i>
                    Change Password
            </div>
          <div class="card-body">
            <form method="post" action="<?=base_url('Auth/change')?>">
                    <input type="hidden" name="id" value="<?=base64_decode($id)?>">

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="Change Password">
                </form>
            </div>
        </div>