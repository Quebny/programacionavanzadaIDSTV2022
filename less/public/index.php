<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/main.less"> -->
    <style type="text/css">
        .recolor {
            background-color:steelblue
        }
    </style>
</head>

<body>
    <div class="container recolor">
        <section>
            <div class="row align-self-center justify-content-md-center">
                <div class="col-md-4 col-sm-12">
                    <fieldset>
                        <form>
                            <h1 class="text-center">
                                Login
                            </h1>

                            <label>
                                Email
                            </label>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="example@gmail.com" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <label>
                                Contraseña
                            </label>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2">#</span>
                                <input type="text" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon2">
                            </div>

                            <div class="d-grid gap-2 col-4   mx-auto">
                                <button class="btn btn-primary" type="button">Login</button>
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