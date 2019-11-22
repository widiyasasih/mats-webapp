<table border="1" width="50%" style="text-align: center;">
<thead>
    <th>Nama Barang</th>
<?php
$i = 0; $i++;
$countModel = count($models);
echo 'Jumlah Model : '.$countModel;
foreach ($models as $model => $value) :?>
    <th><?php echo $value['model'].$value['id'];?> </th>

<?php endforeach; ?>
    <th><?php echo $model[0];?> </th>
    
    <!-- <th>Model1</th>
    <th>Model2</th>
    <th>Model3</th>
    <th>Model4</th> -->
</thead>
<tbody>
        <?php foreach ($items as $item => $data) :?>
        
    <tr>
        <td><?php echo $data['item_name'];?> </td>
        <?php foreach ($tests as $test => $t) :?>
        <?php 
        if ($t['model_id'] === $value['id']) {
            echo '<td>'.$t['model_id'].'</td>';
        } else {
            echo '<td>-</td>';
        }
        ?>
        
        <?php endforeach;?> 
    </tr>
        <?php endforeach; ?>
</tbody>
</table>