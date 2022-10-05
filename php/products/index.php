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
                                            <h5 class="card-title"><?= $product->name ?> </h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?= $product->brand->name ?></h6>
                                            <p class="card-text"><?= $product->description ?></p>

                                            <form method="get" action="../app/ProductsController.php">
                                                <div class="row">
                                                    <a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
                                                        Editar
                                                    </a>
                                                    <a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 col-6">
                                                        Eliminar
                                                    </a>

                                                    <input type="hidden" name="id" value="<?= $product->id ?>" action="">
                                                    <button class="btn btn-info col-12">
                                                        Detalles
                                                    </a>
                                                </div>
                                            </form>
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
                    <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="../app/ProductsController.php">

                    <div class="modal-body">

                        <p>Nombre</p>
                        <div class="input-group mb-3">
                            <input name="name" required type="text" class="form-control" placeholder="Nombre">
                        </div>

                        <p>Slug</p>
                        <div class="input-group mb-3">
                            <input name="slug" required type="text" class="form-control" placeholder="Slug">
                        </div>

                        <p>Descripción</p>
                        <div class="input-group mb-3">
                            <textarea name="desc" required type="text" class="form-control" placeholder="Descripción" style="height: 100px"></textarea>
                        </div>

                        <p>Características</p>
                        <div class="input-group mb-3">
                            <input name="chara" required type="text" class="form-control" placeholder="Características">
                        </div>

                        <p>Marca</p>
                        <div class="input-group mb-3">
                            <input name="marca" required type="text" class="form-control" placeholder="Marca">
                        </div>

                        <p>Imagen</p>
                        <div class="input-group mb-3">
                            <input name="img" required type="file" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>

                        <input type="hidden" name="action" value="upload">
                        <button type="submit" class="btn btn-primary">
                            Agregar
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