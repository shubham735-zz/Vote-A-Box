<div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table"></i>
                    Create Poll
            </div>
          <div class="card-body">
            <form method="post" action="<?=base_url('Poll/addPollOptions')?>">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Question for Poll</label>
                                <input type="text" class="form-control" placeholder="Question for Poll" name="statement" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Multiple Options to selected by Users:</label>
                                <select name="multiple" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No. of Options</label>
                                <input type="number" min="2" class="form-control" placeholder="No. of Options for Poll" name="options" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                        <input type="hidden" name="active" value="1">
                        <input type="hidden" name="admin" value="<?=$_SESSION['id']?>">
                    <input type="submit" class="btn btn-success" value="Proceed to Add Options">
                </form>
            </div>
        </div>