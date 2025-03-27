/**
 * @author Enzo
 * @author Théo Cornu
*/

// Variable to keep track of whether the checkboxes are expanded or not
var expanded = false;

// Function to show/hide the checkboxes
function showCheckboxes() {
  // Get the element with the id "checkboxes"
  var checkboxes = document.getElementById("checkboxes");
  // Get the element with the id "selectbox"
  var select = document.getElementById("select");
  // If the checkboxes are not expanded
  if (!expanded) {
    select.style.borderBottomLeftRadius = "0px";
    select.style.borderBottomRightRadius = "0px";

    // Make checkboxes visible with animation
    checkboxes.style.display = "block";
    checkboxes.style.height = "0px";
    checkboxes.style.transition = "height 0.3s ease-out";
    var height = checkboxes.scrollHeight + "px";
    checkboxes.style.height = height;
    checkboxes.style.border = "1px solid #ccc";
    checkboxes.style.overflow = "auto";
    
    checkboxes.style.borderBottomLeftRadius = "5px";
    checkboxes.style.borderBottomRightRadius = "5px";
    
    expanded = true;
  }
  // If the checkboxes are already expanded 
  else {
    select.style.borderBottomLeftRadius = "8px";
    select.style.borderBottomRightRadius = "8px";
    // Make checkboxes invisible with animation
    checkboxes.style.height = "0px";
    checkboxes.style.transition = "height 0.3s ease-out";
    setTimeout(function() {
      checkboxes.style.display = "none";
    }, 300);
    expanded = false;
  }
}
