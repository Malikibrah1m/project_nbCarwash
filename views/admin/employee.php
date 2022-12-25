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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Karyawan </h4>

                            <!-- Large Modal -->
                            <div class="modal fade" id="pengeluaran" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Tambah Daftar Karyawan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12" id="showAlert">

                                            </div>

                                            <form method="POST" id="spendInsertForm">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="keterangan" class="form-label">Nama</label>
                                                        <textarea class="form-control" name="keterangan" required id="keterangan" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="total" class="form-label">Email</label>
                                                        <textarea class="form-control" name="keterangan" required id="keterangan" rows="1"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="dayte" class="form-label">Password</label>
                                                        <select class="form-select" name="user_id" id="user_id" style="width: 100%">
                                                        </select>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan <span id="loading" role="status"></span></button>
                                            </form>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-header">Data Karyawan</h5>
                            <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pengeluaran">
                                    Tambah Data
                                </button>
                            </div>

                          <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                           
                        
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="tablePengeluaran">
                                        <thead>
                                        <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td><i class="fab fa-angular fa-lg text-danger me-2"></i> <strong>1</strong></td>
                                            <td>Putra </td>
                                            <td><i class="fab fa-angular fa-lg text-danger me-1"></i> <strong>putra12@gmail.com</strong></td>
                                            <td>12345</td>
                                            <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                                >
                                      
                                            <tr>
                                            <td><i class="fab fa-react fa-lg text-info me-2"></i> <strong>2</strong></td>
                                            <td>Rendi</td>
                                            <td><i class="fab fa-react fa-lg text-info me-1"></i> <strong>rendi123@gmail.com</strong></td>
                                            <td>12345</td>
                                            <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                                >
                                          <tr>
                                            <td><i class="fab fa-react fa-lg text-info me-2"></i> <strong>3</strong></td>
                                            <td>Admin</td>
                                            <td><i class="fab fa-react fa-lg text-info me-1"></i> <strong>admin@gmail.com</strong></td>
                                            <td>$2a$12$g9enDafQgUWtocAxEKtBTOqprzwG65jed9/iZbe1xnxVoLUJhUEF.</td>
                                            <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                                >
                                            </tr>

                                            <tr>
                                            <td><i class="fab fa-react fa-lg text-info me-2"></i> <strong>5</strong></td>
                                            <td>Adi</td>
                                            <td><i class="fab fa-react fa-lg text-info me-1"></i> <strong>adi@gmail.com</strong></td>
                                            <td>$$2y$10$ZwroQb5letISjsyVzceQ0uLprQBLht5xD1NPaWB4ugv5p84EbuCQW</td>
                                            <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    ><i class="bx bx-trash me-1"></i> Delete</a
                                                >
                                            </tr>

                                            <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

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
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
            loadrekapTable();
        })

        function loadrekapTable() {
            var url = "<?= BASE_URL ?>rekap/rekap_data";
            $('#rekapTable').DataTable({
                searching: true,
                paging: true,
                destroy: true,
                "ordering": false,
                // serverSide: true,
                ajax: url,
                columns: [{
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'daytime',
                        name: 'daytime'
                    },
                    {
                        data: 'for_cash',
                        name: 'for_cash'
                    },
                    {
                        data: 'for_employee',
                        name: 'for_employee'
                    },
                    {
                        data: 'for_owner',
                        name: 'for_owner'
                    },
                ],
            });
        }
    </script>
</body>

</html>