<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $role = ($this->session->userdata['logged_in']['role']);
} else {
    header("location: /projectTPS/Clogin");
}
if ($role == "admin"){
    header("location: /projectTPS/Crud");
}
$this->load->view('navbar');
?>


<body>
    <center>
        <h1>Sistem Informasi dengan CodeIgniter</h1>
    </center>
    <center><?php echo anchor('crud/tambah', 'Tambah Data'); ?></center>
    <center><?php echo anchor('crud/graph', 'Tampil Chart'); ?></center>
    <table class="table table-striped" style="margin:20px auto;" border="1">
        <tr>
            <th>No</th>
            <th>produk</th>
            <th>harga</th>
            <th>jumlah</th>
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
            </tr>
        <?php } ?>
    </table>
</body>
