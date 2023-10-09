@extends('layouts.apps')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">    
<div class="container-fluid">
    <a href="{{ route('export', ['selectedDate' => $selectedDate ]) }}" class="btn btn-info" target="_blank">
        PRINT
        <i class="fas fa-print"></i>
    </a>
    <a href="{{route('refresh')}}" class="btn btn-success">
        REFRESH DATA
        <i class="fas fa-sync-alt"></i>
    </a>
    <a href="{{route('clear')}}" class="btn btn-danger">
        CLEAR DATA
        <i class="fas fa-trash"></i>
    </a>    
    <a class="btn">
    <form action="{{ route('pickDate') }}" method="GET">
    <div class="input-group date">
        <input type="date" name="date" class="form-control" value="{{ $selectedDate }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
        </div>
    </div>
    </form>
    </a>  

    

</div>
<br>

<div class="card">
    <div class="card-header border-transparent">
        <h2 class="card-title">LAPORAN HARIAN HASIL PRODUKSI JOINT W/H</h2>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <div class="card-body p-0">
        <div class="table-responsive">            
            <table class="table m-0">
                <thead>
                    <tr>
                    <th>No Harness</th>
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
    </div>    
</div>

</div>

<script>    
    $(document).ready(function () {
        var note = $('#Modal').data('note');

        // Set the textarea value to the note variable
        $('#message-text').val(note);

        // When the save button is clicked...
        $('#save-note-btn').click(function () {
            // Send the AJAX request to the server
            $.ajax({
                url: '{{ route('pickDate') }}',
                type: 'POST',
                data: {
                    // Fetch the CSRF Token generated in app.blade.php
                    _token: '{{ csrf_token() }}',
                    // Fetch the note from our form
                    note: $('#message-text').val()
                },
                // Tell jQuery what to do when the request is finished
                // Here, we just reload the page
                success: function () {
                    location.reload();
                }
            });
        });        
    })    
</script>



@endsection
