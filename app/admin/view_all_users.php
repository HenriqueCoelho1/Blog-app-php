<table class="table is-hoverable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Is Admin</th>
            <th>Image</th>
            <th>Date</th>
            <th>Edit</th>
            <th><abbr title="Delete">Del</abbr></th>
        </tr>
    </thead>
    <tbody>
        <?php find_all_users();?>
            
        
    </tbody>
</table>

        <?php display_user();?>
        <?php delete_user();?>
        

