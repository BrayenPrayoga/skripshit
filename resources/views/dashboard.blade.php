@extends('template.main')

@section('css')
<style>
    .highcharts-credits{
        display:none;
    }
</style>
@endsection

@section ('content')
<!-- BEGIN: Content -->
<div class="content">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-6">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 lg:col-span-12 mt-8">
                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div id="bar-chart"></div>
                    </div>
                </div>
                <!-- END: Sales Report -->
            </div>
        </div>
        
        <div class="col-span-12 2xl:col-span-6">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 lg:col-span-12 mt-8">
                    <div class="intro-y box p-5 mt-12 sm:mt-5">
                        <div id="pie-chart"></div>
                    </div>
                </div>
                <!-- END: Sales Report -->
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->
@endsection

@section('javascript')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script>
    $(document).ready(function(){
        getDataBarChart();
        getDataPieChart();
    });

    function getDataBarChart(){
        $.get("{{ URL::to('dashboard/bar-chart') }}", function(res){
            defaultBarChart(res);
        });
    }

    function defaultBarChart(res){
        const chart = new Highcharts.Chart({
            chart: {
                renderTo: 'bar-chart',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 50,
                    viewDistance: 25
                }
            },
            xAxis: {
                categories: res.category
            },
            yAxis: {
                title: {
                    enabled: false
                }
            },
            title: {
                text: 'JUMLAH TIKET',
                align: 'center'
            },
            subtitle: {
                text: '',
                align: 'center'
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            series: res.series
        });
    }

    function getDataPieChart(){
        $.get("{{ URL::to('dashboard/pie-chart') }}", function(res){
            defaultPieChart(res);
        });
    }

    function defaultPieChart(res){
        Highcharts.chart('pie-chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'LAPORAN WEEKLY',
                align: 'center'
            },
            subtitle: {
                text: '',
                align: 'center'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: res
        });
    }
</script>
@endsection