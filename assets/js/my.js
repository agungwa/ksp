
  var calculation = document.getElementById('money').value;

  //1st way
  var moneyFormatter  = new Intl.NumberFormat();
  document.getElementById('formattedMoney').innerText = moneyFormatter.format(calculation);
  