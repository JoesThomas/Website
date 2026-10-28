<?php
include('includes/Header.php');
echo"

<head>
    <link href=\"https://joe-thomas.co.uk/images/favicon.ico\">
  <title>Joe Thomas</title>
</head>
<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">

<div id=\"carouselExampleCaptions\" style=\"position:relative;z-index:0\" class=\"carousel slide\" data-bs-ride=\"carousel\">
  <div class=\"carousel-indicators\">
    <button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"Slide 1\"></button>
<button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"1\" aria-label=\"Slide 2\"></button>
    <button type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide-to=\"2\" aria-label=\"Slide 3\"></button>
  </div>
  <div class=\"carousel-inner\">
    <div class=\"carousel-item active\">
      <img src=\"images/codeimage.jpg\" height='94%' class=\"d-block w-100\" alt=\"...\" style='object-fit: cover'>
      <div class=\"carousel-caption d-none d-md-block\">
        <h5>Welcome to my Website</h5>
        
      </div>
    </div>
    <div class=\"carousel-item\">
      <img src=\"images/meetinglaptops.jpg\" height='94%' class=\"d-block w-100\" alt=\"...\" style='object-fit: cover'>
<!--      <div class=\"carousel-caption d-none d-md-block\">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
-->    </div>
    <div class=\"carousel-item\">
      <img src=\"images/circuitboard.jpg\" height='94%' class=\"d-block w-100\"  alt=\"...\" style='object-fit: cover'>
<!--      <div class=\"carousel-caption d-none d-md-block\">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
-->    </div>
  </div>
  <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide=\"prev\">
    <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
    <span class=\"visually-hidden\">Previous</span>
  </button>
  <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide=\"next\">
    <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
    <span class=\"visually-hidden\">Next</span>
  </button>



</div>

"


;