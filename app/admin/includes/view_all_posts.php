
<table class="table is-hoverable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
            <th><abbr title="Comments">Com</abbr></th>
            <th>Status</th>
            <th>Category</th>
            <th><abbr title="Delete">Del</abbr></th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php find_all_posts();?>
            
        
    </tbody>
</table>

        <?php delete_post();?>
        <?php display_post();?>

