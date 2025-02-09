<title><?php echo $title; ?></title>
<ul>
    <?php if (is_array($users) || is_object($users)) { 
        foreach($users as $item) { ?>
            <li><?php echo $item['email'] ?></li>
            <li><?php echo $item['password'] ?></li>
    <?php }
    } else {
        echo "<li>No users found.</li>";
    } ?>    
</ul>