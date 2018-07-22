<?php $us_al_map_ii = $this->options; ?>
<form method="post" action="<?php echo admin_url( '/' ); ?>admin.php?page=us-al-map-ii">
<div id="map-admin">
  <div id="map-header">
    <p class="map-shortcode">Insert this shortcode <input type="text" value="[us_al_map_ii]" readonly> into any page or post to display the map.</p>
    <p class="map-btns"><span class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></span></p>
  </div>
  <div id="map-page">
    <div class="map-col-lt">
      <div id="map-preview">
        <?php include 'map.php'; ?>
      </div>
      <div class="map-settings">
        <div class="box-header individ-i">Settings</div>
        <div class="box-body">

          <div class="area"><p class="area-name">AUTAUGA</p>
            <span class="chkbx"><input type="checkbox" name="enbl_1" value="1" <?php if ($us_al_map_ii['enbl_1'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_1" value="<?php echo $us_al_map_ii['upclr_1']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_1" value="<?php echo $us_al_map_ii['ovrclr_1']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_1" value="<?php echo $us_al_map_ii['dwnclr_1']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_1" value="<?php echo $us_al_map_ii['url_1']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_1">
                    <option value="_self" <?php if($us_al_map_ii['turl_1'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_1'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_1'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_1"><?php echo $us_al_map_ii['info_1']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">BALDWIN</p>
            <span class="chkbx"><input type="checkbox" name="enbl_2" value="1" <?php if ($us_al_map_ii['enbl_2'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_2" value="<?php echo $us_al_map_ii['upclr_2']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_2" value="<?php echo $us_al_map_ii['ovrclr_2']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_2" value="<?php echo $us_al_map_ii['dwnclr_2']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_2" value="<?php echo $us_al_map_ii['url_2']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_2">
                    <option value="_self" <?php if($us_al_map_ii['turl_2'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_2'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_2'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_2"><?php echo $us_al_map_ii['info_2']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">BARBOUR</p>
            <span class="chkbx"><input type="checkbox" name="enbl_3" value="1" <?php if ($us_al_map_ii['enbl_3'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_3" value="<?php echo $us_al_map_ii['upclr_3']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_3" value="<?php echo $us_al_map_ii['ovrclr_3']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_3" value="<?php echo $us_al_map_ii['dwnclr_3']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_3" value="<?php echo $us_al_map_ii['url_3']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_3">
                    <option value="_self" <?php if($us_al_map_ii['turl_3'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_3'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_3'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_3"><?php echo $us_al_map_ii['info_3']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">BIBB</p>
            <span class="chkbx"><input type="checkbox" name="enbl_4" value="1" <?php if ($us_al_map_ii['enbl_4'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_4" value="<?php echo $us_al_map_ii['upclr_4']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_4" value="<?php echo $us_al_map_ii['ovrclr_4']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_4" value="<?php echo $us_al_map_ii['dwnclr_4']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_4" value="<?php echo $us_al_map_ii['url_4']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_4">
                    <option value="_self" <?php if($us_al_map_ii['turl_4'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_4'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_4'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_4"><?php echo $us_al_map_ii['info_4']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">BLOUNT</p>
            <span class="chkbx"><input type="checkbox" name="enbl_5" value="1" <?php if ($us_al_map_ii['enbl_5'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_5" value="<?php echo $us_al_map_ii['upclr_5']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_5" value="<?php echo $us_al_map_ii['ovrclr_5']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_5" value="<?php echo $us_al_map_ii['dwnclr_5']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_5" value="<?php echo $us_al_map_ii['url_5']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_5">
                    <option value="_self" <?php if($us_al_map_ii['turl_5'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_5'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_5'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_5"><?php echo $us_al_map_ii['info_5']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">BULLOCK</p>
            <span class="chkbx"><input type="checkbox" name="enbl_6" value="1" <?php if ($us_al_map_ii['enbl_6'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_6" value="<?php echo $us_al_map_ii['upclr_6']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_6" value="<?php echo $us_al_map_ii['ovrclr_6']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_6" value="<?php echo $us_al_map_ii['dwnclr_6']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_6" value="<?php echo $us_al_map_ii['url_6']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_6">
                    <option value="_self" <?php if($us_al_map_ii['turl_6'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_6'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_6'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_6"><?php echo $us_al_map_ii['info_6']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">BUTLER</p>
            <span class="chkbx"><input type="checkbox" name="enbl_7" value="1" <?php if ($us_al_map_ii['enbl_7'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_7" value="<?php echo $us_al_map_ii['upclr_7']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_7" value="<?php echo $us_al_map_ii['ovrclr_7']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_7" value="<?php echo $us_al_map_ii['dwnclr_7']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_7" value="<?php echo $us_al_map_ii['url_7']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_7">
                    <option value="_self" <?php if($us_al_map_ii['turl_7'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_7'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_7'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_7"><?php echo $us_al_map_ii['info_7']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CALHOUN</p>
            <span class="chkbx"><input type="checkbox" name="enbl_8" value="1" <?php if ($us_al_map_ii['enbl_8'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_8" value="<?php echo $us_al_map_ii['upclr_8']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_8" value="<?php echo $us_al_map_ii['ovrclr_8']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_8" value="<?php echo $us_al_map_ii['dwnclr_8']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_8" value="<?php echo $us_al_map_ii['url_8']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_8">
                    <option value="_self" <?php if($us_al_map_ii['turl_8'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_8'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_8'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_8"><?php echo $us_al_map_ii['info_8']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CHAMBERS</p>
            <span class="chkbx"><input type="checkbox" name="enbl_9" value="1" <?php if ($us_al_map_ii['enbl_9'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_9" value="<?php echo $us_al_map_ii['upclr_9']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_9" value="<?php echo $us_al_map_ii['ovrclr_9']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_9" value="<?php echo $us_al_map_ii['dwnclr_9']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_9" value="<?php echo $us_al_map_ii['url_9']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_9">
                    <option value="_self" <?php if($us_al_map_ii['turl_9'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_9'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_9'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_9"><?php echo $us_al_map_ii['info_9']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CHEROKEE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_10" value="1" <?php if ($us_al_map_ii['enbl_10'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_10" value="<?php echo $us_al_map_ii['upclr_10']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_10" value="<?php echo $us_al_map_ii['ovrclr_10']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_10" value="<?php echo $us_al_map_ii['dwnclr_10']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_10" value="<?php echo $us_al_map_ii['url_10']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_10">
                    <option value="_self" <?php if($us_al_map_ii['turl_10'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_10'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_10'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_10"><?php echo $us_al_map_ii['info_10']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CHILTON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_11" value="1" <?php if ($us_al_map_ii['enbl_11'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_11" value="<?php echo $us_al_map_ii['upclr_11']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_11" value="<?php echo $us_al_map_ii['ovrclr_11']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_11" value="<?php echo $us_al_map_ii['dwnclr_11']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_11" value="<?php echo $us_al_map_ii['url_11']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_11">
                    <option value="_self" <?php if($us_al_map_ii['turl_11'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_11'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_11'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_11"><?php echo $us_al_map_ii['info_11']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CHOCTAW</p>
            <span class="chkbx"><input type="checkbox" name="enbl_12" value="1" <?php if ($us_al_map_ii['enbl_12'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_12" value="<?php echo $us_al_map_ii['upclr_12']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_12" value="<?php echo $us_al_map_ii['ovrclr_12']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_12" value="<?php echo $us_al_map_ii['dwnclr_12']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_12" value="<?php echo $us_al_map_ii['url_12']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_12">
                    <option value="_self" <?php if($us_al_map_ii['turl_12'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_12'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_12'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_12"><?php echo $us_al_map_ii['info_12']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CLARKE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_13" value="1" <?php if ($us_al_map_ii['enbl_13'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_13" value="<?php echo $us_al_map_ii['upclr_13']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_13" value="<?php echo $us_al_map_ii['ovrclr_13']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_13" value="<?php echo $us_al_map_ii['dwnclr_13']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_13" value="<?php echo $us_al_map_ii['url_13']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_13">
                    <option value="_self" <?php if($us_al_map_ii['turl_13'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_13'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_13'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_13"><?php echo $us_al_map_ii['info_13']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CLAY</p>
            <span class="chkbx"><input type="checkbox" name="enbl_14" value="1" <?php if ($us_al_map_ii['enbl_14'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_14" value="<?php echo $us_al_map_ii['upclr_14']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_14" value="<?php echo $us_al_map_ii['ovrclr_14']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_14" value="<?php echo $us_al_map_ii['dwnclr_14']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_14" value="<?php echo $us_al_map_ii['url_14']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_14">
                    <option value="_self" <?php if($us_al_map_ii['turl_14'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_14'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_14'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_14"><?php echo $us_al_map_ii['info_14']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CLEBURNE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_15" value="1" <?php if ($us_al_map_ii['enbl_15'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_15" value="<?php echo $us_al_map_ii['upclr_15']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_15" value="<?php echo $us_al_map_ii['ovrclr_15']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_15" value="<?php echo $us_al_map_ii['dwnclr_15']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_15" value="<?php echo $us_al_map_ii['url_15']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_15">
                    <option value="_self" <?php if($us_al_map_ii['turl_15'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_15'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_15'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_15"><?php echo $us_al_map_ii['info_15']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">COFFEE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_16" value="1" <?php if ($us_al_map_ii['enbl_16'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_16" value="<?php echo $us_al_map_ii['upclr_16']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_16" value="<?php echo $us_al_map_ii['ovrclr_16']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_16" value="<?php echo $us_al_map_ii['dwnclr_16']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_16" value="<?php echo $us_al_map_ii['url_16']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_16">
                    <option value="_self" <?php if($us_al_map_ii['turl_16'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_16'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_16'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_16"><?php echo $us_al_map_ii['info_16']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">COLBERT</p>
            <span class="chkbx"><input type="checkbox" name="enbl_17" value="1" <?php if ($us_al_map_ii['enbl_17'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_17" value="<?php echo $us_al_map_ii['upclr_17']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_17" value="<?php echo $us_al_map_ii['ovrclr_17']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_17" value="<?php echo $us_al_map_ii['dwnclr_17']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_17" value="<?php echo $us_al_map_ii['url_17']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_17">
                    <option value="_self" <?php if($us_al_map_ii['turl_17'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_17'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_17'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_17"><?php echo $us_al_map_ii['info_17']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CONECUH</p>
            <span class="chkbx"><input type="checkbox" name="enbl_18" value="1" <?php if ($us_al_map_ii['enbl_18'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_18" value="<?php echo $us_al_map_ii['upclr_18']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_18" value="<?php echo $us_al_map_ii['ovrclr_18']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_18" value="<?php echo $us_al_map_ii['dwnclr_18']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_18" value="<?php echo $us_al_map_ii['url_18']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_18">
                    <option value="_self" <?php if($us_al_map_ii['turl_18'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_18'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_18'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_18"><?php echo $us_al_map_ii['info_18']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">COOSA</p>
            <span class="chkbx"><input type="checkbox" name="enbl_19" value="1" <?php if ($us_al_map_ii['enbl_19'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_19" value="<?php echo $us_al_map_ii['upclr_19']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_19" value="<?php echo $us_al_map_ii['ovrclr_19']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_19" value="<?php echo $us_al_map_ii['dwnclr_19']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_19" value="<?php echo $us_al_map_ii['url_19']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_19">
                    <option value="_self" <?php if($us_al_map_ii['turl_19'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_19'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_19'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_19"><?php echo $us_al_map_ii['info_19']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">COVINGTON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_20" value="1" <?php if ($us_al_map_ii['enbl_20'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_20" value="<?php echo $us_al_map_ii['upclr_20']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_20" value="<?php echo $us_al_map_ii['ovrclr_20']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_20" value="<?php echo $us_al_map_ii['dwnclr_20']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_20" value="<?php echo $us_al_map_ii['url_20']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_20">
                    <option value="_self" <?php if($us_al_map_ii['turl_20'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_20'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_20'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_20"><?php echo $us_al_map_ii['info_20']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CRENSHAW</p>
            <span class="chkbx"><input type="checkbox" name="enbl_21" value="1" <?php if ($us_al_map_ii['enbl_21'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_21" value="<?php echo $us_al_map_ii['upclr_21']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_21" value="<?php echo $us_al_map_ii['ovrclr_21']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_21" value="<?php echo $us_al_map_ii['dwnclr_21']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_21" value="<?php echo $us_al_map_ii['url_21']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_21">
                    <option value="_self" <?php if($us_al_map_ii['turl_21'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_21'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_21'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_21"><?php echo $us_al_map_ii['info_21']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">CULLMAN</p>
            <span class="chkbx"><input type="checkbox" name="enbl_22" value="1" <?php if ($us_al_map_ii['enbl_22'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_22" value="<?php echo $us_al_map_ii['upclr_22']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_22" value="<?php echo $us_al_map_ii['ovrclr_22']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_22" value="<?php echo $us_al_map_ii['dwnclr_22']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_22" value="<?php echo $us_al_map_ii['url_22']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_22">
                    <option value="_self" <?php if($us_al_map_ii['turl_22'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_22'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_22'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_22"><?php echo $us_al_map_ii['info_22']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">DALE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_23" value="1" <?php if ($us_al_map_ii['enbl_23'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_23" value="<?php echo $us_al_map_ii['upclr_23']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_23" value="<?php echo $us_al_map_ii['ovrclr_23']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_23" value="<?php echo $us_al_map_ii['dwnclr_23']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_23" value="<?php echo $us_al_map_ii['url_23']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_23">
                    <option value="_self" <?php if($us_al_map_ii['turl_23'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_23'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_23'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_23"><?php echo $us_al_map_ii['info_23']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">DALLAS</p>
            <span class="chkbx"><input type="checkbox" name="enbl_24" value="1" <?php if ($us_al_map_ii['enbl_24'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_24" value="<?php echo $us_al_map_ii['upclr_24']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_24" value="<?php echo $us_al_map_ii['ovrclr_24']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_24" value="<?php echo $us_al_map_ii['dwnclr_24']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_24" value="<?php echo $us_al_map_ii['url_24']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_24">
                    <option value="_self" <?php if($us_al_map_ii['turl_24'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_24'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_24'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_24"><?php echo $us_al_map_ii['info_24']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">DEKALB</p>
            <span class="chkbx"><input type="checkbox" name="enbl_25" value="1" <?php if ($us_al_map_ii['enbl_25'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_25" value="<?php echo $us_al_map_ii['upclr_25']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_25" value="<?php echo $us_al_map_ii['ovrclr_25']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_25" value="<?php echo $us_al_map_ii['dwnclr_25']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_25" value="<?php echo $us_al_map_ii['url_25']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_25">
                    <option value="_self" <?php if($us_al_map_ii['turl_25'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_25'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_25'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_25"><?php echo $us_al_map_ii['info_25']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">ELMORE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_26" value="1" <?php if ($us_al_map_ii['enbl_26'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_26" value="<?php echo $us_al_map_ii['upclr_26']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_26" value="<?php echo $us_al_map_ii['ovrclr_26']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_26" value="<?php echo $us_al_map_ii['dwnclr_26']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_26" value="<?php echo $us_al_map_ii['url_26']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_26">
                    <option value="_self" <?php if($us_al_map_ii['turl_26'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_26'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_26'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_26"><?php echo $us_al_map_ii['info_26']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">ESCAMBIA</p>
            <span class="chkbx"><input type="checkbox" name="enbl_27" value="1" <?php if ($us_al_map_ii['enbl_27'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_27" value="<?php echo $us_al_map_ii['upclr_27']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_27" value="<?php echo $us_al_map_ii['ovrclr_27']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_27" value="<?php echo $us_al_map_ii['dwnclr_27']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_27" value="<?php echo $us_al_map_ii['url_27']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_27">
                    <option value="_self" <?php if($us_al_map_ii['turl_27'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_27'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_27'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_27"><?php echo $us_al_map_ii['info_27']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">ETOWAH</p>
            <span class="chkbx"><input type="checkbox" name="enbl_28" value="1" <?php if ($us_al_map_ii['enbl_28'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_28" value="<?php echo $us_al_map_ii['upclr_28']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_28" value="<?php echo $us_al_map_ii['ovrclr_28']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_28" value="<?php echo $us_al_map_ii['dwnclr_28']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_28" value="<?php echo $us_al_map_ii['url_28']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_28">
                    <option value="_self" <?php if($us_al_map_ii['turl_28'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_28'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_28'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_28"><?php echo $us_al_map_ii['info_28']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">FAYETTE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_29" value="1" <?php if ($us_al_map_ii['enbl_29'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_29" value="<?php echo $us_al_map_ii['upclr_29']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_29" value="<?php echo $us_al_map_ii['ovrclr_29']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_29" value="<?php echo $us_al_map_ii['dwnclr_29']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_29" value="<?php echo $us_al_map_ii['url_29']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_29">
                    <option value="_self" <?php if($us_al_map_ii['turl_29'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_29'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_29'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_29"><?php echo $us_al_map_ii['info_29']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">FRANKLIN</p>
            <span class="chkbx"><input type="checkbox" name="enbl_30" value="1" <?php if ($us_al_map_ii['enbl_30'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_30" value="<?php echo $us_al_map_ii['upclr_30']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_30" value="<?php echo $us_al_map_ii['ovrclr_30']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_30" value="<?php echo $us_al_map_ii['dwnclr_30']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_30" value="<?php echo $us_al_map_ii['url_30']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_30">
                    <option value="_self" <?php if($us_al_map_ii['turl_30'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_30'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_30'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_30"><?php echo $us_al_map_ii['info_30']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">GENEVA</p>
            <span class="chkbx"><input type="checkbox" name="enbl_31" value="1" <?php if ($us_al_map_ii['enbl_31'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_31" value="<?php echo $us_al_map_ii['upclr_31']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_31" value="<?php echo $us_al_map_ii['ovrclr_31']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_31" value="<?php echo $us_al_map_ii['dwnclr_31']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_31" value="<?php echo $us_al_map_ii['url_31']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_31">
                    <option value="_self" <?php if($us_al_map_ii['turl_31'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_31'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_31'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_31"><?php echo $us_al_map_ii['info_31']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">GREENE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_32" value="1" <?php if ($us_al_map_ii['enbl_32'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_32" value="<?php echo $us_al_map_ii['upclr_32']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_32" value="<?php echo $us_al_map_ii['ovrclr_32']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_32" value="<?php echo $us_al_map_ii['dwnclr_32']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_32" value="<?php echo $us_al_map_ii['url_32']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_32">
                    <option value="_self" <?php if($us_al_map_ii['turl_32'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_32'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_32'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_32"><?php echo $us_al_map_ii['info_32']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">HALE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_33" value="1" <?php if ($us_al_map_ii['enbl_33'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_33" value="<?php echo $us_al_map_ii['upclr_33']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_33" value="<?php echo $us_al_map_ii['ovrclr_33']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_33" value="<?php echo $us_al_map_ii['dwnclr_33']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_33" value="<?php echo $us_al_map_ii['url_33']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_33">
                    <option value="_self" <?php if($us_al_map_ii['turl_33'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_33'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_33'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_33"><?php echo $us_al_map_ii['info_33']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">HENRY</p>
            <span class="chkbx"><input type="checkbox" name="enbl_34" value="1" <?php if ($us_al_map_ii['enbl_34'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_34" value="<?php echo $us_al_map_ii['upclr_34']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_34" value="<?php echo $us_al_map_ii['ovrclr_34']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_34" value="<?php echo $us_al_map_ii['dwnclr_34']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_34" value="<?php echo $us_al_map_ii['url_34']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_34">
                    <option value="_self" <?php if($us_al_map_ii['turl_34'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_34'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_34'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_34"><?php echo $us_al_map_ii['info_34']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">HOUSTON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_35" value="1" <?php if ($us_al_map_ii['enbl_35'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_35" value="<?php echo $us_al_map_ii['upclr_35']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_35" value="<?php echo $us_al_map_ii['ovrclr_35']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_35" value="<?php echo $us_al_map_ii['dwnclr_35']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_35" value="<?php echo $us_al_map_ii['url_35']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_35">
                    <option value="_self" <?php if($us_al_map_ii['turl_35'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_35'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_35'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_35"><?php echo $us_al_map_ii['info_35']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">JACKSON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_36" value="1" <?php if ($us_al_map_ii['enbl_36'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_36" value="<?php echo $us_al_map_ii['upclr_36']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_36" value="<?php echo $us_al_map_ii['ovrclr_36']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_36" value="<?php echo $us_al_map_ii['dwnclr_36']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_36" value="<?php echo $us_al_map_ii['url_36']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_36">
                    <option value="_self" <?php if($us_al_map_ii['turl_36'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_36'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_36'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_36"><?php echo $us_al_map_ii['info_36']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">JEFFERSON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_37" value="1" <?php if ($us_al_map_ii['enbl_37'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_37" value="<?php echo $us_al_map_ii['upclr_37']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_37" value="<?php echo $us_al_map_ii['ovrclr_37']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_37" value="<?php echo $us_al_map_ii['dwnclr_37']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_37" value="<?php echo $us_al_map_ii['url_37']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_37">
                    <option value="_self" <?php if($us_al_map_ii['turl_37'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_37'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_37'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_37"><?php echo $us_al_map_ii['info_37']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">LAMAR</p>
            <span class="chkbx"><input type="checkbox" name="enbl_38" value="1" <?php if ($us_al_map_ii['enbl_38'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_38" value="<?php echo $us_al_map_ii['upclr_38']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_38" value="<?php echo $us_al_map_ii['ovrclr_38']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_38" value="<?php echo $us_al_map_ii['dwnclr_38']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_38" value="<?php echo $us_al_map_ii['url_38']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_38">
                    <option value="_self" <?php if($us_al_map_ii['turl_38'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_38'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_38'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_38"><?php echo $us_al_map_ii['info_38']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">LAUDERDALE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_39" value="1" <?php if ($us_al_map_ii['enbl_39'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_39" value="<?php echo $us_al_map_ii['upclr_39']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_39" value="<?php echo $us_al_map_ii['ovrclr_39']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_39" value="<?php echo $us_al_map_ii['dwnclr_39']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_39" value="<?php echo $us_al_map_ii['url_39']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_39">
                    <option value="_self" <?php if($us_al_map_ii['turl_39'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_39'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_39'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_39"><?php echo $us_al_map_ii['info_39']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">LAWRENCE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_40" value="1" <?php if ($us_al_map_ii['enbl_40'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_40" value="<?php echo $us_al_map_ii['upclr_40']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_40" value="<?php echo $us_al_map_ii['ovrclr_40']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_40" value="<?php echo $us_al_map_ii['dwnclr_40']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_40" value="<?php echo $us_al_map_ii['url_40']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_40">
                    <option value="_self" <?php if($us_al_map_ii['turl_40'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_40'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_40'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_40"><?php echo $us_al_map_ii['info_40']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">LEE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_41" value="1" <?php if ($us_al_map_ii['enbl_41'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_41" value="<?php echo $us_al_map_ii['upclr_41']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_41" value="<?php echo $us_al_map_ii['ovrclr_41']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_41" value="<?php echo $us_al_map_ii['dwnclr_41']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_41" value="<?php echo $us_al_map_ii['url_41']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_41">
                    <option value="_self" <?php if($us_al_map_ii['turl_41'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_41'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_41'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_41"><?php echo $us_al_map_ii['info_41']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">LIMESTONE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_42" value="1" <?php if ($us_al_map_ii['enbl_42'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_42" value="<?php echo $us_al_map_ii['upclr_42']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_42" value="<?php echo $us_al_map_ii['ovrclr_42']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_42" value="<?php echo $us_al_map_ii['dwnclr_42']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_42" value="<?php echo $us_al_map_ii['url_42']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_42">
                    <option value="_self" <?php if($us_al_map_ii['turl_42'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_42'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_42'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_42"><?php echo $us_al_map_ii['info_42']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">LOWNDES</p>
            <span class="chkbx"><input type="checkbox" name="enbl_43" value="1" <?php if ($us_al_map_ii['enbl_43'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_43" value="<?php echo $us_al_map_ii['upclr_43']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_43" value="<?php echo $us_al_map_ii['ovrclr_43']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_43" value="<?php echo $us_al_map_ii['dwnclr_43']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_43" value="<?php echo $us_al_map_ii['url_43']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_43">
                    <option value="_self" <?php if($us_al_map_ii['turl_43'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_43'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_43'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_43"><?php echo $us_al_map_ii['info_43']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MACON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_44" value="1" <?php if ($us_al_map_ii['enbl_44'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_44" value="<?php echo $us_al_map_ii['upclr_44']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_44" value="<?php echo $us_al_map_ii['ovrclr_44']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_44" value="<?php echo $us_al_map_ii['dwnclr_44']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_44" value="<?php echo $us_al_map_ii['url_44']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_44">
                    <option value="_self" <?php if($us_al_map_ii['turl_44'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_44'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_44'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_44"><?php echo $us_al_map_ii['info_44']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MADISON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_45" value="1" <?php if ($us_al_map_ii['enbl_45'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_45" value="<?php echo $us_al_map_ii['upclr_45']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_45" value="<?php echo $us_al_map_ii['ovrclr_45']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_45" value="<?php echo $us_al_map_ii['dwnclr_45']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_45" value="<?php echo $us_al_map_ii['url_45']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_45">
                    <option value="_self" <?php if($us_al_map_ii['turl_45'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_45'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_45'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_45"><?php echo $us_al_map_ii['info_45']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MARENGO</p>
            <span class="chkbx"><input type="checkbox" name="enbl_46" value="1" <?php if ($us_al_map_ii['enbl_46'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_46" value="<?php echo $us_al_map_ii['upclr_46']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_46" value="<?php echo $us_al_map_ii['ovrclr_46']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_46" value="<?php echo $us_al_map_ii['dwnclr_46']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_46" value="<?php echo $us_al_map_ii['url_46']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_46">
                    <option value="_self" <?php if($us_al_map_ii['turl_46'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_46'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_46'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_46"><?php echo $us_al_map_ii['info_46']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MARION</p>
            <span class="chkbx"><input type="checkbox" name="enbl_47" value="1" <?php if ($us_al_map_ii['enbl_47'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_47" value="<?php echo $us_al_map_ii['upclr_47']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_47" value="<?php echo $us_al_map_ii['ovrclr_47']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_47" value="<?php echo $us_al_map_ii['dwnclr_47']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_47" value="<?php echo $us_al_map_ii['url_47']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_47">
                    <option value="_self" <?php if($us_al_map_ii['turl_47'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_47'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_47'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_47"><?php echo $us_al_map_ii['info_47']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MARSHALL</p>
            <span class="chkbx"><input type="checkbox" name="enbl_48" value="1" <?php if ($us_al_map_ii['enbl_48'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_48" value="<?php echo $us_al_map_ii['upclr_48']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_48" value="<?php echo $us_al_map_ii['ovrclr_48']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_48" value="<?php echo $us_al_map_ii['dwnclr_48']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_48" value="<?php echo $us_al_map_ii['url_48']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_48">
                    <option value="_self" <?php if($us_al_map_ii['turl_48'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_48'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_48'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_48"><?php echo $us_al_map_ii['info_48']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MOBILE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_49" value="1" <?php if ($us_al_map_ii['enbl_49'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_49" value="<?php echo $us_al_map_ii['upclr_49']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_49" value="<?php echo $us_al_map_ii['ovrclr_49']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_49" value="<?php echo $us_al_map_ii['dwnclr_49']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_49" value="<?php echo $us_al_map_ii['url_49']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_49">
                    <option value="_self" <?php if($us_al_map_ii['turl_49'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_49'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_49'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_49"><?php echo $us_al_map_ii['info_49']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MONROE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_50" value="1" <?php if ($us_al_map_ii['enbl_50'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_50" value="<?php echo $us_al_map_ii['upclr_50']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_50" value="<?php echo $us_al_map_ii['ovrclr_50']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_50" value="<?php echo $us_al_map_ii['dwnclr_50']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_50" value="<?php echo $us_al_map_ii['url_50']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_50">
                    <option value="_self" <?php if($us_al_map_ii['turl_50'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_50'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_50'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_50"><?php echo $us_al_map_ii['info_50']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MONTGOMERY</p>
            <span class="chkbx"><input type="checkbox" name="enbl_51" value="1" <?php if ($us_al_map_ii['enbl_51'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_51" value="<?php echo $us_al_map_ii['upclr_51']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_51" value="<?php echo $us_al_map_ii['ovrclr_51']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_51" value="<?php echo $us_al_map_ii['dwnclr_51']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_51" value="<?php echo $us_al_map_ii['url_51']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_51">
                    <option value="_self" <?php if($us_al_map_ii['turl_51'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_51'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_51'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_51"><?php echo $us_al_map_ii['info_51']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">MORGAN</p>
            <span class="chkbx"><input type="checkbox" name="enbl_52" value="1" <?php if ($us_al_map_ii['enbl_52'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_52" value="<?php echo $us_al_map_ii['upclr_52']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_52" value="<?php echo $us_al_map_ii['ovrclr_52']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_52" value="<?php echo $us_al_map_ii['dwnclr_52']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_52" value="<?php echo $us_al_map_ii['url_52']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_52">
                    <option value="_self" <?php if($us_al_map_ii['turl_52'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_52'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_52'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_52"><?php echo $us_al_map_ii['info_52']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">PERRY</p>
            <span class="chkbx"><input type="checkbox" name="enbl_53" value="1" <?php if ($us_al_map_ii['enbl_53'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_53" value="<?php echo $us_al_map_ii['upclr_53']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_53" value="<?php echo $us_al_map_ii['ovrclr_53']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_53" value="<?php echo $us_al_map_ii['dwnclr_53']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_53" value="<?php echo $us_al_map_ii['url_53']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_53">
                    <option value="_self" <?php if($us_al_map_ii['turl_53'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_53'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_53'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_53"><?php echo $us_al_map_ii['info_53']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">PICKENS</p>
            <span class="chkbx"><input type="checkbox" name="enbl_54" value="1" <?php if ($us_al_map_ii['enbl_54'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_54" value="<?php echo $us_al_map_ii['upclr_54']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_54" value="<?php echo $us_al_map_ii['ovrclr_54']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_54" value="<?php echo $us_al_map_ii['dwnclr_54']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_54" value="<?php echo $us_al_map_ii['url_54']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_54">
                    <option value="_self" <?php if($us_al_map_ii['turl_54'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_54'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_54'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_54"><?php echo $us_al_map_ii['info_54']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">PIKE</p>
            <span class="chkbx"><input type="checkbox" name="enbl_55" value="1" <?php if ($us_al_map_ii['enbl_55'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_55" value="<?php echo $us_al_map_ii['upclr_55']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_55" value="<?php echo $us_al_map_ii['ovrclr_55']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_55" value="<?php echo $us_al_map_ii['dwnclr_55']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_55" value="<?php echo $us_al_map_ii['url_55']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_55">
                    <option value="_self" <?php if($us_al_map_ii['turl_55'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_55'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_55'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_55"><?php echo $us_al_map_ii['info_55']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">RANDOLPH</p>
            <span class="chkbx"><input type="checkbox" name="enbl_56" value="1" <?php if ($us_al_map_ii['enbl_56'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_56" value="<?php echo $us_al_map_ii['upclr_56']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_56" value="<?php echo $us_al_map_ii['ovrclr_56']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_56" value="<?php echo $us_al_map_ii['dwnclr_56']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_56" value="<?php echo $us_al_map_ii['url_56']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_56">
                    <option value="_self" <?php if($us_al_map_ii['turl_56'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_56'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_56'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_56"><?php echo $us_al_map_ii['info_56']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">RUSSELL</p>
            <span class="chkbx"><input type="checkbox" name="enbl_57" value="1" <?php if ($us_al_map_ii['enbl_57'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_57" value="<?php echo $us_al_map_ii['upclr_57']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_57" value="<?php echo $us_al_map_ii['ovrclr_57']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_57" value="<?php echo $us_al_map_ii['dwnclr_57']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_57" value="<?php echo $us_al_map_ii['url_57']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_57">
                    <option value="_self" <?php if($us_al_map_ii['turl_57'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_57'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_57'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_57"><?php echo $us_al_map_ii['info_57']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">SHELBY</p>
            <span class="chkbx"><input type="checkbox" name="enbl_58" value="1" <?php if ($us_al_map_ii['enbl_58'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_58" value="<?php echo $us_al_map_ii['upclr_58']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_58" value="<?php echo $us_al_map_ii['ovrclr_58']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_58" value="<?php echo $us_al_map_ii['dwnclr_58']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_58" value="<?php echo $us_al_map_ii['url_58']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_58">
                    <option value="_self" <?php if($us_al_map_ii['turl_58'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_58'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_58'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_58"><?php echo $us_al_map_ii['info_58']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">ST CLAIR</p>
            <span class="chkbx"><input type="checkbox" name="enbl_59" value="1" <?php if ($us_al_map_ii['enbl_59'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_59" value="<?php echo $us_al_map_ii['upclr_59']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_59" value="<?php echo $us_al_map_ii['ovrclr_59']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_59" value="<?php echo $us_al_map_ii['dwnclr_59']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_59" value="<?php echo $us_al_map_ii['url_59']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_59">
                    <option value="_self" <?php if($us_al_map_ii['turl_59'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_59'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_59'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_59"><?php echo $us_al_map_ii['info_59']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">SUMTER</p>
            <span class="chkbx"><input type="checkbox" name="enbl_60" value="1" <?php if ($us_al_map_ii['enbl_60'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_60" value="<?php echo $us_al_map_ii['upclr_60']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_60" value="<?php echo $us_al_map_ii['ovrclr_60']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_60" value="<?php echo $us_al_map_ii['dwnclr_60']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_60" value="<?php echo $us_al_map_ii['url_60']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_60">
                    <option value="_self" <?php if($us_al_map_ii['turl_60'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_60'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_60'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_60"><?php echo $us_al_map_ii['info_60']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">TALLADEGA</p>
            <span class="chkbx"><input type="checkbox" name="enbl_61" value="1" <?php if ($us_al_map_ii['enbl_61'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_61" value="<?php echo $us_al_map_ii['upclr_61']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_61" value="<?php echo $us_al_map_ii['ovrclr_61']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_61" value="<?php echo $us_al_map_ii['dwnclr_61']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_61" value="<?php echo $us_al_map_ii['url_61']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_61">
                    <option value="_self" <?php if($us_al_map_ii['turl_61'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_61'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_61'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_61"><?php echo $us_al_map_ii['info_61']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">TALLAPOOSA</p>
            <span class="chkbx"><input type="checkbox" name="enbl_62" value="1" <?php if ($us_al_map_ii['enbl_62'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_62" value="<?php echo $us_al_map_ii['upclr_62']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_62" value="<?php echo $us_al_map_ii['ovrclr_62']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_62" value="<?php echo $us_al_map_ii['dwnclr_62']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_62" value="<?php echo $us_al_map_ii['url_62']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_62">
                    <option value="_self" <?php if($us_al_map_ii['turl_62'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_62'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_62'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_62"><?php echo $us_al_map_ii['info_62']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">TUSCALOOSA</p>
            <span class="chkbx"><input type="checkbox" name="enbl_63" value="1" <?php if ($us_al_map_ii['enbl_63'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_63" value="<?php echo $us_al_map_ii['upclr_63']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_63" value="<?php echo $us_al_map_ii['ovrclr_63']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_63" value="<?php echo $us_al_map_ii['dwnclr_63']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_63" value="<?php echo $us_al_map_ii['url_63']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_63">
                    <option value="_self" <?php if($us_al_map_ii['turl_63'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_63'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_63'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_63"><?php echo $us_al_map_ii['info_63']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">WALKER</p>
            <span class="chkbx"><input type="checkbox" name="enbl_64" value="1" <?php if ($us_al_map_ii['enbl_64'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_64" value="<?php echo $us_al_map_ii['upclr_64']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_64" value="<?php echo $us_al_map_ii['ovrclr_64']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_64" value="<?php echo $us_al_map_ii['dwnclr_64']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_64" value="<?php echo $us_al_map_ii['url_64']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_64">
                    <option value="_self" <?php if($us_al_map_ii['turl_64'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_64'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_64'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_64"><?php echo $us_al_map_ii['info_64']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">WASHINGTON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_65" value="1" <?php if ($us_al_map_ii['enbl_65'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_65" value="<?php echo $us_al_map_ii['upclr_65']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_65" value="<?php echo $us_al_map_ii['ovrclr_65']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_65" value="<?php echo $us_al_map_ii['dwnclr_65']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_65" value="<?php echo $us_al_map_ii['url_65']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_65">
                    <option value="_self" <?php if($us_al_map_ii['turl_65'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_65'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_65'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_65"><?php echo $us_al_map_ii['info_65']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">WILCOX</p>
            <span class="chkbx"><input type="checkbox" name="enbl_66" value="1" <?php if ($us_al_map_ii['enbl_66'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_66" value="<?php echo $us_al_map_ii['upclr_66']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_66" value="<?php echo $us_al_map_ii['ovrclr_66']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_66" value="<?php echo $us_al_map_ii['dwnclr_66']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_66" value="<?php echo $us_al_map_ii['url_66']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_66">
                    <option value="_self" <?php if($us_al_map_ii['turl_66'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_66'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_66'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_66"><?php echo $us_al_map_ii['info_66']; ?></textarea></p></div>
            </div>
          </div>

          <div class="area"><p class="area-name">WINSTON</p>
            <span class="chkbx"><input type="checkbox" name="enbl_67" value="1" <?php if ($us_al_map_ii['enbl_67'] == '1'){echo " checked";} ?>>&nbsp;Active</span>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_67" value="<?php echo $us_al_map_ii['upclr_67']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_67" value="<?php echo $us_al_map_ii['ovrclr_67']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_67" value="<?php echo $us_al_map_ii['dwnclr_67']; ?>" class="color-field" /></p>             
              </div>
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_67" value="<?php echo $us_al_map_ii['url_67']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_67">
                    <option value="_self" <?php if($us_al_map_ii['turl_67'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_67'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_67'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div>
              <div class="info"><p><textarea rows="5" name="info_67"><?php echo $us_al_map_ii['info_67']; ?></textarea></p></div>
            </div>
          </div>

        </div><!-- box-body / for areas -->
      </div><!-- map-settings / for areas -->

      <br>
      <div class="map-settings">
        <div class="box-header bulk-i">Bulk Edit</div>
        <div class="box-body">
          <div class="area"><p class="area-name">COLORS</p>
            <div class="inner-content">
              <div class="area-clrs">
                <p><label>Up Color</label><input type="text" name="upclr_all" value="<?php echo $us_al_map_ii['upclr_1']; ?>" class="color-field" /></p>              
                <p><label>Hover Color</label><input type="text" name="ovrclr_all" value="<?php echo $us_al_map_ii['ovrclr_1']; ?>" class="color-field" /></p>              
                <p><label>Click Color</label><input type="text" name="dwnclr_all" value="<?php echo $us_al_map_ii['dwnclr_1']; ?>" class="color-field" /></p>             
              </div><hr>
              <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-clrs" value="Overwrite Colors"></span> <strong>Note: Clicking this button will overwrite the colors of the <u>entire</u> map.</strong></p>
            </div>
          </div>
          <div class="area"><p class="area-name">LINK</p>
            <div class="inner-content">
              <div class="area-url">
                <p class="link"><label>Link</label><input type="text" name="url_all" value="<?php echo $us_al_map_ii['url_1']; ?>" /></p>
                <p><label>Target</label>
                  <select name="turl_all">
                    <option value="_self" <?php if($us_al_map_ii['turl_1'] == '_self'){echo "selected";} ?>>Same Page</option>
                    <option value="_blank" <?php if($us_al_map_ii['turl_1'] == '_blank'){echo "selected";} ?>>New Page</option>
                    <option value="none" <?php if($us_al_map_ii['turl_1'] == 'none'){echo "selected";} ?>>None</option>
                  </select>
                </p>
              </div><hr>              
              <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-url" value="Overwrite Links"></span> <strong>Note: Clicking this button will overwrite the links of <u>all</u> the counties.</strong></p>
            </div>
          </div>
          <div class="area"><p class="area-name">INFO.</p>
            <div class="inner-content">
              <div class="info"><p><textarea rows="5" name="info_all"><?php echo $us_al_map_ii['info_1']; ?></textarea></p></div><hr>
              <p><span class="submitbulk"><input type="submit" class="button button-primary" name="submit-info" value="Overwrite Info."></span> <strong>Note: Clicking this button will overwrite the info. of <u>all</u> the counties.</strong></p>
            </div>
          </div>
        </div><!-- box-body / for bulk -->
      </div><!-- map-settings / for bulk -->

    </div><!-- map-col-lt -->

    <!-- General Map Colors -->
    <div class="map-col-rt">
      <div class="map-settings">
        <div class="box-header shape-icon">General Settings</div>
        <div class="box-body">
          <div class="general-box"><span class="general-set i-border">Border Color</span><input type="text" name="borderclr" value="<?php echo $us_al_map_ii['borderclr']; ?>" class="color-field" /></div>
          <div class="general-box"><span class="general-set i-abbs">Visible Names</span><input type="text" name="visnames" value="<?php echo $us_al_map_ii['visnames']; ?>" class="color-field" /></div>
        </div><!-- box-body -->
      </div><!-- map-settings -->
      <p><strong>Hint:</strong> you can set any color as transparent to hide the object.</p>
    </div><!-- map-col-rt -->

    <input type="hidden" name="us_al_map_ii">
      <?php
      settings_fields(__FILE__);
      do_settings_sections(__FILE__);
      ?>
    <p class="map-btns"><span class="submit"><input type="submit" name="restore_default" id="submit" class="button" value="Restore Default"></span></p>
    <div class="scroll-top"><span class="scroll-top-icon"></span></div>
    <!--scroll-top script-->
    <script>
      jQuery(function(){jQuery(document).on( 'scroll', function(){ if (jQuery(window).scrollTop() > 100) {jQuery('.scroll-top').addClass('show');} else {jQuery('.scroll-top').removeClass('show');}});jQuery('.scroll-top').on('click', scrollToTop);});function scrollToTop() {verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;element = jQuery('body');offset = element.offset();offsetTop = offset.top -32;jQuery('html, body').animate({scrollTop: offsetTop}, 500, 'linear');}
    </script>

  </div><!-- map-page -->
</div><!-- map-admin -->
</form>
