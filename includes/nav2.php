<?php declare(strict_types=1);
$queryset = "SELECT * FROM settings";
$set = ($dbCon, $queryset);

$queryAllProf = "SELECT ID, name FROM profiles WHERE name <> 'keytracker'";
$rsProf = ($dbCon, $queryAllProf);


    echo"
<nav id=\"navtop\" class=\"navbar navbar-default navbar-fixed-top\">
    <div class=\"container\">
        <img href=\"../sale/tables.php\" id=\"ktlogo\" src=\"../images/logokt.png\" alt=\"Keytracker\">
          <span id=\"logout\">
            <a href=\"../logout.php\"><button id=\"logoutright\" style=\"background: #E6E6E6;\" class=\"btn\"><i class=\"fa fa-sign-out fa fa-2x\" style=\"color: #de615e;\" aria-hidden=\"true\"></i></button></a>
          </span>
        <div id=\"dl-menu\" class=\"dl-menuwrapper\">
            <button class=\"dl-trigger\">Open Menu</button>
            <ul class=\"dl-menu\">
                <li>
                    <a href=\"tables.php\">Home</a>
                </li>
                <li>
                    <a href=\"ticket.php\">All Tickets</a>
                </li>
                <li>
                    <a href=\"ecos.php\">All ECOS Customers</a>
                </li>
                <li>
                    <a href=\"#\">CRM</a>
                    <ul class=\"dl-submenu\">";
                        if ($addCustomer !=0){
                            echo "<li><a href=\"crmcompany.php\">Add Company Lead</a></li>";
                        }
                        if ($viewCustomer !=0){
                            echo "<li><a href=\"leads.php\">All Leads</a></li>";
                        }
                        echo"
                    </ul>
                </li>
                <li>
                    <a href=\"#\">Customers</a>
                    <ul class=\"dl-submenu\">
                        <li>
                            <a href=\"#\">ECOS</a>
                            <ul class=\"dl-submenu\">";
                                if ($viewCustomer !==0) {
                                    echo "<li><a href=\"ecos.php\">All</a></li>";
                                }
                                if ($addCustomer !==0) {
                                    echo "<li><a href=\"steps.php\">Add Customer</a></li>";
                                }
                                if ($viewCustomer !==0) {
                                    echo "<li><a href=\"completedorders.php\">Completed Orders</a></li>";
                                }
                                if ($viewCustomer !==0) {
                                    echo "<li><a href=\"outstandingorders.php\">Outstanding Orders</a></li>";
                                }
echo"
                            </ul>
                        </li>
                        <!--<li>
                            <a href=\"#\">Children</a>
                            <ul class=\"dl-submenu\">
                                <li><a href=\"#\">Boys</a></li>
                                <li><a href=\"#\">Girls</a></li>
                            </ul>
                        </li>-->
                    </ul>
                </li>
                <li>
                    <a href=\"#\">Support</a>
                    <ul class=\"dl-submenu\">";
                        if ($addTicket !=0){
                            echo "<li><a href=\"addTicket.php\">Add Support Ticket</a></li>";
                        }
                        if ($viewTicket !=0){
                            echo "<li><a href=\"ticket.php\">Support Tickets</a></li>";
                        }
                        if ($viewTicket !=0){
                            echo "<li><a href=\"sitevisits.php\">Site Visits</a></li>";
                        }
                        if ($viewTicket !=0){
                            echo "<li><a href=\"viewmap.php\">Site Locations</a></li>";
                        }
echo"
                    </ul>
                </li>
                <li>
                    <a href=\"#\">Marketing</a>
                    <ul class=\"dl-submenu\">";
                        if ($viewfeedback !=0){
                            echo "<li><a href=\"satisfactionresults.php\">View Customer Satisfaction Results</a></li>";
                        }
                        if ($viewfeedback !=0){
                            echo "<li><a href=\"feedbackresults.php\">View Support Feedback Results</a></li>";
                        }
echo"
                    </ul>
                </li>
                <li>
                    <a href=\"#\">Users</a>
                    <ul class=\"dl-submenu\">
                        <li>
                            <a href=\"#\">Users</a>
                            <ul class=\"dl-submenu\">";
                                if ($addUser !=0){
                                    echo "<li><a href=\"adduser.php\">Add Users</a></li>";
                                }
                                if ($viewuser !=0) {
                                    echo "<li><a href=\"users.php\">All Users</a></li>";
                                }
echo"
                            </ul>
                        </li>
                        <li>
                            <a href=\"#\">User Groups</a>
                            <ul class=\"dl-submenu\">";
                                if ($addUsergroup !=0){
                                    echo "<li><a href=\"addusergroups.php\">Add User Groups</a></li>";
                                }
                                //  if ($viewUserGroup !=0){
                                //      echo "<li><a href=\"allusergroups.php\">All User Groups</a></li>";
                                // }
echo"
                            </ul>
                        </li>
                    </ul>
                </li>
                     <a href=\"#\">Jewelry &amp; Watches</a>
                     <ul class=\"dl-submenu\">
                         <li><a href=\"#\">Fine Jewelry</a></li>
                         <li><a href=\"#\">Fashion Jewelry</a></li>
                         <li><a href=\"#\">Watches</a></li>
                         <li>
                             <a href=\"#\">Wedding Jewelry</a>
                             <ul class=\"dl-submenu\">
                                 <li><a href=\"#\">Engagement Rings</a></li>
                                 <li><a href=\"#\">Bridal Sets</a></li>
                                 <li><a href=\"#\">Women's Wedding Bands</a></li>
                                 <li><a href=\"#\">Men's Wedding Bands</a></li>
                             </ul>
                         </li>
                     </ul>
                 </li> -->
            </ul>
        </div><!-- /dl-menuwrapper -->
    </div>
</nav>

</body>";

