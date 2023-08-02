<?php
if ($_GET['act'] == 'update' && isset($_GET['id'])) {
    $carId = $_GET['id'];
    $r = $DB->selectOneRow("SELECT * FROM cars WHERE carId = " . $carId . "");
?>

    <h1>Edit car</h1>
    <form method="post" action="../../actions.php?act=car&method=update">
    <input type="hidden" name="carId" value= <?php echo $r['carId'];?> >
        <div style="padding: 10px 0px;">
            <div style="width: 100%;">
                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="form-label">Brand</label>
                            <input type="text" class="form-control" name="brand" placeholder="Brand" value="<?php echo $r['brand']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="form-label">Type</label>
                            <input type="text" class="form-control" name="type" placeholder="Type" value="<?php echo $r['type']; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="form-label">Model</label>
                            <input type="text" class="form-control" name="model" placeholder="Model" value="<?php echo $r['model']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="form-label">Plate</label>
                            <input type="text" class="form-control" name="plate" placeholder="Plate" value="<?php echo $r['plate']; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label class="form-label">Cost per day</label>
                            <input type="text" class="form-control" name="cost" placeholder="Cost/day" value="<?php echo $r['cost']; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label class="form-label">Car Status</label>
                            <div>
                                <?php showStatus($r['status']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-8">
                        <div class="position-relative form-group">
                            <label class="form-label">Image Link</label>
                            <div>
                                <img src="<?php echo $r['images']; ?>" width="200">
                            </div>
                            <input type="text" class="form-control" name="image" placeholder="Image Link" value="<?php echo $r['images']; ?>">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Update car" />
    </form>

<?php
} else {
    echo "URL is not correct.";
}
?>