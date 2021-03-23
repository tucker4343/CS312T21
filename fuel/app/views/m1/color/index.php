<body>
    <header>
        Welcome to the Color page
    </header>
    <main>
        <?php

            function formBuild($errorNum){
                if ($errorNum == 1){
                    echo "Form failed to validate: please enter correct values for both. <br>
                            Rows/Columns should be from 1 to 26, and the Colors should be from 1 to 10. <br>";
                }
                $self = $_SERVER["PHP_SELF"];
                echo    "<form action = '$self' method = 'POST''>
                            <label for='rowCol'>Number of Rows and Columns:</label>
                            <input type='text' id='rowCol' name='rowCol' required><br>
                            <label for='percent'>Number of Colors:</label>
                            <input type='text' id='colorNum' name='colorNum' required><br><br>
                            <input type='submit' value='Submit'>
                            </form>";
            }


            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo "Post request has been made <br>";

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
                    echo "Input values have been varified. <br>";
                    
                    $colorArray = array('red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'grey', 'brown', 'black');
                    echo "<form>";
                    echo "<table style='width:85%'>";
                    for ($i = 0; $i < $colorNum; $i++){
                        echo "<tr><td style='width:20%'>";
                        echo "<select id='color$i' name='color'>";
                            for ($j = 0; $j < $colorNum; $j++){
                                $colorType = $colorArray[($i+$j)%$colorNum];
                                echo "<option value='$colorType'>$colorType</option>";
                            }
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
                    
                    echo "<input type='submit' value='Submit'>";
                    echo "</form>";
                }
                else{// Variables failed to validate
                    formBuild(1);
                }
            }// End of POST request
            else{
                echo "Get request has been made <br>";
                formBuild(0);
            }
        ?>
    </main>
</body>