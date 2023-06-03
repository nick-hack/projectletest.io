function loadStudents(page = 1, per_page = 10) {
    const xhr = new XMLHttpRequest();
    // <!----token get automatically taken this code----------------------------------------->
    const token = localStorage.getItem('token'); // Retrieve token from local storage
    // <!----token get automatically taken this code----------------------------------------->
    //console.log(token);

    xhr.open("GET", `http://localhost/newapi/User/api-fetch-false.php?page=${page}&per_page=${per_page}`);
    xhr.setRequestHeader("Authorization", `Bearer ${token}`); // Set token in the request header
    xhr.setRequestHeader("Access-control-Allow-Origin", "*");
    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            //<!-----------------------------Retrive Response---------------------->
            //console.log(response);
            const students = response.data;
            const pagination = response.pagination;
            const email = response.email;
            const names = response.names;
            // update table body with data
            const tableBody = document.querySelector("#studentsTable tbody");
            tableBody.innerHTML = "";
            students.forEach((student) => {
                const row = document.createElement("tr");
                row.innerHTML = `
    <td>${student['Student Name']}</td>
    <td>${student['Age']}</td>
    <td>${student['City']}</td>
    <td>${student['Roll No']}</td>
    <td>${student['mobileno']}</td>
    <td>
       
        <button class="btn" onclick="deleteStudent('${student['Id']}')"><i class="fa fa-edit"></i></button>

        <button class="btn" onclick="deleteStudent('${student['Id']}')"><i class="fa fa-trash"></i></button>
        
    </td>
`;
                tableBody.appendChild(row);
            });

            // <button onclick="editStudent('${student['Id']}')">Edit</button>
            // <button onclick="deleteStudent('${student['Id']}')">Delete</button>
            //<!------------------------------- update pagination info-------------------------->

            //             const paginationDiv = document.querySelector("#pagination");
            //             paginationDiv.innerHTML = `
            //   <p>Page <span id="current-page">${pagination.current_page}</span> of <span id="total-pages">${pagination.total_pages}</span></p>
            //   <button onclick="loadStudents(${pagination.current_page - 1}, ${pagination.records_per_page})" ${pagination.current_page == 1 ? 'disabled' : ''}>Prev</button>
            //   <button onclick="loadStudents(${pagination.current_page + 1}, ${pagination.records_per_page})" ${pagination.current_page == pagination.total_pages ? 'disabled' : ''}>Next</button>
            // `;

            const paginationDiv = document.querySelector("#pagination");
            paginationDiv.innerHTML = `
    <p>Page <span id="current-page">${pagination.current_page}</span> of <span id="total-pages">${pagination.total_pages}</span></p>
    <div class="pagination-buttons">
        <button onclick="loadStudents(${pagination.current_page - 1}, ${pagination.records_per_page})" ${pagination.current_page === 1 ? 'disabled' : ''}>
            <i class="fas fa-chevron-left"></i> Prev
        </button>
        <button onclick="loadStudents(${pagination.current_page + 1}, ${pagination.records_per_page})" ${pagination.current_page === pagination.total_pages ? 'disabled' : ''}>
            Next <i class="fas fa-chevron-right"></i>
        </button>
    </div>
`;


            // update total records count
            const totalRecordsSpan = document.querySelector("#total-records");
            totalRecordsSpan.innerText = pagination.total_records;

            // update current page number
            const currentPageSpan = document.querySelector("#current-page");
            currentPageSpan.innerText = pagination.current_page;

            // update total pages count
            const totalPagesSpan = document.querySelector("#total-pages");
            totalPagesSpan.innerText = pagination.total_pages;

            // ...

            // update email field
            // const emailSpan = document.querySelector("#email");
            // if (email.length > 0) {
            //     emailSpan.innerText = email;
            // } else {
            //     emailSpan.innerText = "No email available";
            // }

            // update names field
            const namesSpan = document.querySelector("#names");
            if (names.length > 0) {
                namesSpan.innerText = names;
            } else {
                namesSpan.innerText = "No names available";
            }

            // ...


        } else {
            console.error(xhr.statusText);
        }
    };
    xhr.onerror = function () {
        console.error(xhr.statusText);
    };
    xhr.send();
}

// load first page of data on page load
loadStudents();




function editStudent(studentId) {
    // Perform the edit action based on the studentId
    // You can access the student data using the studentId
    // Example logic:
    console.log(`Editing student with ID ${studentId}`);
    // Perform the necessary actions for editing, such as showing a modal, updating form fields, etc.
}



function deleteStudent(studentId) {
    // Perform the delete action based on the studentId
    // You can access the student data using the studentId
    // Example logic:
    console.log(`deleting student with ID ${studentId}`);
    // Perform the necessary actions for deleting, such as showing a modal, deleting form fields, etc.
}




function sendData() {
    // Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // Define the endpoint URL and method
    // let url = "http://localhost/newapi/admin/api-insert.php";
    let url = "http://localhost/newapi/User/api-insert.php";
    let method = "POST";

    // Get the form values
    let sname = document.getElementById("sname").value.trim();
    let sage = document.getElementById("sage").value.trim();
    let scity = document.getElementById("scity").value.trim();
    let sRollNo = document.getElementById("sRollNo").value.trim();
    let smobileno = document.getElementById("smobileno").value.trim();

    // Validate the form data
    if (!sname || !sage || !scity || !sRollNo || !smobileno) {
        console.error("Please fill out all fields.");
        return;
    }

    if (isNaN(sage) || isNaN(sRollNo) || isNaN(smobileno)) {
        console.error("Please enter a valid number.");
        return;
    }

    // Create a data object with the form values
    let data = {
        sname: sname,
        sage: sage,
        scity: scity,
        sRollNo: sRollNo,
        smobileno: smobileno
    };

    // Convert the data object to a JSON string
    let jsonData = JSON.stringify(data);

    // Open the request
    xhr.open(method, url, true);

    // Set the request headers
    xhr.setRequestHeader("Content-Type", "application/json");
    //  xhr.setRequestHeader("Authorization", "Bearer " + token);  // this comment becasuse code not run his not using local storage
    xhr.setRequestHeader("Access-control-Allow-Origin", "*");
    xhr.setRequestHeader("Access-control-Allow-Methods", "POST");
    xhr.setRequestHeader(
        "Access-control-Allow-Headers",
        "Access-control-Allow-Headers, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-With"
    );

    // Define the response handler function
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText);
            // Reload the page
            location.reload();
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200) {
            console.error(xhr.responseText);
            // Do something with the error response
        }
    };

    // Send the request with the JSON data
    xhr.send(jsonData);
}





//old code
// function sendData() {
//     // Create a new XMLHttpRequest object
//     let xhr = new XMLHttpRequest();

//     // Define the endpoint URL and method
//     let url = "http://localhost/newapi/admin/api-insert.php";
//     let method = "POST";

//     // Create a data object with the form values
//     let data = {
//         sname: document.getElementById("sname").value,
//         sage: document.getElementById("sage").value,
//         scity: document.getElementById("scity").value,
//         sRollNo: document.getElementById("sRollNo").value,
//         smobileno: document.getElementById("smobileno").value
//     };

//     // Convert the data object to a JSON string
//     let jsonData = JSON.stringify(data);

//     // Open the request
//     xhr.open(method, url, true);

//     // Set the request headers
//     xhr.setRequestHeader("Content-Type", "application/json");
//     xhr.setRequestHeader("Access-control-Allow-Origin", "*");
//     xhr.setRequestHeader("Access-control-Allow-Methods", "POST");
//     xhr.setRequestHeader("Access-control-Allow-Headers", "Access-control-Allow-Headers, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-With");

//     // Define the response handler function
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//             console.log(xhr.responseText);
//             // Reload the page
//             location.reload();
//         } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200) {
//             console.error(xhr.responseText);
//             // Do something with the error response
//         }
//     };

//     // Send the request with the JSON data
//     xhr.send(jsonData);
// }





