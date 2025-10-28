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
function initializeOwnershipPage(config) {
  const pageContainer = document.querySelector(config.pageSelector);
  if (!pageContainer) return;

  let currentConflictId = null; // keep track of the selected row ID

  const getStatusBadge = (status) => {
    let badgeClass = "bg-secondary-subtle text-secondary-emphasis";
    if (status === "Action Required")
      badgeClass = "bg-danger-subtle text-danger-emphasis";
    else if (status === "Resolved" || status === "Approved")
      badgeClass = "bg-success-subtle text-success-emphasis";
    else if (status === "In Review")
      badgeClass = "bg-warning-subtle text-warning-emphasis";
    else if (status === "Rejected") badgeClass = "bg-danger text-white";
    return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
  };

  const populateTable = (tableBodySelector, data, platformConfig) => {
    const tableBody = pageContainer.querySelector(tableBodySelector);
    if (!tableBody) {
      console.error("Table body element not found:", tableBodySelector);
      return;
    }

    try {
      // Clear existing data
      tableBody.innerHTML = "";

      // Handle empty data gracefully by showing a message row
      if (!data || data.length === 0) {
        tableBody.innerHTML = `
        <tr>
          <td colspan="10" class="text-center text-muted">
            <i class="bi bi-info-circle"></i> No ${platformConfig.platformName} conflicts found
          </td>
        </tr>
      `;
        return;
      }

      // Append rows for each item
      data.forEach((item) => {
        const row = document.createElement("tr");
        row.style.cursor = "pointer";
        row.setAttribute("data-bs-toggle", "offcanvas");
        row.setAttribute("data-bs-target", "#ownershipDetailsOffcanvas");

        // Set data attributes required for offcanvas and further usage
        row.setAttribute("data-id", item.id || "");
        row.setAttribute(
          "data-song-name",
          item.songName || item.assetTitle || ""
        );
        row.setAttribute(
          "data-artist-name",
          item.artistName || item.artist || ""
        );
        row.setAttribute("data-isrc", item.isrc || "");
        row.setAttribute("data-upc", item.upc || "");
        row.setAttribute("data-category", item.category || "");
        row.setAttribute("data-other-party", item.otherParty || "");
        row.setAttribute("data-asset-title", item.assetTitle || "");
        row.setAttribute("data-asset-id", item.assetId || "");
        row.setAttribute("data-daily-views", item.dailyViews || "");
        row.setAttribute("data-expiry", item.expiry || "");
        row.setAttribute("data-platform-name", platformConfig.platformName);
        row.setAttribute("data-status", item.status || "");

        // You can add any additional resolutionData fields similarly if required
        const completeResolutionData = {
          rightsOwnedDisplay:
            item.resolutionData?.rightsOwnedDisplay ||
            item.rightsOwnedDisplay ||
            "",
          countryDisplayText:
            item.resolutionData?.countryDisplayText ||
            item.countryDisplayText ||
            "",
          supportingDocumentPath:
            item.resolutionData?.supportingDocumentPath ||
            item.supportingDocumentPath ||
            "",
          resolutionDate:
            item.resolutionData?.resolutionDate ||
            item.resolutionDate ||
            item.submissionDate ||
            "",
          rejectionMessage:
            item.resolutionData?.rejectionMessage ||
            item.rejectionMessage ||
            "",
          submissionDate:
            item.resolutionData?.submissionDate || item.submissionDate || "",
          ...item.resolutionData,
        };

        row.setAttribute(
          "data-resolution-data",
          encodeURIComponent(JSON.stringify(completeResolutionData))
        );

        // Fill row inner HTML cells exactly as per your existing format
        row.innerHTML = `
        <td class="text-center"><i class="bi ${
          platformConfig.platformIconClass
        } fs-5"></i></td>
        <td>${item.category || "-"}</td>
        <td>${item.assetTitle || "-"}</td>
        <td>
          <div class="fw-bold">${item.artist || "-"}</div>
          <small class="text-muted">Asset ID: ${item.assetId || "-"}</small>
        </td>
        <td>${item.upc || "-"}</td>
        <td>${item.otherParty || "-"}</td>
        <td>${item.dailyViews || "-"}</td>
        <td>${item.expiry || "-"}</td>
        <td class="status-cell">${getStatusBadge(item.status || "Unknown")}</td>
        <td class="text-center"><i class="bi bi-chevron-right text-muted"></i></td>
      `;
        tableBody.appendChild(row);
      });
    } catch (error) {
      console.error("Error populating table:", error);
      tableBody.innerHTML = `
      <tr>
        <td colspan="10" class="text-center text-danger">
          <i class="bi bi-exclamation-triangle"></i>
          Error loading data. Please try again later.
        </td>
      </tr>
    `;
    }
  };

  populateTable(".facebook-data-body", config.facebookData, {
    platformName: "Facebook",
    platformIconClass: "bi-facebook text-primary",
  });

  $(".datatable").DataTable({
    destroy: true,
    paging: true,
    searching: true,
    info: true,
    lengthChange: false,
    autoWidth: false,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search facebook conflicts...",
    },
  });

  // --- OFFCANVAS ---
  const ownershipOffcanvasEl = document.getElementById(
    "ownershipDetailsOffcanvas"
  );
  if (!ownershipOffcanvasEl) return;

  ownershipOffcanvasEl.addEventListener("show.bs.offcanvas", function (event) {
    const triggerRow = event.relatedTarget;
    const data = triggerRow.dataset;

    // ✅ FIXED: Parse resolution data properly
    let resolutionData = {};
    try {
      resolutionData = JSON.parse(
        decodeURIComponent(data.resolutionData || "{}")
      );
    } catch (e) {
      console.error("Error parsing resolution data:", e);
      resolutionData = {};
    }

    // ✅ Save current conflict ID
    currentConflictId = data.id;

    console.log("Opening offcanvas for ID:", currentConflictId);
    console.log("All data:", data);
    console.log("Resolution data:", resolutionData);

    // Clear all fields first
    const clearElement = (selector, defaultValue = "-") => {
      const el = ownershipOffcanvasEl.querySelector(selector);
      if (el) el.textContent = defaultValue;
    };

    // Album Cover (always FB placeholder)
    const albumCover = ownershipOffcanvasEl.querySelector(
      "#ownershipAlbumCover"
    );
    if (albumCover) {
      albumCover.src = "https://placehold.co/80x80/3b5998/ffffff?text=FB";
    }

    // ✅ FIXED: Use correct data attribute names (kebab-case from dataset)
    clearElement("#ownershipSongName");
    const songNameEl = ownershipOffcanvasEl.querySelector("#ownershipSongName");
    if (songNameEl)
      songNameEl.textContent = data.songName || data.assetTitle || "-";

    clearElement("#ownershipArtistName");
    const artistNameEl = ownershipOffcanvasEl.querySelector(
      "#ownershipArtistName"
    );
    if (artistNameEl) artistNameEl.textContent = data.artistName || "-";

    clearElement("#ownershipIsrc");
    const isrcEl = ownershipOffcanvasEl.querySelector("#ownershipIsrc");
    if (isrcEl) isrcEl.textContent = `ISRC: ${data.isrc || "N/A"}`;

    clearElement("#ownershipPlatform");
    const platformEl = ownershipOffcanvasEl.querySelector("#ownershipPlatform");
    if (platformEl) platformEl.textContent = data.platformName || "-";

    clearElement("#ownershipOffcanvasTitle");
    const titleEl = ownershipOffcanvasEl.querySelector(
      "#ownershipOffcanvasTitle"
    );
    if (titleEl)
      titleEl.textContent = `Resolution Details: ${data.category || "Unknown"}`;

    clearElement("#ownershipOffcanvasSubtitle");
    const subtitleEl = ownershipOffcanvasEl.querySelector(
      "#ownershipOffcanvasSubtitle"
    );
    if (subtitleEl)
      subtitleEl.textContent = `VS. ${data.otherParty || "Unknown"}`;

    // ✅ FIXED: Update status badge properly
    const statusBadgeEl = ownershipOffcanvasEl.querySelector(
      "#currentStatusBadge"
    );
    if (statusBadgeEl) {
      const badgeHTML = getStatusBadge(data.status || "Unknown");
      const tempDiv = document.createElement("div");
      tempDiv.innerHTML = badgeHTML;
      const badge = tempDiv.firstChild;
      statusBadgeEl.className = badge.className;
      statusBadgeEl.textContent = badge.textContent;
    }

    // ✅ FIXED: Update dropdown immediately and handle change
    const statusDropdown = document.getElementById("statusDropdown");
    if (statusDropdown) {
      statusDropdown.value = data.status || "";

      // Show/hide rejection section based on status
      const rejectionMessageSection = document.getElementById(
        "rejectionMessageSection"
      );
      if (rejectionMessageSection) {
        if (data.status === "Rejected") {
          rejectionMessageSection.classList.remove("d-none");
        } else {
          rejectionMessageSection.classList.add("d-none");
        }
      }
    }

    // ✅ FIXED: Resolution Details with all fields
    clearElement("#resolutionRightsOwned");
    const rightsOwnedEl = ownershipOffcanvasEl.querySelector(
      "#resolutionRightsOwned"
    );
    if (rightsOwnedEl) {
      rightsOwnedEl.textContent = resolutionData.rightsOwnedDisplay || "N/A";
    }

    const countriesEl = ownershipOffcanvasEl.querySelector(
      "#resolutionCountries"
    );
    if (countriesEl) {
      countriesEl.innerHTML = resolutionData.countryDisplayText
        ? `<pre class="mb-0">${resolutionData.countryDisplayText}</pre>`
        : `<i class="bi bi-globe text-muted me-2"></i>No territories selected`;
    }

    const docInfoEl = ownershipOffcanvasEl.querySelector(
      "#supportingDocumentInfo"
    );
    if (docInfoEl) {
      docInfoEl.innerHTML = resolutionData.supportingDocumentPath
        ? `<a href="${resolutionData.supportingDocumentPath}" target="_blank"><i class="bi bi-file-earmark-text me-2"></i>View Document</a>`
        : `<i class="bi bi-file-earmark-text text-muted me-2"></i>No document uploaded`;
    }

    // ✅ FIXED: Resolution/Submission Date
    clearElement("#resolutionDate");
    const resolutionDateEl =
      ownershipOffcanvasEl.querySelector("#resolutionDate");
    if (resolutionDateEl) {
      const dateToShow =
        resolutionData.resolutionDate || resolutionData.submissionDate || "-";
      resolutionDateEl.textContent = dateToShow;
    }

    // ✅ FIXED: Handle Rejection case properly
    const rejectionSection = ownershipOffcanvasEl.querySelector(
      "#rejectionDisplaySection"
    );
    const rejectionMessageEl = ownershipOffcanvasEl.querySelector(
      "#rejectionDisplayMessage"
    );
    const rejectionDateEl =
      ownershipOffcanvasEl.querySelector("#rejectionDate");

    if (data.status === "Rejected") {
      if (rejectionSection) rejectionSection.classList.remove("d-none");
      if (rejectionMessageEl) {
        rejectionMessageEl.textContent =
          resolutionData.rejectionMessage || "No rejection message provided.";
      }
      if (rejectionDateEl) {
        rejectionDateEl.textContent =
          resolutionData.resolutionDate || resolutionData.submissionDate || "-";
      }
    } else {
      if (rejectionSection) rejectionSection.classList.add("d-none");
    }

    // ✅ Clear the rejection message input field
    const rejectionMessageInput = document.getElementById("rejectionMessage");
    if (rejectionMessageInput) {
      rejectionMessageInput.value = "";
    }

    // ✅ Add any other fields that might exist in your HTML
    const additionalFields = [
      { selector: "#ownershipAssetId", value: data.assetId },
      { selector: "#ownershipUpc", value: data.upc },
      { selector: "#ownershipDailyViews", value: data.dailyViews },
      { selector: "#ownershipExpiry", value: data.expiry },
      { selector: "#submissionDate", value: resolutionData.submissionDate },
    ];

    additionalFields.forEach((field) => {
      const el = ownershipOffcanvasEl.querySelector(field.selector);
      if (el) {
        el.textContent = field.value || "-";
      }
    });
  });

  // --- Update Status Handling ---
  const updateBtn = document.getElementById("updateStatusBtn");
  const statusDropdown = document.getElementById("statusDropdown");
  const rejectionMessageSection = document.getElementById(
    "rejectionMessageSection"
  );

  if (statusDropdown && updateBtn) {
    statusDropdown.addEventListener("change", () => {
      if (statusDropdown.value === "Rejected") {
        rejectionMessageSection?.classList.remove("d-none");
      } else {
        rejectionMessageSection?.classList.add("d-none");
      }
    });

    updateBtn.addEventListener("click", () => {
      const selectedStatus = statusDropdown.value;
      const rejectionMessage =
        document.getElementById("rejectionMessage")?.value || "";

      if (!currentConflictId) {
        alert("Conflict ID not found!");
        return;
      }

      fetch(`/facebook-ownership/update/${currentConflictId}`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          status: selectedStatus,
          rejectionMessage: rejectionMessage,
        }),
      })
        .then((res) => res.json())
        .then((json) => {
          if (json.status === "success") {
            alert("Status updated successfully.");

            // ✅ Update dataset + table cell immediately
            const row = document.querySelector(
              `[data-id="${currentConflictId}"]`
            );
            if (row) {
              row.dataset.status = selectedStatus;
              const statusCell = row.querySelector(".status-cell");
              if (statusCell) {
                statusCell.innerHTML = getStatusBadge(selectedStatus);
              }
            }

            // ✅ Reflect in dropdown immediately
            statusDropdown.value = selectedStatus;

            // Update current status badge in offcanvas
            const statusBadgeEl = ownershipOffcanvasEl.querySelector(
              "#currentStatusBadge"
            );
            if (statusBadgeEl) {
              const badgeHTML = getStatusBadge(selectedStatus);
              const tempDiv = document.createElement("div");
              tempDiv.innerHTML = badgeHTML;
              const badge = tempDiv.firstChild;
              statusBadgeEl.className = badge.className;
              statusBadgeEl.textContent = badge.textContent;
            }
          } else {
            alert("Error: " + json.message);
          }
        })
        .catch((err) => {
          console.error("Update request failed:", err);
          alert("An error occurred while updating.");
        });
    });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  fetch("/facebook-ownership/list")
    .then((res) => res.json())
    .then((json) => {
      console.log("Fetched data:", json.data); // Debug log
      initializeOwnershipPage({
        pageSelector: ".admin-ownership-data-page",
        facebookData: json.data,
      });
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
    });
});

// youtube ownership

function initializeYouTubeOwnershipPage(config) {
  // Use YouTube-specific page selector
  const pageContainer = document.querySelector(config.pageSelector);
  if (!pageContainer) {
    console.warn(
      "YouTube ownership page container not found:",
      config.pageSelector
    );
    return;
  }

  console.log("Initializing YouTube ownership page");
  let currentConflictId = null;

  const getStatusBadge = (status) => {
    let badgeClass = "bg-secondary-subtle text-secondary-emphasis";
    if (status === "Action Required")
      badgeClass = "bg-danger-subtle text-danger-emphasis";
    else if (status === "Resolved" || status === "Approved")
      badgeClass = "bg-success-subtle text-success-emphasis";
    else if (status === "In Review")
      badgeClass = "bg-warning-subtle text-warning-emphasis";
    else if (status === "Rejected") badgeClass = "bg-danger text-white";
    return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
  };

  const populateTable = (tableBodySelector, data, platformConfig) => {
    const tableBody = pageContainer.querySelector(tableBodySelector);
    if (!tableBody) {
      console.error("YouTube table body not found:", tableBodySelector);
      return;
    }

    console.log("Populating YouTube table with", data.length, "items");

    // Clear existing data
    tableBody.innerHTML = "";

    if (data.length === 0) {
      tableBody.innerHTML = `
        <tr>
          <td colspan="10" class="text-center text-muted">
            <i class="bi bi-info-circle"></i> No YouTube conflicts found
          </td>
        </tr>
      `;
      return;
    }

    data.forEach((item) => {
      const row = document.createElement("tr");
      row.style.cursor = "pointer";
      row.setAttribute("data-bs-toggle", "offcanvas");
      row.setAttribute("data-bs-target", "#youtubeOwnershipDetailsOffcanvas");

      // Set ALL required data attributes
      row.setAttribute("data-id", item.id || "");
      row.setAttribute(
        "data-song-name",
        item.songName || item.assetTitle || ""
      );
      row.setAttribute(
        "data-artist-name",
        item.artistName || item.artist || ""
      );
      row.setAttribute("data-isrc", item.isrc || "");
      row.setAttribute("data-upc", item.upc || "");
      row.setAttribute("data-category", item.category || "");
      row.setAttribute("data-other-party", item.otherParty || "");
      row.setAttribute("data-asset-title", item.assetTitle || "");
      row.setAttribute("data-asset-id", item.assetId || "");
      row.setAttribute("data-daily-views", item.dailyViews || "");
      row.setAttribute("data-expiry", item.expiry || "");
      row.setAttribute("data-platform-name", platformConfig.platformName);
      row.setAttribute("data-status", item.status || "");

      // YouTube specific attributes
      row.setAttribute("data-video-title", item.videoTitle || "");
      row.setAttribute("data-channel-name", item.channelName || "");
      row.setAttribute("data-issue-type", item.issueType || "");
      row.setAttribute(
        "data-duration-seconds",
        item.details?.duration_seconds || "0"
      );
      row.setAttribute(
        "data-duration-percentage-reference",
        item.details?.duration_percentage_reference || "0"
      );
      row.setAttribute(
        "data-duration-percentage-video",
        item.details?.duration_percentage_video || "0"
      );

      // Include ALL resolution data fields
      const completeResolutionData = {
        rightsOwnedDisplay:
          item.resolutionData?.rightsOwnedDisplay ||
          item.rightsOwnedDisplay ||
          "",
        supportingDocumentPath:
          item.resolutionData?.supportingDocumentPath ||
          item.supportingDocumentPath ||
          "",
        resolutionDate:
          item.resolutionData?.resolutionDate ||
          item.resolutionDate ||
          item.submissionDate ||
          "",
        rejectionMessage:
          item.resolutionData?.rejectionMessage || item.rejectionMessage || "",
        submissionDate:
          item.resolutionData?.submissionDate || item.submissionDate || "",
        ...item.resolutionData,
      };

      row.setAttribute(
        "data-resolution-data",
        encodeURIComponent(JSON.stringify(completeResolutionData))
      );

      row.innerHTML = `
        <td class="text-center"><i class="bi ${
          platformConfig.platformIconClass
        } fs-5"></i></td>
        <td>${item.category || "-"}</td>
        <td>${item.assetTitle || "-"}</td>
        <td>
          <div class="fw-bold">${item.artist || "-"}</div>
          <small class="text-muted">Asset ID: ${item.assetId || "-"}</small>
        </td>
        <td>${item.upc || "-"}</td>
        <td>${item.otherParty || "-"}</td>
        <td>${item.dailyViews || "-"}</td>
        <td>${item.expiry || "-"}</td>
        <td class="status-cell">${getStatusBadge(item.status || "Unknown")}</td>
        <td class="text-center"><i class="bi bi-chevron-right text-muted"></i></td>
      `;
      tableBody.appendChild(row);
    });
  };

  try {
    // Populate YouTube data
    populateTable(".youtube-data-body", config.youtubeData || [], {
      platformName: "YouTube",
      platformIconClass: "bi-youtube text-danger",
    });
  } catch (e) {
    console.error("Error populating YouTube table:", e);
  }

  // Initialize DataTable for YouTube only
  const youtubeTable = pageContainer.querySelector(".youtube-datatable");
  if (youtubeTable && $.fn.DataTable) {
    try {
      if ($.fn.DataTable.isDataTable(youtubeTable)) {
        $(youtubeTable).DataTable().clear().destroy();
      }
      $(youtubeTable).DataTable({
        destroy: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        autoWidth: false,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search YouTube conflicts...",
        },
      });
    } catch (e) {
      console.error("DataTable initialization error:", e);
    }
  }

  // Rest of your offcanvas and update logic remains the same...
  const youtubeOwnershipOffcanvasEl = document.getElementById(
    "youtubeOwnershipDetailsOffcanvas"
  );
  if (!youtubeOwnershipOffcanvasEl) return;

  youtubeOwnershipOffcanvasEl.addEventListener(
    "show.bs.offcanvas",
    function (event) {
      const triggerRow = event.relatedTarget;
      const data = triggerRow.dataset;

      let resolutionData = {};
      try {
        resolutionData = JSON.parse(
          decodeURIComponent(data.resolutionData || "{}")
        );
      } catch (e) {
        console.error("Error parsing resolution data:", e);
        resolutionData = {};
      }

      currentConflictId = data.id;
      console.log("Opening YouTube offcanvas for ID:", currentConflictId);
      console.log("All data:", data);
      console.log("Resolution data:", resolutionData);

      // Clear all fields first
      const clearElement = (selector, defaultValue = "-") => {
        const el = youtubeOwnershipOffcanvasEl.querySelector(selector);
        if (el) el.textContent = defaultValue;
      };

      // Album Cover (YouTube red placeholder)
      const albumCover = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeOwnershipAlbumCover"
      );
      if (albumCover) {
        albumCover.src = "https://placehold.co/80x80/FF0000/ffffff?text=YT";
      }

      // Basic Information
      clearElement("#youtubeOwnershipSongName");
      const songNameEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeOwnershipSongName"
      );
      if (songNameEl)
        songNameEl.textContent = data.songName || data.assetTitle || "-";

      clearElement("#youtubeOwnershipArtistName");
      const artistNameEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeOwnershipArtistName"
      );
      if (artistNameEl) artistNameEl.textContent = data.artistName || "-";

      clearElement("#youtubeOwnershipIsrc");
      const isrcEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeOwnershipIsrc"
      );
      if (isrcEl) isrcEl.textContent = `ISRC: ${data.isrc || "N/A"}`;

      clearElement("#youtubeOwnershipPlatform");
      const platformEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeOwnershipPlatform"
      );
      if (platformEl) platformEl.textContent = "YouTube";

      clearElement("#youtubeOwnershipOffcanvasTitle");
      const titleEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeOwnershipOffcanvasTitle"
      );
      if (titleEl)
        titleEl.textContent = `Resolution Details: ${
          data.category || "Unknown"
        }`;

      clearElement("#youtubeOwnershipOffcanvasSubtitle");
      const subtitleEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeOwnershipOffcanvasSubtitle"
      );
      if (subtitleEl)
        subtitleEl.textContent = `VS. ${data.otherParty || "Unknown"}`;

      // Update status badge
      const statusBadgeEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeCurrentStatusBadge"
      );
      if (statusBadgeEl) {
        const badgeHTML = getStatusBadge(data.status || "Unknown");
        const tempDiv = document.createElement("div");
        tempDiv.innerHTML = badgeHTML;
        const badge = tempDiv.firstChild;
        statusBadgeEl.className = badge.className;
        statusBadgeEl.textContent = badge.textContent;
      }

      // Update dropdown and handle rejection section
      const statusDropdown = document.getElementById("youtubeStatusDropdown");
      if (statusDropdown) {
        statusDropdown.value = data.status || "";

        const rejectionMessageSection = document.getElementById(
          "youtubeRejectionMessageSection"
        );
        if (rejectionMessageSection) {
          if (data.status === "Rejected") {
            rejectionMessageSection.classList.remove("d-none");
          } else {
            rejectionMessageSection.classList.add("d-none");
          }
        }
      }

      // Resolution Details
      clearElement("#youtubeResolutionRightsOwned");
      const rightsOwnedEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeResolutionRightsOwned"
      );
      if (rightsOwnedEl) {
        rightsOwnedEl.textContent = resolutionData.rightsOwnedDisplay || "N/A";
      }

      const docInfoEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeSupportingDocumentInfo"
      );
      if (docInfoEl) {
        docInfoEl.innerHTML = resolutionData.supportingDocumentPath
          ? `<a href="${resolutionData.supportingDocumentPath}" target="_blank"><i class="bi bi-file-earmark-text me-2"></i>View Document</a>`
          : `<i class="bi bi-file-earmark-text text-muted me-2"></i>No document uploaded`;
      }

      // Resolution Date
      clearElement("#youtubeResolutionDate");
      const resolutionDateEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeResolutionDate"
      );
      if (resolutionDateEl) {
        const dateToShow =
          resolutionData.resolutionDate || resolutionData.submissionDate || "-";
        resolutionDateEl.textContent = dateToShow;
      }

      // YouTube Specific Details
      clearElement("#youtubeVideoTitle");
      const videoTitleEl =
        youtubeOwnershipOffcanvasEl.querySelector("#youtubeVideoTitle");
      if (videoTitleEl) videoTitleEl.textContent = data.assetTitle || "-";

      clearElement("#youtubeChannelName");
      const channelNameEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeChannelName"
      );
      if (channelNameEl) channelNameEl.textContent = data.artistName || "-";

      clearElement("#youtubeIssueType");
      const issueTypeEl =
        youtubeOwnershipOffcanvasEl.querySelector("#youtubeIssueType");
      if (issueTypeEl) issueTypeEl.textContent = data.issueType || "-";

      clearElement("#youtubeDurationSeconds");
      const durationSecondsEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeDurationSeconds"
      );
      if (durationSecondsEl)
        durationSecondsEl.textContent = data.durationSeconds || "0";

      clearElement("#youtubeDurationPercentageReference");
      const durationRefEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeDurationPercentageReference"
      );
      if (durationRefEl)
        durationRefEl.textContent = data.durationPercentageReference || "0";

      clearElement("#youtubeDurationPercentageVideo");
      const durationVideoEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeDurationPercentageVideo"
      );
      if (durationVideoEl)
        durationVideoEl.textContent = data.durationPercentageVideo || "0";

      // Handle Rejection case
      const rejectionSection = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeRejectionDisplaySection"
      );
      const rejectionMessageEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeRejectionDisplayMessage"
      );
      const rejectionDateEl = youtubeOwnershipOffcanvasEl.querySelector(
        "#youtubeRejectionDate"
      );

      if (data.status === "Rejected") {
        if (rejectionSection) rejectionSection.classList.remove("d-none");
        if (rejectionMessageEl) {
          rejectionMessageEl.textContent =
            resolutionData.rejectionMessage || "No rejection message provided.";
        }
        if (rejectionDateEl) {
          rejectionDateEl.textContent =
            resolutionData.resolutionDate ||
            resolutionData.submissionDate ||
            "-";
        }
      } else {
        if (rejectionSection) rejectionSection.classList.add("d-none");
      }

      // Clear the rejection message input field
      const rejectionMessageInput = document.getElementById(
        "youtubeRejectionMessage"
      );
      if (rejectionMessageInput) {
        rejectionMessageInput.value = "";
      }
    }
  );

  // --- Update Status Handling ---
  const updateBtn = document.getElementById("youtubeUpdateStatusBtn");
  const statusDropdown = document.getElementById("youtubeStatusDropdown");
  const rejectionMessageSection = document.getElementById(
    "youtubeRejectionMessageSection"
  );

  if (statusDropdown && updateBtn) {
    statusDropdown.addEventListener("change", () => {
      if (statusDropdown.value === "Rejected") {
        rejectionMessageSection?.classList.remove("d-none");
      } else {
        rejectionMessageSection?.classList.add("d-none");
      }
    });

    updateBtn.addEventListener("click", () => {
      const selectedStatus = statusDropdown.value;
      const rejectionMessage =
        document.getElementById("youtubeRejectionMessage")?.value || "";

      if (!currentConflictId) {
        alert("Conflict ID not found!");
        return;
      }

      fetch(`/youtube-ownership/update/${currentConflictId}`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          status: selectedStatus,
          rejectionMessage: rejectionMessage,
        }),
      })
        .then((res) => res.json())
        .then((json) => {
          if (json.status === "success") {
            alert("Status updated successfully.");

            // Update dataset + table cell immediately
            const row = document.querySelector(
              `[data-id="${currentConflictId}"]`
            );
            if (row) {
              row.dataset.status = selectedStatus;
              const statusCell = row.querySelector(".status-cell");
              if (statusCell) {
                statusCell.innerHTML = getStatusBadge(selectedStatus);
              }
            }

            // Reflect in dropdown immediately
            statusDropdown.value = selectedStatus;

            // Update current status badge in offcanvas
            const statusBadgeEl = youtubeOwnershipOffcanvasEl.querySelector(
              "#youtubeCurrentStatusBadge"
            );
            if (statusBadgeEl) {
              const badgeHTML = getStatusBadge(selectedStatus);
              const tempDiv = document.createElement("div");
              tempDiv.innerHTML = badgeHTML;
              const badge = tempDiv.firstChild;
              statusBadgeEl.className = badge.className;
              statusBadgeEl.textContent = badge.textContent;
            }
          } else {
            alert("Error: " + json.message);
          }
        })
        .catch((err) => {
          console.error("Update request failed:", err);
          alert("An error occurred while updating.");
        });
    });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Check if we're on the YouTube ownership page
  const isYouTubePage = document.querySelector(".admin-youtube-ownership-page");

  if (!isYouTubePage) {
    console.log("Not on YouTube ownership page, skipping initialization");
    return;
  }

  console.log("Loading YouTube ownership data...");

  fetch("/youtube-ownership/list")
    .then((res) => {
      if (!res.ok) {
        throw new Error(`HTTP error! status: ${res.status}`);
      }
      return res.json();
    })
    .then((json) => {
      console.log("Fetched YouTube data:", json);

      if (!json.data) {
        console.warn("No data property in response");
        return;
      }

      initializeYouTubeOwnershipPage({
        pageSelector: ".admin-youtube-ownership-page", // Updated selector
        youtubeData: json.data,
      });
    })
    .catch((error) => {
      console.error("Error fetching YouTube data:", error);

      // Show error in table
      const tableBody = document.querySelector(".youtube-data-body");
      if (tableBody) {
        tableBody.innerHTML = `
          <tr>
            <td colspan="10" class="text-center text-danger">
              <i class="bi bi-exclamation-triangle"></i> 
              Error loading data: ${error.message}
            </td>
          </tr>
        `;
      }
    });
});

// claim-data-page js
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
    console.error("DataTable element #claimDatatable not found");
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
      const res = await fetch("/api/claiming-data");
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
      const res = await fetch(`/api/claiming-data/${id}/status`, {
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
        // Action column (ONLY View button - no video buttons)[67]
        {
          data: null,
          className: "text-center",
          orderable: false,
          searchable: false,
          width: "120px",
          render: (data, type, row) => {
            if (type === "display") {
              // Show number of videos as badge next to View button
              const videoCount = Array.isArray(row.videoLinks)
                ? row.videoLinks.length
                : 0;
              const videoBadge =
                videoCount > 0
                  ? `<span class="badge bg-secondary ms-1">${videoCount}</span>`
                  : "";

              return `
                <button class="btn btn-sm btn-primary view-btn" data-id="${row.id}">
                  <i class="bi bi-eye me-1"></i>View${videoBadge}
                </button>
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

  // Modal Open - UPDATED TO SHOW VIDEO LINKS[66]
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

    // Display video links in the modal
    const videoLinksContainer = document.getElementById("videoLinksContainer");
    if (videoLinksContainer) {
      if (Array.isArray(r.videoLinks) && r.videoLinks.length > 0) {
        let videoLinksHtml = "";
        r.videoLinks.forEach((url, index) => {
          if (url && url !== "N/A" && url !== "") {
            videoLinksHtml += `
              <div class="mb-2">
                <a href="${url}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
                  <i class="bi bi-play-circle me-1"></i>Video ${index + 1}
                </a>
                <small class="text-muted">${url}</small>
              </div>
            `;
          }
        });
        videoLinksContainer.innerHTML =
          videoLinksHtml ||
          '<p class="text-muted">No video links available</p>';
      } else {
        videoLinksContainer.innerHTML =
          '<p class="text-muted">No video links available</p>';
      }
    }

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
    window.location.href = "/claiming-data/export-csv";
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
      ajax: { url: "/merge-data/list", dataSrc: "data" },
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
          table
            .column(5)
            .search("^" + filter + "$", true, false)
            .draw();
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
          const response = await fetch(`/merge-data/detail/${id}`);
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
        await fetch(`/merge-data/update-status/${id}`, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ status: "approved" }),
        });
        table.ajax.reload();
        mergeModal.hide();
      });

    document.getElementById("rejectBtn").addEventListener("click", async () => {
      const id = mergeModalEl.dataset.currentId;
      await fetch(`/merge-data/update-status/${id}`, {
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
  const relocationPageContainer = document.querySelector(
    ".admin-reloc-data-page"
  );
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
    return `<i data-feather="${icons[s] || "help-circle"}" class="${
      colors[s] || "text-muted"
    }"></i>`;
  };

  const getStatusBadge = (status) => {
    console.log("getStatusBadge called with:", status, "Type:", typeof status); // Debug

    // Handle null, undefined, or empty status
    if (!status || status === null || status === undefined) {
      status = "pending"; // Default fallback
    }

    const s = String(status).trim().toLowerCase(); // Convert to string first, then normalize
    console.log("Normalized status:", s); // Debug

    const cls =
      {
        approved: "status-approved",
        pending: "status-pending",
        rejected: "status-rejected",
      }[s] || "bg-secondary";

    const displayText = s ? s.toUpperCase() : "PENDING";

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
      const modal = new bootstrap.Modal(
        document.getElementById("releaseModal")
      );

      const response = await fetch(`/api/relocation-data/${id}`);
      const result = await response.json();

      if (!result.success) {
        throw new Error(result.error || "Failed to fetch data");
      }

      const data = result.data;
      console.log("Modal data:", data);
      console.log("Status from API:", data.status); // Debug specific status

      populateModal(data);
      modal.show();
      document
        .getElementById("releaseModal")
        .setAttribute("data-current-id", id);
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
    document.getElementById("releaseArtistHeader").textContent =
      data.artist || "-";
    document.getElementById("modal-isrc").textContent = data.isrc || "-";

    // Status - Fixed with better error handling
    document.getElementById("releaseStatusBadges").textContent =
      data.status || "-";

    // Instagram Audio Link
    const instaAudio = document.getElementById("modal-instagramAudio");
    if (instaAudio) {
      instaAudio.innerHTML =
        data.instagramAudio &&
        data.instagramAudio !== "N/A" &&
        data.instagramAudio !== ""
          ? `<a href="${data.instagramAudio}" target="_blank" class="text-primary">${data.instagramAudio}</a>`
          : "-";
    }

    // Instagram Link
    const instaLink = document.getElementById("modal-instagramLink");
    if (instaLink) {
      instaLink.innerHTML =
        data.instagramLink &&
        data.instagramLink !== "N/A" &&
        data.instagramLink !== ""
          ? `<a href="${data.instagramLink}" target="_blank" class="text-primary">${data.instagramLink}</a>`
          : "-";
    }

    // Facebook Link
    const fbLink = document.getElementById("modal-facebookLink");
    if (fbLink) {
      fbLink.innerHTML =
        data.facebookLink &&
        data.facebookLink !== "N/A" &&
        data.facebookLink !== ""
          ? `<a href="${data.facebookLink}" target="_blank" class="text-primary">${data.facebookLink}</a>`
          : "-";
    }

    // Update approve/reject buttons
    updateButtonStates(data.status || "pending");
  };

  const updateButtonStates = (status) => {
    const approveBtn = document.getElementById("approveBtn");
    const rejectBtn = document.getElementById("rejectBtn");

    if (!approveBtn || !rejectBtn) {
      console.error("Approve or Reject button not found!");
      return;
    }

    const normalizedStatus = String(status || "pending").toLowerCase();
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

      const response = await fetch(`/api/relocation-data/${id}/status`, {
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
      url: "/api/relocation-data",
      dataSrc: "data",
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
              <a href="#" class="view-details-link fw-semibold" data-id="${
                row.id
              }">${row.songName || "Unknown Song"}</a>
            </div>
            <div class="text-muted small mt-1">${
              row.artist || "Unknown Artist"
            }</div>
          </div>`,
      },
      {
        data: "isrc",
        defaultContent: "N/A",
        width: "120px",
        className: "text-center",
      },
      {
        data: null,
        className: "text-center",
        orderable: false,
        width: "120px",
        render: (data, type, row) => {
          const links = [];
          if (
            row.instagramAudio &&
            row.instagramAudio !== "N/A" &&
            row.instagramAudio !== ""
          ) {
            links.push(
              `<a href="${row.instagramAudio}" target="_blank" class="link-icon me-1" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i></a>`
            );
          }
          if (
            row.instagramLink &&
            row.instagramLink !== "N/A" &&
            row.instagramLink !== ""
          ) {
            links.push(
              `<a href="${row.instagramLink}" target="_blank" class="link-icon me-1" title="Instagram"><i class="bi bi-instagram"></i></a>`
            );
          }
          if (
            row.facebookLink &&
            row.facebookLink !== "N/A" &&
            row.facebookLink !== ""
          ) {
            links.push(
              `<a href="${row.facebookLink}" target="_blank" class="link-icon me-1" title="Facebook"><i class="bi bi-facebook"></i></a>`
            );
          }
          return links.length > 0
            ? links.join("")
            : '<span class="text-muted">-</span>';
        },
      },
      {
        data: "status",
        className: "text-center",
        width: "120px",
        render: (data) =>
          `<div class="d-flex justify-content-center">${getStatusBadge(
            data
          )}</div>`,
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
  $("#relocationdataDatatable tbody").on(
    "click",
    ".view-details-link",
    function (e) {
      e.preventDefault();
      const id = parseInt($(this).data("id"), 10);
      openModal(id);
    }
  );

  document.getElementById("approveBtn").addEventListener("click", function () {
    const id = document
      .getElementById("releaseModal")
      .getAttribute("data-current-id");
    if (id && !this.disabled) updateStatus(parseInt(id), "approved");
  });

  document.getElementById("rejectBtn").addEventListener("click", function () {
    const id = document
      .getElementById("releaseModal")
      .getAttribute("data-current-id");
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
      window.location.href = "/api/relocation-data/export";
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
        takedown_requested: "bi-clock-history text-secondary", // New status
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
        url: "/releases", // adjust route as needed
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
              row.status_numeric == 3 ||
              row.status_numeric == 2 ||
              row.status_numeric == 6
                ? `/releases/view/${row.id}`
                : `/releases/edit/${row.id}`;

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
    ajax: "/api/artists", // backend route returning JSON
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
                <img src="${row.profile_image}" alt="${row.name}" 
                     class="artist-image me-2 rounded-circle" 
                     style="width:40px; height:40px; object-fit:cover;">
                <div class="artist-name fw-bold">${row.name}</div>
            </div>
          `;
        },
      },
      {
        data: "release_count",
        className: "text-center",
        render: function (d) {
          return d ? `<span class="badge bg-primary">${d}</span>` : "-";
        },
      },
      {
        data: "spotify_id",
        className: "text-center",
        render: function (d) {
          return d
            ? `<a href="https://open.spotify.com/artist/${d}" target="_blank">${d}</a>`
            : "-";
        },
      },
      {
        data: "apple_id",
        className: "text-center",
        render: function (d) {
          return d
            ? `<a href="https://music.apple.com/artist/${d}" target="_blank">${d}</a>`
            : "-";
        },
      },
    ],
    paging: true,
    searching: true,
    ordering: true,
    responsive: true,
    autoWidth: false,

    drawCallback: function () {
      $(".artist-checkbox")
        .off("change")
        .on("change", function () {
          let selected = $(".artist-checkbox:checked").length;
          $("#deleteSelectedBtn").toggle(selected > 0);
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
    dropdown
      .show()
      .html(
        '<div class="dropdown-item text-center"><small class="text-muted">Searching...</small></div>'
      );

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
              let image =
                artist.image || "https://via.placeholder.com/40x40?text=🎵";
              let followers =
                artist.followers > 0
                  ? `${artist.followers.toLocaleString()} followers`
                  : "No followers data";
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
            dropdown.html(
              '<div class="dropdown-item text-center text-muted">No artists found</div>'
            );
          }
        },
        error: function () {
          dropdown.html(
            '<div class="dropdown-item text-center text-danger">Search failed</div>'
          );
        },
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
    dropdown
      .show()
      .html(
        '<div class="dropdown-item text-center"><small class="text-muted">Searching Apple Music...</small></div>'
      );

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
              let image =
                artist.image || "data:image/svg+xml;base64,PHN2ZyB4bWxucz0...";
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
            dropdown.html(
              '<div class="dropdown-item text-center text-muted">No artists found</div>'
            );
          }
        },
        error: function () {
          dropdown.html(
            '<div class="dropdown-item text-center text-danger">Search failed</div>'
          );
        },
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
    // e.preventDefault();

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
          if (typeof window.reloadArtists === "function") {
            window.reloadArtists(); // Add this line
          }
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
        $('button[type="submit"]')
          .prop("disabled", false)
          .text("Create Artist");
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
    ajax: "/api/labels",
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
            <div class="label-profile d-flex align-items-center">
              <img src="${data.logo}" alt="${data.name}" class="label-image me-2 rounded" style="width: 40px; height: 40px; object-fit: cover;">
              <div>
                <div class="label-name fw-bold">${data.name}</div>
              </div>
            </div>
          `;
        },
      },
      {
        data: "release_count",
        className: "text-center",
        render: function (data) {
          return `<span class="releases-badge badge">${data} releases</span>`;
        },
      },
      {
        data: "status_text",
        className: "text-center",
        render: function (data, type, row) {
          return `<span class="badge bg-${row.status_class}">${data}</span>`;
        },
      },
      {
        data: "actions",
        className: "text-center",
        orderable: false,
        render: function (data) {
          return data || "";
        },
      },
    ],
    paging: true,
    searching: true,
    ordering: true,
    responsive: true,
    autoWidth: false,
    drawCallback: function () {
      // Re-initialize feather icons after table redraw
      if (typeof feather !== "undefined") {
        feather.replace();
      }
    },
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
  // Show alert helper
  function showLabelAlert(type, message) {
    let alertHtml = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>`;
    $("#labelAlertBox").html(alertHtml);
  }

  // Form submission
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
      beforeSend: function () {
        $('button[type="submit"]').prop("disabled", true).text("Submitting...");
      },
      success: function (res) {
        if (res.success) {
          showLabelAlert("success", res.message);
          $('form[action*="create-label"]')[0].reset();
          $("#imagePreview").hide();

          // Reload table after successful creation
          if (typeof window.reloadLabels === "function") {
            window.reloadLabels();
          }

          // Auto-close modal after 2 seconds
          setTimeout(() => {
            $("#createlabelModal").modal("hide");
          }, 2000);
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
      complete: function () {
        $('button[type="submit"]')
          .prop("disabled", false)
          .text("Submit Request");
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

// Global function to update label status (called from action buttons)
function updateLabelStatus(labelId, status) {
  const statusText = {
    1: "In Review",
    2: "Approved",
    3: "Rejected",
  };

  const statusIcons = {
    1: "🔄",
    2: "✅",
    3: "❌",
  };

  if (
    confirm(
      `${statusIcons[status]} Are you sure you want to change the status to "${statusText[status]}"?`
    )
  ) {
    $.ajax({
      url: "/labels/update-status",
      type: "POST",
      data: {
        label_id: labelId,
        status: status,
      },
      beforeSend: function () {
        // Disable all action buttons temporarily
        $(`button[onclick*="${labelId}"]`).prop("disabled", true);
      },
      success: function (response) {
        if (response.success) {
          // Show success message
          showGlobalAlert("success", response.message);

          // Reload the table
          if (typeof window.reloadLabels === "function") {
            window.reloadLabels();
          }
        } else {
          showGlobalAlert(
            "danger",
            response.message || "Failed to update status"
          );
        }
      },
      error: function (xhr) {
        let errorMsg = "An error occurred while updating the status";
        if (xhr.responseJSON && xhr.responseJSON.message) {
          errorMsg = xhr.responseJSON.message;
        }
        showGlobalAlert("danger", errorMsg);
      },
      complete: function () {
        // Re-enable action buttons
        $(`button[onclick*="${labelId}"]`).prop("disabled", false);
      },
    });
  }
}

// Global alert function
function showGlobalAlert(type, message) {
  const alertHtml = `
    <div class="alert alert-${type} alert-dismissible fade show position-fixed" 
         style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;" role="alert">
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;

  $("body").append(alertHtml);

  // Auto-dismiss after 5 seconds
  setTimeout(() => {
    $(".alert").alert("close");
  }, 5000);
}

// accounts-page js

document.addEventListener("DOMContentLoaded", function () {
  // Initials avatar generator function
  function generateInitialsAvatar(fullName, size = 40) {
    if (!fullName) return "";

    // Extract initials from full name
    function getInitials(name) {
      const names = name.trim().split(" ");
      if (names.length === 1) {
        return names[0].charAt(0).toUpperCase();
      } else if (names.length >= 2) {
        return (
          names[0].charAt(0) + names[names.length - 1].charAt(0)
        ).toUpperCase();
      }
      return "U";
    }

    // Generate background color based on name
    function getColorFromName(name) {
      const colors = [
        "#007bff",
        "#6f42c1",
        "#e83e8c",
        "#dc3545",
        "#fd7e14",
        "#ffc107",
        "#28a745",
        "#20c997",
        "#17a2b8",
        "#6c757d",
        "#343a40",
        "#8b5cf6",
        "#06b6d4",
        "#10b981",
        "#f59e0b",
      ];

      let hash = 0;
      for (let i = 0; i < name.length; i++) {
        hash = name.charCodeAt(i) + ((hash << 5) - hash);
      }

      return colors[Math.abs(hash) % colors.length];
    }

    // Get contrasting text color
    function getContrastColor(backgroundColor) {
      const hex = backgroundColor.replace("#", "");
      const r = parseInt(hex.substr(0, 2), 16);
      const g = parseInt(hex.substr(2, 2), 16);
      const b = parseInt(hex.substr(4, 2), 16);

      const brightness = (r * 299 + g * 587 + b * 114) / 1000;
      return brightness > 155 ? "#000000" : "#ffffff";
    }

    const initials = getInitials(fullName);
    const backgroundColor = getColorFromName(fullName);
    const textColor = getContrastColor(backgroundColor);

    return `
            <div class="avatar-initials d-flex align-items-center justify-content-center rounded-circle" 
                 style="background-color: ${backgroundColor}; 
                        color: ${textColor}; 
                        width: ${size}px; 
                        height: ${size}px; 
                        font-size: ${size * 0.4}px; 
                        font-weight: 600; 
                        margin: 0 auto;">
                ${initials}
            </div>
        `;
  }

  $("#userTable").DataTable({
    destroy: true,
    processing: true,
    serverSide: false,
    ajax: "/api/accounts",
    columns: [
      // NEW: Avatar column with initials
      {
        data: null, // Use null since we're combining multiple fields
        render: function (data, type, row) {
          if (type === "display") {
            // Combine name fields or use available name field
            const fullName =
              row.name ||
              row.company_name ||
              row.primary_label_name ||
              "Unknown";
            return generateInitialsAvatar(fullName, 40);
          }
          return ""; // For sorting/filtering, return empty
        },
        className: "text-center",
        orderable: false,
        searchable: false,
        width: "60px",
        title: "Avatar",
      },
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
        title: "Status Icon",
      },
      {
        data: "company_name",
        title: "Company Name",
      },
      {
        data: "primary_label_name",
        title: "Primary Label",
      },
      {
        data: "agreement_start_date",
        title: "Start Date",
      },
      {
        data: "agreement_end_date",
        title: "End Date",
      },
      {
        data: "status",
        render: function (data) {
          let badge =
            data === "Active"
              ? '<span class="badge bg-success">Active</span>'
              : '<span class="badge bg-danger">Inactive</span>';
          return badge;
        },
        title: "Status",
      },
      // Action column
      {
        data: null,
        render: function (data, type, row) {
          return `<button class="btn btn-sm btn-primary view-user-btn" 
                                    data-user-id="${row.id}" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#userDetailsModal">
                                <i data-feather="eye"></i> View
                            </button>`;
        },
        orderable: false,
        searchable: false,
        className: "text-center",
        title: "Actions",
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
    responsive: true,
    // Optional: Auto width for better column distribution
    autoWidth: false,
    // Column widths
    columnDefs: [
      { width: "60px", targets: 0 }, // Avatar column
      { width: "80px", targets: 1 }, // Status icon column
      { width: "100px", targets: 6 }, // Status badge column
      { width: "120px", targets: 7 }, // Actions column
    ],
  });

  // Also initialize the profile page avatar if it exists
  const profileAvatar = document.getElementById("initialsAvatarProfilePage");
  if (profileAvatar) {
    // You can get the name from PHP or a data attribute
    const userName = profileAvatar.dataset.userName || "Vishesh Mittal"; // Default or from PHP
    generateProfilePageAvatar(userName);
  }
});

// Function for profile page avatar (larger size)
function generateProfilePageAvatar(
  fullName,
  targetId = "initialsAvatarProfilePage"
) {
  function getInitials(name) {
    if (!name) return "U";
    const names = name.trim().split(" ");
    if (names.length === 1) {
      return names[0].charAt(0).toUpperCase();
    } else if (names.length >= 2) {
      return (
        names[0].charAt(0) + names[names.length - 1].charAt(0)
      ).toUpperCase();
    }
    return "U";
  }

  function getColorFromName(name) {
    const colors = [
      "#007bff",
      "#6f42c1",
      "#e83e8c",
      "#dc3545",
      "#fd7e14",
      "#ffc107",
      "#28a745",
      "#20c997",
      "#17a2b8",
      "#6c757d",
    ];

    let hash = 0;
    for (let i = 0; i < name.length; i++) {
      hash = name.charCodeAt(i) + ((hash << 5) - hash);
    }

    return colors[Math.abs(hash) % colors.length];
  }

  function getContrastColor(backgroundColor) {
    const hex = backgroundColor.replace("#", "");
    const r = parseInt(hex.substr(0, 2), 16);
    const g = parseInt(hex.substr(2, 2), 16);
    const b = parseInt(hex.substr(4, 2), 16);

    const brightness = (r * 299 + g * 587 + b * 114) / 1000;
    return brightness > 155 ? "#000000" : "#ffffff";
  }

  const initials = getInitials(fullName);
  const backgroundColor = getColorFromName(fullName);
  const textColor = getContrastColor(backgroundColor);

  const avatarElement = document.getElementById(targetId);
  if (avatarElement) {
    avatarElement.textContent = initials;
    avatarElement.style.backgroundColor = backgroundColor;
    avatarElement.style.color = textColor;
  }
}

// NEW: Handle view user button click
$(document).on("click", ".view-user-btn", function () {
  const userId = $(this).data("user-id");
  loadUserDetails(userId);
});

// NEW: Load user details in modal
function loadUserDetails(userId) {
  $.ajax({
    url: `/users/details/${userId}`,
    method: "GET",
    dataType: "json",
    beforeSend: function () {
      $("#userDetailsContent").html(
        '<div class="text-center"><div class="spinner-border" role="status"></div></div>'
      );
    },
    success: function (response) {
      if (response.status === "success") {
        displayUserDetails(response.user);
        // Store user ID for edit button
        $("#editUserBtn").data("user-id", userId);
      } else {
        $("#userDetailsContent").html(
          '<div class="alert alert-danger">Failed to load user details.</div>'
        );
      }
    },
    error: function () {
      $("#userDetailsContent").html(
        '<div class="alert alert-danger">Error loading user details.</div>'
      );
    },
  });
}

// NEW: Display user details in modal
function displayUserDetails(user) {
  const isActive = user.status === "Active";
  const statusBadge = isActive
    ? '<span class="badge bg-success">Active</span>'
    : '<span class="badge bg-danger">Inactive</span>';

  const content = `
        <div class="row">
            <div class="col-md-6">
                <h6 class="text-uppercase fs-13">Full Name</h6>
                <p class="fs-14 mb-3">${user.name}</p>
            </div>
            <div class="col-md-6">
                <h6 class="text-uppercase fs-13">Company Name</h6>
                <p class="fs-14 mb-3">${user.company_name}</p>
            </div>
            <div class="col-md-6">
                <h6 class="text-uppercase fs-13">Primary Label Name</h6>
                <p class="fs-14 mb-3">${user.primary_label_name}</p>
            </div>
            <div class="col-md-6">
                <h6 class="text-uppercase fs-13">Email Address</h6>
                <p class="fs-14 mb-3"><a href="mailto:${user.email}" class="text-primary">${user.email}</a></p>
            </div>
            <div class="col-md-6">
                <h6 class="text-uppercase fs-13">Phone Number</h6>
                <p class="fs-14 mb-3">${user.phone}</p>
            </div>
            <div class="col-md-6">
                <h6 class="text-uppercase fs-13">Role</h6>
                <p class="fs-14 mb-3"><span class="badge bg-light text-dark">${user.role_name}</span></p>
            </div>
            <div class="col-md-6">
                <h6 class="text-uppercase fs-13">Agreement Start Date</h6>
                <p class="fs-14 mb-3">${user.agreement_start_date}</p>
            </div>
            <div class="col-md-6">
                <h6 class="text-uppercase fs-13">Agreement End Date</h6>
                <p class="fs-14 mb-3">${user.agreement_end_date}</p>
            </div>
            <div class="col-12">
                <h6 class="text-uppercase fs-13">Status</h6>
                <p class="fs-14 mb-3">${statusBadge}</p>
            </div>
        </div>
    `;

  $("#userDetailsContent").html(content);
}

// NEW: Handle edit user button click
$(document).on("click", "#editUserBtn", function () {
  const userId = $(this).data("user-id");
  // Redirect to profile page with user ID
  window.location.href = `/users/edit/${userId}`;
});

$(document).ready(function () {
  $("#claimingRequestForm").on("submit", function (e) {
    // e.preventDefault();

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
  const table = $("#claimingRequestTableBody").DataTable({
    destroy: true,
    ajax: "/api/claiming-req",
    columns: [
      {
        data: "status",
        render: function (data) {
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
          const badgeClasses = {
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
      {
        data: null,
        render: function (data) {
          return `
            <div class="text-center">
              <button type="button"
                class="btn btn-sm btn-outline-primary view-details-btn"
                data-bs-toggle="modal"
                data-bs-target="#claimingDetailsModal"
                data-title="${data.title}"
                data-artist="${data.artist}"
                data-isrc="${data.isrc}"
                data-upc="${data.upc}"
                data-status="${data.status}"
                data-reason="${data.removalReason}"
                data-videos='${JSON.stringify(data.videoLinks || [])}'>
                <i data-feather="music"></i> View
              </button>
            </div>`;
        },
        orderable: false,
        className: "text-center",
      },
    ],
    drawCallback: function () {
      feather.replace();

      $(".view-details-btn").on("click", function () {
        const linksContainer = $("#videoLinksContainer");
        const videos = $(this).data("videos");
        const reason = $(this).data("reason");

        $("#viewSongTitle").val($(this).data("title"));
        $("#viewArtistName").val($(this).data("artist"));
        $("#viewISRC").val($(this).data("isrc"));
        $("#viewUPC").val($(this).data("upc"));
        $("#viewStatus").val($(this).data("status"));
        $("#viewRemovalReason").val(reason || "N/A");

        // Populate video/music links
        linksContainer.empty();
        if (videos.length > 0) {
          videos.forEach((link) => {
            linksContainer.append(`
              <div class="mb-2">
                <a href="${link}" target="_blank" class="text-decoration-none">
                  <i data-feather="link" class="text-primary me-1"></i> ${link}
                </a>
              </div>`);
          });
        } else {
          linksContainer.html(
            `<p class="text-muted">No video links available</p>`
          );
        }

        feather.replace();
      });
    },
  });

  // Reload functionality
  window.reloadClaimingRequests = function () {
    table.ajax.reload(null, false);
  };
});

// relocation-request js

document.addEventListener("DOMContentLoaded", function () {
  const relocReqPageContainer = document.querySelector(".admin-reloc-req-page");
  if (!relocReqPageContainer) return;

  const table = $("#relocationDatatable").DataTable({
    ajax: "/relocation-requests/data",
    destroy: true,
    paging: true,
    searching: true,
    info: true,
    autoWidth: false,
    columns: [
      {
        data: "status",
        className: "text-center",
        render: function (data) {
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
          return `<i data-feather="${icons[data] || "help-circle"}" class="${
            colors[data] || "text-muted"
          }"></i>`;
        },
      },
      {
        data: null,
        render: function (data) {
          return `
            <div>
              <div class="release-title fw-semibold">${
                data.title || "Untitled"
              }</div>
              <div class="release-artist text-muted small">${
                data.artist || "Unknown"
              }</div>
            </div>`;
        },
      },
      { data: "isrc", defaultContent: "N/A" },
      {
        data: null,
        className: "text-center",
        render: function (data) {
          const icons = [];
          if (data.instagram_link)
            icons.push(`<a href="${data.instagram_link}" target="_blank" title="Instagram Profile">
              <i class="bi bi-instagram me-2"></i></a>`);
          if (data.instagram_audio)
            icons.push(`<a href="${data.instagram_audio}" target="_blank" title="Instagram Audio">
              <i class="bi bi-music-note-beamed me-2"></i></a>`);
          if (data.facebook_link)
            icons.push(`<a href="${data.facebook_link}" target="_blank" title="Facebook">
              <i class="bi bi-facebook me-2"></i></a>`);
          return icons.length
            ? icons.join("")
            : `<span class="text-muted">-</span>`;
        },
      },
      {
        data: "status",
        className: "text-center",
        render: function (data) {
          const badges = {
            Approved: "success",
            Pending: "warning",
            Rejected: "danger",
          };
          return `<span class="badge bg-${
            badges[data] || "secondary"
          }">${data}</span>`;
        },
      },
    ],
    drawCallback: function () {
      feather.replace();
    },
  });
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
        url: "/claim-reel-merge/list",
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
            `<div class="release-title">${data}</div>`,
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
        const response = await fetch("/claim-reel-merge/store", {
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
        const response = await fetch("/claim-reel-merge/list");
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

//youtube js for conflict resolution
document.addEventListener("DOMContentLoaded", function () {
  const youtubePageContainer = document.querySelector(".admin-youtube-page");

  if (youtubePageContainer) {
    let conflictRequests = [];
    let sortState = { key: null, direction: "asc" };
    let dataTable; // DataTable instance

    // --- HELPERS ---
    function getStatusBadge(status) {
      let badgeClass = "bg-secondary-subtle text-secondary-emphasis";
      if (status === "Action Required")
        badgeClass = "bg-danger-subtle text-danger-emphasis";
      else if (status === "Approved")
        badgeClass = "bg-success-subtle text-success-emphasis";
      else if (status === "In Review")
        badgeClass = "bg-warning-subtle text-warning-emphasis";
      else if (status === "Rejected")
        badgeClass = "bg-danger-subtle text-danger-emphasis";
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

    function getRightsOwnedLabel(value) {
      switch (value) {
        case "original_exclusive":
          return "My content is Original and I own exclusive rights";
        case "non_exclusive":
          return "I own non-exclusive rights only (license granted by a third party)";
        case "cid_exclusive":
          return "I have granted exclusive license for Content-ID stores only";
        case "soundalike":
          return "It is soundalike recording (e.g., cover or remix)";
        case "public_domain":
          return "It is Public Domain recording";
        case "no_rights":
          return "I don't own rights for the selected content";
        default:
          return value || "";
      }
    }

    // --- RENDER WITH DATATABLES ---
    function initializeDataTable(data) {
      const tableBody = document.getElementById("youtubeTableBody");
      const table = document.getElementById("releasesTable");

      // Destroy existing DataTable if it exists
      if (dataTable) {
        dataTable.destroy();
        dataTable = null;
      }

      // Clear existing data
      tableBody.innerHTML = "";

      // If no data, show empty message and initialize empty DataTable
      if (!data || data.length === 0) {
        tableBody.innerHTML = `<tr><td colspan="10" class="text-center p-5"><h5>No matching conflicts found.</h5></td></tr>`;

        try {
          dataTable = $(table).DataTable({
            searching: true,
            paging: false,
            info: false,
            ordering: false,
            language: {
              emptyTable: "No conflicts available",
              zeroRecords: "No matching conflicts found",
            },
          });
        } catch (error) {
          console.error(
            "DataTable initialization failed in empty-data branch:",
            error
          );
        }

        return;
      }

      // Prepare data array for DataTables
      const tableData = data.map((req) => {
        return [
          '<i class="bi bi-youtube text-danger fs-5"></i>', // Platform icon
          req.category || "",
          req.assetTitle || "",
          `<div class="fw-bold">${
            req.artist || ""
          }</div><small class="text-muted">Asset ID: ${
            req.assetId || ""
          }</small>`,
          req.upc || "",
          req.otherParty || "",
          req.dailyViews || "",
          req.expiry || "",
          getStatusBadge(req.status),
          '<i class="bi bi-chevron-right text-muted"></i>',
        ];
      });

      try {
        dataTable = $(table).DataTable({
          data: tableData,
          searching: true,
          paging: true,
          pageLength: 25,
          lengthChange: true,
          info: true,
          ordering: true,
          responsive: true,
          destroy: true,
          language: {
            search: "Search conflicts:",
            searchPlaceholder: "Type to search...",
            lengthMenu: "Show _MENU_ conflicts per page",
            info: "Showing _START_ to _END_ of _TOTAL_ conflicts",
            infoEmpty: "No conflicts found",
            infoFiltered: "(filtered from _MAX_ total conflicts)",
            emptyTable: "No conflicts available",
            zeroRecords: "No matching conflicts found",
          },
          columnDefs: [
            { orderable: false, targets: [0, 9] },
            { searchable: false, targets: [0, 9] },
            { className: "text-center", targets: [0] },
          ],
          order: [[1, "asc"]],
          dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
          drawCallback: function (settings) {
            const api = this.api();
            const info = api.page.info();
            const paginationTextEl = document.getElementById("pagination-text");
            if (paginationTextEl) {
              paginationTextEl.textContent = `${info.recordsDisplay} of ${info.recordsTotal} results`;
            }

            attachRowClickEvents();
          },
          createdRow: function (row, data, dataIndex) {
            const req = conflictRequests[dataIndex];
            if (req) {
              $(row).attr({
                "data-bs-toggle": "offcanvas",
                "data-bs-target": "#conflictResolutionOffcanvas",
                "data-id": req.id,
                "data-song-name": req.songName || "",
                "data-artist-name": req.artistName || "",
                "data-isrc": req.isrc || "",
                "data-cover-url": req.albumCoverUrl || "",
                "data-category": req.category || "",
                "data-other-party": req.otherParty || "",
                "data-status": req.status || "",
                "data-rejection-message": req.rejectionMessage || "",
                "data-rights-owned": req.rightsOwned || "",
                "data-supporting-file": req.supportingFile || "",
                "data-resolution-data": encodeURIComponent(
                  JSON.stringify(req.resolutionData || {})
                ),
              });
              $(row).css("cursor", "pointer");
            }
          },
        });
      } catch (error) {
        console.error("DataTable initialization failed:", error);
      }
    }

    // Function to attach click events to table rows
    function attachRowClickEvents() {
      $("#releasesTable tbody tr")
        .off("click")
        .on("click", function () {
          // This handles the row click for opening offcanvas
          // The Bootstrap data attributes will handle the rest
        });
    }

    // --- OFFCANVAS ---
    const conflictOffcanvasEl = document.getElementById(
      "conflictResolutionOffcanvas"
    );
    const conflictOffcanvas = new bootstrap.Offcanvas(conflictOffcanvasEl);
    const conflictForm = document.getElementById("youtubeConflictForm");
    const formStep1 = document.getElementById("formStep1");
    const formStep2 = document.getElementById("formStep2");
    const formStepInReview = document.getElementById("formStepInReview");

    // The main form steps - YouTube only has 2 steps + preview (using InReview step)
    const formSteps = [formStep1, formStep2, formStepInReview]; // Step 2 is the InReview step used as preview

    const nextBtn = conflictOffcanvasEl.querySelector("#nextBtn");
    const backBtn = conflictOffcanvasEl.querySelector("#backBtn");
    const submitBtn = conflictOffcanvasEl.querySelector("#submitBtn");
    const closeBtnInReview =
      conflictOffcanvasEl.querySelector("#closeBtnInReview");
    const fileInput = conflictOffcanvasEl.querySelector("#formFile");
    const fileDisplay = conflictOffcanvasEl.querySelector("#selectedFileName");

    let currentStep = 0;
    let activeConflictId = null;
    let currentStatus = "";
    let isReadOnlyMode = false;
    let formSubmitted = false;

    // --- OFFCANVAS CLOSE EVENT LISTENERS FOR PAGE RELOAD ---
    conflictOffcanvasEl.addEventListener(
      "hidden.bs.offcanvas",
      function (event) {
        if (!formSubmitted) {
          console.log("Offcanvas closed - reloading page");
          window.location.reload();
        }
        formSubmitted = false;
      }
    );

    // Add click event to cross button (×) in header
    const closeBtn = conflictOffcanvasEl.querySelector(".btn-close");
    if (closeBtn) {
      closeBtn.addEventListener("click", function () {
        console.log(
          "Cross button clicked - offcanvas will close and page will reload"
        );
      });
    }

    // Add click event to "Close" button in footer
    if (closeBtnInReview) {
      closeBtnInReview.addEventListener("click", function () {
        console.log(
          "Close button clicked - offcanvas will close and page will reload"
        );
      });
    }

    // Create status message dynamically if it doesn't exist
    function createStatusMessage() {
      const existingMsg =
        conflictOffcanvasEl.querySelector("#statusMessageBox");
      if (!existingMsg) {
        const statusMessageHTML = `
          <div id="statusMessageBox" class="alert d-none mb-3">
            <div class="d-flex align-items-center">
              <i id="statusIcon" class="me-3 fs-5"></i>
              <div>
                <div class="fw-bold" id="statusTitle">Status</div>
                <small id="statusMessage" class="text-muted">Message</small>
              </div>
            </div>
          </div>
        `;
        const offcanvasBody =
          conflictOffcanvasEl.querySelector(".offcanvas-body");
        offcanvasBody.insertAdjacentHTML("afterbegin", statusMessageHTML);
      }
    }

    // --- STEP NAVIGATION ---
    function showStep(stepIndex) {
      // Hide all steps
      formSteps.forEach((step, index) => {
        if (step) step.classList.toggle("d-none", index !== stepIndex);
      });

      // Button visibility logic
      if (backBtn)
        backBtn.classList.toggle("d-none", stepIndex === 0 || isReadOnlyMode);
      if (nextBtn)
        nextBtn.classList.toggle("d-none", stepIndex === 2 || isReadOnlyMode); // Step 2 is the final preview step
      if (submitBtn)
        submitBtn.classList.toggle("d-none", stepIndex !== 2 || isReadOnlyMode); // Show submit only on step 2 (preview)
      if (closeBtnInReview)
        closeBtnInReview.classList.toggle("d-none", !isReadOnlyMode);

      currentStep = stepIndex;
    }

    function showStatusMessage(status, message = "") {
      createStatusMessage();

      const statusMessageBox = document.getElementById("statusMessageBox");
      const statusIcon = document.getElementById("statusIcon");
      const statusTitle = document.getElementById("statusTitle");
      const statusMessageText = document.getElementById("statusMessage");

      if (status === "Rejected" && message) {
        statusMessageBox.className =
          "alert alert-danger d-flex align-items-center mb-3";
        statusIcon.className = "bi bi-x-circle-fill me-3 fs-5 text-danger";
        statusTitle.textContent = "Resolution Rejected";
        statusMessageText.textContent = message;
        statusMessageBox.classList.remove("d-none");
      } else {
        statusMessageBox.classList.add("d-none");
      }
    }

    // --- READ-ONLY DISPLAY FOR IN REVIEW/APPROVED ---
    function showReadOnlyDisplay(resolutionData) {
      // Hide all form steps except the In Review step
      formStep1.classList.add("d-none");
      formStep2.classList.add("d-none");
      formStepInReview.classList.remove("d-none");

      // Populate read-only data using existing elements
      const rightsOwnedEl = document.getElementById("resolutionRightsOwned");
      if (rightsOwnedEl) {
        rightsOwnedEl.textContent =
          resolutionData.rightsOwnedDisplay ||
          getRightsOwnedLabel(resolutionData.rightsOwned) ||
          "N/A";
      }

      const supportingDocEl = document.getElementById("supportingDocumentInfo");
      if (supportingDocEl) {
        if (
          resolutionData.supportingDocumentPath ||
          resolutionData.supportingFile
        ) {
          const filePath =
            resolutionData.supportingDocumentPath ||
            resolutionData.supportingFile;
          const fileName = filePath.split("/").pop();
          supportingDocEl.innerHTML = `
            <a href="${filePath}" target="_blank" class="text-decoration-none">
              <i class="bi bi-file-earmark-text me-2"></i>${fileName}
            </a>`;
        } else {
          supportingDocEl.textContent = "No supporting document uploaded";
        }
      }

      const dateEl = document.getElementById("resolutionDate");
      if (dateEl) {
        dateEl.textContent = resolutionData.resolutionDate
          ? new Date(resolutionData.resolutionDate).toLocaleString()
          : "N/A";
      }

      isReadOnlyMode = true;
      // Set button visibility for read-only mode
      if (backBtn) backBtn.classList.add("d-none");
      if (nextBtn) nextBtn.classList.add("d-none");
      if (submitBtn) submitBtn.classList.add("d-none");
      if (closeBtnInReview) closeBtnInReview.classList.remove("d-none");
    }

    function populatePreviewStep() {
      // Use the existing formStepInReview as preview step but populate it with current form data
      const rightsOwned = conflictForm.querySelector(
        'input[name="rightsOwned"]:checked'
      )?.value;
      const rightsOwnedEl = document.getElementById("resolutionRightsOwned");
      if (rightsOwnedEl) {
        rightsOwnedEl.textContent =
          getRightsOwnedLabel(rightsOwned) || "Not selected";
      }

      const supportingDocEl = document.getElementById("supportingDocumentInfo");
      if (supportingDocEl) {
        if (fileInput && fileInput.files.length > 0) {
          supportingDocEl.innerHTML = `<i class="bi bi-file-earmark-text me-2"></i>${fileInput.files[0].name}`;
        } else {
          supportingDocEl.textContent = "No document selected";
        }
      }

      const dateEl = document.getElementById("resolutionDate");
      if (dateEl) {
        dateEl.textContent =
          "Will be submitted: " + new Date().toLocaleString();
      }
    }

    // --- EVENT LISTENERS ---
    if (nextBtn) {
      nextBtn.addEventListener("click", () => {
        if (isReadOnlyMode) return;

        // Step 0: Rights owned check
        if (currentStep === 0) {
          const existingRights = conflictOffcanvasEl.dataset.rightsOwned;
          const radioSelected = conflictForm.querySelector(
            'input[name="rightsOwned"]:checked'
          );

          // For rejected status, always require selection (even if there was previous data)
          if (currentStatus === "Rejected") {
            if (!radioSelected) {
              alert("Please select a rights option.");
              return;
            }
          } else if (existingRights) {
            // For non-rejected status with existing rights, show readonly text and skip validation
            const rightsTextEl = document.getElementById("rightsOwnedText");
            if (rightsTextEl) {
              rightsTextEl.textContent = getRightsOwnedLabel(existingRights);
              rightsTextEl.classList.remove("d-none");
            }
            const rightsOptionsEl =
              document.getElementById("rightsOwnedOptions");
            if (rightsOptionsEl) rightsOptionsEl.classList.add("d-none");
          } else {
            // If no existing rights, enforce validation
            if (!radioSelected) {
              alert("Please select a rights option.");
              return;
            }
          }
        }

        // Step 1: File upload check
        if (currentStep === 1) {
          if (!fileInput.files.length) {
            // For rejected status, file upload is optional if there's a previous file
            if (currentStatus === "Rejected") {
              // Allow proceeding even without new file upload for rejected status
              // The user can choose to keep the existing file or upload a new one
            } else {
              // Check if there's an existing file for non-rejected status
              const existingFile = conflictOffcanvasEl.dataset.supportingFile;
              if (!existingFile) {
                alert("Please upload a supporting document.");
                return;
              }
            }
          }
        }

        // Move to next step if validations passed
        if (currentStep < 2) {
          // Step 2 is the preview step (using formStepInReview)
          if (currentStep === 1) {
            populatePreviewStep(); // Populate preview before showing it
          }
          showStep(currentStep + 1);
        }
      });
    }

    if (backBtn) {
      backBtn.addEventListener("click", () => {
        if (isReadOnlyMode) return;
        if (currentStep > 0) showStep(currentStep - 1);
      });
    }

    // --- OFFCANVAS EVENT HANDLERS ---
    conflictOffcanvasEl.addEventListener("show.bs.offcanvas", function (event) {
      const data = event.relatedTarget.dataset;
      activeConflictId = data.id;
      currentStatus = data.status;
      isReadOnlyMode = false;
      formSubmitted = false;

      // Parse resolution data with better error handling
      let resolutionData = {};
      try {
        if (
          data.resolutionData &&
          data.resolutionData !== "{}" &&
          data.resolutionData !== ""
        ) {
          const decodedData = decodeURIComponent(data.resolutionData);
          resolutionData = JSON.parse(decodedData);
          console.log("Parsed resolution data:", resolutionData);
        }
      } catch (e) {
        console.warn("Failed to parse resolution data:", e);
        console.log("Raw resolution data:", data.resolutionData);
        resolutionData = {};
      }

      // Populate album covers and song info for all steps
      ["", "2", "InReview"].forEach((suffix) => {
        const albumCover = conflictOffcanvasEl.querySelector(
          `#modalAlbumCover${suffix}`
        );
        const songName = conflictOffcanvasEl.querySelector(
          `#modalSongName${suffix}`
        );
        const artistName = conflictOffcanvasEl.querySelector(
          `#modalArtistName${suffix}`
        );
        const isrcEl =
          suffix === "InReview"
            ? conflictOffcanvasEl.querySelector(`#modalIsrcInReview`)
            : null;

        if (albumCover) {
          albumCover.src =
            data.coverUrl || "https://placehold.co/80x80/ff0000/ffffff?text=YT";
        }
        if (songName) songName.textContent = data.songName || "Unknown";
        if (artistName) artistName.textContent = data.artistName || "Unknown";
        if (isrcEl) isrcEl.textContent = `ISRC: ${data.isrc || "N/A"}`;
      });

      // Set ISRC for regular steps
      const modalIsrc = conflictOffcanvasEl.querySelector("#modalIsrc");
      if (modalIsrc) modalIsrc.textContent = `ISRC: ${data.isrc || "N/A"}`;

      // Set title and subtitle
      conflictOffcanvasEl.querySelector("#offcanvasTitle").textContent =
        data.category || "YouTube Conflict";
      conflictOffcanvasEl.querySelector(
        "#offcanvasSubtitle"
      ).textContent = `VS. ${data.otherParty || "Unknown"}`;

      // Handle different status flows
      if (currentStatus === "In Review" || currentStatus === "Approved") {
        showReadOnlyDisplay(resolutionData);
      } else {
        // Action Required or Rejected - show fillable form
        if (currentStatus === "Rejected") {
          showStatusMessage("Rejected", data.rejectionMessage);
        } else {
          showStatusMessage(""); // Hide status message for Action Required
        }

        isReadOnlyMode = false;
        conflictForm.reset();
        conflictOffcanvasEl
          .querySelectorAll(".radio-card")
          .forEach((c) => c.classList.remove("selected"));
        if (fileDisplay) fileDisplay.classList.add("d-none");
        showStep(0);

        // Rights owned logic - FIXED FOR REJECTED STATUS
        const rightsOptions = conflictOffcanvasEl.querySelector(
          "#rightsOwnedOptions"
        );
        const rightsText =
          conflictOffcanvasEl.querySelector("#rightsOwnedText");

        // For REJECTED status, always show the editable form regardless of existing data
        if (currentStatus === "Rejected") {
          if (rightsOptions) rightsOptions.classList.remove("d-none");
          if (rightsText) rightsText.classList.add("d-none");
          delete conflictOffcanvasEl.dataset.rightsOwned;

          // Pre-select the previously submitted rights option if available
          if (data.rightsOwned) {
            const radioInput = conflictForm.querySelector(
              `input[name="rightsOwned"][value="${data.rightsOwned}"]`
            );
            if (radioInput) {
              radioInput.checked = true;
              radioInput.closest(".radio-card").classList.add("selected");
            }
          }
        } else if (data.rightsOwned) {
          // For non-rejected statuses with existing rights, show readonly
          if (rightsOptions) rightsOptions.classList.add("d-none");
          if (rightsText) {
            rightsText.textContent = getRightsOwnedLabel(data.rightsOwned);
            rightsText.classList.remove("d-none");
          }
          conflictOffcanvasEl.dataset.rightsOwned = data.rightsOwned;
        } else {
          // For Action Required without existing rights, show editable
          if (rightsOptions) rightsOptions.classList.remove("d-none");
          if (rightsText) rightsText.classList.add("d-none");
          delete conflictOffcanvasEl.dataset.rightsOwned;
        }

        // File logic - FIXED FOR REJECTED STATUS
        const fileUploadContainer = conflictOffcanvasEl.querySelector(
          "#fileUploadContainer"
        );
        const fileLinkBox = conflictOffcanvasEl.querySelector("#fileLinkBox");

        // For REJECTED status, always show file upload container (allow re-upload)
        if (currentStatus === "Rejected") {
          if (fileUploadContainer)
            fileUploadContainer.classList.remove("d-none");
          if (fileLinkBox) {
            if (data.supportingFile) {
              fileLinkBox.innerHTML = `
                <div class="alert alert-info p-2 mb-2">
                  <small><strong>Previously uploaded:</strong> 
                  <a href="${data.supportingFile}" target="_blank" class="text-decoration-none">
                    <i class="bi bi-file-earmark-text me-1"></i>View Document
                  </a></small>
                </div>`;
              fileLinkBox.classList.remove("d-none");
            } else {
              fileLinkBox.classList.add("d-none");
            }
          }
          delete conflictOffcanvasEl.dataset.supportingFile;
        } else if (data.supportingFile) {
          // For non-rejected statuses with existing file, show link only
          if (fileUploadContainer) fileUploadContainer.classList.add("d-none");
          if (fileDisplay) fileDisplay.classList.add("d-none");
          if (fileLinkBox) {
            fileLinkBox.innerHTML = `<a href="${data.supportingFile}" target="_blank" class="btn btn-outline-primary btn-sm">View Supporting Document</a>`;
            fileLinkBox.classList.remove("d-none");
          }
          conflictOffcanvasEl.dataset.supportingFile = data.supportingFile;
        } else {
          // For Action Required without existing file, show upload
          if (fileUploadContainer)
            fileUploadContainer.classList.remove("d-none");
          if (fileLinkBox) fileLinkBox.classList.add("d-none");
          delete conflictOffcanvasEl.dataset.supportingFile;
        }
      }
    });

    // --- FORM SUBMISSION ---
    if (conflictForm) {
      conflictForm.addEventListener("submit", function (e) {
        e.preventDefault();
        if (isReadOnlyMode) return;

        if (!activeConflictId) {
          return alert("Error: Conflict ID missing.");
        }

        const formData = new FormData(conflictForm);
        if (fileInput && fileInput.files.length > 0) {
          formData.append("file", fileInput.files[0]);
        }

        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML =
          '<i class="spinner-border spinner-border-sm me-1"></i>Submitting...';
        submitBtn.disabled = true;
        formSubmitted = true;

        fetch(`/youtube-conflicts/update/${activeConflictId}`, {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
          .then((data) => {
            if (data.status === "success") {
              alert("Resolution saved successfully!");
              conflictOffcanvas.hide();
              setTimeout(() => {
                window.location.reload();
              }, 100);
            } else {
              alert("Update failed: " + data.message);
              formSubmitted = false;
            }
          })
          .catch((err) => {
            console.error("Update error:", err);
            alert("Update failed. Try again.");
            formSubmitted = false;
          })
          .finally(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
          });
      });
    }

    // --- FILE UPLOAD HANDLERS ---
    const fileUploadContainer = conflictOffcanvasEl.querySelector(
      "#fileUploadContainer"
    );
    if (fileUploadContainer) {
      fileUploadContainer.addEventListener("click", () => {
        if (!isReadOnlyMode && fileInput) fileInput.click();
      });
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

    // --- RADIO CARD INTERACTIONS ---
    conflictOffcanvasEl.addEventListener("click", function (e) {
      if (isReadOnlyMode) return;

      if (e.target.closest(".radio-card")) {
        const card = e.target.closest(".radio-card");
        conflictOffcanvasEl
          .querySelectorAll(".radio-card")
          .forEach((c) => c.classList.remove("selected"));
        card.classList.add("selected");
        const radioInput = card.querySelector('input[type="radio"]');
        if (radioInput) radioInput.checked = true;
      }
    });

    // --- DATA LOADING ---
    function loadConflictsData() {
      fetch("/youtube-conflicts/json")
        .then((response) => response.json())
        .then((result) => {
          conflictRequests = result.data || [];
          console.log("Loaded conflicts:", conflictRequests); // Debug log
          initializeDataTable(conflictRequests); // Use DataTable instead of custom render
        })
        .catch((error) => {
          console.error("Error loading conflicts data:", error);
          conflictRequests = [];
          initializeDataTable([]); // Use DataTable instead of custom render
        });
    }

    // INITIALIZATION
    loadConflictsData();
  }
});

// Import functionality remains the same
document.addEventListener("DOMContentLoaded", function () {
  const importBtn = document.getElementById("importYoutubeCsv");

  if (importBtn) {
    importBtn.addEventListener("click", function () {
      const fileInput = document.createElement("input");
      fileInput.type = "file";
      fileInput.accept = ".csv";
      fileInput.style.display = "none";

      fileInput.addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append("file", file);

        const originalText = importBtn.innerHTML;
        importBtn.innerHTML =
          '<i class="spinner-border spinner-border-sm me-1"></i>Importing...';
        importBtn.disabled = true;

        fetch("/youtube-conflicts/import", {
          method: "POST",
          body: formData,
        })
          .then((res) => res.json())
          .then((data) => {
            if (data.status === "success") {
              alert(
                `Import successful!\nProcessed: ${data.processed_rows}\nInserted: ${data.inserted_rows}`
              );
              location.reload();
            } else {
              alert("Import failed: " + data.message);
            }
          })
          .catch((err) => {
            console.error("Import error:", err);
            alert("Import failed. Please try again.");
          })
          .finally(() => {
            importBtn.innerHTML = originalText;
            importBtn.disabled = false;
            document.body.removeChild(fileInput);
          });
      });

      document.body.appendChild(fileInput);
      fileInput.click();
    });
  }
});

// facebook-page js
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const facebookPageContainer = document.querySelector(".admin-facebook-page");

  if (facebookPageContainer) {
    // --- DOM ELEMENTS ---
    const table = $("#facebookDatatable");
    let dataTableInstance = null;

    // --- HELPER & PARSING FUNCTIONS ---
    const getStatusBadge = (status) => {
      let badgeClass = "bg-secondary-subtle text-secondary-emphasis";
      if (status === "Action Required")
        badgeClass = "bg-danger-subtle text-danger-emphasis";
      else if (status === "Approved")
        badgeClass = "bg-success-subtle text-success-emphasis";
      else if (status === "In Review")
        badgeClass = "bg-warning-subtle text-warning-emphasis";
      else if (status === "Rejected")
        badgeClass = "bg-danger-subtle text-danger-emphasis";
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
          url: "/facebook/list-json",
          type: "GET",
          dataSrc: function (json) {
            console.log("Raw response:", json);
            return json.data;
          },
          error: function (xhr, error, thrown) {
            console.error("DataTable Ajax Error:", error, thrown);
            alert("Error loading conflict data. Please refresh the page.");
          },
        },
        paging: true,
        searching: true,
        info: true,
        lengthChange: true,
        autoWidth: false,
        order: [[1, "desc"]],
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
              `<div class="fw-bold">${
                row.artist || "N/A"
              }</div><small class="text-muted">Asset ID: ${
                row.assetId || "N/A"
              }</small>`,
          },
          { data: "upc", title: "ISRC" },
          { data: "otherParty", title: "Other Party" },
          {
            data: "dailyViews",
            title: "Daily Views",
            render: {
              _: (data) => data || "0",
              sort: (data) => parseViews(data),
            },
          },
          {
            data: "expiry",
            title: "Expiry",
            render: {
              _: (data) => data || "-",
              sort: (data) => parseExpiry(data),
            },
          },
          {
            data: "status",
            title: "Status",
            render: (data) => getStatusBadge(data || "Action Required"),
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
            "data-cover-url":
              data.albumCoverUrl ||
              "https://placehold.co/80x80/3b5998/ffffff?text=FB",
            "data-category": data.category,
            "data-other-party": data.otherParty,
            "data-conflict-state": data.conflictState,
            "data-countries": JSON.stringify(data.countries || {}),
            "data-status": data.status,
            "data-rejection-message": data.rejectionMessage || "",
            "data-resolution-data": JSON.stringify(data.resolutionData || {}),
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
          processing: "Loading conflicts...",
        },
      });
    }

    // Initialize the DataTable
    initializeDataTable();

    // --- IMPORT CSV FUNCTIONALITY ---
    const importBtn = document.getElementById("importFacebookCsv");
    if (importBtn) {
      importBtn.addEventListener("click", function () {
        const fileInput = document.createElement("input");
        fileInput.type = "file";
        fileInput.accept = ".csv";
        fileInput.style.display = "none";

        fileInput.addEventListener("change", function (e) {
          const file = e.target.files[0];
          if (!file) return;

          const formData = new FormData();
          formData.append("file", file);

          const originalText = importBtn.innerHTML;
          importBtn.innerHTML =
            '<i class="spinner-border spinner-border-sm me-1"></i>Importing...';
          importBtn.disabled = true;

          fetch("/facebook/import", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "success") {
                alert(
                  `Import successful!\nProcessed: ${data.processed_rows}\nInserted: ${data.inserted_rows}`
                );
                dataTableInstance.ajax.reload();
              } else {
                alert(`Import failed: ${data.message}`);
              }
            })
            .catch((error) => {
              console.error("Import error:", error);
              alert("Import failed. Please try again.");
            })
            .finally(() => {
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
    const conflictOffcanvasEl = document.getElementById(
      "facebookConflictOffcanvas"
    );
    if (conflictOffcanvasEl) {
      const conflictForm = document.getElementById("facebookConflictForm");
      const formStep1 = document.getElementById("formStep1");
      const formStep2 = document.getElementById("formStep2");
      const formStep3 = document.getElementById("formStep3");
      const formStepInReview = document.getElementById("formStepInReview");

      // The main form steps (excluding the In Review step)
      const formSteps = [formStep1, formStep2, formStep3, formStepInReview]; // Step 4 is the InReview step used as preview

      const nextBtn = document.getElementById("nextBtn");
      const backBtn = document.getElementById("backBtn");
      const prevBtn = document.getElementById("prevBtn"); // Use prevBtn instead of backBtn
      const submitBtn = document.getElementById("submitBtn");
      const closeBtnInReview = document.getElementById("closeBtnInReview");

      let currentStep = 0;
      let currentConflictId = null;
      let conflictCountries = {};
      let currentStatus = "";
      let isReadOnlyMode = false;
      let formSubmitted = false; // Flag to track if form was submitted

      // --- OFFCANVAS CLOSE EVENT LISTENERS FOR PAGE RELOAD ---
      // Listen for offcanvas hidden event to reload page[40][42]
      conflictOffcanvasEl.addEventListener(
        "hidden.bs.offcanvas",
        function (event) {
          // Only reload if form was not submitted (to avoid double reload)
          if (!formSubmitted) {
            console.log("Offcanvas closed - reloading page");
            window.location.reload();
          }
          // Reset the flag for next time
          formSubmitted = false;
        }
      );

      // Add click event to cross button (×) in header
      const closeBtn = conflictOffcanvasEl.querySelector(".btn-close");
      if (closeBtn) {
        closeBtn.addEventListener("click", function () {
          console.log(
            "Cross button clicked - offcanvas will close and page will reload"
          );
        });
      }

      // Add click event to "Close" button in footer
      if (closeBtnInReview) {
        closeBtnInReview.addEventListener("click", function () {
          console.log(
            "Close button clicked - offcanvas will close and page will reload"
          );
        });
      }

      // Rights owned display mapping
      const rightsOwnedLabels = {
        original_exclusive:
          "Original and exclusive rights on all or part of the territories",
        non_exclusive:
          "Non-exclusive rights only (license granted by a third party)",
        cid_exclusive: "Exclusive license for Content-ID stores only",
        soundalike: "Soundalike recording (e.g., cover or remix)",
        public_domain: "Public Domain recording",
        no_rights: "No rights for the selected content",
      };

      // Create status message dynamically if it doesn't exist
      function createStatusMessage() {
        const existingMsg =
          conflictOffcanvasEl.querySelector("#statusMessageBox");
        if (!existingMsg) {
          const statusMessageHTML = `
            <div id="statusMessageBox" class="alert d-none mb-3">
              <div class="d-flex align-items-center">
                <i id="statusIcon" class="me-3 fs-5"></i>
                <div>
                  <div class="fw-bold" id="statusTitle">Status</div>
                  <small id="statusMessage" class="text-muted">Message</small>
                </div>
              </div>
            </div>
          `;
          const offcanvasBody =
            conflictOffcanvasEl.querySelector(".offcanvas-body");
          offcanvasBody.insertAdjacentHTML("afterbegin", statusMessageHTML);
        }
      }

      function showStep(stepIndex) {
        // Hide all steps
        formSteps.forEach((step, index) => {
          if (step) step.classList.toggle("d-none", index !== stepIndex);
        });

        // Button visibility logic - use prevBtn instead of backBtn
        if (prevBtn)
          prevBtn.classList.toggle("d-none", stepIndex === 0 || isReadOnlyMode);
        if (backBtn) backBtn.classList.add("d-none"); // Always hide backBtn to avoid confusion
        if (nextBtn)
          nextBtn.classList.toggle("d-none", stepIndex === 3 || isReadOnlyMode); // Step 3 is the final preview step
        if (submitBtn)
          submitBtn.classList.toggle(
            "d-none",
            stepIndex !== 3 || isReadOnlyMode
          ); // Show submit only on step 3 (preview)
        if (closeBtnInReview)
          closeBtnInReview.classList.toggle("d-none", !isReadOnlyMode);

        currentStep = stepIndex;
      }

      function showStatusMessage(status, message = "") {
        createStatusMessage();

        const statusMessageBox = document.getElementById("statusMessageBox");
        const statusIcon = document.getElementById("statusIcon");
        const statusTitle = document.getElementById("statusTitle");
        const statusMessageText = document.getElementById("statusMessage");

        if (status === "Rejected" && message) {
          statusMessageBox.className =
            "alert alert-danger d-flex align-items-center mb-3";
          statusIcon.className = "bi bi-x-circle-fill me-3 fs-5 text-danger";
          statusTitle.textContent = "Resolution Rejected";
          statusMessageText.textContent = message;
          statusMessageBox.classList.remove("d-none");
        } else {
          statusMessageBox.classList.add("d-none");
        }
      }

      function showReadOnlyDisplay(resolutionData) {
        // Hide all form steps except the In Review step
        formStep1.classList.add("d-none");
        formStep2.classList.add("d-none");
        formStep3.classList.add("d-none");
        formStepInReview.classList.remove("d-none");

        // Hide rejection message box for read-only mode
        const rejectionBox = document.getElementById("rejectionMessageBox");
        if (rejectionBox) rejectionBox.classList.add("d-none");

        // Populate read-only data using existing elements
        const rightsOwnedEl = document.getElementById("resolutionRightsOwned");
        if (rightsOwnedEl) {
          rightsOwnedEl.textContent =
            rightsOwnedLabels[resolutionData.rightsOwned] ||
            resolutionData.rightsOwned ||
            "N/A";
        }

        const countriesEl = document.getElementById("resolutionCountries");
        if (countriesEl) {
          countriesEl.textContent = resolutionData.territories
            ? resolutionData.territories.join(", ")
            : "N/A";
        }

        const supportingDocEl = document.getElementById(
          "supportingDocumentInfo"
        );
        if (supportingDocEl) {
          if (resolutionData.supportingDocumentPath) {
            const fileName = resolutionData.supportingDocumentPath
              .split("/")
              .pop();
            supportingDocEl.innerHTML = `
              <a href="${resolutionData.supportingDocumentPath}" target="_blank" class="text-decoration-none">
                <i class="bi bi-file-earmark-text me-2"></i>${fileName}
              </a>`;
          } else {
            supportingDocEl.textContent = "No supporting document uploaded";
          }
        }

        const dateEl = document.getElementById("resolutionDate");
        if (dateEl) {
          dateEl.textContent = resolutionData.resolutionDate
            ? new Date(resolutionData.resolutionDate).toLocaleString()
            : "N/A";
        }

        isReadOnlyMode = true;
        // Set button visibility for read-only mode
        if (prevBtn) prevBtn.classList.add("d-none");
        if (nextBtn) nextBtn.classList.add("d-none");
        if (submitBtn) submitBtn.classList.add("d-none");
        if (closeBtnInReview) closeBtnInReview.classList.remove("d-none");
      }

      function populatePreviewStep() {
        // Use the existing formStepInReview as preview step but populate it with current form data
        const rightsOwned = conflictForm.querySelector(
          'input[name="rightsOwned"]:checked'
        )?.value;
        const rightsOwnedEl = document.getElementById("resolutionRightsOwned");
        if (rightsOwnedEl) {
          rightsOwnedEl.textContent =
            rightsOwnedLabels[rightsOwned] || "Not selected";
        }

        const selectedTerritories = Array.from(
          conflictForm.querySelectorAll(".country-checkbox:checked")
        ).map((cb) => cb.nextElementSibling.textContent);

        const countriesEl = document.getElementById("resolutionCountries");
        if (countriesEl) {
          countriesEl.textContent =
            selectedTerritories.length > 0
              ? selectedTerritories.join(", ")
              : "None selected";
        }

        const fileInput = document.getElementById("formFile");
        const supportingDocEl = document.getElementById(
          "supportingDocumentInfo"
        );
        if (supportingDocEl) {
          if (fileInput && fileInput.files.length > 0) {
            supportingDocEl.innerHTML = `<i class="bi bi-file-earmark-text me-2"></i>${fileInput.files[0].name}`;
          } else {
            supportingDocEl.textContent = "No document selected";
          }
        }

        const dateEl = document.getElementById("resolutionDate");
        if (dateEl) {
          dateEl.textContent =
            "Will be submitted: " + new Date().toLocaleString();
        }
      }

      if (nextBtn) {
        nextBtn.addEventListener("click", () => {
          if (isReadOnlyMode) return;

          // Validation for each step
          if (currentStep === 0) {
            const radioSelected = conflictForm.querySelector(
              'input[name="rightsOwned"]:checked'
            );
            if (!radioSelected) {
              return alert("Please select a rights option.");
            }
          }

          if (currentStep === 1) {
            if (!conflictForm.querySelector(".country-checkbox:checked")) {
              return alert("Please select at least one territory.");
            }
          }

          if (currentStep === 2) {
            const fileInput = document.getElementById("formFile");
            if (!fileInput.files.length) {
              return alert("Please upload a supporting document.");
            }
          }

          if (currentStep < 3) {
            // Step 3 is the preview step (using formStepInReview)
            if (currentStep === 2) {
              populatePreviewStep(); // Populate preview before showing it
            }
            showStep(currentStep + 1);
          }
        });
      }

      if (prevBtn) {
        prevBtn.addEventListener("click", () => {
          if (isReadOnlyMode) return;
          if (currentStep > 0) showStep(currentStep - 1);
        });
      }

      conflictOffcanvasEl.addEventListener(
        "show.bs.offcanvas",
        function (event) {
          const trigger = event.relatedTarget;
          const data = trigger.dataset;

          // Reset state
          currentConflictId = data.conflictId;
          currentStatus = data.status;
          isReadOnlyMode = false;
          formSubmitted = false; // Reset form submission flag

          // Parse data
          try {
            conflictCountries = JSON.parse(data.countries || "{}");
          } catch (e) {
            console.warn("Failed to parse countries data:", e);
            conflictCountries = {};
          }

          let resolutionData = {};
          try {
            resolutionData = JSON.parse(data.resolutionData || "{}");
          } catch (e) {
            console.warn("Failed to parse resolution data:", e);
          }

          // Populate album info for all steps
          ["", "2", "3", "InReview"].forEach((suffix) => {
            const albumCover = document.getElementById(
              `modalAlbumCover${suffix}`
            );
            const songName = document.getElementById(`modalSongName${suffix}`);
            const artistName = document.getElementById(
              `modalArtistName${suffix}`
            );

            if (albumCover)
              albumCover.src =
                data.coverUrl ||
                "https://placehold.co/80x80/3b5998/ffffff?text=FB";
            if (songName) songName.textContent = data.songName || "Unknown";
            if (artistName)
              artistName.textContent = data.artistName || "Unknown";
          });

          // Set title and subtitle
          const titleEl = document.getElementById("offcanvasTitle");
          const subtitleEl = document.getElementById("offcanvasSubtitle");
          if (titleEl)
            titleEl.textContent = data.category || "Ownership Conflict";
          if (subtitleEl)
            subtitleEl.textContent = `VS. ${data.otherParty || "Unknown"}`;

          const isrcEl = document.getElementById("modalIsrc");
          if (isrcEl) isrcEl.textContent = `ISRC: ${data.isrc || "N/A"}`;

          // Handle different status flows
          if (currentStatus === "In Review" || currentStatus === "Approved") {
            showReadOnlyDisplay(resolutionData);
          } else {
            // Action Required or Rejected - show fillable form
            if (currentStatus === "Rejected") {
              showStatusMessage("Rejected", data.rejectionMessage);
            } else {
              showStatusMessage(""); // Hide status message for Action Required
            }

            // Reset form and show step 1
            renderTerritoryAccordion();
            conflictForm.reset();
            conflictForm
              .querySelectorAll(".radio-card")
              .forEach((c) => c.classList.remove("selected"));

            const fileDisplay = document.getElementById("selectedFileName");
            if (fileDisplay) fileDisplay.classList.add("d-none");

            isReadOnlyMode = false;
            showStep(0);
          }
        }
      );

      if (conflictForm) {
        conflictForm.addEventListener("submit", function (e) {
          e.preventDefault();
          if (isReadOnlyMode) return;

          const formData = new FormData();
          const rightsOwned =
            conflictForm.querySelector('input[name="rightsOwned"]:checked')
              ?.value || "";
          const selectedTerritories = Array.from(
            conflictForm.querySelectorAll(".country-checkbox:checked")
          ).map((cb) => cb.value);
          const formFile = document.getElementById("formFile");

          formData.append("conflict_id", currentConflictId);
          formData.append("rights_owned", rightsOwned);
          formData.append("territories", JSON.stringify(selectedTerritories));

          if (formFile && formFile.files[0]) {
            formData.append("supporting_document", formFile.files[0]);
          }

          const originalText = submitBtn.innerHTML;
          submitBtn.innerHTML =
            '<i class="spinner-border spinner-border-sm me-1"></i>Submitting...';
          submitBtn.disabled = true;

          // Set flag to indicate form is being submitted
          formSubmitted = true;

          fetch("/facebook/update-resolution", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "success") {
                alert("Resolution submitted successfully!");
                // Close offcanvas and reload will happen via the hidden event
                bootstrap.Offcanvas.getInstance(conflictOffcanvasEl).hide();
                // Add a small delay to ensure the hidden event fires before reload
                setTimeout(() => {
                  window.location.reload();
                }, 100);
              } else {
                alert(`Failed to submit resolution: ${data.message}`);
                formSubmitted = false; // Reset flag if submission failed
              }
            })
            .catch((error) => {
              console.error("Submit error:", error);
              alert("Failed to submit resolution. Please try again.");
              formSubmitted = false; // Reset flag if submission failed
            })
            .finally(() => {
              submitBtn.innerHTML = originalText;
              submitBtn.disabled = false;
            });
        });
      }

      function renderTerritoryAccordion() {
        if (isReadOnlyMode) return;

        const accordionContainer =
          document.getElementById("territoryAccordion");
        if (!accordionContainer) return;

        accordionContainer.innerHTML =
          '<div class="text-center p-3"><i class="spinner-border spinner-border-sm me-2"></i>Loading territories...</div>';

        fetch("/facebook/get-all-countries")
          .then((response) => response.json())
          .then((data) => {
            if (data.status === "success") {
              renderCountriesAccordion(data.countries);
            } else {
              accordionContainer.innerHTML =
                '<div class="text-center p-3 text-danger">Error loading territories</div>';
            }
          })
          .catch((error) => {
            console.error("Error fetching countries:", error);
            accordionContainer.innerHTML =
              '<div class="text-center p-3 text-danger">Error loading territories</div>';
          });
      }

      function renderCountriesAccordion(allCountries) {
        const accordionContainer =
          document.getElementById("territoryAccordion");
        if (!accordionContainer) return;

        const checkedCountryIds = new Set();
        Object.values(conflictCountries).forEach((countries) => {
          if (Array.isArray(countries)) {
            countries.forEach((country) => {
              checkedCountryIds.add(country.id);
            });
          }
        });

        accordionContainer.innerHTML = Object.entries(allCountries)
          .map(([continent, countries]) => {
            if (!countries || countries.length === 0) return "";

            const regionId = continent.replace(/[^a-zA-Z0-9]/g, "");
            const checkedCountsInRegion = countries.filter((c) =>
              checkedCountryIds.has(c.id)
            ).length;
            const allCountriesInRegionChecked =
              checkedCountsInRegion === countries.length &&
              countries.length > 0;

            return `
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-fb-${regionId}">
                    <div class="form-check me-auto pe-2">
                      <input class="form-check-input region-checkbox" type="checkbox" id="region-fb-${regionId}" data-region="${continent}" ${
              allCountriesInRegionChecked ? "checked" : ""
            }>
                      <label class="form-check-label fw-bold" for="region-fb-${regionId}">${continent}</label>
                    </div>
                    <span class="text-muted small me-2">${
                      countries.length
                    } countries ${
              checkedCountsInRegion > 0
                ? `(${checkedCountsInRegion} selected)`
                : ""
            }</span>
                  </button>
                </h2>
                <div id="collapse-fb-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                  <div class="accordion-body">
                    <div class="territory-list-inner">
                      ${countries
                        .map(
                          (c) => `
                        <div class="form-check">
                          <input class="form-check-input country-checkbox" type="checkbox" value="${
                            c.id
                          }" id="country-fb-${
                            c.id
                          }" data-region="${continent}" ${
                            checkedCountryIds.has(c.id) ? "checked" : ""
                          }>
                          <label class="form-check-label" for="country-fb-${
                            c.id
                          }">${c.name}</label>
                        </div>
                      `
                        )
                        .join("")}
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
        if (isReadOnlyMode) return;

        const selected = conflictOffcanvasEl.querySelectorAll(
          ".country-checkbox:checked"
        ).length;
        const total =
          conflictOffcanvasEl.querySelectorAll(".country-checkbox").length;
        const counterEl = document.getElementById("territoryCounter");
        if (counterEl) {
          counterEl.textContent = `${selected} contested countries out of ${total} delivered`;
        }
      }

      function addTerritoryEventListeners() {
        if (isReadOnlyMode) return;

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
                const regionCheckbox = conflictOffcanvasEl.querySelector(
                  `.region-checkbox[data-region="${region}"]`
                );
                if (regionCheckbox) {
                  regionCheckbox.checked = allInRegion;
                }
              }
              updateTerritoryCounter();
            });
          });
      }

      // Form interaction event listeners
      conflictOffcanvasEl.addEventListener("click", function (e) {
        if (isReadOnlyMode) return;

        if (e.target.closest(".radio-card")) {
          const card = e.target.closest(".radio-card");
          conflictOffcanvasEl
            .querySelectorAll(".radio-card")
            .forEach((c) => c.classList.remove("selected"));
          card.classList.add("selected");
          const radioInput = card.querySelector('input[type="radio"]');
          if (radioInput) radioInput.checked = true;
        }
      });

      // File upload handling
      const fileInput = document.getElementById("formFile");
      const fileDisplay = document.getElementById("selectedFileName");
      const fileUploadContainer = document.getElementById(
        "fileUploadContainer"
      );

      if (fileUploadContainer && fileInput) {
        fileUploadContainer.addEventListener("click", () => {
          if (!isReadOnlyMode) fileInput.click();
        });
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
      ajax: "/support/data",
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
        url: "/support/update-status/" + id,
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
  isrc: { isrc: true },
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
  let submittingButton = null;
  let rejectionMessage = null;
  let isDraftSaving = false;
  let isSubmitting = false; // NEW: Prevent duplicate submissions

  if (typeof feather !== "undefined") {
    feather.replace();
  }

  const isEditMode =
    document.querySelector('input[name="releaseTitle"]')?.value !== "";

  const rejectionModal = document.getElementById("rejectionModal")
    ? new bootstrap.Modal(document.getElementById("rejectionModal"))
    : null;

  const rejectionMessagesModal = document.getElementById(
    "rejectionMessagesModal"
  )
    ? new bootstrap.Modal(document.getElementById("rejectionMessagesModal"))
    : null;

  const saveDraftBtn = document.getElementById("saveDraftBtn");
  const draftSuccessToast = document.getElementById("draftSuccessToast");
  const toastInstance = draftSuccessToast
    ? new bootstrap.Toast(draftSuccessToast)
    : null;

  if (saveDraftBtn) {
    saveDraftBtn.addEventListener("click", function () {
      if (isDraftSaving) return;
      saveDraft();
    });
  }

  const showRejectionMessagesBtn = document.getElementById(
    "showRejectionMessagesBtn"
  );
  if (showRejectionMessagesBtn && rejectionMessagesModal) {
    showRejectionMessagesBtn.addEventListener("click", function () {
      loadRejectionMessages();
      rejectionMessagesModal.show();
    });
  }

  // NEW: Pre-validate UPC/EAN and ISRC for uniqueness
  async function validateUniqueField(fieldName, fieldValue, releaseId = null) {
    if (!fieldValue || fieldValue.trim() === "") return true;

    try {
      const params = new URLSearchParams({
        field: fieldName,
        value: fieldValue.trim(),
      });

      if (releaseId) {
        params.append("release_id", releaseId);
      }

      const response = await fetch(
        `/releases/validate-unique?${params.toString()}`,
        {
          method: "GET",
          headers: {
            "X-Requested-With": "XMLHttpRequest",
          },
        }
      );

      const result = await response.json();
      return result.success && result.is_unique;
    } catch (error) {
      console.error("Unique validation error:", error);
      return true; // Allow submission if validation fails
    }
  }

  // NEW: Add real-time unique validation for UPC/EAN
  const upcEanField = document.getElementById("upcEan");
  if (upcEanField) {
    let upcEanTimeout = null;
    upcEanField.addEventListener("blur", async function () {
      clearTimeout(upcEanTimeout);
      const value = this.value.trim();

      if (value && FormValidator.rules.upcEan(value)) {
        const releaseId = document.querySelector(
          'input[name="release_id"]'
        )?.value;
        const isUnique = await validateUniqueField("upcEan", value, releaseId);

        if (!isUnique) {
          const errorDiv = document.getElementById("upcEanError");
          this.classList.add("is-invalid");
          this.classList.remove("is-valid");
          if (errorDiv) {
            errorDiv.textContent =
              "This UPC/EAN is already in use. Please use a different one.";
            errorDiv.style.display = "block";
          }
        }
      }
    });
  }

  // NEW: Add real-time unique validation for ISRC
  const isrcField = document.getElementById("isrc");
  if (isrcField) {
    let isrcTimeout = null;
    isrcField.addEventListener("blur", async function () {
      clearTimeout(isrcTimeout);
      const value = this.value.trim();

      if (value && FormValidator.rules.isrc(value)) {
        const releaseId = document.querySelector(
          'input[name="release_id"]'
        )?.value;
        const isUnique = await validateUniqueField("isrc", value, releaseId);

        if (!isUnique) {
          const errorDiv = document.getElementById("isrcError");
          this.classList.add("is-invalid");
          this.classList.remove("is-valid");
          if (errorDiv) {
            errorDiv.textContent =
              "This ISRC is already in use. Please use a different one.";
            errorDiv.style.display = "block";
          }
        }
      }
    });
  }

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
      progressLine.style.width = `${progressWidth}%`;
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
        if (!validateStep4Dates()) allValid = false;
      }

      return allValid;
    };
  }

  function validateStepField(fieldId, rules) {
    if (fieldId === "artworkFile") return validateArtworkFile();
    if (fieldId === "audioFile") return validateAudioFile();
    if (fieldId === "freeStores") return validateStoreSelection();

    return FormValidator.validateField(fieldId, rules);
  }

  function validateArtworkFile() {
    const artworkFile = document.getElementById("artworkFile");
    const artworkFileError = document.getElementById("artworkFileError");
    const artworkUpload = document.getElementById("artworkUpload");
    const artworkPreview = document.getElementById("artworkPreview");

    if (!artworkFile || !artworkFileError || !artworkUpload) return true;

    artworkUpload.classList.remove("is-invalid", "is-valid");
    artworkFileError.textContent = "";
    artworkFileError.style.display = "none";

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
        audioUpload.classList.add("is-invalid");
        if (audioFileError) {
          audioFileError.textContent = "Please select an audio file.";
          audioFileError.style.display = "block";
        }
        return false;
      }
      return true;
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

    if (preSaleDate) FormValidator.hideError(preSaleDate);
    if (originalReleaseDate) FormValidator.hideError(originalReleaseDate);

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

  async function saveDraft() {
    try {
      isDraftSaving = true;

      const originalText = saveDraftBtn.innerHTML;
      saveDraftBtn.innerHTML =
        '<i data-feather="save" class="me-1"></i> Saving...';
      saveDraftBtn.disabled = true;

      const form = document.getElementById("releaseForm");
      const formData = new FormData(form);

      const draftName =
        formData.get("releaseTitle") ||
        `Draft - ${new Date().toLocaleString()}`;
      formData.set("draft_name", draftName);
      formData.set("current_step", currentStep.toString());

      const response = await fetch("/releases/drafts/save", {
        method: "POST",
        body: formData,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      });

      const result = await response.json();

      if (result.success) {
        const draftIdField = document.getElementById("draftId");
        if (draftIdField) {
          draftIdField.value = result.draft_id;
        }

        if (toastInstance) {
          toastInstance.show();
        }

        if (result.completion_percentage) {
          saveDraftBtn.innerHTML = `<i data-feather="save" class="me-1"></i> Saved (${result.completion_percentage}%)`;
        } else {
          saveDraftBtn.innerHTML =
            '<i data-feather="save" class="me-1"></i> Saved';
        }

        setTimeout(() => {
          saveDraftBtn.innerHTML = originalText;
          if (typeof feather !== "undefined") {
            feather.replace();
          }
        }, 3000);
      } else {
        throw new Error(result.error || "Failed to save draft");
      }
    } catch (error) {
      console.error("Draft save error:", error);
      alert("Failed to save draft: " + error.message);
    } finally {
      isDraftSaving = false;
      saveDraftBtn.disabled = false;

      if (typeof feather !== "undefined") {
        feather.replace();
      }
    }
  }

  async function loadRejectionMessages() {
    try {
      let releaseId = null;

      const releaseIdInput = document.querySelector('input[name="release_id"]');
      if (releaseIdInput) {
        releaseId = releaseIdInput.value;
      }

      if (!releaseId) {
        const formEl = document.querySelector('form[action*="/update/"]');
        if (formEl && formEl.action) {
          const matches = formEl.action.match(/\/update\/(\d+)/);
          releaseId = matches ? matches[1] : null;
        }
      }

      if (!releaseId) {
        throw new Error("Release ID not found");
      }

      const response = await fetch(
        `/releases/${releaseId}/rejection-messages`,
        {
          headers: { "X-Requested-With": "XMLHttpRequest" },
        }
      );

      const result = await response.json();
      const contentDiv = document.getElementById("rejectionMessagesContent");

      if (result.success && result.messages && result.messages.length > 0) {
        let html = "";
        result.messages.forEach((msg, index) => {
          html += `
            <div class="card mb-3">
              <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Rejection #${index + 1}</h6>
                <small class="text-muted">${new Date(
                  msg.created_at
                ).toLocaleString()}</small>
              </div>
              <div class="card-body">
                <p class="mb-0">${msg.message}</p>
                ${
                  msg.admin_name
                    ? `<small class="text-muted">By: ${msg.admin_name}</small>`
                    : ""
                }
              </div>
            </div>
          `;
        });
        contentDiv.innerHTML = html;
      } else {
        contentDiv.innerHTML = `
          <div class="text-center p-4">
            <i data-feather="info" class="text-muted mb-2"></i>
            <p class="text-muted">No rejection messages found for this release.</p>
          </div>
        `;
        if (typeof feather !== "undefined") {
          feather.replace();
        }
      }
    } catch (error) {
      console.error("Error loading rejection messages:", error);
      const contentDiv = document.getElementById("rejectionMessagesContent");
      contentDiv.innerHTML = `
        <div class="text-center p-4 text-danger">
          <i data-feather="alert-circle" class="mb-2"></i>
          <p>Failed to load rejection messages: ${error.message}</p>
        </div>
      `;
      if (typeof feather !== "undefined") {
        feather.replace();
      }
    }
  }

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

  const rejectBtn = document.getElementById("rejectBtn");
  const confirmRejectBtn = document.getElementById("confirmRejectBtn");
  const rejectionMessageInput = document.getElementById("rejectionMessage");
  const rejectionMessageError = document.getElementById(
    "rejectionMessageError"
  );

  if (rejectBtn) {
    rejectBtn.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      if (rejectionModal) {
        rejectionModal.show();
      }
    });
  }

  if (confirmRejectBtn) {
    confirmRejectBtn.addEventListener("click", function () {
      const message = rejectionMessageInput.value.trim();

      if (!message) {
        rejectionMessageInput.classList.add("is-invalid");
        rejectionMessageError.style.display = "block";
        return;
      }

      rejectionMessageInput.classList.remove("is-invalid");
      rejectionMessageError.style.display = "none";

      rejectionMessage = message;
      submittingButton = { name: "status", value: "4" };

      if (rejectionModal) {
        rejectionModal.hide();
      }

      const form = document.getElementById("releaseForm");
      if (form) {
        const submitEvent = new Event("submit");
        form.dispatchEvent(submitEvent);
      }
    });
  }

  if (rejectionMessageInput) {
    rejectionMessageInput.addEventListener("input", function () {
      if (this.value.trim()) {
        this.classList.remove("is-invalid");
        rejectionMessageError.style.display = "none";
      }
    });
  }

  document.addEventListener("click", function (e) {
    if (
      e.target.type === "submit" &&
      e.target.form &&
      e.target.form.id === "releaseForm"
    ) {
      submittingButton = { name: e.target.name, value: e.target.value };
      console.log("CAPTURED SUBMIT BUTTON:", submittingButton);
    }
  });

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
            }

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
      alert("Only WAV files are accepted! Please upload a WAV audio file.");
      return false;
    }

    if (!isValidExtension) {
      alert(
        "Only .wav files are accepted! Please make sure your file has a .wav extension."
      );
      return false;
    }

    if (file.size > maxAudioSize) {
      alert("File size too large! Your WAV file should not exceed 50MB.");
      return false;
    }

    const minAudioSize = 1024;
    if (file.size < minAudioSize) {
      alert(
        "File appears to be empty or corrupted! Please select a valid WAV audio file."
      );
      return false;
    }

    return true;
  }

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

  // NEW: Enhanced form submission with pre-validation and better error handling
  document
    .getElementById("releaseForm")
    .addEventListener("submit", async function (e) {
      e.preventDefault();

      // Prevent duplicate submissions
      if (isSubmitting) {
        console.log("Form already submitting, ignoring duplicate submission");
        return;
      }

      console.log("Form submission started");
      console.log("Submitting button:", submittingButton);
      console.log("Rejection message:", rejectionMessage);

      // NEW: Pre-validate UPC/EAN and ISRC uniqueness before submission (skip for rejection)
      if (!submittingButton || submittingButton.value !== "4") {
        const upcEanField = document.getElementById("upcEan");
        const isrcField = document.getElementById("isrc");
        const releaseId = document.querySelector(
          'input[name="release_id"]'
        )?.value;

        // Validate UPC/EAN uniqueness
        if (upcEanField && upcEanField.value.trim()) {
          const upcEanValue = upcEanField.value.trim();
          if (FormValidator.rules.upcEan(upcEanValue)) {
            const isUpcEanUnique = await validateUniqueField(
              "upcEan",
              upcEanValue,
              releaseId
            );
            if (!isUpcEanUnique) {
              const errorDiv = document.getElementById("upcEanError");
              upcEanField.classList.add("is-invalid");
              if (errorDiv) {
                errorDiv.textContent =
                  "This UPC/EAN is already in use. Please use a different one.";
                errorDiv.style.display = "block";
              }
              showStep(1);
              alert(
                "Validation Failed: The UPC/EAN you entered is already in use. Please use a different one."
              );
              isSubmitting = false; // Reset submission flag here!
              return;
            }
          }
        }

        if (isrcField && isrcField.value.trim()) {
          const isrcValue = isrcField.value.trim();
          if (FormValidator.rules.isrc(isrcValue)) {
            const isIsrcUnique = await validateUniqueField(
              "isrc",
              isrcValue,
              releaseId
            );
            if (!isIsrcUnique) {
              const errorDiv = document.getElementById("isrcError");
              isrcField.classList.add("is-invalid");
              if (errorDiv) {
                errorDiv.textContent =
                  "This ISRC is already in use. Please use a different one.";
                errorDiv.style.display = "block";
              }
              showStep(2);
              alert(
                "Validation Failed: The ISRC you entered is already in use. Please use a different one."
              );
              isSubmitting = false; // Reset submission flag here!
              return;
            }
          }
        }

        // Validate all steps
        let allStepsValid = true;
        let firstInvalidStep = null;

        for (let step = 1; step <= totalSteps; step++) {
          if (stepValidators[step] && !stepValidators[step]()) {
            allStepsValid = false;
            if (firstInvalidStep === null) {
              firstInvalidStep = step;
            }
          }
        }

        if (!allStepsValid) {
          if (firstInvalidStep !== null) {
            showStep(firstInvalidStep);
          }
          alert("Please complete all required fields before submitting.");
          submittingButton = null;
          isSubmitting = false; // Reset submission flag here!
          return;
        }
      }

      isSubmitting = true; // Set submission flag

      const form = e.target;
      const formData = new FormData(form);

      if (submittingButton && submittingButton.name && submittingButton.value) {
        formData.delete("status");
        formData.set(submittingButton.name, submittingButton.value);
        console.log(
          `ADDED BUTTON STATUS: ${submittingButton.name} = ${submittingButton.value}`
        );

        if (submittingButton.value === "4" && rejectionMessage) {
          formData.set("message", rejectionMessage);
          console.log("ADDED REJECTION MESSAGE:", rejectionMessage);
        }
      } else {
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
            `FALLBACK - ADDED ACTIVE BUTTON: ${activeBtn.name} = ${activeBtn.value}`
          );
        } else {
          const isEditMode =
            formData.get("release_id") ||
            document.querySelector('input[name="release_id"]');
          if (!isEditMode) {
            console.log("NEW RELEASE - USING DEFAULT STATUS 1");
            formData.set("status", "1");
          } else {
            console.log("EDIT MODE - NO DEFAULT STATUS SET");
          }
        }
      }

      console.log("FINAL FORMDATA CONTENTS:");
      for (let [key, value] of formData.entries()) {
        if (key === "status" || key.includes("status") || key === "message") {
          console.log(`${key}: ${value}`);
        }
      }

      const submitBtns = form.querySelectorAll(
        'button[type="submit"], button[id="rejectBtn"]'
      );
      const originalButtonContent = new Map();

      submitBtns.forEach((btn) => {
        originalButtonContent.set(btn, btn.innerHTML);
        btn.disabled = true;
        btn.innerHTML =
          '<i class="spinner-border spinner-border-sm me-1"></i> Processing...';
      });

      try {
        const response = await fetch(form.action, {
          method: "POST",
          body: formData,
          headers: {
            "X-Requested-With": "XMLHttpRequest",
          },
        });

        console.log("Response status:", response.status);

        if (!response.ok) {
          throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }

        const text = await response.text();
        console.log("Raw response:", text);

        let data;
        if (!text || !text.trim()) {
          data = { success: true, message: "Release processed successfully!" };
        } else {
          try {
            data = JSON.parse(text);
            console.log("Parsed JSON:", data);
          } catch (parseError) {
            console.log("JSON parse failed:", parseError.message);
            throw new Error("Invalid JSON response from server");
          }
        }

        console.log("Processing response data:", data);

        if (!data) {
          throw new Error("No response data received from server");
        }

        // NEW: Handle validation errors from backend
        if (data.success === false && data.errors) {
          console.log("Backend validation errors:", data.errors);

          let errorMessage = "Validation Failed:\n\n";
          let firstErrorField = null;

          // Handle UPC/EAN error
          if (data.errors.upcEan) {
            errorMessage += `• UPC/EAN: ${data.errors.upcEan}\n`;
            const upcEanField = document.getElementById("upcEan");
            const upcEanError = document.getElementById("upcEanError");
            if (upcEanField) {
              upcEanField.classList.add("is-invalid");
              if (upcEanError) {
                upcEanError.textContent = data.errors.upcEan;
                upcEanError.style.display = "block";
              }
              if (!firstErrorField) {
                firstErrorField = { field: upcEanField, step: 1 };
              }
            }
          }

          // Handle ISRC error
          if (data.errors.isrc) {
            errorMessage += `• ISRC: ${data.errors.isrc}\n`;
            const isrcField = document.getElementById("isrc");
            const isrcError = document.getElementById("isrcError");
            if (isrcField) {
              isrcField.classList.add("is-invalid");
              if (isrcError) {
                isrcError.textContent = data.errors.isrc;
                isrcError.style.display = "block";
              }
              if (!firstErrorField) {
                firstErrorField = { field: isrcField, step: 2 };
              }
            }
          }

          // Handle other errors
          Object.keys(data.errors).forEach((fieldName) => {
            if (fieldName !== "upcEan" && fieldName !== "isrc") {
              errorMessage += `• ${fieldName}: ${data.errors[fieldName]}\n`;
            }
          });

          // Show the first error step
          if (firstErrorField) {
            showStep(firstErrorField.step);
            setTimeout(() => {
              firstErrorField.field.focus();
              firstErrorField.field.scrollIntoView({
                behavior: "smooth",
                block: "center",
              });
            }, 300);
          }

          alert(errorMessage);
          return; // Don't throw error, just return
        }

        if (data.success === true) {
          const message = data.message || "Release processed successfully!";
          alert(message);
          window.location.href = data.redirect || "/releases";
        } else if (data.success === false) {
          throw new Error(data.error || data.message || "Processing failed");
        } else if (data.message && !data.hasOwnProperty("success")) {
          alert(data.message);
          window.location.href = data.redirect || "/releases";
        } else {
          console.warn("Unexpected response format:", data);
          throw new Error("Unexpected response format from server");
        }
      } catch (error) {
        console.error("Submission error:", error);

        // NEW: Better error handling with form data preservation
        let errorMsg = "Error: " + error.message;

        if (
          error.message.includes("HTTP 500") ||
          error.message.includes("Invalid JSON")
        ) {
          errorMsg +=
            "\n\nThe server encountered an error while processing your request. Your form data has been preserved.";
        } else if (error.message.includes("Network")) {
          errorMsg +=
            "\n\nPlease check your internet connection and try again. Your form data has been preserved.";
        } else {
          errorMsg +=
            "\n\nPlease review your entries and try again. Your form data has been preserved.";
        }

        alert(errorMsg);

        // Restore buttons to allow retry WITHOUT reloading (preserves form data)
        submitBtns.forEach((btn) => {
          btn.disabled = false;
          const originalContent = originalButtonContent.get(btn);
          if (originalContent) {
            btn.innerHTML = originalContent;
          } else {
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

        if (typeof feather !== "undefined") {
          feather.replace();
        }
      } finally {
        isSubmitting = false;
        submittingButton = null;
        rejectionMessage = null;

        // After 4 seconds, reset submit buttons if they are still disabled (to prevent stuck UI)
        setTimeout(() => {
          const submitBtns = form.querySelectorAll(
            'button[type="submit"], button[id="rejectBtn"]'
          );
          submitBtns.forEach((btn) => {
            if (btn.disabled) {
              btn.disabled = false;
              // Restore innerHTML to original content if you saved it; else fall back to default
              if (originalButtonContent.has(btn)) {
                btn.innerHTML = originalButtonContent.get(btn);
              } else {
                btn.innerHTML =
                  '<i data-feather="check" class="me-1"></i> Submit Release';
              }
            }
          });
          if (typeof feather !== "undefined") {
            feather.replace();
          }
        }, 4000);
      }
    });

  // Release page reject modal code
  const rejectionMessageInput2 = document.getElementById("rejectionMessage");
  const charCount = document.getElementById("charCount");
  const confirmRejectBtn2 = document.getElementById("confirmRejectBtn");
  const rejectionMessageError2 = document.getElementById(
    "rejectionMessageError"
  );
  const rejectionModal2 = document.getElementById("rejectionModal");
  const rejectBtn2 = document.getElementById("rejectBtn");

  if (rejectionMessageInput2 && charCount) {
    rejectionMessageInput2.addEventListener("input", function () {
      const currentLength = this.value.length;
      charCount.textContent = currentLength;

      if (confirmRejectBtn2) {
        if (currentLength >= 10) {
          confirmRejectBtn2.disabled = false;
          this.classList.remove("is-invalid");
          if (rejectionMessageError2) {
            rejectionMessageError2.style.display = "none";
          }
        } else {
          confirmRejectBtn2.disabled = true;
        }
      }
    });
  }

  if (confirmRejectBtn2) {
    confirmRejectBtn2.addEventListener("click", function () {
      const message = rejectionMessageInput2.value.trim();

      if (!message || message.length < 10) {
        rejectionMessageInput2.classList.add("is-invalid");
        if (rejectionMessageError2) {
          rejectionMessageError2.textContent =
            "Please provide a rejection reason (minimum 10 characters).";
          rejectionMessageError2.style.display = "block";
        }
        rejectionMessageInput2.focus();
        return;
      }

      rejectionMessageInput2.classList.remove("is-invalid");
      if (rejectionMessageError2) {
        rejectionMessageError2.style.display = "none";
      }

      rejectionMessage = message;
      submittingButton = { name: "status", value: "4" };

      const modal = bootstrap.Modal.getInstance(rejectionModal2);
      if (modal) {
        modal.hide();
      }

      const form = document.getElementById("releaseForm");
      if (form) {
        const submitEvent = new Event("submit");
        form.dispatchEvent(submitEvent);
      }

      if (confirmRejectBtn2) {
        confirmRejectBtn2.disabled = true;
      }
    });
  }

  if (rejectionModal2) {
    rejectionModal2.addEventListener("hidden.bs.modal", function () {
      if (rejectionMessageInput2) {
        rejectionMessageInput2.value = "";
        rejectionMessageInput2.classList.remove("is-invalid");
      }
      if (rejectionMessageError2) {
        rejectionMessageError2.style.display = "none";
      }
      if (charCount) {
        charCount.textContent = "0";
      }
      if (confirmRejectBtn2) {
        confirmRejectBtn2.disabled = true;
      }
    });

    rejectionModal2.addEventListener("shown.bs.modal", function () {
      if (typeof feather !== "undefined") {
        feather.replace();
      }
      if (rejectionMessageInput2) {
        rejectionMessageInput2.focus();
      }
    });
  }

  if (rejectBtn2) {
    rejectBtn2.addEventListener("click", function () {
      const modal = new bootstrap.Modal(rejectionModal2);
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
  // EXISTING PASSWORD FIELD
  const passwordInput = document.getElementById("password");
  const togglePassword = document.getElementById("togglePassword");
  const toggleIcon = document.getElementById("toggleIcon");

  if (passwordInput && togglePassword && toggleIcon) {
    togglePassword.addEventListener("click", function () {
      const isPassword = passwordInput.type === "password";
      passwordInput.type = isPassword ? "text" : "password";

      toggleIcon.classList.toggle("bi-eye");
      toggleIcon.classList.toggle("bi-eye-slash");
    });
  }

  // OLD PASSWORD FIELD
  const oldPasswordInput = document.getElementById("old_password");
  const toggleOldPassword = document.getElementById("toggleOldPassword");
  const toggleOldIcon = document.getElementById("toggleOldIcon");

  if (oldPasswordInput && toggleOldPassword && toggleOldIcon) {
    toggleOldPassword.addEventListener("click", function () {
      const isPassword = oldPasswordInput.type === "password";
      oldPasswordInput.type = isPassword ? "text" : "password";

      toggleOldIcon.classList.toggle("bi-eye");
      toggleOldIcon.classList.toggle("bi-eye-slash");
    });
  }

  // NEW PASSWORD FIELD
  const newPasswordInput = document.getElementById("new_password");
  const toggleNewPassword = document.getElementById("toggleNewPassword");
  const toggleNewIcon = document.getElementById("toggleNewIcon");

  if (newPasswordInput && toggleNewPassword && toggleNewIcon) {
    toggleNewPassword.addEventListener("click", function () {
      const isPassword = newPasswordInput.type === "password";
      newPasswordInput.type = isPassword ? "text" : "password";

      toggleNewIcon.classList.toggle("bi-eye");
      toggleNewIcon.classList.toggle("bi-eye-slash");
    });
  }

  // CONFIRM PASSWORD FIELD
  const confirmPasswordInput = document.getElementById("confirm_password");
  const toggleConfirmPassword = document.getElementById(
    "toggleConfirmPassword"
  );
  const toggleConfirmIcon = document.getElementById("toggleConfirmIcon");

  if (confirmPasswordInput && toggleConfirmPassword && toggleConfirmIcon) {
    toggleConfirmPassword.addEventListener("click", function () {
      const isPassword = confirmPasswordInput.type === "password";
      confirmPasswordInput.type = isPassword ? "text" : "password";

      toggleConfirmIcon.classList.toggle("bi-eye");
      toggleConfirmIcon.classList.toggle("bi-eye-slash");
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
  window.location.href = "/releases/export-csv";
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

document
  .getElementById("showRejectionMessagesBtn")
  .addEventListener("click", function () {
    fetch("/releases/rejections", {
      headers: { "X-Requested-With": "XMLHttpRequest" },
    })
      .then((res) => res.json())
      .then((json) => {
        const tbody = document.getElementById("rejectionMessagesBody");
        tbody.innerHTML = "";

        json.data.forEach((item) => {
          tbody.innerHTML += `
                        <tr>
                            <td>${item.upc || "-"}</td>
                            <td>${item.isrc || "-"}</td>
                            <td>${item.rejectionMessage || "-"}</td>
                        </tr>
                    `;
        });

        const modal = new bootstrap.Modal(
          document.getElementById("rejectionMessagesModal")
        );
        modal.show();
      })
      .catch((err) => {
        console.error("Error fetching rejection messages:", err);
        alert("Unable to load rejection messages.");
      });
  });
