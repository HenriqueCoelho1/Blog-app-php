<table class="table table-border table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Content</th>
            <th>Status</th>
            <th>Date</th>
            <th>In Response To</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php find_all_comments();?>
            
        
    </tbody>
</table>

        <?php delete_comment();?>
        <?php approve_comment();?>
        <?php unapprove_comment();?>

