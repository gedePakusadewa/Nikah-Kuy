<?php

    session_start();   

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "nikah_yuk";

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db->connect_error) {
        die("Koneksi Gagal: " . $db->connect_error);
    }
     
    $page_terkirim = "../pertanyaan_terkirim.php";

    if(isset($page)){
        global $page;
        getOrderKosong();

        if($page === "layanan_venue"){       
            getDataVenue();
        }

        if($page === "layanan_food"){       
            getDataFood();
        }

        if($page === "layanan_undangan"){       
            getDataUndangan();
        }
    }

    function getOrderKosong(){
        unset($_SESSION['order_kosong']);

        $data_baris = getDataBaris("SELECT id FROM order_kosong");
        
        for($i = 0; $i < count($data_baris); $i++){
            $id = $data_baris[$i];
            $data_satuan = runQuery("SELECT id, nama, kode_item, path_gambar FROM order_kosong
                WHERE id = '$id' ");
        
            $array_data_satuan = array(
                $data_satuan[0]['kode_item']
                    =>array('id'=>$data_satuan[0]['id'],
                            'nama'=>$data_satuan[0]['nama'], 
                            'kode_item'=>$data_satuan[0]['kode_item'],
                            'path_gambar'=>$data_satuan[0]['path_gambar']
                    )
            );

            if(!isset($_SESSION['order_kosong'])){
                $_SESSION['order_kosong'] = $array_data_satuan;
            }else{
                $_SESSION['order_kosong'] = array_merge($_SESSION['order_kosong'] 
                    , $array_data_satuan);
            }
        }
    }

    function getDataVenue(){
        unset($_SESSION['daftar_venue']);

        $data_baris = getDataBaris("SELECT id FROM data_venue");
        
        for($i = 0; $i < count($data_baris); $i++){
            $id = $data_baris[$i];
            $data_satuan = runQuery("SELECT id, nama, kode, bintang, total_review, kapasitas, harga, 
                path_gambar FROM data_venue WHERE id = '$id' ");
        
            $array_data_satuan = array(
                $data_satuan[0]['kode']
                    =>array('id'=>$data_satuan[0]['id'],
                            'nama'=>$data_satuan[0]['nama'], 
                            'kode'=>$data_satuan[0]['kode'],
                            'bintang'=>$data_satuan[0]['bintang'], 
                            'total_review'=>$data_satuan[0]['total_review'],
                            'kapasitas'=>$data_satuan[0]['kapasitas'], 
                            'harga'=>$data_satuan[0]['harga'],
                            'path_gambar'=>$data_satuan[0]['path_gambar']
                    )
            );

            if(!isset($_SESSION['daftar_venue'])){
                $_SESSION['daftar_venue'] = $array_data_satuan;
            }else{
                $_SESSION['daftar_venue'] = array_merge($_SESSION['daftar_venue'] 
                    , $array_data_satuan);
            }
        }
    }

    function getDataFood(){
        unset($_SESSION['daftar_food']);

        $data_baris = getDataBaris("SELECT id FROM data_food");
        
        for($i = 0; $i < count($data_baris); $i++){
            $id = $data_baris[$i];
            $data_satuan = runQuery("SELECT id, nama, kode, bintang, total_review, kapasitas, 
                harga, path_gambar FROM data_food WHERE id = '$id' ");
        
            $array_data_satuan = array(
                $data_satuan[0]['kode']
                    =>array('id'=>$data_satuan[0]['id'],
                            'nama'=>$data_satuan[0]['nama'], 
                            'kode'=>$data_satuan[0]['kode'],
                            'bintang'=>$data_satuan[0]['bintang'], 
                            'total_review'=>$data_satuan[0]['total_review'],
                            'kapasitas'=>$data_satuan[0]['kapasitas'], 
                            'harga'=>$data_satuan[0]['harga'],
                            'path_gambar'=>$data_satuan[0]['path_gambar']
                    )
            );

            if(!isset($_SESSION['daftar_food'])){
                $_SESSION['daftar_food'] = $array_data_satuan;
            }else{
                $_SESSION['daftar_food'] = array_merge($_SESSION['daftar_food'] 
                    , $array_data_satuan);
            }
        }
    }

    function getDataUndangan(){
        unset($_SESSION['daftar_undangan']);

        $data_baris = getDataBaris("SELECT id FROM data_undangan");
        
        for($i = 0; $i < count($data_baris); $i++){
            $id = $data_baris[$i];
            $data_satuan = runQuery("SELECT id, nama, kode, bintang, total_review, kapasitas, 
                harga, path_gambar FROM data_undangan WHERE id = '$id ' ");
        
            $array_data_satuan = array(
                $data_satuan[0]['kode']
                    =>array('id'=>$data_satuan[0]['id'],
                            'nama'=>$data_satuan[0]['nama'], 
                            'kode'=>$data_satuan[0]['kode'],
                            'bintang'=>$data_satuan[0]['bintang'], 
                            'total_review'=>$data_satuan[0]['total_review'],
                            'kapasitas'=>$data_satuan[0]['kapasitas'], 
                            'harga'=>$data_satuan[0]['harga'],
                            'path_gambar'=>$data_satuan[0]['path_gambar']
                    )
            );

            if(!isset($_SESSION['daftar_undangan'])){
                $_SESSION['daftar_undangan'] = $array_data_satuan;
            }else{
                $_SESSION['daftar_undangan'] = array_merge($_SESSION['daftar_undangan'] 
                    , $array_data_satuan);
            }
        }
    }

    if (isset($_GET['hapus_order_venue'])){
        global $page;
        if($_GET['hapus_order_venue'] === 'true'){
            unset($_SESSION['order_venue']);            
            header("Location: ".$page.".php");
            exit();   
        }
    }

    if (isset($_GET['hapus_order_food'])){
        global $page;
        if($_GET['hapus_order_food'] === 'true'){
            unset($_SESSION['order_food']);
            header("Location: ".$page.".php");
            exit();
        }
    }

    if (isset($_GET['hapus_order_undangan'])){
        global $page;
        if($_GET['hapus_order_undangan'] === 'true'){
            unset($_SESSION['order_undangan']);
            header("Location: ".$page.".php");
            exit();
        }
    }

    function tampilanOrder(){
        $item_order = mergeSessionOrder();
        
        foreach($item_order as $item){
            echo 
                "<div class=\"w3-col l3 m6 w3-margin-bottom\">
                    <div class=\"w3-display-container w3-border\">
                            ".$item['path_gambar']."
                        <div class=\"w3-padding\">
                            <h6>".$item['nama']."</h6>
                            ".getStarReview($item['bintang'])."
                            <span>(review ".$item['total_review'].")</span><br />
                            <span>Kapasitas: ".$item['kapasitas']." orang</span>
            
                            <div class=\"w3-center w3-padding-16\">
                                ".$item['tombol_hapus']."
                            </div>
                        </div>
                    </div>
                </div>"; 
        }
                           
    }

    //lanjut bikin order pesanan untuk kategori lainnya
    function mergeSessionOrder(){
        $order_temp['venue'] = orderVenue();
        $order_temp['food'] = orderFood();
        $order_temp['undangan'] = orderUndangan();
        
        return $order_temp;
    }

    function orderVenue(){
        global $page;
        if(isset($_SESSION['order_venue'])){
            foreach ($_SESSION['order_venue'] as $key){
                $array_venue['path_gambar'] = "<img src=\"../".$key['path_gambar']."\" 
                alt=\"venue\" style=\"width:100%\" />";
                $array_venue['nama'] = $key['nama'];
                $array_venue['bintang'] = $key['bintang'];
                $array_venue['total_review'] = $key['total_review'];
                $array_venue['kapasitas'] = $key['kapasitas'];
                $array_venue['tombol_hapus'] = "<a href=\"".$page.".php?hapus_order_venue=true\" 
                class=\"w3-button w3-black\" style=\"width:65%;\" >Hapus</a>";
            }                 
        }else{
          $array_venue['path_gambar'] = "<img src=\"../".$_SESSION['order_kosong']['uy76']['path_gambar']."\" alt=\"venue\" style=\"width:100%\" />";
          $array_venue['nama'] = "~~~~~~~~";
          $array_venue['bintang'] = "0";
          $array_venue['total_review'] = "0";
          $array_venue['kapasitas'] = "0";
          $array_venue['tombol_hapus'] = "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_entertainment\" 
          type=\"submit\" disabled >Hapus</button>";
        } 

        return $array_venue;
    }

    function orderFood(){
        global $page;

        if(isset($_SESSION['order_food'])){
            foreach ($_SESSION['order_food'] as $key){
                $array_food['path_gambar'] = "<img src=\"../".$key['path_gambar']."\" 
                    alt=\"food\" style=\"width:100%\" />";
                $array_food['nama'] = $key['nama'];
                $array_food['bintang'] = $key['bintang'];
                $array_food['total_review'] = $key['total_review'];
                $array_food['kapasitas'] = $key['kapasitas'];
                $array_food['tombol_hapus'] = "<a href=\"".$page.".php?hapus_order_food=true\" 
                    class=\"w3-button w3-black\" style=\"width:65%;\" >Hapus</a>";
            }                 
        }else{
            $array_food['path_gambar'] = "<img src=\"../".$_SESSION['order_kosong']['hyg6']['path_gambar']."\"
                alt=\"food\" style=\"width:100%\" />";
            $array_food['nama'] = "~~~~~~~~";
            $array_food['bintang'] = "0";
            $array_food['total_review'] = "0";
            $array_food['kapasitas'] = "0";
            $array_food['tombol_hapus'] = "<button class=\"w3-button w3-black\" style=\"width:65%;\" 
                name=\"hapus_food\" type=\"submit\" disabled >Hapus</button>";
        } 

        return $array_food;
    }

    function orderUndangan(){
        global $page;

        if(isset($_SESSION['order_undangan'])){
            foreach ($_SESSION['order_undangan'] as $key){
                $array_undangan['path_gambar'] = "<img src=\"../".$key['path_gambar']."\" 
                    alt=\"undangan\" style=\"width:100%\" />";
                $array_undangan['nama'] = $key['nama'];
                $array_undangan['bintang'] = $key['bintang'];
                $array_undangan['total_review'] = $key['total_review'];
                $array_undangan['kapasitas'] = $key['kapasitas'];
                $array_undangan['tombol_hapus'] = "<a href=\"".$page.".php?hapus_order_undangan=true\" 
                    class=\"w3-button w3-black\" style=\"width:65%;\" >Hapus</a>";
            }                 
        }else{
            $array_undangan['path_gambar'] = "<img src=\"../".$_SESSION['order_kosong']['t6g6']['path_gambar']."\"
                alt=\"undangan\" style=\"width:100%\" />";
            $array_undangan['nama'] = "~~~~~~~~";
            $array_undangan['bintang'] = "0";
            $array_undangan['total_review'] = "0";
            $array_undangan['kapasitas'] = "0";
            $array_undangan['tombol_hapus'] = "<button class=\"w3-button w3-black\" style=\"width:65%;\" 
                name=\"hapus_undangan\" type=\"submit\" disabled >Hapus</button>";
        } 

        return $array_undangan;
    }
    

    if (isset($_GET['input_venue'])) {
        unset($_SESSION['order_venue']);
        $id = str_replace(" ", "", $_GET['input_venue']);
        $id_venue = (int) $id;
        //kenapa input diatas NOL
        $data = runQuery("SELECT id, nama, kode, bintang, total_review, kapasitas, harga, 
                    path_gambar FROM data_venue WHERE id = '$id_venue' ");
        
        $array_data = array(
            $data[0]['kode']
                =>array(
                    'id'=>$data[0]['id'],
                    'nama'=>$data[0]['nama'], 
                    'kode'=>$data[0]['kode'],
                    'bintang'=>$data[0]['bintang'], 
                    
                    'jenis'=>'venue',
                    'total_review'=>$data[0]['total_review'],
                    'kapasitas'=>$data[0]['kapasitas'], 
                    'harga'=>$data[0]['harga'],
                    'path_gambar'=>$data[0]['path_gambar']
                )
        );
        $_SESSION['order_venue'] = $array_data;       
        
        header("Location: layanan_venue.php");
        exit();

    }

    if (isset($_GET['input_food'])) {
        unset($_SESSION['order_food']);
        $id = str_replace(" ", "", $_GET['input_food']);
        $id_food = (int) $id;
        //kenapa input diatas NOL
        $data = runQuery("SELECT id, nama, kode, bintang, total_review, kapasitas, harga, 
                    path_gambar FROM data_food WHERE id = '$id_food' ");
        
        $array_data = array(
            $data[0]['kode']
                =>array('id'=>$data[0]['id'],
                        'nama'=>$data[0]['nama'], 
                        'kode'=>$data[0]['kode'],
                        'bintang'=>$data[0]['bintang'], 
                        'total_review'=>$data[0]['total_review'],
                        'kapasitas'=>$data[0]['kapasitas'], 
                        'harga'=>$data[0]['harga'],
                        'path_gambar'=>$data[0]['path_gambar'],
                        'jenis'=>'food'
                )
        );
        $_SESSION['order_food'] = $array_data;        
        
        header("Location: layanan_food.php");
        exit();
    }

    if (isset($_GET['input_undangan'])) {
        unset($_SESSION['order_undangan']);
        $id = str_replace(" ", "", $_GET['input_undangan']);
        $id_undangan = (int) $id;
        //kenapa input diatas NOL
        $data = runQuery("SELECT id, nama, kode, bintang, total_review, kapasitas, harga, 
                    path_gambar FROM data_undangan WHERE id = '$id_undangan' ");
        
        $array_data = array(
            $data[0]['kode']
                =>array('id'=>$data[0]['id'],
                        'nama'=>$data[0]['nama'], 
                        'kode'=>$data[0]['kode'],
                        'bintang'=>$data[0]['bintang'], 
                        'total_review'=>$data[0]['total_review'],
                        'kapasitas'=>$data[0]['kapasitas'], 
                        'harga'=>$data[0]['harga'],
                        'path_gambar'=>$data[0]['path_gambar'],
                        'jenis'=>'undangan'
                )
        );
        $_SESSION['order_undangan'] = $array_data;        
        
        header("Location: layanan_undangan.php");
        exit();
    }

    function cekCheckout(){
        if(isset($_SESSION['order_venue']) || isset($_SESSION['order_food']) ||
            isset($_SESSION['order_undangan']) ){
            return true;
        }else{
            return false;
        }
    }

    function cekCheckout2(){
        if(isset($_SESSION['order_venue']) && isset($_SESSION['order_food']) &&
            isset($_SESSION['order_undangan']) ){
            return true;
        }else{
            return false;
        }
    }

    function makeArrayForCheckOut(){
        if(cekCheckout2()){
            $_SESSION['order_final'] = $_SESSION['order_venue'];
            
            $_SESSION['order_final'] = array_merge($_SESSION['order_final'], $_SESSION['order_food']);
            
            $_SESSION['order_final'] = array_merge($_SESSION['order_final'], $_SESSION['order_undangan']);
            
        }
    }

    function checkOutFinal(){
        $price = 0;
        if(cekCheckout()){
            makeArrayForCheckOut();
            echo "  
                <div style=\"overflow-x:auto;\">
                    <table>
                        <tr>
                            <th>Layanan</th>
                            <th>Nama Vendor</th>
                            <th>Review Vendor</th>
                            <th>Harga</th>
                        </tr>";

                            foreach($_SESSION['order_final'] as $item){

                                echo "<tr>
                                        <td>".$item['jenis']."</td>
                                        <td>".$item['nama']."</td>
                                        <td>".getStarReview($item['bintang'])."</td>
                                        <td>".$item['harga']."</td>
                                    </tr>";

                                    $price = $price + (int)$item['harga'];
                            }
            echo "                        
                    </table>
                </div>";
                $_SESSION['harga_checkOut']= $price;
        }else{
            echo "Maaf Anda belum melakukan pemesanan apapun.";
        }
        
    }

    //buat ngasi bintang review dari data bintang table data_food dll
    function getStarReview($jumlahBintang){
        if($jumlahBintang === '1'){
            return "
                <span class=\"fas fa-star-half-alt starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }else if($jumlahBintang === '2'){
            return "
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }else if($jumlahBintang === '3'){
            return "
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star-half-alt starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }else if($jumlahBintang === '4'){
            return "
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }else if($jumlahBintang === '5'){
            return "
                <span class=\"fas fa-star starReview\" ></span>                
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star-half-alt starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }else if($jumlahBintang === '6'){
            return "
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }else if($jumlahBintang === '7'){
            return "
                <span class=\"fas fa-star starReview\" ></span>                
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star-half-alt starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }else if($jumlahBintang === '8'){
            return "
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }else if($jumlahBintang === '9'){
            return "
                <span class=\"fas fa-star starReview\" ></span>                
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star-half-alt starReview\" ></span>";
        }else if($jumlahBintang === '10'){
            return "
                <span class=\"fas fa-star starReview\" ></span>                
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>
                <span class=\"fas fa-star starReview\" ></span>";
        }else{
            return"
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>
                <span class=\"far fa-star starReview\" ></span>";
        }
        
    }

    function getDataBaris($sql_gDB){
        global $db;

        //$sql_admin = "SELECT id FROM tour_bulan_skedul";

        $result_gDB = $db->query($sql_gDB);
        $array_list_gDB = [];
        $incre = 0;

        if ($result_gDB->num_rows > 0) {
            while($row_gDB = $result_gDB->fetch_assoc()) {
                    $array_list_gDB[$incre] =  $row_gDB['id'];
                    $incre = $incre + 1;
            }
        }
        return $array_list_gDB;
    }

    function runQuery($query) {
        global $db;
        $result = mysqli_query($db,$query);
        
		while($row = mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
        }
        		
		if(!empty($resultset)){
            return $resultset;
        }
            
    }

    function deleteSessionOrder(){
        global $page;
        unset($_SESSION['user']);
        unset($_SESSION['order_venue']);
        unset($_SESSION['order_food']);
        unset($_SESSION['order_undangan']);

        header("Location: ".$page.".php");
        exit();
    }

    if (isset($_POST['login_btn'])) {
        login();
    }

    function login(){
        $username  = ($_POST['username']);

        $password  = ($_POST['password']);

        if($username === 'admin' && $password === 'admin'){
            $_SESSION['user'] = 'Donita';
        }
    }

    if(isset($_SESSION['user'])){
        if(isset($_POST['btn_venue_1'])){
            $_SESSION['layanan_venue']['nama'] = 'Le Grandeur Mangga Dua Surabaya'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_1.jpeg'; 
        }else if(isset($_POST['btn_venue_2'])){
            $_SESSION['layanan_venue']['nama'] = 'Thamrin Nine Ballroom Menur'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_2.jpg';  
        }else if(isset($_POST['btn_venue_3'])){
            $_SESSION['layanan_venue']['nama'] = 'Skenoo Hall Emporium Dukuh Kupang'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_3.jpg';  
        }else if(isset($_POST['btn_venue_4'])){
            $_SESSION['layanan_venue']['nama'] = 'The Ritz-Carlton Gubeng'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_4.jpg';  
        }else if(isset($_POST['btn_venue_5'])){
            $_SESSION['layanan_venue']['nama'] = 'House Of Blessing Pakuwon'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_5.jpg';  
        }else if(isset($_POST['btn_venue_6'])){
            $_SESSION['layanan_venue']['nama'] = 'Skenoo Hall Emporium Dukuh Kupang'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_6.jpg';  
        }else if(isset($_POST['btn_venue_7'])){
            $_SESSION['layanan_venue']['nama'] = 'Batavia Sunda Kelapa Sidoarjo'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_7.jpg';  
        }else if(isset($_POST['btn_venue_8'])){
            $_SESSION['layanan_venue']['nama'] = 'The Allwynn Grand Tanjung'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_8.jpg';  
        }else if(isset($_POST['btn_venue_9'])){
            $_SESSION['layanan_venue']['nama'] = 'Sampoerna Strategic Square Perak'; 
            $_SESSION['layanan_venue']['gambar'] = '../gambar/venue/venue_9.jpg';  
        }
    }

    if(isset($_SESSION['user'])){
        if(isset($_POST['btn_food_1'])){
            $_SESSION['layanan_food']['nama'] = 'Nendia Primarasa Catering'; 
            $_SESSION['layanan_food']['gambar'] = '../gambar/food/food_1.jpeg'; 
        }else if(isset($_POST['btn_food_2'])){
            $_SESSION['layanan_food']['nama'] = 'Puspita Sawargi Catering'; 
            $_SESSION['layanan_food']['gambar'] = '../gambar/food/food_2.jpg';  
        }else if(isset($_POST['btn_food_3'])){
            $_SESSION['layanan_food']['nama'] = "Oma Thia's Kitchen Catering"; 
            $_SESSION['layanan_food']['gambar'] = '../gambar/food/food_3.jpg';  
        }
    }

    if(isset($_SESSION['user'])){
        if(isset($_POST['btn_undangan_1'])){
            $_SESSION['layanan_undangan']['nama'] = 'Samarista Wedding Card'; 
            $_SESSION['layanan_undangan']['gambar'] = '../gambar/undangan/undang_1.jpg'; 
        }else if(isset($_POST['btn_undangan_2'])){
            $_SESSION['layanan_undangan']['nama'] = 'Furemu Card'; 
            $_SESSION['layanan_undangan']['gambar'] = '../gambar/undangan/undang_2.jpg';  
        }else if(isset($_POST['btn_undangan_3'])){
            $_SESSION['layanan_undangan']['nama'] = "Aesthriver Wedding Card"; 
            $_SESSION['layanan_undangan']['gambar'] = '../gambar/undangan/undang_3.jpg';  
        }
    }

    if(isset($_SESSION['user'])){
        if(isset($_POST['btn_dres_1'])){
            $_SESSION['layanan_dres']['nama'] = 'Martha Ulos Boutique'; 
            $_SESSION['layanan_dres']['gambar'] = '../gambar/dres/dres_1.jpg'; 
        }else if(isset($_POST['btn_dres_2'])){
            $_SESSION['layanan_dres']['nama'] = 'Roemah Djahit Boutique'; 
            $_SESSION['layanan_dres']['gambar'] = '../gambar/dres/dres_2.jpeg';  
        }else if(isset($_POST['btn_dres_3'])){
            $_SESSION['layanan_dres']['nama'] = "Kanti Griya Catering Boutique"; 
            $_SESSION['layanan_dres']['gambar'] = '../gambar/dres/dres_3.jpg';  
        }else if(isset($_POST['btn_dres_4'])){
            $_SESSION['layanan_dres']['nama'] = "Dimitro Bridal Boutique"; 
            $_SESSION['layanan_dres']['gambar'] = '../gambar/dres/dres_4.jpg';  
        }
    }

    if(isset($_SESSION['user'])){
        if(isset($_POST['btn_dekorasi_1'])){
            $_SESSION['layanan_dekorasi']['nama'] = 'Olive Branch Decoration'; 
            $_SESSION['layanan_dekorasi']['gambar'] = '../gambar/dekorasi/dekor_1.jpg'; 
        }else if(isset($_POST['btn_dekorasi_2'])){
            $_SESSION['layanan_dekorasi']['nama'] = 'Angela Florist & Decoration'; 
            $_SESSION['layanan_dekorasi']['gambar'] = '../gambar/dekorasi/dekor_2.jpeg';  
        }else if(isset($_POST['btn_dekorasi_3'])){
            $_SESSION['layanan_dekorasi']['nama'] = "Joelle Decoration"; 
            $_SESSION['layanan_dekorasi']['gambar'] = '../gambar/dekorasi/dekor_3.jpg';  
        }
    }

    if(isset($_SESSION['user'])){
        if(isset($_POST['btn_poto_video_1'])){
            $_SESSION['layanan_poto_video']['nama'] = 'Alissha Photography'; 
            $_SESSION['layanan_poto_video']['gambar'] = '../gambar/poto/poto_1.jpg'; 
        }else if(isset($_POST['btn_poto_video_2'])){
            $_SESSION['layanan_poto_video']['nama'] = 'Waduh Photography'; 
            $_SESSION['layanan_poto_video']['gambar'] = '../gambar/poto/poto_2.jpg';  
        }else if(isset($_POST['btn_poto_video_3'])){
            $_SESSION['layanan_poto_video']['nama'] = "Out Memory Box Photography"; 
            $_SESSION['layanan_poto_video']['gambar'] = '../gambar/poto/poto_3.jpg';  
        }else if(isset($_POST['btn_poto_video_4'])){
            $_SESSION['layanan_poto_video']['nama'] = "Dimitro Bridal Boutique"; 
            $_SESSION['layanan_poto_video']['gambar'] = '../gambar/poto/poto_4.jpg';  
        }
    }

    if(isset($_SESSION['user'])){
        if(isset($_POST['btn_entertainment_1'])){
            $_SESSION['layanan_entertainment']['nama'] = 'Venus Entertainment'; 
            $_SESSION['layanan_entertainment']['gambar'] = '../gambar/entertainment/entertainment_1.jpg'; 
        }else if(isset($_POST['btn_entertainment_2'])){
            $_SESSION['layanan_entertainment']['nama'] = 'The Red Carpet Entertainment'; 
            $_SESSION['layanan_entertainment']['gambar'] = '../gambar/entertainment/entertainment_2.jpg';  
        }else if(isset($_POST['btn_entertainment_3'])){
            $_SESSION['layanan_entertainment']['nama'] = "Serenity Organizer & Entertainment"; 
            $_SESSION['layanan_entertainment']['gambar'] = '../gambar/entertainment/entertainment_3.jpg';  
        }else if(isset($_POST['btn_entertainment_4'])){
            $_SESSION['layanan_entertainment']['nama'] = "Princess Entertainment"; 
            $_SESSION['layanan_entertainment']['gambar'] = '../gambar/entertainment/entertainment_4.jpg';  
        }
    }

    if(isset($_SESSION['user'])){
        if(isset($_POST['btn_honeymoon_1'])){
            $_SESSION['layanan_honeymoon']['nama'] = 'Puri Sebali Resort'; 
            $_SESSION['layanan_honeymoon']['gambar'] = '../gambar/honeymoon/honeymoon_1.jpg'; 
        }else if(isset($_POST['btn_honeymoon_2'])){
            $_SESSION['layanan_honeymoon']['nama'] = 'The Acala Shri Sedana Resort'; 
            $_SESSION['layanan_honeymoon']['gambar'] = '../gambar/honeymoon/honeymoon_2.jpg';  
        }else if(isset($_POST['btn_honeymoon_3'])){
            $_SESSION['layanan_honeymoon']['nama'] = "The Lokha Umalas Villas"; 
            $_SESSION['layanan_honeymoon']['gambar'] = '../gambar/honeymoon/honeymoon_3.jpg';  
        }else if(isset($_POST['btn_honeymoon_4'])){
            $_SESSION['layanan_honeymoon']['nama'] = "Jannata Resort"; 
            $_SESSION['layanan_honeymoon']['gambar'] = '../gambar/honeymoon/honeymoon_4.jpg';  
        }
    }

    if(isset($_POST['hapus_venue'])){
        unset($_SESSION['layanan_venue']);
    }

    if(isset($_POST['hapus_food'])){
        unset($_SESSION['layanan_food']);
    }

    if(isset($_POST['hapus_undangan'])){
        unset($_SESSION['layanan_undangan']);
    }

    if(isset($_POST['hapus_dres'])){
        unset($_SESSION['layanan_dres']);
    }

    if(isset($_POST['hapus_dekorasi'])){
        unset($_SESSION['layanan_dekorasi']);
    }

    if(isset($_POST['hapus_poto_video'])){
        unset($_SESSION['layanan_poto_video']);
    }

    if(isset($_POST['hapus_entertainment'])){
        unset($_SESSION['layanan_entertainment']);
    }

    if(isset($_POST['hapus_honeymoon'])){
        unset($_SESSION['layanan_honeymoon']);
    }



    function cekCheckoutPaket(){
        if(isset($_SESSION['layanan_venue']) && isset($_SESSION['layanan_food']) &&
            isset($_SESSION['layanan_dres']) && isset($_SESSION['layanan_undangan']) &&
            isset($_SESSION['layanan_dekorasi']) && isset($_SESSION['layanan_poto_video']) && 
            isset($_SESSION['layanan_entertaiment']) && isset($_SESSION['layanan_honeymoon']) ){
            return true;
        }else{
            return false;
        }
    }

    if(isset($_POST['btn_paket_bronze']) || isset($_POST['btn_paket_silver']) || 
        isset($_POST['btn_paket_gold']) || isset($_POST['btn_paket_diamond'])){
        unsetLayanan();
        
    }

    function unsetLayanan(){
        unset($_SESSION['layanan_venue']);
        unset($_SESSION['layanan_food']);
        unset($_SESSION['layanan_undangan']);
        unset($_SESSION['layanan_dres']);
        unset($_SESSION['layanan_dekorasi']);
        unset($_SESSION['layanan_poto_video']);
        unset($_SESSION['layanan_entertainment']);
        unset($_SESSION['layanan_honeymoon']);
    }

    $db->close();
?>