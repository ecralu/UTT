
 <?php
// if (isset($_POST)) {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nom = $_POST['nombre'];
      $correo = $_POST['correo'];
      $mensaje = $_POST['comentario'];
      // code...
      if (empty($nom) or empty($correo) or empty($mensaje)) {
          echo
      '<script type="text/javascript">'
        ,'alert("Introduce primero los datos");'
        ,'window.location = "index.html"'
      ,'</script>';
      } else {
          try {
          	 $conexion = new PDO('mysql:host=localhost;dbname=prueba', 'root', '');	

              // echo "Conexion ok";

              // Metod sql
              // $res = $conexion->query('SELECT * FROM usuarios');
              // $res = $conexion->query("INSERT INTO usuarios VALUES(null, $nom, $email, $dir)");
              // foreach ($res as $key) {
              // }

              // Metodo prepare
              // $statement = $conexion->prepare('SELECT * FROM usuarios WHERE id = :id');
              // $statement->execute(array(':id' => 1));

              $statement = $conexion->prepare('INSERT INTO usuarios (id, nombre, correo, mensaje) VALUES (null, :nombre, :correo, :mensaje');
              $statement->execute(array(':nombre' => $nom, ':correo' => $correo, ':mensaje' => $mensaje));

              // echo "okk";
              //   $resultado = $statement->fetch();
              //     print_r($resultado);
          } catch (PDOException $e) {
            echo "Error: " . $e.getMessage();
          }
      }
  }
