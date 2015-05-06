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
                border-width: 0.5px;
                border-color: #000000;
            }
            .text-center {
                text-align: center;
            }
        </style>
    </head>
    <body>
    <section id="container" class="print">
        <!-- <section id="main-content"> -->
        <section class="container">

            <section class="panel">
                <div class="panel-body invoice">
                    <table class="gridtable" width="100%">
                        <tr>
                            <td colspan="3">Username :</td>
                            <td>{{ Auth::user()->username }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center">Lapangan</td>
                            <td class="text-center">Jam</td>
                            <td class="text-center">Tanggal</td>
                        </tr>
                        <?php $no = 1; ?>
                        @foreach($booking as $data)
                            <tr>
                                <td class="text-center">{{ $no }}</td>
                                <td class="text-center">{{ $data->lapangan->nama }}</td>
                                <td class="text-center">{{ $data->jam->nama }}</td>
                                <td class="text-center">{{ $data->tanggal }}</td>
                            </tr>
                            <?php $no++ ?>
                        @endforeach
                    </table>
                </div>
            </section>

            <!-- </section> -->
            <!-- </section> -->
        </section>


    </body>
</html>
