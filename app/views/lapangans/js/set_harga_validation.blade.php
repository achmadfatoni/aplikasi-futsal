<script>
    $(document).ready(function(){
        var formSetHarga = $('#formSetHarga');
        formSetHarga.validate({
            rules : {
                'harga': 'required',
            },
            messages : {
                'harga' : 'Harga harus diisi',
            },
        });
    });
</script>