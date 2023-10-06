<?= $this->include('include/header') ?>
<!-- Select2 -->
<link rel="stylesheet" href="theme/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<?= $this->include('include/navbar') ?>
<?= $this->include('include/sidebar') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Master</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" id="add_user" data-toggle="modal" data-target="#add_user_modal">
                        Add New User Detail
                    </button>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Start content -->
    <section class="content">
        <!-- Add Client Modal -->
        <div class="modal fade" id="add_user_modal" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_user_modalLabel">Add User Detail</h5>
                        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="user_form" name="user_form" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div id="msg"></div>
                            </div>
                            <div class="row">
                                <input type="hidden" name="user_id" id="user_id" class="form-control" value="0">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Name :<span class="must">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Father's Name :</label>
                                        <input type="text" name="father_name" id="father_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Address :</label>
                                        <textarea name="address" id="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Pincode :</label>
                                        <input type="text" name="pincode" id="pincode" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="mobile_no">Mobile :<span class="must">*</span></label>
                                        <input type="text" name="mobile_no" id="mobile_no" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Mobile2 :</label>
                                        <input type="text" name="mobile_2" id="mobile_2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email_id">Email :<span class="must">*</span></label>
                                        <input type="text" name="email_id" id="email_id" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Email(Personal) :</label>
                                        <input type="email" name="email_personal" id="email_personal" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="user_type_id">User Type<span class="must">*</span></label>
                                        <select class="form-control select2bs4" id="user_type_id" name="user_type_id" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="user_type_id">Seniority By Designation<span class="must">*</span></label>
                                        <select class="form-control" id="user_designation_id" name="user_designation_id" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="seniority_by_years">Seniority By Years</label>
                                        <select class="form-control" id="seniority_by_years" name="seniority_by_years" style="width: 100%;">
                                            <option value="0">Select Seniority</option>
                                            <option value="1">0-5 Years</option>
                                            <option value="2">5-10 Years</option>
                                            <option value="3">10-15 Years</option>
                                            <option value="4">More then 15 Years</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-check">
                                        <input type="checkbox" style="margin-top:45px;" name="login_access" class="form-check-input" value="1" id="login_access">
                                        <label class="form-check-label" for="login_access" style="margin-top:38px;">Login access:</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group check_form mr-2 ">
                                        <label class="col-form-label" for="username">Username :<span class="must">*</span></label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group check_form mr-2">
                                        <label class="col-form-label" for="password">Password :<span class="must">*</span></label>
                                        <input type="password" value="" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="save" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Client Modal -->


        <!-- Start Client Table -->
        <div class="card">
            <div class="alert alert-warning alert-dismissible fade hide d-none" role="alert" id="notice">
                <p id="message"></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <div class="col-md-12" id="result"></div> -->
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Email Id</th>
                            <th>Mobile No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- Start Client Table -->
    </section>
    <!-- End content -->
</div>




<!-- Start Footer -->
<?= $this->include("include/footerJs"); ?>
<!-- End Footer -->
<script src="theme/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="theme/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="theme/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        var $select = $('#user_type_id').select2({
            theme: 'bootstrap4'
        });
        let arr = {
            action: 'get'
        };
        var request = JSON.stringify(arr);
        $.ajax({
            method: "POST",
            url: "controller/user_type.php",
            data: request,
            dataType: "JSON",
            async: false,
            headers: {
                "Content-Type": "application/json"
            },
            beforeSend: function() {
                console.log(request);
            },
        }).done(function(Response) {
            $select.empty();
            $select.append('<option value="">Select User Type</option>');
            $.each(Response.data, function(index, value) {
                $select.append('<option value="' + value.user_type_id + '">' + value.user_type + '</option>');
            });
        }).fail(function(jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseJSON.msg;
            }
            $("#message").html(msg).show();
        }).always(function(xhr) {
            console.log(xhr);
        });

        $(".check_form").hide();
        $(".form-check-input").click(function() {
            if ($(this).is(":checked")) {
                $(".check_form").show();
            } else {
                $(".check_form").hide();
            }
        });

        // Delete
        $(document).on('click', '.delete', function(e) {
            if (confirm("Are you sure delete this user Detail!")) {
                let user_id = $(this).data('id');
                let arr = {
                    action: 'delete',
                    user_id: user_id
                };
                var request = JSON.stringify(arr);
                $.ajax({
                    method: "POST",
                    url: "controller/user.php",
                    data: request,
                    dataType: "JSON",
                    async: false,
                    headers: {
                        "Content-Type": "application/json"
                    },
                    beforeSend: function() {
                        console.log(request);
                    },
                }).done(function(Response) {
                    $('#user_table').DataTable().ajax.reload();
                    $("#message").html(Response.msg).show();
                    $("#notice").removeClass("d-none");
                    $("#notice").removeClass("hide");
                    $("#notice").addClass("d-block");
                    $("#notice").addClass("show");
                }).fail(function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseJSON.msg;
                    }
                    $("#message").html(msg).show();
                }).always(function(xhr) {
                    console.log(xhr);
                });
            }
        });

        // Update
        $(document).on('click', '.edit', function(e) {
            $('#password').val('');
            let user_id = $(this).data('id');
            let arr = {
                action: 'get',
                user_id: user_id,
            };
            var request = JSON.stringify(arr);
            $.ajax({
                method: "POST",
                url: "controller/user.php",
                data: request,
                dataType: "JSON",
                async: false,
                headers: {
                    "Content-Type": "application/json"
                },
                beforeSend: function() {
                    console.log(request);
                },
            }).done(function(Response) {
                title = $("#add_user_modalLabel").html("Update user Detail");
                $.each(Response.data, function(index, value) {
                    console.log(value);
                    $("#user_id").val(value.user_id);
                    $("#name").val(value.name);
                    $("#email_id").val(value.email_id);
                    $("#mobile_no").val(value.mobile_no);
                    $("#user_type_id").val(value.user_type_id);
                    $("#username").val(value.username);
                    $("#user_type_id").trigger('change');
                    $("#user_designation_id").val(value.user_designation_id);
                    $("#seniority_by_years").val(value.seniority_by_years);
                    if (value.login_access == 1) {
                        $('#login_access').prop('checked', true);
                        $(".check_form").show();
                    }else{
                        $('#login_access').prop('checked', false);
                        $(".check_form").hide();
                    }
                    $("#father_name").val(value.father_name);
                    $("#email_personal").val(value.email_personal);
                    $("#mobile_2").val(value.mobile_2);
                    $("#address").val(value.address);
                    if (value.pincode != 0) {
                        $("#pincode").val(value.pincode);
                    } else {
                        $("#pincode").val('');
                    }
                });

                $("#add_user_modal").modal('show');

            }).fail(function(jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseJSON.msg;
                }
                $("#message").html(msg).show();
            }).always(function(xhr) {
                console.log(xhr);
            });
        });
        var DataTable = $("#user_table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            processing: true,
            serverSide: true,
            ajax: {
                url: "controller/user.php",
                type: "POST",
                dataType: "json",
                async: false,
                headers: {
                    "Content-Type": "application/json"
                },
                data: function(d) {
                    d.action = 'get';
                    return JSON.stringify(d);
                }
            },
            "columns": [{
                    "data": "s_no",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "name"
                },
                {
                    "data": "user_type"
                },
                {
                    "data": "email_id"
                },
                {
                    "data": "mobile_no"
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                },
            ]
        }).buttons().container().appendTo('#user_table_wrapper .col-md-6:eq(0)');
        // Add Button click
        let title = $("#add_user_modalLabel");
        let save = $("#save");
        $(document).on('click', '#add_user', function() {
            title.html("Add User");
            save.html("Add User");
            $("#user_id").val(0);
            let name = $("#name");
            let email_id = $("#email_id");
            let mobile_no = $("#mobile_no");
            let user_type_id = $("#user_type_id");
            let user_designation_id = $("#user_designation_id");
            let seniority_by_years = $("#seniority_by_years");
            let father_name = $("#father_name");
            let email_personal = $("#email_personal");
            let mobile_2 = $("#mobile_2");
            let address = $("#address");
            let pincode = $("#pincode");

            let name_error = $("#name-error");
            let email_id_error = $("#email_id-error");
            let mobile_no_error = $("#mobile_no-error");
            let user_type_id_error = $("#user_type_id_error");
            let email_personal_error = $("#email_personal-error");
            let user_designation_id_error = $("#user_designation_id-error");
            let mobile_2_error = $("#mobile_2-error");
            let pincode_error = $("#pincode-error");
            name.removeClass('is-invalid');
            email_id.removeClass('is-invalid');
            mobile_no.removeClass('is-invalid');
            user_type_id.removeClass('is-invalid');
            email_personal.removeClass('is-invalid');
            mobile_2.removeClass('is-invalid');
            pincode.removeClass('is-invalid');
            user_designation_id.removeClass('is-invalid');
            name_error.hide();
            email_id_error.hide();
            mobile_no_error.hide();
            user_type_id_error.hide();
            email_personal_error.hide();
            mobile_2_error.hide();
            pincode_error.hide();
            user_designation_id_error.hide();
            $("#msg").hide();
            $("#username").val('');
            $("#seniority_by_years").val(0);
            $("#user_type_id").val('');
            $("#user_type_id").trigger('change');
            $("#name").val("");
            $("#name").val("").prop('disabled', false);
            $("#email_id").val("");
            $("#email_id").val("").prop('disabled', false);
            $("#mobile_no").val("");
            $("#password").val("");
            $("#mobile_no").val("").prop('disabled', false);
            $("#user_type_id").val("");
            $("#user_designation_id").val(0);
            $("#seniority_by_years").val(0);
            $("#father_name").val("");
            $("#email_personal").val("");
            $("#mobile_2").val("");
            $("#address").val("");
            $("#pincode").val("");
            $("#user_type_id").val("").prop('disabled', false);
            $('#user_from').trigger("reset");
        });
        $.validator.setDefaults({
            submitHandler: function(e) {
                let user_id = $.trim($("#user_id").val());
                let name = $.trim($("#name").val());
                let email_id = $.trim($("#email_id").val());
                let mobile_no = $.trim($("#mobile_no").val());
                let user_type_id = $.trim($("#user_type_id").val());
                let username = '';
                let password = '';
                let action = 'add';
                let login_access = 0;
                if ($("#login_access").is(":checked")) {
                    login_access = 1;
                    username = $.trim($("#username").val());
                    password = $.trim($("#password").val());
                }
                let user_designation_id = $.trim($("#user_designation_id").val());
                let seniority_by_years = $.trim($("#seniority_by_years").val());
                let father_name = $.trim($("#father_name").val());
                let email_personal = $.trim($("#email_personal").val());
                let mobile_2 = $.trim($("#mobile_2").val());
                let address = $.trim($("textarea#address").val());
                let pincode = $.trim($("#pincode").val());
                if (user_id > 0) {
                    action = 'update';
                }
                let arr = {
                    action: action,
                    user_id: user_id,
                    name: name,
                    email_id: email_id,
                    mobile_no: mobile_no,
                    user_type_id: user_type_id,
                    user_designation_id: user_designation_id,
                    seniority_by_years: seniority_by_years,
                    login_access: login_access,
                    username: username,
                    password: password,
                    father_name: father_name,
                    email_personal: email_personal,
                    mobile_2: mobile_2,
                    address: address,
                    pincode: pincode
                };
                var request = JSON.stringify(arr);
                $.ajax({
                    method: "POST",
                    url: "controller/user.php",
                    data: request,
                    dataType: "JSON",
                    async: false,
                    headers: {
                        "Content-Type": "application/json",
                    },
                    beforeSend: function() {
                        console.log(request);
                    },
                }).done(function(Response) {
                    $("#add_user_modal").modal('hide');
                    $("#user_table").DataTable().ajax.reload();
                    $("#message").html(Response.msg).show();
                    $("#user_id").val(0);
                    $("#name").val('');
                    $("#email_id").val('');
                    $("#mobile_no").val('');
                    $("#seniority_by_years").val(0);
                    $("#user_type_id").val('');
                    $("#notice").removeClass("d-none");
                    $("#notice").removeClass("hide");
                    $("#notice").addClass("d-block");
                    $("#notice").addClass("show");
                }).fail(function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseJSON.msg;
                    }
                    $("#message").html(msg).show();
                }).always(function(xhr) {
                    console.log(xhr);
                });
            }
        });
        // form validation
        $('#user_form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email_id: {
                    required: true,
                    minlength: 8
                },
                mobile_no: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true,
                },
                user_type_id: {
                    required: true,
                },
                user_designation_id: {
                    required: true,
                    min: 1
                },
                username: {
                    required: {
                        depends: function(element) {
                            return $("#login_access").is(":checked");
                        }
                    }
                },
                password: {
                    required: {
                        depends: function(element) {
                            if ($("#login_access").is(":checked")) {
                                let user_id = $.trim($("#user_id").val());
                                if (user_id == 0) {
                                    return true;
                                } else {
                                    return false;
                                }

                            }
                        }
                    }
                },
                email_personal: {
                    email: true
                },
                mobile_2: {
                    minlength: 10,
                    maxlength: 10,
                    digits: true,
                },
                pincode: {
                    minlength: 6,
                    maxlength: 6,
                    digits: true,
                }
            },
            messages: {
                name: {
                    required: "Please enter a User Name",
                    minlength: "User Name must be at least 3 characters long.",
                },
                email_id: {
                    required: "Please provide a User Email",
                    minlength: "User Email must be at least 8 characters long.",
                },
                mobile_no: {
                    required: "Please provide a User Mobile",
                    minlength: "User Mobile must be at least 10 digits long.",
                },
                user_type_id: {
                    required: "Please provide a User Type.",
                },
                user_designation_id: {
                    required: "Please select User Designation.",
                    min: "Please select User Designation.",
                },
                username: {
                    required: "Please provide a Username.",
                    minlength: "User Name must be at least 8 Character long.",
                },
                password: {
                    required: "Please provide a Password.",
                    minlength: "Password must be at least 6 Character long.",
                },
                mobile_no2: {
                    minlength: "This field must be have 10 digits",
                    maxlength: "This field must be have 10 digits",
                    digits: true,
                },
                email_personal: {
                    email: "This field must be the type of email"
                },
                pincode: {
                    minlength: "This field must be have 6 digits",
                    maxlength: "This field must be have 6 digits",
                    digits: true,
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $(document).on('change', '#user_type_id', function() {
            var user_type_id = $(this).val();
            let arr = {
                action: 'get_by_user_type_id',
                user_type_id: user_type_id
            };
            if (user_type_id > 0) {
                $.ajax({
                    method: "POST",
                    url: "controller/designation.php",
                    data: JSON.stringify(arr),
                    dataType: "JSON",
                    async: false,
                    headers: {
                        "Content-Type": "application/json"
                    },
                    beforeSend: function() {
                        console.log(request);
                    },
                }).done(function(Response) {
                    if (Response.data.length > 0) {
                        $('#user_designation_id').html('<option value="0">Select User Designation</option>');
                        $.each(Response.data, function(index, value) {
                            $('#user_designation_id').append('<option value="' + value.user_designation_id + '">' + value.user_designation + '</option>');
                        });
                    } else {
                        $('#user_designation_id').html('<option value="0">No Designation Found</option>');
                    }

                }).fail(function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseJSON.msg;
                    }
                    $("#message").html(msg).show();
                }).always(function(xhr) {
                    console.log(xhr);
                });
            } else {
                $('#user_designation_id').html('<option value="0">Select User Type First</option>');
            }

        });
    });
</script>
<?= $this->include("include/footer"); ?>