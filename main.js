const addForm = document.getElementById("add-user-form");
const updateForm = document.getElementById("edit-user-form");
const showAlert = document.getElementById("showAlert");
const addModal = new bootstrap.Modal(document.getElementById("addNewUserModal"));
const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
const tbody = document.querySelector("tbody");

// Add New User Ajax Request
addForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(addForm);
    // formData.append("add", 1);

    if (addForm.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        addForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById("add-user-btn").value = "Please Wait...";

        const data = await fetch("http://localhost:8000/api/add_users/", {
            method: "POST",
            body: formData,
        });
        const response = await data.text();
        console.log(response);
        showAlert.innerHTML = response;
        document.getElementById("add-user-btn").value = "Add User";
        addForm.reset();
        addForm.classList.remove("was-validated");
        addModal.hide();
        fetchAllUsers();
    }
});

const fetchAllUsers = async () => {
    const data = await fetch("http://localhost:8000/api/get_users/", {
        method: "GET",
    });
    const responseData = await data.json();
    const users = responseData.users;
    let html = '';
    users.forEach(user => {
        html += `<tr>
                    <td>${user.id}</td>
                    <td>${user.first_name}</td>
                    <td>${user.last_name}</td>
                    <td>${user.email}</td>
                    <td>${user.username}</td>
                    <td>
                        <button class="btn btn-primary btn-sm editLink me-2" data-toggle="modal" data-target="#editUserModal" id="${user.id}">Edit</button>
                        <button class="btn btn-danger btn-sm deleteLink me-2" id="${user.id}">Delete</button>
                    </td>
                </tr>`;
    });
    tbody.innerHTML = html;
}

fetchAllUsers();

// Event listener for the "Edit" and "Delete" buttons Ajax Requests
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('editLink')) {
        event.preventDefault(); // Prevent default link behavior
        const userId = event.target.getAttribute('id');
        // Populate the modal with data for the selected user
        editUser(userId);
    } else if (event.target.classList.contains('deleteLink')) {
        event.preventDefault(); // Prevent default link behavior
        const userId = event.target.getAttribute('id');
        // Call the function to delete the user
        deleteUser(userId);
    }
});

const editUser = async (id) => {

    const data = await fetch(`http://localhost:8000/api/get_user/${id}/`, {
        method: "GET",
    });
    const response = await data.json();
    const user = response.user;

    // Check if the response contains valid user data
    if (response && user.id) {
        // Set form field values based on response
        document.getElementById("editUserId").value = user.id;
        document.getElementById("editFirstName").value = user.first_name;
        document.getElementById("editLastName").value = user.last_name;
        document.getElementById("editEmail").value = user.email;
        document.getElementById("editUsername").value = user.username;
        document.getElementById("editPassword").value = ''; // Assuming password should not be prefilled
    } else {
        // Handle error or notify user that user data is not available
        console.error("Error: User data not available.");
    }

};

// Update User Ajax Request
updateForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(updateForm);
    const id = document.getElementById("editUserId").value;
    // formData.append("update", 1);

    console.log('yeyee')

    if (updateForm.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        updateForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById("edit-user-btn").value = "Please Wait...";

        const data = await fetch('http://localhost:8000/api/update_user/'+id+'/', {
            method: "POST",
            body: formData,
        });
        const response = await data.text();

        showAlert.innerHTML = response;
        document.getElementById("edit-user-btn").value = "Add User";
        updateForm.reset();
        updateForm.classList.remove("was-validated");
        editModal.hide();
        fetchAllUsers();
    }
});

const deleteUser = async (id) => {
    const data = await fetch(`http://localhost:8000/api/delete_user/${id}/`, {
        method: "DELETE",
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    fetchAllUsers();
};