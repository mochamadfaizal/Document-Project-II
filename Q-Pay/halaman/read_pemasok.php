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
        <li class="breadcrumb-item active">Data Pemasok</li>
      </ol>
      <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h4>
                    <b class="glyphicon glyphicon-user">Data Pemasok</b>
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
                    <label class="control-label" for="nama">Nama Pemasok</label>
                    <input type="text" id="nama" placeholder="Masukan nama Pemasok" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="alamat">Alamat Pemasok</label>
                    <input type="text" id="alamat" placeholder="Alamat Pemasok" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="telp_pmsk">No Telp Pemasok</label>
                    <input type="text" id="no_telp" placeholder="Masukan Nomor Telp Pemasok" class="form-control"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="id_toko">Toko</label>
                    <input type="text" id="id_toko" placeholder="ID Toko" class="form-control"/>
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
                    <label for="nama">Nama</label>
                    <input type="text" id="update_nama" placeholder="Masukan nama Pemasok" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="update_alamat" placeholder="Alamat Pemaosk" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" id="update_no_telp" placeholder="Masukan Nomor Telp Pemasok" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="id_toko">Toko</label>
                    <input type="text" id="update_id_toko" placeholder="ID Toko" class="form-control"/>
                </div>  

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateUserDetails()" >Save Changes</button>
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
    var nama = $("#nama").val();
    var alamat = $("#alamat").val();
    var no_telp = $("#no_telp").val();
    var id_toko = $("#id_toko").val();

    // Add record
    $.post("./CrudPemasok/addRecord.php", {
        nama: nama,
        alamat: alamat,
        no_telp: no_telp,
        id_toko: id_toko
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#nama").val("");
        $("#alamat").val("");
        $("#no_telp").val("");
        $("#id_toko").val("");
    });
}

// READ records
function readRecords() {
    $.get("./CrudPemasok/readRecord.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("./CrudPemasok/deleteUser.php", {
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
    $.post("./CrudPemasok/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nama").val(user.nama);
            $("#update_alamat").val(user.alamat);
            $("#update_no_telp").val(user.no_telp);
            $("#update_id_toko").val(user.id_toko);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function updateUserDetails_pemasok() {
    // get values
    var nama = $("#update_nama").val();
    var alamat = $("#update_alamat").val();
    var no_telp = $("#update_no_telp").val();
    var id_toko = $("#update_id_toko").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("./CrudPemasok/updateUserDetails.php", {
            nama: nama,
            alamat: alamat,
            no_telp: no_telp,
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

