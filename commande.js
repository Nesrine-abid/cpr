function showTab1() {
  document.getElementById("tab1").style.display = "block";
  document.getElementById("tab2").style.display = "none";
  document.getElementById("tab3").style.display = "none";
  document.getElementById("tab4").style.display = "none";
}

function showTab2() {
  document.getElementById("tab1").style.display = "none";
  document.getElementById("tab2").style.display = "block";
  document.getElementById("tab3").style.display = "none";
  document.getElementById("tab4").style.display = "none";
}

function showTab3() {
  document.getElementById("tab1").style.display = "none";
  document.getElementById("tab2").style.display = "none";
  document.getElementById("tab3").style.display = "block";
  document.getElementById("tab4").style.display = "none";
}

function showTab4() {
  document.getElementById("tab1").style.display = "none";
  document.getElementById("tab2").style.display = "none";
  document.getElementById("tab3").style.display = "none";
  document.getElementById("tab4").style.display = "block";
}

function Previous() {
  if (document.getElementById("tab2").style.display == "block") {
    showTab1();
  }
  if (document.getElementById("tab3").style.display == "block") {
    showTab2();
  }
  if (document.getElementById("tab4").style.display == "block") {
    showTab3();
  }
}

function next() {
  if (document.getElementById("tab3").style.display == "block") {
    showTab4();
  }
  if (document.getElementById("tab2").style.display == "block") {
    showTab3();
  }
  if (document.getElementById("tab1").style.display == "block") {
    showTab2();
  }
}
