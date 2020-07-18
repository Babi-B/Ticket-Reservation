<?php
   session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./SelectRegionAndTown.css">
    <script src="./SelectRegionAndTown.js"></script>
</head>

<body>
    <header class="header">
        <marquee behavior="" direction="x">
            <p> Hello <?php echo $_SESSION['user_name']?>, &#128519 Welcome to myeasy Travell</p>
        </marquee>
    </header>


    <nav class="navbar">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Country</a></li>
            <li><a href="">Board</a></li>
            <li><a href="">Select</a></li>
            <li><a href="">About</a></li>
        </ul>

    </nav>

    <div class="begin">
        <div class="colr">
            <p>Journey Details</p>

            <div class="main1">
                <div class="formDiv">
                    <div  class="form">
                        <div class="dropdown">
                            <label for="Region">
                                <p>Region</p>
                            </label>
                            <form class="form" action="SelectRegionAndTown.php" method="GET"> 
                                <select type="submit" id="region" name="region" onchange="changeTown(this.value)">
                                    <option value="">Select your Region</option>
                                    <option value="North-West">North-West</option>
                                    <option value="South-West">South-West</option>
                                    <option value="Center">Center</option>
                                    <option value="Littoral">Littoral</option>
                                </select>
                                <input type="submit" value="choose">
                            </form>
                        </div>
                        <label for="country">
                        </label>
                        <?php
                            $temp = $_GET["region"];
                            switch ($temp) {
                                case 'North-West':
                                    echo'<select id="town" name="town">
                                            <option value="Yaounde">Yaounde</option>
                                            <option value="Douala">Douala</option>
                                            <option value="Ebolowa">Ebolowa</option>
                                            <option value="Baffoussam">Baffoussam</option>
                                            <option value="Bertoua">Bertoua</option>
                                            <option value="Garoua">Garoua</option>
                                            <option value="Maroua">Maroua</option>
                                            <option value="Bamenda">Bamenda</option>
                                            <option value="Ngoundere">Ngoundere</option>
                                        </select>
                                        <a href="../SelectAgencyPage/SelectAgencyPage.html">
                                             <button>Accept</button>
                                        </a>
                                        ';
                                    break;

                                    case 'South-West':
                                    echo'<select id="town" name="town">
                                            <option value="Buea">Buea</option>
                                            <option value="Kumba">Kumba</option>
                                            <option value="Tiko">Tiko</option>
                                            <option value="Mutenguene">Mutenguene</option>
                                        </select>
                                        <a href="../SelectAgencyPage/SelectAgencyPage.html">
                                             <button>Accept</button>
                                        </a>
                                        ';
                                    break;   
                                    
                                    case 'Littoral':
                                    echo'<select id="town" name="town">
                                            <option value="Douala">Douala</option>
                                        </select>
                                        <a href="../SelectAgencyPage/SelectAgencyPage.html">
                                             <button>Accept</button>
                                        </a>
                                        ';
                                    break;   

                                    case 'Center':
                                    echo'<select id="town" name="town">
                                            <option value="Yaounde">Yaounde</option>
                                        </select>
                                        <a href="../SelectAgencyPage/SelectAgencyPage.html">
                                             <button>Accept</button>
                                        </a>
                                        ';
                                    break;   
                                
                                default:
                                    # code...
                                    echo '<p class="defaultText">When you select a region the towns will apear here</p>';
                                    break;
                            }
                        ?>
                    </div>
                </div>
                <div class="TextDiv">
                    <h2>We give you secure and save transactions</h2>
                    <p>Please Select the Region and the town where you want to board a bus from.
                        This will take you to where you will select an agency in that town.
                    </p>
                </div>

            </div>
        </div>
    </div>



</body>

</html>