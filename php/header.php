<header> <!-- Inspired by workshop lecture 2 -->
    <div id="headerImageContainer">
        <img src="../img/books.jpg" alt="headerImage"/>
    </div>

    <div id="headerTitle">
        <h1>Book Journey</h1>
    </div>

    <nav>
        <ul>
            <li>
                <a href="home.php" class="<?php echo ($currentPage == "home.php" || $currentPage == "index.php" || $currentPage == "" || $currentPage == "reserve.php" || $currentPage == "return.php") ? "current" : NULL ?>">Home</a>
            </li>
            <li>
                <a href="about.php" class="<?php echo $currentPage == "about.php" ? "current" : NULL ?>">About Us</a>
            </li>
            <li>
                <a href="browse.php" class="<?php echo $currentPage == "browse.php" ? "current" : NULL ?>">Browse Books</a>
            </li>
            <li>
                <a href="myBooks.php" class="<?php echo $currentPage == "myBooks.php" ? "current" : NULL ?>">My Books</a>
            </li>
            <li>
                <a href="contact.php" class="<?php echo $currentPage == "contact.php" ? "current" : NULL ?>">Contact</a>
            </li>
            <li>
                <a href="gallery.php" class="<?php echo $currentPage == "gallery.php" ? "current" : NULL ?>">Gallery</a>
            </li>
            <li id="logIn">
                <a href="logIn.php" class="<?php echo $currentPage == "logIn.php" ? "current" : NULL ?>">Log in</a>
            </li>
        </ul>
    </nav>
</header>
