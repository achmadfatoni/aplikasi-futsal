<script>
$(document).ready(function(){
   var formJam = $('#formJam');
   formJam.validate({
      rules : {
          'nama': 'required',
      },
      messages : {
          'nama' : 'Nama harus diisi',
      },
   });
});
</script>