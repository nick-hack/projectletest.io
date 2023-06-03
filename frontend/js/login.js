function login() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/newapi/User/login.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                // console.log("Response data: " + JSON.stringify(response));
                if (response.status_code == 200) {
                    // Login successful
                    alert("Login successful!");
                    localStorage.setItem("token", response.token);
                    localStorage.setItem("email", response.email);
                    localStorage.setItem("name", response.name);
                    localStorage.setItem("MobileNo", response.MobileNo);
                    localStorage.setItem("user_id", response.user_id);
                    window.location.href = '../Dashboard/dashboardhtml.php';
                } else {
                    // Login failed
                    alert("Login failed. Please try again.");
                }
            } else {
                // Server error
                alert("Server error. Please try again later.");
            }
        }
    };

    var data = JSON.stringify({ "email": email, "password": password });
    //var responses = JSON.stringify({ "token": response.token });
    // console.log(responses);
    xhr.send(data);
}




function logout() {
    document.getElementById("logout-btn").addEventListener("click", function () {
        // Send a request to the logout endpoint
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/newapi/User/logout.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Logout successful, redirect to login page
                window.location.href = "../html/login.php";
            } else if (xhr.readyState === 4 && xhr.status !== 200) {
                // Logout failed
                alert("Logout failed. Please try again.");
            }
        };

        xhr.send();
    });
}
logout();

