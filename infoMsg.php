<?php

switch ($info) {

  case 0:
    echo "";
    break;

  case 1:
    echo '<div class="alert alert-success" role="alert">Nauja sąskaita sukurta.</div>';
    set_time_limit(2);
    break;

  case 2:
    echo '<div class="alert alert-danger" role="alert">Sąskaitoje yra lėšų! Ištrinti negalima!</div>';
    break;

  case 3:
    echo '<div class="alert alert-success" role="alert">Sąskaita ištrinta.</div>';
    break;

  case 4:
    echo '<div class="alert alert-warning" role="alert">Nepakankamas sąskaitos likutis!</div>';
    break;

  case 5:
    echo '<div class="alert alert-warning" role="alert">Vardą ir pavardę turi sudaryti bent trys simboliai!</div>';
    break;

  case 6:
    echo '<div class="alert alert-warning" role="alert">Asmens kodą turi sudaryti vienuolika skaičių.</div>';
    break;

  case 7:
    echo '<div class="alert alert-warning" role="alert">Vartotojas su tokiu asmens kodu jau įvestas.</div>';
    break;

  case 8:
    echo '<div class="alert alert-warning" role="alert">Įvesta suma turi būti teigiamas sveikasis skaičius.</div>';
    break;

  case 9:
    echo '<div class="alert alert-success" role="alert">Į sąskaitą pridėta lėšų.</div>';
    break;

  case 10:
    echo '<div class="alert alert-success" role="alert">Iš sąskaitos nuimta lėšų.</div>';
    break;

}