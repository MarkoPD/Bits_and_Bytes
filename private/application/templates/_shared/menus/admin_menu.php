<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="?"><strong>BITS&BYTES</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        
        <li class="nav-item">
                <a class="nav-link disabled" href="#">Welcome <?php ee($_SESSION['ADMIN']->name);?></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=Admin.addProduct">Add Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=Admin.selectProduct">Edit Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=Admin.addCategory">Add Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=Global.logOut">Log out</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=Global.selectCategory">View</a>
            </li>
        </ul>
    </div>
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>