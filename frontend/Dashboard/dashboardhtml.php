<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="../Dashboard/dashboardcss.css">
    <!-------------------------------------------------title-------------------------->
    <title class="fas fa-user-secret me-2">Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../img/logo/a.png">
    <!-------------------------------------------------title-------------------------->
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!--Sidebar starts here-->

        <div class="bg-white">

            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>Codersbite</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-project-diagram me-2"></i>Projects</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-chart-line me-2"></i>Analytics</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i>Reports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-shopping-cart me-2"></i>Store Mng</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-gift me-2"></i>Products</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Outlet</a>
                <!-- <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" id="logout-btn"><i class="fas fa-power-off me-2"></i>Logout</a> -->
            </div>
        </div>
        <!--Sidebar ends here-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><span id="names"></span>

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#" id="logout-btn" onsubmit="logout();">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <!-- <form onsubmit="sendData(); return false;"> -->
                <form id="myForm" onsubmit="sendData(); return false;">
                    <section class="vh-10 gradient-custom">
                        <div class="container py-5 h-100">
                            <div class="row justify-content-center align-items-center h-100">


                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="sname" class="form-control form-control-lg" placeholder="student_name" required />

                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="sage" class="form-control form-control-lg" placeholder="age" required />

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline w-100">
                                            <input type="text" class="form-control form-control-lg" id="sRollNo" placeholder="RollNo" required />

                                        </div>

                                    </div>
                                    <!--<div class="col-md-6 mb-4">
      
                                <h6 class="mb-2 pb-1">Gender: </h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                                 value="option1" checked />
                                <label class="form-check-label" for="femaleGender">Female</label>
                             </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                                value="option2" />
                                <label class="form-check-label" for="maleGender">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                                    value="option3" />
                                 <label class="form-check-label" for="otherGender">Other</label>
                            </div>

                        </div>-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="text" id="scity" class="form-control form-control-lg" placeholder="City" required />

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="tel" id="smobileno" class="form-control form-control-lg" placeholder="PhoneNumber" required />
                                        </div>

                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                    <button type="reset" class="btn btn-outline-danger btn-lg">Reset</button>
                                </div>
                            </div>
                        </div>
                    </section>

                </form>
                <hr>
                <!-- <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">720</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Sales</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">3899</h3>
                                <p class="fs-5">Delivery</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Increase</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div> -->


                <div class="row my-5">

                    <div class="col">
                        <button type="button" class="btn btn-primary position-relative">
                            Student
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger " id="total-records">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>

                        <!---search------------------------>
                        <!-- <button type="button" class="btn btn-primary float-end" style="margin-right: 30px;">
                            <div class="input-group">
                                <input class="form-control border border rounded-pill" type="search" id="example-search-input" placeholder="Search">
                            </div>
                        </button> -->
                        <!---search------------------------>

                        <table class="table table-success table-striped table-bordered" id="studentsTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Mobile No</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Created Date</th>
                                    <th scope="col">Updated Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div id="pagination"></div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
    <script src="../js/Dashboard.js"></script>
    <script src="../js/login.js"></script>
</body>

</html>