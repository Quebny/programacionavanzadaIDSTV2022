<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../layout/head.template.php'; ?>
</head>

<body>
    <!-- Navbar -->
    <?php include '../layout/nav.template.php'; ?>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">

            <?php include '../layout/sidebar.template.php'; ?>

            <!-- Content -->

            <div class="col-md-10 col-lg-10 col-sm-12">

                <section>
                    <div class="row bg-light m-2">
                        <div class="col">
                            <label>
                                Productos
                            </label>
                        </div>
                    </div>
                </section>

                <section>

                    <div class="row">



                        <div class="col-md-4 col-sm-12">

                            <div class="card mb-2">
                                <img src="../public/img/logo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Producto</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Precio (?)</h6>
                                    <p class="card-text">Descripción / Detalles</p>

                                    <div class="row">
                                        <a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
                                            Editar
                                        </a>
                                        <a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 col-6">
                                            Eliminar
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Acción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form>

                    <div class="modal-body">

                        <?php for ($i = 0; $i < 4; $i++) : ?>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">!</span>
                                <input required type="text" class="form-control" placeholder="Input" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        <?php endfor; ?>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <!-- Scripts -->
    <?php include '../layout/scripts.template.php'; ?>
</body>

</html>