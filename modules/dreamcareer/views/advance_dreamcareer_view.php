<div class="col-xl-3 col-lg-8">
  <div class="sidebar-style">
    <div class="sidebar-dreamcareer mb-40">
      <div class="sidebar-title mb-40">
        <h4>dreamcareer</h4>
      </div>
      <input type="text" placeholder="dreamcareer" id="keyword" onKeyUp="dreamcareerFilter()">
    </div>
    <div class="sidebar-dreamcareer mb-40">
      <div class="sidebar-title mb-40">
        <h4>Batch State</h4>
        <select id="state" name="state" onChange="dreamcareerFilter()" >
          <option value="">Select State</option>
          <?php 
              $sql="SELECT * FROM `tbl_states`  where country_id='101'  ORDER BY name";
              $query=$this->db->query($sql);
              foreach($query->result_array() as $val):
             ?>
          <option value="<?php echo $val['id']?>" <?php echo set_select('state_id',
                                    $val['id'], ( !empty($state) && $state == $val['id'] ? TRUE : FALSE )); ?>><?php echo $val['name']?></option>
          <?php endforeach;?>
        </select>
      </div>
    </div>
    <div class="sidebar-dreamcareer mb-40">
      <div class="sidebar-title mb-40">
        <h4>Batch City</h4>
        <select id="city" name="city" onChange="dreamcareerFilter()">
          <option value="">Select state first</option>
        </select>
      </div>
    </div>
    <div class="sidebar-dreamcareer mb-40">
      <div class="sidebar-title mb-40">
        <h4>dreamcareer Pincode</h4>
      </div>
      <input type="text" placeholder="dreamcareer Pincode" id="pincode">
    </div>
    <div class="sidebar-dreamcareer mb-40">
      <div class="sidebar-title mb-40">
        <h4>Price Range</h4>
        <input type="hidden" class="price1" value="0" >
        <input type="hidden" class="price2" value="30000"  >
        <p id="priceshow"></p>
        <div id="slider-range"></div>
      </div>
    </div>
    <div class="sidebar-dreamcareer mb-40">
      <div class="sidebar-title mb-40">
        <h4>Batch Time</h4>
        <select name="bath_time" id="bath_time"  onchange="dreamcareerFilter()">
          <option value="">Select Batch Time</option>
          <option value="Any Time">Any Time</option>
          <option value="morning">morning</option>
          <option value="afternoon">afternoon</option>
          <option value="evening">evening</option>
          <option value="night">night</option>
        </select>
      </div>
    </div>
  </div>
</div>
