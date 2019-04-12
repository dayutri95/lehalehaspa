 <div class="card-body">
            <h1 class="card-title">Treatment</h1>
            <?php

            $tgl=$_POST['tgl'];
            $hasil =  mysqli_query($connect, "SELECT booking.tgl_booking,detail_booking.kd_booking,treatment.nama_treatment,detail_booking.harga,detail_booking.serv,detail_booking.tax,detail_booking.subtotal,therapist.nama_therapist FROM detail_booking INNER JOIN treatment ON detail_booking.kd_treatment=treatment.kd_treatment INNER JOIN therapist ON detail_booking.kd_therapist=therapist.kd_therapist INNER JOIN booking ON booking.kd_booking=detail_booking.kd_booking WHERE status_book='check in' AND tgl_booking='$tgl' OR status_book='check out' AND tgl_booking='$tgl' ")or die(mysqli_error($connect));
            ?>
            <?php
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Booking</th>
                  <th>Treatment</th>
                  <th>Harga</th>
                  <th>Service</th>
                  <th>Tax</th>
                  <th>Subtotal</th>
                  <th>Therapist</th>
                </tr> 
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
        
                echo "
                <tr>
                  <td>$data[kd_booking]</td>
                  <td>$data[nama_treatment]</td>
                  <td>$data[harga]</td>
                  <td>$data[serv]</td>
                  <td>$data[tax]</td>
                  <td>$data[subtotal]</td>
                  <td>$data[nama_therapist]</td>
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
              ?>
            </div>
            <div class="card-body">
            <h1 class="card-title">Produk</h1>
            <?php

            $tgl=$_POST['tgl'];
            $hasil =  mysqli_query($connect, "SELECT booking.tgl_booking,detail_booking.kd_booking,treatment.nama_treatment,detail_booking.harga,detail_booking.serv,detail_booking.tax,detail_booking.subtotal,therapist.nama_therapist FROM detail_booking INNER JOIN treatment ON detail_booking.kd_treatment=treatment.kd_treatment INNER JOIN therapist ON detail_booking.kd_therapist=therapist.kd_therapist INNER JOIN booking ON booking.kd_booking=detail_booking.kd_booking WHERE status_book='check in' AND tgl_booking='$tgl' OR status_book='check out' AND tgl_booking='$tgl' ")or die(mysqli_error($connect));
            ?>
            <?php
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Booking</th>
                  <th>Treatment</th>
                  <th>Harga</th>
                  <th>Service</th>
                  <th>Tax</th>
                  <th>Subtotal</th>
                  <th>Therapist</th>
                </tr> 
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
        
                echo "
                <tr>
                  <td>$data[kd_booking]</td>
                  <td>$data[nama_treatment]</td>
                  <td>$data[harga]</td>
                  <td>$data[serv]</td>
                  <td>$data[tax]</td>
                  <td>$data[subtotal]</td>
                  <td>$data[nama_therapist]</td>
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
              ?>
            </div>