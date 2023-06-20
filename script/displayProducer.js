

// Save the scroll position when the page is unloaded
window.addEventListener("beforeunload", function () {
  sessionStorage.setItem("scrollPosition", window.scrollY);
});

// Restore the scroll position when the page is loaded
window.addEventListener("load", function () {
  var scrollPosition = sessionStorage.getItem("scrollPosition");
  if (scrollPosition !== null) {
    window.scrollTo(0, scrollPosition);
    sessionStorage.removeItem("scrollPosition");
  }
});
const modalWrapper = document.querySelector(".modal-wrapper");
document.querySelector(".add-customer-link").addEventListener("click", e => {
  e.preventDefault();
  e.stopPropagation();
 
  modalWrapper.style.display = "flex";  
})

document.querySelector(".close").addEventListener("click", e=> {
  modalWrapper.style.display = "none";  
})

/*
//reload the page every 5 second to refresh the data
var intervalTime = 5000;
function refreshPage() {
  window.location.reload();
}

// Set the interval to execute the function
setInterval(refreshPage, intervalTime);
*/
