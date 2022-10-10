<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/projectTPS/Crud">NextTech</a>
        <form class="d-flex" action="<?= base_url('/Crud/search') ?>" method="get">
            <input name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
</nav>