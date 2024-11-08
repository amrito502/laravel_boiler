  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" style="background: #3C8DBC;">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item sbg_color">
        <a class="nav-link sbg_color" href="index.html">
          <i class="bi bi-grid text-white"></i>
          <span class="text-white">Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item sbg_color">
        <a class="nav-link collapsed sbg_color" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-folder-symlink-fill text-white"></i><span class="text-white">Components</span><i class="bi bi-plus-lg ms-auto text-white"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-arrow-right-circle-fill text-white"></i><span class="text-white">Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-arrow-right-circle-fill text-white"></i><span class="text-white">Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-arrow-right-circle-fill text-white"></i><span class="text-white">Badges</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item sbg_color">
        <a class="nav-link collapsed sbg_color" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-folder-symlink-fill text-white"></i><span class="text-white">Settings</span><i class="bi bi-plus-lg ms-auto text-white"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/update-admin-password') }}">
              <i class="bi bi-arrow-right-circle-fill text-white"></i><span class="text-white">Update Admin Password</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/update-admin-details') }}">
              <i class="bi bi-arrow-right-circle-fill text-white"></i><span class="text-white">Update Admin Details</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item sbg_color">
        <a class="nav-link collapsed sbg_color" href="users-profile.html">
          <i class="bi bi-person text-white"></i>
          <span class="text-white">Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->