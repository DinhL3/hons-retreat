document.addEventListener('DOMContentLoaded', function () {
  // Get the radio buttons
  var radios = document.getElementsByName('package');

  // Get the elements that display the package description and price
  var descriptionElement = document.getElementById(
    'order__package-info__description'
  );
  var priceElement = document.getElementById('order__package-info__price');

  // Get the number inputs for adults and children
  var adultsInput = document.getElementById('adults');
  var childrenInput = document.getElementById('children');

  // Get the elements that display the summary
  var numAdultElement = document.getElementById('num-adult');
  var pricePerAdultElement = document.getElementById('price-per-adult');
  var numChildrenElement = document.getElementById('num-children');
  var pricePerChildElement = document.getElementById('price-per-child');
  var totalBeforeVatElement = document.getElementById('price-total-before-vat');
  var vatAmountElement = document.getElementById('vat-amount');
  var totalAfterVatElement = document.getElementById('price-total-after-vat');

  // Function to update the package description and price
  function updatePackageInfo(packageName) {
    // Find the package data in the data array
    var packageData = data.find(function (holiday) {
      return holiday.package === packageName;
    });

    // Update the package description and price
    if (packageData) {
      descriptionElement.textContent = packageData.packagedetails;
      priceElement.textContent = Math.round(packageData.cost); // Remove decimal and convert to number
      pricePerAdultElement.textContent = Math.round(packageData.cost); // Remove decimal and convert to number
    }
  }

  // Function to calculate the total price
  function calculateTotal() {
    var numAdults = Number(adultsInput.value);
    var numChildren = Number(childrenInput.value);
    var pricePerPerson = Number(priceElement.textContent);
    var pricePerPerson25percentreduced = pricePerPerson * 0.75;

    var totalBeforeVat =
      numAdults * pricePerPerson + numChildren * pricePerPerson25percentreduced;
    var vatAmount = totalBeforeVat * 0.2;
    var totalAfterVat = totalBeforeVat + vatAmount;

    numAdultElement.textContent = numAdults;
    numChildrenElement.textContent = numChildren;
    pricePerChildElement.textContent = Math.round(
      pricePerPerson25percentreduced
    );
    totalBeforeVatElement.textContent = Math.round(totalBeforeVat);
    vatAmountElement.textContent = Math.round(vatAmount);
    totalAfterVatElement.textContent = Math.round(totalAfterVat);
  }

  // Add a change event listener to each radio button
  for (var i = 0; i < radios.length; i++) {
    radios[i].addEventListener('change', function () {
      updatePackageInfo(this.value);
      calculateTotal();
    });
  }

  // Add a change event listener to the number inputs for adults and children
  adultsInput.addEventListener('change', calculateTotal);
  childrenInput.addEventListener('change', calculateTotal);

  // Update the package info initially based on the checked radio button
  updatePackageInfo(
    document.querySelector('input[name="package"]:checked').value
  );

  // Calculate the total price initially
  calculateTotal();
});
