<script>
    $(document).ready(function(){
       var formKaryawan = $('#formKaryawan');
       formKaryawan.validate({
           rules: {
             'nama' : 'required',
             'alamat' : 'required',
           },
           messages: {
             'nama' : 'Nama harus diisi',
             'alamat' : 'Alamat harus diisi',
           },
       })
    });
</script>