<?php
include('config.php');

$product_select=$_GET['product_select'];
$catgory_select=$_GET['catgory_select'];
$sql="SELECT * FROM product WHERE p_cat_id=$product_select AND cat_id=$catgory_select";
$conn=$db->prepare($sql);
$conn->execute();
$result=$conn->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row){
	$query="SELECT multipalimage.*,product.* FROM multipalimage INNER JOIN product ON product.id=multipalimage.product_id WHERE product_id=$row[id]";
	$conn=$db->prepare($query);
	$conn->execute();
	$images=$conn->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="w3ls_dresses_grid_right_grid3 match_ajax_data_out">
	<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
		<div class="agile_ecommerce_tab_left dresses_grid">
			<div class="hs-wrapper hs-wrapper2">
				<?php
				foreach ($images as $image) {
				?>
				<img src="image/product/<?php echo $image['image'];?>" alt=" " class="img-responsive" style="height:100%"/>
				<?php 
				}
				?>
				<div class="w3_hs_bottom w3_hs_bottom_sub1">
					
					<ul>
						<li>
							<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
						</li>
					</ul>
					
				</div>
			</div>
			<h5><a href="single_product.php?id=<?php echo $row['id'];?>"><?php echo $row['product_title'];?></a></h5>
			<div class="simpleCart_shelfItem">
				<p><span><?php echo $row['previa_price'];?>.TK</span> <i class="item_price"><?php echo $row['product_price'];?>.TK</i></p>
				<p><a class="item_add" href="single_product.php?id=<?php echo $row['id'];?>">Add to cart</a></p>
			</div>
			<?php
				$date=date("Y-m-d");
				if(date("Y-m-d",strtotime($row['product_date']))==$date){ ?>
				<div class="dresses_grid_pos">
					<h6>New</h6>
				</div>
			<?php }?>
		</div>
	</div>						
</div>
					
<?php
}
?>