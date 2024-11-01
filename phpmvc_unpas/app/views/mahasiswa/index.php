<div class="container mt-5">
    <div class="row">
        <div class="col-12 mb-3">
            <h1><?= $title; ?></h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_data">
                Add Data
            </button>
        </div>
        <div class="col-12">
            <?php Flasher::getFlash(); ?>
            <table id="table_data" class="stripe" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data_mahasiswa) && $data_mahasiswa != null): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($data_mahasiswa as $key => $value): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $value->nama; ?></td>
                                <td><?= $value->nim; ?></td>
                                <td><?= $value->email; ?></td>
                                <td><?= $value->jurusan; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>mahasiswa/detail/<?= $value->id; ?>" class="btn btn-small btn-primary">Detail</a>
                                    <a href="<?= BASEURL; ?>mahasiswa/edit/<?= $value->id; ?>" class="btn btn-small btn-secondary">Edit</a>
                                    <a href="<?= BASEURL; ?>mahasiswa/delete/<?= $value->id; ?>" class="btn btn-small btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
                                </td>
                            </tr>
                            <?php $no += 1; ?>
                        <?php endforeach ?>
                    <?php endif ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- modals add -->

    <!-- Modal -->
    <div class="modal fade" id="add_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= BASEURL; ?>mahasiswa/tambah_data" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">Nim</label>
                            <input type="text" name="nim" class="form-control" id="nim">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" id="jurusan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./modals add -->
</div>

<!-- masuk footer -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    $('#table_data').DataTable();
</script>