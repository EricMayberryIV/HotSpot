<?php
  session_start(); ?><!-- required for all php files within the application -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">

    <!-- CSS links go here -->
    <link rel="stylesheet" type="text/css" href="css/list.css">
      <!-- home.css copied from tiles.css -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- End CSS links -->

    <title>Events List</title>
  </head>

  <body>
    <!-- Begin container -->
    <div class="container">
      <!-- Begin row -->
      <div class="row">
        <?php
        // Create connection
        include("connection.php");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "select E_TITLE, DATE_FORMAT(E_DATE,'%c/%e/%y'),
        TIME_FORMAT(E_TIME_START,'%h:%i %p'), E_DESC, E_PRICE
        from EVENT group by E_DATE order by E_TIME_START;" ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<a href=\"#\" class=\"item\"><div class=\"well\"><h3>".
            $row["E_TITLE"].
            "</h3><p class=\"text-justify\">".
            $row["E_DESC"].
            "</p><p class=\"small\">".
            $row["DATE_FORMAT(E_DATE,'%c/%e/%y')"].
            " | ".
            $row["TIME_FORMAT(E_TIME_START,'%h:%i %p')"].
            " | &#36;".
            $row["E_PRICE"].
            "</p></div></a>";
          }
        } else {
          echo "0 results";
        }
        $conn->close();
        ?>
      </div>
      <!-- End row -->
      <div class="modal fade" id="modal-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;
              </button>
              <h3 class="modal-title">Search</h3>
            </div>
            <div class="modal-body"><!-- Search text input form -->
              <div class="input-group">
                <input type="text" class="  search-query form-control"
                placeholder="Search HotSpot Events" />
                <span class="input-group-btn">
                  <button class="btn btn-info" type="button">
                    <span class=" glyphicon glyphicon-search">
                    </span>
                  </button>
                </span>
              </div>
            </div> <!-- End Search text input form -->
            <hr/>
            <div class="form-group">
              <select class="form-control" id="sel1">
                <option>Event Type</option>
                <option>Club/Bar</option>
                <option>Street Party</option>
                <option>House Party</option>
                <option>Fundraiser</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="sel2">
                <option>Age Group</option>
                <option>Teens</option>
                <option>College</option>
                <option>Parents</option>
                <option>20's</option>
                <option>30's</option>
                <option>40's</option>
                <option>50's</option>
                <option>60's +</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="sel3">
                <option>Food</option>
                <option>Afghan</option>
                <option>African</option>
                <option>American</option>
                <option>Arabian</option>
                <option>Argentine</option>
                <option>Armenian</option>
                <option>Asian</option>
                <option>Australian</option>
                <option>Austrian</option>
                <option>Bangladeshi</option>
                <option>Basque</option>
                <option>Barbeque</option>
                <option>Belgian</option>
                <option>Brasseries</option>
                <option>British</option>
                <option>Burmese</option>
                <option>Brazilian</option>
                <option>Buffet</option>
                <option>Burgers</option>
                <option>Cajun</option>
                <option>Calabrian</option>
                <option>Cambodian</option>
                <option>Cantonese</option>
                <option>Caribbean</option>
                <option>Catalan</option>
                <option>Chicken</option>
                <option>Chinese</option>
                <option>Colombian</option>
                <option>Comfort Food</option>
                <option>Creole</option>
                <option>Crepes</option>
                <option>Cuban</option>
                <option>Czech</option>
                <option>Deli</option>
                <option>Dim Sum</option>
                <option>Dominican</option>
                <option>Egyptian</option>
                <option>Falafel</option>
                <option>Filipino</option>
                <option>Fish</option>
                <option>Fondue</option>
                <option>French</option>
                <option>Gastropub</option>
                <option>German</option>
                <option>Gluten-free</option>
                <option>Greek</option>
                <option>Haitian</option>
                <option>Halal</option>
                <option>Hawaiian</option>
                <option>Himalayan</option>
                <option>Hungarian</option>
                <option>Iberian</option>
                <option>Indian</option>
                <option>Iranian</option>
                <option>Irish</option>
                <option>Italian</option>
                <option>Japanese</option>
                <option>Korean</option>
                <option>Kosher</option>
                <option>Laotian</option>
                <option>Latin American</option>
                <option>Lebanese</option>
                <option>Malaysian</option>
                <option>Mediterranean</option>
                <option>Mexican</option>
                <option>Middle East</option>
                <option>Mongolian</option>
                <option>Moroccan</option>
                <option>Nepalese</option>
                <option>Pakistani</option>
                <option>Persian</option>
                <option>Pizza</option>
                <option>Polish</option>
                <option>Peruvian</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="sel4">
                <option>Drinks</option>
                <option>Alcoholic Beverages</option>
                <option>Juice</option>
                <option>Soda</option>
                <option>Tea</option>
                <option>Water</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="sel5">
                <option>Attire</option>
                <option>Black Tie Event</option>
                <option>All Black</option>
                <option>All White</option>
                <option>Beach Wear</option>
                <option>Casual</option>
                <option>Suit/Tie</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
            <a href="" class="btn btn-info">Search</a>
          </div>
        </div>
      </div><!-- End Search modal -->
    </div>
    <!-- End Container -->

    <!-- Begin Navbar -->
    <ul class="nav nav-tabs nav-justified">
      <li role="presentation" data-toggle="modal" data-target="#modal-1">
        <a href="#"><span class="glyphicon glyphicon-search"
          aria-hidden="true">
        </span></a>
      </li>
      <li role="presentation"><a href="fire.html"><span class="glyphicon
      glyphicon-fire" aria-hidden="true"></span></a></li>
      <li role="presentation"><a href="message.html"><span class="glyphicon
      glyphicon-comment" aria-hidden="true"></span></a></li>
      <li role="presentation"><a href="myprofile.html"><span class="glyphicon
      glyphicon-user" aria-hidden="true"></span></a></li>
    </ul>
    <!-- End Navbar -->

    <!-- The body of the page goes above this line, only scripts should
         go below this line. -->

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- End JS -->
  </body>
</html>
