<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
  </head>
  <body>
    <div class="modal fade" id="modal-1">
      <!-- search modal, required for all php files -->
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;
            </button>
            <h3 class="modal-title">Search</h3>
          </div>
          <div class="modal-body">
            <form action="searchQuery.php" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="Q" class="search-query
                    form-control"
                    placeholder="Search HotSpot Events" >
                    <span class="input-group-btn">
                      <button class="btn btn-info" type="input">
                        <span class="glyphicon glyphicon-search">
                        </span>
                      </button>
                    </span>
                  </div>
            	  </div>
            </form>
            <hr/>
            <form action="DDlogic.php" method="post">
              <div class="form-group">
                <select class="form-control" name="event">
                  <option selected="selected" disabled="disabled">
                    Event Type</option>
                  <option value="Club">Club/Bar</option>
                  <option value="Street">Street Party</option>
                  <option value="House">House Party</option>
                  <option value="Fundraiser">Fundraiser</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="age">
                  <option selected="selected" disabled="disabled">
                    Age Group</option>
                  <option value="12">Teens</option>
                  <option value="10">College</option>
                  <option value="11">Parents</option>
                  <option value="2">20's</option>
                  <option value="3">30's</option>
                  <option value="4">40's</option>
                  <option value="5">50's</option>
                  <option value="6">60's</option>
                  <option value="7">70's</option>
                  <option value="8">80's</option>
                  <option value="9">90's</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="food">
                  <option selected="selected" disabled="disabled">
                    Food</option>
                  <option value="AFG">Afghan</option>
                  <option value="AFR">African</option>
                  <option value="AME">American</option>
                  <option value="ARA">Arabian</option>
                  <option value="ARG">Argentine</option>
                  <option value="ARM">Armenian</option>
                  <option value="ASI">Asian</option>
                  <option value="AU">Australian</option>
                  <option value="AUS">Austrian</option>
                  <option value="BAN">Bangladeshi</option>
                  <option value="BAS">Basque</option>
                  <option value="BBQ">Barbeque</option>
                  <option value="BEL">Belgian</option>
                  <option value="BRA">Brasseries</option>
                  <option value="BRI">British</option>
                  <option value="BRM">Burmese</option>
                  <option value="BRZ">Brazilian</option>
                  <option value="BUF">Buffet</option>
                  <option value="BUR">Burgers</option>
                  <option value="CAJ">Cajun</option>
                  <option value="CAL">Calabrian</option>
                  <option value="CAM">Cambodian</option>
                  <option value="CAN">Cantonese</option>
                  <option value="CAR">Caribbean</option>
                  <option value="CAT">Catalan</option>
                  <option value="CHI">Chicken</option>
                  <option value="CHN">Chinese</option>
                  <option value="COL">Colombian</option>
                  <option value="COM">Comfort Food</option>
                  <option value="CRE">Creole</option>
                  <option value="CRP">Crepes</option>
                  <option value="CUB">Cuban</option>
                  <option value="CZE">Czech</option>
                  <option value="DEL">Deli</option>
                  <option value="DIM">Dim Sum</option>
                  <option value="DOM">Dominican</option>
                  <option value="EGY">Egyptian</option>
                  <option value="FAL">Falafel</option>
                  <option value="FIL">Filipino</option>
                  <option value="FIS">Fish</option>
                  <option value="FON">Fondue</option>
                  <option value="FRE">French</option>
                  <option value="GAS">Gastropub</option>
                  <option value="GER">German</option>
                  <option value="GLE">Gluten-free</option>
                  <option value="GRE">Greek</option>
                  <option value="HAI">Haitian</option>
                  <option value="HAL">Halal</option>
                  <option value="HAW">Hawaiian</option>
                  <option value="HIM">Himalayan</option>
                  <option value="HUN">Hungarian</option>
                  <option value="IBE">Iberian</option>
                  <option value="IND">Indian</option>
                  <option value="IRA">Iranian</option>
                  <option value="IRI">Irish</option>
                  <option value="ITA">Italian</option>
                  <option value="JAP">Japanese</option>
                  <option value="KOR">Korean</option>
                  <option value="KOS">Kosher</option>
                  <option value="LAO">Laotian</option>
                  <option value="LAT">Latin American</option>
                  <option value="LEB">Lebanese</option>
                  <option value="MAL">Malaysian</option>
                  <option value="MED">Mediterranean</option>
                  <option value="MEX">Mexican</option>
                  <option value="MID">Middle East</option>
                  <option value="MON">Mongolian</option>
                  <option value="MOR">Moroccan</option>
                  <option value="NEP">Nepalese</option>
                  <option value="PAK">Pakistani</option>
                  <option value="PER">Persian</option>
                  <option value="PIZ">Pizza</option>
                  <option value="POL">Polish</option>
                  <option value="PRV">Peruvian</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="drink">
                  <option selected="selected" disabled="disabled">
                    Drinks</option>
                  <option value="A">Alcoholic
                    Beverages</option>
                  <option value="J">Juice</option>
                  <option value="S">Soda</option>
                  <option value="T">Tea</option>
                  <option value="W">Water</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="attire">
                  <option selected="selected" disabled="disabled">Attire</option>
                  <option value="B">Black Tie Event</option>
                  <option value="BL">All Black</option>
                  <option value="WH">All White</option>
                  <option value="BW">Beach Wear</option>
                  <option value="C">Casual</option>
                  <option value="Suit/Tie">Suit/Tie</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
              <button type="hidden" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Container -->

    <!-- Begin Navbar -->
    <ul class="nav nav-tabs nav-justified">
      <li role="presentation" data-toggle="modal" data-target="#modal-1">
        <a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true">
        </span></a>
      </li>
      <li role="presentation"><a href="fire.php"><span class="glyphicon
      glyphicon-fire" aria-hidden="true"></span></a></li>
      <li role="presentation"><a href="message.php"><span class="glyphicon
      glyphicon-comment" aria-hidden="true"></span></a></li>
      <li role="presentation">
        <a href="myprofile.php">
          <span class="glyphicon glyphicon-user" aria-hidden="true">
          </span>
        </a>
      </li>
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
