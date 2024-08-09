<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>colaboradores-inventario</title>
    <link rel="stylesheet" href="css/Administrador.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="fondo">
        <img src="logo_hotel_vectorizado.png" alt="Logo Hotel Mansión Orozco" class="logo">
        <h1 class="titulo">¡Bienvenido al inventario!</h1>

        <!-- Lateral de navegación -->
        <nav class="menu">
            <ul>
                <li id="inventarioBtn">Inventario</li>
                <li id="requisicionesBtn">Chat</li>
                <li id="agregarProductoBtn">Agregar producto</li>
                <li id="eliminarProductoBtn">Eliminar producto</li>
                <li id="agregarUsuarioBtn">Usuarios</li>
            </ul>
            <a href="login.html"><button class="botonregresar">Regresar</button></a>
        </nav>
        <!-- Fin de lateral de navegación -->

        <!-- User options -->
        <div class="user-options">
            <span class="icon"><img src="user.png" class="iconos" id="infouserBtn"></span>
        </div>
        <!-- Fin de user options -->

        <!-- Inventario apartado -->
        <section id="inventarioSection" class="product-section">
            <h2>Productos</h2>
            <input type="text" placeholder="Buscar productos" id="searchInput">
            <?php
            $connection = pg_connect("host=localhost dbname=HOTELMO user=postgres password=Ahsy1zhdg123");
            if (!$connection){
                echo "No se pudo conectar a la base de datos.";
                exit;
            }

            $result = pg_query($connection, "SELECT * FROM PRODUCTOS");
            if (!$result) {
                echo "No se pueden mostrar los productos.";
                exit;
            }
            ?>
            <table id="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Stock total</th>
                        <th>Stock minimo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($row = pg_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['descripcion']}</td>
                            <td>{$row['cateogoria']}</td>
                            <td>{$row['precio_unitario']}</td>
                            <td>{$row['stock_total']}</td>
                            <td>{$row['stock_min']}</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <!-- Fin de inventario apartado -->

        <!-- Apartado requisiciones -->
        <section id="requisicionesSection" class="content-section">
            <h2>Chat</h2>
            <ul class="requisiciones-list">
                <li>Solicitud de 10 jabones de baño - Empleado 1</li>
                <li>Solicitud de 5 toallas - Empleado 2</li>
                <!-- Más requisiciones aquí -->
            </ul>
        </section>
        <!-- Fin de requisiciones -->

        <!-- Agregar productos -->
        <section id="agregarProductoSection" class="agregarusuariod">
            <h2>Agregar Producto</h2>
            <form id="agregarProductoForm" action="php/agregar_productos.php" method="post">

                <label for="productoNombre">Nombre:</label>
                <input type="text" id="productoNombre" name="productoNombre" required><br>

                <label for="productoDescripcion">Descripción:</label>
                <input type="text" id="productoDescripcion" name="productoDescripcion" required><br>

                <label for="productoCantidad">Categoria:</label>
                <input type="text" id="productoCategoria" name="productoCategoria" required><br>

                <label for="productoPrecio">Precio:</label>
                <input type="number" id="productoPrecio" name="productoPrecio" required><br>

                <label for="productoCategoria">Stock total:</label>
                <input type="text" id="productoCategoria" name="productoStockTotal" required><br>

                <label for="productoCategoria">Stock Minimo:</label>
                <input type="text" id="productoCategoria" name="productoStockMin" required><br>

                <button type="submit">Agregar Producto</button>
            </form>
        </section>
        <!-- Fin de agregar productos -->

        <!-- Eliminar productos -->
        <section id="eliminarProductoSection" class="content-section">
            <h2>Eliminar Producto</h2>
            <form id="eliminarProductoForm" action="php/eliminar_productos.php" method="post">
                <label for="productoIDEliminar">ID del Producto:</label>
                <input type="text" id="productoIDEliminar" name="productoIDEliminar" required><br>
                <button type="submit">Eliminar Producto</button>
            </form>
        </section>

        <!-- Apartado de agregar usuarios -->
        <section id="agregarUsuariosSection" class="agregarusuariod">
            <h2>Agregar Usuarios</h2>
            <form id="agregar_user" action="php/add_user.php" method="post">
                <label for="nombreUser">Nombre del usuario:</label>
                <input type="text" id="nombreUser" name="nombreUser" required><br>

                <label for="apellidoUser">Apellido del usuario:</label>
                <input type="text" id="apellidoUser" name="apellidoUser" required><br>

                <label for="emailUser">Email del usuario:</label>
                <input type="email" id="emailUser" name="emailUser" required><br>

                <label for="tel">Teléfono del usuario:</label>
                <input type="number" id="tel" name="tel" required><br>

                <label for="userempleado">Username del empleado:</label>
                <input type="text" id="userempleado" name="userempleado" required><br>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required><br>

                <label for="puesto">Puesto del usuario ("gerente", "trabajador"):</label>
                <input type="text" id="puesto" name="puesto" required><br>

                <button type="submit">Agregar usuario</button>
            </form>

            <h2>Eliminar Usuarios</h2>
            <form id="eliminar_user" action="php/eliminar_user.php" method="post">
                <label for="eliminarnombre">Nombre del usuario:</label>
                <input type="text" id="eliminarnombre" name="eliminarnombre"><br>

                <label for="eliminarid">ID del usuario:</label>
                <input type="number" id="eliminarid" name="eliminarid"><br>
                <button type="submit">Eliminar Usuario</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>id_usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conexion = pg_connect("host=localhost dbname=HOTELMO user=postgres password=Ahsy1zhdg123");
                    if (!$conexion){
                        echo "No se pudo conectar a la base de datos.";
                        exit;
                    }

                    $resultado = pg_query($conexion, "SELECT * FROM USUARIOS");
                    if (!$resultado) {
                        echo "No se pueden mostrar los usuarios.";
                        exit;
                    }

                    while ($row = pg_fetch_assoc($resultado)) {
                        echo "
                        <tr>
                        <td>{$row['id_usuario']}</td>
                        <td>{$row['nombre']}</td>
                            <td>{$row['apellido']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['telefono']}</td>
                            <td>{$row['rol']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['passwd']}</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <!-- Fin de agregar usuarios -->

        <!-- Información del usuario -->
        <section id="infouserSection" class="infouser" style="display: none;">
            <!-- Aquí se mostrará la información del usuario -->
        </section>

        <script src="js/Administrador.js"></script>
    </div>
</body>
</html>
