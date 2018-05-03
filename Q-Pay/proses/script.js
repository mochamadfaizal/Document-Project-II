// Add Record
function addRecord() {
    // get values
    var nama_krywn = $("#nama_krywn").val();
    var alamat_krywn = $("#alamat_krywn").val();
    var email_krywn = $("#email_krywn").val();
    var telp_krywn = $("#telp_krywn").val();
    var id_toko = $("#id_toko").val();

    // Add record
    $.post("ajax/addRecord.php", {
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
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
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
    var id_toko = $("#update_id_toko").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
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