<?php
    if(!empty($_POST["id"])){
        include_once 'dbh.php';

        $display = $_POST['id'];

        // Count all records except already displayed
        $query = $conn->query("SELECT COUNT(*) as num_rows FROM ideas WHERE id < $display ORDER BY id DESC");
        $row = $query->fetch_assoc();
        $totalRowCount = $row['num_rows'];
        
        $showLimit = 3;
        
        // Get records from the database
        $query = $conn->query("SELECT * FROM ideas WHERE id < $display ORDER BY id DESC LIMIT $showLimit");

        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
                $id = $row['id'];
                $heading = $row["heading"];
                $tag = $row["tag"];
                $date = $row['date'];
                $details = $row['details'];
                $image = base64_encode( $row['image'] );

                echo ' 
                    <div class="insight-item">
                        <img src="data:image/jpg;charset=utf8;base64, '.base64_encode($row['image']).'"  alt="">
                        <h4>'.$tag.'</h4>
                        <h3>'.$heading.'</h3>
                        <span class="date">'.$date.'</span>
                        <p>'.$details.'</p>
                    </div>
                </div>
                ';
            } 
            if($totalRowCount > $showLimit){
                echo 
                '<div class="show_more_main" id="show_more_main'.$id.'">
                    <span id="'.$id.'" class="show_more" title="Load more posts">Show more</span>
                    <span class="loading" style="display: none;"><span class="loading_txt">Loading...</span></span>
                </div>';
            }
        }
    }
?>
