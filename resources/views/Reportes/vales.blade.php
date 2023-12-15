<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Carta Responsiva</title>
      <style type="text/css">
        a {
          color: #5D6975;
          text-decoration: underline;
        }
        p {
          font-size:20px; /* 1.4em x 10px = 14px */
        }

        body {
          font-size: 12px; 
          font-family: Arial;
        }

        header {
          padding: 10px 0;
        }

        #logo {
          text-align: center;
          margin-bottom: 20px;
        }

        #logo img {
          width: 50%;
        }

        h1 {
          border-top: 1px solid  #5D6975;
          border-bottom: 1px solid  #5D6975;
          color: #5D6975;
          font-size: 2.4em;
          line-height: 1.4em;
          font-weight: normal;
          text-align: center;
          margin: 0 0 20px 0;
          background: url('/img/brand/dimension.png');
        }

        #project {
          text-align: left;
          font-size: 1.1em;
        }

        #project span {
          color: #5D6975;
        }

        .sec_table{
          margin: 2em 0;
        }

        table{
          width: 100% !important;
        }

        table th{
          background: #eeeeee;
        }

        table, th, td {
            border: 1px solid #cccccc;
            padding: .5em ;
            border-collapse: collapse;
        }

        .sec_total{
            border-bottom: 1px solid #cccccc;
          text-align: right;
          font-size: 1.2em;
          padding: .5em 0;
          padding-right: 1em;
        }
        footer {
          color: #5D6975;
          width: 100%;
          height: 30px;
          position: absolute;
          bottom: 0;
          border-top: 1px solid #C1CED9;
          padding: 8px 0;
          text-align: center;
          font-size:20px;
        }

        .firmas{
          padding: 5px;
          border-top: 0px;
          border-right: 0px;
          border-bottom: 1px solid black;
          border-left: 0px;
        }
        .interlineado { line-height: 20%;} 
        small {
            font-size: .7em
        }
      </style>


  </head>
  <body>
    <header >
      <h1>Vales</h1>
    </header>
    <div id="borde">
      <p style="text-align: right;">{{$fecha}} Villahermosa, Tabasco</p>
      <p>Yo, <strong>{{$detallevales[0]->vales->usuario->name}} {{$detallevales[0]->vales->usuario->ap_paterno}}  {{$detallevales[0]->vales->usuario->ap_materno}}</strong>, responsable del
       departamento {{$detallevales[0]->vales->usuario->subarea->area->nombre}}, con centro de costo {{$detallevales[0]->vales->usuario->subarea->nombre}}, Certifico:<br><br>Me hago a cargo de este vale con folio:  {{$detallevales[0]->id}} que contiene los siguientes productos:<br></p>
      <br>
      <table style="width:100%">
        <tr>
            <th>Cantidad solicitada</th>
            <th>Unidad</th>
            <th>Codigo</th>
            <th>Productos</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
      @foreach($detallevales as $detallevale)
        <tr>
            <td>{{$detallevale->cantidad}}</td>
            <td>{{$detallevale->productos->medida}}</td>
            <td>{{$detallevale->productos->id}}</td>
            <td>{{$detallevale->productos->nombre}}</td>
            <td></td>
            <td></td>

        </tr>
      @endforeach
       <tfoot>
        <th colspan="4"></th>
        <th>Total</th>
        <th><h4 id="total"></h4><input type="hidden" name="total" id="total_re"></input></th>
      </tfoot>
    </table>
<br><br>
      <table class="firmas" style="border:none;" style="width:100%">
          <tr>
              <td style="border:none;">
                <p style="text-align: center;"> <small><strong>Solicitante</strong></small></p>
                <p style="text-align: center;"><strong>___________</strong></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->usuario->name}} {{$detallevales[0]->vales->usuario->ap_paterno}} </small></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->usuario->ap_materno}}</small></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->usuario->telefono}}</small></p>
              </td>
              <td style="border:none;">
                <p style="text-align: center;"><small><strong>Autorizo</strong></small></p>
                <p style="text-align: center;"><strong>___________</strong></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->presupuesto->autorizo->name}} {{$detallevales[0]->vales->presupuesto->autorizo->ap_paterno}} </strsmallong></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->presupuesto->autorizo->ap_materno}}</small></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->presupuesto->autorizo->telefono}}</small></p>
              </td>
              <td style="border:none;">
                <p style="text-align: center;"><small><strong>Almacenista</strong></small></p>
                <p style="text-align: center;"><strong>____________</strong></p>
                <p class="interlineado" style="text-align: center;"><small>{{$usuario[0]->name}} {{$usuario[0]->ap_paterno}} </small></p>
                <p class="interlineado" style="text-align: center;"><small>{{$usuario[0]->ap_materno}}</small></p>
                <p class="interlineado" style="text-align: center;"><small>{{$usuario[0]->telefono}}</small></p>
              </td>
              <td style="border:none;">
                <p style="text-align: center;"><small><strong>Recibio</strong></small></p>
                <p style="text-align: center;"><strong>____________</strong></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->usuario->name}} {{$detallevales[0]->vales->usuario->ap_paterno}} </small></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->usuario->ap_materno}}</small></p>
                <p class="interlineado" style="text-align: center;"><small>{{$detallevales[0]->vales->usuario->telefono}}</small></p>
              </td>
          </tr>
      </table>      
    </div>

    <footer>
      @ Todos los derechos reservados, Villahermosa, Tabasco
    </footer>
  </body>
</html>