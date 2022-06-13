<body>
    <?php
        include ("includes/head.php");
        include ("includes/header.php");
    ?>
    <div class="content">
        <?php 
        include_once("class/classconexao.php");
        include_once("class/classcrud.php");
        $crud = new ClassCrud();
        
        ?>
    </div>
</body>
</html>
