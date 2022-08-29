
    <section class="idin-header">
        <h1>Ideas & Insights</h1>
        <p>Founded in 2001 in New York, USA</p>
    </section>

    <section class="insight">
        <h2>Insights</h2>
        <p>Read our views on the things that matter to you. And get to know our people. We make the difference.</p>
        <div class="insight-big-con">

        <?php
            
            include_once 'dbh.php';

            $sql = "SELECT * FROM ideas ORDER BY id DESC LIMIT 3";
            $result = mysqli_query($conn, $sql);
            
            echo '<div class="insight-container">';
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

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
                    
                    ';
                }

                echo'
                </div>
                    <div class="show_more_main" id="show_more_main'.$id.'">
                        <span id="'.$id.'" class="show_more" title="Load more posts">Show more</span>
                        <span class="loading" style="display: none;"><span class="loading_txt">Loading...</span></span>
                    </div>';

            } else {
                echo "Nothing to see yet!";
            }
        ?>       
        </div>
    </section>
    
    <?php
        include 'footer.php';
    ?>