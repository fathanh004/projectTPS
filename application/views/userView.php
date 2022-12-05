<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $role = ($this->session->userdata['logged_in']['role']);
} else {
    header("location: /projectTPS/Clogin");
}
if ($role == "admin") {
    header("location: /projectTPS/Crud");
} else if ($role == "mngr") {
    header("location: /projectTPS/Crud/manajer");
}
$this->load->view('navbar');
?>


<body>
    <center>
        <h1>TOKO 1</h1>

    </center>
    <?php if ($top3 != null) { ?>
    <div class="container text-center mt-3 mb-3">
        <h3>3 Barang Paling Laris!</h3>
        <div class="row">
            <?php
            
                foreach ($top3 as $t) { ?>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $t->produk ?></h5>
                                <p class="card-text">STOK : <?= $t->jumlah ?> </p>
                                <p>HARGA : <?= $t->harga ?></p>
                                <a href="beli/<?= $t->id ?>" class="btn btn-primary">BELI</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <h2 align="center">Daftar Barang</h2>
    <table class="table table-striped" style="margin:20px auto;" border="1">
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Terjual</th>
            <th>Action</th>

        </tr>
        <?php
        $no = 1;
        foreach ($user as $u) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $u->produk ?></td>
                <td><?php echo $u->harga ?></td>
                <td><?php echo $u->jumlah ?></td>
                <td>
                    <?php echo $u->terjual ?>
                </td>
                <td>
                    <?php echo anchor('crud/beli/' . $u->id, 'Beli'); ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>