const adminxmlhttp = new XMLHttpRequest()
const docxmlhttp = new XMLHttpRequest()
const nursexmlhttp = new XMLHttpRequest()
const techxmlhttp = new XMLHttpRequest()


// adminxmlhttp.onload = function() {
//     document.getElementById("admin").innerHTML = this.responseText;
// }

adminxmlhttp.onload = function() {
    // What to do when the response is ready
    var admin= JSON.parse(adminxmlhttp.responseText)
    console.log(admin[0])
  }
adminxmlhttp.open("GET", "directory.php?q=admin", true);
adminxmlhttp.send(); 