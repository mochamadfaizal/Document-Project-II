<div class="container">
      <div class="">
        <h1>Simple Bootgrid example with add,edit and delete using PHP,MySQL and AJAX</h1>
        <div class="col-sm-8">
    <div class="well clearfix">
      <div class="pull-right"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
      <span class="glyphicon glyphicon-plus"></span> Record</button></div></div>
    <table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
      <thead>
        <tr>
          <th data-column-id="id" data-type="numeric" data-identifier="true">Empid</th>
          <th data-column-id="employee_name">Name</th>
          <th data-column-id="employee_salary">Salary</th>
          <th data-column-id="employee_age">Age</th>
          <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
        </tr>
      </thead>
    </table>
    </div>
      </div>
    </div>
  
<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Employee</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
        <input type="hidden" value="add" name="action" id="action">
                  <div class="form-group">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Salary:</label>
                    <input type="text" class="form-control" id="salary" name="salary"/>
                  </div>
          <div class="form-group">
                    <label for="salary" class="control-label">Age:</label>
                    <input type="text" class="form-control" id="age" name="age"/>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_add" class="btn btn-primary">Save</button>
            </div>
      </form>
        </div>
    </div>
</div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Employee</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
        <input type="hidden" value="edit" name="action" id="action">
        <input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="edit_name" name="edit_name"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Salary:</label>
                    <input type="text" class="form-control" id="edit_salary" name="edit_salary"/>
                  </div>
          <div class="form-group">
                    <label for="salary" class="control-label">Age:</label>
                    <input type="text" class="form-control" id="edit_age" name="edit_age"/>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
            </div>
      </form>
        </div>
    </div>
</div>