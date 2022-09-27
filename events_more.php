<?php
    if(!empty($_POST["id"])){
        include_once 'dbh.php';

        $display = $_POST['id'];

        // Count all records except already displayed
        $query = $conn->query("SELECT COUNT(*) as num_rows FROM events WHERE id < $display ORDER BY id DESC");
        $row = $query->fetch_assoc();
        $totalRowCount = $row['num_rows'];
        
        $showLimit = 3;
        
        // Get records from the database
        $query = $conn->query("SELECT * FROM events WHERE id < $display ORDER BY id DESC LIMIT $showLimit");

        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
                $id = $row['id'];
                    $heading = $row["heading"];
                    $venue = $row["venue"];
                    $date = $row['date'];
                    $details = $row['details'];

                    echo '<div class="event-content">
                        <p class="event-date">'.$date.'</p>
                            <h2>'.$heading.'</h2>
                            <p class="event-venue"><b>Venue </b>'.$venue.'</p>
                            <p class="details">'.$details.'</p>
                        </div>';
            } 
            if($totalRowCount > $showLimit){
                echo 
                '<div class="show_more_main" id="show_more_event'.$id.'">
                        <span id="'.$id.'" class="show_event" title="Load more Events">Show more</span>
                        <span class="loading" style="display: none;"><span class="loading_txt">Loading...</span></span>
                    </div>';
            }
        }
    }
?>
