var path = location.pathname
var page = path.split("/").pop()
var fileName = location.pathname.substring(location.pathname.lastIndexOf("/") + 1)
console.log( path )
var dashboard, home, patient, directory,signout
if (path =='/derrick%20IS/docdashboard/') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../docdashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.classList.add("active")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../docdashboard")
    // Select the image element using its ID
    const image = document.getElementById('profpic');
    // Update the image source
    image.src = "../img/avatar128.png";
}
if (path =='/derrick%20IS/docdashboard/patients/') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../docdashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    directory = document.getElementById("directory")
    directory.getAttribute("href");
    directory.setAttribute("href","../directory")
    patient = document.getElementById("patient")
    patient.classList.add("active")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}
if (path =='/derrick%20IS/docdashboard/patients/index.php') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../docdashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    directory = document.getElementById("directory")
    directory.getAttribute("href");
    directory.setAttribute("href","../directory")
    patient = document.getElementById("patient")
    patient.classList.add("active")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}
if (path =='/derrick%20IS/docdashboard/patients/mypatients.php') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../docdashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    directory = document.getElementById("directory")
    directory.getAttribute("href");
    directory.setAttribute("href","../directory")
    patient = document.getElementById("patient")
    patient.classList.add("active")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}
if (path =='/derrick%20IS/docdashboard/patients/patientdetails.php') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../docdashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    directory = document.getElementById("directory")
    directory.getAttribute("href");
    directory.setAttribute("href","../directory")
    patient = document.getElementById("patient")
    patient.classList.add("active")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}
if (path =='/derrick%20IS/docdashboard/directory/') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../docdashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    directory = document.getElementById("directory")
    directory.classList.add("active")
    directory.getAttribute("href");
    directory.setAttribute("href","../directory")
    patient = document.getElementById("patient")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}
if (path =='/derrick%20IS/docdashboard/directory/index.php') {
    home = document.getElementById("home")
    home.getAttribute("href");
    home.setAttribute("href","../../docdashboard")
    dashboard = document.getElementById("dashboard")
    dashboard.getAttribute("href");
    dashboard.setAttribute("href","../")
    directory = document.getElementById("directory")
    directory.classList.add("active")
    directory.getAttribute("href");
    directory.setAttribute("href","../directory")
    patient = document.getElementById("patient")
    patient.getAttribute("href");
    patient.setAttribute("href","../patients")
    signout = document.getElementById("signout")
    signout.getAttribute("href");
    signout.setAttribute("href","../../validation/logout.php")
    signout2 = document.getElementById("signout2")
    signout2.getAttribute("href");
    signout2.setAttribute("href","../../validation/logout.php")
}