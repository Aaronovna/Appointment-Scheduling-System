function generateRandomNumber() {
    $num = "";
    for ($i = 0; $i < 8; $i++) {
      $num .= rand(0, 9);
    }
    return $num;
  }