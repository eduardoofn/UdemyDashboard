<html>
  <head>
    <script type="text/javascript">
      google.charts.load('current');
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cidade', 'População'],
          <?php

          include 'conexao.php';
          $sql = "SELECT * FROM cidades";
          $buscar = mysqli_query($conexao,$sql);

          while($dados = mysqli_fetch_array($buscar)){
                $cidade = $dados['cidade'];
                $populacao = $dados['populacao'];
          
          ?>
          ['<?php echo $cidade?>',  <?php echo $populacao?>],
          <?php }?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico_pizza'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="grafico_pizza" style="height: 400px"></div>
  </body>
</html>
