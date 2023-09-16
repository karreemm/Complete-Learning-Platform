<?php
include '../Components/db.php';


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['search_query'])) {
    $searchQuery = $_POST['search_query'];

    $searchQuery = strtolower($searchQuery);

    $courseSearchQuery = "SELECT * FROM courses WHERE LOWER(c_name) LIKE '%$searchQuery%'";
    $courseSearchResult = mysqli_query($conn, $courseSearchQuery);

    $diplomaSearchQuery = "SELECT * FROM diplomas WHERE LOWER(c_name) LIKE '%$searchQuery%'";
    $diplomaSearchResult = mysqli_query($conn, $diplomaSearchQuery);

    if (mysqli_num_rows($courseSearchResult) > 0 || mysqli_num_rows($diplomaSearchResult) > 0) {
        if ($courseRow = mysqli_fetch_assoc($courseSearchResult)) {
            $courseId = $courseRow['c_id'];
            header("Location: ../MainPages/DiplomaDetails.php?cid=$courseId&flag=workshop");
            exit(); 
        } elseif ($diplomaRow = mysqli_fetch_assoc($diplomaSearchResult)) {
            $diplomaId = $diplomaRow['c_id'];
            header("Location: ../MainPages/DiplomaDetails.php?cid=$diplomaId&flag=diploma");
            exit(); 
        }
    } else {
      echo '<div class="alert alert-danger" role="alert" style="margin-top: 100px; text-align: center; line-height: 2; font-weight: bold;">
      No Matching Diplomas, or Workshops Found.
  </div>';
    }
}
?>





<?php
if (!isset($_SESSION['admin'])){
     $_SESSION['admin']= false;
}


 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=== true && $_SESSION['admin']===true){
  echo"
  
  <nav class='navbar navbar-expand-lg bg-body-tertiary fixed-top text-dark'>
  <div class='container-fluid'>
    <div class='navbar-collapse'>
      <ul class='navbar-nav'>
        <li class='nav-item dropdown'>
          <a
            class='nav-link'
            href=''
            id='navbarDropdownMenuLink'
            role='button'
            data-bs-toggle='dropdown'
            aria-expanded='false'
          >
            <span style='font-size: x-large; font-weight: bold'
              >BETA ACADEMY</span
            >
          </a>
          <ul
            class='dropdown-menu'
            aria-labelledby='navbarDropdownMenuLink'
          >
            <li>
              <a class='dropdown-item' href='../MainPages/index.php'>Home</a>
            </li>
            <li>
              <a class='dropdown-item' href='../MainPages/Workshops.php'>Workshops</a>
            </li>
            <li>
              <a class='dropdown-item' href='../MainPages/Diplomas.php'>Diplomas</a>
            </li>
            <li><a class='dropdown-item' href='../MainPages/Events.php'>Events</a></li>
            <li><hr class='dropdown-divider' /></li>
            <li>
              <a class='dropdown-item' href='../LogIn/logout.php'>Log Out</a>
            </li>
            <li>
              <a class='dropdown-item' href='../MainPages/Aboutus.php'>About Us</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>

    <button
      class='navbar-toggler'
      type='button'
      data-bs-toggle='collapse'
      data-bs-target='#navbarScroll'
      aria-controls='navbarScroll'
      aria-expanded='false'
      aria-label='Toggle navigation'
    >
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarScroll'>
      <ul
        class='navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll'
        style='--bs-scroll-height: 100px'
      >
        <li class='nav-item dropdown'>
          <a
            class='nav-link dropdown-toggle btn btn-primary'
            href='#'
            role='button'
            data-bs-toggle='dropdown'
            aria-expanded='false'
            style='
              font-size: medium;
              color: white;
              padding: 5px 10px;
              font-weight: bold;
              margin-top: 11px;
            '
          >
            Explore
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a class='dropdown-item' href='../MainPages/index.php'>Home</a>
            </li>
            <li>
              <a class='dropdown-item' href='../MainPages/Workshops.php'>WorkShops</a>
            </li>
            <li>
              <a class='dropdown-item' href='../MainPages/Diplomas.php'>Diplomas</a>
            </li>
            <li><a class='dropdown-item' href='../MainPages/Events.php'>Events</a></li>

            <li><hr class='dropdown-divider' /></li>
            <li>
              <a class='dropdown-item' href='../LogIn/logout.php'>Log Out</a>
            </li>
            <li>
              <a class='dropdown-item' href='../MainPages/Aboutus.php'>About Us</a>
            </li>
          </ul>
        </li>
        <form
          class='d-flex'
          role='search'
          style='margin-left: 30px; margin-top: 10px'
          method='POST'
          action=''
        >
          <input
            name='search_query'
            class='form-control me-2'
            type='What You Want To Learn'
            placeholder='What Do You Want To Learn?'
            aria-label='What You Want To Learn'
            style='width: 400px; border-color: black'
          />
          <button class='btn btn-outline-primary' type='submit'>
            Search
          </button>
        </form>
        <li class='nav-item dropdown' style='margin-left: 500px'>
          <a
            class='nav-link dropdown-toggle btn btn-primary'
            href='#'
            role='button'
            data-bs-toggle='dropdown'
            aria-expanded='false'
            style='
              font-size: medium;
              color: white;
              padding: 5px 10px;
              font-weight: bold;
              margin-top: 11px;
            '
          >
             Website Controls
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a class='dropdown-item' href='../Admin/Dashboard.php'>Dashboard</a>
            </li>
            <li>
              <a class='dropdown-item' href='../Admin/OurUsers.php'>Our Users</a>
            </li>
            <li>
              <a class='dropdown-item' href='../Admin/OurAdmins.php'>Our Admins</a>
            </li>
            <li>
            <a class='dropdown-item' href='../Admin/CoursesStatistics.php'>Courses Statistics</a>
            </li>
            <li>
              <a class='dropdown-item' href='../Admin/AddCourses.php'>Add Courses</a>
            </li>
            <li>
              <a class='dropdown-item' href='../Admin/AddAdmin.php'>Add Admin</a>
            </li>
            <li><hr class='dropdown-divider' /></li>
            <li>
              <a class='dropdown-item' href='../LogIn/logout.php'>Log Out</a>
            </li>
            
            
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

  ";
  
} else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=== true ){
  echo "
  
  <nav class='navbar navbar-expand-lg bg-body-tertiary fixed-top text-dark'>
        <div class='container-fluid'>
          <div class='navbar-collapse'>
            <ul class='navbar-nav'>
              <li class='nav-item dropdown'>
                <a
                  class='nav-link'
                  href=''
                  id='navbarDropdownMenuLink'
                  role='button'
                  data-bs-toggle='dropdown'
                  aria-expanded='false'
                >
                  <span style='font-size: x-large; font-weight: bold'
                    >BETA ACADEMY</span
                  >
                </a>
                <ul
                  class='dropdown-menu'
                  aria-labelledby='navbarDropdownMenuLink'
                >
                  <li>
                    <a class='dropdown-item' href='../MainPages/index.php'>Home</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='../MainPages/Workshops.php'>Workshops</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='../MainPages/Diplomas.php'>Diplomas</a>
                  </li>
                  <li><a class='dropdown-item' href='../MainPages/Events.php'>Events</a></li>
                  <li><hr class='dropdown-divider' /></li>
                  <li>
                    <a class='dropdown-item' href='../LogIn/logout.php'>Log Out</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='../MainPages/Aboutus.php'>About Us</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
  
          <button
            class='navbar-toggler'
            type='button'
            data-bs-toggle='collapse'
            data-bs-target='#navbarScroll'
            aria-controls='navbarScroll'
            aria-expanded='false'
            aria-label='Toggle navigation'
          >
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarScroll'>
            <ul
              class='navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll'
              style='--bs-scroll-height: 100px'
            >
              <li class='nav-item dropdown'>
                <a
                  class='nav-link dropdown-toggle btn btn-primary'
                  href='#'
                  role='button'
                  data-bs-toggle='dropdown'
                  aria-expanded='false'
                  style='
                    font-size: medium;
                    color: white;
                    padding: 5px 10px;
                    font-weight: bold;
                    margin-top: 11px;
                  '
                >
                  Explore
                </a>
                <ul class='dropdown-menu'>
                  <li>
                    <a class='dropdown-item' href='../MainPages/index.php'>Home</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='../MainPages/Workshops.php'>WorkShops</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='../MainPages/Diplomas.php'>Diplomas</a>
                  </li>
                  <li><a class='dropdown-item' href='../MainPages/Events.php'>Events</a></li>
  
                  <li><hr class='dropdown-divider' /></li>
                
                  <li>
                    <a class='dropdown-item' href='../MainPages/Aboutus.php'>About Us</a>
                  </li>
                </ul>
              </li>
              <form
          class='d-flex'
          role='search'
          style='margin-left: 30px; margin-top: 10px'
          method='POST'
          action=''
        >
          <input
            name='search_query'
            class='form-control me-2'
            type='What You Want To Learn'
            placeholder='What Do You Want To Learn?'
            aria-label='What You Want To Learn'
            style='width: 400px; border-color: black'
          />
          <button class='btn btn-outline-primary' type='submit'>
            Search
          </button>
        </form>
              <li class='nav-item dropdown' style='margin-left: 500px'>
                <a
                  class='nav-link dropdown-toggle btn btn-primary'
                  href='#'
                  role='button'
                  data-bs-toggle='dropdown'
                  aria-expanded='false'
                  style='
                    font-size: medium;
                    color: white;
                    padding: 5px 10px;
                    font-weight: bold;
                    margin-top: 11px;
                  '
                >
                    Your Profile
                </a>
                <ul class='dropdown-menu'>
                <li>
                    <a class='dropdown-item' href='../User/UserDashboard.php'>My Profile</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='../User/UserSettings.php'>Settings</a>
                  </li>
                  <li>
                    <a class='dropdown-item' href='../LogIn/logout.php'>Log Out</a>
                  </li>
                  <li>
                  
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  
  ";} 
  else {
  echo"
  
  <nav class='navbar navbar-expand-lg bg-body-tertiary fixed-top text-dark'>
      <div class='container-fluid'>
        <div class='navbar-collapse'>
          <ul class='navbar-nav'>
            <li class='nav-item dropdown'>
              <a
                class='nav-link'
                href=''
                id='navbarDropdownMenuLink'
                role='button'
                data-bs-toggle='dropdown'
                aria-expanded='false'
              >
                <span style='font-size: x-large; font-weight: bold'
                  >BETA ACADEMY</span
                >
              </a>
              <ul
                class='dropdown-menu'
                aria-labelledby='navbarDropdownMenuLink'
              >
                <li>
                  <a class='dropdown-item' href='../MainPages/index.php'>Home</a>
                </li>
                <li>
                  <a class='dropdown-item' href='../MainPages/Workshops.php'>Workshops</a>
                </li>
                <li>
                  <a class='dropdown-item' href='../MainPages/Diplomas.php'>Diplomas</a>
                </li>
                <li><a class='dropdown-item' href='../MainPages/Events.php'>Events</a></li>
                <li><hr class='dropdown-divider' /></li>
                <li>
                  <a class='dropdown-item' href='../LogIn/Signup.php'>Join Us</a>
                </li>
                <li>
                  <a class='dropdown-item' href='../MainPages/Aboutus.php'>About Us</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

        <button
          class='navbar-toggler'
          type='button'
          data-bs-toggle='collapse'
          data-bs-target='#navbarScroll'
          aria-controls='navbarScroll'
          aria-expanded='false'
          aria-label='Toggle navigation'
        >
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarScroll'>
          <ul
            class='navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll'
            style='--bs-scroll-height: 100px'
          >
            <li class='nav-item dropdown'>
              <a
                class='nav-link dropdown-toggle btn btn-primary'
                href='#'
                role='button'
                data-bs-toggle='dropdown'
                aria-expanded='false'
                style='
                  font-size: medium;
                  color: white;
                  padding: 5px 10px;
                  font-weight: bold;
                  margin-top: 11px;
                '
              >
                Explore
              </a>
              <ul class='dropdown-menu'>
                <li>
                  <a class='dropdown-item' href='../MainPages/index.php'>Home</a>
                </li>
                <li>
                  <a class='dropdown-item' href='../MainPages/Workshops.php'>WorkShops</a>
                </li>
                <li>
                  <a class='dropdown-item' href='../MainPages/Diplomas.php'>Diplomas</a>
                </li>
                <li><a class='dropdown-item' href='../MainPages/Events.php'>Events</a></li>

                <li><hr class='dropdown-divider' /></li>
              
                <li>
                  <a class='dropdown-item' href='../MainPages/Aboutus.php'>About Us</a>
                </li>
              </ul>
            </li>
            <form
          class='d-flex'
          role='search'
          style='margin-left: 30px; margin-top: 10px'
          method='POST'
          action=''
        >
          <input
            name='search_query'
            class='form-control me-2'
            type='What You Want To Learn'
            placeholder='What Do You Want To Learn?'
            aria-label='What You Want To Learn'
            style='width: 400px; border-color: black'
          />
          <button class='btn btn-outline-primary' type='submit'>
            Search
          </button>
        </form>
            <li class='nav-item' style='margin-left: 510px'>
              <a
                class='nav-link active'
                aria-current='page'
                href='../LogIn/Login.php'
                style='font-size: medium; font-weight: bold'
                >Log In
              </a>
            </li>
            <li class='nav-item' st>
              <a
                href='../LogIn/Signup.php'
                class='btn btn-primary'
                role='button'
                style='margin-top: 5px; font-weight: bold'
                >Sign Up</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
  
  ";
}

?>
