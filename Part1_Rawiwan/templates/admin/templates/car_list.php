<div style="display: block; margin-bottom: 20px; font-weight: 500; font-size:1.25rem; text-align:'center';">
    Rented & Available Cars
</div>

<form action="" method="post" class="mb-3 mt-3">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="carStatus" value="all" checked>
        <label class="form-check-label" for="all">All</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="carStatus" value="rented">
        <label class="form-check-label" for="rented">Rented Cars</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="carStatus" value="available">
        <label class="form-check-label" for="available">Available Cars</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="carStatus" value="repair">
        <label class="form-check-label" for="available">Unavailable Cars</label>
    </div>
    <input type="submit" class="col-sm-1 btn btn-primary" value="Search">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Plate</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Type</th>
            <th>Status</th>
            <th>Cost</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_POST['carStatus'])) {
            $keyword = $_POST['carStatus'];
            $value = "";
            if ($keyword == 'rented') {
                $value = 0;
            }
            if ($keyword == 'available') {
                $value = 1;
            }
            if ($keyword == 'repair') {
                $value = 2;
            }

            $sql = "SELECT * FROM cars WHERE `status` LIKE '%$value%'";
        } else {
            $sql = "SELECT * FROM cars";
        }

        $res = $DB->resultSQL($sql);
        if (!empty($res)) {
            foreach ($res as $key => $r) { 
                if ($r['status'] == 0) {
                    echo "<tr style='color: #069681'>";
                } else if($r['status'] == 2) {
                    echo "<tr style='color: #f30000; text-decoration: underline;'>";
                } else {
                    echo "<tr>";
                }?>
                    <td><?php echo $r['plate']; ?></td>
                    <td><?php echo $r['brand']; ?></td>
                    <td><?php echo $r['model']; ?></td>
                    <td><?php echo $r['type']; ?></td>
                    <td>
                        <?php 
                            if ($r['status'] == 1) {
                                echo "<span> Available </span>";
                            } else if ($r['status'] == 2) {
                                echo "<span> Under repair </span>";
                            } else {
                                echo "<span> Rented </span>";
                            }
                        ?>
                    </td>
                    <td><?php echo "$" . $r['cost']; ?></td>
                    <td>
                        <img src="<?php echo $r['images']; ?>" width="200">
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "There is no car found";
        }
        ?>
    </tbody>
</table>