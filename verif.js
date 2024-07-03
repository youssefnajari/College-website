function verif() {
  n = document.getElementById("n").value;
  fn = document.getElementById("fn").value;
  u = document.getElementById("u").value;
  psw = document.getElementById("psw").value;
  cpsw = document.getElementById("cpsw").value;
  if (
    verif1(n, "A", "Z", "A", "Z") == false ||
    verif1(fn, "A", "Z", "A", "Z") == false ||
    verif1(u, "A", "Z", "0", "9") == false ||
    u.indexOf(" ") != -1 ||
    psw.length < 8 ||
    cpsw != psw
  ) {
    document.getElementById("aff").style.color = "red";
    document.getElementById("aff").innerHTML = "Invalid answers";
    return false;
  } else {
    document.getElementById("aff").innerHTML = "";
    return true;
  }
}
function verifn() {
  n = document.getElementById("n").value;
  if (verif1(n, "A", "Z", "A", "Z") == false) {
    document.getElementById("name").style.color = "red";
    document.getElementById("name").innerHTML = "Invalid Name";
    return false;
  } else {
    document.getElementById("name").innerHTML = "";
  }
}
function veriffn() {
  fn = document.getElementById("fn").value;
  if (verif1(fn, "A", "Z", "A", "Z") == false) {
    document.getElementById("fname").style.color = "red";
    document.getElementById("fname").innerHTML = "Invalid Family Name";
    return false;
  } else {
    document.getElementById("fname").innerHTML = "";
  }
}
function verifu() {
  u = document.getElementById("u").value;
  if (verif1(u, "A", "Z", "0", "9") == false || u.indexOf(" ") != -1) {
    document.getElementById("us").style.color = "red";
    document.getElementById("us").innerHTML = "Invalid Username";
    return false;
  } else {
    document.getElementById("us").innerHTML = "";
  }
}
function verifp() {
  psw = document.getElementById("psw").value;
  if (psw.length < 8) {
    document.getElementById("pswr").style.color = "red";
    document.getElementById("pswr").innerHTML = "Too short Passowrd";
    return false;
  } else {
    document.getElementById("pswr").innerHTML = "";
  }
}
function verifcp() {
  psw = document.getElementById("psw").value;
  cpsw = document.getElementById("cpsw").value;
  if (cpsw != psw) {
    document.getElementById("cpswr").style.color = "red";
    document.getElementById("cpswr").innerHTML = "Password is not matching";
    return false;
  } else {
    document.getElementById("cpswr").innerHTML = "";
  }
}
function verif1(ch, a, b, d, f) {
  ch = ch.toUpperCase();
  var i = 0;
  v = true;
  while (
    ((ch.charAt(i) >= a && ch.charAt(i) <= b) ||
      (ch.charAt(i) >= d && ch.charAt(i) <= f) ||
      ch.charAt(i) == " ") &&
    i < ch.length - 1 &&
    v
  ) {
    if (ch.charAt(i) == " " && ch.charAt(i + 1) == " ") {
      v = false;
    }
    i++;
  }
  return (
    i == ch.length - 1 &&
    v &&
    ch.charAt(0) != " " &&
    ch.charAt(ch.length - 1) != " " &&
    ((ch.charAt(ch.length - 1) >= a && ch.charAt(ch.length - 1) <= b) ||
      (ch.charAt(ch.length - 1) >= d && ch.charAt(ch.length - 1) <= f))
  );
}
function valid() {
  dateTimeString = document.getElementById("daaate").value;
  const dateTimeRegex = /^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/;
  if (dateTimeRegex.test(dateTimeString)) {
    const parsedDate = new Date(dateTimeString);
    document.getElementById("aabb").style.color = "red";
    document.getElementById("aabb").innerHTML =
      "Invalid DateTime (Follow the format exactly)";
    return !isNaN(parsedDate.getTime());
  }
  document.getElementById("aabb").innerHTML = "";
  return false;
}
