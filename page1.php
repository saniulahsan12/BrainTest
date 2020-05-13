<?php
require_once('class/BrainTest.php');

$brainTest = new BrainTest;
$categoryList = $brainTest->solve1();

?>

<?php include('include/header.php');?>

<div class="col-md-5">
    <?php if(!empty($categoryList)): ?>
    <table class="table table-stripped">
        <tr>
            <th>Category Name</th>
            <th class="text-center">Total Items</th>
        </tr>

        <?php foreach($categoryList as $cat): ?>
        <tr>
            <td><?php echo $cat['CategoryName']; ?></td>
            <td class="text-center"><?php echo $cat['TotalItems']; ?></td>
        </tr>
        <?php endforeach;?>

        
    </table>
        <?php else:?>
        <p class="alert alert-warning">No items found</p>
    <?php endif;?>

    <a class="btn btn-primary btn-lg" href="index.php" role="button">Back to home page</a>
</div>

<?php include('include/footer.php');?>