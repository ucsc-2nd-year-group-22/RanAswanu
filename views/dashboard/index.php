Dashboard :: Login only
<hr>

<form id="randomInsert" action="<?= URL;?>dashboard/xhrInsert" method="post">
    <input type="text" name="text">
    <input type="submit" name="submit">
</form>

<hr>

<?php echo $_SESSION['role'] ;?>

<div id="listInserts">
    
</div>