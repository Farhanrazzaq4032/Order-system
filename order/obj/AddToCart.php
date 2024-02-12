<?php
class addToCart extends DB
{
  private $cartCart;
  private $tax = 17;
  private $discont = 10;
  private $subTotal = 0, $totalTax = 0, $totalDescont = 0, $grandTotal = 0;
  private $clc;

  function add($proCode, $qty = "1")
  {
    $query = "SELECT * FROM product WHERE pro_code = '$proCode'";
    $result = $this->select($query, true);
    $proName = $result["name"];
    $proName = $result["name"];
    $proPrice = $result["price"];
    $proDesr = $result["desr"];
    $pro_code = $result["pro_code"];
    $proQty = $qty;
    $this->cartCart = array(
      $pro_code => array(
        'proName' => $proName,
        'proPrice' => $proPrice,
        'proQty' => $proQty,
        'proDesr' => $proDesr,
        'pro_code' => $pro_code,
      )
    );
    $this->cart($pro_code);
  }

  function cart($pro_code)
  {
    if (empty($_SESSION["carts"])) {
      $_SESSION["carts"] = $this->cartCart;
      set_flash("Product Added");
      redirect("");
    } else {
      $arrayKey = array_keys($_SESSION["carts"]);
      if (in_array($pro_code, $arrayKey)) {
        set_flash("Product Already Added");
        redirect("");
      } else {
        $_SESSION["carts"] = array_merge($_SESSION["carts"], $this->cartCart);
        set_flash("Product Added");
        redirect("");
      }
    }
  }

  function setClc($subTotal)
  {
    $this->subTotal = $subTotal;
    $this->totalTax = round(($this->subTotal * $this->tax) / 100);
    $this->totalDescont = round(($this->subTotal * $this->discont) / 100);
    $this->grandTotal = round($this->subTotal - $this->totalDescont + $this->totalTax);
    $this->clc = array(
      'subTotal' => $this->subTotal,
      'totalTax' => $this->totalTax,
      'totalDiscont' => $this->totalDescont,
      'grandTotal' => $this->grandTotal
    );
  }
  function Clc($subTotal)
  {
    $this->setClc($subTotal);
    return $this->clc;
  }
}
