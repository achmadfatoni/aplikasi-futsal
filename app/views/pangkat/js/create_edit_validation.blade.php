<script>
$(document).ready(function(){
    var formPangkat = $('#formPangkat');
    formPangkat.validate({
        rules : {
            'name' : 'required',
            'gaji' : {
                'required' : true,
                'number' : true,
            },
        },
        'messages' : {
            'name' :   'Nama harus diisi',
            'gaji' : {
                'required' : 'Gaji Harus Diisi',
                'number' : 'Gaji harus angka',
            }
        }
    })
})

</script>