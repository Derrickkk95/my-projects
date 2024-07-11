var path = location.pathname
var page = path.split("/").pop()
var fileName = location.pathname.substring(location.pathname.lastIndexOf("/") + 1)
console.log( path )
var dashboard, home, doctor, nurse, patient, technician, signout
if (path =='/derrick%20IS/admindashboard/') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../admindashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.classList.add("active")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../admindashboard")
    // Select the image element using its ID
    const image = document.getElementById('profpic');
    // Update the image source
    image.src = "../img/avatar128.png";
}
if (path =='/derrick%20IS/admindashboard/doctors/') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../admindashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    doctor = document.getElementById("doc")
    doctor.classList.add("active")
    doctor.getAttribute("href");
    doctor.setAttribute("href","../doctors")
    nurse = document.getElementById("nurse")
    nurse.getAttribute("href");
    nurse.setAttribute("href","../nurses")
    patient = document.getElementById("patient")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    technician = document.getElementById("tech")
    technician.getAttribute("href");
    technician.setAttribute("href","../technicians")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}
if (path =='/derrick%20IS/admindashboard/nurses/') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../admindashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    doctor = document.getElementById("doc")
    doctor.getAttribute("href");
    doctor.setAttribute("href","../doctors")
    nurse = document.getElementById("nurse")
    nurse.classList.add("active")
    nurse.getAttribute("href");
    nurse.setAttribute("href","../nurses")
    patient = document.getElementById("patient")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    technician = document.getElementById("tech")
    technician.getAttribute("href");
    technician.setAttribute("href","../technicians")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}
if (path =='/derrick%20IS/admindashboard/patients/') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../admindashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    doctor = document.getElementById("doc")
    doctor.getAttribute("href");
    doctor.setAttribute("href","../doctors")
    nurse = document.getElementById("nurse")
    nurse.getAttribute("href");
    nurse.setAttribute("href","../nurses")
    patient = document.getElementById("patient")
    patient.classList.add("active")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    technician = document.getElementById("tech")
    technician.getAttribute("href");
    technician.setAttribute("href","../technicians")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}
if (path =='/derrick%20IS/admindashboard/technicians/') {
  home = document.getElementById("home")
  home.getAttribute("href");
  home.setAttribute("href","../../admindashboard")
  dashboard = document.getElementById("dashboard")
  dashboard.getAttribute("href");
  dashboard.setAttribute("href","../")
  doctor = document.getElementById("doc")
  doctor.getAttribute("href");
  doctor.setAttribute("href","../doctors")
  nurse = document.getElementById("nurse")
  nurse.getAttribute("href");
  nurse.setAttribute("href","../nurses")
  patient = document.getElementById("patient")
  patient.getAttribute("href");
  patient.setAttribute("href","../patients")
  technician = document.getElementById("tech")
  technician.classList.add("active")
  technician.getAttribute("href");
  technician.setAttribute("href","../technicians")
  signout = document.getElementById("signout")
  signout.getAttribute("href");
  signout.setAttribute("href","../../validation/logout.php")
  signout2 = document.getElementById("signout2")
  signout2.getAttribute("href");
  signout2.setAttribute("href","../../validation/logout.php")
}

function defaultPassword(){
    // Get the checkbox
    var checkBox = document.getElementById("gridCheck");
    var pswd = document.getElementById('inputPassword');
    var entry = document.getElementById('pswdentry')
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        entry.style.display = "none";
        // ✅ Set required attribute
        pswd.removeAttribute('required');
      } else {
        // ✅ Remove required attribute
        pswd.setAttribute('required', '');
        entry.removeAttribute('style');
      }
  }