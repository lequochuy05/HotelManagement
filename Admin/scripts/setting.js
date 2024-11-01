let general_data, contacts_data;

let general_s_form = document.getElementById("general_settings_form");
let site_title_inp = document.getElementById("site_title_inp");
let site_about_inp = document.getElementById("site_about_inp");

let contact_s_form = document.getElementById("contact_settings_form");

// General
function get_general() {
  let site_title = document.getElementById("site_title");
  let site_about = document.getElementById("site_about");

  let shutdown_toggle = document.getElementById("shutdown-toggle");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/settings_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    general_data = JSON.parse(this.responseText);

    site_title.innerText = general_data.site_title;
    site_about.innerText = general_data.site_about;

    site_title_inp.value = general_data.site_title;
    site_about_inp.value = general_data.site_about;

    if (general_data.shutdown == 0) {
      shutdown_toggle.checked = false;
      shutdown_toggle.value = 0;
    } else {
      shutdown_toggle.checked = true;
      shutdown_toggle.value = 1;
    }
  };

  xhr.send("get_general");
}

general_s_form.addEventListener("submit", function (e) {
  e.preventDefault();
  upd_general(site_title_inp.value, site_about_inp.value);
});

function upd_general(site_title_val, site_about_val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/settings_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    var myModal = document.getElementById("general-settings");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 1) {
      alert("success", "Changes saved!");
      get_general();
    } else {
      alert("error", "No changes made!");
    }
  };

  xhr.send(
    "site_title=" +
      site_title_val +
      "&site_about=" +
      site_about_val +
      "&upd_general"
  );
}

//shutdown
function upd_shutdown(val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/settings_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.responseText == 1 && general_data.shutdown == 0) {
      alert("success", "Site has been Shutdown!");
      get_general();
    } else {
      alert("success", "Shutdown mode off!");
    }
  };

  xhr.send("upd_shutdown=" + val);
}

//contact
function get_contacts() {
  let contacts_p_id = [
    "address",
    "gmap",
    "pn1",
    "pn2",
    "email",
    "fb",
    "ig",
    "tw",
    "tt",
  ];
  let iframe = document.getElementById("iframe");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/settings_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    contacts_data = JSON.parse(this.responseText);
    contacts_data = Object.values(contacts_data);

    for (i = 0; i < contacts_p_id.length; i++) {
      document.getElementById(contacts_p_id[i]).innerText =
        contacts_data[i + 1];
    }
    iframe.src = contacts_data[10];
    contacts_inp(contacts_data);
  };

  xhr.send("get_contacts");
}

function contacts_inp(data) {
  let contacts_inp_id = [
    "address_inp",
    "gmap_inp",
    "pn1_inp",
    "pn2_inp",
    "email_inp",
    "fb_inp",
    "ig_inp",
    "tw_inp",
    "tt_inp",
    "iframe_inp",
  ];
  for (i = 0; i < contacts_inp_id.length; i++) {
    document.getElementById(contacts_inp_id[i]).value = data[i + 1];
  }
}

contact_s_form.addEventListener("submit", function (e) {
  e.preventDefault();
  upd_contacts();
});

function upd_contacts() {
  let index = [
    "address",
    "gmap",
    "pn1",
    "pn2",
    "email",
    "fb",
    "ig",
    "tw",
    "tt",
    "iframe",
  ];
  let contacts_inp_id = [
    "address_inp",
    "gmap_inp",
    "pn1_inp",
    "pn2_inp",
    "email_inp",
    "fb_inp",
    "ig_inp",
    "tw_inp",
    "tt_inp",
    "iframe_inp",
  ];

  let data_str = "";
  for (i = 0; i < index.length; i++) {
    data_str +=
      index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + "&";
  }
  data_str += "upd_contacts";

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/settings_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    var myModal = document.getElementById("contact-settings");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();
    if (this.responseText == 1) {
      alert("success", "Changes saved!");
      get_contacts();
    } else {
      alert("error", "No changes made!");
    }
  };

  xhr.send(data_str);
}

window.onload = function () {
  get_general();
  get_contacts();
};
