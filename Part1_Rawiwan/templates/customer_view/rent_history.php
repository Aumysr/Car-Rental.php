<br>
<form action="" method="post" class="mb-3 mt-3" style="display: flex; center;background: #E9E7E7;border-radius: 100px;height: 30px; margin-right:5px; gap:10px;">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="carStatus" value="all">
        <label class="form-check-label" for="all">Show All</label>
    </div>
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="carStatus" value="rented">
        <label class="form-check-label" for="rented">Rented</label>
    </div>
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="carStatus" value="current">
        <label class="form-check-label" for="available">Currently Renting</label>
    </div>
    <br>
    <input type="submit" class="button btnsecondary" value="Submit">
</form>

<?php
if (isset($_POST['carStatus'])) {
    $keyword = $_POST['carStatus'];
    $isReturn = "";
    if ($keyword == 'rented') {
        $isReturn = 1;
    }
    if ($keyword == 'current') {
        $isReturn = 0;
    }

    $sql = "SELECT c.*, r.* FROM rent_transaction r JOIN cars c ON c.`carId` = r.`carId` WHERE r.`userId` = " . $_SESSION['uid'] . " AND `isReturn` LIKE '%$isReturn%' ORDER BY r.createDate DESC";
} else {
    $sql = "SELECT c.*, r.* FROM rent_transaction r JOIN cars c ON c.`carId` = r.`carId` WHERE r.`userId` = " . $_SESSION['uid'] . " ORDER BY r.createDate DESC";
}

$res = $DB->resultSQL($sql);
if (!empty($res)) {
    foreach ($res as $key => $r) { ?>
        <div class="car-list-card">
            <div style="width: 210px;">
                <div class="mb-2">
                    <?php
                    if ($r['isReturn'] == 1) {
                        echo "<span style='font-size: 1rem; color: #c40000; font-weight: 500;'>Returned</span>";
                    } else {
                        echo "<span style='font-size: 1rem; color: #007fb2; font-weight: 500;'>Currently Renting</span>";
                    }
                    ?>
                </div>

                <div>
                    <span style="font-weight: 600;"><?php echo $r['brand'] . " - " . $r['model']; ?></span>
                </div>

                <div>
                    <span><?php echo $r['totalDay']; ?> days</span>
                </div>

                <div>
                    <span>Rent Date:</span>
                    <span><?php echo $r['createDate']; ?></span>
                </div>

                <div>
                    <span>Return Date:</span>
                    <span><?php echo $r['returnDate']; ?></span>
                </div>

                <div class="mt-2">
                    <span style="font-weight: 400; font-size: 1rem;">Total Price</span>
                    <div style="font-weight: 400; font-size: 1rem;">$ <?php echo $r['totalPrice']; ?></div>
                </div>
                <form action="../../actions.php?act=rent&method=update_return" method="post">
                        <button type="submit" name="submit" class="button btnsecondary">Return Car</button>
                    </form>
            </div>
            <div>
                <img width="400px" class="tasker-profile pos-abs" src="<?php echo $r['images']; ?>" alt="">
            </div>
        </div>

    <?php
    }
} else { ?>

    <div class="mt-3" style="text-align: center; color: #808000">There is no data in this section</div>
<?php } ?>