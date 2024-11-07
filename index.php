<?php include 'php/db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Productos</h1>
        
        <form id="productForm">
            <input type="hidden" name="id" id="productId">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" required>
            <textarea name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
            <input type="number" name="precio" id="precio" placeholder="Precio" step="0.01" required>
            <button type="submit">Guardar</button>
        </form>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="productTable">
                <?php
                $result = $conn->query("SELECT * FROM productos");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr data-id='{$row['id']}'>
                            <td>{$row['nombre']}</td>
                            <td>{$row['descripcion']}</td>
                            <td>{$row['precio']}</td>
                            <td>
                                <button onclick='editProduct({$row['id']})'>Editar</button>
                                <button onclick='deleteProduct({$row['id']})'>Eliminar</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
