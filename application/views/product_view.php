<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $role = ($this->session->userdata['logged_in']['role']);
} else {
    header("location: Clogin");
}
if ($role == "user") {
    header("location: /projectTPS/Crud/biasa");
}
$this->load->view('navbar');
?>

<body>
    <center>
        <h1>Sistem Informasi dengan CodeIgniter</h1>
    </center>
    <center><?php echo anchor('crud/tambah', 'Tambah Data'); ?></center>

    <table class="table table-striped" style="margin:20px auto;" border="1">
        <tr>
            <th>No</th>
            <th>produk</th>
            <th>harga</th>
            <th>jumlah</th>
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
                    <?php echo anchor('crud/edit/' . $u->id, 'Edit'); ?>
                    <?php echo anchor('crud/hapus/' . $u->id, 'Hapus'); ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>