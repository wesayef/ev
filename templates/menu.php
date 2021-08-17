<aside class="left-sidebar">
  <div class="scroll-sidebar">
    <div class="user-profile" style="background: url(../templates/assets/images/ev.png) no-repeat;">
      <div class="profile-img">
        <img src="../templates/assets/images/man-icon.png">
      </div>
      <div class="profile-text">
        <a href="#" role="button" aria-haspopup="true" aria-expanded="true">
          <i class="fa fa-pen"></i>
          <span class="hide-menu"><?php echo $login_user['name'];?></span>
        </a>
        <div class="dropdown-menu animated flipInY">
        </div>
      </div>
    </div>
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li>
          <a class="waves-effect waves-dark" href="dashboard" aria-expanded="false">
            <i class="fa fa-home"></i>
            <span class="hide-menu">الرئيسية</span>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-dark" href="admins_in_system" aria-expanded="false">
            <i class="fa fa-users"></i>
            <span class="hide-menu">مشرفين النظام</span>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-dark" href="universities_in_system" aria-expanded="false">
            <i class="fas fa-warehouse"></i>
            <span class="hide-menu">الجامعات والتخصصات</span>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-dark" href="admissions_in_system" aria-expanded="false">
            <i class="fas fa-university"></i>
            <span class="hide-menu">القبول والتسجيل في الجامعات</span>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-dark" href="users_in_system" aria-expanded="false">
            <i class="fas fa-address-book"></i>
            <span class="hide-menu">المستخدمين</span>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-dark" href="#" aria-expanded="false">
            <i class="fa fa-star"></i>
            <span class="hide-menu">التقييمات</span>
          </a>
        </li>
        <li>
          <a class="waves-effect waves-dark" href="volunteers_in_system" aria-expanded="false">
            <i class="fas fa-address-card"></i>
            <span class="hide-menu">المتطوعين</span>
          </a>
          <li>
            <a class="waves-effect waves-dark" href="certificates_in_system" aria-expanded="false">
              <i class="fas fa-hourglass"></i>
              <span class="hide-menu">الشهادات المهنية</span>
            </a>
          </li>
          <li>
            <a class="waves-effect waves-dark" href="apps_in_system" aria-expanded="false">
              <i class="fas fa-keyboard"></i>
              <span class="hide-menu">تطبيقات دراسية</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="sidebar-footer">
      </div>
    </div>
  </aside>
