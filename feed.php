
<?php 
include('adhead.php');
if(!isset($_SESSION['userdata']))
{
    header('Location: index.php');
}
if($_SESSION['userdata']['is_admin']==1){
include('adsidebar.php'); 

if(isset($_GET['action']))
{
    $id=$_GET['id'];
    
    if($_GET['action']=='blk')
    {
        $ap=2;
        $adm = new adminwrk();
        $admc = new dbcon();
        $sho = $adm->yesno($ap,$id,$admc->conn);
    }

    if($_GET['action']=='app')
    {
        $ap=1;
        $adm = new adminwrk();
        $admc = new dbcon();
        $sho = $adm->yesno($ap,$id,$admc->conn);
    }

    elseif($_GET['action']=='no')
    {
        $ap=0;
        $adm = new adminwrk();
        $admc = new dbcon();
        $sho = $adm->yesno($ap,$id,$admc->conn);
    }
}
?>

<body>
<div class="container-fluid">
  <h3 class="text-center">All Users</h3>
    
    <table id='tbl' class="container-fluid col-lg-10 mr-lg-2 table table-responsive table-hover table-bordered table-striped">
    <thead>
<tr> 
     <th>Name</th>
     <th>Text</th>
</tr>
</thead>
<tbody>
<?php
 $sql2 = "SELECT * from feedback";
 $result2 = $conn->query($sql2);
 if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
    ?>
  <tr>
     <td><?php echo $row2['name'];?></td>
  <td><?php echo $row2['feedback'];?></td>
  </tr>
 <?php } }?>
   </tbody>
    </table>
    <?php
        $sql = "SELECT feedback FROM feedback";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    $texts = array();
    while($row = $result->fetch_assoc()) {
        $texts[] = $row["feedback"];
    }
    $url = 'http://127.0.0.1:5000/sentiment';
    $data = json_encode(array('texts' => $texts));
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => $data,
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $result = json_decode($result, true);

    $positive = $result['positive'];
    $negative = $result['negative'];
    $neutral = $result['neutral'];
    $total = $positive + $negative + $neutral;

    $pos_percent = ($positive / $total) * 100;
    $neg_percent = ($negative / $total) * 100;
    $neu_percent = ($neutral / $total) * 100;
    $pos_accuracy = ($pos_percent > $neg_percent) ? $pos_percent : (100 - $neg_percent);
    $neg_accuracy = ($neg_percent > $pos_percent) ? $neg_percent : (100 - $pos_percent);
    $neutral_accuracy = ($neu_percent > ($pos_percent + $neg_percent)) ? $neu_percent : (100 - ($pos_percent + $neg_percent));

   } else {
    echo "No feedback data found in the database.";
    $pos_percent = 0;
    $neg_percent = 0;
    $neu_percent=0;
    $neu_percent = 0;
    $pos_accuracy = 0;
    $neg_accuracy = 0;
    $neu_accuracy = 0;
    $neutral_accuracy=0;
}
?>


  </div>
  <div class="chart-container" style="width:55%; height:100%;">
        <canvas id="sentiment-chart"></canvas>
    </div>
  <?php 
  
}
else{
    echo '<h1 class="text-center text-weight-bold text-dark">You Are not Authorised</h1>';
  }
  
  include('adfoot.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        var ctx = document.getElementById('sentiment-chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Positive', 'Negative', 'Neutral'],
                datasets: [{
                    label: 'Sentiment Analysis percentage',
                    data: [<?php echo $pos_percent; ?>, <?php echo $neg_percent; ?>, <?php echo $neu_percent; ?>],
                    backgroundColor: [
                        '#118f1e',
                        '#c61e2e',
                        '#062784'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize:10,
                            max: 100
                        }
                    }
          
                }
            }
      
        });
    </script>
    </body>