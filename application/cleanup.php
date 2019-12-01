<td class="text-center">  
<div class="checkbox_item">
<label><input  type="checkbox" name="check_item[<?php echo $key; ?>]" value="<?php echo $i++; ?>"></label>
<input type="hidden" name="item[<?php echo $key; ?>]" value="<?php echo $item['id']; ?>">
<input type="hidden" name="po_id" value="<?php echo $item['po_id']; ?>">
<input type="hidden" name="sp_id" value="<?php echo $id_sp['id']+1; ?>"></div></td>
<td class=""><?php echo $item['item_name'];?></td>
<td class="form-group text-center">
<label for=""></label>
<span style="text-align:center;"><?php echo $item['qty']; ?></span>
<input class="<?php echo 'qty'.$key; ?>" type="hidden" style="text-align:center;width: 100px;" name="qty[<?php echo $key; ?>]" value="<?php echo $item['qty']; ?>">
<label for=""></label>
<span style="display:none;" id="manualqty<?php echo $key;?>">
<label for=""></label>
<input class="<?php echo 'man'.$key; ?>" type="number" style="text-align:center;width: 100px;" name="man[<?php echo $key; ?>]" id="input_qty<?php echo $key;?>">
</span>
<label for=""></label>
<a title="Tutup Manual Input" id="close_input_qty<?php echo $key;?>" style="display: none; cursor: pointer; color:#E94743;" onclick="clo_manual_qty<?php echo $key;?>(this);">
<i class="material-icons">close</i>
<div class="ripple-container"></div>
</a>
pcs.
<a id="open_input_qty<?php echo $key;?>" title="Input Jumlah Manual" style="cursor: pointer;color:#9C27B0" onclick="manual_qty<?php echo $key;?>(this);">
<i class="material-icons">edit</i>
<div class="ripple-container"></div>
</a>
</td>
<td class="form-group text-right">
Rp.
<input class="<?php echo 'prc'.$key; ?>" value="<?php echo $item['custom_price']; ?>" style="text-align:center; width: 100px;" maxlength="50" size="6" type="hidden" name="prc[<?php echo $key; ?>]">
<span style="text-align:center;"><?php echo $item['custom_price']; ?></span>
</td>
<td class="text-left">
<?php echo ' / '.$item['unit'];?>
</td>
<td class="form-group text-right">
<font color="#9C27B0"><b>
Rp.
</b></font>
</td>
<td class="form-group text-right">
<font color="#9C27B0"><b>
<output style="padding-left:20px" id="<?php echo 'nominal'.$key; ?>">
<?php $nominal = $item['qty']*$item['custom_price'];
echo number_format($nominal,2,',','.');
?></output></b></font></td>
