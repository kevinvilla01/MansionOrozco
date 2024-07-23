document.addEventListener('DOMContentLoaded', function() {
    const productForm = document.getElementById('product-form');
    const productSubmitBtn = document.getElementById('product-submit-btn');
    const productTable = document.getElementById('product-table').getElementsByTagName('tbody')[0];

    const userForm = document.getElementById('user-form');
    const userSubmitBtn = document.getElementById('user-submit-btn');
    const userTable = document.getElementById('user-table').getElementsByTagName('tbody')[0];

    const roomForm = document.getElementById('room-form');
    const roomSubmitBtn = document.getElementById('room-submit-btn');
    const roomTable = document.getElementById('room-table').getElementsByTagName('tbody')[0];

    productForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(productForm);
        const id = document.getElementById('product_id').value;

        if (id) {
            fetch(`php/update.php?type=product&id=${id}`, {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    fetchProducts();
                    productForm.reset();
                }
            });
        } else {
            fetch('php/create.php?type=product', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    fetchProducts();
                    productForm.reset();
                }
            });
        }
    });

    userForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(userForm);
        const id = document.getElementById('user_id').value;

        if (id) {
            fetch(`php/update.php?type=user&id=${id}`, {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    fetchUsers();
                    userForm.reset();
                }
            });
        } else {
            fetch('php/create.php?type=user', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    fetchUsers();
                    userForm.reset();
                }
            });
        }
    });

    roomForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(roomForm);
        const id = document.getElementById('room_id').value;

        if (id) {
            fetch(`php/update.php?type=room&id=${id}`, {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    fetchRooms();
                    roomForm.reset();
                }
            });
        } else {
            fetch('php/create.php?type=room', {
                method: 'POST',
                body: formData
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    fetchRooms();
                    roomForm.reset();
                }
            });
        }
    });

    function fetchProducts() {
        fetch('php/read.php?type=product')
            .then(response => response.json())
            .then(data => {
                productTable.innerHTML = '';
                data.forEach(product => {
                    const row = productTable.insertRow();
                    row.insertCell(0).textContent = product.id;
                    row.insertCell(1).textContent = product.nombre;
                    row.insertCell(2).textContent = product.descripcion;
                    row.insertCell(3).textContent = product.categoria;
                    row.insertCell(4).textContent = product.precio_unitario;
                    row.insertCell(5).textContent = product.stock_total;
                    row.insertCell(6).textContent = product.stock_min;
                    const actionsCell = row.insertCell(7);
                    const editButton = document.createElement('button');
                    editButton.textContent = 'Editar';
                    editButton.addEventListener('click', () => {
                        document.getElementById('product_id').value = product.id;
                        document.getElementById('product_name').value = product.nombre;
                        document.getElementById('product_description').value = product.descripcion;
                        document.getElementById('product_category').value = product.categoria;
                        document.getElementById('product_price').value = product.precio_unitario;
                        document.getElementById('product_stock_total').value = product.stock_total;
                        document.getElementById('product_stock_min').value = product.stock_min;
                        productSubmitBtn.textContent = 'Actualizar Producto';
                    });
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Eliminar';
                    deleteButton.addEventListener('click', () => {
                        fetch(`php/delete.php?type=product&id=${product.id}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    fetchProducts();
                                }
                            });
                    });
                    actionsCell.appendChild(editButton);
                    actionsCell.appendChild(deleteButton);
                });
            });
    }

    function fetchUsers() {
        fetch('php/read.php?type=user')
            .then(response => response.json())
            .then(data => {
                userTable.innerHTML = '';
                data.forEach(user => {
                    const row = userTable.insertRow();
                    row.insertCell(0).textContent = user.id_usuario;
                    row.insertCell(1).textContent = user.nombre;
                    row.insertCell(2).textContent = user.apellido;
                    row.insertCell(3).textContent = user.correo;
                    row.insertCell(4).textContent = user.telefono;
                    row.insertCell(5).textContent = user.rol;
                    row.insertCell(6).textContent = user.username;
                    const actionsCell = row.insertCell(7);
                    const editButton = document.createElement('button');
                    editButton.textContent = 'Editar';
                    editButton.addEventListener('click', () => {
                        document.getElementById('user_id').value = user.id_usuario;
                        document.getElementById('user_name').value = user.nombre;
                        document.getElementById('user_lastname').value = user.apellido;
                        document.getElementById('user_email').value = user.correo;
                        document.getElementById('user_phone').value = user.telefono;
                        document.getElementById('user_role').value = user.rol;
                        document.getElementById('user_username').value = user.username;
                        document.getElementById('user_password').value = ''; // Passwords should not be populated for security reasons
                        userSubmitBtn.textContent = 'Actualizar Usuario';
                    });
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Eliminar';
                    deleteButton.addEventListener('click', () => {
                        fetch(`php/delete.php?type=user&id=${user.id_usuario}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    fetchUsers();
                                }
                            });
                    });
                    actionsCell.appendChild(editButton);
                    actionsCell.appendChild(deleteButton);
                });
            });
    }

    function fetchRooms() {
        fetch('php/read.php?type=room')
            .then(response => response.json())
            .then(data => {
                roomTable.innerHTML = '';
                data.forEach(room => {
                    const row = roomTable.insertRow();
                    row.insertCell(0).textContent = room.id_habitacion;
                    row.insertCell(1).textContent = room.numero;
                    row.insertCell(2).textContent = room.tipo;
                    row.insertCell(3).textContent = room.capacidad;
                    row.insertCell(4).textContent = room.descripcion;
                    const actionsCell = row.insertCell(5);
                    const editButton = document.createElement('button');
                    editButton.textContent = 'Editar';
                    editButton.addEventListener('click', () => {
                        document.getElementById('room_id').value = room.id_habitacion;
                        document.getElementById('room_number').value = room.numero;
                        document.getElementById('room_type').value = room.tipo;
                        document.getElementById('room_capacity').value = room.capacidad;
                        document.getElementById('room_description').value = room.descripcion;
                        roomSubmitBtn.textContent = 'Actualizar Habitación';
                    });
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Eliminar';
                    deleteButton.addEventListener('click', () => {
                        fetch(`php/delete.php?type=room&id=${room.id_habitacion}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    fetchRooms();
                                }
                            });
                    });
                    actionsCell.appendChild(editButton);
                    actionsCell.appendChild(deleteButton);
                });
            });
    }

    fetchProducts();
    fetchUsers();
    fetchRooms();
});

function openTab(evt, tabName) {
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(tabContent => {
        tabContent.classList.remove('active');
    });

    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(tabButton => {
        tabButton.classList.remove('active');
    });

    document.getElementById(tabName).classList.add('active');
    evt.currentTarget.classList.add('active');
}
