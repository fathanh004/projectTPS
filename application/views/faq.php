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

    <section class="py-3 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw" style="color: #12106C; font-weight: 400;">Frequently Asked Questions</h1>
                <p class="lead text-muted">Halaman ini berisi pertanyaan yang sering ditanyakan
                <p>
                </p>
            </div>
        </div>
    </section>
    <div class="container">
        <h4 class="text-center">Cari Pertanyaan</h4>
        <form class="d-flex" action="<?= base_url('/Crud/searchFAQ') ?>" method="get">
            <input name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="py-3 text-left container">
        <div class="accordion" id="accordionExample">
            <?php
            if (isset($pertanyaan)) {
                $no = 0;
                foreach ($pertanyaan as $p) { 
                $no++;    
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?= $no?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $no?>" aria-expanded="true" aria-controls="collapse<?= $no?>">
                                <?php echo $p->pertanyaan ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $no?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $no?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php echo $p->jawaban ?>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <section class="py-5 container text-center">
        <form action="<?= base_url('/Crud/tambahFAQ') ?>" method="post">
            <div class="mb-3">
                Pertanyaan anda belum terjawab? Tanyakan saja!
                <textarea class="form-control" name="quest" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #12106C; border: #12106C;">Submit</button>
        </form>
    </section>
</body>