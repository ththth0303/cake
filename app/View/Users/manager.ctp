<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Bootstrap Snipp for Datatable</h4>
                <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#new" ><span class="glyphicon glyphicon-pencil"></span></button></p>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>

                            <th><input type="checkbox" id="checkall" /></th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>  
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $key => $value): ?>
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                <td><?php echo $value['User']['id'] ?></td>
                                <td><?php echo $value['User']['name'] ?></td>
                                <td><?php echo $value['User']['email'] ?></td>
                                
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit" onClick="get_user(<?php echo $value['User']['id'] ?>)"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onClick="get_id(<?php echo $value['User']['id'] ?>)" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                            </tr> 
                        <?php endforeach ?>
                            
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="new" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Name" id="name" required>
                    </div>
                    <div class="form-group">

                        <input class="form-control " type="text" placeholder="Email" id="email">
                        <span class="text-danger hidden" id="err_email">Email đã tồn tại</span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="password" id="password" class="form-control">

                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-success btn-lg" style="width: 100%;" onClick="new_user()"><span class="glyphicon glyphicon-ok-sign"></span>Create</button>
                </div>
            </div>
            <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Mohsin" id="name_edit">
                        <input class="form-control " type="hidden" placeholder="Mohsin" id="id">
                    </div>
                    <div class="form-group">

                        <input class="form-control " type="text" placeholder="Irshad" id="email_edit">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password_edit" class="form-control">

                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" onClick="update_user()"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                </div>
            </div>
            <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-success" id="comfirm_delete" onclick="delete_user()"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
            <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
    </div>
    <script type="text/javascript">
        function get_user(id) {
            $.ajax({
                url: '/cakephp/users/edit_user/' + id,
                dataType: 'json',
                success: function(result) {
                    $('#name_edit').val(result.User.name);
                    $('#email_edit').val(result.User.email);
                    $('#id').val(result.User.id);
                }
            });
        }

        function update_user() {
            $.ajax({
                url: '/cakephp/users/update_user/' + $('#id').val(),
                dataType: 'json',
                method: 'post',
                data: {
                    'name': $('#name_edit').val(),
                    'email': $('#email_edit').val(),
                    'password': $('#password_edit').val(),
                },
                success: function(result) {
                    if (result == 1) {
                        window.location.replace('/cakephp/users/manager')
                    } else if (result == 1){
                        $('#edit').hide();
                        alert('có lỗi xảy ra');
                    }
                }
            });
        }

        function new_user() {
            $.ajax({
                url: '/cakephp/users/new_user/',
                dataType: 'json',
                method: 'post',
                data: {
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                },
                success: function(result) {

                    if (result == 1) {
                        window.location.replace('/cakephp/users/manager')
                    } else if (result == 0) {
                        $('#new').modal('hide')
                        alert('có lỗi xảy ra')
                    } else if (result == 2) {
                        $('#err_email').removeClass('hidden')
                    }
                }
            });
        }

        function get_id(id) {
            $('#comfirm_delete').attr('user_id', id);
        }
        
        function delete_user() {
            var id = $('#comfirm_delete').attr('user_id');

            $.ajax({
                url: '/cakephp/users/delete_user/' + id,
                dataType: 'json',
                success: function(result) {
                    window.location.replace('/cakephp/users/manager') 
                }
            });
        }
    </script>
</body>
</html>