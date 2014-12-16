<script>
    $(document).ready(function(){
       var formPendaftaran = $('#formPendaftaran');
       formPendaftaran.validate({
          rules:{
              'nama' : 'required',
              'alamat' : 'required',
              'no_telp' : {
                'required': true,
                'number' : true,
              },
              'jenis_customer' : 'required',
              'username' : 'required',
          },
          messages:{
              'nama' : 'Nama harus diisi',
              'alamat' : 'Alamat harus diisi',
              'no_telp' : {
                  'required' : 'No Telepon harus diisi',
                  'number' : 'No Telepon hanya boleh diisi angka',
              },
              'jenis_customer' : 'jenis customer harus diisi',
              'username' : 'Username harus diisi',
          }
       });
    });
</script>