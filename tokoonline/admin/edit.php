<html>
<head></head>
<body>
    
    <form action="" method = "form">
         <input type="hidden" name="id" value="<?php echo $siswa["ID"]; ?>">
		 <input type="hidden" name="gambarlama" value="<?php echo $siswa["Foto"]; ?>">

         <label for="username" class="text-info">Judul:</label>
         <input type="text" name="judul" autocomplete="off"> <br>

         <label for="text" class="text-info">Deskripsi:</label>
	     <input type="text" name="deskripsi"> <br>

         <label for="text" class="text-info">Harga:</label>
	     <input type="text" name="harga"> <br>

         <label for="text" class="text-info">Penulis:</label>
	     <input type="text" name="penulis"> <br>

	     <button type="submit" name="submit" value="submit">Login</button>



    
    </form>


</body>
</html>