<?php
if (!isset($_SESSION['email'])) {
    echo "You need to login first.";
    return;
}

if ($_GET['act'] == 'selected' && isset($_GET['id'])) {
    $carId = $_GET['id'];
    $r = $DB->selectOneRow("SELECT * FROM cars WHERE carId = " . $carId . "");
}

?>

<div class="mt-3">
    <div>
        <div>
            <h4>Car Detail</h4>
        </div>
        <div class="car-list-card">
            <div style="width: 210px; height: 30px;">
                <div>
                    <span style="font-weight: 600;"><?php echo $r['brand'] . " - " . $r['type'];?></span>
                </div>
                
                <div>
                    <span style="font-weight: 600;"><?php echo $r['model'];?></span>
                </div>

                <div>
                    <span>Plate No.</span>
                    <span><?php echo $r['plate']; ?></span>
                </div>

                <div>
                    <span style="color: #808000; font-weight: 600; font-size: 1.5rem;">
                    $ <?php echo $r['cost']; ?> /day
                </span>
                </div>

            </div>
            <div>
                <img width="200px" class="tasker-profile pos-abs" src="<?php echo $r['images']; ?>" alt="">
            </div>
        </div>

        <form method="post" action="./actions.php?act=rent&method=rent_car">
            <input type="hidden" name="carId" value="<?php echo $carId; ?>">
            <input type="hidden" name="cost" value="<?php echo $r['cost']; ?>">
            <div>
                <h3> Length of the renting</h3>
            </div>

            <div style="padding: 10px 0px;">
                <div style="width: 100%;">
                    <div class="form-row">
                        <div>
                            <div class="position-relative form-group">
                                <label class="form-label">Start Date:</label>
                                <input type="text" class="form-control" name="startDate" placeholder="dd-mm-yyyy">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label class="form-label">Return Date:</label>
                                <input type="text" class="form-control" name="returnDate" placeholder="dd-mm-yyyy">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <div>
                <input type="submit" class="button btnsecondary" name="submit" value="Rent" />
            </div>
            
        </form>
    </div>
</div>