<?php
if (isset($_POST['add_item'])) {
    add_item();
}
?>
<form class="form-label-left" action="" id="add-labour-admin" method="post"
      enctype="multipart/form-data">
    <div class="item form-group">
      <div class="col-md-6 col-sm-12 col-xs-12">
          <input id="tName" class="form-control col-md-7 col-xs-12"
                 name="name" placeholder="Item Name " type="text" pattern="[^A-Za-z0-9]" required>
      </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <select class="form-control" name="status">
                <option value="0">Select Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="item form-group mt-10">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <select class="form-control" name="sub_category" required>
                <option value="">Choose Category</option>
                <?php add_item_category();?>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <input type="file" id="image" name="image" class="form-control col-md-7
            col-xs-12">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="item form-group mt-10">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <textarea name="description_sh" id="description_sh" cols="30" rows="6" class="form-control col-md-7 col-xs-12" placeholder="Description"></textarea>
        </div>
    </div>
    <div class="item form-group mt-10">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <textarea name="description_lg" id="description_lg" cols="30" rows="6" class="form-control col-md-7 col-xs-12" placeholder="Description"></textarea>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6">
            <button id="post-submit" name="add_item" type="submit" class="btn
            btn-success">Submit</button>
            <button class="btn btn-primary" type="reset">Reset</button>
        </div>
    </div>
  <!--   <div>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a tabindex="-1" href="#">HTML</a></li>
              <li><a tabindex="-1" href="#">CSS</a></li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                  <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                  <li class="dropdown-submenu">
                    <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">3rd level dropdown</a></li>
                      <li><a href="#">3rd level dropdown</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
    </div> -->
</form>

