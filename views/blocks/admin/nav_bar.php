<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-sketch'></i>
        <span class="logo_name">Logo</span>
    </div>
    <ul class="nav-links">
        <li class="<?php echo isset($nav) && $nav == "dashboard" ? "active" : "" ?>">
            <a href="/admin">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>

            <ul class="sub-menu">
                <li><a class="link_name" href="admin">Dashboard</a></li>
            </ul>
        </li>

        <li class="<?php echo isset($nav) && $nav == "categories" ? "active" : "" ?>">
            <div class="icon-link">
                <a href="/admin/categories">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Categories</span>
                </a>
                <i class='bx bx-caret-down arrow'></i>
            </div>

            <!-- thanhphanbentrong -->
            <ul class="sub-menu">
                <li><a class="link_name" href="/admin/categories">Categories</a></li>
                <li><a href="/admin/categories">All categories</a></li>
                <li><a href="#">Web design</a></li>
                <li><a href="#">Web design</a></li>
                <li><a href="#">Web design</a></li>
            </ul>
        </li>

        <li class="<?php echo isset($nav) && $nav == "products" ? "active" : "" ?>">
            <div class="icon-link">
                <a href="/admin/products">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Products</span>
                </a>
                <i class='bx bx-caret-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="/admin/products">Products</a></li>
                <li><a href="#">Web design 1</a></li>
                <li><a href="#">Web design 2</a></li>
                <li><a href="#">Web design 3</a></li>
            </ul>
        </li>

        <li class="<?php echo isset($nav) && $nav == "units" ? "active" : "" ?>">
            <a href="/admin/units">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Unit</span>
            </a>

            <ul class="sub-menu">
                <li><a class="link_name" href="#">Unit</a></li>
            </ul>
        </li>

        <li class="<?php echo isset($nav) && $nav == "files" ? "active" : "" ?>">
            <a href="/admin/file-manager">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">File manager</span>
            </a>

            <ul class="sub-menu">
                <li><a class="link_name" href="#">File manager</a></li>
            </ul>
        </li>
        <li class="<?php echo isset($nav) && $nav == "orders" ? "active" : "" ?>">
            <a href="/admin/orders">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Orders</span>
            </a>

            <ul class="sub-menu">
                <li><a class="link_name" href="/admin/orders">Orders</a></li>
            </ul>
        </li>
        <li class="<?php echo isset($nav) && $nav == "news" ? "active" : "" ?>">
            <a href="/admin/news">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">News</span>
            </a>

            <ul class="sub-menu">
                <li><a class="link_name" href="#">News</a></li>
            </ul>
        </li>
        <li class="<?php echo isset($nav) && $nav == "contact" ? "active" : "" ?>">
            <a href="/admin/contact">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Contact</span>
            </a>

            <ul class="sub-menu">
                <li><a class="link_name" href="#">Contact</a></li>
            </ul>
        </li>


    </ul>
</div>