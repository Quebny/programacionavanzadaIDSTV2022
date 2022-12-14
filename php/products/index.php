<?php
include "../app/ProductsController.php";
include "../app/BrandsController.php";
$productsController = new ProductsController();
$brandController = new BrandsController();

$product = $productsController->getProducts();
$brand = $brandController->getBrands();

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

                                            <!-- <form method="get" action="../app/ProductsController.php"> -->
                                                <div class="row">
                                                    <a data-product='<?= json_encode($product)?>' onclick="editProduct(this)" data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
                                                        Editar
                                                    </a>
                                                    <a onclick='eliminar(<?= $product->id ?>)' href="#" class="btn btn-danger mb-1 col-6">
                                                        Eliminar
                                                    </a>
                                                    <input type = "hidden" name="super_token" value=<?= $_SESSION['super_token']?>>

                                                    <input type="hidden" name="id" value="<?= $product->id ?>" action="">
                                                    <button class="btn btn-info col-12">
                                                        Detalles
                                                        </a>
                                                </div>
                                            <!-- </form> -->
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
                            <input id="name" name="name" required type="text" class="form-control" placeholder="Nombre">
                        </div>

                        <p>Slug</p>
                        <div class="input-group mb-3">
                            <input id="slug" name="slug" required type="text" class="form-control" placeholder="Slug">
                        </div>

                        <p>Descripción</p>
                        <div class="input-group mb-3">
                            <textarea id="desc" name="desc" required type="text" class="form-control" placeholder="Descripción" style="height: 100px"></textarea>
                        </div>

                        <p>Características</p>
                        <div class="input-group mb-3">
                            <input id="chara" name="chara" required type="text" class="form-control" placeholder="Características">
                        </div>

                        <p>Marca</p>
                        <div class="input-group mb-3">
                            <select id="marca" name="marca">
                                <?php foreach ($brand as $brand) : ?>
                                    <option value='<?= $brand->id ?>'><?= $brand->name ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                        <p>Imagen</p>
                        <div class="input-group mb-3">
                            <input id="img" name="img" required type="file" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>

                        <input type="hidden" name="action" value="upload">
                        <!-- <input type="hidden" name="action" value="update"> -->
                        <button type="submit" class="btn btn-primary">
                            Agregar
                        </button>
                        <input type = "hidden" name="super_token" value=<?= $_SESSION['super_token']?>>
                    </div>

                </form>

            </div>
        </div>
    </div>



    <!-- Scripts -->
    <?php include '../layout/scripts.template.php' ?>
    <script type="text/javascript">
        function eliminar(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var bodyFormData = new FormData();

                        

                        bodyFormData.append('id', id);
                        bodyFormData.append('action', 'delete');
                        bodyFormData.append('super_token', '<?= $_SESSION['super_token']?>');
                        

                        axios.post('../app/ProductsController.php', bodyFormData)
                            .then(function(response) {
                                console.log(response);
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        }

        function editProduct(target) {
            console.log(target)
            console.log(target.dataset.product.name)
            let product = JSON.parse(target.dataset.product);

            docuemnt.getElementById('name').value = product.name
            docuemnt.getElementById('slug').value = product.slug
            docuemnt.getElementById('desc').value = product.description
            docuemnt.getElementById('chara').value = product.features

            document.getElementById('id').value = product.id

            document.getElementById('action').value = 'update'
        }
    </script>
</body>

</html>