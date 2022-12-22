<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path=VIEW_PATH."assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

    <title>NB Carwash - Administrasi</title>
    <?php require(VIEW_PATH . 'template/header.php'); ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php require(VIEW_PATH . 'template/sidebar.php'); ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->

                            <?php require(VIEW_PATH . 'template/navbar.php'); ?>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->

                <div class="content-wrapper">

                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Tarif </h4>
                
                    <div class='card'>
                        <div class="modal fade" id="tarif" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Edit Tarif</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12" id="showAlert">

                                            </div>

                                            <form method="POST" id="spendInsertForm">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="keterangan" class="form-label">keterangan</label>
                                                        <textarea class="form-control" name="keterangan" id="keterangan" rows="1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="jenis_pencucian" class="form-label">Jenis Pencucian</label>
                                                        <input type="text" id="jenis_pencucian" name="jenis_pencucian" class="form-control" />
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="harga" class="form-label">Harga</label>
                                                        <input type="text" id="harga" name="harga" class="form-control" />
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <h5 class="card-header">Data Tarif</h5>

                            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                                </pre>
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="tarifTable">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>keterangan</th>
                                                <th>Jenis Pencucian</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            while ($item = mysqli_fetch_array($transaksi)) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $item['merk_model'] ?></td>
                                                    <td><?= $item['wash_type_name'] ?></td>
                                                    <td><?= $item['total'] ?></td>
                                                    <td>
                                                        <button data-bs-toggle="modal" data-bs-target="#tarif" type="button" class="btn btn-primary">
                                                            Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endwhile ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <!-- isi card -->

                        <!--/ Card layout -->
                    </div>

                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- / Layout wrapper -->

    <?php require(VIEW_PATH . 'template/footer.php'); ?>

    <script>
        $(document).ready(function() {
            $('#transakasiTable').DataTable({
                "bFilter": false,
            });
            // $('.paginate_button.current').addClass('btn btn-primary')
            // $('.paginate_button.previous.disabled').addClass('btn btn-default')
            // $('.paginate_button.next.disabled').addClass('btn btn-default')

    })
    </script>


</body>

</html>