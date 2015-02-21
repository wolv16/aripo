
@extends('layouts.baseartesanos')
@section('titulo') Reportes
@endsection
@section('contenido')

<div class="container wellr">
    <div class="col-sm-12">
    <form id="filtros">
        
        <div class="col-md-8 wellr col-md-offset-2">
            <h4 style="text-align: center; color: #cc0000;">REPORTE DEL PADRÓN ARTESANAL</h4>
            <div class="bg-orga col-md-12 text-center">REGIONES</div>

            <label class="checkbox-inline">
              <input name="region1" type="checkbox" value="1"><strong> Mixteca</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region2" type="checkbox" value="2"><strong> Valles</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region3" type="checkbox" value="3"> <strong>Istmo</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region4" type="checkbox" value="4"><strong> Papaloapan</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region5" type="checkbox" value="5"> <strong>Sierra Norte</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region6" type="checkbox" value="6"> <strong>Sierra Sur</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region7" type="checkbox" value="7"><strong> Cañada</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region8" type="checkbox" value="8"><strong> Costa</strong>
            </label>
        </div>


        <div class="row col-md-8 wellr col-md-offset-2">
            <div class="bg-orga col-md-12 text-center">RAMAS ARTESANALES</div>
            <div class="col-md-4">
            <label class="checkbox-inline">
              <input name="rama2" type="checkbox" value="2"> <strong>Textiles</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama3" type="checkbox" value="3"> <strong>Madera</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama4" type="checkbox" value="4"> <strong>Cerería</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama5" type="checkbox" value="5"> <strong>Metalistería</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama6" type="checkbox" value="6"> <strong>Orfebrería</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama7" type="checkbox" value="7"> <strong>Joyería</strong>
            </label>
            </div>
            <div class="col-md-4">
            <label class="checkbox-inline">
              <input name="rama13" type="checkbox" value="13"> <strong>Arte Huichol</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama15" type="checkbox" value="15"> <strong>Concha y Caracol</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama16" type="checkbox" value="16"> <strong>Vidrio</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama17" type="checkbox" value="17"> <strong>Plumaría</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama11" type="checkbox" value="11"> <strong>Maque y Laca</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama14" type="checkbox" value="14"> <strong>Cuerno y Hueso</strong>
            </label>
            </div>
            <div class="col-md-4">
            <label class="checkbox-inline">
              <input name="rama8" type="checkbox" value="8"> <strong>Fibras Vegetales</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama9" type="checkbox" value="9"> <strong>Cartonería y Papel</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama10" type="checkbox" value="10"> <strong>Talabartería y Peletería</strong>
            </label><br>
            <label class="checkbox-inline">
              <input name="rama12" type="checkbox" value="12"> <strong>Lapidaría y Cantería</strong>
            </label><br>
             <label class="checkbox-inline">
              <input name="rama1" type="checkbox" value="1"> <strong>Alfarería y Cerámica</strong>
            </label>
            </div>
        </div>

        <div class="wellr col-sm-2 col-md-offset-5">
           <div class="bg-orga col-md-12 text-center">GÉNERO</div>
            <label class="checkbox-inline">
              <input name="hombre" type="checkbox" value="Masculino"><strong> Hombres</strong>
            </label>
            <label class="checkbox-inline">
              <input name="mujer" type="checkbox" value="Femenino"><strong> Mujeres</strong>
            </label>
        </div>

        <div class="col-md-2 col-md-offset-5">
        <div class="col-md-12">
        <button type="button" class="btn btn-ioa" style="margin-top:10px;" onclick="reporte()"><i class="fa fa-line-chart"></i> Generar reporte</button>
        </div>
        </div>
        <div class="col-md-12"><hr></div>
    </form>
</div>
<div class="row">
        <div>
            <div class="row">
                <div class="col-md-6">
                    <span id="titulo" class="col-md-11 text-center"></span>

                </div>
                <div class="col-md-6">  
                    <span id="titulo2" class="col-md-11 text-center"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <span id="conteo2" class="col-md-5"></span>
                    <span id="conteo3" class="col-md-6"></span>
                </div>
            </div>
            <div id="grafica1" class="row col-md-3 col-md-offset-1" style="height: 250px; margin-bottom: 40px;"></div>
            
        </div>
            <div id="grafica2" class="col-md-7 col-md-offset-1" style="height: 300px; margin-bottom: 40px; text-align: center;">  
            </div>
            <div class="col-md-12">  
                <span id="titulo3" class="col-md-12 text-center"></span>
            </div>
            <div id="grafica3" class="col-md-8 col-md-offset-2" style="height: 300px; margin-top: 60px; margin-bottom: 40px; text-align: center;">
            </div>
</div>
</div>
@stop
@section('scripts')
    <script>
        function reporte () {
            $.post('reportes/reporte',$('#filtros').serialize(), function(json) {
                // console.log(json);
                $('#grafica1').html('');
                $('#grafica2').html('');
                $('#grafica3').html('');
                if (json.sexo) {
                    $('#conteo2').html('<label>Mujeres: '+((json.sexo.mujeres)/(json.sexo.hombres+json.sexo.mujeres)).toFixed(4)*100+'%</label>');
                    $('#conteo3').html('<label>Hombres: '+((json.sexo.hombres)/(json.sexo.hombres+json.sexo.mujeres)).toFixed(4)*100+'%</label>');
                    $('#titulo').html('<label><h3> Total de artesanos: '+(json.sexo.hombres+json.sexo.mujeres)+'</h3></label>');
                    Morris.Donut({
                        element: 'grafica1',
                        data: data(json.sexo),
                        backgroundColor: '#F7F7F7',
                        labelColor: '#2B2B2B',
                        colors: [
                            '#0BD318',
                            '#FF2D55',
                        ],
                    });
                };
                if (json.region) {
                    $('#titulo2').html('<label><h3>Total de artesanos por región</h3></label>');
                    Morris.Bar({
                        element: 'grafica2',
                        data: data(json.region),
                        xkey: 'label',
                        ykeys: ['value'],
                        labels: ['No. de Artesanos'],
                        barColors: ['#0B62A4'],
                        gridTextColor: ['#cc0000']
                    });
                };
                if (json.rama) {
                    $('#titulo3').html('<label><h3>Total de artesanos por rama artesanal</h3></label>');
                    Morris.Bar({
                        element: 'grafica3',
                        data: data(json.rama),
                        xkey: 'label',
                        ykeys: ['value'],
                        labels: ['No. de Artesanos'],
                        barColors: ['#FFCC00'],
                        gridTextColor: ['#000000'],
                        xLabelAngle: 90
                    });
                };
            }, 'json');
        }
        function data (json) {
            var data = [];
            ii = 0;
            $.each(json,function(index,i){
                var obj = {label:Object.keys(json)[ii++],value:i}
                data.push(obj);
            });
            console.log(data);
            return data;
        }
    </script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48188").addClass("current_page_item ");
    });
</script>
@endsection