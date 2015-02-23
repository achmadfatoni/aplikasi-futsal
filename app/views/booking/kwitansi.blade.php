<html>
    <head>

        <!-- CSS goes in the document HEAD or added to your external stylesheet -->
        <style type="text/css">
            /*table.gridtable {*/
                /*font-family: verdana,arial,sans-serif;*/
                /*font-size:11px;*/
                /*color:#333333;*/
                /*border-width: 10px;*/
                /*border-color: #00000;*/
                /*border-collapse: collapse;*/
                /*border-style: solid;*/
            /*}*/
            /*table.gridtable th {*/
                /*border-width: 1px;*/
                /*padding: 8px;*/
                /*border-style: solid;*/
                /*border-color: #666666;*/
                /*background-color: #dedede;*/
            /*}*/
            table.gridtable td {
                border-style: solid;
                border-width: 1px;
                border-color: #000000;
            }
        </style>
    </head>
    <body>
    <table class="gridtable">
        <tr>
            <td>No</td>
            <td>Lapangan</td>
            <td>Jam</td>
            <td>Tanggal</td>
        </tr>
        <?php $no = 1; ?>
        @foreach($booking as $data)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $data->lapangan->nama }}</td>
            <td>{{ $data->jam->nama }}</td>
            <td>{{ $data->tanggal }}</td>
        </tr>
        <?php $no++ ?>
        @endforeach
    </table>
    </body>
</html>
