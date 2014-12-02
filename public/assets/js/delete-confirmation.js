var btnDelete = $(".btn-delete");
btnDelete.click(function () {
    var konfirmasi = confirm("apakah anda yakin ingin menghapus data ini?");
    if (konfirmasi == true) {
        return true;
    } else {
        return false;
    }
});