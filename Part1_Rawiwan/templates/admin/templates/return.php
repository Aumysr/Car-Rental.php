<div style="display: block; margin-bottom: 20px; font-weight: 500; font-size:1.25rem; text-align:'center';">
    Returning Car
</div>

<form action="" method="post" class="mb-3 mt-3">
    <div style="display: flex; justify-content: center; gap: 10px 20px; margin: 20px 0;">
        <div class="col-sm-6">
            <input type="text" class="form-control" name="search" placeholder="Search (customer name, plate, model, transaction id)">
        </div>
        <input type="submit" class="col-sm-1 btn btn-primary" value="Search">
    </div>
</form>

<?php

if (isset($_POST['search'])) {
    $keyword = $_POST['search'];
    $sql = "SELECT r.id, c.carId, c.brand, c.plate, c.model, c.images, u.firstName, u.lastName, u.phone, u.email, 
            r.totalDay, r.price, r.totalPrice, r.isReturn, r.createDate
            FROM rent_transaction r
            JOIN cars c ON c.carId = r.carId
            JOIN users u ON u.userId = r.userId
            WHERE r.isReturn = 0 AND (c.plate LIKE '%$keyword%' OR c.model LIKE '%$keyword%' OR u.firstName LIKE '%$keyword%'
            OR u.lastName LIKE '%$keyword%' OR u.phone LIKE '%$keyword%' OR u.email LIKE '%$keyword%')";
} else {
    $sql = "SELECT r.id, c.carId, c.brand, c.plate, c.model, c.images, u.firstName, u.lastName, u.phone, u.email, 
            r.totalDay, r.price, r.totalPrice, r.isReturn, r.createDate
            FROM rent_transaction r
            JOIN cars c ON c.carId = r.carId
            JOIN users u ON u.userId = r.userId
            WHERE r.isReturn = 0";
}

    $res = $DB->resultSQL($sql);
    if (!empty($res)) { 
        foreach ($res as $key => $r) { ?>
        <div class="car-list-card">
            <div style="width: 210px;">
                <div>
                    <span style="font-weight: 600; font-size: 1.3rem;"><?php echo $r['brand'] . " - " . $r['model']; ?></span>
                </div>

                <div>
                    <span style="font-weight:600;">Number Plate:</span>
                    <span><?php echo $r['plate']; ?></span>
                </div>

                <div>
                    <span style="font-weight:600;">Start Rent:</span>
                    <span><?php echo $r['createDate']; ?></span>
                </div>

                <div>
                    <span style="font-weight:600;">Price/day:</span>
                    <span><?php echo $r['totalDay']; ?> days</span>
                </div>

                <div>
                    <span style="font-weight:600;">Price/day:</span>
                    <span><?php echo $r['price']; ?></span>
                </div>

                <div class="mt-2">
                    <span style="font-weight: 600; font-size: 1.15rem;">Total Price</span>
                    <div style="font-weight: 600; font-size: 1.5rem;">$ <?php echo $r['totalPrice']; ?></div>
                </div>
            </div>
            <div>    
                <div style="font-size: 1.4rem; font-weight: 500; margin-bottom: 10px; text-decoration: underline;">Customer Details:</div>
                <div>
                    <span>Customer Name:</span>
                    <span><?php echo $r['firstName'] . " " . $r['lastName']; ?></span>
                </div>

                <div>
                    <span>Phone:</span>
                    <span><?php echo $r['phone']; ?></span>
                </div>

                <div>
                    <span>Email:</span>
                    <span><?php echo $r['email']; ?></span>
                </div>

                
            </div>
            <div style="display:flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <img width="250px" class="tasker-profile pos-abs" src="<?php echo $r['images']; ?>" alt="">
                </div>
                <div style="position: absolute; bottom: 20px; right: 20px;">
                    <form action="../../actions.php?act=rent&method=update_return" method="post">
                        <input type="hidden" name="transId" value="<?php echo $r['id']; ?>">
                        <input type="hidden" name="carId" value="<?php echo $r['carId']; ?>">
                        <input type="hidden" name="name" value="<?php echo $r['firstName'] . " " . $r['lastName']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary">Return Car</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        }
    }
?>