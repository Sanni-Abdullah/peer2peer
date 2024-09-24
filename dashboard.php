<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- Montserrat Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="admin.css">


  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />

</head>

<body>
  <div class="grid-container">

    <!-- Header -->
    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
      </div>
      <div class="header-left">
        <h3>USER DASHBOARD</h3>
      </div>
      <div class="header-right">
        <a href="MessagingSystem/index.php">
          <span class="material-icons-outlined">message</span>
        </a>

        <a href="#">
          <span class="material-icons-outlined">notifications</span>
        </a>
        <span class="material-icons-outlined">account_circle</span>
      </div>
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar">
      <div class="sidebar-title">
        <div class="sidebar-brand">
          <img src="img/Group 25.png">
        </div>
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
      </div>

      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="#" onclick="showPage('dashboard')">
            <span class="material-icons-outlined">dashboard</span>
            Dashboard
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="course_page.html" onclick="showPage('courses')">
            <span class="material-icons-outlined">inventory_2</span>
            Courses
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="friend_page.html" onclick="showPage('friends')">
            <span class="material-icons-outlined">people</span>
            Friends
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="group_page.html" onclick="showPage('groups')">
            <span class="material-icons-outlined">groups</span>
            Groups
          </a>
        </li>

        <li class="sidebar-list-item">
          <a href="#" onclick="showPage('settings')">
            <span class="material-icons-outlined">settings</span>
            Settings
          </a>
        </li>
      </ul>
    </aside>
    <!-- End Sidebar -->

    <!-- Main -->

    <main class="main-container">

      <div id="dashboard" class="page active">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD - OVERVIEW</p>
        </div>


        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">COURSES</p>
              <span class="material-icons-outlined text-blue">people</span>
            </div>
            <span class="text-primary font-weight-bold">10</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">FRIENDS</p>
              <span class="material-icons-outlined text-orange">people</span>
            </div>
            <span class="text-primary font-weight-bold">83</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">GROUPS</p>
              <span class="material-icons-outlined text-green">groups</span>
            </div>
            <span class="text-primary font-weight-bold">7</span>
          </div>

         
        </div>

      </div>


          <!-- Settings Page -->
          <div id="settings" class="page">
            <div class="main-title">
              <p class="font-weight-bold">SETTINGS</p>
            </div>
            <div class="setting-content">
              <!-- Settings content goes here -->
              <ul class="setting-nav">
                <a href="#">
                  <li>Account Settings - Update Profile</li>
                </a>
              </ul>

              <div id="profile-container" class="profile-container">
                <div class="image-wrapper">
                  <img id="profileImage" src="img/account_circle_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" alt="Profile Picture" />
                  <img id="profileIcon" src="img/account_circle_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" alt="Profile Picture" style="display: none;" />
                </div>
                <input type="file" id="fileInput" accept="image/*" style="display: none;" />
                <button id="uploadBtn" class="btn">Upload Profile</button>
                <button id="removeBtn" class="btn" style="display: none;">Remove Profile</button>
              </div>

              <div class="submit-btn">
                <a href="updateprofile.php">Update Profile</a>
              </div>


              <div id="message"></div>
            </div>
          </div>

    </main>
    <!-- End Main -->

  </div>

  <!-- Scripts -->
  <!-- ApexCharts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>


  <script>
    var options = {
      chart: {
        type: 'donut' // Set the chart type to 'donut'
      },
      series: [44, 55, 41, 17, 15], // Data for the chart
      labels: ['GROUP 1', 'GROUP 2', 'GROUP 3', 'GROUP 4', 'GROUP 5'], // Labels for the chart segments
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 300
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
    };

    var chart = new ApexCharts(document.querySelector("#doughnut-chart"), options);
    chart.render();
  </script>
  <!-- Custom JS -->
  <script src="index.js"></script>
</body>

</html>