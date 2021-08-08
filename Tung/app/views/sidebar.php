<div class="sidebar" data-color="green">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            MK
        </a>
        <a href="#" class="simple-text logo-normal">
            MK
        </a>
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-outline-white btn-icon btn-round">
                <i class="now-ui-icons text_align-center visible-on-sidebar-regular"></i>
                <i class="now-ui-icons design_bullet-list-67 visible-on-sidebar-mini"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="./app/assets/img/james.jpg" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <span>
                  <?php echo $_SESSION['username'] ?>
                  <b class="caret"></b>
                </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini-icon">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini-icon">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini-icon">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <?php if (isset($_SESSION['username'])): ?>
            <li>
                <a href="?ctr=Student&action=profile">
                    <i class="now-ui-icons design_app"></i>
                    <p>Student Career Portal</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['staff_name'])): ?>
            <li>
                <a href="?ctr=Staff&action=profile">
                    <i class="now-ui-icons business_briefcase-24"></i>
                    <p>Employer Career Portal</p>
                </a>
            </li>
            <?php endif; ?>
            <li class="active">
                <a data-toggle="collapse" href="#formsExamples" aria-expanded="true">
                    <i class="now-ui-icons files_single-copy-04"></i>
                    <p>
                        Expandable menu <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse  show " id="formsExamples">
                    <ul class="nav">
                        <li class="active">
                            <a href="./wizard.html">
                                <span class="sidebar-mini-icon">W</span>
                                <span class="sidebar-normal"> Wizard </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>