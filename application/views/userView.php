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
} else if ($role == "mngr"){
    header("location: /projectTPS/Crud/manajer");
}
$this->load->view('navbar');
?>


<body>
    <center>
        <h1>Sistem Informasi dengan CodeIgniter</h1>
    </center>
    
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
                    <?php echo anchor('crud/beli/' . $u->id, 'Beli'); ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
