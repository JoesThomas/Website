<?php

echo

"<nav class=\"navbar navbar-default\" role=\"navigation\">
<div class=\"container-fluid\">
<!-- Brand and toggle get grouped for better mobile display -->
<div class=\"navbar-header\">
<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
<span class=\"sr-only\"></span>
<span class=\"icon-bar\"></span>
<span class=\"icon-bar\"></span>
<span class=\"icon-bar\"></span>
</button>
<a class=\"navbar-brand\" >Keytracker Management</a>
</div>

<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
<ul class=\"nav navbar-nav\">
<li><a href=\"dash.php\">Dashboard</a></li>
<li><a href=\"salesRep.php\">Add Sales rep</a></li>
<li><a href=\"input.php\">Add Sale</a></li>
<li><a href=\"leader.php\">Leaderboard</a></li>
<li><a href=\"sales.php\">All Sales</a></li>
<li><a href=\"audit.php\">Sales Audit trail</a></li>
</ul>
<ul class=\"nav navbar-nav navbar-right\">
<li class=\"dropdown\">
<a href=\"logout.php\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Logout</a>
</li>
<li class=\"dropdown\">
<a href=\"tables.php\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Return to Main Menu</a>
</li>
<ul class=\"dropdown-menu\" role=\"menu\">
</ul>
</li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>"