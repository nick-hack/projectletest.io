<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-------------------------------------------------title-------------------------->
    <title class="fas fa-user-secret me-2">profile</title>
    <link rel="icon" type="image/x-icon" href="../img/logo/a.png">
    <!-------------------------------------------------title-------------------------->
    <link rel="stylesheet" href="../Dashboard/profile.css">
</head>

<body>
    <div class="container">
        <div class="main-body">
            <!----srush-->
            <!---aniket--->
            <!-- Breadcrumb -->
            <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav> -->
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle profile-picture" width="150">

                                <!-- <img id="uploaded-image" alt="Uploaded Image" class="profile-picture" width="150"> -->
                                <!-- <input type="file" id="file" name="file">
                                <button type="button" onclick="upload()">Upload</button> -->
                                <div class="mt-3">
                                    <h4 class="fullname">John Doe</h4>
                                    <p class="text-secondary mb-1"><strong><span class="UserRole">Full Stack Developer</span></strong></p>
                                    <p class="text-muted font-size-sm fas fa-address-card">
                                        <span class="Addresess ">Default Address 100 street road</span>
                                    </p><br>
                                    <!-- <button type="file" id="file" name="file" class="btn btn-primary">Follow</button> -->
                                    <label for="file"><i class="fa fa-plus" style="font-size: 15px; border:1px solid black; padding:5px; background-color:#49d2ea;"></i></label>
                                    <input type="file" id="file" name="file" style="display: none; visibility:none;">
                                    <!-- <button type="file" id="file" class="btn btn-outline-primary">Upload</button> -->
                                    <button type="button" onclick="upload()" class="btn btn-outline-primary">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>Website</h6>
                                <span class="text-secondary">https://bootdey.com</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                        </path>
                                    </svg>Github</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary">@bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                        </path>
                                    </svg>Facebook</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                        </ul>
                    </div> -->



                </div>

                <div class="col-md-8">

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="fullname">Demoname</span>
                                    <!-- Fullname will be populated here -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" class="email">
                                    <span class="email">demo@portal.com</span>
                                    <!-- Email will be populated here -->
                                </div>
                            </div>
                            <!-- <hr> -->
                            <!-- <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="phone">
                                     Phone number will be populated here 
                        </div>
                    </div> -->
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="mobile">0099-9090-09</span>
                                    <!-- Mobile number will be populated here -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span class="Addresess">Default Address 100 street road</span>
                                    <!-- Address will be populated here -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--------------open model code --->
                                    <button class="edit-user-button btn btn-outline-info" target="__blank" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button>
                                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                        Open modal
                                    </button> -->
                                    <!-----close mode----->
                                </div>
                            </div>
                        </div>
                    </div>


                    <!------------------------ The Modal code ------------------------->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edited Data</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <!-- Modal body.. -->

                                    <div class="container mt-3">
                                        <!-- <h2>Stacked form</h2>  onclick="updatedata()" -->
                                        <form id="myForm" onsubmit="updatedata(); return false;">
                                            <div class="mb-3 mt-3">
                                                <label for="FirstName">FirstName:</label>
                                                <input type="text" class="form-control" id="sFirstName" placeholder="Enter firstname">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="LastName">LastName:</label>
                                                <input type="text" class="form-control" id="sLastName" placeholder="Enter LastName">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="semail" placeholder="Enter Email">
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="mobile">mobile:</label>
                                                <input type="text" class="form-control" id="sMobileNo" placeholder="Enter Address">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Addresess">Address:</label>
                                                <input type="text" class="form-control" id="sAddresess" placeholder="Enter Address">
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                                                </label> -->
                                            <!-- </div> -->
                                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                            <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                        </form>
                                    </div>



                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--------------------------------------model code end--------------------->

                    <!-- <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Mobile Template</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Backend API</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Mobile Template</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Backend API</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->


                </div>

                <br>
                <br>

                <!------ card design slider--------------------------------->

                <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-wrapper container-sm d-flex  justify-content-around">
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-wrapper container-sm d-flex   justify-content-around">
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-wrapper container-sm d-flex  justify-content-around">
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img src="https://source.unsplash.com/collection/190727/1600x900" alt="Avatar" style="width:300px;height:300px;">
                                        </div>
                                        <div class="flip-card-back">
                                            <h1>John Doe</h1>
                                            <p>Architect & Engineer</p>
                                            <p>We love that guy</p>
                                        </div>
                                    </div>
                                </div>
                                <!--card-->
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>



                <!-------------- card design slider--------------------------------->

            </div>

        </div>
    </div>



    <script src="../js/profile.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>