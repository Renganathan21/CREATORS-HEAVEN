<?php
include 'partials/header.php';


if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch category from database
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    }
} else {
    header('location: ' . ROOT_url . 'admin/manage-category');
    die();
}

?>

        <section class="form__section">
            <div class="container form__section-container">
                <h2>Edit CATEGORY</h2>
                <form action="<?= ROOT_url ?>admin/edit-category-logic.php" method="POST">
            <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
            <textarea rows="4" name="description" placeholder="Description"><?= $category['description'] ?></textarea>
            <button type="submit" name="submit" class="btn">Update Category</button>
        </form>
            </div>
        </section>
       


<?php
include '../partials/footer.php';
?>