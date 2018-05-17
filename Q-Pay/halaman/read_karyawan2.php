<body>
<div class="container">
  <div class="row">
    <div class="box-body table-responsive no-padding">
    <table class="table table-striped table-bordered">
      <tbody>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="timeline.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Karyawan</li>
      </ol>
      <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h4>
                    <b class="glyphicon glyphicon-user">Data Karyawan</b>
                    <a class="btn btn-success pull-right" data-toggle="modal" data-target="#add_new_record_modal">
                    <i class="glyphicon glyphicon-plus" ></i> Tambah
                    </a>
                </h4>
            </div>
            <!--
            <h3>Records:</h3>
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
            </div>
            -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Data Baru</h4>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label class="control-label" for="nama_krywn">Nama</label>
                    <input type="text" id="nama_krywn" placeholder="Masukan nama anda" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="alamat_krywn">Alamat</label>
                    <input type="text" id="alamat_krywn" placeholder="Alamat anda di mana" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="email_krywn">Email</label>
                    <input type="text" id="email_krywn" placeholder="Masukan alamat email anda" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="telp_krywn">No Telp</label>
                    <input type="text" id="telp_krywn" placeholder="Masukan Nomor Telp anda" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="id_toko">Toko</label>
                    <input type="text" id="id_toko" placeholder="ID Toko anda" class="form-control"/>
                </div>
            </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="nama_krywn">Nama</label>
                    <input type="text" id="update_nama_krywn" placeholder="Masukan nama anda" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="alamat_krywn">Alamat</label>
                    <input type="text" id="update_alamat_krywn" placeholder="Alamat anda di mana" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email_krywn">Email</label>
                    <input type="text" id="update_email_krywn" placeholder="Masukan alamat email anda" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="telp_krywn">No Telp</label>
                    <input type="text" id="update_telp_krywn" placeholder="Masukan Nomor Telp anda" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="id_toko">Toko</label>
                    <input type="text" id="update_id_toko" placeholder="ID Toko anda" class="form-control"/>
                </div>  

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Jquery JS file -->
<script type="text/javascript" src="./dist/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="./js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script>
    // Add Record
function addRecord() {
    // get values
    var nama_krywn = $("#nama_krywn").val();
    var alamat_krywn = $("#alamat_krywn").val();
    var email_krywn = $("#email_krywn").val();
    var telp_krywn = $("#telp_krywn").val();
    var id_toko = $("#id_toko").val();

    // Add record
    $.post("./ajax/addRecord.php", {
        nama_krywn: nama_krywn,
        alamat_krywn: alamat_krywn,
        email_krywn: email_krywn,
        telp_krywn: telp_krywn,
        id_toko: id_toko
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#nama_krywn").val("");
        $("#alamat_krywn").val("");
        $("#email_krywn").val("");
        $("#telp_krywn").val("");
        $("#id_toko").val("");
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
    $.post("./ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nama_krywn").val(user.nama_krywn);
            $("#update_alamat_krywn").val(user.alamat_krywn);
            $("#update_email_krywn").val(user.email_krywn);
            $("#update_telp_krywn").val(user.telp_krywn);
            $("#update_id_toko").val(user.id_toko);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var nama_krywn = $("#update_nama_krywn").val();
    var alamat_krywn = $("#update_alamat_krywn").val();
    var email_krywn = $("#update_email_krywn").val();
    var telp_krywn = $("#update_telp_krywn").val();
    var id_toko = $("update_id_toko").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("./ajax/updateUserDetails.php", {
            id: id,
            nama_krywn: nama_krywn,
            alamat_krywn: alamat_krywn,
            email_krywn: email_krywn,
            telp_krywn: telp_krywn,
            id_toko: id_toko
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

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75591362-1', 'auto');
    ga('send', 'pageview');

    </script>

      </tbody>
    </table>
  </div>
  </div>
</div>
</body>

