<div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table"></i>
                    Add User
            </div>
          <div class="card-body">
            <form method="post" action="<?=base_url('Users/addUser')?>">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Computer Code</label>
                                <input type="number" class="form-control" placeholder="Computer Code" name="id" id="cc" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" required>
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                            </div>
                        </div>
                        </div>
                        <input type="hidden" name="active" value="1">
                        <input type="hidden" name="type" value="">
                    <input type="submit" class="btn btn-success" value="Add User">
                </form>
            </div>
        </div>