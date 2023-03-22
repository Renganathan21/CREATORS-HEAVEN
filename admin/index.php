<?php
include 'partials/header.php';
$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id FROM posts WHERE author_id=$current_user_id ORDER BY id DESC";
$posts = mysqli_query($connection, $query);

?>


            <section class="dashboard">
            <?php if (isset($_SESSION['add-post-success'])) : // shows if add post was successful
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-post-success'])) : // shows if edit post was successful
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-post'])) : // shows if edit post was NOT successful
    ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-post-success'])) : // shows if delete post was successful
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
                ?>
            </p>
        </div>
    <?php endif ?>
                <div class="container dashboard__container">
                    <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
                    <button id="hide-sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
                    <aside>
                        <ul>
                            <li>
                                <a href="add-post.php"><i class="uil uil-pen"></i>
                                    <h5>Add Post</h5>
                                    </a>
                            </li>

                            <li>
                                <a href="index.php"class="active"><i class="uil uil-postcard"></i></i>
                                    <h5>Manage Post</h5>
                                    </a>
                            </li>
                            <?php if(isset($_SESSION['user_is_admin'])): ?>
                            <li>
                                <a href="add-user.php"><i class="uil uil-user-plus"></i>
                                    <h5>Add user</h5>
                                    </a>
                            </li>

                            <li>
                                <a href="manage-user.php" ><i class="uil uil-users-alt"></i>
                                    <h5>Manage user</h5>
                                    </a>
                            </li>

                            <li>
                                <a href="add-category.php"><i class="uil uil-edit"></i>
                                    <h5>Add Category</h5>
                                    </a>
                            </li>
                            <li>
                                <a href="manage-category.php" ><i class="uil uil-list-ul"></i></i>
                                    <h5>Manage Categories</h5>
                                    </a>
                            </li>
                            <?php endif ?>
                        </ul>
                    </aside>
                    <main>
                        <h2>Manage posts</h2>
                        <?php if (mysqli_num_rows($posts) > 0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                            <!-- get category title of each post from categories table -->
                            <?php
                            $category_id = $post['category_id'];
                            $category_query = "SELECT title FROM categories WHERE id=$category_id";
                            $category_result = mysqli_query($connection, $category_query);
                            $category = mysqli_fetch_assoc($category_result);
                            ?>
                            <tr>
                                <td><?= $post['title'] ?></td>
                                <td><?= $category['title'] ?></td>
                                <td><a href="<?= ROOT_url ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= ROOT_url ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">Delete</a></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert__message error"><?= "No posts found" ?></div>
            <?php endif ?>
                    </main>
                </div>
            </section>





<?php
include '../partials/footer.php';
?>