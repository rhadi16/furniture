<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php
      // Jika page = 1, maka LinkPrev disable
      if($page == 1){ 
    ?>        
      <!-- link Previous Page disable --> 
      <li class="page-item disabled"><a class="page-link">Previous</a></li>
    <?php
      }
      else{ 
        $LinkPrev = ($page > 1)? $page - 1 : 1;  
    ?>
        <li class="page-item"><a class="page-link" href="<?php echo $view; ?>?page=<?php echo $LinkPrev; ?>">Previous</a></li>
    <?php } ?>

    <!-- pagination -->
    <?php
      //kondisi jika parameter pencarian kosong
      if(isset($_POST['search'])){
        $search = $_POST['search'];

        $SqlQuery = mysqli_query($mysqli, "$qry WHERE $field LIKE '%". $search ."%'");
      }else{
        //kondisi jika parameter kolom pencarian diisi
        $SqlQuery = mysqli_query($mysqli, "$qry");
      }     
    
      //Hitung semua jumlah data yang berada pada tabel Sisawa
      $JumlahData = mysqli_num_rows($SqlQuery);
      
      // Hitung jumlah halaman yang tersedia
      $jumlahPage = ceil($JumlahData / $limit); 
      
      // Jumlah link number 
      $jumlahNumber = 1; 

      // Untuk awal link number
      $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
      
      // Untuk akhir link number
      $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
      
      for($i = $startNumber; $i <= $endNumber; $i++){
        $linkActive = ($page == $i)? ' class="page-item active"' : '';
    ?>
        <li<?php echo $linkActive; ?>><a class="page-link" href="<?php echo $view; ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

    <?php } ?>

    <!-- next page -->
    <?php       
     if($page == $jumlahPage){ 
    ?>
      <li class="disabled page-item"><a class="page-link" href="#">Next</a></li>
    <?php
    }
    else{
      $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;

      ?>
        <li class="page-item"><a class="page-link" href="<?php echo $view; ?>?page=<?php echo $linkNext; ?>">Next</a></li>
    <?php } ?>
  </ul>
</nav>