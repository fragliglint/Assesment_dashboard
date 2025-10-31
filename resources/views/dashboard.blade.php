<!--C:\Users\sifat\Music\assessment-dashboard\resources\views\dashboard.blade.php-->

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Assessment Dashboard</title>

  <!-- Font Awesome 6.5 (icons) -->
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

  <!-- App CSS -->
  <link href="/css/styles.css" rel="stylesheet">
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar" id="app-sidebar">
    <div class="brand">
      <div class="logo">∞</div>
      <div class="brand-text">ASSESSMENT</div>
    </div>

    <div class="filters">
      <div class="filter-group">
        <label>COMPANY</label>
        <select>
          <option value="">SELECT COMPANY</option>
          <option value="COMPANY A">COMPANY A</option>
          <option value="COMPANY B">COMPANY B</option>
          <option value="COMPANY C">COMPANY C</option>
        </select>
      </div>

      <div class="filter-group">
        <label>DIVISION</label>
        <select>
          <option value="">SELECT DIVISION</option>
          <option value="GARMENTS">GARMENTS</option>
          <option value="TEXTILE">TEXTILE</option>
        </select>
      </div>

      <div class="filter-group">
        <label>DEPARTMENT</label>
        <select>
          <option value="">SELECT DEPARTMENT</option>
          <option value="HR">HR</option>
          <option value="FINANCE">FINANCE</option>
          <option value="PRODUCTION">PRODUCTION</option>
        </select>
      </div>

      <div class="filter-group">
        <label>SUB DEPARTMENT</label>
        <select>
          <option value="">SELECT SUB DEPARTMENT</option>
          <option value="technical"></option>
          <option value="executive">Executive Search</option>
        </select>
      </div>

      <div class="filter-group">
        <label>WORK LEVEL</label>
        <select>
          <option value="">SELECT WORK LEVEL</option>
          <option value="technical"></option>
          <option value="executive">Executive Search</option>
        </select>
      </div>
      
      <div class="filter-group">
        <label>DESIGNATION</label>
        <select>
          <option value="">SELECT DESIGNATION</option>
          <option value="technical"></option>
          <option value="executive">Executive Search</option>
        </select>
      </div>

      <div class="filter-group">
        <label>EMPLOYEE NAME OR ID</label>
        <input type="text" placeholder="ENTER EMPLOYEE NAME OR ID">
      </div>
    </div>
  </aside>

  <!-- Main -->
  <div class="main">
    <header class="topbar">
      <div class="header-left">
        <div class="menu-btn" title="Menu">
          <i class="fas fa-bars"></i>
        </div>
        <div class="fullscreen-btn" title="Fullscreen">
          <i class="fas fa-expand"></i>
        </div>
      </div>

      <div class="header-right">
        <div class="icon-wrapper" title="Notifications">
          <i class="fas fa-bell icon-bell"></i>
          <span class="badge red">5</span>
        </div>

        <div class="icon-wrapper" title="Messages">
          <i class="fas fa-envelope icon-msg"></i>
          <span class="badge blue">5</span>
        </div>

        <div class="profile">
          <img src="https://i.pravatar.cc/40?img=12" alt="User">
          <span>Abid Hasan Turzo</span>
        </div>
      </div>
    </header>

    <section class="content">
      <div class="page-header">
        <span class="breadcrumb">Dashboard</span>
        <h2>Dashboard</h2>
      </div>

      <div class="panel">
        <!-- Row 1: Four equal dropdown buttons -->
        <div class="btn-row">
          <div class="dropdown-wrapper">
            <button class="btn purple" type="button">
              Organizational Design <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-menu">
              <a href="#">Organization Structure</a>
              <a href="#">Role Definitions</a>
              <a href="#">Reporting Hierarchy</a>
              <a href="#">Workflow Design</a>
            </div>
          </div>

          <div class="dropdown-wrapper">
            <button class="btn green" type="button">
                Job Descriptions <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-menu">
                <a href="{{ url('/create_jd') }}">Create Job Description</a>
                <a href="#">Update Existing</a>
                <a href="{{ url('/job-description') }}">Job Description Template</a>
                <a href="#">Competency Framework</a>
            </div>
          </div>

          <div class="dropdown-wrapper">
            <button class="btn cyan" type="button">
              Training And Development <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-menu">
              <a href="#">Training Programs</a>
              <a href="#">Skill Development</a>
              <a href="#">Career Pathing</a>
              <a href="#">Learning Management</a>
            </div>
          </div>

          <div class="dropdown-wrapper">
            <button class="btn yellow" type="button">
              Rewards And Career Management System <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-menu">
              <a href="#">Compensation Planning</a>
              <a href="#">Bonus Structure</a>
              <a href="#">Promotion Guidelines</a>
              <a href="#">Career Progression</a>
            </div>
          </div>
        </div>

        <!-- Row 2: One full-width dropdown button -->
        <div class="btn-row single">
          <div class="dropdown-wrapper full">
            <button class="btn dark" type="button">
              Performance Management System <i class="fas fa-caret-down"></i>
            </button>
            <div class="dropdown-menu">
              <a href="#">Performance Reviews</a>
              <a href="#">KPI Setting</a>
              <a href="#">Goal Management</a>
              <a href="#">Feedback System</a>
              <a href="#">Appraisal Process</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- App JS -->
  <script src="/js/script.js"></script>
</body>
</html>
