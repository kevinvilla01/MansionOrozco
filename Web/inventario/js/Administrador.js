document.addEventListener("DOMContentLoaded", function() {
    // Elementos de la interfaz
    const inventarioBtn = document.getElementById("inventarioBtn");
    const requisicionesBtn = document.getElementById("requisicionesBtn");
    const agregarProductoBtn = document.getElementById("agregarProductoBtn");
    const eliminarProductoBtn = document.getElementById("eliminarProductoBtn");
    const agregarUsuarioBtn = document.getElementById("agregarUsuarioBtn");
    const infouserBtn = document.getElementById("infouserBtn");

    const inventarioSection = document.getElementById("inventarioSection");
    const requisicionesSection = document.getElementById("requisicionesSection");
    const agregarProductoSection = document.getElementById("agregarProductoSection");
    const eliminarProductoSection = document.getElementById("eliminarProductoSection");
    const agregarUsuariosSection = document.getElementById("agregarUsuariosSection");
    const infouserSection = document.getElementById("infouserSection");

    const sections = [inventarioSection, requisicionesSection, agregarProductoSection, eliminarProductoSection, agregarUsuariosSection, infouserSection];

    function hideAllSections() {
        sections.forEach(section => {
            section.style.display = "none";
        });
    }

    function showSection(section) {
        hideAllSections();
        section.style.display = "block";
    }

    inventarioBtn.addEventListener("click", function() {
        showSection(inventarioSection);
    });

    requisicionesBtn.addEventListener("click", function() {
        showSection(requisicionesSection);
    });

    agregarProductoBtn.addEventListener("click", function() {
        showSection(agregarProductoSection);
    });

    eliminarProductoBtn.addEventListener("click", function() {
        showSection(eliminarProductoSection);
    });

    agregarUsuarioBtn.addEventListener("click", function() {
        showSection(agregarUsuariosSection);
    });

    infouserBtn.addEventListener("click", function() {
        showSection(infouserSection);
    });

    // Mostrar la sección de inventario por defecto
    showSection(inventarioSection);

    // Función de búsqueda en la tabla de productos
    const searchInput = document.getElementById("searchInput");
    const productTable = document.getElementById("product-table");

    searchInput.addEventListener("input", function() {
        const filter = searchInput.value.toLowerCase();
        const rows = productTable.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) { // Empieza en 1 para omitir el encabezado
            const cells = rows[i].getElementsByTagName("td");
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                if (cells[j].innerText.toLowerCase().includes(filter)) {
                    found = true;
                    break;
                }
            }

            rows[i].style.display = found ? "" : "none";
        }
    });
});
