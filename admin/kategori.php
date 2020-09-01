

  		<div class="container-fluid">
  			<?php 
  			include "include/koneksi.php";

  			switch(@$_GET['mod']) {
  				default: ?>
      
		     <div id_wisata="tombol" style="margin-bottom:15px;">     
                <p><a href='?mod=add'><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-plus-sign'></span> Add</button></a></p>
            </div>
            
			    <div class="row">	
			      	<div class="col-md-12">

			      	  <?php include "include/alert.php"; ?>

			          <table id="example1" class="table table-striped">
			            <thead>
			              <tr>
			                <th style="width:3%">No.</th>
											<th>Id_kategori</th>
											<th>Nama_kategori</th>
											<th class="text-center" style="width:10%">Action</th>
			              </tr>
			            </thead>
			            <tbody>
			            	<?php 
			            		$no = 1;
			            		$sql = $db->query("SELECT * FROM tbl_kategori");
			            		foreach ($sql as $data) :
										?>	
			              <tr>
			                <td><?=$no++?></td>
											<td><?= $data['id_kategori'];?></td>
											<td><?= $data['nm_kategori']?></td>											                          
			                <td><a href='?mod=edit&id_kategori=<?= $data['id_kategori'];?>'><button type='button' class='btn btn-success'><span class='glyphicon glyphicon-edit'></span></button></a>
			                
			                <a href="aksi_kategori.php?mod=delete&id_kategori=<?= $data['id_kategori'];?>" onClick="return confirm('Yakin akan menghapus Data?')"><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove-sign'></button></a></td>
										</tr>
										<?php endforeach;?>
			            </tbody>
			          </table>
		       		</div>
			    <?php 
			    break;


	   			case 'add': ?>
				    <form method='POST' action='aksi_kategori.php?mod=tambah' class='form-horizontal'>
				    <h4>Tambah Data Wisata</h4><hr><br>
                        
                       <div class="form-group">
					    <label class="col-sm-2 control-label">Id_kategori</label>
					    <div class="col-sm-4">
					      <input type="text" required="required" name='id_kategori' class="form-control" placeholder="Masukan id_kategori">
					    </div>
					  </div>
                     
                      <div class="form-group">
					    <label class="col-sm-2 control-label">Nama_kategori</label>
					    <div class="col-sm-4">
					      <input type="text" required="required" name='nm_kategori' class="form-control" placeholder="Nama lengkap">
					    </div>
					  </div>
                        
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-4">
					      <button type='submit' name='submit' class='btn btn-primary' onClick="return confirm('Yakin akan Tambah Data?')">Tambah</button>
					    </div>
					  </div>
					</form>
				<?php
				break;
				
				case 'edit':
					$sql = $db->query("SELECT * FROM tbl_kategori WHERE id_kategori='$_GET[id_kategori]' ");
					$data = $sql->fetch_array();
					
					?>
				    <form method='POST' action='aksi_kategori.php?mod=edit' class='form-horizontal'>
				    <h4>Edit Data Wisata</h4><hr><br>
				    
				     <div class="form-group">
					    <label class="col-sm-2 control-label">Id Kategori</label>
					    <div class="col-sm-4">
					      <input type="text" required="required" readonly="true"  name='id_kategori' class="form-control"  value="<?php echo $data['id_kategori'];?>">
					    </div>
					  </div>
                     
                      <div class="form-group">
					    <label class="col-sm-2 control-label">Nama_kategori</label>
					    <div class="col-sm-4">
					      <input type="text" required="required"  name='nm_kategori' class="form-control"  value="<?php echo $data['nm_kategori'];?>">
					    </div>
					  </div>
                    
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-4">
					      <button type='submit' name='submit' class='btn btn-primary' onClick="return confirm('Yakin akan Edit Data?')">Save</button>
					      <button type='reset' name='reset' class='btn btn-primary'>Reset</button>
					    </div>
					  </div>
					</form>
				<?php 
			            		
				break;
			} ?>

			</div>
		</div>


