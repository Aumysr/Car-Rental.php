<form action="" method="get" class="mb-3 mt-3">
    <div style="display: flex; justify-content: center; gap: 5px 5px; margin: 20px 0; width: 100%; box-sizing: border-box; border-radius: 100px;">
        <div class="col-sm-5">
            <input type="text" class="form-control" name="search" placeholder=" Plates, Model, or Type">
        </div>
        <input type="submit" class="col-sm-1 btn btn-primary" value="Search">
    </div>

</form>

<div class="mb-3" style="margin: 30px auto 50px; display: flex; flex-wrap: wrap; align-items: flex-start; flex-direction: row; gap: 15px 40px;">


    <?php

    if (isset($_GET['search'])) {
        $keyword = $_GET['search'];
        $sql = "SELECT * FROM cars WHERE `status` IN (0,1)
                AND (plate LIKE '%$keyword%'
                OR brand LIKE '%$keyword%' OR model LIKE '%$keyword%' 
                OR `type` LIKE '%$keyword%')";
    } else {
        $sql = "SELECT * FROM cars WHERE `status` IN (0,1)";
    }

    $res = $DB->resultSQL($sql);
    if (!empty($res)) {
        foreach ($res as $key => $r) {
    ?>
            <div class="card" style="width: 450px; height: 350px; padding-left:100px;">
                <img src="<?php echo $r['images'] ?>" class="card-img-top" style="width:100%; height: 150px; object-fit:contain;">
                <div class="card-body">
                    <div class="mb-3" style="display:flex; justify-content:space-between; ">
                        <div>
                            <h5 class="card-title"><?php echo $r['type']; ?></h5>
                            <p class="card-text"><?php echo $r['brand'] . " - " . $r['model']; ?></p>
                        </div>
                        <div>
                            <div>
                                <span style="font-weight: 400; font-size: 1rem">$<?php echo $r['cost']; ?></span>
                            </div>
                            <div style="text-align: right; color: #3b3b3b; font-size: 1rem;">per day</div>
                        </div>
                    </div>
                    <?php
                    if ($r['status'] == 1) { ?>
                        <a href='./?page=rent&act=selected&id=<?php echo $r['carId']; ?>' 
                        class='btn btn-primary'
                        style="display: flex;justify-content: center;align-items: right;background: #E9E7E7;border-radius: 60px; margin-right:5px;">Rent</a>
                    <?php
                    } else {
                        echo "<div style='color: #dd4343;'>Sold</div>";
                    } ?>
                </div>
            </div>
    <?php
        }
    } else {
        echo "No car available at the moment :(";
    }
    ?>
</div>