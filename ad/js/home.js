
  function atualizarPagina() {
    location.reload();
  }

  setInterval(atualizarPagina, 60000); 

//mobile
function toggleMenu() {
  const menuMobile = document.getElementById("menu-mobile");

  if (menuMobile.className === "menu-mobile-active") {
    menuMobile.className = "menu-mobile";
  } else {
    menuMobile.className = "menu-mobile-active";
  }
}
//sidebarbutton
function toggleSidebar() {
  const menuSidebar = document.getElementById("button-sidebar");

  if (menuSidebar.className === "button-sidebar-active") {
    menuSidebar.className = "button-sidebar";
  } else {
    menuSidebar.className = "button-sidebar-active";
  }
}

function updateMenuClass() {
  const menuMobile = document.getElementById("menu-mobile");
  const windowWidth = window.innerWidth;

  if (windowWidth > 421) {
    menuMobile.className = "menu-mobile";
  } else {
    menuMobile.className = "menu-mobile-active";
  }
}

function toggleMenu() {
  const menuMobile = document.getElementById("menu-mobile");

  if (menuMobile.className === "menu-mobile-active") {
    menuMobile.className = "menu-mobile";
  } else {
    menuMobile.className = "menu-mobile-active";
  }
}

window.addEventListener("load", updateMenuClass);

window.addEventListener("resize", updateMenuClass);


const homeButton = document.getElementById("homeButton");
const userButton = document.getElementById("userButton");
const patrimonioButton = document.getElementById("patrimonioButton");
const relatorioButton = document.getElementById("relatorioButton");
const contaButton = document.getElementById("contaButton");
const sairButton = document.getElementById("sairButton");


homeButton.addEventListener("click", function () {
  window.location.href = "home";
});

patrimonioButton.addEventListener("click", function () {
  window.location.href = "tabelaPatrimonio";
});

sairButton.addEventListener("click", function () {
  window.location.href = "../php/logout";
});

userButton.addEventListener("click", function () {
  window.location.href = "tabelaUsuario";
});

contaButton.addEventListener("click", function () {
  window.location.href = "conta";
});
relatorioButton.addEventListener("click", function () {
  window.location.href = "https://www.exemplo.com/relatorio";
});
