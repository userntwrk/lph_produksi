<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Harian Produksi W/H</title>        
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet">
</head>
<body>
<style type="text/css">        
        .header {
            position: fixed;            
            display: content;            
            page: header;
            /* page-break-inside: avoid; */
            top: 0;
            left: 0;
            right: 0;
        }

        .content{
            /* page-break-before: avoid; */
            /* page-break-inside: auto; */            
            position: relative;
            left: 0;
            right: 0;
            top: 300px;
            /* bottom: 300px; */
            /* border: 1px solid; */
            /* margin-top: 300px; */
            /* margin-bottom: 300px; */
        }

        .footer {
            /* page-break-inside: avoid; */
            position: fixed;
            display: content;
            page: footer;
            top: 1260px;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .page-break {
            page-break-before: always;
            /* page-break-after: auto; */
        }

        @media print {
            .header, .footer {
                display: table-row-group;   
            }

            /* table {
                counter-reset: 5;
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            thead {
                display: table-header-group;
            }
            tfoot {
                display: table-footer-group;
            }         */
        }
    </style>

<!-- <div class="page-break"></div>  -->
<div class="header">    
    <div class="align-self-start mr-left">
        <table class="table table-bordered" style="width: 100%">
            <thead>
                <tr>
                <th rowspan="3" style="vertical-align: text-top; text-align: left; font-size: 20px; border-top: hidden; border-left: hidden; border-right: hidden">
                    IPG-FORM/PROD-1/WH/JNT-02<br>
                    REV : 1<br>
                    DATE : {{date('d-m-Y')}}              
                </th>                                
                <th rowspan="3" style="vertical-align: middle; text-align: center; font-size: 38px; width: 40% ; border-top: hidden; border-left: hidden; border-right: hidden">PT INDOPRIMA GEMILANG<br>
                    LAPORAN HARIAN PRODUKSI JOINT W/H
                </th>

                    <td class="font-weight-bold" style = "border-bottom: hidden; border-top: hidden"></td>

                    <th class="font-weight-bold" colspan="3" style="vertical-align: middle; text-align: center; font-size: 18px">PEMERIKSAAN AWAL KERJA</th>
                </tr>

                <tr>
                <td class="font-weight-bold" style = "border-bottom: hidden; border-top: hidden"></td>
                <td class="font-weight-bold" style= "vertical-align: middle; text-align: center; width: 20%; font-size: 18px">CEK POINT</td>
                    <td class="font-weight-bold" style= "vertical-align: middle; text-align: center; width: 4%; font-size: 18px">OK</td>
                    <td class="font-weight-bold" style= "vertical-align: middle; text-align: center; width: 4%; font-size: 18px">NG</td>
                </tr>
                <tr>
                <td class="font-weight-bold" style = "border-bottom: hidden; border-top: hidden"></td>
                    <td style="text-size:12px">Dislay Pada Mesin Joint</td>
                    <td class="font-weight-bold" style= "text-align: center; width: 4%"></td>
                    <td class="font-weight-bold" style= "text-align: center; width: 4%"></td>
                </tr>
            </thead>             
            <tfoot>
                <tr rowspan="3">                    
                    <th class="font-weight-bold" style="width: 30%; font-size: 18px">OPERATOR : {{$base->name}}</th>
                
                    <th class="font-weight-bold" style="width: 30%; font-size: 18px">NO REG   : {{$base->no_reg}}</th>
                    
                    <td class="font-weight-bold" style = "border-bottom: hidden; border-top: hidden"></td>
                    <td style= "text-size:12px;">Kondisi Angka di penggaris terlihat jelas</td>

                    <td class="font-weight-bold"></td>
                    <td class="font-weight-bold"></td>
                </tr>                
            </tfoot>
            <tfoot>
                <tr rowspan="3">                    
                    <td class="font-weight-bold" style="font-size: 18px">TANGGAL : {{$selectedDate->format('d-m-Y')}}</td>                    
                                
                    <td class="font-weight-bold" style="font-size: 18px">SHIFT   : {{$shif}}</td>

                    <td class="font-weight-bold" style = "border-bottom: hidden; border-top: hidden"></td>
                    
                    <td style= "text-size:12px;">Sebelum digunakan mikrometer pada posisi</td>
                    <td class="font-weight-bold"></td>
                    <td class="font-weight-bold"></td>
                </tr>
        </table>
    </div>
</div><br> <!-- end of header --> 

<div class="footer">
            <div class="row">                              
                <em>
                <input type="text" style="height: 30px; width: 820px; font-size: 25px; font-weight:normal; color:black; border:transparent" value="- C/H SESUAI STANDAR TERMINAL">
                </em>
                <input type="text" style="height: 40px; width: 530px; text-align:center; font-size: 25px; color:black; border:transparent" value="Catatan : ">              
        </div>                
            
        <div class="row"><em>
            <input type="text" style="height: 20px; width: 800px; font-size: 25px; font-weight:normal; color:black; border:transparent" value="- POSISI GAMBAR CABANG SESUAI GAMBAR JOINT"> 
        </em></div>

        <br>

        <div class="row">
        <div class="align-self-end text-end">
            <table class="table table-sm table-bordered" style="text-align: center; width: 100%">
                <thead>
                    <tr>
                        <th style="width: 70%; border-top: hidden; border-left: hidden; border-bottom: hidden"></th>
                        <th style="width: 15%">DIBUAT</th>                                                                           
                        <th style="width: 15%">DIPERIKSA</th>                                                                        
                    </tr>
                </thead>                            
                <tbody>
                    <tr>
                        <th style="width: 70%; border-top: hidden; border-left: hidden; border-bottom: hidden"></th>
                        <th style="width: 15%">
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                        </th>
                        <th style="width: 15%">
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                        </th>
                    </tr>
                </tbody>                
                <tfoot>
                    <tr>
                        <th style="width: 70%; border-top: hidden; border-left: hidden; border-bottom: hidden"></th>
                        <th style="width: 15%">OPERATOR</th>                                                  
                        <th style="width: 15%">SUPERVISOR</th>                                                
                    </tr>                    
                </tfoot>
            </table>
            </div>        
        </div>                
    
            </div> <!-- end of footer -->
            
        <div class="content">            
            <table class="table table-sm table-bordered" style="text-align: center; padding-bottom: 0px; margin-bottom: 0px;">
                <thead>
                    <tr>
                        <th style="vertical-align: middle; text-align: center">NO HARNESS</th>
                        <th style="vertical-align: middle; text-align: center">NO LOT</th>
                        <th style="vertical-align: middle; text-align: center">KODE JOINT *)</th>                        
                        <th style="margin:0px">CAB 1
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>SKM</th>
                                <th>SIZE</th>
                            </tr>
                        </table>
                        </th>                        
                        <th>CAB 2
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>SKM</th>
                                <th>SIZE</th>
                            </tr>
                        </table>
                        </th>
                        
                        <th>CAB 3
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>SKM</th>
                                <th>SIZE</th>
                            </tr>
                        </table>
                        </th>

                        <th>CAB 4
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>SKM</th>
                                <th>SIZE</th>
                            </tr>
                        </table>
                        </th>
                        
                        <th>CAB 5
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>SKM</th>
                                <th>SIZE</th>
                            </tr>
                        </table>
                        </th>
                        
                        <th>CAB 6
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>SKM</th>
                                <th>SIZE</th>
                            </tr>
                        </table>
                        </th>
                        
                        <th>C/H (+- 0.05*) / POS CABANG
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>Std</th>
                                <th>N1</th>
                                <th>N2</th>
                                <th>N3</th>
                            </tr>
                        </table>
                        </th>

                        <th>TEST TARIK
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>Std</th>
                                <th>N1</th>                                
                            </tr>
                        </table>
                        </th>                        
                        <th style="vertical-align: middle; text-align: center">HASIL</th>
                        <th>WASTE
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>SETTING</th>
                                <th>TES</th>
                            </tr>
                        </table>
                        </th>         
                        <th>JAM
                        <table class="table table-bordered" style="text-align: center; margin:0px;">
                            <tr>
                                <th>START</th>
                                <th>FINISH</th>
                            </tr>
                        </table>
                        </th>         
                    </tr>
                </thead>                
                @foreach ($data->chunk(19) as $chunk)
                    @foreach ($chunk as $row)
                <tbody>
                    <tr>                        
                        <td>{{$row->partname}}</td>
                        <td>{{$row->NoLot}}</td>
                        <td>{{$row->kodejoint}}</td>              
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->skema_1}}</td>
                                    <td>{{$row->size_1}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->skema_2}}</td>
                                    <td>{{$row->size_2}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->skema_3}}</td>
                                    <td>{{$row->size_3}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->skema_4}}</td>
                                    <td>{{$row->size_4}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->skema_5}}</td>
                                    <td>{{$row->size_5}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->skema_6}}</td>                                    
                                    <td>{{$row->size_6}}</td>                                    
                                </tr>
                            </table>
                        </td>
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->std_ch}}</td>
                                    <td>{{$row->N1}}</td>
                                    <td>{{$row->N2}}</td>
                                    <td>{{$row->N3}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->std_tes}}</td>
                                    <td>{{$row->N1_tes}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>{{$row->Hasil}}</td>
                        
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->w_setting}}</td>                                    
                                    <td>{{$row->w_tes}}</td>                                    
                                </tr>
                            </table>
                        </td>                        
                        <td>
                        <table class="table" style="text-align: center; margin:0px; border-top: hidden; border-left: hidden; border-bottom: hidden; border-right: hidden;">
                                <tr>
                                    <td>{{$row->start}}</td>
                                    <td>{{$row->end}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>           
                </tbody>                        
                @endforeach    
                @if (!$loop->last)
                        <tr class="page-break"></tr>
                    @endif                    
                    @endforeach
                <tfoot>                    
                    <tr>
                        <td colspan="11" class="text-center" style="border-left: hidden; border-bottom: hidden"></td>
                        <td>{{$sum}}</td>
                        <td colspan="2" style="border-right: hidden; border-bottom: hidden"></td>
                    </tr>                                                            
            </table><br> 
            
           
            
            </div> <!-- end of content -->
            
            
            


            <!-- <p class="h4"> -->
                <!-- CATATAN : <br>
                {{ $note }}<br>                 -->
            <!-- </p><br> -->

            
        
        <!-- <div class="align-self-left text-left">

        </div>

        <div class="align-self-center text-center">
            
        </div>                 -->
<!-- </div> -->
    <script>
        // Update page numbers in footer
        window.onload = function () {
            var pageCount = window.document.getElementsByClassName('page-number');
            for (var i = 0; i < pageCount.length; i++) {
                pageCount[i].textContent = i + 1;
            }
        }
    </script>
    </body> 
</html>