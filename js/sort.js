var name_sort=document.getElementById('title_name');
function sortUsers(){
  var list, i, switching, b, shouldSwitch;
  list = document.querySelector(".table_users");
  switching = true;
  while (switching) {
    switching = false;
    b = list.querySelectorAll(".user");
    
    for (i = 0; i < (b.length - 1); i++) {
      shouldSwitch = false;
      if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }console.log(i);
    }
    if (shouldSwitch) {
      b[i].parentNode.insertBefore(b[i + 1], b[i]);
      switching = true;
    }
  }
}
name_sort.onclick=sortUsers;