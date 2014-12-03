<script>
$(document).ready(function(){
   var formLapangan = $('#formLapangan');
   formLapangan.validate({
      rules : {
          'nama': 'required',
      },
      messages : {
          'nama' : 'Nama harus diisi',
      },
   });
});
</script>