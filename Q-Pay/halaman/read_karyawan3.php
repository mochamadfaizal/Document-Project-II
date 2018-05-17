<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="box-body table-responsive no-padding">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="timeline.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Data Karyawan</li>
                </ol>
                <div class="container">
                    <button class="btn btn-primary" data-target="#exampleModal" data-toggle="modal" data-whatever="@mdo" type="button">Open modal for @mdo</button> 
                    <button class="btn btn-primary" data-target="#exampleModal" data-toggle="modal" data-whatever="@fat" type="button">Open modal for @fat</button> 
                    <button class="btn btn-primary" data-target="#exampleModal" data-toggle="modal" data-whatever="@getbootstrap" type="button">Open modal for @getbootstrap</button> ...more buttons...
                    <div aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="control-label" for="recipient-name">Recipient:</label> <input class="form-control" id="recipient-name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="message-text">Message:</label> 
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" type="button">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- // Modal -->
                    <!-- Custom JS file -->
                    <script>
                    $('#exampleModal').on('show.bs.modal', function (event) {
                     var button = $(event.relatedTarget) // Button that triggered the modal
                     var recipient = button.data('whatever') // Extract info from data-* attributes
                     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                     var modal = $(this)
                     modal.find('.modal-title').text('New message to ' + recipient)
                     modal.find('.modal-body input').val(recipient)
                    })

                    </script> <!--
<script>
    // Add Record
function addRecord() {
    // get values
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();

    // Add record
    $.post("./ajax/addRecord.php", {
        first_name: first_name,
        last_name: last_name,
        email: email
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#first_name").val("");
        $("#last_name").val("");
        $("#email").val("");
    });
}

// READ records
function readRecords() {
    $.get("./ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("./ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
    var email = $("#update_email").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("./ajax/updateUserDetails.php", {
            id: id,
            first_name: first_name,
            last_name: last_name,
            email: email
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
</script>
-->
                    <!--
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75591362-1', 'auto');
    ga('send', 'pageview');

    </script>
    -->
                </div>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <!-- Breadcrumbs -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>