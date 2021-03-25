<body>
    <header>
        Welcome to the Color page
    </header>
    <main>
        
        <?php

            $colorNum = 0;
            $rowCol = 0;

            echo Asset::js(array("https://code.jquery.com/jquery-3.6.0.min.js"));
            
            echo "
            <script type='text/javascript'>
            function stopDupes(){
                let selectArray = $('color');
                for (let i = 0; i < selectArray.length; i++){
                    selectArray[i].selectedIndex = i;
                }
            }
            </script>";
            
            
            function formBuild($errorNum){
                if ($errorNum == 1){
                    echo "Form failed to validate: please enter correct values for both. <br>
                    Rows/Columns should be from 1 to 26, and the Colors should be from 1 to 10. <br>";
                }
                $self = $_SERVER["PHP_SELF"];
                echo    "<form action = '$self' method = 'POST'>
                <label for='rowCol'>Number of Rows and Columns:</label>
                <input type='text' id='rowCol' name='rowCol' required><br>
                <label for='percent'>Number of Colors:</label>
                <input type='text' id='colorNum' name='colorNum' required><br><br>
                <input type='hidden' name='test' value='a'>
                <input type='submit' value='Submit'>
                </form>";
            }
            
            $colorArray = array('red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'grey', 'brown', 'black');
            $colorKey = array( 0 => 'red', 1 =>  'orange', 2 => 'yellow', 3 => 'green', 4 => 'teal', 5 => 'blue', 6 => 'purple', 7 => 'grey', 8 => 'brown', 9 => 'black');
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<style>
                        table{
                            border-style: solid;
                            border-width: 10px;
                            border-color: black;
                        }
                        td{
                            border: 1px solid black;
                            width: 20px;
                            height: 20px;
                        }
                    </style>";

                if ( $_POST['rowCol'] >= 1 && $_POST['rowCol'] <= 26 && $_POST['colorNum'] >= 1 && $_POST['colorNum'] <= 10){
                    $rowCol = $_POST['rowCol'];
                    $colorNum = $_POST['colorNum'];
                    

                    echo "<form action='https://cs.colostate.edu:4444/~cayce/m1/index.php/m1/printable/' method = 'POST' target='_blank'>";
                    echo "<table style='width:85%'>";
                    for ($i = 0; $i < $colorNum; $i++){
                        echo "<tr><td style='width:20%'>";
                        echo "<select id='color$i' name='color$i'>";
                            for ($j = 0; $j < 10; $j++){
                                $colorType = $colorArray[$j];
                                if ($i == $j){
                                    echo "<option id='colorOption' name='color$i' value='$j' selected>$colorType</option>";
                                }else{
                                    echo "<option id='colorOption' name='color$i' value='$j'>$colorType</option>";
                                }
                            }   
                        echo "</select>";
                        echo "</td><td style='width:80%'></td></tr>";
                    }
                    echo "</table>";
                    
                    echo "<table>";
                    echo "<tr><td></td>";
                    $alphaBet = range('A', 'Z');
                    for ($j = 0; $j < $rowCol; $j++){
                        echo "<td>$alphaBet[$j]</td>";
                    }
                    for ($i = 1; $i < $rowCol+1; $i++){
                        echo "<tr>";
                        echo "<td>$i</td>";
                        for ($j = 0; $j < $rowCol; $j++){
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    
                    echo "<input type='hidden' name='test' value='b'>";
                    echo "<input type='hidden' name='colorNum' value='$colorNum'>";
                    echo "<input type='hidden' name='rowCol' value='$rowCol'>";
                    echo "<input type='submit' value='Submit'>";
                    echo "</form>";



                }
                else{// Variables failed to validate
                    formBuild(1);
                }
            }// End of POST request
            else{
                formBuild(0);
            }
        ?>
        <script type='text/javascript'>

            var selectedOptions = [];
            <?php for ($j = 0; $j < $colorNum; $j++){?>
                selectedOptions.push(parseInt($("#color<?=$j;?> option:selected").val()));
            <?php } ?>
            
            <?php for ($k = 0; $k < 10; $k++){?>
                if (selectedOptions.includes(<?=$k;?>)){
                    $("select option[value=<?=$k;?>]").prop("disabled", true);
                }
            <?php } ?>

            $(function(){
                <?php
                //$colorKey = array( 0 => 'red', 1 =>  'orange', 2 => 'yellow', 3 => 'green', 4 => 'teal', 5 => 'blue', 6 => 'purple', 7 => 'grey', 8 => 'brown', 9 => 'black');
                for($i = 0; $i < $colorNum; $i++){ ?>
                    $("#color<?=$i;?>").change(function(){
                        //alert('changed');
                        $("select option").prop("disabled", false);

                        var selectedOptions = [];
                        <?php for ($j = 0; $j < $colorNum; $j++){?>
                            selectedOptions.push(parseInt($("#color<?=$j;?> option:selected").val()));
                        <?php } ?>
                        
                        <?php for ($k = 0; $k < 10; $k++){?>
                            if (selectedOptions.includes(<?=$k;?>)){
                                $("select option[value=<?=$k;?>]").prop("disabled", true);
                            }
                        <?php } ?>

                    });
                <?php } ?>
            });
        </script>

    </main>
</body>