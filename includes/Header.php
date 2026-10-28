<?php
if (session_status() === PHP_SESSION_NONE) {
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
}


echo"
<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
  <div class=\"container-fluid\">
  
    <a class=\"navbar-brand\" href=\"index.php\">Home</a>
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarScroll\" aria-controls=\"navbarScroll\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarScroll\">
      <ul class=\"navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll\" style=\"--bs-scroll-height: 100px;\">
        <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarScrollingDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
            Projects
            </a>
            <ul class=\"dropdown-menu\" aria-labelledby=\"navbarScrollingDropdown\">
            <li><a class=\"dropdown-item\" href=\"allprojects.php\">All Projects</a></li>
            <li><hr class=\"dropdown-divider\"></li>
            <li><a class=\"dropdown-item\" href=\"allprojects.php#receipt-printer\">Thermal Receipt Printer</a></li>
            <li><a class=\"dropdown-item\" href=\"allprojects.php#professional-projects\">Professional Projects</a></li>
            </ul>
        </li>
<!--        <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarScrollingDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
            Calculators
            </a>
            <ul class=\"dropdown-menu\" aria-labelledby=\"navbarScrollingDropdown\">
            <li><a class=\"dropdown-item\" href=\"allcalculators.php\">All calculators</a></li>
            <li><hr class=\"dropdown-divider\"></li>
            <li><a class=\"dropdown-item\" href=\"expectedValueCalculator.php\">Expected Value</a></li>
            </ul>
-->        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link active\" aria-current=\"page\" href=\"contactMe.php\">Contact Me</a>
        </li>
<!--        <li class=\"nav-item\">
            <a class=\"nav-link active\" aria-current=\"page\" href=\"CV.php\">My CV</a>
-->        </li>
        <li class=\"nav-item\">
            <a class=\"nav-link active\" aria-current=\"page\" href=\"login.php\">Log In</a>
        </li>
        
      </ul><a class=\"navbar-brand\" href=\"index.php\">";
if (date("j") === '1' || date("d") === 21 || date("d") === 31){echo date("l j") . "st " . date("F");}
else if (date("j") === '2' || date("d") === '22'){echo date("l j") . "nd " . date("F");}
else if (date("j") === '3' || date("d") === '23'){echo date("l j") . "rd " . date("F");}
else{echo date("l d") . "th " . date("F");}
echo "</a>
             ";

include __DIR__ . "/index.html";
echo"
    </div>
  </div>
</nav>
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM\" crossorigin=\"anonymous\"></script>
";