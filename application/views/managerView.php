<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $email = ($this->session->userdata['logged_in']['email']);
  $role = ($this->session->userdata['logged_in']['role']);
} else {
  header("location: Clogin");
}
$this->load->view('navbar');
?>

<body>

  <div class="container-fluid">
    <div class="row">

      <?php $this->load->view('navbarManager'); ?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="text-center mt-3">
          <h1>Perbandingan Stock 2 Toko</h1>
        </div>
        <div class="container text-center mb-5">
          <div class="row">
            <div class="col-6">
              <h3>Toko 1</h3>
              <canvas id="myChart"></canvas>
            </div>
            <div class="col-6 ">
              <h3>Toko 2</h3>
              <canvas id="myChart2"></canvas>
            </div>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script type="text/javascript">
          var ctx = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: [
                <?php
                if (count($graph) > 0) {
                  foreach ($graph as $data) {
                    echo "'" . $data->produk . "',";
                  }
                }
                ?>
              ],
              datasets: [{
                label: 'Jumlah',
                backgroundColor: [
                  "#DEB887",
                  "#A9A9A9",
                  "#DC143C",
                  "#F4A460",
                  "#2E8B57",
                  "#1D7A46",
                  "#CDA776",
                ],
                borderColor: [
                  "#CDA776",
                  "#989898",
                  "#CB252B",
                  "#E39371",
                  "#1D7A46",
                  "#F4A460",
                  "#CDA776",
                ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1],
                data: [
                  <?php
                  if (count($graph) > 0) {
                    foreach ($graph as $data) {
                      echo $data->jumlah . ", ";
                    }
                  }
                  ?>
                ]
              }]
            },
          });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script type="text/javascript">
          var ctx2 = document.getElementById('myChart2').getContext('2d');
          var chart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
              labels: [
                <?php
                if (count($graph2) > 0) {
                  foreach ($graph2 as $data2) {
                    echo "'" . $data2->produk . "',";
                  }
                }
                ?>
              ],
              datasets: [{
                label: 'Jumlah',
                backgroundColor: [
                  "#DEB887",
                  "#A9A9A9",
                  "#DC143C",
                  "#F4A460",
                  "#2E8B57",
                  "#1D7A46",
                  "#CDA776",
                ],
                borderColor: [
                  "#CDA776",
                  "#989898",
                  "#CB252B",
                  "#E39371",
                  "#1D7A46",
                  "#F4A460",
                  "#CDA776",
                ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1],
                data: [
                  <?php
                  if (count($graph2) > 0) {
                    foreach ($graph2 as $data2) {
                      echo $data2->jumlah . ", ";
                    }
                  }
                  ?>
                ]
              }]
            },
          });
        </script>
      </main>
    </div>
  </div>
</body>