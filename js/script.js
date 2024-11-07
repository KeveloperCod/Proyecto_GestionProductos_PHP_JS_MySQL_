document.getElementById("productForm").onsubmit = function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const id = document.getElementById("productId").value;

    fetch(id ? "php/update.php" : "php/create.php", {
        method: "POST",
        body: formData,
    }).then(() => {
        location.reload();
    });
};

function editProduct(id) {
    fetch("php/get.php?id=" + id)
        .then((response) => response.json())
        .then((product) => {
            document.getElementById("productId").value = product.id;
            document.getElementById("nombre").value = product.nombre;
            document.getElementById("descripcion").value = product.descripcion;
            document.getElementById("precio").value = product.precio;
        });
}

function deleteProduct(id) {
    if (confirm("¿Estás seguro de eliminar este producto?")) {
        fetch("php/delete.php?id=" + id, {
            method: "GET",
        }).then(() => {
            location.reload();
        });
    }
}
