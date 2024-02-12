<?php include './tmp/header.php'?>
<?php session_start(); ?>

<style>
    input {
        border: none;
        padding: 20px;
        border-radius: 10px;
        -webkit-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        -moz-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        margin-bottom: 10px;
        margin-left: 10px;
    }

    input:focus {
        outline: none;
    }
    .addBtn{
        display: block;
        padding: 20px 30px;
        font-size: 20px;
        border-radius: 15px;
        border: 3px solid rgb(236, 230, 233);
        background-color: #b8dadf;
        cursor: pointer;
        color: rgb(180, 61, 112);
        width: 39%;
        margin-left: 10px;
        font-weight: 800;
    }
</style>

<div>
    <?php
    if(isset($_SESSION["status"])){
        echo $_SESSION["status"];
    }else
    echo "no status";
    ?>
    <form action="code.php" method="POST">
        <input type="text" name="proName" placeholder="Product Name">
        <input type="number" name="price" placeholder="Price">
        <input type="text" name="desr" placeholder="Description">
        <input type="text" name="pro_code" placeholder="Product Code">
        <button class="addBtn" type="submit" name="add">Add</button>
    </form>
</div>















<?php include './tmp/footer.php'?>