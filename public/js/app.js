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


//ownership-data js 
// =========================================================================
//  LOGIC FOR THE OWNERSHIP DATA PAGE
// =========================================================================
function initializeOwnershipPage(config) {
    const pageContainer = document.querySelector(config.pageSelector);
    if (!pageContainer) return; // Exit if not on the ownership page

    const getStatusBadge = (status) => {
        let badgeClass = 'bg-secondary-subtle text-secondary-emphasis';
        if (status === 'Action Required') badgeClass = 'bg-danger-subtle text-danger-emphasis';
        else if (status === 'Resolved') badgeClass = 'bg-success-subtle text-success-emphasis';
        else if (status === 'In Review') badgeClass = 'bg-warning-subtle text-warning-emphasis';
        return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
    };

    // --- FUNCTION TO POPULATE THE YOUTUBE TABLE ---
    const populateTable = (tableBodySelector, data, platformConfig) => {
        const tableBody = pageContainer.querySelector(tableBodySelector);
        if(!tableBody) return;

        data.forEach(item => {
            const row = document.createElement('tr');
            row.style.cursor = 'pointer';
            row.setAttribute('data-bs-toggle', 'offcanvas');
            row.setAttribute('data-bs-target', '#ownershipDetailsOffcanvas');
            
            // Set all data attributes needed for the modal header
            row.setAttribute('data-song-name', item.assetTitle);
            row.setAttribute('data-artist-name', item.artist);
            row.setAttribute('data-isrc', item.isrc);
            row.setAttribute('data-cover-url', item.albumCoverUrl);
            row.setAttribute('data-category', item.category);
            row.setAttribute('data-other-party', item.otherParty);
            row.setAttribute('data-platform-name', platformConfig.platformName);

            row.innerHTML = `
                <td class="text-center"><i class="bi ${platformConfig.platformIconClass} fs-5"></i></td>
                <td>${item.assetTitle}</td>
                <td><div class="fw-bold">${item.artist}</div><small class="text-muted">Asset ID: ${item.assetId}</small></td>
                <td>${item.upc}</td>
                <td>${item.otherParty}</td>
                <td>${getStatusBadge(item.status)}</td>
                <td class="text-center"><i class="bi bi-chevron-right text-muted"></i></td>
            `;
            tableBody.appendChild(row);
        });
    };
    
    // --- POPULATE ONLY THE YOUTUBE TABLE ---
    populateTable('.youtube-data-body', config.youtubeData, { platformName: 'YouTube', platformIconClass: 'bi-youtube text-danger'});
    
    // Initialize DataTable on the table
    $('.datatable').DataTable({
        destroy: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        autoWidth: false,
        language: { search: "_INPUT_", searchPlaceholder: "Search YouTube conflicts..." }
    });

    // --- OFFCANVAS DISPLAY LOGIC (MODIFIED FOR DUMMY DATA) ---
    const ownershipOffcanvasEl = document.getElementById('ownershipDetailsOffcanvas');
    if (!ownershipOffcanvasEl) return;
    
    ownershipOffcanvasEl.addEventListener('show.bs.offcanvas', function(event) {
        const triggerRow = event.relatedTarget;
        const data = triggerRow.dataset;

        // Populate header info from the clicked row's data attributes
        ownershipOffcanvasEl.querySelector('#ownershipAlbumCover').src = data.coverUrl;
        ownershipOffcanvasEl.querySelector('#ownershipSongName').textContent = data.songName;
        ownershipOffcanvasEl.querySelector('#ownershipArtistName').textContent = data.artistName;
        ownershipOffcanvasEl.querySelector('#ownershipIsrc').textContent = `ISRC: ${data.isrc}`;
        ownershipOffcanvasEl.querySelector('#ownershipPlatform').textContent = data.platformName;
        ownershipOffcanvasEl.querySelector('#ownershipOffcanvasTitle').textContent = `Resolution Details: ${data.category}`;
        ownershipOffcanvasEl.querySelector('#ownershipOffcanvasSubtitle').textContent = `VS. ${data.otherParty}`;
        
        // --- INJECT DUMMY "RESOLVED" DATA ---
        // This part no longer checks localStorage. It shows the same data every time.
        const contentDiv = ownershipOffcanvasEl.querySelector('#ownershipDetailsContent');
        const dummyResolvedData = {
            rightsOwned: 'My content is Original and I own exclusive rights on all or part of the territories',
            territories: ['France', 'Germany', 'United Kingdom', 'India'],
            documentName: 'contract_agreement.pdf',
            submittedOn: '9/5/2025, 4:15:30 PM'
        };

        contentDiv.innerHTML = `
            <div class="mb-4">
                <h6 class="fw-bold">Rights Owned</h6>
                <p class="text-muted">${dummyResolvedData.rightsOwned}</p>
            </div>
            <div class="mb-4">
                <h6 class="fw-bold">Contested Territories (${dummyResolvedData.territories.length})</h6>
                <div class="territory-list bg-light p-3 rounded" style="max-height: 200px; overflow-y: auto;">
                   ${dummyResolvedData.territories.map(t => `<p class="mb-1 small">${t}</p>`).join('')}
                </div>
            </div>
             <div class="mb-4">
                <h6 class="fw-bold">Supporting Document</h6>
                <p class="text-muted"><i class="bi bi-file-earmark-text me-2"></i>${dummyResolvedData.documentName}</p>
            </div>
            <hr>
            <small class="text-muted">Submitted on: ${dummyResolvedData.submittedOn}</small>
        `;
    });
}

// =========================================================================
//  MAIN EXECUTION BLOCK
// =========================================================================
document.addEventListener('DOMContentLoaded', function() {

    // --- DUMMY DATA ---
    const youtubeConflictData = [
        { id: 1, category: 'Ownership conflict', assetTitle: 'Cosmic Drift', artist: 'Astro Beats', assetId: '90736897913', upc: '198009123456', isrc: 'USAT22312345', otherParty: 'The Orchard', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/ff0000/ffffff?text=C' },
        { id: 2, category: 'Policy', assetTitle: 'Ocean Tides', artist: 'Deep Wave', assetId: '3478239381', upc: '198009654321', isrc: 'USAT22354321', otherParty: 'Believe', status: 'Resolved', albumCoverUrl: 'https://placehold.co/80x80/1abc9c/ffffff?text=O' },
    ];
  
    initializeOwnershipPage({
        pageSelector: '.admin-ownership-data-page',
        youtubeData: youtubeConflictData,
    });
});
// facebook-page js
// Add this entire new block to your app.js file
// document.addEventListener('DOMContentLoaded', function() {

//     // =========================================================================
//     //  REUSABLE FUNCTION FOR ALL CONFLICT PAGES (YOUTUBE, FACEBOOK, ETC.)
//     // =========================================================================
//     function initializeConflictPage(config) {
//         const pageContainer = document.querySelector(config.pageSelector);
//         if (!pageContainer) {
//             return; // Exit if we're not on the right page
//         }

//         // --- DATA & HELPERS ---
//             const territoriesByRegion = {
//       Africa: [
//         { name: "Algeria", code: "DZ" },
//         { name: "Angola", code: "AO" },
//         { name: "Benin", code: "BJ" },
//         { name: "Botswana", code: "BW" },
//         { name: "Burkina Faso", code: "BF" },
//         { name: "Burundi", code: "BI" },
//         { name: "Cabo Verde", code: "CV" },
//         { name: "Cameroon", code: "CM" },
//         { name: "Central African Republic", code: "CF" },
//         { name: "Chad", code: "TD" },
//         { name: "Comoros", code: "KM" },
//         { name: "Congo", code: "CG" },
//         { name: "Congo (DRC)", code: "CD" },
//         { name: "Côte d'Ivoire", code: "CI" },
//         { name: "Djibouti", code: "DJ" },
//         { name: "Egypt", code: "EG" },
//         { name: "Equatorial Guinea", code: "GQ" },
//         { name: "Eritrea", code: "ER" },
//         { name: "Eswatini", code: "SZ" },
//         { name: "Ethiopia", code: "ET" },
//         { name: "Gabon", code: "GA" },
//         { name: "Gambia", code: "GM" },
//         { name: "Ghana", code: "GH" },
//         { name: "Guinea", code: "GN" },
//         { name: "Guinea-Bissau", code: "GW" },
//         { name: "Kenya", code: "KE" },
//         { name: "Lesotho", code: "LS" },
//         { name: "Liberia", code: "LR" },
//         { name: "Libya", code: "LY" },
//         { name: "Madagascar", code: "MG" },
//         { name: "Malawi", code: "MW" },
//         { name: "Mali", code: "ML" },
//         { name: "Mauritania", code: "MR" },
//         { name: "Mauritius", code: "MU" },
//         { name: "Mayotte", code: "YT" },
//         { name: "Morocco", code: "MA" },
//         { name: "Mozambique", code: "MZ" },
//         { name: "Namibia", code: "NA" },
//         { name: "Niger", code: "NE" },
//         { name: "Nigeria", code: "NG" },
//         { name: "Réunion", code: "RE" },
//         { name: "Rwanda", code: "RW" },
//         { name: "Saint Helena", code: "SH" },
//         { name: "Sao Tome and Principe", code: "ST" },
//         { name: "Senegal", code: "SN" },
//         { name: "Seychelles", code: "SC" },
//         { name: "Sierra Leone", code: "SL" },
//         { name: "Somalia", code: "SO" },
//         { name: "South Africa", code: "ZA" },
//         { name: "South Sudan", code: "SS" },
//         { name: "Sudan", code: "SD" },
//         { name: "Tanzania", code: "TZ" },
//         { name: "Togo", code: "TG" },
//         { name: "Tunisia", code: "TN" },
//         { name: "Uganda", code: "UG" },
//         { name: "Zambia", code: "ZM" },
//         { name: "Zimbabwe", code: "ZW" },
//       ],
//       Antarctica: [
//         { name: "Antarctica", code: "AQ" },
//         { name: "French Southern Territories", code: "TF" },
//         { name: "South Georgia and the South Sandwich Islands", code: "GS" },
//       ],
//       Asia: [
//         { name: "Afghanistan", code: "AF" },
//         { name: "Armenia", code: "AM" },
//         { name: "Azerbaijan", code: "AZ" },
//         { name: "Bahrain", code: "BH" },
//         { name: "Bangladesh", code: "BD" },
//         { name: "Bhutan", code: "BT" },
//         { name: "British Indian Ocean Territory", code: "IO" },
//         { name: "Brunei", code: "BN" },
//         { name: "Cambodia", code: "KH" },
//         { name: "China", code: "CN" },
//         { name: "Cyprus", code: "CY" },
//         { name: "Georgia", code: "GE" },
//         { name: "Hong Kong", code: "HK" },
//         { name: "India", code: "IN" },
//         { name: "Indonesia", code: "ID" },
//         { name: "Iran", code: "IR" },
//         { name: "Iraq", code: "IQ" },
//         { name: "Israel", code: "IL" },
//         { name: "Japan", code: "JP" },
//         { name: "Jordan", code: "JO" },
//         { name: "Kazakhstan", code: "KZ" },
//         { name: "Kuwait", code: "KW" },
//         { name: "Kyrgyzstan", code: "KG" },
//         { name: "Laos", code: "LA" },
//         { name: "Lebanon", code: "LB" },
//         { name: "Macao", code: "MO" },
//         { name: "Malaysia", code: "MY" },
//         { name: "Maldives", code: "MV" },
//         { name: "Mongolia", code: "MN" },
//         { name: "Myanmar", code: "MM" },
//         { name: "Nepal", code: "NP" },
//         { name: "North Korea", code: "KP" },
//         { name: "Oman", code: "OM" },
//         { name: "Pakistan", code: "PK" },
//         { name: "Palestine", code: "PS" },
//         { name: "Philippines", code: "PH" },
//         { name: "Qatar", code: "QA" },
//         { name: "Saudi Arabia", code: "SA" },
//         { name: "Singapore", code: "SG" },
//         { name: "South Korea", code: "KR" },
//         { name: "Sri Lanka", code: "LK" },
//         { name: "Syria", code: "SY" },
//         { name: "Taiwan", code: "TW" },
//         { name: "Tajikistan", code: "TJ" },
//         { name: "Thailand", code: "TH" },
//         { name: "Timor-Leste", code: "TL" },
//         { name: "Turkey", code: "TR" },
//         { name: "Turkmenistan", code: "TM" },
//         { name: "United Arab Emirates", code: "AE" },
//         { name: "Uzbekistan", code: "UZ" },
//         { name: "Vietnam", code: "VN" },
//         { name: "Yemen", code: "YE" },
//       ],
//       Europe: [
//         { name: "Åland Islands", code: "AX" },
//         { name: "Albania", code: "AL" },
//         { name: "Andorra", code: "AD" },
//         { name: "Austria", code: "AT" },
//         { name: "Belarus", code: "BY" },
//         { name: "Belgium", code: "BE" },
//         { name: "Bosnia and Herzegovina", code: "BA" },
//         { name: "Bulgaria", code: "BG" },
//         { name: "Croatia", code: "HR" },
//         { name: "Czechia", code: "CZ" },
//         { name: "Denmark", code: "DK" },
//         { name: "Estonia", code: "EE" },
//         { name: "Faroe Islands", code: "FO" },
//         { name: "Finland", code: "FI" },
//         { name: "France", code: "FR" },
//         { name: "Germany", code: "DE" },
//         { name: "Gibraltar", code: "GI" },
//         { name: "Greece", code: "GR" },
//         { name: "Guernsey", code: "GG" },
//         { name: "Holy See", code: "VA" },
//         { name: "Hungary", code: "HU" },
//         { name: "Iceland", code: "IS" },
//         { name: "Ireland", code: "IE" },
//         { name: "Isle of Man", code: "IM" },
//         { name: "Italy", code: "IT" },
//         { name: "Jersey", code: "JE" },
//         { name: "Latvia", code: "LV" },
//         { name: "Liechtenstein", code: "LI" },
//         { name: "Lithuania", code: "LT" },
//         { name: "Luxembourg", code: "LU" },
//         { name: "Malta", code: "MT" },
//         { name: "Moldova", code: "MD" },
//         { name: "Monaco", code: "MC" },
//         { name: "Montenegro", code: "ME" },
//         { name: "Netherlands", code: "NL" },
//         { name: "North Macedonia", code: "MK" },
//         { name: "Norway", code: "NO" },
//         { name: "Poland", code: "PL" },
//         { name: "Portugal", code: "PT" },
//         { name: "Romania", code: "RO" },
//         { name: "Russia", code: "RU" },
//         { name: "San Marino", code: "SM" },
//         { name: "Serbia", code: "RS" },
//         { name: "Slovakia", code: "SK" },
//         { name: "Slovenia", code: "SI" },
//         { name: "Spain", code: "ES" },
//         { name: "Svalbard and Jan Mayen", code: "SJ" },
//         { name: "Sweden", code: "SE" },
//         { name: "Switzerland", code: "CH" },
//         { name: "Ukraine", code: "UA" },
//         { name: "United Kingdom", code: "GB" },
//       ],
//       "North America": [
//         { name: "Anguilla", code: "AI" },
//         { name: "Antigua and Barbuda", code: "AG" },
//         { name: "Aruba", code: "AW" },
//         { name: "Bahamas", code: "BS" },
//         { name: "Barbados", code: "BB" },
//         { name: "Belize", code: "BZ" },
//         { name: "Bermuda", code: "BM" },
//         { name: "Bonaire", code: "BQ" },
//         { name: "Canada", code: "CA" },
//         { name: "Cayman Islands", code: "KY" },
//         { name: "Costa Rica", code: "CR" },
//         { name: "Cuba", code: "CU" },
//         { name: "Curaçao", code: "CW" },
//         { name: "Dominica", code: "DM" },
//         { name: "Dominican Republic", code: "DO" },
//         { name: "El Salvador", code: "SV" },
//         { name: "Greenland", code: "GL" },
//         { name: "Grenada", code: "GD" },
//         { name: "Guadeloupe", code: "GP" },
//         { name: "Guatemala", code: "GT" },
//         { name: "Haiti", code: "HT" },
//         { name: "Honduras", code: "HN" },
//         { name: "Jamaica", code: "JM" },
//         { name: "Martinique", code: "MQ" },
//         { name: "Mexico", code: "MX" },
//         { name: "Montserrat", code: "MS" },
//         { name: "Nicaragua", code: "NI" },
//         { name: "Panama", code: "PA" },
//         { name: "Puerto Rico", code: "PR" },
//         { name: "Saint Barthélemy", code: "BL" },
//         { name: "Saint Kitts and Nevis", code: "KN" },
//         { name: "Saint Lucia", code: "LC" },
//         { name: "Saint Martin", code: "MF" },
//         { name: "Saint Pierre and Miquelon", code: "PM" },
//         { name: "Saint Vincent and the Grenadines", code: "VC" },
//         { name: "Sint Maarten", code: "SX" },
//         { name: "Trinidad and Tobago", code: "TT" },
//         { name: "Turks and Caicos Islands", code: "TC" },
//         { name: "United States", code: "US" },
//         { name: "U.S. Virgin Islands", code: "VI" },
//       ],
//       Oceania: [
//         { name: "American Samoa", code: "AS" },
//         { name: "Australia", code: "AU" },
//         { name: "Christmas Island", code: "CX" },
//         { name: "Cocos (Keeling) Islands", code: "CC" },
//         { name: "Cook Islands", code: "CK" },
//         { name: "Fiji", code: "FJ" },
//         { name: "French Polynesia", code: "PF" },
//         { name: "Guam", code: "GU" },
//         { name: "Kiribati", code: "KI" },
//         { name: "Marshall Islands", code: "MH" },
//         { name: "Micronesia", code: "FM" },
//         { name: "Nauru", code: "NR" },
//         { name: "New Caledonia", code: "NC" },
//         { name: "New Zealand", code: "NZ" },
//         { name: "Niue", code: "NU" },
//         { name: "Norfolk Island", code: "NF" },
//         { name: "Northern Mariana Islands", code: "MP" },
//         { name: "Palau", code: "PW" },
//         { name: "Papua New Guinea", code: "PG" },
//         { name: "Pitcairn", code: "PN" },
//         { name: "Samoa", code: "WS" },
//         { name: "Solomon Islands", code: "SB" },
//         { name: "Tokelau", code: "TK" },
//         { name: "Tonga", code: "TO" },
//         { name: "Tuvalu", code: "TV" },
//         { name: "U.S. Minor Outlying Islands", code: "UM" },
//         { name: "Vanuatu", code: "VU" },
//         { name: "Wallis and Futuna", code: "WF" },
//       ],
//       "South America": [
//         { name: "Argentina", code: "AR" },
//         { name: "Bolivia", code: "BO" },
//         { name: "Brazil", code: "BR" },
//         { name: "Chile", code: "CL" },
//         { name: "Colombia", code: "CO" },
//         { name: "Ecuador", code: "EC" },
//         { name: "Falkland Islands", code: "FK" },
//         { name: "French Guiana", code: "GF" },
//         { name: "Guyana", code: "GY" },
//         { name: "Paraguay", code: "PY" },
//         { name: "Peru", code: "PE" },
//         { name: "Suriname", code: "SR" },
//         { name: "Uruguay", code: "UY" },
//         { name: "Venezuela", code: "VE" },
//       ],
//     };
//         const totalCountries = Object.values(territoriesByRegion).flat().length;

//         const getStatusBadge = (status) => {
//             let badgeClass = 'bg-secondary-subtle text-secondary-emphasis';
//             if (status === 'Action Required') badgeClass = 'bg-danger-subtle text-danger-emphasis';
//             else if (status === 'Resolved') badgeClass = 'bg-success-subtle text-success-emphasis';
//             else if (status === 'In Review') badgeClass = 'bg-warning-subtle text-warning-emphasis';
//             return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
//         };
//         const parseViews = (views) => (typeof views !== 'string') ? 0 : parseFloat(views.toUpperCase()) * (views.toUpperCase().includes('K') ? 1000 : 1);
//         const parseExpiry = (expiry) => (typeof expiry !== 'string' || expiry === '-') ? Infinity : parseInt(expiry);
        
//         // --- DATATABLES CONFIGURATION ---
//         const dataTableInstance = $(pageContainer.querySelector('#datatable')).DataTable({
//             destroy: true,
//             data: config.data,
//             paging: true,
//             searching: true,
//             info: true,
//             lengthChange: true,
//             autoWidth: false,
//             columns: [
//                 { data: null, className: 'text-center', orderable: false, render: () => `<i class="bi ${config.platformIconClass} fs-5"></i>` },
//                 { data: 'category' },
//                 { data: 'assetTitle' },
//                 { data: null, render: (data, type, row) => `<div class="fw-bold">${row.artist}</div><small class="text-muted">Asset ID: ${row.assetId}</small>` },
//                 { data: 'upc' },
//                 { data: 'otherParty' },
//                 { data: 'dailyViews', render: { _: (data) => data, sort: (data) => parseViews(data) } },
//                 { data: 'expiry', render: { _: (data) => data, sort: (data) => parseExpiry(data) } },
//                 { data: 'status', render: (data) => getStatusBadge(data) },
//                 { data: null, className: 'text-center', orderable: false, render: () => `<i class="bi bi-chevron-right text-muted"></i>` }
//             ],
//             createdRow: function(row, data) {
//                 $(row).attr({
//                     'style': 'cursor: pointer;',
//                     'data-bs-toggle': 'offcanvas',
//                     'data-bs-target': config.offcanvasId,
//                     'data-song-name': data.assetTitle,
//                     'data-artist-name': data.artist,
//                     'data-isrc': data.isrc,
//                     'data-cover-url': data.albumCoverUrl,
//                     'data-category': data.category,
//                     'data-other-party': data.otherParty
//                 });
//             },
//             language: { search: "_INPUT_", searchPlaceholder: "Search conflicts..." }
//         });

//         // --- OFFCANVAS LOGIC ---
//         const conflictOffcanvasEl = document.querySelector(config.offcanvasId);
//         if (conflictOffcanvasEl) {
//             const conflictForm = conflictOffcanvasEl.querySelector('form');
//             const steps = Array.from(conflictOffcanvasEl.querySelectorAll('.form-step'));
//             const nextBtn = conflictOffcanvasEl.querySelector('#nextBtn');
//             const backBtn = conflictOffcanvasEl.querySelector('#backBtn');
//             const submitBtn = conflictOffcanvasEl.querySelector('#submitBtn');
//             let currentStep = 0;

//             function showStep(stepIndex) {
//                 steps.forEach((step, index) => step.classList.toggle('d-none', index !== stepIndex));
//                 backBtn.classList.toggle('d-none', stepIndex === 0);
//                 nextBtn.classList.toggle('d-none', stepIndex === steps.length - 1);
//                 submitBtn.classList.toggle('d-none', stepIndex !== steps.length - 1);
//                 currentStep = stepIndex;
//             }

//             nextBtn.addEventListener('click', () => {
//                 if (currentStep === 0 && !conflictForm.querySelector('input[name="rightsOwned"]:checked')) return alert('Please select a rights option.');
//                 if (currentStep === 1 && !conflictForm.querySelector('.country-checkbox:checked')) return alert('Please select at least one territory.');
//                 if (currentStep < steps.length - 1) showStep(currentStep + 1);
//             });

//             backBtn.addEventListener('click', () => {
//                 if (currentStep > 0) showStep(currentStep - 1);
//             });

//             conflictOffcanvasEl.addEventListener('show.bs.offcanvas', function(event) {
//                 const data = event.relatedTarget.dataset;
//                 ['', '2', '3'].forEach(s => {
//                     const suffix = s ? parseInt(s) : '';
//                     conflictOffcanvasEl.querySelector(`#modalAlbumCover${suffix}`).src = data.coverUrl;
//                     conflictOffcanvasEl.querySelector(`#modalSongName${suffix}`).textContent = data.songName;
//                     conflictOffcanvasEl.querySelector(`#modalArtistName${suffix}`).textContent = data.artistName;
//                 });
//                 conflictOffcanvasEl.querySelector('#modalIsrc').textContent = `ISRC: ${data.isrc}`;
//                 conflictOffcanvasEl.querySelector('#modalPlatform').textContent = config.platformName;
//                 conflictOffcanvasEl.querySelector('#offcanvasTitle').textContent = data.category;
//                 conflictOffcanvasEl.querySelector('#offcanvasSubtitle').textContent = `VS. ${data.otherParty}`;
//                 renderTerritoryAccordion();
//                 conflictForm.reset();
//                 showStep(0);
//             });
            
//             conflictForm.addEventListener('submit', function(e) {
//                 e.preventDefault();
//                 alert('Resolution submitted successfully!');
//                 bootstrap.Offcanvas.getInstance(conflictOffcanvasEl).hide();
//             });

//             function renderTerritoryAccordion() {
//                 const accordionContainer = conflictOffcanvasEl.querySelector('#territoryAccordion');
//                 accordionContainer.innerHTML = Object.entries(territoriesByRegion).map(([region, countries]) => {
//                     if (countries.length === 0) return '';
//                     const regionId = region.replace(/[^a-zA-Z0-9]/g, '');
//                     return `
//                     <div class="accordion-item">
//                         <h2 class="accordion-header">
//                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${config.platformName}-${regionId}">
//                                 <div class="form-check me-auto"><input class="form-check-input region-checkbox" type="checkbox" data-region="${region}" checked><label class="form-check-label fw-bold">${region}</label></div>
//                                 <span class="text-muted small me-2">${countries.length} countries</span>
//                             </button>
//                         </h2>
//                         <div id="collapse-${config.platformName}-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
//                             <div class="accordion-body">${countries.map(c =>`<div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" data-region="${region}" checked><label class="form-check-label">${c.name}</label></div>`).join('')}</div>
//                         </div>
//                     </div>`;
//                 }).join('');
//                 addTerritoryEventListeners();
//                 updateTerritoryCounter();
//             }

//             function updateTerritoryCounter() {
//                  const selected = conflictOffcanvasEl.querySelectorAll('.country-checkbox:checked').length;
//                  conflictOffcanvasEl.querySelector('#territoryCounter').textContent = `${selected} contested countries out of ${totalCountries} delivered`;
//             }

//             function addTerritoryEventListeners() { /* ... same logic as before ... */ }
//         }
//     }
    
//     // =========================================================================
//     //  PAGE-SPECIFIC CONFIGURATIONS
//     // =========================================================================

//     // --- YouTube Page Configuration ---
//     const youtubeConflictData = [
//         { id: 1, category: 'Ownership conflict', assetTitle: 'Cosmic Drift', artist: 'Astro Beats', assetId: '90736897913', upc: '198009123456', isrc: 'USAT22312345', otherParty: 'The Orchard', dailyViews: '79K', expiry: '2 days', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/ff0000/ffffff?text=C' },
//         { id: 2, category: 'Policy', assetTitle: 'Ocean Tides', artist: 'Deep Wave', assetId: '3478239381', upc: '198009654321', isrc: 'USAT22354321', otherParty: 'Believe', dailyViews: '3K', expiry: '-', status: 'Resolved', albumCoverUrl: 'https://placehold.co/80x80/1abc9c/ffffff?text=O' },
//     ];
//     initializeConflictPage({
//         pageSelector: '.admin-youtube-page', // The unique class for the YouTube page
//         data: youtubeConflictData,
//         platformName: 'YouTube',
//         platformIconClass: 'bi-youtube text-danger',
//         offcanvasId: '#conflictResolutionOffcanvas'
//     });

//     // --- Facebook Page Configuration ---
//     const facebookConflictData = [
//         { id: 1, category: 'Ownership conflict', assetTitle: 'Facebook Song A', artist: 'Social Singers', assetId: 'FB12345', upc: '198009111222', isrc: 'USFB12345678', otherParty: 'DistroKid', dailyViews: '15K', expiry: '5 days', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/3b5998/ffffff?text=A' },
//         { id: 2, category: 'Metadata Error', assetTitle: 'Insta Reel Hit', artist: 'The Grammers', assetId: 'FB54321', upc: '198009222333', isrc: 'USFB87654321', otherParty: 'TuneCore', dailyViews: '1M', expiry: '20 days', status: 'In Review', albumCoverUrl: 'https://placehold.co/80x80/833ab4/ffffff?text=H' },
//     ];
//     initializeConflictPage({
//         pageSelector: '.admin-facebook-page', // The unique class for the Facebook page
//         data: facebookConflictData,
//         platformName: 'Facebook',
//         platformIconClass: 'bi-facebook text-primary',
//         offcanvasId: '#facebookConflictOffcanvas'
//     });
// });


// claim-data-page js
// In your app.js, replace the entire .admin-claim-data-page block with this:
document.addEventListener("DOMContentLoaded", function () {
  const page = document.querySelector(".admin-claim-data-page");
  if (!page) return;

  let claimingRequests = [];
  let currentFilter = "all";
  let filteredData = []; // Store filtered data separately
  const table = $("#claimDatatable");
  const releaseModalEl = document.getElementById("claimingRequestModal");
  const releaseModal = new bootstrap.Modal(releaseModalEl);

  // Check if table element exists
  if (table.length === 0) {
    console.error("DataTable element #datatable not found");
    return;
  }

  // Icons + Badge helpers
  const getStatusIcon = (status) => {
    const s = (status || "").toLowerCase();
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
    return `<i data-feather="${icons[s] || "help-circle"}" class="${
      colors[s] || "text-muted"
    }"></i>`;
  };

  const getStatusBadge = (status) => {
    const s = (status || "").toLowerCase();
    const cls =
      {
        approved: "status-approved",
        pending: "status-pending",
        rejected: "status-rejected",
      }[s] || "bg-secondary";
    return `<span class="badge status-badge ${cls}">${s.toUpperCase()}</span>`;
  };

  const createLink = (url, iconClass) =>
    url && url !== "N/A" && url !== ""
      ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>`
      : "";

  // Filter data based on status
  function getFilteredData() {
    if (currentFilter === "all") {
      return claimingRequests;
    }
    return claimingRequests.filter(
      (item) => (item.status || "").toLowerCase() === currentFilter
    );
  }

  // Fetch data
  async function fetchClaimingData() {
    try {
      const res = await fetch("/superadmin/api/claiming-data");
      if (!res.ok) {
        throw new Error(`HTTP ${res.status}: ${res.statusText}`);
      }
      const json = await res.json();
      if (!json.success) throw new Error(json.error || "Failed to fetch");

      claimingRequests = json.data || [];
      console.log("Fetched data:", claimingRequests); // Debug log
      updateTableData();
    } catch (e) {
      console.error("Fetch error:", e);
      alert("Failed to load claiming data: " + e.message);
    }
  }

  // Update table with filtered data
  function updateTableData() {
    try {
      filteredData = getFilteredData();
      console.log("Filtered data:", filteredData); // Debug log
      dataTableInstance.clear().rows.add(filteredData).draw();
    } catch (e) {
      console.error("Update table error:", e);
    }
  }

  // Update status (Approve/Reject/Pending)
  async function updateClaimingStatus(id, status) {
    try {
      const res = await fetch(`/superadmin/api/claiming-data/${id}/status`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify({ status }),
      });
      const json = await res.json();
      if (!json.success) throw new Error(json.error || "Failed to update");

      // Update the status in our data
      const idx = claimingRequests.findIndex((r) => r.id === id);
      if (idx !== -1) {
        claimingRequests[idx].status = status;
      }

      // Refresh table with updated data
      updateTableData();
      return true;
    } catch (e) {
      console.error("Update status error:", e);
      alert("Failed to update status: " + e.message);
      return false;
    }
  }

  // Initialize DataTable
  let dataTableInstance;
  try {
    dataTableInstance = table.DataTable({
      destroy: true,
      data: [],
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      pageLength: 10,
      processing: true,
      language: {
        search: "Search records:",
        searchPlaceholder: "Search by song name, artist, UPC, ISRC...",
        emptyTable: "No claiming requests found",
        zeroRecords: "No matching records found",
        processing: "Loading...",
      },
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          searchable: false,
          width: "60px",
          render: (data, type, row) => {
            if (type === "display") {
              return getStatusIcon(data);
            }
            return data || "";
          },
        },
        {
          data: "songName", // Fixed: Use correct field name
          orderable: true,
          searchable: true,
          render: (data, type, row) => {
            if (type === "display") {
              return `
                <div>
                  <div class="release-title">${row.songName || "Untitled"}</div>
                  <div class="release-artist text-muted small">${
                    row.artist || "Unknown"
                  }</div>
                </div>`;
            }
            // For search, return searchable text
            return `${row.songName || ""} ${row.artist || ""}`;
          },
        },
        {
          data: "upc",
          searchable: true,
          className: "text-center",
          render: (data, type, row) => {
            if (type === "display") {
              return data || "N/A";
            }
            return data || "";
          },
        },
        {
          data: "isrc",
          className: "text-center",
          searchable: true,
          render: (data, type, row) => {
            if (type === "display") {
              return data || "N/A";
            }
            return data || "";
          },
        },
        {
          data: "status",
          className: "text-center",
          searchable: true,
          width: "120px",
          render: (data, type, row) => {
            if (type === "display") {
              return `<div class="d-flex justify-content-center">${getStatusBadge(
                data
              )}</div>`;
            }
            // For search, return plain status text
            return data || "";
          },
        },
        // Action column (only video links + View button)
        {
          data: null,
          className: "text-center",
          orderable: false,
          searchable: false,
          width: "200px",
          render: (data, type, row) => {
            if (type === "display") {
              let linksHtml = "";
              if (Array.isArray(row.videoLinks)) {
                row.videoLinks.forEach((url, i) => {
                  linksHtml += `<a href="${url}" target="_blank" class="btn btn-sm btn-outline-secondary me-1">Video ${i + 1}</a>`;
                });
              }
              return `
                ${linksHtml}
                <button class="btn btn-sm btn-primary view-btn" data-id="${row.id}">View</button>
              `;
            }
            return "";
          },
        },
      ],
      drawCallback: function () {
        // Replace feather icons after each draw
        if (typeof feather !== "undefined") {
          feather.replace();
        }
      },
      initComplete: function () {
        console.log("DataTable initialized successfully");
      },
    });
  } catch (e) {
    console.error("DataTable initialization error:", e);
    alert("Failed to initialize table: " + e.message);
    return;
  }

  // Modal Open
  function openReleaseModal(id) {
    const r = claimingRequests.find((x) => x.id === id);
    if (!r) {
      console.error("Record not found for ID:", id);
      return;
    }

    releaseModalEl.dataset.currentId = r.id;

    document.getElementById("songName").value = r.songName || "N/A";
    document.getElementById("artistName").value = r.artist || "N/A";
    document.getElementById("isrcCode").value = r.isrc || "N/A";
    document.getElementById("upcCode").value = r.upc || "N/A";
    document.getElementById("removalReason").value = r.removalReason || "N/A";
    document.getElementById("statusDropdown").value = r.status || "Pending";

    // Show video links (optional: display in console or append somewhere in modal)
    console.log("Video Links:", r.videoLinks);

    releaseModal.show();
  }


  // Save button handler (Approve/Reject/Pending)
  document
    .getElementById("saveClaimingRequest")
    ?.addEventListener("click", async () => {
      const id = parseInt(releaseModalEl.dataset.currentId, 10);
      const newStatus = document.getElementById("statusDropdown").value;

      if (!id || !newStatus) {
        alert("Invalid data");
        return;
      }

      const ok = await updateClaimingStatus(id, newStatus);
      if (ok) {
        releaseModal.hide();
      }
    });

  // Event: filter tabs
  document.getElementById("filterTabs")?.addEventListener("click", (e) => {
    if (e.target.matches("a.nav-link[data-filter]")) {
      e.preventDefault();
      const newFilter = e.target.dataset.filter;

      // Only update if filter actually changed
      if (currentFilter !== newFilter) {
        currentFilter = newFilter;

        // Update active tab
        document
          .querySelectorAll("#filterTabs .nav-link")
          .forEach((t) => t.classList.remove("active"));
        e.target.classList.add("active");

        // Clear search and update table
        if (dataTableInstance) {
          dataTableInstance.search("");
          updateTableData();
        }
      }
    }
  });

  // Event: "View" button in Action column
  $("#claimDatatable tbody").on("click", ".view-btn", function (e) {
    e.preventDefault();
    const id = parseInt($(this).data("id"), 10);
    if (id) {
      openReleaseModal(id);
    }
  });

  // Export button
  document.getElementById("exportCsvBtn")?.addEventListener("click", () => {
    window.location.href = "/superadmin/claiming-data/export-csv";
  });

  // Debug function to check if search is working
  table.on("search.dt", function () {
    console.log("Search triggered:", dataTableInstance.search());
  });

  // Initialize - Add error handling
  console.log("Starting to fetch claiming data...");
  fetchClaimingData();
});

// merge-data-page js
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const mergePage = document.querySelector(".admin-merge-data-page");

  if (mergePage) {
    const mergeModalEl = document.getElementById("mergeDataModal");
    const mergeModal = new bootstrap.Modal(mergeModalEl);

    const table = $("#mergeDataTable").DataTable({
      ajax: { url: "/superadmin/merge-data/list", dataSrc: "data" },
      columns: [
        {
          data: "status",
          className: "text-center",
          render: (data) => {
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
            return `<i data-feather="${icons[data] || "help-circle"}" class="${
              colors[data] || "text-muted"
            }"></i>`;
          },
        },
        {
          data: null,
          render: (row) =>
            `<div class="release-title"><a href="#" class="merge-view-link" data-id="${row.id}">${row.songName}</a></div>
             <div class="text-muted small">${row.artist}</div>`,
        },
        { data: "isrc", defaultContent: "N/A" },
        {
          data: null,
          className: "text-center",
          render: (row) =>
            (row.instagramAudio
              ? `<a href="${row.instagramAudio}" target="_blank" class="me-2"><i class="bi bi-music-note-beamed"></i></a>`
              : "") +
            (row.reelMerge
              ? `<a href="${row.reelMerge}" target="_blank"><i class="bi bi-camera-reels"></i></a>`
              : ""),
        },
        { data: "matchingTime", defaultContent: "N/A" },
        {
          data: "status",
          className: "text-center",
          render: (data) => {
            const badgeClass = {
              approved: "success",
              pending: "warning",
              rejected: "danger",
            };
            return `<span class="badge bg-${
              badgeClass[data] || "secondary"
            }">${data.toUpperCase()}</span>`;
          },
        },
      ],
      drawCallback: () => feather.replace(),
    });

    // ✅ Fix filter tabs
    document.getElementById("filterTabs")?.addEventListener("click", (e) => {
      if (e.target.matches("a.nav-link[data-filter]")) {
        e.preventDefault();
        const filter = e.target.dataset.filter;

        // Update active tab
        document
          .querySelectorAll("#filterTabs .nav-link")
          .forEach((t) => t.classList.remove("active"));
        e.target.classList.add("active");

        // Apply filter to status column (index 5 here)
        if (filter === "all") {
          table.column(5).search("").draw();
        } else {
          table.column(5).search("^" + filter + "$", true, false).draw();
        }
      }
    });

    // Open modal
    $("#mergeDataTable tbody").on(
      "click",
      ".merge-view-link",
      async function (e) {
        e.preventDefault();
        const id = $(this).data("id");

        try {
          const response = await fetch(`/superadmin/merge-data/detail/${id}`);
          const result = await response.json();
          if (result.success) {
            const d = result.data;
            document.getElementById("modal-songName").textContent = d.songName;
            document.getElementById("modal-artist").textContent = d.artist;
            document.getElementById("modal-isrc").textContent = d.isrc || "N/A";
            document.getElementById("modal-matchingTime").textContent =
              d.matchingTime || "N/A";
            document.getElementById("modal-instagramAudio").innerHTML =
              d.instagramAudio
                ? `<a href="${d.instagramAudio}" target="_blank">${d.instagramAudio}</a>`
                : "N/A";
            document.getElementById("modal-reelMerge").innerHTML = d.reelMerge
              ? `<a href="${d.reelMerge}" target="_blank">${d.reelMerge}</a>`
              : "N/A";
            document.getElementById(
              "modal-status"
            ).innerHTML = `<span class="badge bg-info">${d.status.toUpperCase()}</span>`;

            mergeModalEl.dataset.currentId = d.id;
            mergeModal.show();
          }
        } catch (err) {
          console.error("Failed to fetch details:", err);
        }
      }
    );

    // Approve / Reject
    document
      .getElementById("approveBtn")
      .addEventListener("click", async () => {
        const id = mergeModalEl.dataset.currentId;
        await fetch(`/superadmin/merge-data/update-status/${id}`, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ status: "approved" }),
        });
        table.ajax.reload();
        mergeModal.hide();
      });

    document.getElementById("rejectBtn").addEventListener("click", async () => {
      const id = mergeModalEl.dataset.currentId;
      await fetch(`/superadmin/merge-data/update-status/${id}`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ status: "rejected" }),
      });
      table.ajax.reload();
      mergeModal.hide();
    });
  }
});


// relocation-data-page js

// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const relocationPageContainer = document.querySelector(".admin-reloc-data-page");
  if (!relocationPageContainer) return;

  // --- HELPER FUNCTIONS ---
  const getStatusIcon = (status) => {
    const s = (status || "").toLowerCase();
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
    return `<i data-feather="${icons[s] || "help-circle"}" class="${colors[s] || "text-muted"}"></i>`;
  };

  const getStatusBadge = (status) => {
    console.log("getStatusBadge called with:", status, "Type:", typeof status); // Debug
    
    // Handle null, undefined, or empty status
    if (!status || status === null || status === undefined) {
      status = 'pending'; // Default fallback
    }
    
    const s = String(status).trim().toLowerCase(); // Convert to string first, then normalize
    console.log("Normalized status:", s); // Debug
    
    const cls = {
      approved: "status-approved",
      pending: "status-pending", 
      rejected: "status-rejected",
    }[s] || "bg-secondary";

    const displayText = s ? s.toUpperCase() : 'PENDING';
    
    return `<span class="badge status-badge ${cls}">${displayText}</span>`;
  };

  const createLink = (url, iconClass) =>
    url && url !== "N/A" && url !== ""
      ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>`
      : `<span class="text-muted">-</span>`;

  // --- MODAL FUNCTIONS ---
  const openModal = async (id) => {
    try {
      console.log("Opening modal for relocation ID:", id);
      const modal = new bootstrap.Modal(document.getElementById("releaseModal"));

      const response = await fetch(`/superadmin/api/relocation-data/${id}`);
      const result = await response.json();

      if (!result.success) {
        throw new Error(result.error || "Failed to fetch data");
      }

      const data = result.data;
      console.log("Modal data:", data);
      console.log("Status from API:", data.status); // Debug specific status

      populateModal(data);
      modal.show();
      document.getElementById("releaseModal").setAttribute("data-current-id", id);
    } catch (error) {
      console.error("Error opening modal:", error);
      alert("Failed to load request details. Please try again.");
    }
  };

  const populateModal = (data) => {
    console.log("Full data object:", data); // Debug: Check entire data object
    console.log("Status value:", data.status); // Debug: Check specific status value
    
    // Basic fields
    document.getElementById("releaseTitle").textContent = data.songName || "-";
    document.getElementById("releaseArtistHeader").textContent = data.artist || "-";
    document.getElementById("modal-isrc").textContent = data.isrc || "-";

    // Status - Fixed with better error handling
  document.getElementById("releaseStatusBadges").textContent = data.status || "-";


    // Instagram Audio Link
    const instaAudio = document.getElementById("modal-instagramAudio");
    if (instaAudio) {
      instaAudio.innerHTML =
        data.instagramAudio && data.instagramAudio !== "N/A" && data.instagramAudio !== ""
          ? `<a href="${data.instagramAudio}" target="_blank" class="text-primary">${data.instagramAudio}</a>`
          : "-";
    }

    // Instagram Link
    const instaLink = document.getElementById("modal-instagramLink");
    if (instaLink) {
      instaLink.innerHTML =
        data.instagramLink && data.instagramLink !== "N/A" && data.instagramLink !== ""
          ? `<a href="${data.instagramLink}" target="_blank" class="text-primary">${data.instagramLink}</a>`
          : "-";
    }

    // Facebook Link
    const fbLink = document.getElementById("modal-facebookLink");
    if (fbLink) {
      fbLink.innerHTML =
        data.facebookLink && data.facebookLink !== "N/A" && data.facebookLink !== ""
          ? `<a href="${data.facebookLink}" target="_blank" class="text-primary">${data.facebookLink}</a>`
          : "-";
    }

    // Update approve/reject buttons
    updateButtonStates(data.status || 'pending');
  };

  const updateButtonStates = (status) => {
    const approveBtn = document.getElementById("approveBtn");
    const rejectBtn = document.getElementById("rejectBtn");
    
    if (!approveBtn || !rejectBtn) {
      console.error("Approve or Reject button not found!");
      return;
    }

    const normalizedStatus = String(status || 'pending').toLowerCase();
    console.log("updateButtonStates called with:", normalizedStatus); // Debug

    // Reset buttons to default state
    approveBtn.disabled = false;
    rejectBtn.disabled = false;
    approveBtn.classList.remove("btn-outline-success");
    rejectBtn.classList.remove("btn-outline-danger");
    approveBtn.classList.add("btn-success");
    rejectBtn.classList.add("btn-danger");

    if (normalizedStatus === "approved") {
      approveBtn.disabled = true;
      approveBtn.classList.remove("btn-success");
      approveBtn.classList.add("btn-outline-success");
      approveBtn.textContent = "Approved";
    } else {
      approveBtn.textContent = "Approve";
    }

    if (normalizedStatus === "rejected") {
      rejectBtn.disabled = true;
      rejectBtn.classList.remove("btn-danger");
      rejectBtn.classList.add("btn-outline-danger");
      rejectBtn.textContent = "Rejected";
    } else {
      rejectBtn.textContent = "Reject";
    }
  };

  const updateStatus = async (id, status) => {
    try {
      console.log(`Updating status for ID ${id} to ${status}`);
      const approveBtn = document.getElementById("approveBtn");
      const rejectBtn = document.getElementById("rejectBtn");
      const originalApproveText = approveBtn.textContent;
      const originalRejectText = rejectBtn.textContent;

      if (status === "approved") {
        approveBtn.textContent = "Approving...";
        approveBtn.disabled = true;
      } else {
        rejectBtn.textContent = "Rejecting...";
        rejectBtn.disabled = true;
      }

      const response = await fetch(`/superadmin/api/relocation-data/${id}/status`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify({ status: status }),
      });

      const result = await response.json();
      if (!result.success) {
        throw new Error(result.error || "Failed to update status");
      }

      console.log("Status updated successfully:", result);
      updateButtonStates(status);
      
      // Update the status badge in modal
      const statusElement = document.getElementById("releaseStatusBadges");
      if (statusElement) {
        statusElement.innerHTML = getStatusBadge(status);
      }
      
      dataTableInstance.ajax.reload(null, false);
      alert(`Request ${status} successfully!`);
    } catch (error) {
      console.error("Error updating status:", error);
      if (status === "approved") {
        approveBtn.textContent = originalApproveText;
        approveBtn.disabled = false;
      } else {
        rejectBtn.textContent = originalRejectText;
        rejectBtn.disabled = false;
      }
      alert("Failed to update status. Please try again.");
    }
  };

  // --- DATATABLE INITIALIZATION ---
  const dataTableInstance = $("#relocationdataDatatable").DataTable({
    destroy: true,
    ajax: { 
      url: "/superadmin/api/relocation-data", 
      dataSrc: "data" 
    },
    paging: true,
    searching: true,
    info: true,
    lengthChange: true,
    autoWidth: false,
    responsive: true,
    scrollX: true,
    columns: [
      {
        data: "status",
        className: "text-center",
        orderable: false,
        width: "60px",
        render: (data) => getStatusIcon(data),
      },
      {
        data: null,
        width: "300px",
        render: (data, type, row) => `
          <div class="release-info">
            <div class="release-title">
              <a href="#" class="view-details-link fw-semibold" data-id="${row.id}">${row.songName || 'Unknown Song'}</a>
            </div>
            <div class="text-muted small mt-1">${row.artist || 'Unknown Artist'}</div>
          </div>`,
      },
      { 
        data: "isrc", 
        defaultContent: "N/A",
        width: "120px",
        className: "text-center"
      },
      {
        data: null,
        className: "text-center",
        orderable: false,
        width: "120px",
        render: (data, type, row) => {
          const links = [];
          if (row.instagramAudio && row.instagramAudio !== "N/A" && row.instagramAudio !== "") {
            links.push(`<a href="${row.instagramAudio}" target="_blank" class="link-icon me-1" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i></a>`);
          }
          if (row.instagramLink && row.instagramLink !== "N/A" && row.instagramLink !== "") {
            links.push(`<a href="${row.instagramLink}" target="_blank" class="link-icon me-1" title="Instagram"><i class="bi bi-instagram"></i></a>`);
          }
          if (row.facebookLink && row.facebookLink !== "N/A" && row.facebookLink !== "") {
            links.push(`<a href="${row.facebookLink}" target="_blank" class="link-icon me-1" title="Facebook"><i class="bi bi-facebook"></i></a>`);
          }
          return links.length > 0 ? links.join('') : '<span class="text-muted">-</span>';
        }
      },
      {
        data: "status",
        className: "text-center",
        width: "120px",
        render: (data) => `<div class="d-flex justify-content-center">${getStatusBadge(data)}</div>`,
      },
    ],
    columnDefs: [
      { targets: 0, width: "60px", className: "text-center" },
      { targets: 1, width: "300px" },
      { targets: 2, width: "120px", className: "text-center" },
      { targets: 3, width: "120px", className: "text-center" },
      { targets: 4, width: "120px", className: "text-center" },
    ],
    drawCallback: () => {
      if (typeof feather !== "undefined") feather.replace();
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

  // --- EVENT LISTENERS ---
  $("#relocationdataDatatable tbody").on("click", ".view-details-link", function (e) {
    e.preventDefault();
    const id = parseInt($(this).data("id"), 10);
    openModal(id);
  });

  document.getElementById("approveBtn").addEventListener("click", function () {
    const id = document.getElementById("releaseModal").getAttribute("data-current-id");
    if (id && !this.disabled) updateStatus(parseInt(id), "approved");
  });

  document.getElementById("rejectBtn").addEventListener("click", function () {
    const id = document.getElementById("releaseModal").getAttribute("data-current-id");
    if (id && !this.disabled) updateStatus(parseInt(id), "rejected");
  });

  // Filter functionality
  const filterTabs = document.querySelectorAll("#filterTabs .nav-link");
  if (filterTabs.length > 0) {
    filterTabs.forEach((tab) => {
      tab.addEventListener("click", function (e) {
        e.preventDefault();
        filterTabs.forEach((t) => t.classList.remove("active"));
        this.classList.add("active");
        const filter = this.getAttribute("data-filter");
        if (filter === "all") {
          dataTableInstance.column(4).search("").draw();
        } else {
          dataTableInstance.column(4).search(filter.toUpperCase()).draw();
        }
      });
    });
  }

  // Export functionality
  const exportBtn = document.getElementById("exportCsvBtn");
  if (exportBtn) {
    exportBtn.addEventListener("click", function () {
      window.location.href = "/superadmin/api/relocation-data/export";
    });
  }
});

// releases-page show and redirecting logic js

document.addEventListener("DOMContentLoaded", function () {
  const releasesPageContainer = document.querySelector(".admin-releases-page");

  if (releasesPageContainer) {
    let currentFilter = "all";
    const table = $("#datatableRelease");
    const filterTabs = document.querySelector(".nav-pills");

    function getStatusIcon(status) {
      const icons = {
        delivered: "bi-check-circle-fill text-success",
        approved: "bi-check-circle-fill text-success",
        rejected: "bi-x-circle-fill text-danger",
        review: "bi-hourglass-split text-warning",
        takedown: "bi-x-circle-fill text-secondary", // Updated icon for takedown
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

    const dataTableInstance = table.DataTable({
      destroy: true,
      ajax: {
        url: "/superadmin/releases", // adjust route as needed
        type: "GET",
        dataSrc: "data",
      },
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
          render: (data, type, row) => {
            // Numeric status mapping: 1=Review, 2=Takedown, 3=Delivered, 4=Rejected, 5=Approved
            // For Delivered (3) and Takedown (2), show view page
            // For others, show edit page
            const url =
              row.status_numeric == 3 || row.status_numeric == 2
                ? `/superadmin/releases/view/${row.id}`
                : `/superadmin/releases/edit/${row.id}`;

            return `
              <div>     
                  <div class="release-title">       
                      <a href="${url}" class="view-details-link" data-id="${row.id}" data-status="${row.status_numeric}">${row.title}</a>     
                  </div>     
                  <div class="release-artist">${row.artist}</div>   
              </div>
            `;
          },
        },
        { data: "submittedDate", defaultContent: "N/A" },
        { data: "upc", defaultContent: "N/A" },
        { data: "isrc", defaultContent: "N/A" },
        { data: "status", render: (data) => getStatusBadge(data) },
      ],
      drawCallback: () => {
        feather.replace();
      },
    });

    // --- FILTERS ---
    function applyFiltersAndDraw() {
      $.fn.dataTable.ext.search.pop();
      $.fn.dataTable.ext.search.push(function (
        settings,
        data,
        dataIndex,
        rowData
      ) {
        if (currentFilter === "all") return true;
        return rowData.status === currentFilter;
      });
      dataTableInstance.draw();
    }

    // Handle filter tab clicks
    if (filterTabs) {
      filterTabs.addEventListener("click", (e) => {
        if (e.target.matches("a.nav-link[data-filter]")) {
          e.preventDefault();
          currentFilter = e.target.dataset.filter;
          document
            .querySelectorAll(".nav-pills .nav-link")
            .forEach((tab) => tab.classList.remove("active"));
          e.target.classList.add("active");
          applyFiltersAndDraw();
        }
      });
    }

    // Handle link clicks - Conditional navigation based on status
    $("#datatableRelease tbody").on(
      "click",
      ".view-details-link",
      function (e) {
        const id = parseInt($(this).data("id"), 10);
        const status = $(this).data("status");

        // Log for debugging
        console.log("Navigating for ID:", id, "Status:", status);

        if (status === 3 || status === 2) {
          console.log(
            "Navigating to view page - Status:",
            status === 3 ? "Delivered" : "Takedown"
          );
        } else {
          console.log("Navigating to edit page");
        }

        // Optional: Add loading state
        $(this).addClass("loading");
      }
    );
  }

  // Handle form submission on the add-release page
  const releaseForm = document.getElementById("releaseForm");
  if (releaseForm) {
    releaseForm.addEventListener("submit", function (e) {
      // Add any form validation or loading states here
      const submitBtn = this.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML =
          '<i class="spinner-border spinner-border-sm me-1"></i> Processing...';
      }
    });
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

  // Spotify Artist search functionality
  let spotifySearchTimeout;
  $(document).on("input", "#artist_search", function () {
    const query = $(this).val().trim();
    const dropdown = $("#spotify_dropdown");

    clearTimeout(spotifySearchTimeout);

    if (query.length < 2) {
      dropdown.hide().html("");
      return;
    }

    // Show loading
    dropdown.show().html('<div class="dropdown-item text-center"><small class="text-muted">Searching...</small></div>');

    // Debounce search
    spotifySearchTimeout = setTimeout(() => {
      $.ajax({
        url: "artist/search-spotify",
        type: "POST",
        data: { query: query },
        success: function (response) {
          if (response.success && response.data.length > 0) {
            let html = "";
            response.data.forEach(function (artist) {
              let image = artist.image || "https://via.placeholder.com/40x40?text=🎵";
              let followers = artist.followers > 0 ? `${artist.followers.toLocaleString()} followers` : "No followers data";
              let genres = artist.genres || "No genres";

              html += `
                <div class="dropdown-item artist-item" data-id="${artist.id}" data-name="${artist.name}" data-image="${image}" data-info="${followers} • ${genres}">
                  <div class="d-flex align-items-center">
                    <img src="${image}" alt="${artist.name}" class="rounded me-3" width="40" height="40" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiBmaWxsPSIjZjBmMGYwIi8+Cjx0ZXh0IHg9IjIwIiB5PSIyNSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE2IiBmaWxsPSIjNjY2IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj7wn461PC90ZXh0Pgo8L3N2Zz4K'">>
                    <div>
                      <div class="fw-bold">${artist.name}</div>
                      <small class="text-muted">${followers}</small>
                    </div>
                  </div>
                </div>`;
            });
            dropdown.html(html);
          } else {
            dropdown.html('<div class="dropdown-item text-center text-muted">No artists found</div>');
          }
        },
        error: function () {
          dropdown.html('<div class="dropdown-item text-center text-danger">Search failed</div>');
        }
      });
    }, 500);
  });

  // Apple Music Artist search functionality
  let appleSearchTimeout;
  $(document).on("input", "#apple_artist_search", function () {
    const query = $(this).val().trim();
    const dropdown = $("#apple_dropdown");

    clearTimeout(appleSearchTimeout);

    if (query.length < 2) {
      dropdown.hide().html("");
      return;
    }

    // Show loading
    dropdown.show().html('<div class="dropdown-item text-center"><small class="text-muted">Searching Apple Music...</small></div>');

    // Debounce search
    appleSearchTimeout = setTimeout(() => {
      $.ajax({
        url: "artist/search-apple-music",
        type: "POST",
        data: { query: query },
        success: function (response) {
          if (response.success && response.data.length > 0) {
            console.log("Apple Music search response:", response); // Debug log
            let html = "";
            response.data.forEach(function (artist) {
              let image = artist.image || "data:image/svg+xml;base64,PHN2ZyB4bWxucz0..."; 
              let genres = artist.genres || "No genres";
              let info = `${genres}`;

              html += `
                <div class="dropdown-item apple-artist-item" data-id="${artist.id}" data-name="${artist.name}" data-image="${image}" data-info="${info}">
                  <div class="d-flex align-items-center">
                    <img src="${image}" alt="${artist.name}" class="rounded me-3" width="40" height="40" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiBmaWxsPSIjZjBmMGYwIi8+Cjx0ZXh0IHg9IjIwIiB5PSIyNSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE2IiBmaWxsPSIjNjY2IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj7wn42PC90ZXh0Pgo8L3N2Zz4K'">
                    <div>
                      <div class="fw-bold">${artist.name}</div>
                      <small class="text-muted">${genres}</small>
                    </div>
                  </div>
                </div>`;
            });
            dropdown.html(html);
          } else {
            dropdown.html('<div class="dropdown-item text-center text-muted">No artists found</div>');
          }
        },
        error: function () {
          dropdown.html('<div class="dropdown-item text-center text-danger">Search failed</div>');
        }
      });
    }, 500);
  });

  // Select Spotify artist from dropdown
  $(document).on("click", ".artist-item", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");
    const image = $(this).data("image");
    const info = $(this).data("info");

    // Set hidden field value
    $("#spotify_id").val(id);

    // Show selected artist
    $("#selected_artist_image").attr("src", image);
    $("#selected_artist_name").text(name);
    $("#selected_artist_info").text(info);
    $("#selected_artist").show();

    // Clear and hide dropdown
    $("#artist_search").val("");
    $("#spotify_dropdown").hide();
  });

  // Select Apple Music artist from dropdown
  $(document).on("click", ".apple-artist-item", function () {
    const id = $(this).data("id");
    const name = $(this).data("name");
    const image = $(this).data("image");
    const info = $(this).data("info");

    // Set hidden field value
    $("#apple_id").val(id);

    // Show selected artist
    $("#selected_apple_artist_image").attr("src", image);
    $("#selected_apple_artist_name").text(name);
    $("#selected_apple_artist_info").text(info);
    $("#selected_apple_artist").show();

    // Clear and hide dropdown
    $("#apple_artist_search").val("");
    $("#apple_dropdown").hide();
  });

  // Clear selected Spotify artist
  $(document).on("click", "#clear_artist", function () {
    $("#spotify_id").val("");
    $("#selected_artist").hide();
    $("#artist_search").val("").focus();
  });

  // Clear selected Apple Music artist
  $(document).on("click", "#clear_apple_artist", function () {
    $("#apple_id").val("");
    $("#selected_apple_artist").hide();
    $("#apple_artist_search").val("").focus();
  });

  // Hide dropdowns when clicking outside
  $(document).on("click", function (e) {
    if (!$(e.target).closest(".position-relative").length) {
      $("#spotify_dropdown").hide();
      $("#apple_dropdown").hide();
    }
  });

  // Form submission
  $(document).off("submit", "#createArtistForm");
  $(document).on("submit", "#createArtistForm", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $('button[type="submit"]').prop("disabled", true).text("Creating...");
      },
      success: function (res) {
        if (res.success) {
          showArtistAlert("success", res.message);
          $("#createArtistForm")[0].reset();
          $("#imagePreview").hide();
          $("#selected_artist").hide(); // Clear selected Spotify artist
          $("#selected_apple_artist").hide(); // Clear selected Apple Music artist
          $("#createArtistModal").modal("hide");
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
      complete: function () {
        $('button[type="submit"]').prop("disabled", false).text("Create Artist");
      },
    });
  });

  // Image preview
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
    destroy: true,
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

// claiming-req.js
$(document).ready(function () {
  let table = $("#claimingRequestTableBody").DataTable({
    destroy: true,
    ajax: "/superadmin/api/claiming-req",
    columns: [
      {
        data: "status",
        render: function (data) {
          let icons = {
            Approved: "check-circle",
            Pending: "clock",
            Rejected: "x-circle",
          };
          let colors = {
            Approved: "text-success",
            Pending: "text-warning",
            Rejected: "text-danger",
          };
          return `<i data-feather="${icons[data] || "help-circle"}" class="${
            colors[data] || "text-muted"
          }"></i>`;
        },
        orderable: false,
        className: "text-center",
      },
      {
        data: null,
        render: function (data) {
          return `
            <div>
              <div class="release-title">${data.title || "Untitled"}</div>
              <div class="release-artist text-muted small">${
                data.artist || "Unknown"
              }</div>
            </div>`;
        },
      },
      { data: "isrc", defaultContent: "N/A" },
      { data: "upc", defaultContent: "N/A" },
      {
        data: "status",
        render: function (data) {
          let badgeClasses = {
            Approved: "success",
            Pending: "warning",
            Rejected: "danger",
          };
          return `<span class="badge bg-${
            badgeClasses[data] || "secondary"
          }">${data}</span>`;
        },
        className: "text-center",
      },
    ],
    drawCallback: function () {
      feather.replace();
      let api = this.api();
      if (api.rows({ page: "current" }).data().length === 0) {
        $("#claimingRequestTableBody tbody").html(`
          <tr>
            <td colspan="5" class="empty-state text-center">
              <i data-feather="inbox"></i>
              <div>
                <h5 class="mb-2">No Claiming Requests found</h5>
                <p class="mb-0">Click 'New Claiming Request' to get started.</p>
              </div>
            </td>
          </tr>
        `);
        feather.replace();
      }
    },
  });

  window.reloadClaimingRequests = function () {
    table.ajax.reload(null, false);
  };
});

// relocation-request js

document.addEventListener("DOMContentLoaded", function () {
  const relocReqPageContainer = document.querySelector(".admin-reloc-req-page");

  if (relocReqPageContainer) {
    const exportCsvBtn = document.getElementById("exportCsvBtn");

    // Initialize DataTable with server JSON
    const table = $("#relocationDatatable").DataTable({
      ajax: "/superadmin/relocation-requests/data",
      processing: true,
      serverSide: false, // you can enable true if you want server pagination
      paging: true,
      searching: true,
      info: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          render: function (data) {
            return getStatusIcon(data);
          },
        },
        {
          data: "title",
          render: function (data, type, row) {
            return `
              <div class="release-title">${row.title}</div>
              <div class="release-artist text-muted small">${row.artist}</div>
            `;
          },
        },
        { data: "isrc", defaultContent: "N/A" },
        { data: "upc", defaultContent: "N/A" },
        {
          data: "status",
          className: "text-center",
          render: function (data) {
            return getStatusBadge(data);
          },
        },
      ],
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search relocation requests...",
        zeroRecords: "No matching relocation requests found",
        emptyTable: "No relocation requests available",
      },
      drawCallback: function () {
        feather.replace();
      },
    });

    // --- Helpers ---
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

    // --- CSV Export ---
    exportCsvBtn.addEventListener("click", function () {
      const headers = ["ID", "Song Name", "Artist", "ISRC", "UPC", "Status"];
      const data = table.rows({ search: "applied" }).data().toArray();

      const rows = data.map((r) => [
        r.id,
        r.title,
        r.artist,
        r.isrc,
        r.upc,
        r.status,
      ]);

      const csvContent =
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
  }
});

// merge-request js

document.addEventListener("DOMContentLoaded", function () {
  const pageContainer = document.querySelector(".admin-claim-merge-req-page");

  if (pageContainer) {
    const claimForm = document.getElementById("newClaimForm");
    const newClaimModal = new bootstrap.Modal(
      document.getElementById("newClaimRequestModal")
    );
    const exportCsvBtn = document.getElementById("exportCsvBtn");

    // --- HELPERS ---
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

    // --- INIT DATATABLE ---
    const table = $("#claimMergeTable").DataTable({
      processing: true,
      serverSide: false, // set true if you want Laravel DataTables server-side
      ajax: {
        url: "/superadmin/claim-reel-merge/list",
        dataSrc: "data",
      },
      columns: [
        {
          data: "status",
          className: "text-center",
          render: (data) => getStatusIcon(data),
          orderable: false,
        },
        {
          data: "song_name",
          render: (data, type, row) =>
            `<div class="release-title"><a href="#">${data}</a></div>`,
        },
        { data: "isrc", defaultContent: "N/A" },
        {
          data: "instagram_audio",
          className: "text-center",
          render: (data) =>
            data
              ? `<a href="${data}" target="_blank" class="link-icon" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i></a>`
              : "N/A",
        },
        {
          data: "reel_merge",
          className: "text-center",
          render: (data) =>
            data
              ? `<a href="${data}" target="_blank" class="link-icon" title="Reel Merge"><i class="bi bi-camera-reels"></i></a>`
              : "N/A",
        },
        { data: "matching_time", defaultContent: "N/A" },
        {
          data: "status",
          className: "text-center",
          render: (data) => getStatusBadge(data),
        },
      ],
      drawCallback: () => {
        feather.replace();
      },
      language: {
        searchPlaceholder: "Search records...",
        zeroRecords: "No matching claim requests found",
        emptyTable: "No claim requests available",
      },
    });

    // --- SUBMIT FORM ---
    claimForm.addEventListener("submit", async function (event) {
      event.preventDefault();
      const formData = new FormData(claimForm);

      try {
        const response = await fetch("/superadmin/claim-reel-merge/store", {
          method: "POST",
          body: formData,
          headers: {
            "X-Requested-With": "XMLHttpRequest",
          },
        });

        const result = await response.json();

        if (result.success) {
          table.ajax.reload(); // refresh DataTable
          claimForm.reset();
          newClaimModal.hide();
        } else {
          alert(result.message || "Something went wrong.");
        }
      } catch (err) {
        console.error("Error submitting claim request:", err);
        alert("Error: " + err.message);
      }
    });

    // --- EXPORT ---
    exportCsvBtn.addEventListener("click", async function () {
      try {
        const response = await fetch("/superadmin/claim-reel-merge/list");
        const result = await response.json();

        if (!result.data || result.data.length === 0) {
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
        const rows = result.data.map((req) => [
          req.id,
          req.song_name,
          req.isrc,
          req.instagram_audio,
          req.reel_merge,
          req.matching_time,
          req.status,
        ]);

        let csvContent =
          "data:text/csv;charset=utf-8," +
          headers.join(",") +
          "\n" +
          rows.map((r) => r.join(",")).join("\n");

        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "claim-merge-requests.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      } catch (err) {
        console.error("Export failed:", err);
      }
    });
  }
});

// youtube js

// document.addEventListener("DOMContentLoaded", function () {
//   // This is the unique container for your YouTube page
//   const youtubePageContainer = document.querySelector(".admin-youtube-page");

//   // This ensures the code ONLY runs on the YouTube page
//   if (youtubePageContainer) {
//     // --- DATA ---
//     const conflictRequests = [
//       {
//         id: 1,
//         category: "Ownership conflict",
//         assetTitle: "Cosmic Drift",
//         artist: "Astro Beats",
//         assetId: "90736897913",
//         upc: "198009123456",
//         isrc: "USAT22312345",
//         otherParty: "The Orchard",
//         dailyViews: "79K",
//         expiry: "2 days",
//         status: "Action Required",
//         albumCoverUrl: "https://placehold.co/80x80/3498db/ffffff?text=C",
//       },
//       {
//         id: 2,
//         category: "Policy",
//         assetTitle: "Ocean Tides",
//         artist: "Deep Wave",
//         assetId: "3478239381",
//         upc: "198009654321",
//         isrc: "USAT22354321",
//         otherParty: "Believe",
//         dailyViews: "3K",
//         expiry: "-",
//         status: "Resolved",
//         albumCoverUrl: "https://placehold.co/80x80/1abc9c/ffffff?text=O",
//       },
//       {
//         id: 3,
//         category: "Ownership conflict",
//         assetTitle: "City Lights",
//         artist: "Urban Glow",
//         assetId: "3478239381",
//         upc: "198009789012",
//         isrc: "USAT22398765",
//         otherParty: "CD Baby",
//         dailyViews: "1.2K",
//         expiry: "15 days",
//         status: "In Review",
//         albumCoverUrl: "https://placehold.co/80x80/9b59b6/ffffff?text=C",
//       },
//       {
//         id: 4,
//         category: "Metadata Error",
//         assetTitle: "Desert Mirage",
//         artist: "Sahara Echo",
//         assetId: "89321756430",
//         upc: "198001112233",
//         isrc: "USAT22445566",
//         otherParty: "TuneCore",
//         dailyViews: "58K",
//         expiry: "5 days",
//         status: "Action Required",
//         albumCoverUrl: "https://placehold.co/80x80/e67e22/ffffff?text=D",
//       },
//       {
//         id: 5,
//         category: "Ownership conflict",
//         assetTitle: "Electric Horizon",
//         artist: "Volt Squad",
//         assetId: "98574623109",
//         upc: "198002244466",
//         isrc: "USAT22449900",
//         otherParty: "The Orchard",
//         dailyViews: "12K",
//         expiry: "7 days",
//         status: "In Review",
//         albumCoverUrl: "https://placehold.co/80x80/f39c12/ffffff?text=E",
//       },
//     ];

//     const territoriesByRegion = {
//       Africa: [
//         { name: "Algeria", code: "DZ" },
//         { name: "Angola", code: "AO" },
//         { name: "Benin", code: "BJ" },
//         { name: "Botswana", code: "BW" },
//         { name: "Burkina Faso", code: "BF" },
//         { name: "Burundi", code: "BI" },
//         { name: "Cabo Verde", code: "CV" },
//         { name: "Cameroon", code: "CM" },
//         { name: "Central African Republic", code: "CF" },
//         { name: "Chad", code: "TD" },
//         { name: "Comoros", code: "KM" },
//         { name: "Congo", code: "CG" },
//         { name: "Congo (DRC)", code: "CD" },
//         { name: "Côte d'Ivoire", code: "CI" },
//         { name: "Djibouti", code: "DJ" },
//         { name: "Egypt", code: "EG" },
//         { name: "Equatorial Guinea", code: "GQ" },
//         { name: "Eritrea", code: "ER" },
//         { name: "Eswatini", code: "SZ" },
//         { name: "Ethiopia", code: "ET" },
//         { name: "Gabon", code: "GA" },
//         { name: "Gambia", code: "GM" },
//         { name: "Ghana", code: "GH" },
//         { name: "Guinea", code: "GN" },
//         { name: "Guinea-Bissau", code: "GW" },
//         { name: "Kenya", code: "KE" },
//         { name: "Lesotho", code: "LS" },
//         { name: "Liberia", code: "LR" },
//         { name: "Libya", code: "LY" },
//         { name: "Madagascar", code: "MG" },
//         { name: "Malawi", code: "MW" },
//         { name: "Mali", code: "ML" },
//         { name: "Mauritania", code: "MR" },
//         { name: "Mauritius", code: "MU" },
//         { name: "Mayotte", code: "YT" },
//         { name: "Morocco", code: "MA" },
//         { name: "Mozambique", code: "MZ" },
//         { name: "Namibia", code: "NA" },
//         { name: "Niger", code: "NE" },
//         { name: "Nigeria", code: "NG" },
//         { name: "Réunion", code: "RE" },
//         { name: "Rwanda", code: "RW" },
//         { name: "Saint Helena", code: "SH" },
//         { name: "Sao Tome and Principe", code: "ST" },
//         { name: "Senegal", code: "SN" },
//         { name: "Seychelles", code: "SC" },
//         { name: "Sierra Leone", code: "SL" },
//         { name: "Somalia", code: "SO" },
//         { name: "South Africa", code: "ZA" },
//         { name: "South Sudan", code: "SS" },
//         { name: "Sudan", code: "SD" },
//         { name: "Tanzania", code: "TZ" },
//         { name: "Togo", code: "TG" },
//         { name: "Tunisia", code: "TN" },
//         { name: "Uganda", code: "UG" },
//         { name: "Zambia", code: "ZM" },
//         { name: "Zimbabwe", code: "ZW" },
//       ],
//       Antarctica: [
//         { name: "Antarctica", code: "AQ" },
//         { name: "French Southern Territories", code: "TF" },
//         { name: "South Georgia and the South Sandwich Islands", code: "GS" },
//       ],
//       Asia: [
//         { name: "Afghanistan", code: "AF" },
//         { name: "Armenia", code: "AM" },
//         { name: "Azerbaijan", code: "AZ" },
//         { name: "Bahrain", code: "BH" },
//         { name: "Bangladesh", code: "BD" },
//         { name: "Bhutan", code: "BT" },
//         { name: "British Indian Ocean Territory", code: "IO" },
//         { name: "Brunei", code: "BN" },
//         { name: "Cambodia", code: "KH" },
//         { name: "China", code: "CN" },
//         { name: "Cyprus", code: "CY" },
//         { name: "Georgia", code: "GE" },
//         { name: "Hong Kong", code: "HK" },
//         { name: "India", code: "IN" },
//         { name: "Indonesia", code: "ID" },
//         { name: "Iran", code: "IR" },
//         { name: "Iraq", code: "IQ" },
//         { name: "Israel", code: "IL" },
//         { name: "Japan", code: "JP" },
//         { name: "Jordan", code: "JO" },
//         { name: "Kazakhstan", code: "KZ" },
//         { name: "Kuwait", code: "KW" },
//         { name: "Kyrgyzstan", code: "KG" },
//         { name: "Laos", code: "LA" },
//         { name: "Lebanon", code: "LB" },
//         { name: "Macao", code: "MO" },
//         { name: "Malaysia", code: "MY" },
//         { name: "Maldives", code: "MV" },
//         { name: "Mongolia", code: "MN" },
//         { name: "Myanmar", code: "MM" },
//         { name: "Nepal", code: "NP" },
//         { name: "North Korea", code: "KP" },
//         { name: "Oman", code: "OM" },
//         { name: "Pakistan", code: "PK" },
//         { name: "Palestine", code: "PS" },
//         { name: "Philippines", code: "PH" },
//         { name: "Qatar", code: "QA" },
//         { name: "Saudi Arabia", code: "SA" },
//         { name: "Singapore", code: "SG" },
//         { name: "South Korea", code: "KR" },
//         { name: "Sri Lanka", code: "LK" },
//         { name: "Syria", code: "SY" },
//         { name: "Taiwan", code: "TW" },
//         { name: "Tajikistan", code: "TJ" },
//         { name: "Thailand", code: "TH" },
//         { name: "Timor-Leste", code: "TL" },
//         { name: "Turkey", code: "TR" },
//         { name: "Turkmenistan", code: "TM" },
//         { name: "United Arab Emirates", code: "AE" },
//         { name: "Uzbekistan", code: "UZ" },
//         { name: "Vietnam", code: "VN" },
//         { name: "Yemen", code: "YE" },
//       ],
//       Europe: [
//         { name: "Åland Islands", code: "AX" },
//         { name: "Albania", code: "AL" },
//         { name: "Andorra", code: "AD" },
//         { name: "Austria", code: "AT" },
//         { name: "Belarus", code: "BY" },
//         { name: "Belgium", code: "BE" },
//         { name: "Bosnia and Herzegovina", code: "BA" },
//         { name: "Bulgaria", code: "BG" },
//         { name: "Croatia", code: "HR" },
//         { name: "Czechia", code: "CZ" },
//         { name: "Denmark", code: "DK" },
//         { name: "Estonia", code: "EE" },
//         { name: "Faroe Islands", code: "FO" },
//         { name: "Finland", code: "FI" },
//         { name: "France", code: "FR" },
//         { name: "Germany", code: "DE" },
//         { name: "Gibraltar", code: "GI" },
//         { name: "Greece", code: "GR" },
//         { name: "Guernsey", code: "GG" },
//         { name: "Holy See", code: "VA" },
//         { name: "Hungary", code: "HU" },
//         { name: "Iceland", code: "IS" },
//         { name: "Ireland", code: "IE" },
//         { name: "Isle of Man", code: "IM" },
//         { name: "Italy", code: "IT" },
//         { name: "Jersey", code: "JE" },
//         { name: "Latvia", code: "LV" },
//         { name: "Liechtenstein", code: "LI" },
//         { name: "Lithuania", code: "LT" },
//         { name: "Luxembourg", code: "LU" },
//         { name: "Malta", code: "MT" },
//         { name: "Moldova", code: "MD" },
//         { name: "Monaco", code: "MC" },
//         { name: "Montenegro", code: "ME" },
//         { name: "Netherlands", code: "NL" },
//         { name: "North Macedonia", code: "MK" },
//         { name: "Norway", code: "NO" },
//         { name: "Poland", code: "PL" },
//         { name: "Portugal", code: "PT" },
//         { name: "Romania", code: "RO" },
//         { name: "Russia", code: "RU" },
//         { name: "San Marino", code: "SM" },
//         { name: "Serbia", code: "RS" },
//         { name: "Slovakia", code: "SK" },
//         { name: "Slovenia", code: "SI" },
//         { name: "Spain", code: "ES" },
//         { name: "Svalbard and Jan Mayen", code: "SJ" },
//         { name: "Sweden", code: "SE" },
//         { name: "Switzerland", code: "CH" },
//         { name: "Ukraine", code: "UA" },
//         { name: "United Kingdom", code: "GB" },
//       ],
//       "North America": [
//         { name: "Anguilla", code: "AI" },
//         { name: "Antigua and Barbuda", code: "AG" },
//         { name: "Aruba", code: "AW" },
//         { name: "Bahamas", code: "BS" },
//         { name: "Barbados", code: "BB" },
//         { name: "Belize", code: "BZ" },
//         { name: "Bermuda", code: "BM" },
//         { name: "Bonaire", code: "BQ" },
//         { name: "Canada", code: "CA" },
//         { name: "Cayman Islands", code: "KY" },
//         { name: "Costa Rica", code: "CR" },
//         { name: "Cuba", code: "CU" },
//         { name: "Curaçao", code: "CW" },
//         { name: "Dominica", code: "DM" },
//         { name: "Dominican Republic", code: "DO" },
//         { name: "El Salvador", code: "SV" },
//         { name: "Greenland", code: "GL" },
//         { name: "Grenada", code: "GD" },
//         { name: "Guadeloupe", code: "GP" },
//         { name: "Guatemala", code: "GT" },
//         { name: "Haiti", code: "HT" },
//         { name: "Honduras", code: "HN" },
//         { name: "Jamaica", code: "JM" },
//         { name: "Martinique", code: "MQ" },
//         { name: "Mexico", code: "MX" },
//         { name: "Montserrat", code: "MS" },
//         { name: "Nicaragua", code: "NI" },
//         { name: "Panama", code: "PA" },
//         { name: "Puerto Rico", code: "PR" },
//         { name: "Saint Barthélemy", code: "BL" },
//         { name: "Saint Kitts and Nevis", code: "KN" },
//         { name: "Saint Lucia", code: "LC" },
//         { name: "Saint Martin", code: "MF" },
//         { name: "Saint Pierre and Miquelon", code: "PM" },
//         { name: "Saint Vincent and the Grenadines", code: "VC" },
//         { name: "Sint Maarten", code: "SX" },
//         { name: "Trinidad and Tobago", code: "TT" },
//         { name: "Turks and Caicos Islands", code: "TC" },
//         { name: "United States", code: "US" },
//         { name: "U.S. Virgin Islands", code: "VI" },
//       ],
//       Oceania: [
//         { name: "American Samoa", code: "AS" },
//         { name: "Australia", code: "AU" },
//         { name: "Christmas Island", code: "CX" },
//         { name: "Cocos (Keeling) Islands", code: "CC" },
//         { name: "Cook Islands", code: "CK" },
//         { name: "Fiji", code: "FJ" },
//         { name: "French Polynesia", code: "PF" },
//         { name: "Guam", code: "GU" },
//         { name: "Kiribati", code: "KI" },
//         { name: "Marshall Islands", code: "MH" },
//         { name: "Micronesia", code: "FM" },
//         { name: "Nauru", code: "NR" },
//         { name: "New Caledonia", code: "NC" },
//         { name: "New Zealand", code: "NZ" },
//         { name: "Niue", code: "NU" },
//         { name: "Norfolk Island", code: "NF" },
//         { name: "Northern Mariana Islands", code: "MP" },
//         { name: "Palau", code: "PW" },
//         { name: "Papua New Guinea", code: "PG" },
//         { name: "Pitcairn", code: "PN" },
//         { name: "Samoa", code: "WS" },
//         { name: "Solomon Islands", code: "SB" },
//         { name: "Tokelau", code: "TK" },
//         { name: "Tonga", code: "TO" },
//         { name: "Tuvalu", code: "TV" },
//         { name: "U.S. Minor Outlying Islands", code: "UM" },
//         { name: "Vanuatu", code: "VU" },
//         { name: "Wallis and Futuna", code: "WF" },
//       ],
//       "South America": [
//         { name: "Argentina", code: "AR" },
//         { name: "Bolivia", code: "BO" },
//         { name: "Brazil", code: "BR" },
//         { name: "Chile", code: "CL" },
//         { name: "Colombia", code: "CO" },
//         { name: "Ecuador", code: "EC" },
//         { name: "Falkland Islands", code: "FK" },
//         { name: "French Guiana", code: "GF" },
//         { name: "Guyana", code: "GY" },
//         { name: "Paraguay", code: "PY" },
//         { name: "Peru", code: "PE" },
//         { name: "Suriname", code: "SR" },
//         { name: "Uruguay", code: "UY" },
//         { name: "Venezuela", code: "VE" },
//       ],
//     };
//     const totalCountries = Object.values(territoriesByRegion).reduce(
//       (sum, region) => sum + region.length,
//       0
//     );
//     let sortState = { key: null, direction: "asc" };

//     // --- HELPER FUNCTIONS ---
//     function getStatusBadge(status) {
//       let badgeClass = "bg-secondary-subtle text-secondary-emphasis"; // Default
//       if (status === "Action Required")
//         badgeClass = "bg-danger-subtle text-danger-emphasis";
//       else if (status === "Resolved")
//         badgeClass = "bg-success-subtle text-success-emphasis";
//       else if (status === "In Review")
//         badgeClass = "bg-warning-subtle text-warning-emphasis";
//       return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
//     }

//     function parseViews(views) {
//       if (typeof views !== "string") return 0;
//       const num = parseFloat(views.toUpperCase());
//       return views.toUpperCase().includes("K") ? num * 1000 : num;
//     }
//     function parseExpiry(expiry) {
//       if (typeof expiry !== "string" || expiry === "-") return Infinity;
//       return parseInt(expiry);
//     }
//     function updateTerritoryCounter() {
//       const container = document.getElementById("conflictResolutionOffcanvas");
//       if (!container) return;
//       const selectedCount = container.querySelectorAll(
//         ".country-checkbox:checked"
//       ).length;
//       container.querySelector(
//         "#territoryCounter"
//       ).textContent = `${selectedCount} contested countries out of ${totalCountries} delivered`;
//     }
//     function updateSortIcons() {
//       document
//         .querySelectorAll(".sort-icon")
//         .forEach((icon) => icon.classList.remove("active", "asc", "desc"));
//       if (sortState.key) {
//         const activeHeader = document.querySelector(
//           `.sortable-header[data-sort="${sortState.key}"]`
//         );
//         if (activeHeader)
//           activeHeader
//             .querySelector(".sort-icon")
//             .classList.add("active", sortState.direction);
//       }
//     }
//     function addTerritoryEventListeners() {
//       const container = document.getElementById("conflictResolutionOffcanvas");
//       if (!container) return;
//       container.querySelectorAll(".region-checkbox").forEach((rcb) =>
//         rcb.addEventListener("change", function () {
//           const region = this.dataset.region;
//           container
//             .querySelectorAll(`.country-checkbox[data-region="${region}"]`)
//             .forEach((ccb) => (ccb.checked = this.checked));
//           updateTerritoryCounter();
//         })
//       );
//       container.querySelectorAll(".country-checkbox").forEach((ccb) =>
//         ccb.addEventListener("change", function () {
//           const region = this.dataset.region;
//           const allInRegion = Array.from(
//             container.querySelectorAll(
//               `.country-checkbox[data-region="${region}"]`
//             )
//           ).every((cb) => cb.checked);
//           container.querySelector(
//             `.region-checkbox[data-region="${region}"]`
//           ).checked = allInRegion;
//           updateTerritoryCounter();
//         })
//       );
//     }

//     // --- RENDER FUNCTIONS ---
//     function renderTable(data) {
//       const tableBody = document.getElementById("youtubeTableBody");
//       tableBody.innerHTML =
//         !data || data.length === 0
//           ? `<tr><td colspan="10" class="text-center p-5"><h5>No matching conflicts found.</h5></td></tr>`
//           : data
//               .map(
//                 (req) => `
//                 <tr style="cursor: pointer;" data-bs-toggle="offcanvas" data-bs-target="#conflictResolutionOffcanvas"
//                     data-song-name="${req.assetTitle}" data-artist-name="${
//                   req.artist
//                 }" data-isrc="${req.isrc}" 
//                     data-cover-url="${req.albumCoverUrl}" data-category="${
//                   req.category
//                 }" data-other-party="${req.otherParty}">
//                     <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
//                     <td>${req.category}</td>
//                     <td>${req.assetTitle}</td>
//                     <td><div class="fw-bold">${
//                       req.artist
//                     }</div><small class="text-muted">Asset ID: ${
//                   req.assetId
//                 }</small></td>
//                     <td>${req.upc}</td>
//                     <td>${req.otherParty}</td>
//                     <td>${req.dailyViews}</td>
//                     <td>${req.expiry}</td>
//                     <td>${getStatusBadge(req.status)}</td>
//                     <td><i class="bi bi-chevron-right text-muted"></i></td>
//                 </tr>`
//               )
//               .join("");
//       document.getElementById(
//         "pagination-text"
//       ).textContent = `${data.length} of ${conflictRequests.length} results`;
//     }

//     function renderTerritoryAccordion() {
//       const accordionContainer = document.getElementById("territoryAccordion");
//       if (!accordionContainer) return;
//       accordionContainer.innerHTML = Object.entries(territoriesByRegion)
//         .map(([region, countries]) => {
//           const regionId = region.replace(/[^a-zA-Z0-9]/g, "");
//           return `
//                 <div class="accordion-item">
//                     <h2 class="accordion-header" id="heading-${regionId}">
//                         <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${regionId}" aria-expanded="false">
//                             <div class="form-check me-auto pe-2"><input class="form-check-input region-checkbox" type="checkbox" id="region-${regionId}" data-region="${region}" checked><label class="form-check-label fw-bold" for="region-${regionId}">${region}</label></div>
//                             <span class="text-muted small me-2">${
//                               countries.length
//                             } countries</span>
//                         </button>
//                     </h2>
//                     <div id="collapse-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
//                         <div class="accordion-body"><div class="territory-list-inner">${countries
//                           .map(
//                             (country) =>
//                               `<div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="${country.code}" id="country-${country.code}" data-region="${region}" checked><label class="form-check-label" for="country-${country.code}">${country.name}</label></div>`
//                           )
//                           .join("")}</div></div>
//                     </div>
//                 </div>`;
//         })
//         .join("");
//       addTerritoryEventListeners();
//       updateTerritoryCounter();
//     }

//     // --- EVENT HANDLERS & INITIALIZATION ---
//     const conflictOffcanvasEl = document.getElementById(
//       "conflictResolutionOffcanvas"
//     );
//     const conflictOffcanvas = new bootstrap.Offcanvas(conflictOffcanvasEl);
//     const conflictForm = document.getElementById("youtubeConflictForm");
//     const steps = Array.from(conflictForm.querySelectorAll(".form-step"));
//     const nextBtn = conflictOffcanvasEl.querySelector("#nextBtn");
//     const backBtn = conflictOffcanvasEl.querySelector("#backBtn");
//     const submitBtn = conflictOffcanvasEl.querySelector("#submitBtn");
//     const fileInput = conflictOffcanvasEl.querySelector("#formFile");
//     const fileDisplay = conflictOffcanvasEl.querySelector("#selectedFileName");
//     let currentStep = 0;

//     document
//       .getElementById("releasesTable")
//       .querySelector("thead")
//       .addEventListener("click", (e) => {
//         const headerCell = e.target.closest(".sortable-header");
//         if (!headerCell) return;
//         const sortKey = headerCell.dataset.sort;
//         if (sortState.key === sortKey) {
//           sortState.direction = sortState.direction === "asc" ? "desc" : "asc";
//         } else {
//           sortState.key = sortKey;
//           sortState.direction = "asc";
//         }
//         conflictRequests.sort((a, b) => {
//           let valA = a[sortState.key],
//             valB = b[sortState.key];
//           if (sortState.key === "dailyViews") {
//             valA = parseViews(valA);
//             valB = parseViews(valB);
//           } else if (sortState.key === "expiry") {
//             valA = parseExpiry(valA);
//             valB = parseExpiry(valB);
//           }
//           let comparison = 0;
//           if (valA > valB) comparison = 1;
//           else if (valA < valB) comparison = -1;
//           return sortState.direction === "desc" ? comparison * -1 : comparison;
//         });
//         renderTable(conflictRequests);
//         updateSortIcons();
//       });

//     function showStep(stepIndex) {
//       steps.forEach((step, index) =>
//         step.classList.toggle("d-none", index !== stepIndex)
//       );
//       backBtn.classList.toggle("d-none", stepIndex === 0);
//       nextBtn.classList.toggle("d-none", stepIndex === steps.length - 1);
//       submitBtn.classList.toggle("d-none", stepIndex !== steps.length - 1);
//       currentStep = stepIndex;
//     }

//     nextBtn.addEventListener("click", () => {
//       if (
//         currentStep === 0 &&
//         !conflictForm.querySelector('input[name="rightsOwned"]:checked')
//       )
//         return alert("Please select a rights option.");
//       if (
//         currentStep === 1 &&
//         !conflictForm.querySelector(".country-checkbox:checked")
//       )
//         return alert("Please select at least one territory.");
//       if (currentStep < steps.length - 1) showStep(currentStep + 1);
//     });

//     backBtn.addEventListener("click", () => showStep(currentStep - 1));

//     conflictOffcanvasEl.addEventListener("show.bs.offcanvas", function (event) {
//       const data = event.relatedTarget.dataset;
//       ["", "2", "3"].forEach((s) => {
//         conflictOffcanvasEl.querySelector(`#modalAlbumCover${s}`).src =
//           data.coverUrl;
//         conflictOffcanvasEl.querySelector(`#modalSongName${s}`).textContent =
//           data.songName;
//         conflictOffcanvasEl.querySelector(`#modalArtistName${s}`).textContent =
//           data.artistName;
//       });
//       conflictOffcanvasEl.querySelector(
//         "#modalIsrc"
//       ).textContent = `ISRC: ${data.isrc}`;
//       conflictOffcanvasEl.querySelector("#offcanvasTitle").textContent =
//         data.category;
//       conflictOffcanvasEl.querySelector(
//         "#offcanvasSubtitle"
//       ).textContent = `VS. ${data.otherParty}`;
//       conflictForm.reset();
//       conflictOffcanvasEl
//         .querySelectorAll(".radio-card")
//         .forEach((c) => c.classList.remove("selected"));
//       fileDisplay.classList.add("d-none");
//       conflictOffcanvasEl
//         .querySelectorAll('#territoryAccordion input[type="checkbox"]')
//         .forEach((cb) => (cb.checked = true));
//       updateTerritoryCounter();
//       showStep(0);
//     });

//     conflictForm.addEventListener("submit", function (e) {
//       e.preventDefault();
//       if (!fileInput.files.length && currentStep === 2)
//         return alert("Please upload a supporting document.");
//       alert("Resolution submitted successfully!");
//       conflictOffcanvas.hide();
//     });

//     conflictOffcanvasEl.querySelectorAll(".radio-card").forEach((c) =>
//       c.addEventListener("click", function () {
//         conflictOffcanvasEl
//           .querySelectorAll(".radio-card")
//           .forEach((el) => el.classList.remove("selected"));
//         this.classList.add("selected");
//         this.querySelector('input[type="radio"]').checked = true;
//       })
//     );

//     conflictOffcanvasEl
//       .querySelector("#fileUploadContainer")
//       .addEventListener("click", () => fileInput.click());
//     fileInput.addEventListener("change", () => {
//       if (fileInput.files.length > 0) {
//         fileDisplay.querySelector("span").textContent = fileInput.files[0].name;
//         fileDisplay.classList.remove("d-none");
//       }
//     });
//     fileDisplay.querySelector(".btn-close").addEventListener("click", () => {
//       fileInput.value = "";
//       fileDisplay.classList.add("d-none");
//     });

//     // --- INITIAL RENDER ---
//     renderTable(conflictRequests);
//     renderTerritoryAccordion();
//     updateSortIcons();
//   }
// });


// facebook-page js
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const facebookPageContainer = document.querySelector(".admin-facebook-page");

  if (facebookPageContainer) {
    // --- DOM ELEMENTS ---
    const table = $("#facebookDatatable"); // updated selector
    let dataTableInstance = null;

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
    function initializeDataTable() {
      if (dataTableInstance) {
        dataTableInstance.destroy();
      }

      dataTableInstance = table.DataTable({
        destroy: true,
        processing: true,
        serverSide: false,
        ajax: {
          url: '/superadmin/facebook/list-json',
          type: 'GET',
          dataSrc: function (json) {
            console.log("Raw response:", json);
            return json.data;
          },
          error: function(xhr, error, thrown) {
            console.error('DataTable Ajax Error:', error, thrown);
            alert('Error loading conflict data. Please refresh the page.');
          }
        },
        paging: true,
        searching: true,
        info: true,
        lengthChange: true,
        autoWidth: false,
        order: [[1, 'desc']], // Order by ID/date descending
        columns: [
          {
            data: null,
            className: "text-center",
            orderable: false,
            render: () => `<i class="bi bi-facebook text-primary fs-5"></i>`,
          },
          { data: "category", title: "Category" },
          { data: "assetTitle", title: "Asset Title" },
          {
            data: null,
            title: "Artist / Asset ID",
            render: (data, type, row) =>
              `<div class="fw-bold">${row.artist || 'N/A'}</div><small class="text-muted">Asset ID: ${row.assetId || 'N/A'}</small>`,
          },
          { data: "upc", title: "UPC" },
          { data: "otherParty", title: "Other Party" },
          {
            data: "dailyViews",
            title: "Daily Views",
            render: { 
              _: (data) => data || '0', 
              sort: (data) => parseViews(data) 
            },
          },
          {
            data: "expiry",
            title: "Expiry",
            render: { 
              _: (data) => data || '-', 
              sort: (data) => parseExpiry(data) 
            },
          },
          { 
            data: "status",
            title: "Status", 
            render: (data) => getStatusBadge(data || 'Action Required')
          },
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
            "data-conflict-id": data.id,
            "data-song-name": data.assetTitle || data.songName,
            "data-artist-name": data.artist || data.artistName,
            "data-isrc": data.isrc,
            "data-cover-url": data.albumCoverUrl || "https://placehold.co/80x80/3b5998/ffffff?text=FB",
            "data-category": data.category,
            "data-other-party": data.otherParty,
            "data-conflict-state": data.conflictState,
            "data-countries": JSON.stringify(data.countries || {})
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
          processing: "Loading conflicts..."
        },
      });
    }

    // Initialize the DataTable
    initializeDataTable();


    // --- IMPORT CSV FUNCTIONALITY ---
    const importBtn = document.getElementById("importFacebookCsv");
    if (importBtn) {
      importBtn.addEventListener("click", function() {
        // Create file input dynamically
        const fileInput = document.createElement("input");
        fileInput.type = "file";
        fileInput.accept = ".csv";
        fileInput.style.display = "none";
        
        fileInput.addEventListener("change", function(e) {
          const file = e.target.files[0];
          if (!file) return;
          
          const formData = new FormData();
          formData.append("file", file);
          
          // Show loading state
          const originalText = importBtn.innerHTML;
          importBtn.innerHTML = '<i class="spinner-border spinner-border-sm me-1"></i>Importing...';
          importBtn.disabled = true;
          
          fetch('/superadmin/facebook/import', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              alert(`Import successful!\nProcessed: ${data.processed_rows}\nInserted: ${data.inserted_rows}`);
              // Refresh the DataTable
              dataTableInstance.ajax.reload();
            } else {
              alert(`Import failed: ${data.message}`);
            }
          })
          .catch(error => {
            console.error('Import error:', error);
            alert('Import failed. Please try again.');
          })
          .finally(() => {
            // Restore button state
            importBtn.innerHTML = originalText;
            importBtn.disabled = false;
            document.body.removeChild(fileInput);
          });
        });
        
        document.body.appendChild(fileInput);
        fileInput.click();
      });
    }

    // --- OFFCANVAS LOGIC ---
    const conflictOffcanvasEl = document.getElementById("facebookConflictOffcanvas");
    if (conflictOffcanvasEl) {
      const conflictForm = document.getElementById("facebookConflictForm");
      const steps = Array.from(conflictOffcanvasEl.querySelectorAll(".form-step"));
      const nextBtn = document.getElementById("nextBtn");
      const backBtn = document.getElementById("backBtn");
      const submitBtn = document.getElementById("submitBtn");
      let currentStep = 0;
      let currentConflictId = null;
      let conflictCountries = {};

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

      conflictOffcanvasEl.addEventListener("show.bs.offcanvas", function (event) {
        const trigger = event.relatedTarget;
        const data = trigger.dataset;
        
        // Store current conflict ID
        currentConflictId = data.conflictId;
        
        // Parse countries data
        try {
          conflictCountries = JSON.parse(data.countries || '{}');
        } catch (e) {
          console.warn('Failed to parse countries data:', e);
          conflictCountries = {};
        }

        // Populate offcanvas fields
        ["", "2", "3"].forEach((s) => {
          const suffix = s ? parseInt(s) : "";
          const albumCover = conflictOffcanvasEl.querySelector(`#modalAlbumCover${suffix}`);
          const songName = conflictOffcanvasEl.querySelector(`#modalSongName${suffix}`);
          const artistName = conflictOffcanvasEl.querySelector(`#modalArtistName${suffix}`);
          
          if (albumCover) albumCover.src = data.coverUrl || "https://placehold.co/80x80/3b5998/ffffff?text=FB";
          if (songName) songName.textContent = data.songName || 'Unknown';
          if (artistName) artistName.textContent = data.artistName || 'Unknown';
        });

        const isrcEl = conflictOffcanvasEl.querySelector("#modalIsrc");
        if (isrcEl) isrcEl.textContent = `ISRC: ${data.isrc || 'N/A'}`;
        
        const titleEl = conflictOffcanvasEl.querySelector("#offcanvasTitle");
        if (titleEl) titleEl.textContent = data.category || 'Ownership Conflict';
        
        const subtitleEl = conflictOffcanvasEl.querySelector("#offcanvasSubtitle");
        if (subtitleEl) subtitleEl.textContent = `VS. ${data.otherParty || 'Unknown'}`;

        // Render accordion and reset form state
        renderTerritoryAccordion();
        conflictForm.reset();
        conflictForm.querySelectorAll(".radio-card").forEach((c) => c.classList.remove("selected"));
        
        const fileDisplay = document.getElementById("selectedFileName");
        if (fileDisplay) fileDisplay.classList.add("d-none");
        
        showStep(0);
      });

      conflictForm.addEventListener("submit", function (e) {
        e.preventDefault();
        
        const formFile = document.getElementById("formFile");
        if (currentStep === 2 && formFile && !formFile.files.length) {
          return alert("Please upload a supporting document.");
        }

        // Collect form data
        const formData = new FormData();
        const rightsOwned = conflictForm.querySelector('input[name="rightsOwned"]:checked')?.value || '';
        const selectedTerritories = Array.from(conflictForm.querySelectorAll('.country-checkbox:checked'))
          .map(cb => cb.value);

        // Debug logging
        console.log('Submitting data:', {
          conflict_id: currentConflictId,
          rights_owned: rightsOwned,
          territories: selectedTerritories,
          has_file: formFile && formFile.files[0] ? true : false
        });

        formData.append('conflict_id', currentConflictId);
        formData.append('rights_owned', rightsOwned);
        formData.append('territories', JSON.stringify(selectedTerritories));
        
        if (formFile && formFile.files[0]) {
          formData.append('supporting_document', formFile.files[0]);
        }

        // Show loading state
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="spinner-border spinner-border-sm me-1"></i>Submitting...';
        submitBtn.disabled = true;

        fetch('/superadmin/facebook/update-resolution', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            alert("Resolution submitted successfully!");
            bootstrap.Offcanvas.getInstance(conflictOffcanvasEl).hide();
            // Refresh the DataTable to show updated status
            dataTableInstance.ajax.reload();
          } else {
            alert(`Failed to submit resolution: ${data.message}`);
          }
        })
        .catch(error => {
          console.error('Submit error:', error);
          alert('Failed to submit resolution. Please try again.');
        })
        .finally(() => {
          // Restore button state
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
        });
      });

      function renderTerritoryAccordion() {
        const accordionContainer = conflictOffcanvasEl.querySelector("#territoryAccordion");
        if (!accordionContainer) return;

        // Show loading state
        accordionContainer.innerHTML = '<div class="text-center p-3"><i class="spinner-border spinner-border-sm me-2"></i>Loading territories...</div>';

        // Fetch all countries grouped by continent
        fetch('/superadmin/facebook/get-all-countries')
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              renderCountriesAccordion(data.countries);
            } else {
              accordionContainer.innerHTML = '<div class="text-center p-3 text-danger">Error loading territories</div>';
            }
          })
          .catch(error => {
            console.error('Error fetching countries:', error);
            accordionContainer.innerHTML = '<div class="text-center p-3 text-danger">Error loading territories</div>';
          });
      }

      function renderCountriesAccordion(allCountries) {
        const accordionContainer = conflictOffcanvasEl.querySelector("#territoryAccordion");
        if (!accordionContainer) return;

        // Create a set of country IDs that should be checked (from conflict data)
        const checkedCountryIds = new Set();
        Object.values(conflictCountries).forEach(countries => {
          if (Array.isArray(countries)) {
            countries.forEach(country => {
              checkedCountryIds.add(country.id);
            });
          }
        });

        // Render accordion with all countries, checking only the ones in conflict data
        accordionContainer.innerHTML = Object.entries(allCountries)
          .map(([continent, countries]) => {
            if (!countries || countries.length === 0) return "";
            
            const regionId = continent.replace(/[^a-zA-Z0-9]/g, "");
            
            // Count how many countries in this continent should be checked
            const checkedCountsInRegion = countries.filter(c => checkedCountryIds.has(c.id)).length;
            const allCountriesInRegionChecked = checkedCountsInRegion === countries.length && countries.length > 0;
            
            return `
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-fb-${regionId}">
                    <div class="form-check me-auto pe-2">
                      <input class="form-check-input region-checkbox" type="checkbox" id="region-fb-${regionId}" data-region="${continent}" ${allCountriesInRegionChecked ? 'checked' : ''}>
                      <label class="form-check-label fw-bold" for="region-fb-${regionId}">${continent}</label>
                    </div>
                    <span class="text-muted small me-2">${countries.length} countries ${checkedCountsInRegion > 0 ? `(${checkedCountsInRegion} selected)` : ''}</span>
                  </button>
                </h2>
                <div id="collapse-fb-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                  <div class="accordion-body">
                    <div class="territory-list-inner">
                      ${countries.map(c => `
                        <div class="form-check">
                          <input class="form-check-input country-checkbox" type="checkbox" value="${c.id}" id="country-fb-${c.id}" data-region="${continent}" ${checkedCountryIds.has(c.id) ? 'checked' : ''}>
                          <label class="form-check-label" for="country-fb-${c.id}">${c.name}</label>
                        </div>
                      `).join("")}
                    </div>
                  </div>
                </div>
              </div>
            `;
          })
          .join("");
          
        addTerritoryEventListeners();
        updateTerritoryCounter();
      }

      function updateTerritoryCounter() {
        const selected = conflictOffcanvasEl.querySelectorAll(".country-checkbox:checked").length;
        const total = conflictOffcanvasEl.querySelectorAll(".country-checkbox").length;
        const counterEl = conflictOffcanvasEl.querySelector("#territoryCounter");
        if (counterEl) {
          counterEl.textContent = `${selected} contested countries out of ${total} delivered`;
        }
      }

      function addTerritoryEventListeners() {
        conflictOffcanvasEl.querySelectorAll(".region-checkbox, .country-checkbox").forEach((cb) => {
          cb.addEventListener("change", function (e) {
            const region = e.target.dataset.region;
            if (e.target.classList.contains("region-checkbox")) {
              conflictOffcanvasEl.querySelectorAll(`.country-checkbox[data-region="${region}"]`).forEach(
                (countryCb) => (countryCb.checked = e.target.checked)
              );
            } else {
              const allInRegion = [
                ...conflictOffcanvasEl.querySelectorAll(`.country-checkbox[data-region="${region}"]`),
              ].every((c) => c.checked);
              const regionCheckbox = conflictOffcanvasEl.querySelector(`.region-checkbox[data-region="${region}"]`);
              if (regionCheckbox) {
                regionCheckbox.checked = allInRegion;
              }
            }
            updateTerritoryCounter();
          });
        });
      }

      // --- Remaining event listeners for form interactions ---
      conflictOffcanvasEl.addEventListener("click", function (e) {
        if (e.target.closest(".radio-card")) {
          const card = e.target.closest(".radio-card");
          conflictOffcanvasEl.querySelectorAll(".radio-card").forEach((c) => c.classList.remove("selected"));
          card.classList.add("selected");
          const radioInput = card.querySelector('input[type="radio"]');
          if (radioInput) radioInput.checked = true;
        }
      });

      const fileInput = document.getElementById("formFile");
      const fileDisplay = document.getElementById("selectedFileName");
      const fileUploadContainer = document.getElementById("fileUploadContainer");
      
      if (fileUploadContainer && fileInput) {
        fileUploadContainer.addEventListener("click", () => fileInput.click());
      }
      
      if (fileInput && fileDisplay) {
        fileInput.addEventListener("change", () => {
          if (fileInput.files.length > 0) {
            const span = fileDisplay.querySelector("span");
            if (span) span.textContent = fileInput.files[0].name;
            fileDisplay.classList.remove("d-none");
          }
        });
      }
      
      if (fileDisplay) {
        const closeBtn = fileDisplay.querySelector(".btn-close");
        if (closeBtn) {
          closeBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            if (fileInput) fileInput.value = "";
            fileDisplay.classList.add("d-none");
          });
        }
      }
    }
  }
});

//facebook conflict import 
// document.getElementById("importFacebookCsv").addEventListener("click", function () {
//   const input = document.createElement("input");
//   input.type = "file";
//   input.accept = ".csv,text/csv";
//   input.onchange = async function (e) {
//     const file = e.target.files[0];
//     if (!file) return;

//     // disable button visually while uploading
//     const btn = e.currentTarget;
//     btn.disabled = true;

//     const formData = new FormData();
//     formData.append('file', file);

//     // If you have CI CSRF enabled and expose token in meta tags, append it:
//     const csrfNameMeta = document.querySelector('meta[name="csrf-token-name"]');
//     const csrfValueMeta = document.querySelector('meta[name="csrf-token"]');
//     if (csrfNameMeta && csrfValueMeta) {
//       formData.append(csrfNameMeta.content, csrfValueMeta.content);
//     }

//     try {
//       const resp = await fetch('facebook/import', {
//         method: 'POST',
//         body: formData,
//         credentials: 'same-origin',
//         headers: {
//           'X-Requested-With': 'XMLHttpRequest'
//         }
//       });

//       const json = await resp.json();
//       if (!resp.ok) {
//         alert('Import failed: ' + (json.message || resp.statusText));
//       } else {
//         // Show summary
//         let msg = `Imported file: ${json.file}\nProcessed rows: ${json.processed_rows}\nInserted rows: ${json.inserted_rows}\n`;
//         if (json.missing_headers && json.missing_headers.length) {
//           msg += `Missing headers (CSV vs expected): ${json.missing_headers.join(', ')}\n`;
//         }
//         if (json.missing_country_mappings && json.missing_country_mappings.length) {
//           msg += `Missing country mappings (${json.missing_country_mappings.length}):\n`;
//           json.missing_country_mappings.slice(0,10).forEach(m => {
//             msg += `  row ${m.row}: ${m.iso}\n`;
//           });
//         }
//         if (json.errors && json.errors.length) {
//           msg += `Errors (${json.errors.length}). See console for details.`;
//           console.error('Import errors', json.errors);
//         }
//         alert(msg);
//         // optionally reload a datatable or page here
//       }
//     } catch (err) {
//       console.error(err);
//       alert('Import failed (network or server error). See console for details.');
//     } finally {
//       btn.disabled = false;
//     }
//   };
//   input.click();
// });

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
  // Only run on support page
  if ($("#datatable").length) {
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
}
});

// Enhanced Multi-Step Form Validation System
const FormValidator = {
  rules: {
    required: (value) => value && value.trim() !== "",
    email: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
    phone: (value) =>
      /^[\+]?[1-9][\d]{0,15}$/.test(value.replace(/[\s\-\(\)]/g, "")),
    url: (value) => /^https?:\/\/.+\..+/.test(value),
    number: (value) => !isNaN(value) && !isNaN(parseFloat(value)),
    positiveNumber: (value) => !isNaN(value) && parseFloat(value) > 0,
    date: (value) => !isNaN(Date.parse(value)),
    minLength: (value, min) => value && value.length >= min,
    maxLength: (value, max) => value && value.length <= max,
    pattern: (value, regex) => regex.test(value),
    minValue: (value, min) => parseFloat(value) >= min,
    maxValue: (value, max) => parseFloat(value) <= max,
    upcEan: (value) => /^\d{12,13}$/.test(value),
    isrc: (value) => /^[A-Z]{2}[A-Z0-9]{3}\d{7}$/.test(value),
    percentage: (value) =>
      !isNaN(value) && parseFloat(value) >= 0 && parseFloat(value) <= 100,
  },

  validateField(fieldId, validationRules, customMessages = {}) {
    const field = document.getElementById(fieldId);
    const error = document.getElementById(fieldId + "Error");

    if (!field) return true;

    field.classList.remove("is-invalid", "is-valid");
    if (error) {
      error.textContent = "";
      error.style.display = "none";
    }

    let value = field.value ? field.value.trim() : "";
    let isValid = true;
    let errorMsg = "";

    if (field.type === "radio" || field.type === "checkbox") {
      if (validationRules.required) {
        const radios = document.querySelectorAll(`input[name="${field.name}"]`);
        isValid = Array.from(radios).some((r) => r.checked);
        errorMsg = customMessages.required || "Please make a selection.";
      }
    } else if (field.tagName === "SELECT") {
      if (validationRules.required) {
        isValid = value !== "" && value !== null;
        errorMsg = customMessages.required || `Please select a ${fieldId}.`;
      }
    } else {
      for (const [rule, ruleValue] of Object.entries(validationRules)) {
        if (!isValid) break;

        switch (rule) {
          case "required":
            if (ruleValue && !value) {
              isValid = false;
              errorMsg =
                customMessages.required ||
                `${fieldId
                  .replace(/([A-Z])/g, " $1")
                  .toLowerCase()} is required.`;
            }
            break;
          case "minLength":
            if (value && value.length < ruleValue) {
              isValid = false;
              errorMsg =
                customMessages.minLength ||
                `Must be at least ${ruleValue} characters long.`;
            }
            break;
          case "maxLength":
            if (value && value.length > ruleValue) {
              isValid = false;
              errorMsg =
                customMessages.maxLength ||
                `Cannot exceed ${ruleValue} characters.`;
            }
            break;
          case "pattern":
            if (value && !ruleValue.test(value)) {
              isValid = false;
              errorMsg = customMessages.pattern || "Invalid format.";
            }
            break;
          case "email":
            if (value && !this.rules.email(value)) {
              isValid = false;
              errorMsg =
                customMessages.email || "Please enter a valid email address.";
            }
            break;
          case "url":
            if (value && !this.rules.url(value)) {
              isValid = false;
              errorMsg =
                customMessages.url ||
                "Please enter a valid URL (e.g., https://example.com).";
            }
            break;
          case "phone":
            if (value && !this.rules.phone(value)) {
              isValid = false;
              errorMsg =
                customMessages.phone || "Please enter a valid phone number.";
            }
            break;
          case "number":
            if (value && !this.rules.number(value)) {
              isValid = false;
              errorMsg =
                customMessages.number || "Please enter a valid number.";
            }
            break;
          case "positiveNumber":
            if (value && !this.rules.positiveNumber(value)) {
              isValid = false;
              errorMsg =
                customMessages.positiveNumber ||
                "Please enter a positive number.";
            }
            break;
          case "minValue":
            if (value && parseFloat(value) < ruleValue) {
              isValid = false;
              errorMsg =
                customMessages.minValue ||
                `Value must be at least ${ruleValue}.`;
            }
            break;
          case "maxValue":
            if (value && parseFloat(value) > ruleValue) {
              isValid = false;
              errorMsg =
                customMessages.maxValue || `Value cannot exceed ${ruleValue}.`;
            }
            break;
          case "upcEan":
            if (value && !this.rules.upcEan(value)) {
              isValid = false;
              errorMsg =
                customMessages.upcEan ||
                "UPC/EAN must be 12 or 13 digits only.";
            }
            break;
          case "isrc":
            if (value && !this.rules.isrc(value)) {
              isValid = false;
              errorMsg =
                customMessages.isrc ||
                "ISRC must be in format: CC-XXX-YY-NNNNN (e.g., US-ABC-12-34567).";
            }
            break;
          case "percentage":
            if (value && !this.rules.percentage(value)) {
              isValid = false;
              errorMsg =
                customMessages.percentage ||
                "Please enter a percentage between 0 and 100.";
            }
            break;
        }
      }
    }

    if (!isValid) {
      field.classList.add("is-invalid");
      if (error) {
        error.textContent = errorMsg;
        error.style.display = "block";
      }
    } else if (value || validationRules.required) {
      field.classList.add("is-valid");
    }

    return isValid || (!validationRules.required && !value);
  },

  // Add helper methods for errors
  showError: (field, message) => {
    field.classList.add("is-invalid");
    const errorDiv = field.nextElementSibling;
    if (errorDiv && errorDiv.classList.contains("invalid-feedback")) {
      errorDiv.textContent = message;
      errorDiv.style.display = "block";
    }
  },

  hideError: (field) => {
    field.classList.remove("is-invalid");
    const errorDiv = field.nextElementSibling;
    if (errorDiv && errorDiv.classList.contains("invalid-feedback")) {
      errorDiv.style.display = "none";
    }
  },
};

// Step validation rules
const step1ValidationRules = {
  releaseTitle: { required: true, minLength: 2, maxLength: 100 },
  labelName: { required: true },
  artist: { required: true, minLength: 2, maxLength: 100 },
  featuringArtist: { minLength: 2, maxLength: 100 },
  releaseType: { required: true, type: "radio" },
  mood: { required: true, type: "select" },
  genre: { required: true, type: "select" },
  language: { required: true, type: "select" },
  upcEan: { upcEan: true },
  artworkFile: { required: true, type: "file" },
};

const step2ValidationRules = {
  trackTitle: { required: true, minLength: 1, maxLength: 100 },
  secondaryTrackType: { required: true, type: "select" },
  instrumental: { required: true, type: "radio" },
  author: { required: true, minLength: 1, maxLength: 100 },
  composer: { required: true, minLength: 1, maxLength: 100 },
  cLineYear: { required: true, type: "select" },
  pLineYear: { required: true, type: "select" },
  productionYear: { required: true, type: "select" },
  trackLanguage: { required: true, type: "select" },
  explicit: { required: true, type: "select" },
  audioFile: { required: true, type: "file" },
};

const step3ValidationRules = {
  freeStores: { required: true },
};

const step4ValidationRules = {
  releaseDate: { required: true, date: true },
  originalReleaseDate: { required: true, date: true },
  releasePrice: { required: true, type: "select" },
};

const step5ValidationRules = {
  contentGuidelines: { required: true, type: "checkbox" },
  isrcGuidelines: { required: true, type: "checkbox" },
  youtubeGuidelines: { required: true, type: "checkbox" },
  audioStoreGuidelines: { required: true, type: "checkbox" },
};

document.addEventListener("DOMContentLoaded", function () {
  const addReleasePageContainer = document.querySelector(
    ".admin-add-releases-form"
  );
  if (!addReleasePageContainer) return;

  const totalSteps = 5;
  const stepTitles = {
    1: "Metadata",
    2: "Uploads",
    3: "Stores",
    4: "Date & Price",
    5: "Terms",
  };
  let currentStep = 1;

  // CRITICAL FIX: Track which button was clicked
  let submittingButton = null;
  let rejectionMessage = null; // Track rejection message

  if (typeof feather !== "undefined") {
    feather.replace();
  }

  // FIXED: Initialize form data for edit mode
  const isEditMode =
    document.querySelector('input[name="releaseTitle"]')?.value !== "";

  // Initialize rejection modal
  const rejectionModal = document.getElementById("rejectionModal")
    ? new bootstrap.Modal(document.getElementById("rejectionModal"))
    : null;

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

    if (progressLine) {
      const progressWidth = ((step - 1) / (totalSteps - 1)) * 100;
      progressLine.style.width = progressWidth + "%";
    }
  }

  function showStep(step) {
    document.querySelectorAll(".step-content").forEach((content) => {
      content.classList.remove("active");
    });

    setTimeout(() => {
      const targetStep = document.getElementById(`step-${step}`);
      if (targetStep) {
        targetStep.classList.add("active");
      }
    }, 150);

    updateStepIndicator(step);

    const currentStepTitleEl = document.querySelector(".current-step-title");
    if (currentStepTitleEl) {
      currentStepTitleEl.textContent = stepTitles[step];
    }

    currentStep = step;
  }

  function createStepValidator(stepRules, stepNumber) {
    Object.keys(stepRules).forEach((fieldId) => {
      const field = document.getElementById(fieldId);
      if (!field) return;

      const rule = stepRules[fieldId];

      if (rule.type === "radio") {
        document
          .querySelectorAll(`input[name="${field.name}"]`)
          .forEach((radio) => {
            radio.addEventListener("change", () =>
              validateStepField(fieldId, stepRules[fieldId])
            );
          });
      } else if (rule.type === "checkbox") {
        if (
          field.name &&
          document.querySelectorAll(`input[name="${field.name}"]`).length > 1
        ) {
          document
            .querySelectorAll(`input[name="${field.name}"]`)
            .forEach((checkbox) => {
              checkbox.addEventListener("change", () =>
                validateStepField(fieldId, stepRules[fieldId])
              );
            });
        } else {
          field.addEventListener("change", () =>
            validateStepField(fieldId, stepRules[fieldId])
          );
        }
      } else if (rule.type === "file") {
        field.addEventListener("change", () =>
          validateStepField(fieldId, stepRules[fieldId])
        );
      } else {
        field.addEventListener("input", () =>
          validateStepField(fieldId, stepRules[fieldId])
        );
        field.addEventListener("change", () =>
          validateStepField(fieldId, stepRules[fieldId])
        );
        field.addEventListener("blur", () =>
          validateStepField(fieldId, stepRules[fieldId])
        );
      }
    });

    if (stepNumber === 4) {
      ["releaseDate", "preSaleDate", "originalReleaseDate"].forEach((id) => {
        const field = document.getElementById(id);
        if (field) {
          field.addEventListener("change", validateStep4Dates);
        }
      });
    }

    return function validateStep() {
      let allValid = true;
      Object.keys(stepRules).forEach((fieldId) => {
        const isValid = validateStepField(fieldId, stepRules[fieldId]);
        if (!isValid) allValid = false;
      });

      if (stepNumber === 4) {
        if (!validateStep4Dates()) {
          allValid = false;
        }
      }
      return allValid;
    };
  }

  function validateStepField(fieldId, rules) {
    if (fieldId === "artworkFile") {
      return validateArtworkFile();
    }
    if (fieldId === "audioFile") {
      return validateAudioFile();
    }
    if (fieldId === "freeStores") {
      return validateStoreSelection();
    }

    return FormValidator.validateField(fieldId, rules);
  }

  // FIXED: Artwork validation for edit mode
  function validateArtworkFile() {
    const artworkFile = document.getElementById("artworkFile");
    const artworkFileError = document.getElementById("artworkFileError");
    const artworkUpload = document.getElementById("artworkUpload");
    const artworkPreview = document.getElementById("artworkPreview");

    if (!artworkFile || !artworkFileError || !artworkUpload) return true;

    artworkUpload.classList.remove("is-invalid", "is-valid");
    artworkFileError.textContent = "";
    artworkFileError.style.display = "none";

    // In edit mode: valid if preview exists and no new file selected
    if (
      isEditMode &&
      artworkPreview &&
      !artworkPreview.classList.contains("d-none") &&
      (!artworkFile.files || artworkFile.files.length === 0)
    ) {
      artworkUpload.classList.add("is-valid");
      return true;
    }

    if (!artworkFile.files || artworkFile.files.length === 0) {
      if (!isEditMode) {
        artworkUpload.classList.add("is-invalid");
        artworkFileError.textContent = "Please select an artwork file.";
        artworkFileError.style.display = "block";
        return false;
      }
      return true;
    }

    const file = artworkFile.files[0];
    const allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
    const maxSize = 10 * 1024 * 1024;

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

    return new Promise((resolve) => {
      const img = new Image();
      img.onload = function () {
        if (this.width !== 3000 || this.height !== 3000) {
          artworkUpload.classList.add("is-invalid");
          artworkFileError.textContent =
            "Artwork must be exactly 3000 x 3000 pixels.";
          artworkFileError.style.display = "block";
          resolve(false);
        } else {
          artworkUpload.classList.add("is-valid");
          resolve(true);
        }
      };
      img.onerror = function () {
        artworkUpload.classList.add("is-invalid");
        artworkFileError.textContent = "Invalid image file.";
        artworkFileError.style.display = "block";
        resolve(false);
      };
      img.src = URL.createObjectURL(file);
    });
  }

  // FIXED: Audio validation for edit mode
  function validateAudioFile() {
    const audioFile = document.getElementById("audioFile");
    const audioFileError = document.getElementById("audioFileError");
    const audioUpload = document.getElementById("audioUpload");
    const audioPreviewContainer = document.getElementById(
      "audioPreviewContainer"
    );

    if (!audioFile || !audioUpload) return true;

    audioUpload.classList.remove("is-invalid", "is-valid");
    if (audioFileError) {
      audioFileError.textContent = "";
      audioFileError.style.display = "none";
    }

    // FIXED: In edit mode, if preview exists and no new file selected, it's valid
    if (
      isEditMode &&
      audioPreviewContainer &&
      !audioPreviewContainer.classList.contains("d-none") &&
      (!audioFile.files || audioFile.files.length === 0)
    ) {
      audioUpload.classList.add("is-valid");
      return true;
    }

    if (!audioFile.files || audioFile.files.length === 0) {
      if (!isEditMode) {
        // Only show error for new forms
        audioUpload.classList.add("is-invalid");
        if (audioFileError) {
          audioFileError.textContent = "Please select an audio file.";
          audioFileError.style.display = "block";
        }
        return false;
      }
      return true; // Valid for edit mode without new file
    }

    if (typeof validateAudioFileInternal === "function") {
      const isValid = validateAudioFileInternal(audioFile.files[0]);
      if (isValid) {
        audioUpload.classList.add("is-valid");
      } else {
        audioUpload.classList.add("is-invalid");
      }
      return isValid;
    }

    return true;
  }

  function validateStep4Dates() {
    const releaseDate = document.getElementById("releaseDate");
    const preSaleDate = document.getElementById("preSaleDate");
    const originalReleaseDate = document.getElementById("originalReleaseDate");

    let isValid = true;

    const rdValue = releaseDate?.value ? new Date(releaseDate.value) : null;
    const psdValue = preSaleDate?.value ? new Date(preSaleDate.value) : null;
    const ordValue = originalReleaseDate?.value
      ? new Date(originalReleaseDate.value)
      : null;

    FormValidator.hideError(preSaleDate);
    FormValidator.hideError(originalReleaseDate);

    if (rdValue && ordValue && ordValue > rdValue) {
      FormValidator.showError(
        originalReleaseDate,
        "Original release date cannot be after the release date."
      );
      isValid = false;
    }

    if (psdValue && rdValue && psdValue >= rdValue) {
      FormValidator.showError(
        preSaleDate,
        "Pre-sale date must be before the release date."
      );
      isValid = false;
    }

    return isValid;
  }

  function validateStoreSelection() {
    const checkedCount = document.querySelectorAll(
      'input[name="stores[]"]:checked'
    ).length;
    const errorDiv = document.getElementById("storesError");

    if (checkedCount === 0) {
      if (errorDiv) errorDiv.style.display = "block";
      return false;
    } else {
      if (errorDiv) errorDiv.style.display = "none";
      return true;
    }
  }

  const stepValidators = {
    1: createStepValidator(step1ValidationRules, 1),
    2: createStepValidator(step2ValidationRules, 2),
    3: createStepValidator(step3ValidationRules, 3),
    4: createStepValidator(step4ValidationRules, 4),
    5: createStepValidator(step5ValidationRules, 5),
  };

  // Navigation event listeners
  document.querySelectorAll(".next-step").forEach((btn) => {
    btn.addEventListener("click", function () {
      const nextStep = parseInt(this.dataset.next, 10);

      if (stepValidators[currentStep] && !stepValidators[currentStep]()) {
        console.log(`Step ${currentStep} validation failed`);
        return;
      }

      if (nextStep <= totalSteps) {
        showStep(nextStep);
      }
    });
  });

  document.querySelectorAll(".prev-step").forEach((btn) => {
    btn.addEventListener("click", function () {
      const prevStep = parseInt(this.dataset.prev, 10);
      if (prevStep >= 1) {
        showStep(prevStep);
      }
    });
  });

  document.querySelectorAll(".step").forEach((step) => {
    step.addEventListener("click", function () {
      const stepNum = parseInt(this.dataset.step, 10);
      if (stepNum >= 1 && stepNum <= totalSteps) {
        showStep(stepNum);
      }
    });
  });

  // REJECTION MODAL HANDLERS
  const rejectBtn = document.getElementById("rejectBtn");
  const confirmRejectBtn = document.getElementById("confirmRejectBtn");
  const rejectionMessageInput = document.getElementById("rejectionMessage");
  const rejectionMessageError = document.getElementById(
    "rejectionMessageError"
  );

  // Open rejection modal
  if (rejectBtn) {
    rejectBtn.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();

      if (rejectionModal) {
        rejectionModal.show();
      }
    });
  }

  // Handle rejection confirmation
  if (confirmRejectBtn) {
    confirmRejectBtn.addEventListener("click", function () {
      const message = rejectionMessageInput.value.trim();

      // Validate message
      if (!message) {
        rejectionMessageInput.classList.add("is-invalid");
        rejectionMessageError.style.display = "block";
        return;
      }

      // Clear validation
      rejectionMessageInput.classList.remove("is-invalid");
      rejectionMessageError.style.display = "none";

      // Store rejection message
      rejectionMessage = message;

      // Set submitting button data for rejection
      submittingButton = {
        name: "status",
        value: "4",
      };

      // Close modal
      if (rejectionModal) {
        rejectionModal.hide();
      }

      // Trigger form submission
      const form = document.getElementById("releaseForm");
      if (form) {
        const submitEvent = new Event("submit");
        form.dispatchEvent(submitEvent);
      }
    });
  }

  // Clear validation when user types
  if (rejectionMessageInput) {
    rejectionMessageInput.addEventListener("input", function () {
      if (this.value.trim()) {
        this.classList.remove("is-invalid");
        rejectionMessageError.style.display = "none";
      }
    });
  }

  // CRITICAL FIX: Capture submit button clicks BEFORE form submission
  document.addEventListener("click", function (e) {
    if (
      e.target.type === "submit" &&
      e.target.form &&
      e.target.form.id === "releaseForm"
    ) {
      submittingButton = {
        name: e.target.name,
        value: e.target.value,
      };
      console.log("CAPTURED SUBMIT BUTTON:", submittingButton);
    }
  });

  // File upload handlers
  const audioUpload = document.getElementById("audioUpload");
  const audioFile = document.getElementById("audioFile");

  if (audioUpload && audioFile) {
    const newAudioUpload = audioUpload.cloneNode(true);
    audioUpload.parentNode.replaceChild(newAudioUpload, audioUpload);
    let isAudioProcessing = false;

    newAudioUpload.addEventListener("click", function (e) {
      if (isAudioProcessing) return false;
      isAudioProcessing = true;
      e.preventDefault();
      e.stopPropagation();
      audioFile.click();
      setTimeout(() => {
        isAudioProcessing = false;
      }, 1000);
      return false;
    });

    audioFile.addEventListener("change", function (e) {
      if (e.target.files && e.target.files.length > 0) {
        const file = e.target.files[0];
        if (validateAudioFileInternal(file)) {
          const reader = new FileReader();
          reader.onload = function (event) {
            const audioPreview = document.getElementById("audioPreview");
            const audioPreviewContainer = document.getElementById(
              "audioPreviewContainer"
            );
            const audioFileName = document.getElementById("audioFileName");
            const audioFileSize = document.getElementById("audioFileSize");

            if (audioPreview && audioPreviewContainer) {
              audioPreview.src = event.target.result;
              audioPreviewContainer.classList.remove("d-none");

              if (audioFileName) {
                audioFileName.textContent = file.name;
              }
              if (audioFileSize) {
                const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                audioFileSize.textContent = `Size: ${sizeInMB} MB`;
              }

              if (typeof feather !== "undefined") {
                feather.replace();
              }
            }
          };
          reader.readAsDataURL(file);
        } else {
          const audioPreviewContainer = document.getElementById(
            "audioPreviewContainer"
          );
          if (audioPreviewContainer) {
            audioPreviewContainer.classList.add("d-none");
          }
        }
      }
    });
  }

  function validateAudioFileInternal(file) {
    if (!file) return false;

    const allowedAudioTypes = ["audio/wav", "audio/wave", "audio/x-wav"];
    const maxAudioSize = 50 * 1024 * 1024;

    const fileExtension = file.name.split(".").pop().toLowerCase();
    const isValidType = allowedAudioTypes.includes(file.type);
    const isValidExtension = fileExtension === "wav";

    if (!isValidType && !isValidExtension) {
      alert("Only WAV files are accepted!\n\nPlease upload a WAV audio file.");
      return false;
    }

    if (!isValidExtension) {
      alert(
        "Only .wav files are accepted!\n\nPlease make sure your file has a .wav extension."
      );
      return false;
    }

    if (file.size > maxAudioSize) {
      alert("File size too large!\n\nYour WAV file should not exceed 50MB.");
      return false;
    }

    const minAudioSize = 1024;
    if (file.size < minAudioSize) {
      alert(
        "File appears to be empty or corrupted!\n\nPlease select a valid WAV audio file."
      );
      return false;
    }

    return true;
  }

  // Artwork upload handler
  const artworkUpload = document.getElementById("artworkUpload");
  const artworkFile = document.getElementById("artworkFile");

  if (artworkUpload && artworkFile) {
    const newArtworkUpload = artworkUpload.cloneNode(true);
    artworkUpload.parentNode.replaceChild(newArtworkUpload, artworkUpload);
    let isProcessing = false;

    newArtworkUpload.addEventListener("click", function (e) {
      if (isProcessing) return false;
      isProcessing = true;
      e.preventDefault();
      e.stopPropagation();
      artworkFile.click();
      setTimeout(() => {
        isProcessing = false;
      }, 1000);
      return false;
    });

    artworkFile.addEventListener("change", function (e) {
      if (e.target.files && e.target.files.length > 0) {
        const file = e.target.files[0];
        if (validateArtworkFileInternal(file)) {
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
      }
    });
  }

  function validateArtworkFileInternal(file) {
    if (!file) return false;

    const allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
    const maxSize = 10 * 1024 * 1024;

    if (!allowedTypes.includes(file.type)) {
      alert("Please select a valid image file (JPG, JPEG, or PNG).");
      return false;
    }

    if (file.size > maxSize) {
      alert("File size should not exceed 10MB.");
      return false;
    }

    return true;
  }

  // Toggle all stores
  document.querySelectorAll(".toggle-all").forEach((button) => {
    button.addEventListener("click", function () {
      const targetId = this.dataset.target;
      const container = document.getElementById(targetId);
      if (!container) return;

      const checkboxes = container.querySelectorAll('input[type="checkbox"]');
      if (checkboxes.length === 0) return;

      const allChecked = Array.from(checkboxes).every((cb) => cb.checked);
      checkboxes.forEach((cb) => {
        cb.checked = !allChecked;
      });

      if (targetId === "freeStores") {
        validateStoreSelection();
      }
    });
  });

  // FIXED: Form submission with proper button capture and rejection message handling
  document
    .getElementById("releaseForm")
    .addEventListener("submit", function (e) {
      e.preventDefault();

      console.log("Form submission started");
      console.log("Submitting button:", submittingButton);
      console.log("Rejection message:", rejectionMessage);

      // Validate all steps first (skip for rejection)
      if (!submittingButton || submittingButton.value !== "4") {
        let allStepsValid = true;
        for (let step = 1; step <= totalSteps; step++) {
          if (stepValidators[step] && !stepValidators[step]()) {
            allStepsValid = false;
            showStep(step);
            break;
          }
        }

        if (!allStepsValid) {
          alert("Please complete all required fields before submitting.");
          submittingButton = null;
          return;
        }
      }

      const form = e.target;
      const formData = new FormData(form);

      // CRITICAL FIX: Use the captured button data
      if (submittingButton && submittingButton.name && submittingButton.value) {
        // Remove any existing status fields first
        formData.delete("status");
        // Add the clicked button's status
        formData.set(submittingButton.name, submittingButton.value);
        console.log(
          "ADDED BUTTON STATUS:",
          submittingButton.name,
          "=",
          submittingButton.value
        );

        // Add rejection message if this is a rejection
        if (submittingButton.value === "4" && rejectionMessage) {
          formData.set("message", rejectionMessage);
          console.log("ADDED REJECTION MESSAGE:", rejectionMessage);
        }
      } else {
        // Fallback: try activeElement
        const activeBtn = document.activeElement;
        if (
          activeBtn &&
          activeBtn.type === "submit" &&
          activeBtn.name &&
          activeBtn.value
        ) {
          formData.delete("status");
          formData.set(activeBtn.name, activeBtn.value);
          console.log(
            "FALLBACK - ADDED ACTIVE BUTTON:",
            activeBtn.name,
            "=",
            activeBtn.value
          );
        } else {
          // Last resort: default status
          console.log("NO BUTTON CAPTURED - USING DEFAULT STATUS 1");
          formData.set("status", "1");
        }
      }

      // Debug: Log all FormData contents
      console.log("=== FINAL FORMDATA CONTENTS ===");
      for (let [key, value] of formData.entries()) {
        if (key === "status" || key.includes("status") || key === "message") {
          console.log("🔴 " + key + ": " + value);
        } else {
          console.log(key + ": " + value);
        }
      }

      // Show loading state
      const submitBtns = form.querySelectorAll(
        'button[type="submit"], button#rejectBtn'
      );
      const originalButtonContent = new Map();

      submitBtns.forEach((btn) => {
        originalButtonContent.set(btn, btn.innerHTML);
        btn.disabled = true;
        btn.innerHTML =
          '<i class="spinner-border spinner-border-sm me-1"></i> Processing...';
      });

      fetch(form.action, {
        method: "POST",
        body: formData,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      })
        .then((response) => {
          console.log("Response status:", response.status);

          if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
          }

          return response.text();
        })
        .then((text) => {
          console.log("Raw response:", text);

          if (!text || text.trim() === "") {
            return {
              success: true,
              message: "Release processed successfully!",
            };
          }

          try {
            const parsed = JSON.parse(text);
            console.log("Parsed JSON:", parsed);
            return parsed;
          } catch (parseError) {
            console.log("JSON parse failed:", parseError.message);
            throw new Error("Invalid JSON response from server");
          }
        })
        .then((data) => {
          console.log("Processing response data:", data);

          if (!data) {
            throw new Error("No response data received from server");
          }

          if (data.success === true) {
            const message = data.message || "Release processed successfully!";
            alert(message);
            window.location.href = data.redirect || "/superadmin/releases";
          } else if (data.success === false) {
            throw new Error(data.error || data.message || "Processing failed");
          } else if (data.message && !data.hasOwnProperty("success")) {
            alert(data.message);
            window.location.href = data.redirect || "/superadmin/releases";
          } else {
            console.warn("Unexpected response format:", data);
            throw new Error("Unexpected response format from server");
          }
        })
        .catch((error) => {
          console.error("Submission error:", error);
          alert("Error: " + error.message);

          // Restore buttons
          submitBtns.forEach((btn) => {
            btn.disabled = false;
            const originalContent = originalButtonContent.get(btn);
            if (originalContent) {
              btn.innerHTML = originalContent;
            } else {
              // Fallback restoration
              if (
                btn.innerHTML.includes("Approve") ||
                (btn.name === "status" && btn.value === "5")
              ) {
                btn.innerHTML =
                  '<i data-feather="check" class="me-1"></i> Approve';
              } else if (
                btn.innerHTML.includes("Reject") ||
                btn.id === "rejectBtn"
              ) {
                btn.innerHTML = '<i data-feather="x" class="me-1"></i> Reject';
              } else {
                btn.innerHTML =
                  '<i data-feather="check" class="me-1"></i> Submit Release';
              }
            }
          });

          // Re-initialize feather icons
          if (typeof feather !== "undefined") {
            feather.replace();
          }
        })
        .finally(() => {
          // Reset the captured button and rejection message
          submittingButton = null;
          rejectionMessage = null;
        });
    });
});

//release page reject modal code
document.addEventListener("DOMContentLoaded", function () {
  const rejectionMessageInput = document.getElementById("rejectionMessage");
  const charCount = document.getElementById("charCount");
  const confirmRejectBtn = document.getElementById("confirmRejectBtn");
  const rejectionMessageError = document.getElementById(
    "rejectionMessageError"
  );
  const rejectionModal = document.getElementById("rejectionModal");
  const rejectBtn = document.getElementById("rejectBtn"); // reject button on page

  // Character counter
  if (rejectionMessageInput && charCount) {
    rejectionMessageInput.addEventListener("input", function () {
      const currentLength = this.value.length;
      charCount.textContent = currentLength;

      if (confirmRejectBtn) {
        if (currentLength >= 10) {
          confirmRejectBtn.disabled = false;
          this.classList.remove("is-invalid");
          rejectionMessageError.style.display = "none";
        } else {
          confirmRejectBtn.disabled = true;
        }
      }
    });
  }

  // Enhanced validation for rejection confirmation
  if (confirmRejectBtn) {
    confirmRejectBtn.addEventListener("click", function () {
      const message = rejectionMessageInput.value.trim();

      if (!message || message.length < 10) {
        rejectionMessageInput.classList.add("is-invalid");
        rejectionMessageError.textContent =
          "Please provide a rejection reason (minimum 10 characters).";
        rejectionMessageError.style.display = "block";
        rejectionMessageInput.focus();
        return;
      }

      rejectionMessageInput.classList.remove("is-invalid");
      rejectionMessageError.style.display = "none";

      window.rejectionMessage = message;
      window.submittingButton = {
        name: "status",
        value: "4",
      };

      // Close modal
      const modal = bootstrap.Modal.getInstance(rejectionModal);
      if (modal) {
        modal.hide();
      }

      // Trigger form submission
      const form = document.getElementById("releaseForm");
      if (form) {
        const submitEvent = new Event("submit");
        form.dispatchEvent(submitEvent);
      }
    });

    confirmRejectBtn.disabled = true;
  }

  // Reset modal when closed
  if (rejectionModal) {
    rejectionModal.addEventListener("hidden.bs.modal", function () {
      if (rejectionMessageInput) {
        rejectionMessageInput.value = "";
        rejectionMessageInput.classList.remove("is-invalid");
      }
      if (rejectionMessageError) {
        rejectionMessageError.style.display = "none";
      }
      if (charCount) {
        charCount.textContent = "0";
      }
      if (confirmRejectBtn) {
        confirmRejectBtn.disabled = true;
      }
    });

    rejectionModal.addEventListener("shown.bs.modal", function () {
      if (typeof feather !== "undefined") {
        feather.replace();
      }
      if (rejectionMessageInput) {
        rejectionMessageInput.focus();
      }
    });
  }

  // ✅ OPEN modal when Reject button is clicked
  if (rejectBtn) {
    rejectBtn.addEventListener("click", function () {
      const modal = new bootstrap.Modal(rejectionModal);
      modal.show();
    });
  }
});

//User Account Creation Js
document.addEventListener("DOMContentLoaded", function () {
  const start = document.getElementById("startDate");
  const end = document.getElementById("endDate");
  if (!start || !end) return;

  const form = start.closest("form");

  function syncMinMax() {
    if (start.value) end.min = start.value;
    else end.removeAttribute("min");
    if (end.value) start.max = end.value;
    else start.removeAttribute("max");
  }

  function validateDates(showBubble = false) {
    let ok = true;

    start.setCustomValidity("");
    end.setCustomValidity("");

    if (start.value && end.value) {
      const s = new Date(start.value);
      const e = new Date(end.value);

      if (s >= e) {
        // disallow equal OR greater
        start.setCustomValidity("Start date must be before end date.");
        end.setCustomValidity("End date must be after start date.");
        ok = false;
      }
    }

    syncMinMax();

    if (showBubble) {
      (document.activeElement === start ? start : end).reportValidity();
    }

    return ok;
  }

  ["input", "change", "blur"].forEach((evt) => {
    start.addEventListener(evt, () => validateDates(evt !== "blur"));
    end.addEventListener(evt, () => validateDates(evt !== "blur"));
  });

  if (form) {
    form.addEventListener("submit", function (e) {
      const ok = validateDates(true) && form.checkValidity();
      if (!ok) {
        e.preventDefault();
        e.stopPropagation();
      }
      form.classList.add("was-validated");
    });
  }

  syncMinMax();
});

//Toggle Password  Functionlity
document.addEventListener("DOMContentLoaded", () => {
  const passwordInput = document.getElementById("password");
  const togglePassword = document.getElementById("togglePassword");
  const toggleIcon = document.getElementById("toggleIcon");

  // run only if all elements exist
  if (passwordInput && togglePassword && toggleIcon) {
    togglePassword.addEventListener("click", function () {
      const isPassword = passwordInput.type === "password";
      passwordInput.type = isPassword ? "text" : "password";

      toggleIcon.classList.toggle("bi-eye");
      toggleIcon.classList.toggle("bi-eye-slash");
    });
  }
});

//change password js
$(document).on("click", "#changePasswordBtn", function () {
  let oldPass = $("#old_password").val();
  let newPass = $("#new_password").val();
  let confirmPass = $("#confirm_password").val();

  $.ajax({
    url: "/profile/changePassword",
    method: "POST",
    data: {
      old_password: oldPass,
      new_password: newPass,
      confirm_password: confirmPass,
    },
    dataType: "json",
    success: function (response) {
      let alertBox = $("#passwordAlert");
      if (response.status === "success") {
        alertBox.html(
          '<div class="alert alert-success">' + response.message + "</div>"
        );
        $("#old_password, #new_password, #confirm_password").val("");
      } else {
        alertBox.html(
          '<div class="alert alert-danger">' + response.message + "</div>"
        );
      }
    },
    error: function () {
      $("#passwordAlert").html(
        '<div class="alert alert-danger">Something went wrong.</div>'
      );
    },
  });
});

//export releases
document.getElementById("exportCsvBtn").addEventListener("click", function () {
  window.location.href = "/superadmin/releases/export-csv";
});

document.addEventListener("DOMContentLoaded", function () {
  // Initialize Select2 only for admin/superadmin dropdown
  if (document.querySelector(".searchable-select")) {
    $(".searchable-select").select2({
      placeholder: "Search and select...",
      allowClear: true,
      width: "100%",
      theme: "default",
      minimumInputLength: 0,
      matcher: function (params, data) {
        if ($.trim(params.term) === "") {
          return data;
        }
        if (typeof data.text === "undefined") {
          return null;
        }
        var searchTerm = params.term.toLowerCase();
        var optionText = data.text.toLowerCase();
        if (optionText.indexOf(searchTerm) > -1) {
          return $.extend({}, data, true);
        }
        return null;
      },
      templateResult: function (data) {
        if (!data.id) return data.text;
        return $("<span></span>").text(data.text);
      },
      templateSelection: function (data) {
        return data.text || data.placeholder;
      },
    });

    // Remove invalid style when user opens dropdown
    $(".searchable-select").on("select2:open", function () {
      $(this).removeClass("is-invalid");
      $(this)
        .next(".select2-container")
        .find(".select2-selection")
        .removeClass("is-invalid");
    });

    // Validate each select on change
    $(".searchable-select").on("change", function () {
      validateSelect($(this));
    });

    // Function to validate a select2 element and show error message
    function validateSelect($select) {
      var value = $select.val();
      var id = $select.attr("id"); // e.g., labelName, artist, featuringArtist
      var errorId = "#" + id + "Error";

      if ($select.prop("required") && (!value || value === "")) {
        $select.addClass("is-invalid");
        $select
          .next(".select2-container")
          .find(".select2-selection")
          .addClass("is-invalid");
        $(errorId)
          .show()
          .text(
            "Please select a " +
              id.replace(/([A-Z])/g, " $1").toLowerCase() +
              "."
          );
        return false;
      } else {
        $select.removeClass("is-invalid");
        $select
          .next(".select2-container")
          .find(".select2-selection")
          .removeClass("is-invalid");
        $(errorId).hide().text("");
        return true;
      }
    }

    // Validate all required select2 fields on form submit
    $("form").on("submit", function (e) {
      var isValid = true;

      $(".searchable-select[required]").each(function () {
        if (!validateSelect($(this))) {
          isValid = false;
        }
      });

      if (!isValid) {
        e.preventDefault();
        return false;
      }
    });
  }
});



