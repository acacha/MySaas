@extends('layouts.app')

@section('htmlheader_title')
    Daily sales report
@endsection

@section('custom_scripts')
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dailySales').dataTable();
        } );

        var ctx = document.getElementById("barChartDailySales").getContext("2d");
        var data = {
            labels: {!! json_encode($days) !!},
            datasets: [ {
                data: {!! json_encode($totals) !!},
                label: "Daily Sales",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)"
            }
            ]
        }
        var myBarChart = new Chart(ctx).Bar(data);

    </script>
@endsection

{{ json_encode($days) }} || {{ json_encode($totals) }}

@section('custom_css')
    <link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-xs-10">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daily reports Sales</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="dailySales">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($totals as $index => $total)
                                    <tr>
                                        <td> {{$days[$index]}}</td>
                                        <td> {{$total}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-10">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bar Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="barChartDailySales" style="height: 226px; width: 494px;" width="617" height="282"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>


@endsection