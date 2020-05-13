<?php
require_once('class/BrainTest.php');
require_once('helpers.php');

$brainTest = new BrainTest;
$categoryList = $brainTest->solve2();
?>

<?php include('include/header.php');?>

<div class="col-md-5">
    <?php if(!empty($categoryList)): ?>
        <?php echo printArrayList($categoryList); ?>
        <?php else:?>
        <p class="alert alert-warning">No items found</p>
    <?php endif;?>

    <a class="btn btn-primary btn-lg" href="index.php" role="button">Back to home page</a>
</div>

<?php include('include/footer.php');?>