    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('home') }}">
                    <i class="bi bi-house"></i>
                    <span>Home</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-diagram-3"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('productCategory.index') }}">
                            <i class="bi bi-circle"></i><span>List categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('productCategory.create') }}">
                            <i class="bi bi-circle"></i><span>Create category</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Category Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-box-seam"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('product.index') }}">
                            <i class="bi bi-circle"></i><span> List products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.create') }}">
                            <i class="bi bi-circle"></i><span>Create products</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Products Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('user.show', Auth::user()->id) }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('auth.register') }}">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('auth.login') }}">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.html">
                    <i class="bi bi-dash-circle"></i>
                    <span>Error 404</span>
                </a>
            </li><!-- End Error 404 Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                    <i class="bi bi-file-earmark"></i>
                    <span>Blank</span>
                </a>
            </li><!-- End Blank Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->
