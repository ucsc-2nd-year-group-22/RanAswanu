<h1>Create User</h1>
<form action="<?php echo URL; ?>user/create" method="post">
    <label for="login">Login</label><input type="text" name="login"><br>
    <label for="password">Password</label><input type="text" name="password"><br>
    <label for="login">Role</label>
        <select name="role" id="role">
            <option value="default">default</option>
            <option value="admin">admin</option>
            <option value="officer">officer</option>
        </select><br>
    <label for="submit">&nbsp</label><input type="submit" name="submit" id="submitBtn">
</form>
<hr>
<table>
<?php 

    foreach($this->userList as $key  => $value){
        echo '<tr>';
        echo '<td>' . $value['id'] . '</td>';
        echo '<td>' . $value['login'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        echo '<td> <a href="'.URL.'user/edit/'.$value['id'].'">Edit</a> <a href="'.URL.'user/delete/'.$value['id'].'">Delete</a> </td>';
        echo '</tr>';
    }

?>
</table>