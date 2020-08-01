<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cidade', 'População',{ role: 'annotation' }],
          <?php

          include 'conexao.php';
          $sql = "SELECT * FROM cidades";
          $buscar = mysqli_query($conexao,$sql);

          while($dados = mysqli_fetch_array($buscar)){
                $cidade = $dados['cidade'];
                $populacao = $dados['populacao'];
          
          ?>
          ['<?php echo $cidade?>',  <?php echo $populacao?>,<?php echo $populacao?>],
          <?php }?>
        ]);

        var options = {
          title: 'Primeiro Grafico',
          //curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
