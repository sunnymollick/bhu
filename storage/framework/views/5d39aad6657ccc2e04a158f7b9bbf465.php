<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if(in_array(auth()->user()->role?->name, ['Super Admin', 'Admin'])): ?>
          
          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.division.*','admin.district.*','admin.upazila.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.division.*','admin.district.*','admin.upazila.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-location-arrow"></i>
              <p>
                Location Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.division.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.division.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Divisions</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo e(route('admin.division.add')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.division.add']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Division</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?php echo e(route('admin.district.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.district.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Districts</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo e(route('admin.district.add')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.district.add']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add District</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?php echo e(route('admin.upazila.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.upazila.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upazillas</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php echo e(route('admin.upazila.add')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.upazila.add']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Upazilla</p>
                </a>
              </li> -->
            </ul>
          </li>
          <?php endif; ?>

          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.temple.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.temple.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-om"></i>
              <p>
                Temple Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.temple.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.temple.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Temples</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.temple.add')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.temple.add']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Temple</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.temple.import_excel')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.temple.import_excel']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Temple</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.temple_event.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.temple_event.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Temple Events
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.temple_event.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.temple_event.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Events</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.temple_event.create')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.temple_event.create']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Temple Event</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.news.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.news.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                News Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.news.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.news.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All News</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.news.add')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.news.add']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create News</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.organization.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.organization.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>
                Manage Organization
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.organization.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.organization.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Organizations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.organization.create')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.organization.create']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Organization</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.organization_event.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.organization_event.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Organization Events
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.organization_event.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.organization_event.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Events</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.organization_event.create')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.organization_event.create']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Organization Event</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.job_post.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.job_post.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Job Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.job_post.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.job_post.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Job Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.job_post.create')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.job_post.create']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Job Post</p>
                </a>
              </li>
            </ul>
          </li>

          <?php if(in_array(auth()->user()->role?->name, ['Super Admin', 'Admin'])): ?>
          <!-- Website Management -->
          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.banner.*', 'admin.services.*', 'admin.about.*', 'admin.page.*', 'admin.post.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.banner.*', 'admin.services.*', 'admin.about.*', 'admin.page.*', 'admin.post.*']) ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                    Website Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.banner.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.banner.*']) ? 'active' : ''); ?>">
                        <i class="far fa-image nav-icon"></i>
                        <p>Banners</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.services.index')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.services.*']) ? 'active' : ''); ?>">
                        <i class="fas fa-hands-helping nav-icon"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.about.index')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.about.*']) ? 'active' : ''); ?>">
                        <i class="fas fa-info-circle nav-icon"></i>
                        <p>About Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.page.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.page.*']) ? 'active' : ''); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.post.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.post.*']) ? 'active' : ''); ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Posts</p>
                    </a>
                </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo e(request()->routeIs(['admin.user.*']) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->routeIs(['admin.user.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.user.all')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.user.all']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.user.add')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.user.add']) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php echo e(request()->routeIs(['admin.contact.*']) ? 'menu-open' : ''); ?>">
            <a href="<?php echo e(route('admin.contact.index')); ?>" class="nav-link <?php echo e(request()->routeIs(['admin.contact.*']) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Contact Messages
                <?php
                  $unreadCount = \App\Models\Contact::where('status', 'unread')->count();
                ?>
                <?php if($unreadCount > 0): ?>
                  <span class="badge badge-danger right"><?php echo e($unreadCount); ?></span>
                <?php endif; ?>
              </p>
            </a>
          </li>
          <?php endif; ?>

          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/e_commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/project_add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/project_edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/project_detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="<?php echo e(route('admin.logout')); ?>" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
            </form>
          </li>
        </ul>
      </nav>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/includes/sidebar.blade.php ENDPATH**/ ?>