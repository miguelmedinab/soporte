<div class="outter-wp">
    <!--custom-widgets-->
    <div class="custom-widgets">
        <div class="row-one">
            <div class="col-md-3 widget">
                <div class="stats-left ">
                    <h5>Total casos en la semana</h5>
                    <h4>Hardware</h4>
                </div>
                <div class="stats-right">
                    <label>90</label>
                </div>
                <div class="clearfix"> </div>	
            </div>
            <div class="col-md-3 widget states-mdl">
                <div class="stats-left">
                    <h5>Total casos en la semana</h5>
                    <h4>Software</h4>
                </div>
                <div class="stats-right">
                    <label> 85</label>
                </div>
                <div class="clearfix"> </div>	
            </div>
            <div class="col-md-3 widget states-thrd">
                <div class="stats-left">
                    <h5>Total casos en la semana</h5>
                    <h4>Red</h4>
                </div>
                <div class="stats-right">
                    <label>51</label>
                </div>
                <div class="clearfix"> </div>	
            </div>
            <div class="col-md-3 widget states-last">
                <div class="stats-left">
                    <h5>Total casos en la semana</h5>
                    <h4>Virus</h4>
                </div>
                <div class="stats-right">
                    <label>30</label>
                </div>
                <div class="clearfix"> </div>	
            </div>
            <div class="clearfix"> </div>	
        </div>
    </div>
    <!--//custom-widgets-->
    <!--/charts-->
    <div class="charts">
        <div class="chrt-inner">
            <div class="chrt-bars">
                <div class="col-md-6 chrt-two">
                    <h3 class="sub-tittle">Cantidad de casos atendidos por Tecnico </h3>
                    <div id="chart2"></div>
                    <script src="<?php echo base_url(); ?>js/fabochart.js"></script>
                    <script>
                        $(document).ready(function () {
                        data = {
<?php foreach ($casos_atendidos as $casos ){
                               echo "'".$casos['tecnico_atencion']."'".':'.$casos['cantidad'].',';    
                               }
                                ?>
                        };
                        $("#chart1").faBoChart({
                        time: 500,
                                animate: true,
                                instantAnimate: true,
                                straight: false,
                                data: data,
                                labelTextColor: "#002561",
                        });
                        $("#chart2").faBoChart({
                        time: 2500,
                                animate: true,
                                data: data,
                                straight: true,
                                labelTextColor: "#002561",
                        });
                        });
                    </script>
                </div>
                <div class="col-md-6 chrt-three">
                    <h3 class="sub-tittle">Cantidad de casos atendidos por mes</h3>
                    <div id="chartdiv"></div>	
                    <script>
                        var chart = AmCharts.makeChart("chartdiv", {
                        "type": "serial",
                                "theme": "light",
                                "dataProvider": [{
                                "mes": 'enero',
                                        "value": 11.5,
                                        
                                }, {
                                "mes": 'febrero',
                                        "value": 26.2,
                                        
                                }, {
                                "mes": 'marzo',
                                        "value": 30.1,
                                        "error": 0
                                }, {
                                "mes": 'abril',
                                        "value": 29.5,
                                        
                                }, {
                                "mes": 'mayo',
                                        "value": 24.6,
                                       
                                }],
                                "balloon": {
                                "textAlign": "left"
                                },
                                "valueAxes": [{
                                "id": "v1",
                                        "axisAlpha": 0
                                }],
                                "startDuration": 1,
                                "graphs": [{
                                "balloonText": "value:<b>[[value]]</b>",
                                        
                                        "bulletSize": 10,
                                        "errorField": "error",
                                        "lineThickness": 2,
                                        "valueField": "value",
                                        "bulletAxis": "v1",
                                        "fillAlphas": 0
                                }, {
                                "bullet": "round",
                                        "bulletBorderAlpha": 1,
                                        "bulletBorderColor": "#FFFFFF",
                                        "lineAlpha": 0,
                                        "lineThickness": 2,
                                        "showBalloon": false,
                                        "valueField": "value"

                                }],
                                "chartCursor": {
                                "cursorAlpha": 0,
                                        "cursorPosition": "mouse",
                                        "graphBulletSize": 1,
                                        "zoomable": false
                                },
                                "categoryField": "mes",
                                "categoryAxis": {
                                "gridPosition": "start",
                                        "axisAlpha": 0
                                },
                                "export": {
                                "enabled": true
                                }
                        });
                    </script>
                </div>
                <div class="clearfix"> </div>
            </div>										
        </div>
        <!--/charts-inner-->
    </div>
    <!--//outer-wp-->
</div>
