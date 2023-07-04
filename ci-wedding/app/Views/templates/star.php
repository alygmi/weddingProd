<?php

function rattingStars($stars)
{
  $starRegular = '<i class="far fa-star"></i>';
  $starSolid = '<i class="fa fa-star"></i>';
  $starhalf = '<i class="fa fa-star-half-alt"></i>';
  switch ($stars) {
    case "1":
    case "1.2":
      return $starSolid . $starRegular . $starRegular . $starRegular . $starRegular;
      break;
    case "1.3":
    case "1.4":
    case "1.5":
    case "1.6":
    case "1.7":
      return $starSolid . $starhalf . $starRegular . $starRegular . $starRegular;
      break;
    case "1.8":
    case "1.9":
    case "2":
    case "2.1":
    case "2.2":
      return $starSolid . $starSolid . $starRegular . $starRegular . $starRegular;
      break;
    case "2.3":
    case "2.4":
    case "2.5":
    case "2.6":
    case "2.7":
      return $starSolid . $starSolid . $starhalf . $starRegular . $starRegular;
      break;
    case "2.8":
    case "2.9":
    case "3":
    case "3.1":
    case "3.2":
      return $starSolid . $starSolid . $starSolid . $starRegular . $starRegular;
      break;
    case "3.3":
    case "3.4":
    case "3.5":
    case "3.6":
    case "3.7":
      return $starSolid . $starSolid . $starSolid . $starhalf . $starRegular;
      break;
    case "3.8":
    case "3.9":
    case "4":
    case "4.1":
    case "4.2":
      return $starSolid . $starSolid . $starSolid . $starSolid . $starRegular;
      break;
    case "4.3":
    case "4.4":
    case "4.5":
    case "4.6":
    case "4.7":
      return $starSolid . $starSolid . $starSolid . $starSolid . $starhalf;
      break;
    case "4.8":
    case "4.9":
    case "5":
      return $starSolid . $starSolid . $starSolid . $starSolid . $starSolid;
      break;
    default:
      return $starRegular . $starRegular . $starRegular . $starRegular . $starRegular;
  }
}
