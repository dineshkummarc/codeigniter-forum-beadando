<h2><?=$title; ?></h2>
<hr>
<div class="row adminpg-navbar mb-3 mt-3">
    <div class="col-3">
        <a class="btn btn-primary" href="#adminpage-users">Users</a>
    </div>
    <div class="col-3">
        <a class="btn btn-primary mr-2" href="#adminpage-categories">Categories</a>
    </div>
    <div class="col-3">
        <a class="btn btn-primary mr-2" href="#adminpage-subcategories">Subcategories</a>
    </div>
    <div class="col-3">
    <a class="btn btn-primary mr-2" href="#adminpage-posts">Posts</a>
    </div>
</div>
<div class="row">
    <div class="col-12" id="adminpage-users">
        <h3>
            Users 
            <?php 
                if($this->session->userdata('user_id') == ADMIN_ID) {
                    echo form_open('admin/export/users');
                    echo '<input type="submit" name="export" value="Export to CSV">';
                    echo form_close();
                }
            ?>
        </h3>

        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Register Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user) : ?>
            <tr>
                <th scope="row"><?= $user['id']; ?></th>
                <td><?= $user['username']; ?></td>
                <td><?= $user['first_name']; ?></td>
                <td><?= $user['last_name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['register_date']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>

    </div>
    <div class="col-12" id="adminpage-categories">
        <h3>
            Categories
            <?php 
                if($this->session->userdata('user_id') == ADMIN_ID) {
                    echo form_open('admin/export/categories');
                    echo '<input type="submit" name="export" value="Export to CSV">';
                    echo form_close();
                }
            ?>
        </h3>

        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image name</th>
            <th scope="col">Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category) : ?>
            <tr>
                <th scope="row"><?= $category['id']; ?></th>
                <td><?= $category['user_id']; ?></td>
                <td><?= $category['name']; ?></td>
                <td><?= $category['description']; ?></td>
                <td><?= $category['photo']; ?></td>
                <td><?= $category['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <div class="col-12" id="adminpage-subcategories">
        <h3>
            Subcategories (Topics)
            <?php 
                if($this->session->userdata('user_id') == ADMIN_ID) {
                    echo form_open('admin/export/subcategories');
                    echo '<input type="submit" name="export" value="Export to CSV">';
                    echo form_close();
                }
            ?>
        </h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Maincategory Id</th>
                <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($subcategories as $subcategory) : ?>
                <tr>
                    <th scope="row"><?= $subcategory['id']; ?></th>
                    <td><?= $subcategory['user_id']; ?></td>
                    <td><?= $subcategory['name']; ?></td>
                    <td><?= $subcategory['maincategory_id']; ?></td>
                    <td><?= $subcategory['created_at']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-12" id="adminpage-posts">
        <h3>
            Posts
            <?php 
                if($this->session->userdata('user_id') == ADMIN_ID) {
                    echo form_open('admin/export_posts');
                    echo '<input type="submit" name="export" value="Export to CSV">';
                    echo form_close();
                }

            ?>
        </h3>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">User ID</th>
            <th scope="col">Subcategory Id</th>
            <th scope="col">Parent Post Id</th>
            <th scope="col">Body</th>
            <th scope="col">Likes</th>
            <th scope="col">Dislikes</th>
            <th scope="col">Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post) : ?>
            <tr>
                <th scope="row"><?= $post['id']; ?></th>
                <td><?= $post['user_id']; ?></td>
                <td><?= $post['subcategory_id']; ?></td>
                <td><?= $post['parent_post_id']; ?></td>
                <td><?= $post['body']; ?></td>
                <td><?= 'Likes'; ?></td>
                <td><?= 'Dislikes'; ?></td>
                <td><?= $post['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>