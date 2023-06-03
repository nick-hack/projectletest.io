function getUserData() {
    const xhr = new XMLHttpRequest();
    const url = 'http://localhost/newapi/User/api-user-single.php';

    xhr.open('GET', url);
    const token = localStorage.getItem('token'); // Retrieve token from local storage
    xhr.setRequestHeader('Authorization', `Bearer ${token}`); // Set token in the request header

    xhr.onload = function () {
        if (xhr.status === 200) {
            //console.log(xhr.response);
            const response = JSON.parse(xhr.responseText);
            console.log(response);
            if (response.error) {
                console.error(response.error);
            } else {
                const fullname = response.fullname;
                const email = response.email;
                const mobile = response.mobile;
                const Addresess = response.Addresess;
                const UserRole = response.UserRole;
                const userfile_path = response.userfile_path; // get the path to the profile picture

                // Update the HTML elements with the data
                const fullnameElements = document.querySelectorAll('.fullname');
                fullnameElements.forEach((element) => (element.textContent = fullname));

                const emailElements = document.querySelectorAll('.email');
                emailElements.forEach((element) => (element.textContent = email));

                const mobileElements = document.querySelectorAll('.mobile');
                mobileElements.forEach((element) => (element.textContent = mobile));

                const AddresessElements = document.querySelectorAll('.Addresess');
                AddresessElements.forEach((element) => (element.textContent = Addresess));

                const UserRoleElements = document.querySelectorAll('.UserRole');
                UserRoleElements.forEach((element) => (element.textContent = UserRole));

                const userfile_pathElements = document.querySelectorAll('.profile-picture');
                userfile_pathElements.forEach(
                    (element) =>
                        (element.src = userfile_path + 'Array.webp') // update the src attribute of the img element with the path to the profile picture
                );
            }
            //console.log(userfile_path);
            //console.log(response); // this code response check for console log file
        } else {
            console.error(`Request failed. Returned status of ${xhr.status}`);
        }
    };

    xhr.send();
}

// Call the getUserData function
getUserData();




function updatedata() {
    // Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // Define the endpoint URL and method
    let url = "http://localhost/newapi/User/api-user-update.php";
    let method = "PUT";

    // Get the token from localStorage
    let token = localStorage.getItem("token");

    // Get the form values
    let sFirstName = document.getElementById("sFirstName").value.trim();
    let sLastName = document.getElementById("sLastName").value.trim();
    let sMobileNo = document.getElementById("sMobileNo").value.trim();
    let semail = document.getElementById("semail").value.trim();
    let sAddresess = document.getElementById("sAddresess").value.trim();

    // Create a data object with the form values
    let data = {
        sFirstName: sFirstName,
        sLastName: sLastName,
        sMobileNo: sMobileNo,
        semail: semail,
        sAddresess: sAddresess
    };

    // Convert the data object to a JSON string
    let jsonData = JSON.stringify(data);

    // Open the request
    xhr.open(method, url, true);

    // Set the request headers
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("Authorization", "Bearer " + token);

    // Define the response handler function
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log("Request successful");
                // Perform any necessary actions, such as displaying a success message or refreshing the page
                alert("Update successful!");
                location.reload(); // Reload the page
            } else {
                console.error("Request failed with status: " + xhr.status);
                // Handle the error response
                alert("Update failed. Please try again later.");
            }
        }
    };

    xhr.onerror = function () {
        console.error("An error occurred during the request.");
        alert("An error occurred during the request. Please try again later.");
    };

    // Send the request with the JSON data
    xhr.send(jsonData);
}



// function updatedata() {
//     // Create a new XMLHttpRequest object
//     let xhr = new XMLHttpRequest();

//     // Define the endpoint URL and method
//     let url = "http://localhost/newapi/User/api-user-update.php";
//     let method = "PUT";

//     // Get the form values
//     let sFirstName = document.getElementById("sFirstName").value.trim();
//     let sLastName = document.getElementById("sLastName").value.trim();
//     let sMobileNo = document.getElementById("sMobileNo").value.trim();
//     let semail = document.getElementById("semail").value.trim();
//     let sAddresess = document.getElementById("sAddresess").value.trim();

//     // Create a data object with the form values
//     let data = {
//         sFirstName: sFirstName,
//         sLastName: sLastName,
//         sMobileNo: sMobileNo,
//         semail: semail,
//         sAddresess: sAddresess
//     };

//     // Convert the data object to a JSON string
//     let jsonData = JSON.stringify(data);

//     // Open the request
//     xhr.open(method, url, true);

//     // Set the request headers
//     xhr.setRequestHeader("Content-Type", "application/json");
//     xhr.setRequestHeader("Access-control-Allow-Origin", "*");
//     xhr.setRequestHeader("Access-Control-Request-Method", "PUT");
//     xhr.setRequestHeader("Access-control-Allow-Methods", "PUT");
//     xhr.setRequestHeader(
//         "Access-control-Allow-Headers",
//         "Access-control-Allow-Headers, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-With"
//     );

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
