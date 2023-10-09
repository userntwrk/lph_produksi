@extends('layouts.apps')

@section('content')

<div class="container-fluid">
    <a href="/export" class="btn btn-info" target="_blank">        
        PRINT
        <i class="fas fa-print"></i>
    </a>
<!-- <a class="btn">
    <div class="input-group date">
        <input type="text" id="datepicker" class="form-control datetimepicker-input" value="{{ $selectedDate }}">
        <div class="input-group-append">
            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
        </div>
    </div>
</a> -->

<!-- Display date selection dropdown -->
<br><br><select id="date-selector" class="form-control mb-3">
    @foreach($shifts as $date)
    <option value="{{ $date->shift }}" {{ $selectedDate == $date->shift ? 'selected' : '' }}>
        {{ strval($date->shift) }}
    </option>
    @endforeach
</select>
</div>

<div class="card">
    <div class="card-header border-transparent">
        <h2 class="card-title">LAPORAN HARIAN HASIL PRODUKSI W/H</h2>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
<!-- Display data based on selected date -->
<div class="card-body p-0">
        <div class="table-responsive">            
            <table class="table m-0">
                <thead>
                    <tr>
                    <th>No Hardness</th>
                        <th>No Lot</th>
                        <th>Kode Joint</th>                        
                        <th>CAB 1
                        <table class="table m-0">
                            <tr>
                                <td>SKM</td>
                                <td>SIZE</td>
                            </tr>
                        </table>
                        </th>                        
                        <th>CAB 2
                        <table class="table m-0">
                            <tr>
                                <td>SKM</td>
                                <td>SIZE</td>
                            </tr>
                        </table>
                        </th>
                        
                        <th>CAB 3
                        <table class="table m-0">
                            <tr>
                                <td>SKM</td>
                                <td>SIZE</td>
                            </tr>
                        </table>
                        </th>

                        <th>CAB 4
                        <table class="table m-0">
                            <tr>
                                <td>SKM</td>
                                <td>SIZE</td>
                            </tr>
                        </table>
                        </th>
                        
                        <th>CAB 5
                        <table class="table m-0">
                            <tr>
                                <td>SKM</td>
                                <td>SIZE</td>
                            </tr>
                        </table>
                        </th>
                        
                        <th>CAB 6
                        <table class="table m-0">
                            <tr>
                                <td>SKM</td>
                                <td>SIZE</td>
                            </tr>
                        </table>
                        </th>
                        
                        <th>C/H (+- 0.05*) / POS CABANG
                        <table class="table m-0">
                            <tr>
                                <td>STD</td>
                                <td>N1</td>
                                <td>N2</td>
                                <td>N3</td>
                            </tr>
                        </table>
                        </th>

                        <th>TEST TARIK
                        <table class="table m-0">
                            <tr>
                                <td>STD</td>
                                <td>N1</td>                                
                            </tr>
                        </table>
                        </th>                        
                        <th>HASIL</th>
                        <th>WASTE
                        <table class="table m-0">
                            <tr>
                                <td>SETTING</td>
                                <td>TES</td>
                            </tr>
                        </table>
                        </th>                                                                 
                    </tr>
                </thead>
                @foreach ($data as $row)
                <tbody>
                    <tr>
                        <td>{{$row->partname}}</td>
                        <td>{{$row->NoLot}}</td>
                        <td>{{$row->kodejoint}}</td>              
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->skema_1}}</td>
                                    <td>{{$row->size_1}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->skema_2}}</td>
                                    <td>{{$row->size_2}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->skema_3}}</td>
                                    <td>{{$row->size_3}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->skema_4}}</td>
                                    <td>{{$row->size_4}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->skema_5}}</td>
                                    <td>{{$row->size_5}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->skema_6}}</td>                                    
                                    <td>{{$row->size_6}}</td>                                    
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->std_ch}}</td>
                                    <td>{{$row->N1}}</td>
                                    <td>{{$row->N2}}</td>
                                    <td>{{$row->N3}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->std_tes}}</td>
                                    <td>{{$row->N1_tes}}</td>
                                </tr>
                            </table>
                        </td>
                        <td>{{$row->Hasil}}</td>
                        <td>
                            <table class="table m-0">
                                <tr>
                                    <td>{{$row->w_setting}}</td>                                    
                                    <td>{{$row->w_tes}}</td>                                    
                                </tr>
                            </table>
                        </td>                        
                    </tr>           
                </tbody>        
                @endforeach        
            </table>            
        </div>
        <!-- /.table-responsive -->
    </div>
</div>

<!-- <script>
    // Initialize the datepicker
    $(function() {
        var datepicker = $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        // Set the selected date on the datepicker
        var selectedDate = "{{ $selectedDate }}";
        datepicker.datepicker('setDate', new Date(selectedDate));

        // Handle date selection change
        datepicker.on('changeDate', function(event) {
            var selectedDate = event.format();
            var url = "{{ route('demo') }}?date=" + selectedDate;

            // Redirect to the URL with the selected date
            window.location.href = url;
        });
    });
</script> -->

<script>
    // Handle date selection change
    document.getElementById('date-selector').addEventListener('change', function(event) {        
        var selectedDate = event.target.value;
        var url = "{{ route('demo') }}?date=" + selectedDate;
        window.location.href = url;
    });
</script>
</div>
@endsection