<body>
    <header>
        <?php echo Asset::img('logo.png', array('style' => 'width: 100px')) ?>
        JCC Solutions: Color
    </header>
    <main>
        <?php   
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
            $rowCol = $_POST['rowCol'];
            $colorNum = $_POST['colorNum'];
            $color1 = 'blue';
            $colorArray = array('red', 'orange', 'yellow', 'green', 'teal', 'blue', 'purple', 'grey', 'brown', 'black');
            echo "<table style='width:85%'>";
            for ($i = 0; $i < $colorNum; $i++){
                echo "<tr><td style='width:20%'>";
                    $colorConcat = 'color' . $i;
                    $colorIndexIGuess = $_POST[$colorConcat];
                    echo"$colorArray[$colorIndexIGuess]";
                    
                    $tempList = $_POST['longRowForm' . $i];
                echo "</td><td style='width:80%'>$tempList</td></tr>";
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

        ?>
    </main>
</body>