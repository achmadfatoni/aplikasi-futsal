<script>
$(document).ready(function(){
   var formLapangan = $('#formLapangan');
   formLapangan.validate({
      rules : {
          'nama': 'required',
          'harga_siang': {
              'required' : true,
              'number' : true,
          },
          'harga_malam': {
              'required' : true,
              'number' : true,
          },
      },
      messages : {
          'nama' : 'Nama harus diisi',
          'harga_siang' : {
              'required' : 'Harga Siang harus diisi',
              'number' : 'Harga Siang harus angka',
          },
          'harga_malam' : {
              'required' : 'Harga Malam harus diisi',
              'number' : 'Harga Malam harus angka',
          },
      },
   });
});
</script>