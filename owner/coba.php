<?php
include'config.php';
$query = "SELECT * FROM treatment  ORDER BY kd_treatment";
$result = mysqli_query($connect, $query);
$query2 = "SELECT * FROM treatment  ORDER BY kd_treatment";
$result2 = mysqli_query($connect, $query2);
?>
<script src="chart/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 60%;
                margin: 15px auto;
            }
        </style>
        <div class="container">
            <canvas id="myChart" width="100" height="50"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                <?php
                $a="kkk";
                $b=30
                ?>
            
                data: {
                    labels: [<?php while ($p = mysqli_fetch_array($result)) { echo '"' . $p['kd_treatment'] . '",';}?>],
                    datasets: [{
                        label: '',
                            data: [
                                <?php
                                while($data = mysqli_fetch_array($result2)){
                                $kd_treatment=$data['kd_treatment'];
                                $tampil=mysqli_query($connect,"SELECT count(*) as 'jumlah' FROM detail_booking INNER JOIN treatment ON detail_booking.kd_treatment=treatment.kd_treatment INNER JOIN booking ON detail_booking.kd_booking=booking.kd_booking where detail_booking.kd_treatment ='$kd_treatment' AND status_book='check in' AND tgl_booking LIKE '2019-01%' OR detail_booking.kd_treatment ='$kd_treatment' AND status_book='check out' AND tgl_booking LIKE '2019-01%'")or die(mysqli_error($connect));
                                $a=mysqli_fetch_array($tampil)or die(mysqli_error($connect)); 
                                echo '"' . $a['jumlah'] . '",'; }
                                ?> 
                                ],

                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
        </div>