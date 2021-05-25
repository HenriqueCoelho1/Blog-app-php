<table class="table table-border table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Status</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php find_all_posts();?>
            
        
    </tbody>
</table>

        <?php delete_post();?>
        <?php display_post();?>

