      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span class="logo-name"><?php echo $site['webname']; ?></span>
            </a>
          </div>
          <ul class="sidebar-menu">

            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="settings.php" class="nav-link"><i data-feather="monitor"></i><span>Website Settings</span></a>
            </li>
            <!-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Message</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Inbox</a></li>
                <li><a class="nav-link" href="#">Compose</a></li>
                <li><a class="nav-link" href="#">Read</a></li>
              </ul>
            </li> -->

            <li class="menu-header">Management</li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Project Management</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="add_project.php">Add New Project</a></li>
                <li><a class="nav-link" href="project.php">All Projects</a></li>
                <!-- <li><a class="nav-link" href="project_category.php">Add Project Category</a></li> -->
              </ul>
            </li>


            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Blog Management</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="add_blog.php">Add New Blog Post</a></li>
                <li><a class="nav-link" href="blog.php">All Blog Posts</a></li>
                <li><a class="nav-link" href="add_blog_category.php">Add Blog Category</a></li>
              </ul>
            </li>

            <li class="menu-header">Exit</li>

            <li class="dropdown">
              <a href="logout.php" class="nav-link"><i data-feather="monitor"></i><span>Logout</span></a>
            </li>


          </ul>
        </aside>
      </div>