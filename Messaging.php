<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxi Admin Panel</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            display: flex;
        }
        #sidebar {
            background-color: #343a40;
            width: 200px;
            padding: 20px;
            min-height: 100vh;
            position: fixed; 
            top: 0;
            left: 0; 
            z-index: 1000;
        }
        
        .sidebar-header {
            color: #ffffff;
            font-size: 24px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        #Active{
            color: #9ba5ae;
        }
        .nav-item {
            color: #ffffff;
            padding: 10px 0;
            text-decoration: none;
            display: block;
            border-radius: 5px;
        }
        
        .nav-item:hover {
            color: #9ba5ae;
            cursor: pointer;
        }
        
        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
            transition: background-color 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #c82333;
        }
        
        .content {
            padding: 30px;
            flex: 1;
            margin-left: 240px; 
            padding: 30px;
            
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #343a40;
        }
        .search-bar {
            display: flex;
            align-items: center;
        }
        .search-bar input {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-right: 10px;
            font-size: 16px;
        }
        .search-btn {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .search-btn:hover {
            background-color: #0056b3;
        }
        .add-driver-btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .add-driver-btn:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
        }
        th {
            background-color: #f8f9fa;
            color: #495057;
        }
        td button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;}
        
        #bg-blue {
            background-color: #007bff;
            color: white;
        }
        #bg-blue:hover {
            background-color: #0056b3;
        }
        #bg-yellow {
            background-color: #ffc107;
            color: white;
        }
        #bg-yellow:hover {
            background-color: #e0a800;
        }
        #bg-red {
            background-color: #dc3545;
            color: white;
        }
       #bg-red:hover {
            background-color: #c82333;
        }
    
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            max-width: 100%;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.3s ease-in-out;
        }
        .modal-content h2 {
            margin-top: 0;
            text-align: center;
            font-size: 24px;
        }
        .modal-content form input, .modal-content form select {
            display: block;
            width: 90%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }

        .modal-content button {
            padding: 12px;
            background-color: #28a745;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .modal-content button:hover {
            background-color: #218838;
        }
        .modal-content #closeModal, #closeEditModal, #closeViewModal {
            background-color: #dc3545;
            margin-top: 10px;
        }
        .modal-content #closeModal, #closeEditModal, #closeViewModal:hover {
            background-color: #c82333;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .search-bar-wrapper {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    
    <div id="sidebar">
        <div class="sidebar-header" style="font-weight: bold;">
            <span style="color: rgb(242, 159, 6);">K</span>P Mzuzu Taxi
        </div>
        <a class="nav-item">Dashboard</a>
        <a class="nav-item" id="Active">Drivers</a>
        <a class="nav-item">Customers</a>
        <a class="nav-item">Transactions</a>
        <a class="nav-item">Messages</a>
        <button class="logout-btn" id="logoutBtn">Log Out</button>
    </div>

    
    <div class="content">
        <div class="header">
            <h2 style="color: #595b5d; margin:0px;">Welcome, Admin</h2>
            <img src="" alt="">
            
        </div>
    <h1>Drivers</h1>
       
        <div class="search-bar-wrapper">
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search by name, email or phone">
                <button class="search-btn" id="searchBtn">Search</button>
            </div>
            <button class="add-driver-btn" id="addDriverBtn">Add Driver</button>
        </div>

       
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="driverTableBody"></tbody>
        </table>
    </div>
</div>


<div id="addDriverModal" class="modal">
    <div class="modal-content">
        <h2>Add Driver</h2>
        <form id="addDriverForm">
            <input type="text" id="driverName" placeholder="Driver Name" required>
            <input type="email" id="driverEmail" placeholder="Driver Email" required>
            <input type="text" id="driverPhone" placeholder="Driver Phone" required>
            <button type="submit">Add Driver</button>
        </form>
        <button id="closeModal">Close</button>
    </div>
</div>


<div id="viewDriverModal" class="modal">
    <div class="modal-content">
        <h2>Driver Details</h2>
        <div id="driverDetails"></div>
        <button id="closeViewModal">Close</button>
    </div>
</div>


<div id="editDriverModal" class="modal">
    <div class="modal-content">
        <h2>Edit Driver</h2>
        <form id="editDriverForm">
            <input type="text" id="editDriverName" required>
            <input type="email" id="editDriverEmail" required>
            <input type="text" id="editDriverPhone" required>
            <button type="submit">Save Changes</button>
        </form>
        <button id="closeEditModal">Close</button>
    </div>
</div>

<script>
const addDriverBtn = document.getElementById('addDriverBtn');
const addDriverModal = document.getElementById('addDriverModal');
const closeModal = document.getElementById('closeModal');
const addDriverForm = document.getElementById('addDriverForm');
const driverTableBody = document.getElementById('driverTableBody');
const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchBtn');
const logoutBtn = document.getElementById('logoutBtn');
const viewDriverModal = document.getElementById('viewDriverModal');
const editDriverModal = document.getElementById('editDriverModal');
const closeViewModal = document.getElementById('closeViewModal');
const closeEditModal = document.getElementById('closeEditModal');
const editDriverForm = document.getElementById('editDriverForm');
const menuButton = document.getElementById('menuButton');
const sidebar = document.getElementById('sidebar');

let drivers = []; 

// Function to display drivers
function displayDrivers() {
    driverTableBody.innerHTML = '';
    drivers.forEach((driver, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${driver.name}</td>
            <td>${driver.email}</td>
            <td>${driver.phone}</td>
            <td>${driver.status}</td>
            <td>
                <button onclick="viewDriver(${index})" id="bg-blue">VIEW</button>
                <button onclick="editDriver(${index})" id="bg-yellow">EDIT</button>
                <button onclick="deleteDriver(${index})" id="bg-red">DELETE</button>
            </td>
        `;
        driverTableBody.appendChild(row);
    });
}

function viewDriver(index) {
    const driver = drivers[index];
    document.getElementById('driverDetails').innerHTML = `
        <p><strong>Name:</strong> ${driver.name}</p>
        <p><strong>Email:</strong> ${driver.email}</p>
        <p><strong>Phone Number:</strong> ${driver.phone}</p>
        <p><strong>Status:</strong> ${driver.status}</p>
    `;
    viewDriverModal.style.display = 'flex';
}

function editDriver(index) {
    const driver = drivers[index];
    document.getElementById('editDriverName').value = driver.name;
    document.getElementById('editDriverEmail').value = driver.email;
    document.getElementById('editDriverPhone').value = driver.phone;
    editDriverModal.style.display = 'flex';
    editDriverForm.onsubmit = (e) => {
        e.preventDefault();
        drivers[index] = {
            name: document.getElementById('editDriverName').value,
            email: document.getElementById('editDriverEmail').value,
            phone: document.getElementById('editDriverPhone').value,
            status: driver.status,
        };
        displayDrivers();
        editDriverModal.style.display = 'none';
    };
}

function deleteDriver(index) {
    drivers.splice(index, );
    displayDrivers();
}

// Add Driver
addDriverBtn.onclick = () => {
    addDriverModal.style.display = 'flex';
};

closeModal.onclick = () => {
    addDriverModal.style.display = 'none';
};

addDriverForm.onsubmit = (e) => {
    e.preventDefault();
    const newDriver = {
        name: document.getElementById('driverName').value,
        email: document.getElementById('driverEmail').value,
        phone: document.getElementById('driverPhone').value,
        status: 'inactive',
    };
    const a= drivers.push(newDriver);
    displayDrivers();
    addDriverModal.style.display = 'none';
};

// Search Driver
searchBtn.onclick = () => {
    const searchTerm = searchInput.value.toLowerCase();
    driverTableBody.innerHTML = '';
    drivers
        .filter(driver => driver.name.toLowerCase().includes(searchTerm) || 
                           driver.email.toLowerCase().includes(searchTerm) || 
                           driver.phone.toLowerCase().includes(searchTerm))
        .forEach((driver, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${driver.name}</td>
                <td>${driver.email}</td>
                <td>${driver.phone}</td>
                <td>${driver.status}</td>
                <td>
                    <button onclick="viewDriver(${index})" class="bg-blue-500 text-white px-2 py-1 rounded">VIEW</button>
                    <button onclick="editDriver(${index})" class="bg-yellow-500 text-white px-2 py-1 rounded">EDIT</button>
                    <button onclick="deleteDriver(${index})" class="bg-red-500 text-white px-2 py-1 rounded">DELETE</button>
                </td>
            `;
            driverTableBody.appendChild(row);
        });
};

// Close Modals
closeViewModal.onclick = () => {
    viewDriverModal.style.display = 'none';
};

closeEditModal.onclick = () => {
    editDriverModal.style.display = 'none';
};

// Logout
logoutBtn.onclick = () => {
    window.location.href = 'login.html';
};

// Display drivers on load
displayDrivers();
</script>
</body>
</html>