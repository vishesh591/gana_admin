function _typeof(e) {
  return (_typeof =
    "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
      ? function (e) {
          return typeof e;
        }
      : function (e) {
          return e &&
            "function" == typeof Symbol &&
            e.constructor === Symbol &&
            e !== Symbol.prototype
            ? "symbol"
            : typeof e;
        })(e);
}
function _classCallCheck(e, t) {
  if (!(e instanceof t))
    throw new TypeError("Cannot call a class as a function");
}
function _defineProperties(e, t) {
  for (var n = 0; n < t.length; n++) {
    var r = t[n];
    (r.enumerable = r.enumerable || !1),
      (r.configurable = !0),
      "value" in r && (r.writable = !0),
      Object.defineProperty(e, _toPropertyKey(r.key), r);
  }
}
function _createClass(e, t, n) {
  return (
    t && _defineProperties(e.prototype, t),
    n && _defineProperties(e, n),
    Object.defineProperty(e, "prototype", { writable: !1 }),
    e
  );
}
function _defineProperty(e, t, n) {
  return (
    (t = _toPropertyKey(t)) in e
      ? Object.defineProperty(e, t, {
          value: n,
          enumerable: !0,
          configurable: !0,
          writable: !0,
        })
      : (e[t] = n),
    e
  );
}
function _toPropertyKey(e) {
  e = _toPrimitive(e, "string");
  return "symbol" == _typeof(e) ? e : e + "";
}
function _toPrimitive(e, t) {
  if ("object" != _typeof(e) || !e) return e;
  var n = e[Symbol.toPrimitive];
  if (void 0 === n) return ("string" === t ? String : Number)(e);
  n = n.call(e, t || "default");
  if ("object" != _typeof(n)) return n;
  throw new TypeError("@@toPrimitive must return a primitive value.");
}
var App = (() =>
  _createClass(
    function e() {
      _classCallCheck(this, e),
        _defineProperty(this, "initControls", function () {
          function e() {
            document.webkitIsFullScreen ||
              document.mozFullScreen ||
              document.msFullscreenElement ||
              $("body").removeClass("fullscreen-enable");
          }
          $('[data-toggle="fullscreen"]').on("click", function (e) {
            e.preventDefault(),
              $("body").toggleClass("fullscreen-enable"),
              document.fullscreenElement ||
              document.mozFullScreenElement ||
              document.webkitFullscreenElement
                ? document.cancelFullScreen
                  ? document.cancelFullScreen()
                  : document.mozCancelFullScreen
                  ? document.mozCancelFullScreen()
                  : document.webkitCancelFullScreen &&
                    document.webkitCancelFullScreen()
                : document.documentElement.requestFullscreen
                ? document.documentElement.requestFullscreen()
                : document.documentElement.mozRequestFullScreen
                ? document.documentElement.mozRequestFullScreen()
                : document.documentElement.webkitRequestFullscreen &&
                  document.documentElement.webkitRequestFullscreen(
                    Element.ALLOW_KEYBOARD_INPUT
                  );
          }),
            document.addEventListener("fullscreenchange", e),
            document.addEventListener("webkitfullscreenchange", e),
            document.addEventListener("mozfullscreenchange", e);
        });
    },
    [
      {
        key: "initComponents",
        value: function () {
          Waves.init(), feather.replace();
          [].slice
            .call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            .map(function (e) {
              return new bootstrap.Popover(e);
            }),
            [].slice
              .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
              .map(function (e) {
                return new bootstrap.Tooltip(e);
              }),
            [].slice
              .call(document.querySelectorAll(".toast"))
              .map(function (e) {
                return new bootstrap.Toast(e);
              });
          var e = document.getElementById("toastPlacement"),
            r =
              (e &&
                document
                  .getElementById("selectToastPlacement")
                  .addEventListener("change", function () {
                    e.dataset.originalClass ||
                      (e.dataset.originalClass = e.className),
                      (e.className =
                        e.dataset.originalClass + " " + this.value);
                  }),
              document.getElementById("liveAlertPlaceholder")),
            t = document.getElementById("liveAlertBtn");
          t &&
            t.addEventListener("click", function () {
              var e, t, n;
              (e = "Nice, you triggered this alert message!"),
                (t = "primary"),
                ((n = document.createElement("div")).innerHTML =
                  '<div class="alert alert-' +
                  t +
                  ' alert-dismissible" role="alert">' +
                  e +
                  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'),
                r.append(n);
            });
        },
      },
      {
        key: "initMenu",
        value: function () {
          function e() {
            window.innerWidth < 1040
              ? t.setAttribute("data-sidebar", "hidden")
              : t.setAttribute("data-sidebar", "default");
          }
          var t = document.body,
            n = document.querySelector(".button-toggle-menu");
          n &&
            n.addEventListener("click", function () {
              "default" == t.getAttribute("data-sidebar")
                ? t.setAttribute("data-sidebar", "hidden")
                : t.setAttribute("data-sidebar", "default");
            });
          e(),
            window.addEventListener("resize", e),
            $("#side-menu").length &&
              ($("#side-menu li .collapse").on({
                "show.bs.collapse": function (e) {
                  e = $(e.target).parents(".collapse.show");
                  $("#side-menu .collapse.show").not(e).collapse("hide");
                },
              }),
              $("#side-menu a").each(function () {
                var e = window.location.href.split(/[?#]/)[0];
                this.href == e &&
                  ($(this).addClass("active"),
                  $(this).parent().addClass("menuitem-active"),
                  $(this).parent().parent().parent().addClass("show"),
                  $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .addClass("menuitem-active"),
                  "sidebar-menu" !==
                    (e = $(this)
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()).attr("id") && e.addClass("show"),
                  $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .addClass("menuitem-active"),
                  "wrapper" !==
                    (e = $(this)
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()).attr("id") && e.addClass("show"),
                  (e = $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()).is("body") || e.addClass("menuitem-active"));
              }));
        },
      },
      {
        key: "init",
        value: function () {
          this.initComponents(), this.initMenu(), this.initControls();
        },
      },
    ]
  ))();
new App().init();

// In your app.js, replace the entire .admin-ownership-data-page block with this:
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const ownershipPageContainer = document.querySelector(
    ".admin-ownership-data-page"
  );
  if (!ownershipPageContainer) {
    return;
  }

  // --- DATA ---
  const conflictRequests = [
    {
      id: 1,
      category: "Ownership conflict",
      assetTitle: "Cosmic Drift",
      artist: "Astro Beats",
      assetId: "90736897913",
      upc: "198009123456",
      isrc: "USAT22312345",
      otherParty: "The Orchard",
      dailyViews: "79K",
      expiry: "2 days",
      status: "Action Required",
      albumCoverUrl: "https://placehold.co/80x80/3498db/ffffff?text=C",
    },
    {
      id: 2,
      category: "Policy",
      assetTitle: "Ocean Tides",
      artist: "Deep Wave",
      assetId: "3478239381",
      upc: "198009654321",
      isrc: "USAT22354321",
      otherParty: "Believe",
      dailyViews: "3K",
      expiry: "-",
      status: "Resolved",
      albumCoverUrl: "https://placehold.co/80x80/1abc9c/ffffff?text=O",
    },
    {
      id: 3,
      category: "Ownership conflict",
      assetTitle: "City Lights",
      artist: "Urban Glow",
      assetId: "3478239381",
      upc: "198009789012",
      isrc: "USAT22398765",
      otherParty: "CD Baby",
      dailyViews: "1.2K",
      expiry: "15 days",
      status: "In Review",
      albumCoverUrl: "https://placehold.co/80x80/9b59b6/ffffff?text=C",
    },
    {
      id: 4,
      category: "Metadata Error",
      assetTitle: "Desert Mirage",
      artist: "Sahara Echo",
      assetId: "89321756430",
      upc: "198001112233",
      isrc: "USAT22445566",
      otherParty: "TuneCore",
      dailyViews: "58K",
      expiry: "5 days",
      status: "Action Required",
      albumCoverUrl: "https://placehold.co/80x80/e67e22/ffffff?text=D",
    },
  ];
  const territoriesByRegion = {
    Africa: [
      { name: "Algeria", code: "DZ" },
      { name: "Angola", code: "AO" },
      { name: "Benin", code: "BJ" },
      { name: "Botswana", code: "BW" },
      { name: "Burkina Faso", code: "BF" },
      { name: "Burundi", code: "BI" },
      { name: "Cabo Verde", code: "CV" },
      { name: "Cameroon", code: "CM" },
      { name: "Central African Republic", code: "CF" },
      { name: "Chad", code: "TD" },
      { name: "Comoros", code: "KM" },
      { name: "Congo", code: "CG" },
      { name: "Congo (DRC)", code: "CD" },
      { name: "Côte d'Ivoire", code: "CI" },
      { name: "Djibouti", code: "DJ" },
      { name: "Egypt", code: "EG" },
      { name: "Equatorial Guinea", code: "GQ" },
      { name: "Eritrea", code: "ER" },
      { name: "Eswatini", code: "SZ" },
      { name: "Ethiopia", code: "ET" },
      { name: "Gabon", code: "GA" },
      { name: "Gambia", code: "GM" },
      { name: "Ghana", code: "GH" },
      { name: "Guinea", code: "GN" },
      { name: "Guinea-Bissau", code: "GW" },
      { name: "Kenya", code: "KE" },
      { name: "Lesotho", code: "LS" },
      { name: "Liberia", code: "LR" },
      { name: "Libya", code: "LY" },
      { name: "Madagascar", code: "MG" },
      { name: "Malawi", code: "MW" },
      { name: "Mali", code: "ML" },
      { name: "Mauritania", code: "MR" },
      { name: "Mauritius", code: "MU" },
      { name: "Mayotte", code: "YT" },
      { name: "Morocco", code: "MA" },
      { name: "Mozambique", code: "MZ" },
      { name: "Namibia", code: "NA" },
      { name: "Niger", code: "NE" },
      { name: "Nigeria", code: "NG" },
      { name: "Réunion", code: "RE" },
      { name: "Rwanda", code: "RW" },
      { name: "Saint Helena", code: "SH" },
      { name: "Sao Tome and Principe", code: "ST" },
      { name: "Senegal", code: "SN" },
      { name: "Seychelles", code: "SC" },
      { name: "Sierra Leone", code: "SL" },
      { name: "Somalia", code: "SO" },
      { name: "South Africa", code: "ZA" },
      { name: "South Sudan", code: "SS" },
      { name: "Sudan", code: "SD" },
      { name: "Tanzania", code: "TZ" },
      { name: "Togo", code: "TG" },
      { name: "Tunisia", code: "TN" },
      { name: "Uganda", code: "UG" },
      { name: "Zambia", code: "ZM" },
      { name: "Zimbabwe", code: "ZW" },
    ],
    Antarctica: [
      { name: "Antarctica", code: "AQ" },
      { name: "French Southern Territories", code: "TF" },
      { name: "South Georgia and the South Sandwich Islands", code: "GS" },
    ],
    Asia: [
      { name: "Afghanistan", code: "AF" },
      { name: "Armenia", code: "AM" },
      { name: "Azerbaijan", code: "AZ" },
      { name: "Bahrain", code: "BH" },
      { name: "Bangladesh", code: "BD" },
      { name: "Bhutan", code: "BT" },
      { name: "British Indian Ocean Territory", code: "IO" },
      { name: "Brunei", code: "BN" },
      { name: "Cambodia", code: "KH" },
      { name: "China", code: "CN" },
      { name: "Cyprus", code: "CY" },
      { name: "Georgia", code: "GE" },
      { name: "Hong Kong", code: "HK" },
      { name: "India", code: "IN" },
      { name: "Indonesia", code: "ID" },
      { name: "Iran", code: "IR" },
      { name: "Iraq", code: "IQ" },
      { name: "Israel", code: "IL" },
      { name: "Japan", code: "JP" },
      { name: "Jordan", code: "JO" },
      { name: "Kazakhstan", code: "KZ" },
      { name: "Kuwait", code: "KW" },
      { name: "Kyrgyzstan", code: "KG" },
      { name: "Laos", code: "LA" },
      { name: "Lebanon", code: "LB" },
      { name: "Macao", code: "MO" },
      { name: "Malaysia", code: "MY" },
      { name: "Maldives", code: "MV" },
      { name: "Mongolia", code: "MN" },
      { name: "Myanmar", code: "MM" },
      { name: "Nepal", code: "NP" },
      { name: "North Korea", code: "KP" },
      { name: "Oman", code: "OM" },
      { name: "Pakistan", code: "PK" },
      { name: "Palestine", code: "PS" },
      { name: "Philippines", code: "PH" },
      { name: "Qatar", code: "QA" },
      { name: "Saudi Arabia", code: "SA" },
      { name: "Singapore", code: "SG" },
      { name: "South Korea", code: "KR" },
      { name: "Sri Lanka", code: "LK" },
      { name: "Syria", code: "SY" },
      { name: "Taiwan", code: "TW" },
      { name: "Tajikistan", code: "TJ" },
      { name: "Thailand", code: "TH" },
      { name: "Timor-Leste", code: "TL" },
      { name: "Turkey", code: "TR" },
      { name: "Turkmenistan", code: "TM" },
      { name: "United Arab Emirates", code: "AE" },
      { name: "Uzbekistan", code: "UZ" },
      { name: "Vietnam", code: "VN" },
      { name: "Yemen", code: "YE" },
    ],
    Europe: [
      { name: "Åland Islands", code: "AX" },
      { name: "Albania", code: "AL" },
      { name: "Andorra", code: "AD" },
      { name: "Austria", code: "AT" },
      { name: "Belarus", code: "BY" },
      { name: "Belgium", code: "BE" },
      { name: "Bosnia and Herzegovina", code: "BA" },
      { name: "Bulgaria", code: "BG" },
      { name: "Croatia", code: "HR" },
      { name: "Czechia", code: "CZ" },
      { name: "Denmark", code: "DK" },
      { name: "Estonia", code: "EE" },
      { name: "Faroe Islands", code: "FO" },
      { name: "Finland", code: "FI" },
      { name: "France", code: "FR" },
      { name: "Germany", code: "DE" },
      { name: "Gibraltar", code: "GI" },
      { name: "Greece", code: "GR" },
      { name: "Guernsey", code: "GG" },
      { name: "Holy See", code: "VA" },
      { name: "Hungary", code: "HU" },
      { name: "Iceland", code: "IS" },
      { name: "Ireland", code: "IE" },
      { name: "Isle of Man", code: "IM" },
      { name: "Italy", code: "IT" },
      { name: "Jersey", code: "JE" },
      { name: "Latvia", code: "LV" },
      { name: "Liechtenstein", code: "LI" },
      { name: "Lithuania", code: "LT" },
      { name: "Luxembourg", code: "LU" },
      { name: "Malta", code: "MT" },
      { name: "Moldova", code: "MD" },
      { name: "Monaco", code: "MC" },
      { name: "Montenegro", code: "ME" },
      { name: "Netherlands", code: "NL" },
      { name: "North Macedonia", code: "MK" },
      { name: "Norway", code: "NO" },
      { name: "Poland", code: "PL" },
      { name: "Portugal", code: "PT" },
      { name: "Romania", code: "RO" },
      { name: "Russia", code: "RU" },
      { name: "San Marino", code: "SM" },
      { name: "Serbia", code: "RS" },
      { name: "Slovakia", code: "SK" },
      { name: "Slovenia", code: "SI" },
      { name: "Spain", code: "ES" },
      { name: "Svalbard and Jan Mayen", code: "SJ" },
      { name: "Sweden", code: "SE" },
      { name: "Switzerland", code: "CH" },
      { name: "Ukraine", code: "UA" },
      { name: "United Kingdom", code: "GB" },
    ],
    "North America": [
      { name: "Anguilla", code: "AI" },
      { name: "Antigua and Barbuda", code: "AG" },
      { name: "Aruba", code: "AW" },
      { name: "Bahamas", code: "BS" },
      { name: "Barbados", code: "BB" },
      { name: "Belize", code: "BZ" },
      { name: "Bermuda", code: "BM" },
      { name: "Bonaire", code: "BQ" },
      { name: "Canada", code: "CA" },
      { name: "Cayman Islands", code: "KY" },
      { name: "Costa Rica", code: "CR" },
      { name: "Cuba", code: "CU" },
      { name: "Curaçao", code: "CW" },
      { name: "Dominica", code: "DM" },
      { name: "Dominican Republic", code: "DO" },
      { name: "El Salvador", code: "SV" },
      { name: "Greenland", code: "GL" },
      { name: "Grenada", code: "GD" },
      { name: "Guadeloupe", code: "GP" },
      { name: "Guatemala", code: "GT" },
      { name: "Haiti", code: "HT" },
      { name: "Honduras", code: "HN" },
      { name: "Jamaica", code: "JM" },
      { name: "Martinique", code: "MQ" },
      { name: "Mexico", code: "MX" },
      { name: "Montserrat", code: "MS" },
      { name: "Nicaragua", code: "NI" },
      { name: "Panama", code: "PA" },
      { name: "Puerto Rico", code: "PR" },
      { name: "Saint Barthélemy", code: "BL" },
      { name: "Saint Kitts and Nevis", code: "KN" },
      { name: "Saint Lucia", code: "LC" },
      { name: "Saint Martin", code: "MF" },
      { name: "Saint Pierre and Miquelon", code: "PM" },
      { name: "Saint Vincent and the Grenadines", code: "VC" },
      { name: "Sint Maarten", code: "SX" },
      { name: "Trinidad and Tobago", code: "TT" },
      { name: "Turks and Caicos Islands", code: "TC" },
      { name: "United States", code: "US" },
      { name: "U.S. Virgin Islands", code: "VI" },
    ],
    Oceania: [
      { name: "American Samoa", code: "AS" },
      { name: "Australia", code: "AU" },
      { name: "Christmas Island", code: "CX" },
      { name: "Cocos (Keeling) Islands", code: "CC" },
      { name: "Cook Islands", code: "CK" },
      { name: "Fiji", code: "FJ" },
      { name: "French Polynesia", code: "PF" },
      { name: "Guam", code: "GU" },
      { name: "Kiribati", code: "KI" },
      { name: "Marshall Islands", code: "MH" },
      { name: "Micronesia", code: "FM" },
      { name: "Nauru", code: "NR" },
      { name: "New Caledonia", code: "NC" },
      { name: "New Zealand", code: "NZ" },
      { name: "Niue", code: "NU" },
      { name: "Norfolk Island", code: "NF" },
      { name: "Northern Mariana Islands", code: "MP" },
      { name: "Palau", code: "PW" },
      { name: "Papua New Guinea", code: "PG" },
      { name: "Pitcairn", code: "PN" },
      { name: "Samoa", code: "WS" },
      { name: "Solomon Islands", code: "SB" },
      { name: "Tokelau", code: "TK" },
      { name: "Tonga", code: "TO" },
      { name: "Tuvalu", code: "TV" },
      { name: "U.S. Minor Outlying Islands", code: "UM" },
      { name: "Vanuatu", code: "VU" },
      { name: "Wallis and Futuna", code: "WF" },
    ],
    "South America": [
      { name: "Argentina", code: "AR" },
      { name: "Bolivia", code: "BO" },
      { name: "Brazil", code: "BR" },
      { name: "Chile", code: "CL" },
      { name: "Colombia", code: "CO" },
      { name: "Ecuador", code: "EC" },
      { name: "Falkland Islands", code: "FK" },
      { name: "French Guiana", code: "GF" },
      { name: "Guyana", code: "GY" },
      { name: "Paraguay", code: "PY" },
      { name: "Peru", code: "PE" },
      { name: "Suriname", code: "SR" },
      { name: "Uruguay", code: "UY" },
      { name: "Venezuela", code: "VE" },
    ],
  };
  const totalCountries = Object.values(territoriesByRegion).flat().length;

  // --- DOM ELEMENTS ---
  const table = $("#datatable");

  // --- HELPER & PARSING FUNCTIONS ---
  const parseViews = (views) =>
    typeof views !== "string"
      ? 0
      : parseFloat(views.toUpperCase()) *
        (views.toUpperCase().includes("K") ? 1000 : 1);
  const parseExpiry = (expiry) =>
    typeof expiry !== "string" || expiry === "-" ? Infinity : parseInt(expiry);
  const getStatusBadge = (status) =>
    `<span class="badge rounded-pill border ${getStatusBadgeClass(
      status
    )}">${status}</span>`;
  const getStatusBadgeClass = (status) => {
    const lowerStatus = status.toLowerCase();
    if (lowerStatus.includes("action required"))
      return "bg-danger-subtle text-danger-emphasis";
    if (lowerStatus.includes("resolved"))
      return "bg-success-subtle text-success-emphasis";
    if (lowerStatus.includes("in review"))
      return "bg-warning-subtle text-warning-emphasis";
    return "bg-secondary-subtle text-secondary-emphasis";
  };

  // --- DATATABLES CONFIGURATION ---
  const dataTableInstance = table.DataTable({
    destroy: true,
    data: conflictRequests,
    paging: true,
    searching: true,
    info: true,
    lengthChange: true,
    autoWidth: false,
    columns: [
      {
        data: null,
        className: "text-center",
        orderable: false,
        render: () => `<i class="bi bi-youtube text-danger fs-5"></i>`,
      },
      { data: "category" },
      { data: "assetTitle" },
      {
        data: null,
        render: (data, type, row) =>
          `<div class="fw-bold">${row.artist}</div><small class="text-muted">Asset ID: ${row.assetId}</small>`,
      },
      { data: "upc" },
      { data: "otherParty" },
      {
        data: "dailyViews",
        render: { _: (data) => data, sort: (data) => parseViews(data) },
      },
      {
        data: "expiry",
        render: { _: (data) => data, sort: (data) => parseExpiry(data) },
      },
      { data: "status", render: (data) => getStatusBadge(data) },
      {
        data: null,
        className: "text-center",
        orderable: false,
        render: () => `<i class="bi bi-chevron-right text-muted"></i>`,
      },
    ],
    createdRow: function (row, data, dataIndex) {
      $(row).attr({
        "data-bs-toggle": "offcanvas",
        "data-bs-target": "#conflictResolutionOffcanvas",
        "data-song-name": data.assetTitle,
        "data-artist-name": data.artist,
        "data-isrc": data.isrc,
        "data-cover-url": data.albumCoverUrl,
        "data-category": data.category,
        "data-other-party": data.otherParty,
      });
    },
    language: {
      info: "Showing _START_ to _END_ of _TOTAL_ entries",
      infoEmpty: "Showing 0 to 0 of 0 entries",
      infoFiltered: "(filtered from _MAX_ total entries)",
      zeroRecords: "No matching conflicts found",
      emptyTable: "No conflicts available",
      search: "_INPUT_",
      searchPlaceholder: "Search conflicts...",
    },
  });

  // --- OFFCANVAS LOGIC ---
  const conflictOffcanvasEl = document.getElementById(
    "conflictResolutionOffcanvas"
  );
  if (conflictOffcanvasEl) {
    const conflictForm = document.getElementById("conflictForm");
    const steps = Array.from(
      conflictOffcanvasEl.querySelectorAll(".form-step")
    );
    const nextBtn = document.getElementById("nextBtn");
    const backBtn = document.getElementById("backBtn");
    const submitBtn = document.getElementById("submitBtn");
    let currentStep = 0;

    function showStep(stepIndex) {
      steps.forEach((step, index) =>
        step.classList.toggle("d-none", index !== stepIndex)
      );
      backBtn.classList.toggle("d-none", stepIndex === 0);
      nextBtn.classList.toggle("d-none", stepIndex === steps.length - 1);
      submitBtn.classList.toggle("d-none", stepIndex !== steps.length - 1);
      currentStep = stepIndex;
    }

    nextBtn.addEventListener("click", () => {
      if (
        currentStep === 0 &&
        !conflictForm.querySelector('input[name="rightsOwned"]:checked')
      )
        return alert("Please select a rights option.");
      if (
        currentStep === 1 &&
        !conflictForm.querySelector(".country-checkbox:checked")
      )
        return alert("Please select at least one territory.");
      if (currentStep < steps.length - 1) showStep(currentStep + 1);
    });

    backBtn.addEventListener("click", () => showStep(currentStep - 1));

    conflictOffcanvasEl.addEventListener("show.bs.offcanvas", function (event) {
      renderTerritoryAccordion();
      const data = event.relatedTarget.dataset;
      ["", "2", "3"].forEach((s) => {
        const cover = document.getElementById(`modalAlbumCover${s}`);
        const song = document.getElementById(`modalSongName${s}`);
        const artist = document.getElementById(`modalArtistName${s}`);
        if (cover) cover.src = data.coverUrl;
        if (song) song.textContent = data.songName;
        if (artist) artist.textContent = data.artistName;
      });
      document.getElementById("offcanvasTitle").textContent = data.category;
      document.getElementById(
        "offcanvasSubtitle"
      ).textContent = `VS. ${data.otherParty}`;
      conflictForm.reset();
      conflictForm
        .querySelectorAll(".radio-card")
        .forEach((c) => c.classList.remove("selected"));
      document.getElementById("selectedFileName")?.classList.add("d-none");
      showStep(0);
    });

    conflictForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const formFile = document.getElementById("formFile");
      if (currentStep === 2 && formFile && !formFile.files.length)
        return alert("Please upload a supporting document.");
      alert("Resolution submitted successfully!");
      bootstrap.Offcanvas.getInstance(conflictOffcanvasEl).hide();
    });

    function renderTerritoryAccordion() {
      const accordionContainer = document.getElementById("territoryAccordion");
      if (!accordionContainer) return;
      accordionContainer.innerHTML = Object.entries(territoriesByRegion)
        .map(([region, countries]) => {
          if (countries.length === 0) return "";
          const regionId = region.replace(/[^a-zA-Z0-9]/g, "");
          return `
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${regionId}">
                            <div class="form-check me-auto pe-2">
                                <input class="form-check-input region-checkbox" type="checkbox" id="region-${regionId}" data-region="${region}" checked>
                                <label class="form-check-label fw-bold" for="region-${regionId}">${region}</label>
                            </div>
                            <span class="text-muted small me-2">${
                              countries.length
                            } countries</span>
                        </button>
                    </h2>
                    <div id="collapse-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                        <div class="accordion-body">
                            <div class="territory-list-inner">${countries
                              .map(
                                (c) => `
                                <div class="form-check">
                                    <input class="form-check-input country-checkbox" type="checkbox" value="${c.code}" id="country-${c.code}" data-region="${region}" checked>
                                    <label class="form-check-label" for="country-${c.code}">${c.name}</label>
                                </div>`
                              )
                              .join("")}
                            </div>
                        </div>
                    </div>
                </div>`;
        })
        .join("");
      addTerritoryEventListeners();
      updateTerritoryCounter();
    }

    function updateTerritoryCounter() {
      const selected = conflictOffcanvasEl.querySelectorAll(
        ".country-checkbox:checked"
      ).length;
      document.getElementById(
        "territoryCounter"
      ).textContent = `${selected} contested countries out of ${totalCountries} delivered`;
    }

    function addTerritoryEventListeners() {
      const checkboxes = conflictOffcanvasEl.querySelectorAll(
        ".region-checkbox, .country-checkbox"
      );
      checkboxes.forEach((cb) =>
        cb.addEventListener("change", function (e) {
          if (e.target.classList.contains("region-checkbox")) {
            const region = e.target.dataset.region;
            conflictOffcanvasEl
              .querySelectorAll(`.country-checkbox[data-region="${region}"]`)
              .forEach((countryCb) => (countryCb.checked = e.target.checked));
          } else {
            const region = e.target.dataset.region;
            const allInRegion = [
              ...conflictOffcanvasEl.querySelectorAll(
                `.country-checkbox[data-region="${region}"]`
              ),
            ].every((c) => c.checked);
            conflictOffcanvasEl.querySelector(
              `.region-checkbox[data-region="${region}"]`
            ).checked = allInRegion;
          }
          updateTerritoryCounter();
        })
      );
    }

    conflictOffcanvasEl.addEventListener("click", function (e) {
      if (e.target.closest(".radio-card")) {
        const card = e.target.closest(".radio-card");
        conflictOffcanvasEl
          .querySelectorAll(".radio-card")
          .forEach((c) => c.classList.remove("selected"));
        card.classList.add("selected");
        card.querySelector('input[type="radio"]').checked = true;
      }
    });

    const fileInput = document.getElementById("formFile");
    const fileDisplay = document.getElementById("selectedFileName");
    document
      .getElementById("fileUploadContainer")
      ?.addEventListener("click", () => fileInput.click());
    fileInput?.addEventListener("change", () => {
      if (fileInput.files.length > 0 && fileDisplay) {
        fileDisplay.querySelector("span").textContent = fileInput.files[0].name;
        fileDisplay.classList.remove("d-none");
      }
    });
    fileDisplay?.querySelector(".btn-close").addEventListener("click", (e) => {
      e.stopPropagation();
      if (fileInput) fileInput.value = "";
      fileDisplay.classList.add("d-none");
    });
  }
});
// claim-data-page js
// In your app.js, replace the entire .admin-claim-data-page block with this:
document.addEventListener("DOMContentLoaded", function () {
  const ownershipPageContainer = document.querySelector(
    ".admin-claim-data-page"
  );

  if (ownershipPageContainer) {
    // --- DATA ---
    let claimingRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artist: "Orion Sun",
        isrc: "US1232500004",
        instagramAudio: "https://instagram.com/audio/123",
        reelMerge: "https://instagram.com/reel/xyz",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2",
        matchingTime: "N/A",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artist: "Cyber Lazer",
        isrc: "US1232500005",
        instagramAudio: "https://instagram.com/audio/456",
        reelMerge: "https://instagram.com/reel/abc",
        matchingTime: "00:30-01:00",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artist: "Ghost FM",
        isrc: "US1232500006",
        instagramAudio: "https://instagram.com/audio/789",
        reelMerge: "https://instagram.com/reel/def",
        matchingTime: "01:00-01:15",
        status: "rejected",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8",
      },
    ];
    let currentFilter = "all";

    // --- DOM ELEMENTS ---
    const table = $("#datatable");
    const releaseModalEl = document.getElementById("releaseModal");
    const releaseModal = new bootstrap.Modal(releaseModalEl);

    // --- HELPER FUNCTIONS ---
    const getStatusIcon = (status) => {
      const icons = {
        approved: "check-circle",
        pending: "clock",
        rejected: "x-circle",
      };
      const colors = {
        approved: "text-success",
        pending: "text-warning",
        rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${
        colors[status] || "text-muted"
      }"></i>`;
    };
    const getStatusBadge = (status) => {
      const config = {
        approved: "status-approved",
        pending: "status-pending",
        rejected: "status-rejected",
      };
      return `<span class="badge status-badge ${
        config[status] || "bg-secondary"
      }">${status.toUpperCase()}</span>`;
    };
    const createLink = (url, iconClass) =>
      url
        ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>`
        : "";

    // --- DATATABLE INITIALIZATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: [],
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          render: (data) => getStatusIcon(data),
        },
        {
          data: null,
          orderable: true,
          render: (data, type, row) => `
                    <div class="release-title"><a href="#" class="view-details-link" data-id="${row.id}">${row.songName}</a></div>
                    <div class="text-muted small">${row.artist}</div>`,
        },
        { data: "isrc", defaultContent: "N/A" },
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: (data, type, row) =>
            createLink(row.instagramAudio, "bi-music-note-beamed") +
            " " +
            createLink(row.reelMerge, "bi-camera-reels"),
        },
        {
          data: "status",
          className: "text-center",
          render: (data) =>
            `<div class="d-flex justify-content-center">${getStatusBadge(
              data
            )}</div>`,
        },
      ],
      drawCallback: () => {
        feather.replace();
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching requests found",
        emptyTable: "No requests available",
        search: "_INPUT_",
        searchPlaceholder: "Search records...",
      },
    });

    // --- RENDER & UPDATE FUNCTIONS ---

    // This is the single source of truth for filtering and drawing the table
    function applyFiltersAndDraw() {
      // Define the custom filter function
      $.fn.dataTable.ext.search.pop(); // Clear any previous custom filters
      $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (currentFilter === "all") {
          return true; // Show all rows if filter is 'all'
        }
        // Compare the row's status with the current filter
        const rowStatus = claimingRequests[dataIndex].status;
        return rowStatus === currentFilter;
      });

      // Redraw the table to apply the filter
      dataTableInstance.draw();
    }

    function openReleaseModal(id) {
      const req = claimingRequests.find((r) => r.id === id);
      if (!req) return;

      document.getElementById("releaseTitle").textContent = req.songName;
      document.getElementById("releaseArtistHeader").textContent = req.artist;
      document.getElementById("releaseAlbumArtwork").src = req.artwork;
      releaseModalEl.querySelector(
        ".bg-image-blurred"
      ).style.backgroundImage = `url('${req.artwork}')`;
      document.getElementById("releaseStatusBadges").innerHTML = getStatusBadge(
        req.status
      );
      document.getElementById("modal-isrc").textContent = req.isrc || "N/A";
      document.getElementById("modal-matchingTime").textContent =
        req.matchingTime || "N/A";
      document.getElementById("modal-instagramAudio").innerHTML =
        req.instagramAudio
          ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>`
          : "N/A";
      document.getElementById("modal-reelMerge").innerHTML = req.reelMerge
        ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>`
        : "N/A";

      releaseModalEl.dataset.currentId = req.id;
      releaseModal.show();
    }

    function handleStatusUpdate(status) {
      const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
      const request = claimingRequests.find((r) => r.id === requestId);
      if (request) {
        request.status = status;
        applyFiltersAndDraw(); // Redraw table with updated data
      }
      releaseModal.hide();
    }

    // --- EVENT LISTENERS ---
    document.getElementById("filterTabs").addEventListener("click", (e) => {
      if (e.target.matches("a.nav-link[data-filter]")) {
        e.preventDefault();
        currentFilter = e.target.dataset.filter;
        document
          .querySelectorAll("#filterTabs .nav-link")
          .forEach((tab) => tab.classList.remove("active"));
        e.target.classList.add("active");
        applyFiltersAndDraw(); // Apply the custom filter
      }
    });

    $("#datatable tbody").on("click", ".view-details-link", function (e) {
      e.preventDefault();
      openReleaseModal(parseInt($(this).data("id"), 10));
    });

    document
      .getElementById("approveBtn")
      .addEventListener("click", () => handleStatusUpdate("approved"));
    document
      .getElementById("rejectBtn")
      .addEventListener("click", () => handleStatusUpdate("rejected"));

    // --- INITIAL RENDER ---
    // Load all data into the table first
    dataTableInstance.clear().rows.add(claimingRequests).draw();
    // Then apply the initial filter (which is 'all')
    applyFiltersAndDraw();
  }
});
// merge-data-page js
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const mergePageContainer = document.querySelector(".admin-merge-data-page");

  if (mergePageContainer) {
    // --- DATA ---
    let mergeRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artist: "Orion Sun",
        isrc: "US1232500004",
        instagramAudio: "https://instagram.com/audio/123",
        reelMerge: "https://instagram.com/reel/xyz",
        matchingTime: "00:15-00:45",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artist: "Cyber Lazer",
        isrc: "US1232500005",
        instagramAudio: "https://instagram.com/audio/456",
        reelMerge: "https://instagram.com/reel/abc",
        matchingTime: "00:30-01:00",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artist: "Ghost FM",
        isrc: "US1232500006",
        instagramAudio: "https://instagram.com/audio/789",
        reelMerge: "https://instagram.com/reel/def",
        matchingTime: "01:00-01:15",
        status: "rejected",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8",
      },
    ];
    let currentFilter = "all";

    // --- DOM ELEMENTS ---
    const table = $("#datatable");
    const releaseModalEl = document.getElementById("releaseModal");
    const releaseModal = new bootstrap.Modal(releaseModalEl);
    const newRequestModalEl = document.getElementById("newRequestModal");
    const newRequestModal = new bootstrap.Modal(newRequestModalEl);
    const newRequestForm = document.getElementById("newRequestForm");
    const exportCsvBtn = document.getElementById("exportCsvBtn");

    // --- HELPER FUNCTIONS ---
    const getStatusIcon = (status) => {
      const icons = {
        approved: "check-circle",
        pending: "clock",
        rejected: "x-circle",
      };
      const colors = {
        approved: "text-success",
        pending: "text-warning",
        rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${
        colors[status] || "text-muted"
      }"></i>`;
    };
    const getStatusBadge = (status) => {
      const config = {
        approved: "status-approved",
        pending: "status-pending",
        rejected: "status-rejected",
      };
      return `<span class="badge status-badge ${
        config[status] || "bg-secondary"
      }">${status.toUpperCase()}</span>`;
    };
    const createLink = (url, iconClass) =>
      url
        ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>`
        : "";

    // --- DATATABLE INITIALIZATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: [],
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          render: (data) => getStatusIcon(data),
        },
        {
          data: null,
          orderable: true,
          render: (data, type, row) => `
                    <div class="release-title"><a href="#" class="view-details-link" data-id="${row.id}">${row.songName}</a></div>
                    <div class="text-muted small">${row.artist}</div>`,
        },
        { data: "isrc", defaultContent: "N/A" },
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: (data, type, row) =>
            createLink(row.instagramAudio, "bi-music-note-beamed") +
            " " +
            createLink(row.reelMerge, "bi-camera-reels"),
        },
        { data: "matchingTime", defaultContent: "N/A" },
        {
          data: "status",
          className: "text-center",
          render: (data) =>
            `<div class="d-flex justify-content-center">${getStatusBadge(
              data
            )}</div>`,
        },
      ],
      drawCallback: () => {
        feather.replace();
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching requests found",
        emptyTable: "No requests available",
        search: "_INPUT_",
        searchPlaceholder: "Search records...",
      },
    });

    // --- RENDER & UPDATE FUNCTIONS ---
    function applyFiltersAndDraw() {
      $.fn.dataTable.ext.search.pop();
      $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (currentFilter === "all") return true;
        return mergeRequests[dataIndex].status === currentFilter;
      });
      dataTableInstance.draw();
    }

    function openReleaseModal(id) {
      const req = mergeRequests.find((r) => r.id === id);
      if (!req) return;

      document.getElementById("releaseTitle").textContent = req.songName;
      document.getElementById("releaseArtistHeader").textContent = req.artist;
      document.getElementById("releaseAlbumArtwork").src = req.artwork;
      releaseModalEl.querySelector(
        ".bg-image-blurred"
      ).style.backgroundImage = `url('${req.artwork}')`;
      document.getElementById("releaseStatusBadges").innerHTML = getStatusBadge(
        req.status
      );
      document.getElementById("modal-isrc").textContent = req.isrc || "N/A";
      document.getElementById("modal-matchingTime").textContent =
        req.matchingTime || "N/A";
      document.getElementById("modal-instagramAudio").innerHTML =
        req.instagramAudio
          ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>`
          : "N/A";
      document.getElementById("modal-reelMerge").innerHTML = req.reelMerge
        ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>`
        : "N/A";

      releaseModalEl.dataset.currentId = req.id;
      releaseModal.show();
    }

    function handleStatusUpdate(status) {
      const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
      const request = mergeRequests.find((r) => r.id === requestId);
      if (request) {
        request.status = status;
        applyFiltersAndDraw();
      }
      releaseModal.hide();
    }

    // --- EVENT LISTENERS ---
    document.getElementById("filterTabs").addEventListener("click", (e) => {
      if (e.target.matches("a.nav-link[data-filter]")) {
        e.preventDefault();
        currentFilter = e.target.dataset.filter;
        document
          .querySelectorAll("#filterTabs .nav-link")
          .forEach((tab) => tab.classList.remove("active"));
        e.target.classList.add("active");
        applyFiltersAndDraw();
      }
    });

    $("#datatable tbody").on("click", ".view-details-link", function (e) {
      e.preventDefault();
      openReleaseModal(parseInt($(this).data("id"), 10));
    });

    document
      .getElementById("approveBtn")
      .addEventListener("click", () => handleStatusUpdate("approved"));
    document
      .getElementById("rejectBtn")
      .addEventListener("click", () => handleStatusUpdate("rejected"));

    newRequestForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const newRequest = {
        id: Date.now(),
        songName: document.getElementById("songNameInput").value,
        artist: document.getElementById("artistInput").value,
        isrc: document.getElementById("isrcInput").value,
        instagramAudio: document.getElementById("instagramAudioInput").value,
        reelMerge: document.getElementById("reelMergeInput").value,
        matchingTime: document.getElementById("matchingTimeInput").value,
        status: "pending",
        artwork: "https://via.placeholder.com/150/cccccc/FFFFFF?text=New",
      };
      mergeRequests.unshift(newRequest);
      dataTableInstance.clear().rows.add(mergeRequests).draw();
      newRequestForm.reset();
      newRequestModal.hide();
    });

    exportCsvBtn.addEventListener("click", () => {
      const headers = [
        "ID",
        "Song Name",
        "Artist",
        "ISRC",
        "Instagram Audio Link",
        "Reel Merge Link",
        "Matching Time",
        "Status",
      ];
      const rows = dataTableInstance
        .rows({ search: "applied" })
        .data()
        .toArray()
        .map((req) => [
          req.id,
          req.songName,
          req.artist,
          req.isrc,
          req.instagramAudio,
          req.reelMerge,
          req.matchingTime,
          req.status,
        ]);
      const escapeCsvValue = (val) =>
        `"${String(val || "").replace(/"/g, '""')}"`;
      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((r) => r.map(escapeCsvValue).join(",")).join("\n");

      const link = document.createElement("a");
      link.setAttribute("href", encodeURI(csvContent));
      link.setAttribute("download", "merge-requests.csv");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    // --- INITIAL RENDER ---
    dataTableInstance.clear().rows.add(mergeRequests).draw();
    applyFiltersAndDraw();
  }
});

// relocation-data-page js

// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const relocationPageContainer = document.querySelector(
    ".admin-reloc-data-page"
  );

  if (relocationPageContainer) {
    // --- DATA ---
    let relocationRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artist: "Orion Sun",
        isrc: "US1232500004",
        instagramAudio: "https://instagram.com/audio/123",
        reelMerge: "https://instagram.com/reel/xyz",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2",
        matchingTime: "N/A",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artist: "Cyber Lazer",
        isrc: "US1232500005",
        instagramAudio: "https://instagram.com/audio/456",
        reelMerge: "https://instagram.com/reel/abc",
        matchingTime: "00:30-01:00",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artist: "Ghost FM",
        isrc: "US1232500006",
        instagramAudio: "https://instagram.com/audio/789",
        reelMerge: "https://instagram.com/reel/def",
        matchingTime: "01:00-01:15",
        status: "rejected",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8",
      },
    ];
    let currentFilter = "all";

    // --- DOM ELEMENTS ---
    const table = $("#datatable");
    const releaseModalEl = document.getElementById("releaseModal");
    const releaseModal = new bootstrap.Modal(releaseModalEl);
    const newRequestModalEl = document.getElementById("newRequestModal");
    const newRequestModal = new bootstrap.Modal(newRequestModalEl);
    const newRequestForm = document.getElementById("newRequestForm");
    const exportCsvBtn = document.getElementById("exportCsvBtn");

    // --- HELPER FUNCTIONS ---
    const getStatusIcon = (status) => {
      const icons = {
        approved: "check-circle",
        pending: "clock",
        rejected: "x-circle",
      };
      const colors = {
        approved: "text-success",
        pending: "text-warning",
        rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${
        colors[status] || "text-muted"
      }"></i>`;
    };
    const getStatusBadge = (status) => {
      const config = {
        approved: "status-approved",
        pending: "status-pending",
        rejected: "status-rejected",
      };
      return `<span class="badge status-badge ${
        config[status] || "bg-secondary"
      }">${status.toUpperCase()}</span>`;
    };
    const createLink = (url, iconClass) =>
      url
        ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>`
        : "";

    // --- DATATABLE INITIALIZATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: [],
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          render: (data) => getStatusIcon(data),
        },
        {
          data: null,
          orderable: true,
          render: (data, type, row) => `
                    <div class="release-title"><a href="#" class="view-details-link" data-id="${row.id}">${row.songName}</a></div>
                    <div class="text-muted small">${row.artist}</div>`,
        },
        { data: "isrc", defaultContent: "N/A" },
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: (data, type, row) =>
            createLink(row.instagramAudio, "bi-music-note-beamed") +
            " " +
            createLink(row.reelMerge, "bi-camera-reels"),
        },
        {
          data: "status",
          className: "text-center",
          render: (data) =>
            `<div class="d-flex justify-content-center">${getStatusBadge(
              data
            )}</div>`,
        },
      ],
      drawCallback: () => {
        feather.replace();
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching requests found",
        emptyTable: "No requests available",
        search: "_INPUT_",
        searchPlaceholder: "Search records...",
      },
    });

    // --- RENDER & UPDATE FUNCTIONS ---
    function applyFiltersAndDraw() {
      $.fn.dataTable.ext.search.pop();
      $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (currentFilter === "all") return true;
        return relocationRequests[dataIndex].status === currentFilter;
      });
      dataTableInstance.draw();
    }

    function openReleaseModal(id) {
      const req = relocationRequests.find((r) => r.id === id);
      if (!req) return;
      // (Code to populate the modal remains the same as your other page)
      document.getElementById("releaseTitle").textContent = req.songName;
      document.getElementById("releaseArtistHeader").textContent = req.artist;
      document.getElementById("releaseAlbumArtwork").src = req.artwork;
      releaseModalEl.querySelector(
        ".bg-image-blurred"
      ).style.backgroundImage = `url('${req.artwork}')`;
      document.getElementById("releaseStatusBadges").innerHTML = getStatusBadge(
        req.status
      );
      document.getElementById("modal-isrc").textContent = req.isrc || "N/A";
      document.getElementById("modal-matchingTime").textContent =
        req.matchingTime || "N/A";
      document.getElementById("modal-instagramAudio").innerHTML =
        req.instagramAudio
          ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>`
          : "N/A";
      document.getElementById("modal-reelMerge").innerHTML = req.reelMerge
        ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>`
        : "N/A";
      releaseModalEl.dataset.currentId = req.id;
      releaseModal.show();
    }

    function handleStatusUpdate(status) {
      const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
      const request = relocationRequests.find((r) => r.id === requestId);
      if (request) {
        request.status = status;
        applyFiltersAndDraw();
      }
      releaseModal.hide();
    }

    // --- EVENT LISTENERS ---
    document.getElementById("filterTabs").addEventListener("click", (e) => {
      if (e.target.matches("a.nav-link[data-filter]")) {
        e.preventDefault();
        currentFilter = e.target.dataset.filter;
        document
          .querySelectorAll("#filterTabs .nav-link")
          .forEach((tab) => tab.classList.remove("active"));
        e.target.classList.add("active");
        applyFiltersAndDraw();
      }
    });

    $("#datatable tbody").on("click", ".view-details-link", function (e) {
      e.preventDefault();
      openReleaseModal(parseInt($(this).data("id"), 10));
    });

    document
      .getElementById("approveBtn")
      .addEventListener("click", () => handleStatusUpdate("approved"));
    document
      .getElementById("rejectBtn")
      .addEventListener("click", () => handleStatusUpdate("rejected"));

    newRequestForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const newRequest = {
        id: Date.now(),
        songName: document.getElementById("songNameInput").value,
        artist: document.getElementById("artistInput").value,
        isrc: document.getElementById("isrcInput").value,
        instagramAudio: document.getElementById("instagramAudioInput").value,
        reelMerge: document.getElementById("reelMergeInput").value,
        matchingTime: document.getElementById("matchingTimeInput").value,
        status: "pending",
        artwork: "https://via.placeholder.com/150/cccccc/FFFFFF?text=New", // Default artwork
      };
      relocationRequests.unshift(newRequest); // Add to the start of the main data array
      dataTableInstance.clear().rows.add(relocationRequests).draw(); // Reload DataTable
      newRequestForm.reset();
      newRequestModal.hide();
    });

    exportCsvBtn.addEventListener("click", () => {
      const headers = [
        "ID",
        "Song Name",
        "Artist",
        "ISRC",
        "Instagram Audio Link",
        "Reel Merge Link",
        "Matching Time",
        "Status",
      ];
      const rows = dataTableInstance
        .rows({ search: "applied" })
        .data()
        .toArray()
        .map((req) => [
          req.id,
          req.songName,
          req.artist,
          req.isrc,
          req.instagramAudio,
          req.reelMerge,
          req.matchingTime,
          req.status,
        ]);
      const escapeCsvValue = (val) =>
        `"${String(val || "").replace(/"/g, '""')}"`;
      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((r) => r.map(escapeCsvValue).join(",")).join("\n");

      const link = document.createElement("a");
      link.setAttribute("href", encodeURI(csvContent));
      link.setAttribute("download", "relocation-requests.csv"); // Correct filename
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    // --- INITIAL RENDER ---
    dataTableInstance.clear().rows.add(relocationRequests).draw();
    applyFiltersAndDraw();
  }
});

// releases-page js

document.addEventListener("DOMContentLoaded", function () {
  const releasesPageContainer = document.querySelector(".admin-releases-page");

  if (releasesPageContainer) {
    // --- DATA ---
    const releasesData = [
      {
        id: 1,
        title: "Swapnil Dada Kartoy Raj",
        artist: "Mohit Jadhav",
        submittedDate: "7th July 2025",
        upc: "5863544729375",
        isrc: "INH722302515",
        status: "delivered",
        isTakedown: false,
        catNo: "MJ-001",
        recordLabel: "Music Dreams",
        featuringArtist: "None",
        lyricists: ["Mohit Jadhav", "Priya Sharma"],
        albumArtwork: "/images/rocket.png",
        stores: ["Spotify", "Apple Music", "Amazon Music", "JioSaavn", "Gaana"],
        copyrightStores: ["Facebook Rights Manager", "YouTube Content ID"],
        tracks: [
          {
            trackNo: 1,
            title: "Swapnil Dada Kartoy Raj",
            duration: "3:45",
            isrc: "INH722302515",
            language: "Marathi",
            explicit: false,
          },
          {
            trackNo: 2,
            title: "Jai Maharashtra",
            duration: "4:10",
            isrc: "INH722302516",
            language: "Marathi",
            explicit: false,
          },
        ],
      },
      {
        id: 2,
        title: "Dream Chaser",
        artist: "Sarah Johnson",
        submittedDate: "5th July 2025",
        upc: "5863544729376",
        isrc: "INH722302516",
        status: "review",
        isTakedown: false,
        catNo: "SJ-002",
        recordLabel: "Indie Sounds",
        featuringArtist: "The Harmonizers",
        lyricists: ["Sarah Johnson"],
        albumArtwork: "/images/rocket.png",
        stores: ["Spotify", "Apple Music", "Amazon Music"],
        copyrightStores: [],
        tracks: [
          {
            trackNo: 1,
            title: "Stardust",
            duration: "3:20",
            isrc: "US-SJ-25-001",
            language: "English",
            explicit: false,
          },
          {
            trackNo: 2,
            title: "Open Road",
            duration: "4:00",
            isrc: "US-SJ-25-002",
            language: "English",
            explicit: false,
          },
          {
            trackNo: 3,
            title: "City Echoes",
            duration: "2:55",
            isrc: "US-SJ-25-003",
            language: "English",
            explicit: true,
          },
        ],
      },
      {
        id: 3,
        title: "Midnight Blues",
        artist: "Alex Rodriguez",
        submittedDate: "3rd July 2025",
        upc: "5863544729377",
        isrc: "INH722302517",
        status: "delivered",
        isTakedown: false,
        catNo: "AR-003",
        recordLabel: "Jazz Groove",
        featuringArtist: "Smooth Sax Sam",
        lyricists: ["Alex Rodriguez"],
        albumArtwork: "/images/rocket.png",
        stores: ["Spotify", "Apple Music", "Bandcamp"],
        copyrightStores: ["YouTube Content ID"],
        tracks: [
          {
            trackNo: 1,
            title: "Blue Moon Serenade",
            duration: "5:15",
            isrc: "US-AR-25-004",
            language: "English",
            explicit: false,
          },
        ],
      },
      {
        id: 4,
        title: "Summer Vibes",
        artist: "Emma Thompson",
        submittedDate: "1st July 2025",
        upc: "5863544729378",
        isrc: "INH722302518",
        status: "rejected",
        isTakedown: false,
        catNo: "ET-004",
        recordLabel: "Pop Hits Inc.",
        featuringArtist: "None",
        lyricists: ["Emma Thompson", "Ben Carter"],
        albumArtwork: "/images/rocket.png",
        stores: [],
        copyrightStores: [],
        tracks: [
          {
            trackNo: 1,
            title: "Beach Day",
            duration: "3:05",
            isrc: "US-ET-25-005",
            language: "English",
            explicit: false,
          },
        ],
      },
      {
        id: 5,
        title: "Electronic Dreams",
        artist: "DJ Mike",
        submittedDate: "28th June 2025",
        upc: "5863544729379",
        isrc: "INH722302519",
        status: "review",
        isTakedown: false,
        catNo: "DJM-005",
        recordLabel: "Techno Beat",
        featuringArtist: "Synth Master",
        lyricists: ["DJ Mike"],
        albumArtwork: "/images/rocket.png",
        stores: ["Beatport", "SoundCloud"],
        copyrightStores: [],
        tracks: [
          {
            trackNo: 1,
            title: "Circuit Breaker",
            duration: "6:00",
            isrc: "US-DJM-25-006",
            language: "Instrumental",
            explicit: false,
          },
          {
            trackNo: 2,
            title: "Digital Love",
            duration: "5:30",
            isrc: "US-DJM-25-007",
            language: "English",
            explicit: false,
          },
        ],
      },
      {
        id: 6,
        title: "Midnight Blues",
        artist: "Alex Rodriguez",
        submittedDate: "3rd July 2025",
        upc: "5863544729377",
        isrc: "INH722302517",
        status: "approved",
        isTakedown: false,
        catNo: "AR-003",
        recordLabel: "Jazz Groove",
        featuringArtist: "Smooth Sax Sam",
        lyricists: ["Alex Rodriguez"],
        albumArtwork: "/images/rocket.png",
        stores: ["Spotify", "Apple Music", "Bandcamp"],
        copyrightStores: ["YouTube Content ID"],
        tracks: [
          {
            trackNo: 1,
            title: "Blue Moon Serenade",
            duration: "5:15",
            isrc: "US-AR-25-004",
            language: "English",
            explicit: false,
          },
        ],
      },
    ];
    let currentFilter = "all";

    // --- DOM ELEMENTS ---
    const table = $("#datatable");
    const filterTabs = document.querySelector(".nav-pills");

    // --- HELPER FUNCTIONS ---
    function getStatusIcon(status) {
      const icons = {
        delivered: "bi-check-circle-fill text-success",
        approved: "bi-check-circle-fill text-success",
        rejected: "bi-x-circle-fill text-danger",
        review: "bi-hourglass-split text-warning",
        takedown: "bi-exclamation-circle-fill text-secondary",
      };
      return `<i class="bi ${
        icons[status] || "bi-question-circle-fill text-muted"
      }" title="${status}"></i>`;
    }

    function getStatusBadge(status) {
      const config = {
        delivered: { class: "status-delivered", text: "DELIVERED" },
        approved: { class: "status-approved", text: "APPROVED" },
        review: { class: "status-review", text: "IN REVIEW" },
        rejected: { class: "status-rejected", text: "REJECTED" },
        takedown: { class: "status-takedown-table", text: "TAKEDOWN" },
      };
      const statusInfo = config[status] || {
        class: "status-review",
        text: status.toUpperCase(),
      };
      return `<span class="badge status-badge ${statusInfo.class}">${statusInfo.text}</span>`;
    }

    // --- DATATABLE INITIALIZATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: releasesData,
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          render: (data) => getStatusIcon(data),
        },
        {
          data: null,
          orderable: true,
          render: (data, type, row) => `
                        <div>
                            <div class="release-title"><a href="#" class="view-details-link" data-id="${row.id}">${row.title}</a></div>
                            <div class="release-artist">${row.artist}</div>
                        </div>`,
        },
        { data: "submittedDate", defaultContent: "N/A" },
        { data: "upc", defaultContent: "N/A" },
        { data: "isrc", defaultContent: "N/A" },
        { data: "status", render: (data) => getStatusBadge(data) },
      ],
      drawCallback: () => {
        feather.replace();
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching releases found",
        emptyTable: "No releases available",
        search: "_INPUT_",
        searchPlaceholder: "Search records...",
      },
    });

    // --- RENDER & UPDATE FUNCTIONS ---
    function applyFiltersAndDraw() {
      $.fn.dataTable.ext.search.pop(); // Clear previous custom filters
      $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (currentFilter === "all") {
          return true;
        }
        const rowStatus = releasesData[dataIndex].status;
        return rowStatus === currentFilter;
      });
      dataTableInstance.draw();
    }

    window.openReleaseModal = function (id) {
      const release = releasesData.find((r) => r.id === id);
      if (!release) return;

      document
        .getElementById("releaseModalHeader")
        .querySelector(
          ".bg-image-blurred"
        ).style.backgroundImage = `url('${release.albumArtwork}')`;
      document.getElementById("releaseAlbumArtwork").src = release.albumArtwork;
      document.getElementById("releaseTitle").textContent = release.title;
      document.getElementById("releaseArtist").textContent = release.artist;

      const releaseModalInstance = new bootstrap.Modal(
        document.getElementById("releaseModal")
      );
      releaseModalInstance.show();
    };

    // --- EVENT LISTENERS ---
    filterTabs.addEventListener("click", (e) => {
      if (e.target.matches("a.nav-link[data-filter]")) {
        e.preventDefault();
        currentFilter = e.target.dataset.filter;

        document
          .querySelectorAll(".nav-pills .nav-link")
          .forEach((tab) => tab.classList.remove("active"));
        e.target.classList.add("active");

        // Update URL for state persistence
        const url = new URL(window.location);
        url.searchParams.set("filter", currentFilter);
        window.history.pushState({}, "", url);

        applyFiltersAndDraw();
      }
    });

    $("#datatable tbody").on("click", ".view-details-link", function (e) {
      e.preventDefault();
      const id = parseInt($(this).data("id"), 10);
      openReleaseModal(id);
    });

    const destinationLabelSelect = document.getElementById(
      "destinationLabelSelect"
    );
    const createAlbumBtn = document.getElementById("createAlbumBtn");
    if (destinationLabelSelect && createAlbumBtn) {
      destinationLabelSelect.addEventListener("change", function () {
        createAlbumBtn.disabled = !this.value;
      });
      createAlbumBtn.addEventListener("click", function () {
        window.location.href = "add-release";
      });
    }

    // --- INITIAL RENDER ---
    const urlParams = new URLSearchParams(window.location.search);
    const initialFilter = urlParams.get("filter") || "all";
    currentFilter = initialFilter;

    const activeLink = document.querySelector(
      `.nav-pills .nav-link[data-filter="${initialFilter}"]`
    );
    if (activeLink) {
      document
        .querySelectorAll(".nav-pills .nav-link")
        .forEach((tab) => tab.classList.remove("active"));
      activeLink.classList.add("active");
    }

    applyFiltersAndDraw();
    feather.replace();
  }
});

// artists-page js
$(document).ready(function () {
  let table = $("#artistTable").DataTable({
    destroy: true,
    ajax: "/superadmin/api/artists", // backend route returning JSON
    columns: [
      {
        data: "id",
        render: function (data) {
          return `<input type="checkbox" class="form-check-input artist-checkbox" value="${data}">`;
        },
        orderable: false,
      },
      {
        data: null,
        render: function (row) {
          return `
                        <div class="artist-profile d-flex align-items-center">
                            <img src="${row.profile_image}" alt="${row.name}" class="artist-image me-2">
                            <div class="artist-name fw-bold">${row.name}</div>
                        </div>
                    `;
        },
      },
      {
        data: "release_count",
        className: "text-center",
        render: function (d) {
          return `<span class="releases-badge badge">${d} releases</span>`;
        },
      },
    ],
    paging: true, // enable pagination
    searching: true, // enable search box
    ordering: true, // enable sorting
    responsive: true, // mobile friendly
    autoWidth: false, // keeps column width consistent
    drawCallback: function () {
      // Re-bind checkbox events or icon replacements after redraw
      $(".artist-checkbox")
        .off("change")
        .on("change", function () {
          let selected = $(".artist-checkbox:checked").length;
          if (selected > 0) {
            $("#deleteSelectedBtn").show();
          } else {
            $("#deleteSelectedBtn").hide();
          }
        });
    },
  });

  // "Select all" checkbox
  $("#selectAll").on("click", function () {
    let checked = this.checked;
    $(".artist-checkbox").prop("checked", checked).trigger("change");
  });
});

$(document).ready(function () {
  // Show alert helper
  function showArtistAlert(type, message) {
    let alertHtml = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
    $("#artistAlertBox").html(alertHtml);
  }

  // Remove previous submit handler before adding new one
  $(document).off("submit", "#createArtistForm");
  $(document).on("submit", "#createArtistForm", function (e) {
    e.preventDefault();

    let formData = new FormData(this); // needed for file upload

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (res) {
        if (res.success) {
          showArtistAlert("success", res.message);
          $("#createArtistForm")[0].reset();
          $("#imagePreview").hide();
          $("#createArtistModal").modal("hide"); // close modal on success
        } else if (res.errors) {
          let errorMessages = Object.values(res.errors).join("<br>");
          showArtistAlert("danger", errorMessages);
        }
      },
      error: function (xhr) {
        let msg = "Something went wrong!";
        if (xhr.responseJSON && xhr.responseJSON.message) {
          msg = xhr.responseJSON.message;
        }
        showArtistAlert("danger", msg);
      },
    });
  });

  // Image preview (bind safely once)
  $(document).off("change", "#imageInput");
  $(document).on("change", "#imageInput", function () {
    const [file] = this.files;
    if (file) {
      $("#imagePreview").attr("src", URL.createObjectURL(file)).show();
    }
  });
});

// labels-page js
$(document).ready(function () {
  let table = $("#labelTable").DataTable({
    destroy:true,
    ajax: "/superadmin/api/labels", // your controller endpoint
    columns: [
      {
        data: "id",
        render: function (data) {
          return `<input type="checkbox" class="form-check-input label-checkbox" value="${data}">`;
        },
        orderable: false,
      },
      {
        data: null,
        render: function (data) {
          return `
                        <div class="label-profile">
                            <img src="${data.logo}" alt="${data.name}" class="label-image">
                            <div>
                                <div class="label-name">${data.name}</div>
                            </div>
                        </div>
                    `;
        },
      },
      {
        data: "release_count",
        className: "text-center",
        render: function (data) {
          return `<span class="releases-badge">${data} releases</span>`;
        },
      },
    ],
  });

  // Handle "Select All"
  $("#selectAll").on("change", function () {
    const checked = this.checked;
    $(".label-checkbox").prop("checked", checked);
  });

  // Expose reload for outside use
  window.reloadLabels = function () {
    table.ajax.reload(null, false); // false keeps current pagination
  };
});

$(document).ready(function () {
  // show alert helper
  function showLabelAlert(type, message) {
    let alertHtml = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>`;
    $("#labelAlertBox").html(alertHtml);
  }

  // prevent duplicate bindings
  $(document).off("submit", 'form[action*="create-label"]');
  $(document).on("submit", 'form[action*="create-label"]', function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (res) {
        if (res.success) {
          showLabelAlert("success", res.message);
          $('form[action*="create-label"]')[0].reset();
          $("#imagePreview").hide();
          $("#createlabelModal").modal("hide"); // optional: auto-close modal
        } else if (res.errors) {
          let errorMessages = Object.values(res.errors).join("<br>");
          showLabelAlert("danger", errorMessages);
        }
      },
      error: function (xhr) {
        let msg = "Something went wrong!";
        if (xhr.responseJSON && xhr.responseJSON.message) {
          msg = xhr.responseJSON.message;
        }
        showLabelAlert("danger", msg);
      },
    });
  });

  // image preview
  $(document).off("change", "#imageInput");
  $(document).on("change", "#imageInput", function () {
    const [file] = this.files;
    if (file) {
      $("#imagePreview").attr("src", URL.createObjectURL(file)).show();
    }
  });
});

// accounts-page js

document.addEventListener("DOMContentLoaded", function () {
  $("#claimingTable").DataTable({
    destroy: true,
    processing: true,
    serverSide: false,
    ajax: "/superadmin/api/accounts",
    columns: [
      {
        data: "status",
        render: function (data) {
          if (data === "Active") {
            return '<i data-feather="check-circle" class="text-success"></i>';
          } else {
            return '<i data-feather="x-circle" class="text-danger"></i>';
          }
        },
        className: "text-center",
      },
      { data: "company_name" },
      { data: "primary_label_name" },
      { data: "agreement_start_date" },
      { data: "agreement_end_date" },
      {
        data: "status",
        render: function (data) {
          let badge =
            data === "Active"
              ? '<span class="badge bg-success">Active</span>'
              : '<span class="badge bg-danger">Inactive</span>';
          return badge;
        },
      },
    ],
    drawCallback: function () {
      feather.replace(); // re-render feather icons
    },
    paging: true,
    searching: true,
    ordering: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search accounts...",
    },
  });
});

$(document).ready(function () {
  $("#claimingRequestForm").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status === "error") {
          let errorHtml = '<div class="alert alert-danger">';
          if (response.errors) {
            $.each(response.errors, function (key, error) {
              errorHtml += `<div>${error}</div>`;
            });
          } else if (response.message) {
            errorHtml += `<div>${response.message}</div>`;
          }
          errorHtml += "</div>";
          $("#labelAlertBox").html(errorHtml);
        } else {
          $("#labelAlertBox").html(
            '<div class="alert alert-success">User registered successfully.</div>'
          );
          $("#claimingRequestForm")[0].reset();
          $("#claimingRequestModal").modal("hide");
        }
      },
      error: function () {
        $("#labelAlertBox").html(
          '<div class="alert alert-danger">Something went wrong. Try again.</div>'
        );
      },
    });
  });
});

// claiming-req js
document.addEventListener("DOMContentLoaded", function () {
  // This is the unique container for your page
  const claimReqPageContainer = document.querySelector(".admin-claim-req-page");

  // By wrapping all the code in this 'if' block, it will ONLY run on the claiming request page.
  if (claimReqPageContainer) {
    // --- DATA ---
    let claimingRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artistName: "Orion Sun",
        isrc: "US1232500004",
        instagram: "https://instagram.com/orionsun",
        facebook: "https://facebook.com/orionsun",
        status: "Pending",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artistName: "Cyber Lazer",
        isrc: "US1232500005",
        instagram: "https://instagram.com/cyberlazer",
        facebook: "",
        status: "Pending",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artistName: "Ghost FM",
        isrc: "US1232500006",
        instagram: "",
        facebook: "https://facebook.com/ghostfm",
        status: "Rejected",
      },
    ];

    // --- DOM ELEMENTS ---
    const tableBody = document.getElementById("tableBody");
    const exportCsvBtn = document.getElementById("exportCsvBtn");
    const newClaimForm = document.querySelector("#claimingRequestModal form");
    const newClaimModal = new bootstrap.Modal(
      document.getElementById("claimingRequestModal")
    );

    // --- RENDER & UPDATE FUNCTIONS ---
    function renderTable(data) {
      if (!data || data.length === 0) {
        // FIXED: colspan changed from 6 to 5 to match the table headers
        tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i data-feather="inbox"></i>
                            <div>
                                <h5 class="mb-2">No Claiming Requests found</h5>
                                <p class="mb-0">Click 'New Claiming Request' to get started.</p>
                            </div>
                        </td>
                    </tr>`;
      } else {
        tableBody.innerHTML = data
          .map(
            (request) => `
                    <tr>
                        <td class="text-center align-middle">${getStatusIcon(
                          request.status
                        )}</td>
                        <td class="align-middle">
                            <div>
                                <div class="release-title">${
                                  request.songName
                                }</div>
                                <div class="release-artist text-muted small">${
                                  request.artistName
                                }</div>
                            </div>
                        </td>
                        <td class="align-middle">${request.isrc || "N/A"}</td>
                        <td class="align-middle">
                            ${
                              request.instagram
                                ? `<a href="${request.instagram}" target="_blank" class="social-link me-2 fs-5"><i class="bi bi-instagram"></i></a>`
                                : ""
                            }
                            ${
                              request.facebook
                                ? `<a href="${request.facebook}" target="_blank" class="social-link fs-5"><i class="bi bi-facebook"></i></a>`
                                : ""
                            }
                        </td>
                        <td class="align-middle">${getStatusBadge(
                          request.status
                        )}</td>
                    </tr>
                `
          )
          .join("");
      }
      feather.replace();
    }

    function getStatusIcon(status) {
      const icons = {
        Approved: "check-circle",
        Pending: "clock",
        Rejected: "x-circle",
      };
      const colors = {
        Approved: "text-success",
        Pending: "text-warning",
        Rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${
        colors[status] || "text-muted"
      }"></i>`;
    }

    function getStatusBadge(status) {
      const badgeClasses = {
        Approved: "success",
        Pending: "warning",
        Rejected: "danger",
      };
      return `<span class="badge bg-${
        badgeClasses[status] || "secondary"
      }">${status}</span>`;
    }

    // --- EVENT LISTENERS ---

    // ADDED: Logic to handle new claim form submission
    newClaimForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const newRequest = {
        id: Date.now(),
        artistName: document.getElementById("artistName").value,
        songName: document.getElementById("songName").value,
        isrc: document.getElementById("upc").value, // Matches your HTML id="upc"
        instagram: document.getElementById("instagramLink").value,
        facebook: document.getElementById("facebookLink").value,
        status: "Pending", // New requests are always pending
      };

      claimingRequests.unshift(newRequest); // Add to the beginning of the array
      renderTable(claimingRequests); // Re-render the table
      newClaimForm.reset(); // Clear the form
      newClaimModal.hide(); // Hide the modal
    });

    // ADDED: Logic for CSV export
    exportCsvBtn.addEventListener("click", function () {
      const headers = [
        "ID",
        "Song Name",
        "Artist Name",
        "ISRC",
        "Instagram",
        "Facebook",
        "Status",
      ];
      const rows = claimingRequests.map((req) => [
        req.id,
        req.songName,
        req.artistName,
        req.isrc,
        req.instagram,
        req.facebook,
        req.status,
      ]);

      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((e) => e.join(",")).join("\n");

      const link = document.createElement("a");
      link.setAttribute("href", encodeURI(csvContent));
      link.setAttribute("download", "claiming-requests.csv");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    // --- INITIAL RENDER ---
    renderTable(claimingRequests);
  }
});

// relocation-request js

document.addEventListener("DOMContentLoaded", function () {
  // This is the unique container for your relocation page
  const relocReqPageContainer = document.querySelector(".admin-reloc-req-page");

  // This ensures the code ONLY runs on the relocation request page
  if (relocReqPageContainer) {
    // --- DATA ---
    const relocationRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artistName: "Orion Sun",
        isrc: "US1232500004",
        instagram: "https://instagram.com/orionsun",
        facebook: "https://facebook.com/orionsun",
        status: "Done",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artistName: "Cyber Lazer",
        isrc: "US1232500005",
        instagram: "https://instagram.com/cyberlazer",
        facebook: "",
        status: "Pending",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artistName: "Ghost FM",
        isrc: "US1232500006",
        instagram: "",
        facebook: "https://facebook.com/ghostfm",
        status: "Rejected",
      },
    ];

    // --- DOM ELEMENTS ---
    const tableBody = document.getElementById("relocationTableBody"); // FIXED: Using unique ID
    const exportCsvBtn = document.getElementById("exportCsvBtn");
    const newRelocForm = document.querySelector("#relocationRequestModal form");
    const newRelocModal = new bootstrap.Modal(
      document.getElementById("relocationRequestModal")
    );

    // --- RENDER & UPDATE FUNCTIONS ---
    function renderTable(data) {
      if (!data || data.length === 0) {
        // FIXED: colspan changed from 6 to 5
        tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i data-feather="inbox"></i>
                            <div>
                                <h5 class="mb-2">No relocation requests found</h5>
                                <p class="mb-0">Click 'New Relocation Request' to get started.</p>
                            </div>
                        </td>
                    </tr>`;
      } else {
        tableBody.innerHTML = data
          .map(
            (request) => `
                    <tr>
                        <td class="text-center align-middle">${getStatusIcon(
                          request.status
                        )}</td>
                        <td class="align-middle">
                            <div>
                                <div class="release-title">${
                                  request.songName
                                }</div>
                                <div class="release-artist text-muted small">${
                                  request.artistName
                                }</div>
                            </div>
                        </td>
                        <td class="align-middle">${request.isrc || "N/A"}</td>
                        <td class="align-middle">
                            ${
                              request.instagram
                                ? `<a href="${request.instagram}" target="_blank" class="social-link me-2 fs-5"><i class="bi bi-instagram"></i></a>`
                                : ""
                            }
                            ${
                              request.facebook
                                ? `<a href="${request.facebook}" target="_blank" class="social-link fs-5"><i class="bi bi-facebook"></i></a>`
                                : ""
                            }
                        </td>
                        <td class="align-middle">${getStatusBadge(
                          request.status
                        )}</td>
                    </tr>
                `
          )
          .join("");
      }
      feather.replace();
    }

    function getStatusIcon(status) {
      const icons = {
        Done: "check-circle",
        Pending: "clock",
        Rejected: "x-circle",
      };
      const colors = {
        Done: "text-success",
        Pending: "text-warning",
        Rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${
        colors[status] || "text-muted"
      }"></i>`;
    }

    function getStatusBadge(status) {
      const badgeClasses = {
        Done: "success",
        Pending: "warning",
        Rejected: "danger",
      };
      return `<span class="badge bg-${
        badgeClasses[status] || "secondary"
      }">${status}</span>`;
    }

    // --- EVENT LISTENERS ---

    // ADDED: Form submission logic
    newRelocForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const newRequest = {
        id: Date.now(),
        artistName: this.querySelector("#artistName").value,
        songName: this.querySelector("#songName").value,
        isrc: this.querySelector("#ISRC").value,
        instagram: this.querySelector("#instagramLink").value,
        facebook: this.querySelector("#facebookLink").value,
        status: "Pending",
      };
      relocationRequests.unshift(newRequest);
      renderTable(relocationRequests);
      newRelocForm.reset();
      newRelocModal.hide();
    });

    // ADDED: CSV export logic
    exportCsvBtn.addEventListener("click", function () {
      const headers = [
        "ID",
        "Song Name",
        "Artist Name",
        "ISRC",
        "Instagram",
        "Facebook",
        "Status",
      ];
      const rows = relocationRequests.map((req) => [
        req.id,
        req.songName,
        req.artistName,
        req.isrc,
        req.instagram,
        req.facebook,
        req.status,
      ]);
      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((e) => e.join(",")).join("\n");

      const link = document.createElement("a");
      link.setAttribute("href", encodeURI(csvContent));
      link.setAttribute("download", "relocation-requests.csv");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    // --- INITIAL RENDER ---
    renderTable(relocationRequests);
  }
});

// merge-request js

document.addEventListener("DOMContentLoaded", function () {
  // This is the unique container for your Claim/Merge page
  const pageContainer = document.querySelector(".admin-claim-merge-req-page");

  // This ensures the code ONLY runs on the Claim/Merge page
  if (pageContainer) {
    // --- DATA ---
    let claimingRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        isrc: "US1232500004",
        instagramAudio: "https://instagram.com/audio/123",
        reelMerge: "https://instagram.com/reel/xyz",
        matchingTime: "00:15-00:45",
        status: "Approved",
      },
      {
        id: 2,
        songName: "Neon Tides",
        isrc: "US1232500005",
        instagramAudio: "https://instagram.com/audio/456",
        reelMerge: "https://instagram.com/reel/abc",
        matchingTime: "00:30-01:00",
        status: "Pending",
      },
      {
        id: 3,
        songName: "Lost Signal",
        isrc: "US1232500006",
        instagramAudio: "https://instagram.com/audio/789",
        reelMerge: "https://instagram.com/reel/def",
        matchingTime: "01:00-01:15",
        status: "Rejected",
      },
    ];

    // --- DOM ELEMENTS ---
    const tableBody = document.getElementById("claimMergeTableBody"); // FIXED: Using unique ID
    const paginationText = document.getElementById("pagination-text");
    const claimForm = document.getElementById("newClaimForm");
    const newClaimModal = new bootstrap.Modal(
      document.getElementById("newClaimRequestModal")
    );
    const exportCsvBtn = document.getElementById("exportCsvBtn");

    // --- HELPER FUNCTIONS ---
    function getStatusIcon(status) {
      const icons = {
        Approved: "check-circle",
        Pending: "clock",
        Rejected: "x-circle",
      };
      const colors = {
        Approved: "text-success",
        Pending: "text-warning",
        Rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${
        colors[status] || "text-muted"
      }"></i>`;
    }

    function getStatusBadge(status) {
      const badgeClasses = {
        Approved: "success",
        Pending: "warning",
        Rejected: "danger",
      };
      const textClass = status === "Pending" ? "text-dark" : "";
      return `<span class="badge bg-${
        badgeClasses[status] || "secondary"
      } ${textClass}">${status}</span>`;
    }

    function exportToCsv(filename, data) {
      if (!data || data.length === 0) {
        alert("No data to export.");
        return;
      }
      const headers = [
        "ID",
        "Song Name",
        "ISRC",
        "Instagram Audio Link",
        "Reel Merge Link",
        "Matching Time",
        "Status",
      ];
      const rows = data.map((req) => [
        req.id,
        req.songName,
        req.isrc,
        req.instagramAudio,
        req.reelMerge,
        req.matchingTime,
        req.status,
      ]);
      const escapeCsvValue = (value) => {
        const stringValue = String(value || "");
        if (
          stringValue.includes(",") ||
          stringValue.includes('"') ||
          stringValue.includes("\n")
        ) {
          return `"${stringValue.replace(/"/g, '""')}"`;
        }
        return stringValue;
      };
      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((r) => r.map(escapeCsvValue).join(",")).join("\n");

      const encodedUri = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", filename);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }

    // --- RENDER & UPDATE FUNCTIONS ---
    function renderTable(data) {
      if (!data || data.length === 0) {
        // FIXED: colspan changed from 8 to 7
        tableBody.innerHTML = `
                    <tr>
                        <td colspan="7" class="empty-state">
                            <i data-feather="inbox"></i>
                            <div>
                                <h5 class="mb-2">No Claiming Requests Found</h5>
                                <p class="mb-0">Click 'New Claiming Request' to get started.</p>
                            </div>
                        </td>
                    </tr>`;
      } else {
        tableBody.innerHTML = data
          .map(
            (request) => `
                    <tr>
                        <td class="text-center">${getStatusIcon(
                          request.status
                        )}</td>
                        <td>
                            <div class="release-title">
                                <a href="#">${request.songName}</a>
                            </div>
                        </td>
                        <td>${request.isrc || "N/A"}</td>
                        <td class="text-center">
                            ${
                              request.instagramAudio
                                ? `<a href="${request.instagramAudio}" target="_blank" class="link-icon" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i></a>`
                                : "N/A"
                            }
                        </td>
                        <td class="text-center">
                            ${
                              request.reelMerge
                                ? `<a href="${request.reelMerge}" target="_blank" class="link-icon" title="Reel Merge"><i class="bi bi-camera-reels"></i></a>`
                                : "N/A"
                            }
                        </td>
                        <td>${request.matchingTime || "N/A"}</td>
                        <td>${getStatusBadge(request.status)}</td>
                    </tr>
                `
          )
          .join("");
      }
      feather.replace();
      updatePaginationText(data.length, data.length);
    }

    function updatePaginationText(end, total) {
      paginationText.innerHTML = `Showing <strong>1</strong> to <strong>${end}</strong> of <strong>${total}</strong> entries`;
    }

    // --- EVENT LISTENERS ---
    claimForm.addEventListener("submit", function (event) {
      event.preventDefault();
      const newRequest = {
        id: Date.now(),
        songName: document.getElementById("songName").value,
        isrc: document.getElementById("isrc").value,
        instagramAudio: document.getElementById("instagramAudio").value,
        reelMerge: document.getElementById("reelMerge").value,
        matchingTime: document.getElementById("matchingTime").value,
        status: "Pending",
      };
      claimingRequests.push(newRequest);
      renderTable(claimingRequests);
      claimForm.reset();
      newClaimModal.hide();
    });

    // ADDED: Event listener for the export button
    exportCsvBtn.addEventListener("click", function () {
      exportToCsv("claim-merge-requests.csv", claimingRequests);
    });

    // --- INITIAL RENDER ---
    renderTable(claimingRequests);
  }
});

// youtube js
document.addEventListener("DOMContentLoaded", function () {
  // This is the unique container for your YouTube page
  const youtubePageContainer = document.querySelector(".admin-youtube-page");

  // This ensures the code ONLY runs on the YouTube page
  if (youtubePageContainer) {
    // --- DATA ---
    const conflictRequests = [
      {
        id: 1,
        category: "Ownership conflict",
        assetTitle: "Cosmic Drift",
        artist: "Astro Beats",
        assetId: "90736897913",
        upc: "198009123456",
        isrc: "USAT22312345",
        otherParty: "The Orchard",
        dailyViews: "79K",
        expiry: "2 days",
        status: "Action Required",
        albumCoverUrl: "https://placehold.co/80x80/3498db/ffffff?text=C",
      },
      {
        id: 2,
        category: "Policy",
        assetTitle: "Ocean Tides",
        artist: "Deep Wave",
        assetId: "3478239381",
        upc: "198009654321",
        isrc: "USAT22354321",
        otherParty: "Believe",
        dailyViews: "3K",
        expiry: "-",
        status: "Resolved",
        albumCoverUrl: "https://placehold.co/80x80/1abc9c/ffffff?text=O",
      },
      {
        id: 3,
        category: "Ownership conflict",
        assetTitle: "City Lights",
        artist: "Urban Glow",
        assetId: "3478239381",
        upc: "198009789012",
        isrc: "USAT22398765",
        otherParty: "CD Baby",
        dailyViews: "1.2K",
        expiry: "15 days",
        status: "In Review",
        albumCoverUrl: "https://placehold.co/80x80/9b59b6/ffffff?text=C",
      },
      {
        id: 4,
        category: "Metadata Error",
        assetTitle: "Desert Mirage",
        artist: "Sahara Echo",
        assetId: "89321756430",
        upc: "198001112233",
        isrc: "USAT22445566",
        otherParty: "TuneCore",
        dailyViews: "58K",
        expiry: "5 days",
        status: "Action Required",
        albumCoverUrl: "https://placehold.co/80x80/e67e22/ffffff?text=D",
      },
      {
        id: 5,
        category: "Ownership conflict",
        assetTitle: "Electric Horizon",
        artist: "Volt Squad",
        assetId: "98574623109",
        upc: "198002244466",
        isrc: "USAT22449900",
        otherParty: "The Orchard",
        dailyViews: "12K",
        expiry: "7 days",
        status: "In Review",
        albumCoverUrl: "https://placehold.co/80x80/f39c12/ffffff?text=E",
      },
    ];

    const territoriesByRegion = {
      Africa: [
        { name: "Algeria", code: "DZ" },
        { name: "Angola", code: "AO" },
        { name: "Benin", code: "BJ" },
        { name: "Botswana", code: "BW" },
        { name: "Burkina Faso", code: "BF" },
        { name: "Burundi", code: "BI" },
        { name: "Cabo Verde", code: "CV" },
        { name: "Cameroon", code: "CM" },
        { name: "Central African Republic", code: "CF" },
        { name: "Chad", code: "TD" },
        { name: "Comoros", code: "KM" },
        { name: "Congo", code: "CG" },
        { name: "Congo (DRC)", code: "CD" },
        { name: "Côte d'Ivoire", code: "CI" },
        { name: "Djibouti", code: "DJ" },
        { name: "Egypt", code: "EG" },
        { name: "Equatorial Guinea", code: "GQ" },
        { name: "Eritrea", code: "ER" },
        { name: "Eswatini", code: "SZ" },
        { name: "Ethiopia", code: "ET" },
        { name: "Gabon", code: "GA" },
        { name: "Gambia", code: "GM" },
        { name: "Ghana", code: "GH" },
        { name: "Guinea", code: "GN" },
        { name: "Guinea-Bissau", code: "GW" },
        { name: "Kenya", code: "KE" },
        { name: "Lesotho", code: "LS" },
        { name: "Liberia", code: "LR" },
        { name: "Libya", code: "LY" },
        { name: "Madagascar", code: "MG" },
        { name: "Malawi", code: "MW" },
        { name: "Mali", code: "ML" },
        { name: "Mauritania", code: "MR" },
        { name: "Mauritius", code: "MU" },
        { name: "Mayotte", code: "YT" },
        { name: "Morocco", code: "MA" },
        { name: "Mozambique", code: "MZ" },
        { name: "Namibia", code: "NA" },
        { name: "Niger", code: "NE" },
        { name: "Nigeria", code: "NG" },
        { name: "Réunion", code: "RE" },
        { name: "Rwanda", code: "RW" },
        { name: "Saint Helena", code: "SH" },
        { name: "Sao Tome and Principe", code: "ST" },
        { name: "Senegal", code: "SN" },
        { name: "Seychelles", code: "SC" },
        { name: "Sierra Leone", code: "SL" },
        { name: "Somalia", code: "SO" },
        { name: "South Africa", code: "ZA" },
        { name: "South Sudan", code: "SS" },
        { name: "Sudan", code: "SD" },
        { name: "Tanzania", code: "TZ" },
        { name: "Togo", code: "TG" },
        { name: "Tunisia", code: "TN" },
        { name: "Uganda", code: "UG" },
        { name: "Zambia", code: "ZM" },
        { name: "Zimbabwe", code: "ZW" },
      ],
      Antarctica: [
        { name: "Antarctica", code: "AQ" },
        { name: "French Southern Territories", code: "TF" },
        { name: "South Georgia and the South Sandwich Islands", code: "GS" },
      ],
      Asia: [
        { name: "Afghanistan", code: "AF" },
        { name: "Armenia", code: "AM" },
        { name: "Azerbaijan", code: "AZ" },
        { name: "Bahrain", code: "BH" },
        { name: "Bangladesh", code: "BD" },
        { name: "Bhutan", code: "BT" },
        { name: "British Indian Ocean Territory", code: "IO" },
        { name: "Brunei", code: "BN" },
        { name: "Cambodia", code: "KH" },
        { name: "China", code: "CN" },
        { name: "Cyprus", code: "CY" },
        { name: "Georgia", code: "GE" },
        { name: "Hong Kong", code: "HK" },
        { name: "India", code: "IN" },
        { name: "Indonesia", code: "ID" },
        { name: "Iran", code: "IR" },
        { name: "Iraq", code: "IQ" },
        { name: "Israel", code: "IL" },
        { name: "Japan", code: "JP" },
        { name: "Jordan", code: "JO" },
        { name: "Kazakhstan", code: "KZ" },
        { name: "Kuwait", code: "KW" },
        { name: "Kyrgyzstan", code: "KG" },
        { name: "Laos", code: "LA" },
        { name: "Lebanon", code: "LB" },
        { name: "Macao", code: "MO" },
        { name: "Malaysia", code: "MY" },
        { name: "Maldives", code: "MV" },
        { name: "Mongolia", code: "MN" },
        { name: "Myanmar", code: "MM" },
        { name: "Nepal", code: "NP" },
        { name: "North Korea", code: "KP" },
        { name: "Oman", code: "OM" },
        { name: "Pakistan", code: "PK" },
        { name: "Palestine", code: "PS" },
        { name: "Philippines", code: "PH" },
        { name: "Qatar", code: "QA" },
        { name: "Saudi Arabia", code: "SA" },
        { name: "Singapore", code: "SG" },
        { name: "South Korea", code: "KR" },
        { name: "Sri Lanka", code: "LK" },
        { name: "Syria", code: "SY" },
        { name: "Taiwan", code: "TW" },
        { name: "Tajikistan", code: "TJ" },
        { name: "Thailand", code: "TH" },
        { name: "Timor-Leste", code: "TL" },
        { name: "Turkey", code: "TR" },
        { name: "Turkmenistan", code: "TM" },
        { name: "United Arab Emirates", code: "AE" },
        { name: "Uzbekistan", code: "UZ" },
        { name: "Vietnam", code: "VN" },
        { name: "Yemen", code: "YE" },
      ],
      Europe: [
        { name: "Åland Islands", code: "AX" },
        { name: "Albania", code: "AL" },
        { name: "Andorra", code: "AD" },
        { name: "Austria", code: "AT" },
        { name: "Belarus", code: "BY" },
        { name: "Belgium", code: "BE" },
        { name: "Bosnia and Herzegovina", code: "BA" },
        { name: "Bulgaria", code: "BG" },
        { name: "Croatia", code: "HR" },
        { name: "Czechia", code: "CZ" },
        { name: "Denmark", code: "DK" },
        { name: "Estonia", code: "EE" },
        { name: "Faroe Islands", code: "FO" },
        { name: "Finland", code: "FI" },
        { name: "France", code: "FR" },
        { name: "Germany", code: "DE" },
        { name: "Gibraltar", code: "GI" },
        { name: "Greece", code: "GR" },
        { name: "Guernsey", code: "GG" },
        { name: "Holy See", code: "VA" },
        { name: "Hungary", code: "HU" },
        { name: "Iceland", code: "IS" },
        { name: "Ireland", code: "IE" },
        { name: "Isle of Man", code: "IM" },
        { name: "Italy", code: "IT" },
        { name: "Jersey", code: "JE" },
        { name: "Latvia", code: "LV" },
        { name: "Liechtenstein", code: "LI" },
        { name: "Lithuania", code: "LT" },
        { name: "Luxembourg", code: "LU" },
        { name: "Malta", code: "MT" },
        { name: "Moldova", code: "MD" },
        { name: "Monaco", code: "MC" },
        { name: "Montenegro", code: "ME" },
        { name: "Netherlands", code: "NL" },
        { name: "North Macedonia", code: "MK" },
        { name: "Norway", code: "NO" },
        { name: "Poland", code: "PL" },
        { name: "Portugal", code: "PT" },
        { name: "Romania", code: "RO" },
        { name: "Russia", code: "RU" },
        { name: "San Marino", code: "SM" },
        { name: "Serbia", code: "RS" },
        { name: "Slovakia", code: "SK" },
        { name: "Slovenia", code: "SI" },
        { name: "Spain", code: "ES" },
        { name: "Svalbard and Jan Mayen", code: "SJ" },
        { name: "Sweden", code: "SE" },
        { name: "Switzerland", code: "CH" },
        { name: "Ukraine", code: "UA" },
        { name: "United Kingdom", code: "GB" },
      ],
      "North America": [
        { name: "Anguilla", code: "AI" },
        { name: "Antigua and Barbuda", code: "AG" },
        { name: "Aruba", code: "AW" },
        { name: "Bahamas", code: "BS" },
        { name: "Barbados", code: "BB" },
        { name: "Belize", code: "BZ" },
        { name: "Bermuda", code: "BM" },
        { name: "Bonaire", code: "BQ" },
        { name: "Canada", code: "CA" },
        { name: "Cayman Islands", code: "KY" },
        { name: "Costa Rica", code: "CR" },
        { name: "Cuba", code: "CU" },
        { name: "Curaçao", code: "CW" },
        { name: "Dominica", code: "DM" },
        { name: "Dominican Republic", code: "DO" },
        { name: "El Salvador", code: "SV" },
        { name: "Greenland", code: "GL" },
        { name: "Grenada", code: "GD" },
        { name: "Guadeloupe", code: "GP" },
        { name: "Guatemala", code: "GT" },
        { name: "Haiti", code: "HT" },
        { name: "Honduras", code: "HN" },
        { name: "Jamaica", code: "JM" },
        { name: "Martinique", code: "MQ" },
        { name: "Mexico", code: "MX" },
        { name: "Montserrat", code: "MS" },
        { name: "Nicaragua", code: "NI" },
        { name: "Panama", code: "PA" },
        { name: "Puerto Rico", code: "PR" },
        { name: "Saint Barthélemy", code: "BL" },
        { name: "Saint Kitts and Nevis", code: "KN" },
        { name: "Saint Lucia", code: "LC" },
        { name: "Saint Martin", code: "MF" },
        { name: "Saint Pierre and Miquelon", code: "PM" },
        { name: "Saint Vincent and the Grenadines", code: "VC" },
        { name: "Sint Maarten", code: "SX" },
        { name: "Trinidad and Tobago", code: "TT" },
        { name: "Turks and Caicos Islands", code: "TC" },
        { name: "United States", code: "US" },
        { name: "U.S. Virgin Islands", code: "VI" },
      ],
      Oceania: [
        { name: "American Samoa", code: "AS" },
        { name: "Australia", code: "AU" },
        { name: "Christmas Island", code: "CX" },
        { name: "Cocos (Keeling) Islands", code: "CC" },
        { name: "Cook Islands", code: "CK" },
        { name: "Fiji", code: "FJ" },
        { name: "French Polynesia", code: "PF" },
        { name: "Guam", code: "GU" },
        { name: "Kiribati", code: "KI" },
        { name: "Marshall Islands", code: "MH" },
        { name: "Micronesia", code: "FM" },
        { name: "Nauru", code: "NR" },
        { name: "New Caledonia", code: "NC" },
        { name: "New Zealand", code: "NZ" },
        { name: "Niue", code: "NU" },
        { name: "Norfolk Island", code: "NF" },
        { name: "Northern Mariana Islands", code: "MP" },
        { name: "Palau", code: "PW" },
        { name: "Papua New Guinea", code: "PG" },
        { name: "Pitcairn", code: "PN" },
        { name: "Samoa", code: "WS" },
        { name: "Solomon Islands", code: "SB" },
        { name: "Tokelau", code: "TK" },
        { name: "Tonga", code: "TO" },
        { name: "Tuvalu", code: "TV" },
        { name: "U.S. Minor Outlying Islands", code: "UM" },
        { name: "Vanuatu", code: "VU" },
        { name: "Wallis and Futuna", code: "WF" },
      ],
      "South America": [
        { name: "Argentina", code: "AR" },
        { name: "Bolivia", code: "BO" },
        { name: "Brazil", code: "BR" },
        { name: "Chile", code: "CL" },
        { name: "Colombia", code: "CO" },
        { name: "Ecuador", code: "EC" },
        { name: "Falkland Islands", code: "FK" },
        { name: "French Guiana", code: "GF" },
        { name: "Guyana", code: "GY" },
        { name: "Paraguay", code: "PY" },
        { name: "Peru", code: "PE" },
        { name: "Suriname", code: "SR" },
        { name: "Uruguay", code: "UY" },
        { name: "Venezuela", code: "VE" },
      ],
    };
    const totalCountries = Object.values(territoriesByRegion).reduce(
      (sum, region) => sum + region.length,
      0
    );
    let sortState = { key: null, direction: "asc" };

    // --- HELPER FUNCTIONS ---
    function getStatusBadge(status) {
      let badgeClass = "bg-secondary-subtle text-secondary-emphasis"; // Default
      if (status === "Action Required")
        badgeClass = "bg-danger-subtle text-danger-emphasis";
      else if (status === "Resolved")
        badgeClass = "bg-success-subtle text-success-emphasis";
      else if (status === "In Review")
        badgeClass = "bg-warning-subtle text-warning-emphasis";
      return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
    }

    function parseViews(views) {
      if (typeof views !== "string") return 0;
      const num = parseFloat(views.toUpperCase());
      return views.toUpperCase().includes("K") ? num * 1000 : num;
    }
    function parseExpiry(expiry) {
      if (typeof expiry !== "string" || expiry === "-") return Infinity;
      return parseInt(expiry);
    }
    function updateTerritoryCounter() {
      const container = document.getElementById("conflictResolutionOffcanvas");
      if (!container) return;
      const selectedCount = container.querySelectorAll(
        ".country-checkbox:checked"
      ).length;
      container.querySelector(
        "#territoryCounter"
      ).textContent = `${selectedCount} contested countries out of ${totalCountries} delivered`;
    }
    function updateSortIcons() {
      document
        .querySelectorAll(".sort-icon")
        .forEach((icon) => icon.classList.remove("active", "asc", "desc"));
      if (sortState.key) {
        const activeHeader = document.querySelector(
          `.sortable-header[data-sort="${sortState.key}"]`
        );
        if (activeHeader)
          activeHeader
            .querySelector(".sort-icon")
            .classList.add("active", sortState.direction);
      }
    }
    function addTerritoryEventListeners() {
      const container = document.getElementById("conflictResolutionOffcanvas");
      if (!container) return;
      container.querySelectorAll(".region-checkbox").forEach((rcb) =>
        rcb.addEventListener("change", function () {
          const region = this.dataset.region;
          container
            .querySelectorAll(`.country-checkbox[data-region="${region}"]`)
            .forEach((ccb) => (ccb.checked = this.checked));
          updateTerritoryCounter();
        })
      );
      container.querySelectorAll(".country-checkbox").forEach((ccb) =>
        ccb.addEventListener("change", function () {
          const region = this.dataset.region;
          const allInRegion = Array.from(
            container.querySelectorAll(
              `.country-checkbox[data-region="${region}"]`
            )
          ).every((cb) => cb.checked);
          container.querySelector(
            `.region-checkbox[data-region="${region}"]`
          ).checked = allInRegion;
          updateTerritoryCounter();
        })
      );
    }

    // --- RENDER FUNCTIONS ---
    function renderTable(data) {
      const tableBody = document.getElementById("youtubeTableBody");
      tableBody.innerHTML =
        !data || data.length === 0
          ? `<tr><td colspan="10" class="text-center p-5"><h5>No matching conflicts found.</h5></td></tr>`
          : data
              .map(
                (req) => `
                <tr style="cursor: pointer;" data-bs-toggle="offcanvas" data-bs-target="#conflictResolutionOffcanvas"
                    data-song-name="${req.assetTitle}" data-artist-name="${
                  req.artist
                }" data-isrc="${req.isrc}" 
                    data-cover-url="${req.albumCoverUrl}" data-category="${
                  req.category
                }" data-other-party="${req.otherParty}">
                    <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
                    <td>${req.category}</td>
                    <td>${req.assetTitle}</td>
                    <td><div class="fw-bold">${
                      req.artist
                    }</div><small class="text-muted">Asset ID: ${
                  req.assetId
                }</small></td>
                    <td>${req.upc}</td>
                    <td>${req.otherParty}</td>
                    <td>${req.dailyViews}</td>
                    <td>${req.expiry}</td>
                    <td>${getStatusBadge(req.status)}</td>
                    <td><i class="bi bi-chevron-right text-muted"></i></td>
                </tr>`
              )
              .join("");
      document.getElementById(
        "pagination-text"
      ).textContent = `${data.length} of ${conflictRequests.length} results`;
    }

    function renderTerritoryAccordion() {
      const accordionContainer = document.getElementById("territoryAccordion");
      if (!accordionContainer) return;
      accordionContainer.innerHTML = Object.entries(territoriesByRegion)
        .map(([region, countries]) => {
          const regionId = region.replace(/[^a-zA-Z0-9]/g, "");
          return `
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-${regionId}">
                        <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${regionId}" aria-expanded="false">
                            <div class="form-check me-auto pe-2"><input class="form-check-input region-checkbox" type="checkbox" id="region-${regionId}" data-region="${region}" checked><label class="form-check-label fw-bold" for="region-${regionId}">${region}</label></div>
                            <span class="text-muted small me-2">${
                              countries.length
                            } countries</span>
                        </button>
                    </h2>
                    <div id="collapse-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                        <div class="accordion-body"><div class="territory-list-inner">${countries
                          .map(
                            (country) =>
                              `<div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="${country.code}" id="country-${country.code}" data-region="${region}" checked><label class="form-check-label" for="country-${country.code}">${country.name}</label></div>`
                          )
                          .join("")}</div></div>
                    </div>
                </div>`;
        })
        .join("");
      addTerritoryEventListeners();
      updateTerritoryCounter();
    }

    // --- EVENT HANDLERS & INITIALIZATION ---
    const conflictOffcanvasEl = document.getElementById(
      "conflictResolutionOffcanvas"
    );
    const conflictOffcanvas = new bootstrap.Offcanvas(conflictOffcanvasEl);
    const conflictForm = document.getElementById("youtubeConflictForm");
    const steps = Array.from(conflictForm.querySelectorAll(".form-step"));
    const nextBtn = conflictOffcanvasEl.querySelector("#nextBtn");
    const backBtn = conflictOffcanvasEl.querySelector("#backBtn");
    const submitBtn = conflictOffcanvasEl.querySelector("#submitBtn");
    const fileInput = conflictOffcanvasEl.querySelector("#formFile");
    const fileDisplay = conflictOffcanvasEl.querySelector("#selectedFileName");
    let currentStep = 0;

    document
      .getElementById("releasesTable")
      .querySelector("thead")
      .addEventListener("click", (e) => {
        const headerCell = e.target.closest(".sortable-header");
        if (!headerCell) return;
        const sortKey = headerCell.dataset.sort;
        if (sortState.key === sortKey) {
          sortState.direction = sortState.direction === "asc" ? "desc" : "asc";
        } else {
          sortState.key = sortKey;
          sortState.direction = "asc";
        }
        conflictRequests.sort((a, b) => {
          let valA = a[sortState.key],
            valB = b[sortState.key];
          if (sortState.key === "dailyViews") {
            valA = parseViews(valA);
            valB = parseViews(valB);
          } else if (sortState.key === "expiry") {
            valA = parseExpiry(valA);
            valB = parseExpiry(valB);
          }
          let comparison = 0;
          if (valA > valB) comparison = 1;
          else if (valA < valB) comparison = -1;
          return sortState.direction === "desc" ? comparison * -1 : comparison;
        });
        renderTable(conflictRequests);
        updateSortIcons();
      });

    function showStep(stepIndex) {
      steps.forEach((step, index) =>
        step.classList.toggle("d-none", index !== stepIndex)
      );
      backBtn.classList.toggle("d-none", stepIndex === 0);
      nextBtn.classList.toggle("d-none", stepIndex === steps.length - 1);
      submitBtn.classList.toggle("d-none", stepIndex !== steps.length - 1);
      currentStep = stepIndex;
    }

    nextBtn.addEventListener("click", () => {
      if (
        currentStep === 0 &&
        !conflictForm.querySelector('input[name="rightsOwned"]:checked')
      )
        return alert("Please select a rights option.");
      if (
        currentStep === 1 &&
        !conflictForm.querySelector(".country-checkbox:checked")
      )
        return alert("Please select at least one territory.");
      if (currentStep < steps.length - 1) showStep(currentStep + 1);
    });

    backBtn.addEventListener("click", () => showStep(currentStep - 1));

    conflictOffcanvasEl.addEventListener("show.bs.offcanvas", function (event) {
      const data = event.relatedTarget.dataset;
      ["", "2", "3"].forEach((s) => {
        conflictOffcanvasEl.querySelector(`#modalAlbumCover${s}`).src =
          data.coverUrl;
        conflictOffcanvasEl.querySelector(`#modalSongName${s}`).textContent =
          data.songName;
        conflictOffcanvasEl.querySelector(`#modalArtistName${s}`).textContent =
          data.artistName;
      });
      conflictOffcanvasEl.querySelector(
        "#modalIsrc"
      ).textContent = `ISRC: ${data.isrc}`;
      conflictOffcanvasEl.querySelector("#offcanvasTitle").textContent =
        data.category;
      conflictOffcanvasEl.querySelector(
        "#offcanvasSubtitle"
      ).textContent = `VS. ${data.otherParty}`;
      conflictForm.reset();
      conflictOffcanvasEl
        .querySelectorAll(".radio-card")
        .forEach((c) => c.classList.remove("selected"));
      fileDisplay.classList.add("d-none");
      conflictOffcanvasEl
        .querySelectorAll('#territoryAccordion input[type="checkbox"]')
        .forEach((cb) => (cb.checked = true));
      updateTerritoryCounter();
      showStep(0);
    });

    conflictForm.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!fileInput.files.length && currentStep === 2)
        return alert("Please upload a supporting document.");
      alert("Resolution submitted successfully!");
      conflictOffcanvas.hide();
    });

    conflictOffcanvasEl.querySelectorAll(".radio-card").forEach((c) =>
      c.addEventListener("click", function () {
        conflictOffcanvasEl
          .querySelectorAll(".radio-card")
          .forEach((el) => el.classList.remove("selected"));
        this.classList.add("selected");
        this.querySelector('input[type="radio"]').checked = true;
      })
    );

    conflictOffcanvasEl
      .querySelector("#fileUploadContainer")
      .addEventListener("click", () => fileInput.click());
    fileInput.addEventListener("change", () => {
      if (fileInput.files.length > 0) {
        fileDisplay.querySelector("span").textContent = fileInput.files[0].name;
        fileDisplay.classList.remove("d-none");
      }
    });
    fileDisplay.querySelector(".btn-close").addEventListener("click", () => {
      fileInput.value = "";
      fileDisplay.classList.add("d-none");
    });

    // --- INITIAL RENDER ---
    renderTable(conflictRequests);
    renderTerritoryAccordion();
    updateSortIcons();
  }
});
// facebook-page js
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const facebookPageContainer = document.querySelector(".admin-facebook-page");

  if (facebookPageContainer) {
    // --- DATA ---
    const conflictRequests = [
      {
        id: 1,
        category: "Ownership conflict",
        assetTitle: "Cosmic Drift",
        artist: "Astro Beats",
        assetId: "90736897913",
        upc: "198009123456",
        isrc: "USAT22312345",
        otherParty: "The Orchard",
        dailyViews: "79K",
        expiry: "2 days",
        status: "Action Required",
        albumCoverUrl: "https://placehold.co/80x80/3b5998/ffffff?text=C",
      },
      {
        id: 2,
        category: "Policy",
        assetTitle: "Ocean Tides",
        artist: "Deep Wave",
        assetId: "3478239381",
        upc: "198009654321",
        isrc: "USAT22354321",
        otherParty: "Believe",
        dailyViews: "3K",
        expiry: "-",
        status: "Resolved",
        albumCoverUrl: "https://placehold.co/80x80/1abc9c/ffffff?text=O",
      },
      {
        id: 3,
        category: "Ownership conflict",
        assetTitle: "City Lights",
        artist: "Urban Glow",
        assetId: "3478239381",
        upc: "198009789012",
        isrc: "USAT22398765",
        otherParty: "CD Baby",
        dailyViews: "1.2K",
        expiry: "15 days",
        status: "In Review",
        albumCoverUrl: "https://placehold.co/80x80/9b59b6/ffffff?text=C",
      },
    ];
    const territoriesByRegion = {
      Africa: [
        { name: "Algeria", code: "DZ" },
        { name: "Angola", code: "AO" },
        { name: "Benin", code: "BJ" },
        { name: "Botswana", code: "BW" },
        { name: "Burkina Faso", code: "BF" },
        { name: "Burundi", code: "BI" },
        { name: "Cabo Verde", code: "CV" },
        { name: "Cameroon", code: "CM" },
        { name: "Central African Republic", code: "CF" },
        { name: "Chad", code: "TD" },
        { name: "Comoros", code: "KM" },
        { name: "Congo", code: "CG" },
        { name: "Congo (DRC)", code: "CD" },
        { name: "Côte d'Ivoire", code: "CI" },
        { name: "Djibouti", code: "DJ" },
        { name: "Egypt", code: "EG" },
        { name: "Equatorial Guinea", code: "GQ" },
        { name: "Eritrea", code: "ER" },
        { name: "Eswatini", code: "SZ" },
        { name: "Ethiopia", code: "ET" },
        { name: "Gabon", code: "GA" },
        { name: "Gambia", code: "GM" },
        { name: "Ghana", code: "GH" },
        { name: "Guinea", code: "GN" },
        { name: "Guinea-Bissau", code: "GW" },
        { name: "Kenya", code: "KE" },
        { name: "Lesotho", code: "LS" },
        { name: "Liberia", code: "LR" },
        { name: "Libya", code: "LY" },
        { name: "Madagascar", code: "MG" },
        { name: "Malawi", code: "MW" },
        { name: "Mali", code: "ML" },
        { name: "Mauritania", code: "MR" },
        { name: "Mauritius", code: "MU" },
        { name: "Mayotte", code: "YT" },
        { name: "Morocco", code: "MA" },
        { name: "Mozambique", code: "MZ" },
        { name: "Namibia", code: "NA" },
        { name: "Niger", code: "NE" },
        { name: "Nigeria", code: "NG" },
        { name: "Réunion", code: "RE" },
        { name: "Rwanda", code: "RW" },
        { name: "Saint Helena", code: "SH" },
        { name: "Sao Tome and Principe", code: "ST" },
        { name: "Senegal", code: "SN" },
        { name: "Seychelles", code: "SC" },
        { name: "Sierra Leone", code: "SL" },
        { name: "Somalia", code: "SO" },
        { name: "South Africa", code: "ZA" },
        { name: "South Sudan", code: "SS" },
        { name: "Sudan", code: "SD" },
        { name: "Tanzania", code: "TZ" },
        { name: "Togo", code: "TG" },
        { name: "Tunisia", code: "TN" },
        { name: "Uganda", code: "UG" },
        { name: "Zambia", code: "ZM" },
        { name: "Zimbabwe", code: "ZW" },
      ],
      Antarctica: [
        { name: "Antarctica", code: "AQ" },
        { name: "French Southern Territories", code: "TF" },
        { name: "South Georgia and the South Sandwich Islands", code: "GS" },
      ],
      Asia: [
        { name: "Afghanistan", code: "AF" },
        { name: "Armenia", code: "AM" },
        { name: "Azerbaijan", code: "AZ" },
        { name: "Bahrain", code: "BH" },
        { name: "Bangladesh", code: "BD" },
        { name: "Bhutan", code: "BT" },
        { name: "British Indian Ocean Territory", code: "IO" },
        { name: "Brunei", code: "BN" },
        { name: "Cambodia", code: "KH" },
        { name: "China", code: "CN" },
        { name: "Cyprus", code: "CY" },
        { name: "Georgia", code: "GE" },
        { name: "Hong Kong", code: "HK" },
        { name: "India", code: "IN" },
        { name: "Indonesia", code: "ID" },
        { name: "Iran", code: "IR" },
        { name: "Iraq", code: "IQ" },
        { name: "Israel", code: "IL" },
        { name: "Japan", code: "JP" },
        { name: "Jordan", code: "JO" },
        { name: "Kazakhstan", code: "KZ" },
        { name: "Kuwait", code: "KW" },
        { name: "Kyrgyzstan", code: "KG" },
        { name: "Laos", code: "LA" },
        { name: "Lebanon", code: "LB" },
        { name: "Macao", code: "MO" },
        { name: "Malaysia", code: "MY" },
        { name: "Maldives", code: "MV" },
        { name: "Mongolia", code: "MN" },
        { name: "Myanmar", code: "MM" },
        { name: "Nepal", code: "NP" },
        { name: "North Korea", code: "KP" },
        { name: "Oman", code: "OM" },
        { name: "Pakistan", code: "PK" },
        { name: "Palestine", code: "PS" },
        { name: "Philippines", code: "PH" },
        { name: "Qatar", code: "QA" },
        { name: "Saudi Arabia", code: "SA" },
        { name: "Singapore", code: "SG" },
        { name: "South Korea", code: "KR" },
        { name: "Sri Lanka", code: "LK" },
        { name: "Syria", code: "SY" },
        { name: "Taiwan", code: "TW" },
        { name: "Tajikistan", code: "TJ" },
        { name: "Thailand", code: "TH" },
        { name: "Timor-Leste", code: "TL" },
        { name: "Turkey", code: "TR" },
        { name: "Turkmenistan", code: "TM" },
        { name: "United Arab Emirates", code: "AE" },
        { name: "Uzbekistan", code: "UZ" },
        { name: "Vietnam", code: "VN" },
        { name: "Yemen", code: "YE" },
      ],
      Europe: [
        { name: "Åland Islands", code: "AX" },
        { name: "Albania", code: "AL" },
        { name: "Andorra", code: "AD" },
        { name: "Austria", code: "AT" },
        { name: "Belarus", code: "BY" },
        { name: "Belgium", code: "BE" },
        { name: "Bosnia and Herzegovina", code: "BA" },
        { name: "Bulgaria", code: "BG" },
        { name: "Croatia", code: "HR" },
        { name: "Czechia", code: "CZ" },
        { name: "Denmark", code: "DK" },
        { name: "Estonia", code: "EE" },
        { name: "Faroe Islands", code: "FO" },
        { name: "Finland", code: "FI" },
        { name: "France", code: "FR" },
        { name: "Germany", code: "DE" },
        { name: "Gibraltar", code: "GI" },
        { name: "Greece", code: "GR" },
        { name: "Guernsey", code: "GG" },
        { name: "Holy See", code: "VA" },
        { name: "Hungary", code: "HU" },
        { name: "Iceland", code: "IS" },
        { name: "Ireland", code: "IE" },
        { name: "Isle of Man", code: "IM" },
        { name: "Italy", code: "IT" },
        { name: "Jersey", code: "JE" },
        { name: "Latvia", code: "LV" },
        { name: "Liechtenstein", code: "LI" },
        { name: "Lithuania", code: "LT" },
        { name: "Luxembourg", code: "LU" },
        { name: "Malta", code: "MT" },
        { name: "Moldova", code: "MD" },
        { name: "Monaco", code: "MC" },
        { name: "Montenegro", code: "ME" },
        { name: "Netherlands", code: "NL" },
        { name: "North Macedonia", code: "MK" },
        { name: "Norway", code: "NO" },
        { name: "Poland", code: "PL" },
        { name: "Portugal", code: "PT" },
        { name: "Romania", code: "RO" },
        { name: "Russia", code: "RU" },
        { name: "San Marino", code: "SM" },
        { name: "Serbia", code: "RS" },
        { name: "Slovakia", code: "SK" },
        { name: "Slovenia", code: "SI" },
        { name: "Spain", code: "ES" },
        { name: "Svalbard and Jan Mayen", code: "SJ" },
        { name: "Sweden", code: "SE" },
        { name: "Switzerland", code: "CH" },
        { name: "Ukraine", code: "UA" },
        { name: "United Kingdom", code: "GB" },
      ],
      "North America": [
        { name: "Anguilla", code: "AI" },
        { name: "Antigua and Barbuda", code: "AG" },
        { name: "Aruba", code: "AW" },
        { name: "Bahamas", code: "BS" },
        { name: "Barbados", code: "BB" },
        { name: "Belize", code: "BZ" },
        { name: "Bermuda", code: "BM" },
        { name: "Bonaire", code: "BQ" },
        { name: "Canada", code: "CA" },
        { name: "Cayman Islands", code: "KY" },
        { name: "Costa Rica", code: "CR" },
        { name: "Cuba", code: "CU" },
        { name: "Curaçao", code: "CW" },
        { name: "Dominica", code: "DM" },
        { name: "Dominican Republic", code: "DO" },
        { name: "El Salvador", code: "SV" },
        { name: "Greenland", code: "GL" },
        { name: "Grenada", code: "GD" },
        { name: "Guadeloupe", code: "GP" },
        { name: "Guatemala", code: "GT" },
        { name: "Haiti", code: "HT" },
        { name: "Honduras", code: "HN" },
        { name: "Jamaica", code: "JM" },
        { name: "Martinique", code: "MQ" },
        { name: "Mexico", code: "MX" },
        { name: "Montserrat", code: "MS" },
        { name: "Nicaragua", code: "NI" },
        { name: "Panama", code: "PA" },
        { name: "Puerto Rico", code: "PR" },
        { name: "Saint Barthélemy", code: "BL" },
        { name: "Saint Kitts and Nevis", code: "KN" },
        { name: "Saint Lucia", code: "LC" },
        { name: "Saint Martin", code: "MF" },
        { name: "Saint Pierre and Miquelon", code: "PM" },
        { name: "Saint Vincent and the Grenadines", code: "VC" },
        { name: "Sint Maarten", code: "SX" },
        { name: "Trinidad and Tobago", code: "TT" },
        { name: "Turks and Caicos Islands", code: "TC" },
        { name: "United States", code: "US" },
        { name: "U.S. Virgin Islands", code: "VI" },
      ],
      Oceania: [
        { name: "American Samoa", code: "AS" },
        { name: "Australia", code: "AU" },
        { name: "Christmas Island", code: "CX" },
        { name: "Cocos (Keeling) Islands", code: "CC" },
        { name: "Cook Islands", code: "CK" },
        { name: "Fiji", code: "FJ" },
        { name: "French Polynesia", code: "PF" },
        { name: "Guam", code: "GU" },
        { name: "Kiribati", code: "KI" },
        { name: "Marshall Islands", code: "MH" },
        { name: "Micronesia", code: "FM" },
        { name: "Nauru", code: "NR" },
        { name: "New Caledonia", code: "NC" },
        { name: "New Zealand", code: "NZ" },
        { name: "Niue", code: "NU" },
        { name: "Norfolk Island", code: "NF" },
        { name: "Northern Mariana Islands", code: "MP" },
        { name: "Palau", code: "PW" },
        { name: "Papua New Guinea", code: "PG" },
        { name: "Pitcairn", code: "PN" },
        { name: "Samoa", code: "WS" },
        { name: "Solomon Islands", code: "SB" },
        { name: "Tokelau", code: "TK" },
        { name: "Tonga", code: "TO" },
        { name: "Tuvalu", code: "TV" },
        { name: "U.S. Minor Outlying Islands", code: "UM" },
        { name: "Vanuatu", code: "VU" },
        { name: "Wallis and Futuna", code: "WF" },
      ],
      "South America": [
        { name: "Argentina", code: "AR" },
        { name: "Bolivia", code: "BO" },
        { name: "Brazil", code: "BR" },
        { name: "Chile", code: "CL" },
        { name: "Colombia", code: "CO" },
        { name: "Ecuador", code: "EC" },
        { name: "Falkland Islands", code: "FK" },
        { name: "French Guiana", code: "GF" },
        { name: "Guyana", code: "GY" },
        { name: "Paraguay", code: "PY" },
        { name: "Peru", code: "PE" },
        { name: "Suriname", code: "SR" },
        { name: "Uruguay", code: "UY" },
        { name: "Venezuela", code: "VE" },
      ],
    };
    const totalCountries = Object.values(territoriesByRegion).flat().length;

    // --- DOM ELEMENTS ---
    const table = $("#datatable");

    // --- HELPER & PARSING FUNCTIONS ---
    const getStatusBadge = (status) => {
      let badgeClass = "bg-secondary-subtle text-secondary-emphasis";
      if (status === "Action Required")
        badgeClass = "bg-danger-subtle text-danger-emphasis";
      else if (status === "Resolved")
        badgeClass = "bg-success-subtle text-success-emphasis";
      else if (status === "In Review")
        badgeClass = "bg-warning-subtle text-warning-emphasis";
      return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
    };
    const parseViews = (views) =>
      typeof views !== "string"
        ? 0
        : parseFloat(views.toUpperCase()) *
          (views.toUpperCase().includes("K") ? 1000 : 1);
    const parseExpiry = (expiry) =>
      typeof expiry !== "string" || expiry === "-"
        ? Infinity
        : parseInt(expiry);

    // --- DATATABLES CONFIGURATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: conflictRequests,
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: () => `<i class="bi bi-facebook text-primary fs-5"></i>`,
        },
        { data: "category" },
        { data: "assetTitle" },
        {
          data: null,
          render: (data, type, row) =>
            `<div class="fw-bold">${row.artist}</div><small class="text-muted">Asset ID: ${row.assetId}</small>`,
        },
        { data: "upc" },
        { data: "otherParty" },
        {
          data: "dailyViews",
          render: { _: (data) => data, sort: (data) => parseViews(data) },
        },
        {
          data: "expiry",
          render: { _: (data) => data, sort: (data) => parseExpiry(data) },
        },
        { data: "status", render: (data) => getStatusBadge(data) },
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: () => `<i class="bi bi-chevron-right text-muted"></i>`,
        },
      ],
      createdRow: function (row, data) {
        $(row).attr({
          style: "cursor: pointer;",
          "data-bs-toggle": "offcanvas",
          "data-bs-target": "#facebookConflictOffcanvas",
          "data-song-name": data.assetTitle,
          "data-artist-name": data.artist,
          "data-isrc": data.isrc,
          "data-cover-url": data.albumCoverUrl,
          "data-category": data.category,
          "data-other-party": data.otherParty,
        });
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching conflicts found",
        emptyTable: "No conflicts available",
        search: "_INPUT_",
        searchPlaceholder: "Search conflicts...",
      },
    });

    // --- OFFCANVAS LOGIC ---
    const conflictOffcanvasEl = document.getElementById(
      "facebookConflictOffcanvas"
    );
    if (conflictOffcanvasEl) {
      const conflictForm = document.getElementById("facebookConflictForm");
      const steps = Array.from(
        conflictOffcanvasEl.querySelectorAll(".form-step")
      );
      const nextBtn = document.getElementById("nextBtn");
      const backBtn = document.getElementById("backBtn");
      const submitBtn = document.getElementById("submitBtn");
      let currentStep = 0;

      function showStep(stepIndex) {
        steps.forEach((step, index) =>
          step.classList.toggle("d-none", index !== stepIndex)
        );
        backBtn.classList.toggle("d-none", stepIndex === 0);
        nextBtn.classList.toggle("d-none", stepIndex === steps.length - 1);
        submitBtn.classList.toggle("d-none", stepIndex !== steps.length - 1);
        currentStep = stepIndex;
      }

      nextBtn.addEventListener("click", () => {
        if (
          currentStep === 0 &&
          !conflictForm.querySelector('input[name="rightsOwned"]:checked')
        )
          return alert("Please select a rights option.");
        if (
          currentStep === 1 &&
          !conflictForm.querySelector(".country-checkbox:checked")
        )
          return alert("Please select at least one territory.");
        if (currentStep < steps.length - 1) showStep(currentStep + 1);
      });

      backBtn.addEventListener("click", () => {
        if (currentStep > 0) showStep(currentStep - 1);
      });

      conflictOffcanvasEl.addEventListener(
        "show.bs.offcanvas",
        function (event) {
          const data = event.relatedTarget.dataset;
          // Populate offcanvas fields
          ["", "2", "3"].forEach((s) => {
            const suffix = s ? parseInt(s) : "";
            conflictOffcanvasEl.querySelector(`#modalAlbumCover${suffix}`).src =
              data.coverUrl;
            conflictOffcanvasEl.querySelector(
              `#modalSongName${suffix}`
            ).textContent = data.songName;
            conflictOffcanvasEl.querySelector(
              `#modalArtistName${suffix}`
            ).textContent = data.artistName;
          });
          conflictOffcanvasEl.querySelector(
            "#modalIsrc"
          ).textContent = `ISRC: ${data.isrc}`;
          conflictOffcanvasEl.querySelector("#offcanvasTitle").textContent =
            data.category;
          conflictOffcanvasEl.querySelector(
            "#offcanvasSubtitle"
          ).textContent = `VS. ${data.otherParty}`;

          // Render accordion and reset form state
          renderTerritoryAccordion();
          conflictForm.reset();
          conflictForm
            .querySelectorAll(".radio-card")
            .forEach((c) => c.classList.remove("selected"));
          document.getElementById("selectedFileName")?.classList.add("d-none");
          showStep(0);
        }
      );

      conflictForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formFile = document.getElementById("formFile");
        if (currentStep === 2 && formFile && !formFile.files.length)
          return alert("Please upload a supporting document.");
        alert("Resolution submitted successfully!");
        bootstrap.Offcanvas.getInstance(conflictOffcanvasEl).hide();
      });

      function renderTerritoryAccordion() {
        const accordionContainer = conflictOffcanvasEl.querySelector(
          "#territoryAccordion"
        );
        if (!accordionContainer) return;
        accordionContainer.innerHTML = Object.entries(territoriesByRegion)
          .map(([region, countries]) => {
            if (countries.length === 0) return "";
            const regionId = region.replace(/[^a-zA-Z0-9]/g, "");
            return `
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-fb-${regionId}">
                                <div class="form-check me-auto pe-2">
                                    <input class="form-check-input region-checkbox" type="checkbox" id="region-fb-${regionId}" data-region="${region}" checked>
                                    <label class="form-check-label fw-bold" for="region-fb-${regionId}">${region}</label>
                                </div>
                                <span class="text-muted small me-2">${
                                  countries.length
                                } countries</span>
                            </button>
                        </h2>
                        <div id="collapse-fb-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                            <div class="accordion-body">
                                <div class="territory-list-inner">${countries
                                  .map(
                                    (c) => `
                                    <div class="form-check">
                                        <input class="form-check-input country-checkbox" type="checkbox" value="${c.code}" id="country-fb-${c.code}" data-region="${region}" checked>
                                        <label class="form-check-label" for="country-fb-${c.code}">${c.name}</label>
                                    </div>`
                                  )
                                  .join("")}
                                </div>
                            </div>
                        </div>
                    </div>`;
          })
          .join("");
        addTerritoryEventListeners();
        updateTerritoryCounter();
      }

      function updateTerritoryCounter() {
        const selected = conflictOffcanvasEl.querySelectorAll(
          ".country-checkbox:checked"
        ).length;
        conflictOffcanvasEl.querySelector(
          "#territoryCounter"
        ).textContent = `${selected} contested countries out of ${totalCountries} delivered`;
      }

      function addTerritoryEventListeners() {
        conflictOffcanvasEl
          .querySelectorAll(".region-checkbox, .country-checkbox")
          .forEach((cb) => {
            cb.addEventListener("change", function (e) {
              const region = e.target.dataset.region;
              if (e.target.classList.contains("region-checkbox")) {
                conflictOffcanvasEl
                  .querySelectorAll(
                    `.country-checkbox[data-region="${region}"]`
                  )
                  .forEach(
                    (countryCb) => (countryCb.checked = e.target.checked)
                  );
              } else {
                const allInRegion = [
                  ...conflictOffcanvasEl.querySelectorAll(
                    `.country-checkbox[data-region="${region}"]`
                  ),
                ].every((c) => c.checked);
                conflictOffcanvasEl.querySelector(
                  `.region-checkbox[data-region="${region}"]`
                ).checked = allInRegion;
              }
              updateTerritoryCounter();
            });
          });
      }

      // --- Remaining event listeners for form interactions ---
      conflictOffcanvasEl.addEventListener("click", function (e) {
        if (e.target.closest(".radio-card")) {
          const card = e.target.closest(".radio-card");
          conflictOffcanvasEl
            .querySelectorAll(".radio-card")
            .forEach((c) => c.classList.remove("selected"));
          card.classList.add("selected");
          card.querySelector('input[type="radio"]').checked = true;
        }
      });

      const fileInput = document.getElementById("formFile");
      const fileDisplay = document.getElementById("selectedFileName");
      document
        .getElementById("fileUploadContainer")
        ?.addEventListener("click", () => fileInput.click());
      fileInput?.addEventListener("change", () => {
        if (fileInput.files.length > 0 && fileDisplay) {
          fileDisplay.querySelector("span").textContent =
            fileInput.files[0].name;
          fileDisplay.classList.remove("d-none");
        }
      });
      fileDisplay
        ?.querySelector(".btn-close")
        .addEventListener("click", (e) => {
          e.stopPropagation();
          if (fileInput) fileInput.value = "";
          fileDisplay.classList.add("d-none");
        });
    }
  }
});

//support form

// Show alert helper
function showFormAlert(type, message) {
  let alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
  $("#formAlertBox").html(alertHtml);
}

$("#supportForm").on("submit", function (e) {
  e.preventDefault(); // Stop normal form submit

  $.ajax({
    url: $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(), // Serialize form fields
    success: function (res) {
      if (res.success) {
        showFormAlert("success", res.message);
        $("#supportForm")[0].reset(); // Clear form
      } else if (res.errors) {
        let errorMessages = Object.values(res.errors).join("<br>");
        showFormAlert("danger", errorMessages);
      }
    },
    error: function (xhr) {
      let msg = "Something went wrong!";
      if (xhr.responseJSON && xhr.responseJSON.message) {
        msg = xhr.responseJSON.message;
      }
      showFormAlert("danger", msg);
    },
  });
});

//support list js
$(document).ready(function () {
  let table = $("#datatable").DataTable({
    destroy: true,
    ajax: "/superadmin/support/data",
    columns: [
      { data: "id" },
      { data: "full_name" },
      { data: "email" },
      { data: "subject" },
      { data: "status" },
      { data: "created_at" },
      { data: "actions", orderable: false, searchable: false },
    ],
  });
  function showAlert(type, message) {
    // type = "success", "danger", "warning", "info"
    let alertHtml = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    $("#alertBox").html(alertHtml);

    setTimeout(() => {
      $(".alert").alert("close");
    }, 3000);
  }

  $(document).on("click", ".viewSupportBtn", function () {
    let id = $(this).data("id");
    let message = $(this).data("message");
    let status = $(this).data("status");

    $("#supportModal").data("id", id);
    $("#supportMessage").text(message);
    $("#supportStatus").val(status);

    let modal = new bootstrap.Modal(document.getElementById("supportModal"));
    modal.show();
  });

  // Save status change
  $("#saveSupportStatus").on("click", function () {
    let id = $("#supportModal").data("id");
    let status = $("#supportStatus").val();

    $.ajax({
      url: "/superadmin/support/update-status/" + id,
      type: "POST",
      data: {
        status: status,
        _token: $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (res) {
        if (res.success) {
          showAlert("success", res.message);
        } else {
          showAlert("danger", res.message);
        }
        $("#supportModal").modal("hide");
        table.ajax.reload();
      },
      error: function (xhr) {
        let msg = "Something went wrong!";
        if (xhr.responseJSON && xhr.responseJSON.message) {
          msg = xhr.responseJSON.message;
        }
        showAlert("danger", msg);
      },
    });
  });
});

// Add Releases Multi-Step Form JavaScript
document.addEventListener("DOMContentLoaded", function () {
  // --- Page-Specific Guard Clause for the Add Release Page ---
  const addReleasePageContainer = document.querySelector(
    ".admin-add-releases-form"
  );

  // If this container doesn't exist, stop executing the rest of the script.
  if (!addReleasePageContainer) {
    return;
  }

  // --- Configuration ---
  const totalSteps = 5;
  const stepTitles = {
    1: "Metadata",
    2: "Uploads",
    3: "Stores",
    4: "Date & Price",
    5: "Terms",
  };

  let currentStep = 1;

  // --- Initialize feather icons ---
  if (typeof feather !== "undefined") {
    feather.replace();
  }

  // --- STEP NAVIGATION FUNCTIONS ---

  function updateStepIndicator(step) {
    const steps = document.querySelectorAll(".step");
    const progressLine = document.getElementById("progressLine");

    steps.forEach((stepEl, index) => {
      const stepNum = index + 1;
      stepEl.classList.remove("active", "completed");

      if (stepNum < step) {
        stepEl.classList.add("completed");
      } else if (stepNum === step) {
        stepEl.classList.add("active");
      }
    });

    // Update progress line width
    if (progressLine) {
      const progressWidth = ((step - 1) / (totalSteps - 1)) * 100;
      progressLine.style.width = progressWidth + "%";
    }
  }

  function showStep(step) {
    // Hide all step contents
    document.querySelectorAll(".step-content").forEach((content) => {
      content.classList.remove("active");
    });

    // Show the target step with slight delay for smooth transition
    setTimeout(() => {
      const targetStep = document.getElementById(`step-${step}`);
      if (targetStep) {
        targetStep.classList.add("active");
      }
    }, 150);

    // Update step indicator
    updateStepIndicator(step);

    // Update page title
    const currentStepTitleEl = document.querySelector(".current-step-title");
    if (currentStepTitleEl) {
      currentStepTitleEl.textContent = stepTitles[step];
    }

    currentStep = step;
  }

  // --- STEP 1 VALIDATION (Basic Information + Artwork) ---

  function initializeStep1Validation() {
    // Validation rules for each field
    const rules = {
      releaseTitle: { required: true, minLength: 2, maxLength: 100 },
      labelName: { required: true },
      artist: { required: true, minLength: 2, maxLength: 100 },
      featuringArtist: { minLength: 2, maxLength: 100 },
      releaseType: { required: true, type: "radio" },
      mood: { required: true, type: "select" },
      genre: { required: true, type: "select" },
      language: { required: true, type: "select" },
      upcEan: {
        pattern: /^\d{12,13}$/,
        patternMsg: "UPC/EAN must be 12 or 13 digits only.",
      },
      artworkFile: { required: true, type: "file" },
    };

    // Generic validation function
    function validateField(fieldId) {
      const field = document.getElementById(fieldId);
      const error = document.getElementById(fieldId + "Error");
      const rule = rules[fieldId];

      if (!field || !rule) return true;

      // Clear previous validation
      field.classList.remove("is-invalid", "is-valid");
      if (error) {
        error.textContent = "";
        error.style.display = "none";
      }

      let value = field.value ? field.value.trim() : "";
      let isValid = true;
      let errorMsg = "";

      // Handle different field types
      if (rule.type === "radio") {
        const radios = document.querySelectorAll(`input[name="${fieldId}"]`);
        isValid = Array.from(radios).some((r) => r.checked);
        errorMsg = "Please select a release type.";
        field = document.querySelector(".release-type-container");
      } else if (rule.type === "select") {
        isValid = value !== "" && value !== null;
        errorMsg = `Please select a ${fieldId}.`;
      } else if (rule.type === "file") {
        // File validation for artwork
        return validateArtworkFile();
      } else {
        // Text inputs
        if (rule.required && !value) {
          isValid = false;
          errorMsg = `${fieldId
            .replace(/([A-Z])/g, " $1")
            .toLowerCase()} is required.`;
        } else if (value && rule.minLength && value.length < rule.minLength) {
          isValid = false;
          errorMsg = `Must be at least ${rule.minLength} characters long.`;
        } else if (value && rule.maxLength && value.length > rule.maxLength) {
          isValid = false;
          errorMsg = `Cannot exceed ${rule.maxLength} characters.`;
        } else if (value && rule.pattern && !rule.pattern.test(value)) {
          isValid = false;
          errorMsg = rule.patternMsg || "Invalid format.";
        }
      }

      // Apply validation styling
      if ((!isValid && rule.required) || (!isValid && value)) {
        field.classList.add("is-invalid");
        if (error) {
          error.textContent = errorMsg;
          error.style.display = "block";
        }
      } else if (isValid && (value || rule.required)) {
        field.classList.add("is-valid");
      }

      return isValid || (!rule.required && !value);
    }

    // Artwork file validation (integrated)
    function validateArtworkFile() {
      const artworkFile = document.getElementById("artworkFile");
      const artworkFileError = document.getElementById("artworkFileError");
      const artworkUpload = document.getElementById("artworkUpload");

      if (!artworkFile || !artworkFileError || !artworkUpload) return true;

      // Reset validation state
      artworkUpload.classList.remove("is-invalid", "is-valid");
      artworkFileError.textContent = "";
      artworkFileError.style.display = "none";

      if (!artworkFile.files || artworkFile.files.length === 0) {
        artworkUpload.classList.add("is-invalid");
        artworkFileError.textContent = "Please select an artwork file.";
        artworkFileError.style.display = "block";
        return false;
      }

      const file = artworkFile.files[0];
      const allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
      const maxSize = 10 * 1024 * 1024; // 10MB

      if (!allowedTypes.includes(file.type)) {
        artworkUpload.classList.add("is-invalid");
        artworkFileError.textContent =
          "Please select a valid image file (JPG, JPEG, or PNG).";
        artworkFileError.style.display = "block";
        return false;
      }

      if (file.size > maxSize) {
        artworkUpload.classList.add("is-invalid");
        artworkFileError.textContent = "File size should not exceed 10MB.";
        artworkFileError.style.display = "block";
        return false;
      }

      // Valid file
      artworkUpload.classList.add("is-valid");
      artworkFileError.style.display = "none";
      return true;
    }

    // Add event listeners
    Object.keys(rules).forEach((fieldId) => {
      const field = document.getElementById(fieldId);
      if (!field) return;

      if (rules[fieldId].type === "radio") {
        document
          .querySelectorAll(`input[name="${fieldId}"]`)
          .forEach((radio) => {
            radio.addEventListener("change", () => validateField(fieldId));
          });
      } else if (rules[fieldId].type === "file") {
        field.addEventListener("change", () => validateField(fieldId));
      } else {
        field.addEventListener("input", () => validateField(fieldId));
        field.addEventListener("change", () => validateField(fieldId));
        field.addEventListener("blur", () => validateField(fieldId));
      }
    });

    // Return validation function for the entire step 1
    return function validateStep1() {
      return Object.keys(rules).every((fieldId) => validateField(fieldId));
    };
  }

  // Initialize Step 1 validation
  const validateStep1 = initializeStep1Validation();

  // --- EVENT LISTENERS ---

  // Step navigation - Next buttons
  document.querySelectorAll(".next-step").forEach((btn) => {
    btn.addEventListener("click", function () {
      const nextStep = parseInt(this.dataset.next, 10);

      // Validate current step before proceeding
      if (currentStep === 1 && !validateStep1()) {
        return; // Stay on step 1, validation errors will show
      }

      if (nextStep <= totalSteps) {
        showStep(nextStep);
      }
    });
  });

  // Step navigation - Previous buttons
  document.querySelectorAll(".prev-step").forEach((btn) => {
    btn.addEventListener("click", function () {
      const prevStep = parseInt(this.dataset.prev, 10);
      if (prevStep >= 1) {
        showStep(prevStep);
      }
    });
  });

  // Step navigation - Click on step indicators
  document.querySelectorAll(".step").forEach((step) => {
    step.addEventListener("click", function () {
      const stepNum = parseInt(this.dataset.step, 10);
      if (stepNum >= 1 && stepNum <= totalSteps) {
        showStep(stepNum);
      }
    });
  });

  // --- FILE UPLOAD FUNCTIONALITY ---

  // Audio file upload
  const audioUpload = document.getElementById("audioUpload");
  const audioFile = document.getElementById("audioFile");

  if (audioUpload && audioFile) {
    audioUpload.addEventListener("click", function () {
      audioFile.click();
    });
  }

  // Artwork file upload
  const artworkUpload = document.getElementById("artworkUpload");
  const artworkFile = document.getElementById("artworkFile");

  if (artworkUpload && artworkFile) {
    artworkUpload.addEventListener("click", function () {
      artworkFile.click();
    });

    // Artwork file change handler with preview
    artworkFile.addEventListener("change", function (e) {
      const file = e.target.files[0];
      if (file) {
        // Show preview (validation happens automatically via event listener)
        const reader = new FileReader();
        reader.onload = function (event) {
          const preview = document.getElementById("artworkPreview");
          if (preview) {
            preview.src = event.target.result;
            preview.classList.remove("d-none");
          }
        };
        reader.readAsDataURL(file);
      }
    });
  }

  // --- FORM SUBMISSION ---

document.getElementById("releaseForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) // or .text()
    .then(data => {
        console.log(data);
        alert("Release submitted successfully!");
        // reset form or close modal
    })
    .catch(err => {
        console.error("Upload failed", err);
        alert("Something went wrong!");
    });
});

  // --- INITIALIZATION ---
  updateStepIndicator(1);
});
