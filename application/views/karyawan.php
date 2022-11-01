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
                    <h1>Grafik Rentang Umur Karyawan</h1>
                </div>
                <div class="container text-center mb-5">
                    <div class="row">
                        <div class="col-6">
                            <h3>Pria</h3>
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="col-6 ">
                            <h3>Wanita</h3>
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
                                '15-20', '21-25', '26-30', '31-35', '36-40', '41-45'
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
                                    $v15s20 = 0;
                                    $v21s25 = 0;
                                    $v26s30 = 0;
                                    $v31s35 = 0;
                                    $v36s40 = 0;
                                    $v41s45 = 0;
                                    if (count($graph) > 0) {
                                        foreach ($graph as $data) {
                                           if ($data->umur >= 15 && $data->umur <= 20) {
                                                $v15s20++;
                                            } else if ($data->umur >= 21 && $data->umur <= 25) {
                                                $v21s25++;
                                            } else if ($data->umur >= 26 && $data->umur <= 30) {
                                                $v26s30++;
                                            } else if ($data->umur >= 31 && $data->umur <= 35) {
                                                $v31s35++;
                                            } else if ($data->umur >= 36 && $data->umur <= 40) {
                                                $v36s40++;
                                            } else if ($data->umur >= 41 && $data->umur <= 45) {
                                                $v41s45++;
                                            }   
                                        }
                                    }
                                    ?>
                                    <?php echo $v15s20; ?>,
                                    <?php echo $v21s25; ?>,
                                    <?php echo $v26s30; ?>,
                                    <?php echo $v31s35; ?>,
                                    <?php echo $v36s40; ?>,
                                    <?php echo $v41s45; ?>
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
                                '15-20', '21-25', '26-30', '31-35', '36-40', '41-45'
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
                                    $v15s20 = 0;
                                    $v21s25 = 0;
                                    $v26s30 = 0;
                                    $v31s35 = 0;
                                    $v36s40 = 0;
                                    $v41s45 = 0;
                                    if (count($graph2) > 0) {
                                        foreach ($graph2 as $data) {
                                           if ($data->umur >= 15 && $data->umur <= 20) {
                                                $v15s20++;
                                            } else if ($data->umur >= 21 && $data->umur <= 25) {
                                                $v21s25++;
                                            } else if ($data->umur >= 26 && $data->umur <= 30) {
                                                $v26s30++;
                                            } else if ($data->umur >= 31 && $data->umur <= 35) {
                                                $v31s35++;
                                            } else if ($data->umur >= 36 && $data->umur <= 40) {
                                                $v36s40++;
                                            } else if ($data->umur >= 41 && $data->umur <= 45) {
                                                $v41s45++;
                                            }   
                                        }
                                    }
                                    ?>
                                    <?php echo $v15s20; ?>,
                                    <?php echo $v21s25; ?>,
                                    <?php echo $v26s30; ?>,
                                    <?php echo $v31s35; ?>,
                                    <?php echo $v36s40; ?>,
                                    <?php echo $v41s45; ?>
                                ]
                            }]
                        },
                    });
                </script>
            </main>
        </div>
    </div>
</body>