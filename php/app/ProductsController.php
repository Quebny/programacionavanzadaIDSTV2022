<?php
include_once "config.php";

if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST["action"]) {

            case 'upload':
                $name = strip_tags($_POST['name']);
                $slug = strip_tags($_POST['slug']);
                $desc = strip_tags($_POST['desc']);
                $chara = strip_tags($_POST['chara']);
                $marca = strip_tags($_POST['marca']);
                $img = strip_tags($_POST['img']);

                $productsController = new ProductsController();
                $productsController->createProduct($name, $slug, $desc, $chara, $marca, $img);
                break;

            case 'delete':
                $id = strip_tags($_POST['id']);

                $productsController = new ProductsController();
                $productsController->remove($id);

                echo json_encode($productsController->remove($id));

                break;
        }
    }
}
if (isset($_GET["id"])) {
    $productsController = new ProductsController();
    $productsController->getDetails($_GET["id"]);
}

// var_dump($_POST);
class ProductsController
{
    public function getProducts()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }

    public function createProduct($name, $slug, $desc, $chara, $marca, $img)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'slug' => $slug,
                'description' => $desc,
                'features' => $chara,
                'brand_id' => $marca,
                // 'cover' => new CURLFILE($_FILES['cover']['tmp_name'])
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // var_dump($response);


        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            header("Location:".BASE_PATH."/products?success");
        } else {
            header("Location:".BASE_PATH."/products?error");
        }
    }

    public function getDetails($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));
        
        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        echo ("hokla");
        
        var_dump($response);
        $response = json_decode($response);
        // echo $response->data->slug;
        if (isset($response->code) && $response->code > 0) {
            header("Location:".BASE_PATH."/products?success".$response->data->slug);
        } else {
            header("Location:".BASE_PATH."/products?error");
        }
    }

    public function remove($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        // var_dump($response);

        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {
            return true;
        } else {
            return false;
        }
    }
}
