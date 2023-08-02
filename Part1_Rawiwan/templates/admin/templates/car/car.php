<div style="display: block; margin-bottom: 20px; font-weight: 500; font-size:1.25rem; text-align:'center';">
    Cars
</div>

<div>
    <form action="" method="post" class="mb-3 mt-3">
        <div class="form-group row">
            <div class="col-sm-5">
                <input type="text" class="form-control" name="search" placeholder="Search car (brand, plate, model or type)">
            </div>
            <input type="submit" class="col-sm-1 btn btn-primary" value="Search">
        </div>
        
    </form>
</div>


<div class="mb-3">
    <a href="?page=add_car" class="btn btn-primary">Add new car</a>
</div>

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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if (isset($_POST['search'])) {
                $keyword = $_POST['search'];
                $sql = "SELECT * FROM cars WHERE plate LIKE '%$keyword%'
                        OR brand LIKE '%$keyword%' OR model LIKE '%$keyword%' 
                        OR `type` LIKE '%$keyword%'";
            } else {
                $sql = "SELECT * FROM cars";
            }
        
            $res = $DB->resultSQL($sql);
            if (!empty($res)){
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
                                    echo "<span> Not available </span>";
                                } else {
                                    echo "<span> Rented </span>";
                                }
                            ?>
                        </td>
                        <td><?php echo "$".$r['cost']; ?></td>
                        <td>
                            <img src="<?php echo $r['images']; ?>" width="200">
                        </td>
                        <td>
                            <a class="btn btn-success" href="./?page=edit_car&act=update&id=<?php echo $r['carId']; ?>">
                                edit
                            </a>
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