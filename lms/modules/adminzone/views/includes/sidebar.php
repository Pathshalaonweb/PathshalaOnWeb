<?php

$adminzone_menu_array = lang('top_menu_list'); 

$adminzone_menu_icon_array = lang('top_menu_icon'); 

?>

<!-- sidebar menu -->

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <hr>
    <ul class="nav side-menu">
      <?php createMenu($adminzone_menu_array,$adminzone_menu_icon_array);?>
    </ul>
  </div>
</div>

<!-- /sidebar menu -->