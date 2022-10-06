<?php
    include "app/config.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/main.less"> -->
    <style type="text/css">
        .recolor {
            background-color: steelblue
        }
    </style>
</head>

<body>
    <div class="container recolor mt-10">
        <section>
            <div class="row align-self-center justify-content-md-center">
                <div class="col-md-4 col-sm-12">
                    <fieldset>
                        <form method="post" action="<?= BASE_PATH?>auth">
                            <h1 class="text-center">
                                Login
                            </h1>

                            <label>
                                Email
                            </label>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input name="email" type="text" class="form-control" placeholder="example@gmail.com" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>


                            <label>
                                Contraseña
                            </label>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">#</span>
                                <input name="password" type="text" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon2" required>
                            </div>

                            <div class="d-grid gap-2 col-4   mx-auto">
                                <input type="hidden" name="action" value="access">
                                <button class="btn btn-primary" type="submit">Login</button>
                                <!-- <a class="btn btn-primary" href="products/index.php" type="submit">Login</a> -->

                                <input type = "hidden" name="super_token" value=<?= $_SESSION['super_token']?>>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </section>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">

    </script>
</body>

</html>