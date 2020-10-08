<h1>User Edit </h1>
<form action="<?php echo URL; ?>user/editSave/<?php echo $this->user['id']; ?>" method="post">
    <label for="login">Login</label><input type="text" name="login" value="<?php echo $this->user['login']; ?>"><br>
    <label for="password">Password</label><input type="text" name="password"><br>
    <label for="login">Role</label>
        <select name="role" id="role">
            <option value="default" <?php if($this->user['role'] == 'default') echo 'selected'; ?>>default</option>
            <option value="admin" <?php if($this->user['role'] == 'admin') echo 'selected'; ?>>admin</option>
            <option value="owner" <?php if($this->user['role'] == 'owner') echo 'selected'; ?>>owner</option>
        </select><br>
    <label for="submit">&nbsp</label><input type="submit" name="submit" id="submitBtn">
</form>