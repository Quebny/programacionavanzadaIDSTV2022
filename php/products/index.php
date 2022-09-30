<?php
include "../app/ProductsController.php";
$productsController = new ProductsController();
$product = $productsController->getProducts();

?>
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
                        <div class="col">
                            <button data-bs-toggle="modal" data-bs-target="#addProductModal" class=" float-end btn btn-primary">
                                Añadir producto
                            </button>
                        </div>
                    </div>
                </section>

                <section>

                    <div class="row">

                        <?php if (isset($product) && count($product)) : ?>
                            <?php foreach ($product as $product) : ?>

                                <div class="col-md-4 col-sm-12">

                                    <div class="card mb-2">
                                        <img src="<?= $product->cover ?>" class="card-img-top img-thumbnail" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $product->name?> </h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?= $product->brand->name?></h6>
                                            <p class="card-text"><?= $product->description?></p>

                                            <div class="row">
                                                <a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
                                                    Editar
                                                </a>
                                                <a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 col-6">
                                                    Eliminar
                                                </a>
                                                <a href="detalles.php" class="btn btn-info col-12">
                                                    Detalles
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>

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