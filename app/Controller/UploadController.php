<?php
namespace App\Controller;

class UploadController
{
    protected $directorio = "../../Uploads/";
    protected $type = ["image/jpg", "image/jpeg", "image/png"];
    public function upload()
    {
        // ruta directorio
        $imageRoute = ($this->directorio . basename($_FILES['userImage']['name']));
        /**
         * Valida si es imagen admitida
         */
        if (\in_array($_FILES['userImage']['type'], $this->type)) {
            //  comprueba que se subio
            if (move_uploaded_file($_FILES['userImage']['tmp_name'], $imageRoute)) {
                echo "El fichero es válido y se subió con éxito.";
            } else {
                echo "¡Posible ataque de subida de ficheros!";
            }
        } else {
            echo "solo imagenes";
        }
    }
}

$upload = new UploadController;

if (isset($_POST['save'])) {
    $upload->upload();
}
