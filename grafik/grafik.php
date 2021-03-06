<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

</body>
  <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_akademik";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $conn->query("SELECT COUNT(*) as jumlah, nmprodi FROM mahasiswa inner join prodi using(idprodi) group by nmprodi");
    $q->setFetchMode(PDO::FETCH_ASSOC); 
  ?>

<script type="text/javascript">

Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Browser market shares in January, 2018'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [
  {
    name: 'Brands',
    colorByPoint: true,
    data: [

  <?php 
    while($row = $q->fetch()){ 
  ?>
    {
      name: <?php echo "'".$row['nmprodi']."'"; ?>,
      y: <?php echo $row['jumlah']; ?>,
      sliced: true,
      selected: true
    },
    
  <?php     
    }
  ?>

    ]
  }]
});	




</script>


</html>