<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item d-flex">
                    <a class="nav-link{{ Request::is('category') ? ' active' : '' }}" href="{{ route('category.index') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('product') ? ' active' : '' }}" href="{{ route('product.index') }}">Product</a>
                </li>
            </ul>
        </div>
    </div>
</nav>