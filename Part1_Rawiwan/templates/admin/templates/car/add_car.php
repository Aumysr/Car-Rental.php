<h1>Add new car</h1>

<form method="post" action="../../actions.php?act=car&method=add">
    <div style="padding: 10px 0px;">
        <div style="width: 100%;">
            <div class="form-row mb-3">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" placeholder="Brand">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label class="form-label">Type</label>
                        <input  type="text" class="form-control" name="type" placeholder="Type">
                    </div>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label class="form-label">Model</label>
                        <input type="text" class="form-control" name="model" placeholder="Model">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label class="form-label">Plate</label>
                        <input type="text" class="form-control" name="plate" placeholder="Plate">
                    </div>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-md-8">
                    <div class="position-relative form-group">
                        <label class="form-label">Cost per day</label>
                        <input type="text" class="form-control" name="cost" placeholder="Cost/day">
                    </div>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-md-8">
                    <div class="position-relative form-group">
                        <label class="form-label">Image Link</label>
                        <input type="text" class="form-control" name="image" placeholder="Image Link">
                    </div>
                </div>
            </div>                
        </div>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Save car" />
    </form>